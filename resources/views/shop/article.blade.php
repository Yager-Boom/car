@extends('layouts.app')

@section('title', $article->title . ' - 麵線商城')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">首頁</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop.articles') }}">文章</a></li>
            <li class="breadcrumb-item active">{{ $article->title }}</li>
        </ol>
    </nav>

    <article>
        <h1 class="mb-3">{{ $article->title }}</h1>
        <p class="text-muted"><small>發布日期：{{ $article->created_at->format('Y年m月d日') }}</small></p>
        
        @if($article->image)
        <img src="{{ $article->image }}" class="img-fluid rounded mb-4" alt="{{ $article->title }}">
        @endif
        
        <div class="article-content">
            {!! $article->content !!}
        </div>
    </article>

    <div class="mt-5">
        <a href="{{ route('shop.articles') }}" class="btn btn-secondary">← 返回文章列表</a>
    </div>
</div>
@endsection

@section('extra_css')
<style>
    .article-content { line-height: 1.8; font-size: 1.1em; }
    .article-content h2 { margin-top: 30px; margin-bottom: 15px; }
    .article-content p { margin-bottom: 15px; }
    .article-content ul { margin-left: 20px; }
</style>
@endsection
