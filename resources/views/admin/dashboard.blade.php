@extends('layouts.admin')

@section('title', '控制台')
@section('page_title', '控制台')

@section('content')
<div class="container-fluid">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">商品數量</h6>
                            <h2>{{ $stats['products'] }}</h2>
                        </div>
                        <i class="bi bi-box-seam" style="font-size: 3rem; opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">輪播圖</h6>
                            <h2>{{ $stats['sliders'] }}</h2>
                        </div>
                        <i class="bi bi-images" style="font-size: 3rem; opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">文章數量</h6>
                            <h2>{{ $stats['articles'] }}</h2>
                        </div>
                        <i class="bi bi-file-text" style="font-size: 3rem; opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">用戶數量</h6>
                            <h2>{{ $stats['users'] }}</h2>
                        </div>
                        <i class="bi bi-people" style="font-size: 3rem; opacity: 0.5;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">最新商品</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>圖片</th>
                            <th>商品名稱</th>
                            <th>價格</th>
                            <th>狀態</th>
                            <th>建立時間</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img src="{{ $product->image }}" width="50" alt="{{ $product->title }}"></td>
                            <td>{{ $product->title }}</td>
                            <td>NT$ {{ number_format($product->price) }}</td>
                            <td>
                                @if($product->active)
                                <span class="badge bg-success">啟用</span>
                                @else
                                <span class="badge bg-secondary">停用</span>
                                @endif
                            </td>
                            <td>{{ $product->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">暫無商品</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">快速連結</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-outline-primary w-100 mb-2">
                                <i class="bi bi-plus-circle"></i> 新增商品
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.sliders.create') }}" class="btn btn-outline-success w-100 mb-2">
                                <i class="bi bi-plus-circle"></i> 新增輪播
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-info w-100 mb-2">
                                <i class="bi bi-plus-circle"></i> 新增文章
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary w-100 mb-2" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i> 查看前台
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
