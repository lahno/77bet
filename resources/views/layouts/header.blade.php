@php
    if ($settings){
        $phone = str_replace(['(',')','-', ' '], "", $settings->phone);
    }else{
        $phone = 0;
    }
@endphp

@if(Route::currentRouteName() == 'index')
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header_container">
                        <div class="logo">
                            <a href="/">
                                <img src="{{asset('img/logo.png')}}" alt="logo" class="img-fluid">
                                <div class="logo-caption">{{env('APP_NAME')}}</div>
                            </a>
                        </div>
                        <div class="socials-menu__wrapper">
                            <ul class="cocials-menu">
                                <li><a href="{{($settings)?$settings->telegram_link:''}}"><i class="fab fa-telegram-plane"></i></a></li>
                                <li><a href="{{($settings)?$settings->fb_link:''}}"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                            <ul class="cocials-menu">
                                <li><a href="{{($settings)?$settings->vk_link:''}}"><i class="fab fa-vk"></i></a></li>
                                <li><a href="{{($settings)?$settings->instagram_link:''}}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        @auth
                            <ul class="menu">
                                <li class="menu_item active"><a href="tel:{{$phone}}"><i class="fas fa-phone"></i> {{($settings)?$settings->phone:''}}</a></li>
                            </ul>
                            <div class="user-info">
                                <i class="fas fa-user"></i>&nbsp;&nbsp;<span>{{ Auth::user()->name }} {{(Auth::user()->adm)?'(Admin)':''}}</span>
                                <div class="logout animated fadeInDown">
                                    <ul>
                                        <li><a href="{{route('account')}}">Личный кабинет</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Выход
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <ul class="menu">
                                <li class="menu_item active"><a href="tel:{{$phone}}"><i class="fas fa-phone"></i> {{($settings)?$settings->phone:''}}</a></li>
                                <li class="menu_item"><a href="#current_bids" class="scrollto">Ставки</a></li>
                                <li class="menu_item"><a href="#upcoming_competitions" class="scrollto">Анонасы </a></li>
                                <li class="menu_item"><a href="#more_information" class="scrollto">Информация</a></li>
                            </ul>
                            <div class="btn__transparent" data-toggle="modal" data-target="#modal_authorization">Войти</div>
                        @endauth

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <div class="hambur hidden-lg hidden-md hidden-sm text-right">
                            <button class="hamburger hamburger--emphatic js-hamburger" type="button" aria-label="Menu" aria-controls="navigation">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- hamburger-menu -->
        <nav>
            <div class="container">
                <div class="row">
                    <ul id="hamburger__sidebar">
                        <li class="hamburger__navigation__items item_first"><a href="#current_bids" class="scrollto">Ставки</a></li></li>
                        <li class="hamburger__navigation__items"><a href="#upcoming_competitions" class="scrollto">Анонасы </a></li>
                        <li class="hamburger__navigation__items"><a href="#more_information" class="scrollto">Информация</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
@else
    <header id="header_cabinet">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-container">
                            <div class="header-top-left">
                                <div class="logo">
                                    <a href="/">
                                        <img src="{{asset('img/logo.png')}}" alt="logo" class="img-fluid">
                                        <div class="logo-caption">{{env('APP_NAME')}}</div>
                                    </a>
                                </div>
                                <div class="socials-menu__wrapper">
                                    <ul class="cocials-menu">
                                        <li><a href="{{($settings)?$settings->telegram_link:''}}"><i class="fab fa-telegram-plane"></i></a></li>
                                        <li><a href="{{($settings)?$settings->fb_link:''}}"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                    <ul class="cocials-menu">
                                        <li><a href="{{($settings)?$settings->vk_link:''}}"><i class="fab fa-vk"></i></a></li>
                                        <li><a href="{{($settings)?$settings->instagram_link:''}}"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <ul class="menu">
                                    <li class="menu_item active"><a href="tel:{{$phone}}"><i class="fas fa-phone"></i> {{($settings)?$settings->phone:''}}</a></li>
                                </ul>
                            </div>

                            <div class="user-info">
                                <i class="fas fa-user"></i>&nbsp;&nbsp;<span>{{ Auth::user()->name }} {{(Auth::user()->adm)?'(Admin)':''}}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-container__bottom">
                            <div class="cabinet-caption"><a href="{{route('account')}}">Личный кабинет</a></div>
                            <div class="cabinet-exit">
                                <a href="/"><i class="fas fa-arrow-left"></i></a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- hamburger-menu -->
        <nav>
            <div class="container">
                <div class="row">
                    <ul id="hamburger__sidebar">
                        <li class="hamburger__navigation__items item_first"><a href="#current_bids" class="scrollto">Ставки</a></li></li>
                        <li class="hamburger__navigation__items"><a href="#upcoming_competitions" class="scrollto">Анонасы </a></li>
                        <li class="hamburger__navigation__items"><a href="#more_information" class="scrollto">Информация</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
@endif


