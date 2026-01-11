@extends('layouts.admin')

@section('title', '編輯使用者')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>編輯使用者</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> 返回列表
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">姓名 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">帳號 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">密碼</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       id="password" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">密碼至少4個字元（如不修改密碼請留空）</div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">確認密碼</label>
                <input type="password" class="form-control" 
                       id="password_confirmation" name="password_confirmation">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> 更新
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">取消</a>
            </div>
        </form>
    </div>
</div>
@endsection
