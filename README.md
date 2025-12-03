# MOTO ZONE - 重機專業車行形象網站

[![GitHub Pages](https://img.shields.io/badge/GitHub%20Pages-Online-success)](https://yager-boom.github.io/car/)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

## 專案說明

這是一個使用 Tailwind CSS 和 jQuery 開發的重機車行形象網站，專為 18-30 歲年輕客群設計。

## 🌐 線上預覽

**GitHub Pages**: [https://yager-boom.github.io/car/](https://yager-boom.github.io/car/)

## 功能特色

### 📱 響應式設計 (RWD)
- 完整支援桌面、平板、手機裝置
- 流暢的行動版選單
- 彈性網格佈局

### 🎨 視覺設計
- 現代化漸層配色（橘紅色系）
- 動態視覺效果
- 流暢的頁面動畫
- 符合年輕客群審美

### 🛠️ 服務項目展示
- 新車/中古車買賣
- 專業改裝
- 基礎保養
- 車輛托運
- 代客驗車驗排氣
- 賽道服務

### 📍 門市資訊
- Google Maps 地圖整合
- 詳細營業時間
- 交通資訊
- 停車指引

### 📞 聯繫方式
- 業務部門聯絡資訊
- 技術部門聯絡資訊
- 客服中心資訊
- LINE、電話、Email 多管道聯繫
- 社群媒體連結
- 快速諮詢表單

### ✨ 互動功能
- 平滑滾動導航
- 視差滾動效果
- 卡片 3D 傾斜效果
- 回到頂部按鈕
- 滾動淡入動畫
- 導航列滾動變化

## 技術棧

- **HTML5** - 語意化標籤
- **Tailwind CSS** - 快速樣式開發
- **jQuery 3.7.1** - 互動效果
- **Font Awesome 6.5.1** - 圖標
- **Google Fonts** - Noto Sans TC, Orbitron

## 文件結構

```
car_f2e/
├── index.html          # 主頁面
├── css/
│   └── style.css      # 自訂樣式
├── js/
│   └── script.js      # JavaScript 互動功能
└── README.md          # 專案說明
```

## 使用方式

### 1. 部署到 GitHub Pages（推薦）

**完整部署指南請參考 [DEPLOY.md](DEPLOY.md)**

快速部署步驟：

```bash
# 1. 初始化 Git（如果尚未初始化）
git init

# 2. 新增所有檔案
git add .

# 3. 提交
git commit -m "Initial commit"

# 4. 連接到您的 GitHub repository
git remote add origin https://github.com/Yager-Boom/car.git

# 5. 推送到 GitHub
git branch -M main
git push -u origin main
```

或使用快速部署腳本：

```bash
# 賦予執行權限（首次使用）
chmod +x deploy.sh

# 執行部署
./deploy.sh "您的 commit 訊息"
```

然後在 GitHub repository 的 Settings → Pages 啟用 GitHub Pages。

### 2. 本地開發預覽

#### 方法 A: 直接開啟
直接用瀏覽器開啟 `index.html` 即可預覽。

#### 方法 B: 使用 XAMPP
1. 將專案放置於 XAMPP 的 htdocs 目錄
2. 啟動 Apache 伺服器
3. 訪問 `http://localhost/car_f2e/`

#### 方法 C: 使用 Live Server (推薦)
如果使用 VS Code，可安裝 Live Server 擴充功能：
1. 安裝 Live Server 擴充
2. 右鍵點擊 `index.html`
3. 選擇 "Open with Live Server"

#### 方法 D: 使用 Python 簡易伺服器
```bash
# Python 3
python3 -m http.server 8000

# 訪問 http://localhost:8000
```

## 自訂設定

### 修改 Google Maps 位置
在 `index.html` 中找到 iframe，修改 `src` 屬性的座標：

```html
<iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!3d[緯度]![經度]..."
    ...>
</iframe>
```

### 修改聯絡資訊
在 `index.html` 的聯繫我們區塊修改：
- 電話號碼
- LINE ID
- Email 地址
- 地址資訊

### 修改配色
在 `style.css` 或直接修改 Tailwind 類別：
- 主色：`orange-500` (#f97316)
- 次要色：`red-600` (#dc2626)
- 背景：`gray-900` (#111827)

### 表單處理
在 `js/script.js` 中的 `#contact-form` 提交處理函數中，取消註解並修改 AJAX 部分，連接到您的後端 API：

```javascript
$.ajax({
    url: 'your-api-endpoint.php',
    method: 'POST',
    data: formData,
    success: function(response) {
        // 處理成功
    },
    error: function() {
        // 處理錯誤
    }
});
```

## 瀏覽器支援

- Chrome (最新版)
- Firefox (最新版)
- Safari (最新版)
- Edge (最新版)
- 行動版瀏覽器

## 效能優化建議

1. **圖片優化**
   - 使用 WebP 格式
   - 壓縮圖片大小
   - 使用懶加載

2. **CDN 替代**
   - 考慮使用本地化的 CSS/JS 文件
   - 減少外部資源請求

3. **快取策略**
   - 設定適當的快取頭
   - 使用服務工作者 (Service Worker)

## 進階功能擴展

### 可以加入的功能：
- [ ] 車輛展示畫廊
- [ ] 客戶評價輪播
- [ ] 預約系統整合
- [ ] 線上客服聊天
- [ ] 部落格文章
- [ ] 會員系統
- [ ] 多語言支援
- [ ] 暗黑模式切換

## 注意事項

1. **Google Maps API**
   - 目前使用嵌入式地圖
   - 生產環境建議申請 Google Maps API 金鑰

2. **LINE 連結**
   - 記得替換為實際的 LINE 官方帳號 ID

3. **表單提交**
   - 需要後端 API 支援
   - 建議加入 reCAPTCHA 防止垃圾訊息

4. **SEO 優化**
   - 添加 meta 描述
   - 設定 Open Graph 標籤
   - 建立 sitemap.xml

## 授權

此專案為示範用途，可自由修改使用。

## 聯絡資訊

如有問題或建議，歡迎聯繫：
- Email: info@motozone.com
- 電話: (02) 8765-4321

---

**MOTO ZONE - Ride the Limit** 🏍️
