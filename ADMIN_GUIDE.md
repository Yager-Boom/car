# 後台管理系統使用說明

## 登入資訊
- 網址：http://localhost:8000/admin/login
- 帳號：admin
- 密碼：0000

## 功能模組

### 1. 商品管理 (Products)
- 路徑：`/admin/products`
- 功能：
  - 列表顯示所有商品（分頁）
  - 新增商品（名稱、描述、價格、圖片）
  - 編輯商品
  - 刪除商品
- 圖片儲存位置：`public/images/products/`

### 2. Slider管理 (Sliders)
- 路徑：`/admin/sliders`
- 功能：
  - 列表顯示所有Slider（分頁）
  - 新增Slider（標題、副標題、連結、圖片）
  - 編輯Slider
  - 刪除Slider
- 圖片儲存位置：`public/images/sliders/`

### 3. 文章管理 (Articles)
- 路徑：`/admin/articles`
- 功能：
  - 列表顯示所有文章（分頁）
  - 新增文章（標題、內容、圖片）
  - 編輯文章
  - 刪除文章
  - **使用 CKEditor 5 進行內容編輯**
- 圖片儲存位置：`public/images/articles/`

### 4. 關於我們管理 (About)
- 路徑：`/admin/about`
- 功能：
  - 編輯關於我們頁面（標題、內容、圖片）
  - **使用 CKEditor 5 進行內容編輯**
  - 單一頁面，只有編輯功能
- 圖片儲存位置：`public/images/about/`

### 5. 使用者管理 (Users)
- 路徑：`/admin/users`
- 功能：
  - 列表顯示所有使用者（分頁）
  - 新增使用者（姓名、帳號、密碼）
  - 編輯使用者
  - 刪除使用者（無法刪除目前登入的使用者）
- 密碼：至少4個字元，新增時必填，編輯時選填

## 技術特點

### 圖片上傳
- 支援格式：JPEG, PNG, JPG, GIF, SVG
- 檔案大小限制：2MB
- 自動處理舊圖片刪除

### CKEditor 5 整合
- 使用 CDN 版本（41.1.0）
- 中文介面
- 功能：標題、粗體、斜體、連結、列表、引用、表格、復原/重做
- 應用於：文章管理、關於我們管理

### 表單驗證
- 前端：HTML5 驗證
- 後端：Laravel 驗證規則
- 錯誤訊息：中文顯示

### 使用者體驗
- RWD 響應式設計
- Bootstrap 5 UI
- Bootstrap Icons 圖示
- 成功/錯誤訊息提示
- 刪除確認對話框
- 分頁導航

## 控制器列表

1. **AuthController** - 登入/登出
2. **DashboardController** - 儀表板統計
3. **ProductController** - 商品 CRUD
4. **SliderController** - Slider CRUD
5. **ArticleController** - 文章 CRUD
6. **AboutController** - 關於我們編輯
7. **UserController** - 使用者 CRUD

## 視圖檔案結構

```
resources/views/admin/
├── login.blade.php              # 登入頁面
├── dashboard.blade.php          # 儀表板
├── products/
│   ├── index.blade.php         # 商品列表
│   ├── create.blade.php        # 新增商品
│   └── edit.blade.php          # 編輯商品
├── sliders/
│   ├── index.blade.php         # Slider列表
│   ├── create.blade.php        # 新增Slider
│   └── edit.blade.php          # 編輯Slider
├── articles/
│   ├── index.blade.php         # 文章列表
│   ├── create.blade.php        # 新增文章（含CKEditor）
│   └── edit.blade.php          # 編輯文章（含CKEditor）
├── about/
│   └── edit.blade.php          # 編輯關於我們（含CKEditor）
└── users/
    ├── index.blade.php         # 使用者列表
    ├── create.blade.php        # 新增使用者
    └── edit.blade.php          # 編輯使用者
```

## 路由結構

```php
// 登入相關
GET  /admin/login           - 顯示登入頁面
POST /admin/login           - 處理登入
POST /admin/logout          - 登出

// 後台管理（需要登入）
GET  /admin                 - 儀表板
GET  /admin/products        - 商品列表
GET  /admin/products/create - 新增商品表單
POST /admin/products        - 儲存商品
GET  /admin/products/{id}/edit - 編輯商品表單
PUT  /admin/products/{id}   - 更新商品
DELETE /admin/products/{id} - 刪除商品

// Slider、Articles、Users 路由結構相同

GET  /admin/about           - 關於我們編輯頁面
PUT  /admin/about/{id}      - 更新關於我們
```

## 已完成功能清單

✅ 所有控制器完整的 CRUD 邏輯
✅ 所有視圖檔案（含表單驗證）
✅ CKEditor 5 整合（文章、關於我們）
✅ 圖片上傳功能
✅ 刪除保護（使用者不能刪除自己）
✅ 成功/錯誤訊息提示
✅ 分頁功能
✅ RWD 響應式介面
✅ Bootstrap Icons 圖示
✅ 中文介面

## 注意事項

1. 圖片上傳目錄必須有寫入權限
2. 編輯時如不更換圖片請留空
3. 密碼最少4個字元
4. 刪除操作會永久刪除資料及關聯圖片
5. 登入後 Session 會記住管理員身份
