@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="top mb150">
        <div class="top__mv">
            <video src="{{ asset('video/top.mp4') }}" loop autoplay muted></video>
        </div>
        <header class="header">
            <div class="header__wrapper w1200">
                <div class="header-logo">
                    <h2 class="header-logo__h2"><a href="">大和基盤工業株式会社</a></h2>
                </div>

                <div class="hamburger" id="js-hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="header-nav" id="js-nav">
                    <ul class="header-nav__list">
                        <li><a href="">ホーム</a></li>
                        <li><a href="">事業紹介</a></li>
                        <li><a href="">施工実績</a></li>
                        <li><a href=""> 採用情報</a></li>
                        <li><a href=""> 地域貢献</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="top__txt">
            <h2 class="top__h2">あたりまえの毎日を、<br>揺るぎない技術で。</h2>
        </div>
    </div>

    <div class="business w1200 mb150">
        <div class="business__description mb50">
            <div class="ttl__wrapper">
                <div class="ttl">
                    <h2 class="ttl--ja">事業紹介</h2>
                    <span class="ttl--en">Business</span>
                </div>
            </div>
            <div class="business__txt">
                <h3 class="sub-ttl">何気ない日常を、盤石の基礎から支え続ける。</h3>
                <p>私たちが手がける道路、橋、河川。それらは完成した瞬間、人々の意識から消え、風景の一部となります。しかし、その「あたりまえ」が途切れることは、街の鼓動が止まることを意味します。<br>
                大和基盤工業株式会社は、目に見える華やかさよりも、何十年先も変わらない安全を追求してきました。地域に根ざし、地形を知り、気候を知る私たちだからこそできる施工がある。この街に暮らす人々の、何気ない今日を守り抜く。それが、公共インフラを担う私たちの誇りです。</p>
                <div class="btn"><a href="./">事業紹介</a></div>
            </div>
        </div>
        <div class="business-type">
            <div class="business-type__card">
                <div>
                    <img src="{{ asset('img/business-type1.jpg') }}" alt="">
                </div>
                <div class="business-type__txt">
                    <h3 class="sub-ttl"><span>01</span>土木事業</h3>
                    <figcaption>街の骨格を造り、100年先の安心を築きます。<br>
                    橋梁や河川など、街の基礎となるインフラを構築。<br>
                    見えない場所にこそ、揺るぎない技術と誇りを込めています。</figcaption>
                </div>
            </div>
            <div class="business-type__card">
                <div>
                    <img src="{{ asset('img/business-type2.jpg') }}" alt="">
                </div>
                <div class="business-type__txt">
                    <h3 class="sub-ttl"><span>02</span>舗装事業</h3>
                    <figcaption>一番身近な「あたりまえ」を、どこまでも心地よく。<br>
                    誰もが通るその道を、もっと安全に、もっと美しく。<br>
                    確かな施工精度で、日々のスムーズな移動を支えます。</figcaption>
                </div>
            </div>
            <div class="business-type__card">
                <div>
                    <img src="{{ asset('img/business-type3.jpg') }}" alt="">
                </div>
                <div class="business-type__txt">
                    <h3 class="sub-ttl"><span>03</span>災害復旧</h3>
                    <figcaption>この街の「もしも」を、「いつもの毎日」へ。<br>
                    地域の守り手として、有事の際は迅速に現場へ。<br>
                    一日も早い復旧を目指し、街の安心を取り戻します。</figcaption>
                </div>
            </div>
        </div>
    </div>

    <div class="works w1200 mb150">
        <div class="ttl mb50 txt-center">
            <h2 class="ttl--ja">施工事例</h2>
            <span class="ttl--en">Works</span>
        </div>
        <div class="works-case mb50">
            <div class="works-case__card">
                <div class="works-case__img">
                    <img src="{{ asset('img/works1.jpg') }}" alt="">
                </div>
                <div class="works-case__txt">
                    <span class="works-case__category">道路</span>
                    <h3>S-5ブロック内舗装復旧工事</h3>
                </div>
            </div>
            <div class="works-case__card">
                <div class="works-case__img">
                    <img src="{{ asset('img/works2.jpg') }}" alt="">
                </div>
                <div class="works-case__txt">
                    <span class="works-case__category">民間</span>
                    <h3>住宅１号館外壁改修その他工事</h3>
                </div>
            </div>
            <div class="works-case__card">
                <div class="works-case__img">
                    <img src="{{ asset('img/works3.jpg') }}" alt="">
                </div>
                <div class="works-case__txt">
                    <span class="works-case__category">道路</span>
                    <h3>S-7ブロック内舗装復旧工事</h3>
                </div>
            </div>
            <div class="works-case__card">
                <div class="works-case__img">
                    <img src="{{ asset('img/works4.jpg') }}" alt="">
                </div>
                <div class="works-case__txt">
                    <span class="works-case__category">公共</span>
                    <h3>小中一貫校第２運動場クラブ室棟設置工事</h3>
                </div>
            </div>
        </div>
        <div class="txt-center">
            <div class="btn"><a href="./">施工事例</a></div>
        </div>
    </div>

    <div id="bc-slide" class="recruit mb150">
        <div class="bc-slide__wrapper">
            <div class="bc-slide__flex">
                <div class="bc-slider__box">
                    <div class="ttl">
                        <h2 class="ttl--ja">採用情報</h2>
                        <span class="ttl--en">Recruit</span>
                        <div class="btn"><a href="./">採用情報</a></div>
                    </div>
                    <div class="bc-slide__img">
                        <img src="{{ asset('img/staff1.jpg') }}" alt="">
                        <img src="{{ asset('img/staff2.jpg') }}" alt="">
                        <img src="{{ asset('img/staff3.jpg') }}" alt="">
                    </div>
                </div>
                <div class="bc-slide__description">
                    <h2 class="bc-slide__h2">君の手が、<br>この街の地図を更新する。</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="sdgs w1200 mb150">
        <div class="sdgs__txt mb50">
            <div class="ttl2">
                <h2><span class="ttl--en">SDGs</span>
                    <span class="ttl--ja">地域貢献</span>
                </h2>
            </div>
            <div class="">
                <div class="btn"><a href="./">地域貢献</a></div>
            </div>
        </div>
        <div class="slider mb50">
            <div class="slider-track">
                <!-- 1セット目の画像 -->
                <div class="slide"><img src="{{ asset('img/slide1.jpg') }}" alt=""></div>
                <div class="slide"><img src="{{ asset('img/slide2.jpg') }}" alt=""></div>
                <div class="slide"><img src="{{ asset('img/slide3.jpg') }}" alt=""></div>
                <div class="slide"><img src="{{ asset('img/slide4.jpg') }}" alt=""></div>
                <div class="slide"><img src="{{ asset('img/slide5.jpg') }}" alt=""></div>

                <!-- 無限ループ用に全く同じ画像をもう1セット用意する -->
                <div class="slide"><img src="{{ asset('img/slide1.jpg') }}" alt=""></div>
                <div class="slide"><img src="{{ asset('img/slide2.jpg') }}" alt=""></div>
                <div class="slide"><img src="{{ asset('img/slide3.jpg') }}" alt=""></div>
                <div class="slide"><img src="{{ asset('img/slide4.jpg') }}" alt=""></div>
                <div class="slide"><img src="{{ asset('img/slide5.jpg') }}" alt=""></div>
            </div>
        </div>
    </div>

    <div class="contact mb150 w1200">
        <div class="contact__wrapper">
            <div class="ttl mb50 txt-center">
                <h2 class="ttl--ja">お問い合わせ</h2>
                <span class="ttl--en">Contact us</span>
            </div>
            <div class="contact__description mb50">
                <p>公共工事の施工実績や、技術的な仕様についてご相談・ご質問等ございましたらどうぞお気軽にお問い合わせください。<br>情報収集の段階からでも、専任の技術担当者がしっかりと伴走いたします。
                </p>
            </div>
            <div class="contact__content">
                <div class="contact__img">
                    <img src="{{ asset('img/contact.jpg') }}" alt="">
                </div>
                <div class="contact__detail txt-center">
                    <p class="contact__tel"><i class="fa-solid fa-phone"></i> <a href="tel:ooooooooo">ooooooooo</a></p>
                    <div class="btn"><a href="./">お問い合わせ</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('java')
    <script>
        const images = [
            "{{ asset('img/bc-slide1.jpg') }}",
            "{{ asset('img/bc-slide2.jpg') }}",
            "{{ asset('img/bc-slide3.jpg') }}"
        ];

        let currentIndex = 0;
        const slideElement = document.getElementById('bc-slide');

        function changeBackground() {
        // 背景画像を切り替え
        slideElement.style.backgroundImage = `url(${images[currentIndex]})`;

        // 次の画像のインデックスに進む（最後まで行ったら0に戻る）
        currentIndex = (currentIndex + 1) % images.length;
        }

        // 最初に1回実行し、その後3秒ごとに繰り返す
        changeBackground();
        setInterval(changeBackground, 3000);
    </script>

    <script>
        const hamburger = document.getElementById('js-hamburger');
        const nav = document.getElementById('js-nav');

        hamburger.addEventListener('click', () => {
            // ボタンとメニューの両方に is-active を付与・削除
            hamburger.classList.toggle('is-active');
            nav.classList.toggle('is-active');
        });
    </script>
@endsection