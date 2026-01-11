@extends('layouts.admin')

@section('title', '文章管理')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>文章管理</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> 新增文章
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
                        <th>文章標題</th>
                        <th width="150">建立時間</th>
                        <th width="180">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>
                            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-thumbnail" style="max-height: 60px;">
                        </td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> 編輯
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('確定要刪除此文章嗎？');">
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
                        <td colspan="5" class="text-center text-muted">目前沒有文章</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
