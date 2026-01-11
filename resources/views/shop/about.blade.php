@extends('layouts.app')

@section('title', '關於我們 - 麵線商城')

@section('content')
<div class="container mt-5">
    @if($about)
    <h1 class="text-center mb-4">{{ $about->title }}</h1>
    
    @if($about->image)
    <div class="text-center mb-4">
        <img src="{{ $about->image }}" class="img-fluid rounded" alt="{{ $about->title }}" style="max-width: 800px;">
    </div>
    @endif
    
    <div class="about-content">
        {!! $about->content !!}
    </div>
    @else
    <div class="alert alert-info">
        <h4>關於我們頁面建置中...</h4>
    </div>
    @endif
</div>
@endsection

@section('extra_css')
<style>
    .about-content { line-height: 1.8; font-size: 1.1em; }
    .about-content h2 { margin-top: 30px; margin-bottom: 15px; color: #8B4513; }
    .about-content p { margin-bottom: 15px; }
    .about-content ul { margin-left: 20px; margin-bottom: 15px; }
</style>
@endsection
