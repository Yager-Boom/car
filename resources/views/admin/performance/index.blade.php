@extends('layouts.admin')

@section('title', '績效管理')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>績效管理</h2>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="mb-3">OpenAI 一鍵生成 50 字短文案（測試）</h5>

        <form action="{{ route('admin.performance.generate') }}" method="POST" class="row g-3 mb-4">
            @csrf
            <div class="col-md-6">
                <label for="topic" class="form-label">主題（可選）</label>
                <input type="text" id="topic" name="topic" class="form-control" placeholder="例如：麵線新品、限時優惠" value="{{ old('topic') }}">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-lightning-charge"></i> 一鍵生成
                </button>
            </div>
        </form>

        @if(session('copy_text'))
            <div class="mb-4">
                <label class="form-label">產生結果</label>
                <textarea class="form-control" rows="4" readonly>{{ session('copy_text') }}</textarea>
            </div>
        @endif

        <hr class="my-4">

        <h5 class="mb-3">一鍵分析測試（學生數學成績）</h5>
        <p class="text-muted">將下表成績提供給 OpenAI，分析可能的進步/退步原因並提出改善計劃。</p>

        <h6 class="mb-3">五名學生近五年數學成績（每半年一次）</h6>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center">學生</th>
                        <th rowspan="2" class="text-center">班級</th>
                        @foreach($years as $year)
                            <th colspan="2" class="text-center">
                                {{ $year }}
                                @if(isset($courses[$loop->iteration]))
                                    <div class="small text-muted">{{ $courses[$loop->iteration]->name }}</div>
                                @endif
                            </th>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach($years as $year)
                            <th class="text-center">上</th>
                            <th class="text-center">下</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->class_name }}</td>
                            @foreach($years as $year)
                                <td class="text-center">{{ $scoreTable[$student->id][$year][1] ?? '-' }}</td>
                                <td class="text-center">{{ $scoreTable[$student->id][$year][2] ?? '-' }}</td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center text-muted">尚無成績資料</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <form action="{{ route('admin.performance.analyze') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-lightning-charge"></i> 一鍵分析
            </button>
        </form>

        @if(session('analysis_text'))
            <div class="mt-4">
                <label class="form-label">AI 分析結果</label>
                <textarea class="form-control" rows="10" readonly>{{ session('analysis_text') }}</textarea>
            </div>
        @endif
    </div>
</div>
@endsection
