@extends('layouts.admin')

@section('title', 'Slider管理')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Slider管理</h2>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> 新增Slider
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th width="120">圖片</th>
                        <th>標題</th>
                        <th>副標題</th>
                        <th width="150">建立時間</th>
                        <th width="180">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>
                            <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" class="img-thumbnail" style="max-height: 60px;">
                        </td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->subtitle }}</td>
                        <td>{{ $slider->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> 編輯
                            </a>
                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline" onsubmit="return confirm('確定要刪除此Slider嗎？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> 刪除
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">目前沒有Slider</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $sliders->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
