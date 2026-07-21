<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use OpenAI;

class OpenAiDemoController extends Controller
{
    /**
     * Simple OpenAI chat demo endpoint.
     */
    public function chat(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $apiKey = config('services.openai.key');
        if (empty($apiKey)) {
            return response()->json([
                'error' => 'OPENAI_API_KEY is not configured.',
            ], 500);
        }

        $client = OpenAI::client($apiKey);

        $response = $client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => $request->input('message')],
            ],
        ]);

        return response()->json([
            'message' => $response->choices[0]->message->content ?? '',
            'raw' => $response->toArray(),
        ]);
    }
}
