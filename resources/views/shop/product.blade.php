@extends('layouts.app')

@section('title', $product->title . ' - 麵線商城')

@section('meta_description', $product->description)

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">首頁</a></li>
            <li class="breadcrumb-item active">{{ $product->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image }}" class="img-fluid rounded" alt="{{ $product->title }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->title }}</h1>
            <h2 class="price mt-3">NT$ {{ number_format($product->price) }}</h2>
            <hr>
            <div class="product-description mt-4">
                <h5>商品說明</h5>
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div>

    @if($related_products->count() > 0)
    <div class="mt-5">
        <h3>相關商品</h3>
        <hr>
        <div class="row">
            @foreach($related_products as $related)
            <div class="col-md-3">
                <div class="card product-card">
                    <img src="{{ $related->image }}" class="card-img-top" alt="{{ $related->title }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $related->title }}</h6>
                        <p class="text-muted">NT$ {{ number_format($related->price) }}</p>
                        <a href="{{ route('shop.product', $related->id) }}" class="btn btn-sm btn-outline-primary">查看</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "{{ $product->title }}",
  "description": "{{ $product->description }}",
  "offers": {
    "@type": "Offer",
    "price": "{{ $product->price }}",
    "priceCurrency": "TWD"
  }
}
</script>
@endsection
