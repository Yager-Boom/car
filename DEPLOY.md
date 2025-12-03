# GitHub Pages 部署指南

## 🚀 快速部署步驟

### 方法一：使用 GitHub.com 網頁介面（推薦新手）

1. **建立 GitHub 帳號**
   - 前往 https://github.com
   - 註冊免費帳號

2. **建立新 Repository**
   - 點擊右上角 `+` → `New repository`
   - Repository name: `car` 或 `moto-zone`
   - 選擇 `Public`
   - 不要勾選 "Add a README file"（我們已經有了）
   - 點擊 `Create repository`

3. **上傳專案文件**
   - 在新建的 repository 頁面，點擊 `uploading an existing file`
   - 將以下檔案拖曳上傳：
     - `index.html`
     - `README.md`
     - `css/style.css`
     - `js/script.js`
   - 填寫 commit message：`Initial commit`
   - 點擊 `Commit changes`

4. **啟用 GitHub Pages**
   - 進入 repository 的 `Settings`
   - 左側選單點選 `Pages`
   - Source 選擇 `Deploy from a branch`
   - Branch 選擇 `main` 和 `/ (root)`
   - 點擊 `Save`

5. **等待部署完成**
   - 約 1-3 分鐘後，頁面會顯示網址
   - 網址格式：`https://yager-boom.github.io/car/`

---

### 方法二：使用 Git 命令列（推薦進階使用者）

#### 1. 初始化 Git Repository

```bash
# 進入專案目錄
cd /Applications/XAMPP/xamppfiles/php/car_f2e

# 初始化 git
git init

# 新增所有檔案
git add .

# 提交
git commit -m "Initial commit: MOTO ZONE website"
```

#### 2. 連接到 GitHub

先在 GitHub 建立一個新的 repository（如上述方法一步驟 2），然後：

```bash
# 連接遠端 repository（替換成您的 repository URL）
git remote add origin https://github.com/Yager-Boom/car.git

# 設定主分支名稱
git branch -M main

# 推送到 GitHub
git push -u origin main
```

#### 3. 啟用 GitHub Pages

在 GitHub repository 的 Settings → Pages 中啟用（同方法一步驟 4）

---

## 📝 後續更新網站

### 使用 Git 命令列更新

```bash
# 修改檔案後...

# 查看變更
git status

# 新增變更的檔案
git add .

# 提交變更
git commit -m "Update: 描述您的變更"

# 推送到 GitHub
git push
```

### 使用 GitHub 網頁介面更新

1. 進入要修改的檔案
2. 點擊右上角的鉛筆圖示 ✏️
3. 編輯內容
4. 填寫 commit message
5. 點擊 `Commit changes`

---

## 🌐 自訂網域（選用）

如果您有自己的網域名稱：

1. **在 GitHub Pages 設定**
   - Settings → Pages → Custom domain
   - 輸入您的網域（例如：www.motozone.com）
   - 點擊 Save

2. **設定 DNS**
   在您的網域服務商設定 DNS 記錄：
   
   **使用 www 子網域：**
   ```
   類型：CNAME
   名稱：www
   值：yager-boom.github.io
   ```
   
   **使用主網域（apex domain）：**
   ```
   類型：A
   名稱：@
   值：185.199.108.153
   值：185.199.109.153
   值：185.199.110.153
   值：185.199.111.153
   ```

3. **等待 DNS 生效**
   - 通常需要 24-48 小時
   - 可使用 https://dnschecker.org 檢查

---

## ✅ 驗證部署

部署完成後，訪問以下網址：

- **GitHub Pages URL**: `https://yager-boom.github.io/car/`
- **自訂網域** (如有設定): `https://www.yourdomain.com`

### 檢查清單

- [ ] 網站可以正常開啟
- [ ] RWD 響應式設計正常運作
- [ ] 所有連結都有效
- [ ] 圖片和資源正常載入
- [ ] 表單可以正常互動
- [ ] 手機版選單運作正常

---

## 🔧 常見問題排解

### 問題：404 錯誤

**解決方法：**
- 確認 Settings → Pages 已啟用
- 確認分支選擇正確（main）
- 確認資料夾選擇正確（/ root）
- 等待 1-3 分鐘讓 GitHub 建置

### 問題：CSS/JS 沒有載入

**解決方法：**
- 檢查檔案路徑是否正確
- 確認 `css/style.css` 和 `js/script.js` 都已上傳
- 清除瀏覽器快取（Ctrl+Shift+R 或 Cmd+Shift+R）

### 問題：Google Maps 沒有顯示

**解決方法：**
- 確認 iframe 的 src 屬性正確
- 考慮申請 Google Maps API key（生產環境建議）

### 問題：表單無法提交

**說明：**
- 目前表單為前端驗證
- 需要後端 API 才能真正發送資料
- 可整合 Formspree、Netlify Forms 等第三方服務

---

## 🎯 效能優化建議

### 1. 啟用 HTTPS（自動）
GitHub Pages 自動提供免費 SSL 憑證

### 2. 圖片優化
如果未來新增圖片：
- 使用 TinyPNG 壓縮
- 考慮使用 WebP 格式
- 實作 lazy loading

### 3. 快取策略
GitHub Pages 會自動設定適當的快取標頭

### 4. CDN 資源
目前使用的外部資源：
- Tailwind CSS (CDN)
- jQuery (CDN)
- Font Awesome (CDN)
- Google Fonts (CDN)

這些都已經使用 CDN，載入速度很快。

---

## 📊 監控與分析

### Google Analytics（選用）

在 `</head>` 前加入：

```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

### GitHub Insights

在 repository 的 `Insights` 標籤可以查看：
- 訪問流量
- 來源統計
- 熱門內容

---

## 🔒 安全性

### GitHub Pages 安全特性

- ✅ 自動 HTTPS
- ✅ DDoS 保護
- ✅ 全球 CDN
- ✅ 自動備份（Git 版本控制）

### 注意事項

- ⚠️ 不要提交敏感資訊（API keys、密碼）
- ⚠️ 確認 `.gitignore` 設定正確
- ⚠️ Public repository 代碼公開可見

---

## 🎓 進階功能

### 使用 GitHub Actions 自動部署

可以設定自動化流程：
- 自動壓縮圖片
- 自動優化 CSS/JS
- 自動執行測試

### 整合表單服務

推薦免費服務：
1. **Formspree** - https://formspree.io
2. **Netlify Forms** - 需轉移到 Netlify
3. **Google Forms** - 嵌入 Google 表單

---

## 📞 需要協助？

- GitHub Pages 文件：https://docs.github.com/pages
- GitHub 社群：https://github.community
- Git 教學：https://git-scm.com/book/zh-tw/v2

---

**祝您部署順利！🚀**

部署完成後，您的 MOTO ZONE 網站將可以透過 `https://yager-boom.github.io/car/` 訪問！
