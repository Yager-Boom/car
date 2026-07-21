@extends('layouts.admin')

@section('title', '新增 API')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>新增 API</h2>
    <a href="{{ route('admin.api.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> 返回列表
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.api.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">API 名稱 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="api_key" class="form-label">API Key <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('api_key') is-invalid @enderror" 
                       id="api_key" name="api_key" value="{{ old('api_key') }}" required>
                @error('api_key')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">狀態 <span class="text-danger">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="1" {{ old('status', '1') === '1' ? 'selected' : '' }}>啟用</option>
                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>停用</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> 儲存
                </button>
                <a href="{{ route('admin.api.index') }}" class="btn btn-secondary">取消</a>
            </div>
        </form>
    </div>
</div>
@endsection
