@extends('layouts.admin')

@section('title', '編輯Slider')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>編輯Slider</h2>
    <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> 返回列表
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">標題 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $slider->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">副標題</label>
                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                       id="subtitle" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}">
                @error('subtitle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">連結</label>
                <input type="url" class="form-control @error('link') is-invalid @enderror" 
                       id="link" name="link" value="{{ old('link', $slider->link) }}" placeholder="https://">
                @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Slider圖片</label>
                @if($slider->image)
                    <div class="mb-2">
                        <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" class="img-thumbnail" style="max-height: 150px;">
                        <div class="form-text">目前圖片</div>
                    </div>
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                       id="image" name="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">支援格式：JPEG, PNG, JPG, GIF, SVG，檔案大小不超過 2MB（如不更換圖片請留空）</div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> 更新
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">取消</a>
            </div>
        </form>
    </div>
</div>
@endsection
