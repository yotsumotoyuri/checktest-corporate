<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer__bc">
            <div class="footer__wrapper w1200">
                <div class="footer-logo">
                    <h2 class="footer-logo__h2"><a href="">大和基盤工業株式会社</a></h2>
                    <div class="footer__address">
                        <p>鹿児島県鹿児島市</p>
                        <p><i class="fa-solid fa-phone"></i> <a href="tel:ooooooooo">ooooooooo</a></p>
                    </div>
                </div>
                <div class="footer-nav">
                    <ul class="footer-nav__list">
                        <li><a href="">ホーム</a></li>
                        <li><a href="">事業紹介</a></li>
                        <li><a href="">施工実績</a></li>
                        <li><a href=""> 採用情報</a></li>
                        <li><a href=""> 地域貢献</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    @yield('java')
</body>
</html>