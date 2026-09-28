# 大和基盤工業株式会社 - インフラ・土木・建設系工業会社
「あたりまえの毎日を、揺るぎない技術で。」をコンセプトにした、架空のインフラ・土木・建設系工業会社「大和基盤工業株式会社」のコーポレートサイトです。
技術力と安心感を視覚的に伝えるデザインを意識して制作しました。
本プロジェクトはポートフォリオとして制作しました。

## 使用技術(実行環境)
- サーバーサイド: Laravel 10.x (PHP 8.x)
- フロントエンド: HTML5, CSS3, JavaScript (Vanilla)
- インフラ: Docker / Laravel Sail

## 実装における注力ポイント
- レスポンシブデザインの完全対応:
  - PC/タブレット/スマホそれぞれのデバイスに最適化したレイアウト。
  - スマホ時には専用のハンバーガーメニューを実装。
- JavaScriptアニメーション:
  - CSSアニメーションを組み合わせた無限ループスライダーを実装し、視覚的なインパクトを創出。
- CSS設計:
  - アスペクト比（aspect-ratio）を保持した画像配置により、画像が崩れない柔軟なコーディング。
  - ホバーエフェクト（ボタン、画像ズーム）による操作感の向上。

## ページ構成
トップページ (Main Showcase): 事業紹介・施工事例・採用情報・地域貢献。

## セットアップ（初回のみ）
1. `cp .env.example .env`
2. `composer install` （またはDocker経由のインストール）
3. `./vendor/bin/sail up -d`
4. `./vendor/bin/sail artisan key:generate`
5. `./vendor/bin/sail artisan migrate:fresh --seed`

## 起動・動作確認
1. ターミナルで `./vendor/bin/sail up -d` を実行。
2. ブラウザで [http://localhost/](http://localhost/) にアクセス。

## 画面イメージ
- トップページ
    ![画面](img/top_screen.png)