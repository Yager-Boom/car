@extends('layouts.admin')

@section('title', '編輯文章')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>編輯文章</h2>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> 返回列表
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">文章標題 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">文章內容 <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                          id="content" name="content" rows="10" required>{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">文章圖片</label>
                @if($article->image)
                    <div class="mb-2">
                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-thumbnail" style="max-height: 150px;">
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
                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">取消</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            language: 'zh',
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
