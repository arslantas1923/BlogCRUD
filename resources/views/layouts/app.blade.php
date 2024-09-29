<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title> Blog </title>
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="img/png" />
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="/assets/css/slick.css" />
    <link rel="stylesheet" href="/assets/css/jquery-nice-select.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
</head>


<body>


    <header class="sticky-header">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div class="site-logo">
                    <a href="/"><img src="/assets/img/logo.png" alt="Logo"></a>
                </div>
                <div class="header-right">

                    <div class="offcanvas-panel">
                        <a href="javascript:void(0)" class="panel-btn">
                            <span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                        <div class="panel-overly"></div>
                        <div class="offcanvas-items">

                            <a href="javascript:void(0)" class="panel-close">
                                Menüyü Kapat <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>

                            <ul class="offcanvas-menu">
                                <li>
                                    <a href="{{ route('home') }}">ANASAYFA</a>
                                </li>
                                <li>
                                    <a href="{{ route('posts.index') }}">YAZILAR</a>
                                </li>
                                <li>
                                    <a href="{{ route('categories.index') }}">KATEGORİLER</a>
                                    <ul class="submenu">
                                        @foreach ($allCategories as $category)
                                        <li><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <!-- Eğer kullanıcı giriş yapmamışsa "Kayıt Ol" ve "Giriş Yap" menüleri göstereceğim -->
                                @guest
                                <li>
                                    <a href="{{ route('register') }}">KAYIT OL</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}">GİRİŞ YAP</a>
                                </li>
                                @else
                                <!-- Kullanıcı giriş yaptıysa çıkış yap menüsünü göstereceğim -->
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        ÇIKIŞ YAP
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @endguest
                            </ul>


                            <div class="social-icons">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    @yield('content')


    <footer>
        <div class="footer-widgets-area">
            <div class="container container-1360">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget address-widget">
                            <h4 class="widget-title">Adres</h4>
                            <p>Kayseri Melikgazi</p>
                            <p>0553 361 03 89 <br> mustafa@alestamedya.com</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="widget nav-widget">
                            <h4 class="widget-title">Hızlı Linkler</h4>
                            <ul>
                                <li><a href="{{ route('home') }}">ANASAYFA</a></li>
                                <li><a href="{{ route('posts.index') }}">YAZILAR</a></li>
                                <li><a href="{{ route('categories.index') }}">KATEGORİLER</a></li>
                                <li><a href="{{ route('register') }}">KAYIT OL</a></li>
                                <li><a href="{{ route('login') }}">GİRİŞ YAP</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="widget nav-widget">
                            <h4 class="widget-title">Kategoriler</h4>
                            <ul>
                                @foreach ($topCategories as $category)
                                <li>
                                    <a href="{{ route('categories.show', $category->id) }}">
                                        {{ $category->name }} ({{ $category->posts_count }})
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 ml-auto">
                        <div class="widget newsletter-widget">
                            <h4 class="widget-title">Aylık Bülten </h4>
                            <p>
                                Makaleler, röportajlar ve etkinlikler hakkında güncellemeler almak için kaydolun.
                            </p>
                            <form action="{{ route('subscribe') }}" method="POST">
                                @csrf
                                <input type="email" name="email" placeholder="Email Adresiniz" required>
                                <button type="submit">Bültene Abone Ol</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container container-1360">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="social-links">
                            <ul>
                                <li class="title">Sosyal Medya:</li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Youtube</a></li>
                                <li><a href="#">Instagram</a></li>
                                <li><a href="#">Linkedin</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="copyright-text text-lg-right">
                            <p><span>Copyright</span> - 2024 Mustafa ARSLANTAŞ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/slick.min.js"></script>
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/js/isotope.pkgd.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>