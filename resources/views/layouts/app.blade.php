<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="All the latest news from your favorite outlets ranging from Entertainment, Business, Sports and more all in one place.">
    <!-- <meta http-equiv="refresh" content="30"> -->

    <title>{{ config('app.name', 'Gnewsly') }} - Get the latest news delivered to you</title>

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="red">
    <meta name="apple-mobile-web-app-title" content="FreeCodeCamp">
    <link rel="apple-touch-icon" href="/img/icons/icon-72x72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="/img/icons/icon-96x96.png" sizes="96x96">
    <link rel="apple-touch-icon" href="/img/icons/icon-128x128.png" sizes="128x128">
    <link rel="apple-touch-icon" href="/img/icons/icon-144x144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="/img/icons/icon-152x152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="/img/icons/icon-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/img/icons/icon-384x384.png" sizes="384x384">
    <link rel="apple-touch-icon" href="/img/icons/icon-512x512.png" sizes="512x512">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/websocket.js') }}" defer></script>
    <script src="{{ asset('js/menuScript.js') }}" defer></script>
    <script src="{{ asset('js/infiniteScroll.js') }}" defer></script>
    <script src="{{ asset('js/searchfor_article.js') }}" defer></script>
    <script src="{{ asset('js/effects.js') }}" defer></script>
    <script src="lib/jscroll/dist/jquery.jscroll.min.js" defer></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-messaging.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-analytics.js"></script>
    <script type="text/javascript" src="js/survey.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" type="image/jpg" href="img/Gnewsly3-02.png"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu_styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/articleView.css') }}" rel="stylesheet">
    <link href="{{ asset('css/effects.css') }}" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="template/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="lib/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="lib/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="lib/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="template/css/util.min.css">
    <link rel="stylesheet" type="text/css" href="template/css/main.css">
    <link rel="manifest" href="manifest.json">

</head>
<body >
    
    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">

            <!-- Header Mobile -->
            <div class="wrap-header-mobile">
                <!-- Logo moblie -->        
                <div class="logo-mobile">
                    <!-- <a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a> -->
                    <!-- <a href="{{ url('/mainpage') }}" id="logo">Gnewsly</a> -->
                    <a href="{{ url('/mainpage') }}"><img src="img/Gnewsly2-02.png" style="height: 140px;width: 160px; " alt="IMG-LOGO"></a>
                </div>

                <!-- Button show menu -->
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div class="menu-mobile">
        
                <ul class="main-menu-m">
                    <li>
                        <a href="{{ url('/mainpage') }}">Home</a>
                       <!--  <ul class="sub-menu-m">
                            <li><a href="index.html">Homepage v1</a></li>
                            <li><a href="home-02.html">Homepage v2</a></li>
                            <li><a href="home-03.html">Homepage v3</a></li>
                        </ul> -->

                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>

                    <li>
                        <a href="{{url('/category?source=News')}}">News</a>
                    </li>

                    <li>
                        <a href="{{url('/category?source=Entertainment')}}">Entertainment </a>
                    </li>

                    <li>
                        <a href="{{url('/category?source=Business')}}">Business</a>
                    </li>

                    <li>
                        <a href="{{url('/category?source=Travel')}}">Travel</a>
                    </li>

                    <li>
                        <a href="{{url('/category?source=Technology')}}">Technology</a>
                    </li>

                    <li>
                        <a href="{{url('/category?source=Sports')}}">Sports</a>
                    </li>
 
                </ul>
            </div>
            
            <!--  -->
            <div class="wrap-logo container">
                <!-- Logo desktop -->       
                <div class="logo">
                    <!-- <a href="index.html"><img src="images/icons/logo-01.png" alt="LOGO"></a> -->
                    <!-- <a href="{{ url('/mainpage') }}" id="logo">Gnewsly</a> -->
                    <a href="{{ url('/mainpage') }}"><img src="img/Gnewsly2-02.png" style="height: 180px;width: 160px;" alt="IMG-LOGO"></a>
                </div>  

                <!-- Banner -->
                <!-- <div class="banner-header">
                    <a href="#"><img src="images/banner-01.jpg" alt="IMG"></a>
                </div> -->
            </div>  
            
            <!--  -->
            <div class="wrap-main-nav">
                <div class="main-nav">
                    <!-- Menu desktop -->
                    <nav class="menu-desktop">
                        <a class="logo-stick" href="{{ url('/mainpage') }}" >
                            <!-- <img src="images/icons/logo-01.png" alt="LOGO"> -->
                            <img src="img/Gnewsly2-02.png" style="height: 180px;width: 160px;" alt="IMG-LOGO">
                        </a>

                        <ul class="main-menu">
                            <li class="main-menu-active">
                                <a href="{{ url('/mainpage') }}">Home</a>
                               <!--  <ul class="sub-menu">
                                    <li><a href="index.html">Homepage v1</a></li>
                                    <li><a href="home-02.html">Homepage v2</a></li>
                                    <li><a href="home-03.html">Homepage v3</a></li>
                                </ul> -->
                            </li>

                            <li class="mega-menu-item">
                                <a href="{{url('/category?source=News')}}">News</a>

                            </li>

                            <li class="mega-menu-item">
                                <a href="{{url('/category?source=Entertainment')}}">Entertainment </a>

                            </li>

                            <li class="mega-menu-item">
                                <a href="{{url('/category?source=Business')}}">Business</a>

                            </li>

                            <li class="mega-menu-item">
                                <a href="{{url('/category?source=Travel')}}">Travel</a>

                            </li>

                            <li class="mega-menu-item">
                                <a href="{{url('/category?source=Technology')}}">Technology</a>

                            </li>

                            <li class="mega-menu-item">
                                <a href="{{url('/category?source=Sports')}}">Sports</a>

                            </li>

                            
                        </ul>
                    </nav>
                </div>
            </div>  
        </div>
    </header>

    <!-- Headline -->
    <main class="py-4">
            @yield('content')
    </main>

    <!-- Post -->
    

    <!-- Banner -->
    <!-- <div class="container">
        <div class="flex-c-c">
            <a href="#">
                <img class="max-w-full" src="images/banner-01.jpg" alt="IMG">
            </a>
        </div>
    </div> -->



    <!-- Footer -->
    <footer>

        <div class="bg11">
            <div class="container size-h-4 flex-c-c p-tb-15">
                <span class="f1-s-1 cl0 txt-center">
                    <a href="#" class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>&nbsp;<span>Gnewsly</span>. All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </span>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <span class="fa fa-angle-up"></span>
        </span>
    </div>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>


    <script src="lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="lib/animsition/js/animsition.min.js"></script>
    <script src="lib/bootstrap/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="template/js/main.js"></script>
    <script src="js/articles_push_notification.js" type="text/javascript"></script>

</body>
</html>
