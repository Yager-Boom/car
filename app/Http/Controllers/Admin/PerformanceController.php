<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\MathCourse;
use App\Models\StudentMathScore;
use OpenAI;
use Exception;

class PerformanceController extends Controller
{
    public function index()
    {
        $years = [2021, 2022, 2023, 2024, 2025];
        $students = Student::orderBy('name')->get();
        $courses = MathCourse::orderBy('academic_year')->get()->keyBy('academic_year');

        $scores = StudentMathScore::all();
        $scoreTable = [];

        foreach ($scores as $score) {
            $scoreTable[$score->student_id][$score->year][$score->semester] = $score->score;
        }

        return view('admin.performance.index', [
            'students' => $students,
            'years' => $years,
            'courses' => $courses,
            'scoreTable' => $scoreTable,
        ]);
    }

    public function generateCopy(Request $request)
    {
        $request->validate([
            'topic' => 'nullable|string|max:100',
        ]);

        $apiKey = config('services.openai.key');
        if (empty($apiKey)) {
            return redirect()->back()->with('error', 'OPENAI_API_KEY 未設定');
        }

        $topic = $request->input('topic', '麵線商城');

        try {
            $client = OpenAI::client($apiKey);
            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => '你是行銷文案助手。'],
                    ['role' => 'user', 'content' => "請用繁體中文產生約50字的短文案，主題：{$topic}。"],
                ],
            ]);

            $text = $response->choices[0]->message->content ?? '';

            return redirect()->back()->with('success', '已產生文案')->with('copy_text', $text);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();

            // 檢查是否為速率限制錯誤
            if (strpos($errorMessage, 'rate_limit_exceeded') !== false || 
                strpos($errorMessage, 'Rate limit') !== false ||
                strpos($errorMessage, 'exceeded') !== false) {
                return redirect()->back()->with('error', 'API 請求次數超限。請等待一分鐘後再試，或檢查您的 OpenAI 帳戶配額。');
            }

            // 檢查是否為授權錯誤
            if (strpos($errorMessage, 'Incorrect API key') !== false ||
                strpos($errorMessage, 'invalid_api_key') !== false) {
                return redirect()->back()->with('error', 'OpenAI API Key 無效，請檢查設定。');
            }

            // 其他錯誤
            return redirect()->back()->with('error', 'OpenAI API 錯誤：' . $errorMessage);
        }
    }

    public function analyzePerformance(Request $request)
    {
        $apiKey = config('services.openai.key');
        if (empty($apiKey)) {
            return redirect()->back()->with('error', 'OPENAI_API_KEY 未設定');
        }

        $students = Student::orderBy('name')->get();
        $scores = StudentMathScore::with('mathCourse', 'student')
            ->orderBy('year')
            ->orderBy('semester')
            ->get();

        // 改用摘要格式，避免資料過大
        $summaries = [];
        foreach ($students as $student) {
            $studentScores = $scores->where('student_id', $student->id)->values();
            
            if ($studentScores->isEmpty()) {
                continue;
            }

            $scoreValues = $studentScores->pluck('score')->toArray();
            $firstScore = $scoreValues[0] ?? 0;
            $lastScore = $scoreValues[count($scoreValues) - 1] ?? 0;
            $avgScore = round(array_sum($scoreValues) / count($scoreValues), 1);
            $maxScore = max($scoreValues);
            $minScore = min($scoreValues);
            $trend = $lastScore - $firstScore;

            // 計算波動度（標準差）
            $variance = 0;
            foreach ($scoreValues as $score) {
                $variance += pow($score - $avgScore, 2);
            }
            $stdDev = round(sqrt($variance / count($scoreValues)), 1);

            $summaries[] = sprintf(
                "【%s】班級：%s｜初始成績：%d｜最終成績：%d｜平均：%.1f｜最高：%d｜最低：%d｜整體趨勢：%s%d分｜標準差：%.1f",
                $student->name,
                $student->class_name,
                $firstScore,
                $lastScore,
                $avgScore,
                $maxScore,
                $minScore,
                $trend >= 0 ? '+' : '',
                $trend,
                $stdDev
            );
        }

        $prompt = [
            'role' => 'user',
            'content' => "以下是五名學生近五年數學成績的統計摘要，請分析每位學生的進步或退步可能原因，並提出具體改善計劃。請用繁體中文，條列每位學生的結論與建議。\n\n" . implode("\n", $summaries),
        ];

        try {
            $client = OpenAI::client($apiKey);
            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => '你是教育數據分析師。'],
                    $prompt,
                ],
            ]);

            $analysis = $response->choices[0]->message->content ?? '';

            return redirect()->back()->with('success', '已完成分析')->with('analysis_text', $analysis);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();

            if (strpos($errorMessage, 'rate_limit_exceeded') !== false ||
                strpos($errorMessage, 'Rate limit') !== false ||
                strpos($errorMessage, 'exceeded') !== false) {
                return redirect()->back()->with('error', 'API 請求次數超限。請稍後再試或檢查配額。');
            }

            if (strpos($errorMessage, 'Incorrect API key') !== false ||
                strpos($errorMessage, 'invalid_api_key') !== false) {
                return redirect()->back()->with('error', 'OpenAI API Key 無效，請檢查設定。');
            }

            return redirect()->back()->with('error', 'OpenAI API 錯誤：' . $errorMessage);
        }
    }
}
