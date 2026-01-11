@extends('layouts.app')

@section('title', '麵線商城 - 首頁')

@section('meta_description', '提供最優質的傳統手工麵線，百年傳承的製作技藝，堅持品質第一')

@section('meta_keywords', '麵線,手工麵線,傳統麵線,台灣美食,麵線禮盒,養生麵線')

@section('content')
<!-- Slider -->
<div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
        <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="{{ $index }}" 
                class="{{ $index == 0 ? 'active' : '' }}"></button>
        @endforeach
    </div>
    
    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ $slider->image }}" class="d-block w-100 slider-img" alt="{{ $slider->title }}">
            <div class="carousel-caption">
                <h2>{{ $slider->title }}</h2>
                <p>{{ $slider->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
    
    <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Products Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">商品列表</h2>
    
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 col-lg-3">
            <div class="card product-card">
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 60) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">NT$ {{ number_format($product->price) }}</span>
                        <a href="{{ route('shop.product', $product->id) }}" class="btn btn-sm btn-primary">查看詳情</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- SEO Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Store",
  "name": "麵線商城",
  "description": "提供最優質的傳統手工麵線",
  "url": "{{ url('/') }}"
}
</script>
@endsection

@section('extra_js')
<script>
$(document).ready(function() {
    // 輪播自動播放
    $('#mainSlider').carousel({
        interval: 5000,
        wrap: true
    });
});
</script>
@endsection
