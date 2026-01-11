@extends('layouts.app')

@section('title', '文章列表 - 麵線商城')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">文章列表</h1>
    
    <div class="row">
        @foreach($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($article->image)
                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                    <a href="{{ route('shop.article', $article->id) }}" class="btn btn-primary">閱讀更多</a>
                </div>
                <div class="card-footer text-muted">
                    <small>{{ $article->created_at->format('Y-m-d') }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
