<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '麵線商城')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', '傳統手工麵線，百年傳承的美味')">
    <meta name="keywords" content="@yield('meta_keywords', '麵線,手工麵線,傳統麵線,台灣美食')">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body { font-family: 'Microsoft JhengHei', sans-serif; }
        .navbar { background-color: #8B4513; }
        .navbar-brand, .nav-link { color: white !important; }
        .product-card { margin-bottom: 30px; transition: transform 0.3s; }
        .product-card:hover { transform: translateY(-5px); }
        .product-card img { width: 100%; height: 250px; object-fit: cover; }
        .slider-img { width: 100%; height: 400px; object-fit: cover; }
        footer { background-color: #333; color: white; padding: 40px 0; margin-top: 50px; }
        .price { color: #d9534f; font-size: 1.5em; font-weight: bold; }
    </style>
    
    @yield('extra_css')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('shop.index') }}">麵線商城</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop.index') }}">首頁</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop.articles') }}">文章</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('shop.about') }}">關於我們</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>關於我們</h5>
                    <p>傳承百年的手工麵線製作技藝，堅持品質第一。</p>
                </div>
                <div class="col-md-4">
                    <h5>聯絡資訊</h5>
                    <p>電話: (02) 1234-5678<br>
                    Email: info@mianxian-shop.com</p>
                </div>
                <div class="col-md-4">
                    <h5>營業時間</h5>
                    <p>週一至週五: 09:00-18:00<br>
                    週末: 10:00-17:00</p>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1);">
            <div class="text-center">
                <p>&copy; 2025 麵線商城. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('extra_js')
</body>
</html>
