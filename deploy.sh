#!/bin/bash

# MOTO ZONE - GitHub Pages 快速部署腳本
# 使用方式: ./deploy.sh "commit message"

echo "🏍️  MOTO ZONE - GitHub Pages 部署工具"
echo "======================================"

# 檢查是否已初始化 git
if [ ! -d .git ]; then
    echo "📦 初始化 Git repository..."
    git init
    echo "✅ Git 初始化完成"
fi

# 檢查是否已設定 remote
if ! git remote | grep -q "origin"; then
    echo ""
    echo "⚠️  尚未設定 GitHub remote"
    echo "請先在 GitHub 建立 repository，然後執行："
    echo "git remote add origin https://github.com/Yager-Boom/car.git"
    echo ""
    read -p "請輸入您的 GitHub repository URL: " repo_url
    git remote add origin "$repo_url"
    echo "✅ Remote 設定完成"
fi

# 取得 commit message
if [ -z "$1" ]; then
    commit_msg="Update: $(date '+%Y-%m-%d %H:%M:%S')"
else
    commit_msg="$1"
fi

echo ""
echo "📝 Commit message: $commit_msg"
echo ""

# 加入所有變更
echo "📦 加入變更的檔案..."
git add .

# 提交變更
echo "💾 提交變更..."
git commit -m "$commit_msg"

# 確保在 main 分支
current_branch=$(git branch --show-current)
if [ "$current_branch" != "main" ]; then
    echo "🔄 切換到 main 分支..."
    git branch -M main
fi

# 推送到 GitHub
echo "🚀 推送到 GitHub..."
git push -u origin main

echo ""
echo "✅ 部署完成！"
echo ""
echo "🌐 您的網站將在 1-3 分鐘後可以訪問："
echo "   https://yager-boom.github.io/car/"
echo ""
echo "📋 後續步驟："
echo "   1. 前往 https://github.com/Yager-Boom/car"
echo "   2. 點擊 Settings → Pages"
echo "   3. 確認 Source 設定為 'main' 分支"
echo "   4. 等待部署完成"
echo ""
