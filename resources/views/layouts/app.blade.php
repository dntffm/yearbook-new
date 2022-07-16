<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Security-Policy" content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval' http://yearbookumb.com">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <title>{{ config('app.name', 'YearBook Website - Universitas Mercu Buana') }}</title>



    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light background-umb shadow-sm">

            <div class="container">

                <a class="navbar-brand text-center" href="{{ url('/') }}">
			
			        <img src="{{url('storage/image/Logo_UMB_Putih_besar.png')}}" alt="logo-image" height="80">

                </a>

                <p class="mt-3 text-green">YEARBOOK WISUDAWAN <br> Universitas Mercu Buana</p>

                @can('add pdf')

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">

                            <span class="navbar-toggler-icon"></span>

                        </button>
                
                @endcan

                @can('add pdf')

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">



                    </ul>



                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->

                        @guest

                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                                </li>

                            @endif

                        @else

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ Auth::user()->name }} <span class="caret"></span>

                                </a>



                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Logout') }}

                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                        @csrf

                                    </form>

                                </div>

                            </li>

                        @endguest

                    </ul>

                </div>

                @endcan

            </div>

        </nav>



        <main>

            @yield('content')

        </main>

        <footer class="main-footer background-umb pt-5 pb-5">

            <div class="container">

                <div class="footer-content">

                    <div class="row">

                        <div class="col-lg-3 col-md-6 col-sm-12">

                            <div class="logo-widget footer-widget">

                                <figure class="logo-box"><a href="https://yearbookumb.com"><img src="../storage/image/Logo_UMB_Putih_besar.png" alt="" height="150"></a></figure>

                                {{-- <ul class="footer-social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul> --}}

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12 footer-widget">

                            <div class="contact-widget footer-widget">

                                <div class="footer-title mb-3 text-green">UMB Meruya</div>

                                <div class="text-white">

                                    <p>Jl. Meruya Selatan No.1, Kembangan - Jakarta Barat</p>

                                    <p>Telepon: 021-5840815, 021-5840816</p>

                                    <p>(ext.2751, ext.2400) Fax: 021-5861780</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-12 footer-widget">

                            <div class="contact-widget footer-widget">

                                <div class="footer-title mb-3 text-green">UMB Jati Sampurna</div>

                                <div class="text-white">

                                    <p>Jl. Raya Kranggan No.6 Jatisampurna - Bekasi</p>

                                    <p>Telepon: 021-58449635</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-12 footer-widget">

                            <div class="contact-widget footer-widget">

                                <div class="footer-title mb-3 text-green">UMB Menteng</div>

                                <div class="text-white">

                                    <p>Jl. Menteng Raya No.29 - Jakarta Pusat</p>

                                    <p>Telepon: 021-31935454</p>

                                    <p>Fax: 021-31934474</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-12 footer-widget">

                            <div class="contact-widget footer-widget">

                                <div class="footer-title mb-3 text-green">UMB Warung Buncit</div>

                                <div class="text-white">

                                    <p>Jl. Warung Buncit No.98 - Jakarta Selatan</p>

                                    <p>Telepon: +62 8177 6631 933</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-12 footer-widget">

                            <div class="contact-widget footer-widget">

                                <div class="footer-title mb-3 text-green">Link Lainnya</div>

                                <div class="text-white">

                                    <a class="text-white" href="{{url('archive')}}">Archive</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </footer>

        <div class="footer-bottom">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12 col-md-6 col-sm-12 m-3">

                        <div class="text-black text-center"><a href="https://yearbookumb.com">COPYRIGHT</a> &copy; UNIVERSITAS MERCU BUANA, 2022 All Right Reserved</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>

