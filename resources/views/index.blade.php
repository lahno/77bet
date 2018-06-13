@extends('layouts.site')

@section('header')
    {!! $header !!}
@endsection

@section('content')

    <section id="first">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1>
                        Начни Зарабатывать уже сегодня<br> на спортивных событиях<br>с нашими прогнозами
                    </h1>
                    <h3>
                        Заказывай лучшие прогнозы на матчи<br> от профессиональных аналитиков<br> и зарабатывай уже сегодня
                    </h3>
                    <a href="#" class="btn__orange">Купить прогноз</a>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <img class="section-img" src="{{asset('img/first.png')}}" alt="Спортивные ставки">
                </div>
            </div>
        </div>
    </section>

    <section id="confidence">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Почему нам доверяют</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="confidence-item">
                        <p class="confidence-item__value" id="persent"><span>1</span>%</p>
                        <p class="confidence-item__text">Точность прогнозов</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="confidence-item">
                        <p class="confidence-item__value" id="gain"><span>19903</span>р</p>
                        <p class="confidence-item__text">Средний выигрыш</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="confidence-item">
                        <p class="confidence-item__value" id="number_bets"><span>1403</span></p>
                        <p class="confidence-item__text">Ставок ежедневно</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="current_bids">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Актуальные ставки</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="curent-bibs__slider text-center">
                        @php
                            $array = ['number_one', 'vip', 'bibs-day'];
                        @endphp
                        @foreach($rates as $rate)
                            @if(Carbon\Carbon::now() < $rate->date_left)
                            <div class="slider-item {{$array[array_rand($array)]}}" id="rate_list_{{$rate->id}}">
                                <div class="slider-item__wrapper">
                                    <div class="item-row">
                                        <div class="characteristic-type">
                                            <p>{{$rate->label}}</p>
                                        </div>
                                        <div class="characteristic">
                                            <p>Осталось времени - </p>
                                        </div>
                                        <div class="characteristic-value">
                                            @php
                                                Carbon\Carbon::setLocale('ru');
                                                $cDate = Carbon\Carbon::parse($rate->date_left);
                                                $difference = $cDate->diffForHumans(null, true);
                                            @endphp
                                            <p>{{$difference}}</p>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <div class="characteristic-type">
                                            <p></p>
                                        </div>
                                        <div class="characteristic">
                                            <p>Коэффициент - </p>
                                        </div>
                                        <div class="characteristic-value">
                                            <p><span>{{$rate->coefficient}}</span></p>
                                        </div>
                                    </div>
                                    <div class="item-row">
                                        <div class="characteristic-type">
                                            <p></p>
                                        </div>
                                        <div class="characteristic">
                                            <p>Вероятность прогноза - </p>
                                        </div>
                                        <div class="characteristic-value">
                                            <p><span>{{$rate->chance}}</span>%</p>
                                        </div>
                                    </div>
                                    <div class="item-row justify-content-center">
                                        <p class="bids-cost"><span>{{$rate->cost}}</span>&nbsp;<i class="fas fa-ruble-sign"></i></p>
                                    </div>
                                    <div class="item-row justify-content-center">
                                        <span class="rate_name d-none">{{$rate->name}}</span>
                                        <span class="rate_id d-none">{{$rate->id}}</span>
                                        <span class="rate_cost d-none">{{$rate->cost}}</span>
                                        @auth
                                            <span class="rate_email d-none">{{Auth::user()->email}}</span>
                                        @endauth
                                        <a class="btn__orange hvr-radial-in {{(Auth::user())?'btn_pay':'btn_pay_noauth'}}">Купить ставку</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="discounts_subscribers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Скидки для наших подписчиков</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <p class="discounts-text">Подпишись на наш  Telegram - канал и получи<br> промо-код на скидку при покупке прогноза<br>или ставки на спортивное событие</p>
                    <a href="{{($settings)?$settings->telegram_link:''}}" class="btn__transparent">
                        <i class="fab fa-telegram-plane"></i>Подписаться
                    </a>
                </div>
                <div class="col-lg-4">
                    {{--<form action="#" id="form_promocode">
                        <input type="text" name="number" placeholder="Ваш промо-код" required>
                        <button type="submit" class="btn__transparent">Использовать промо-код</button>
                    </form>--}}
                </div>
            </div>
        </div>
    </section>

    @if($settings->view_block_games)
    <section id="upcoming_competitions">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Ближайшие соревнования</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="upcoming_competitions__slider">
                        <div class="slider-item">
                            <div class="row align-items-stretch">

                                @foreach($games as $key => $game)
                                    @switch($key)
                                        @case(0)
                                        <div class="col-lg-4">
                                            <div class="slider-item__news news_1">
                                                @if($game->link)
                                                <a href="{{$game->link}}">
                                                    <img src="{{asset($game->img)}}" alt="Новость" class="img-fluid">
                                                    <h3>{{$game->competition}}</h3>
                                                    <p class="news-text">{{$game->title}}</p>
                                                    <p class="news-data">{{$game->date}}</p>
                                                </a>
                                                @else
                                                    <a>
                                                        <img src="{{asset($game->img)}}" alt="Новость" class="img-fluid">
                                                        <h3>{{$game->competition}}</h3>
                                                        <p class="news-text">{{$game->title}}</p>
                                                        <p class="news-data">{{$game->date}}</p>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        @break

                                        @case(1)
                                        <div class="col-lg-5">
                                            <div class="slider-item__news news_2">
                                                @if($game->link)
                                                    <a href="{{$game->link}}">
                                                        <img src="{{asset($game->img)}}" alt="Новость" class="img-fluid">
                                                        <h3>{{$game->competition}}</h3>
                                                        <p class="news-text">{{$game->title}}</p>
                                                        <p class="news-data">{{$game->date}}</p>
                                                    </a>
                                                @else
                                                    <a>
                                                        <img src="{{asset($game->img)}}" alt="Новость" class="img-fluid">
                                                        <h3>{{$game->competition}}</h3>
                                                        <p class="news-text">{{$game->title}}</p>
                                                        <p class="news-data">{{$game->date}}</p>
                                                    </a>
                                                @endif
                                            </div>
                                        @break

                                        @case(2)
                                            <div class="slider-item__news news_3">
                                                @if($game->link)
                                                    <a href="{{$game->link}}">
                                                        <img src="{{asset($game->img)}}" alt="Новость" class="img-fluid">
                                                        <h3>{{$game->competition}}</h3>
                                                        <p class="news-text">{{$game->title}}</p>
                                                        <p class="news-data">{{$game->date}}</p>
                                                    </a>
                                                @else
                                                    <a>
                                                        <img src="{{asset($game->img)}}" alt="Новость" class="img-fluid">
                                                        <h3>{{$game->competition}}</h3>
                                                        <p class="news-text">{{$game->title}}</p>
                                                        <p class="news-data">{{$game->date}}</p>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        @break

                                        @case(3)
                                        <div class="col-lg-3">
                                            <div class="slider-item__news news_4">
                                                @if($game->link)
                                                    <a href="{{$game->link}}">
                                                        <img src="{{asset($game->img)}}" alt="Новость" class="img-fluid">
                                                        <h3>{{$game->competition}}</h3>
                                                        <p class="news-text">{{$game->title}}</p>
                                                        <p class="news-data">{{$game->date}}</p>
                                                    </a>
                                                @else
                                                    <a>
                                                        <img src="{{asset($game->img)}}" alt="Новость" class="img-fluid">
                                                        <h3>{{$game->competition}}</h3>
                                                        <p class="news-text">{{$game->title}}</p>
                                                        <p class="news-data">{{$game->date}}</p>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="telegram-news">
                                                <p>Больше новостей на нашем</p>
                                                <a href="{{($settings)?$settings->telegram_link:''}}"><i class="fab fa-telegram-plane"></i>&nbsp;Telegram-канале</a>
                                            </div>
                                        </div>
                                        @break

                                        @default

                                    @endswitch
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section id="live" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Live Ставки</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="live-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolorLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        </p>
                        <p>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.e magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.
                        </p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="news-wrapper">
                        <a href="#" class="live-news-block news_1">
                            <h3>Футбол</h3>
                            <p class="news-caption">Чемпионат мира 2018</p>
                            <p class="news-data">26.09.2018</p>
                            <p class="news-main-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </a>
                        <a href="#" class="live-news-block news_2">
                            <h3>Футбол</h3>
                            <p class="new-caption">Чемпионат мира 2018</p>
                            <p class="news-data">26.09.2018</p>
                            <p class="news-main-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
                        </a>
                        <a href="#" class="live-news-block news_3">
                            <h3>Футбол</h3>
                            <p class="new-caption">Чемпионат мира 2018</p>
                            <p class="news-data">26.09.2018</p>
                            <p class="news-main-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </a>
                        <a href="#" class="live-news-block news_4">
                            <h3>Футбол</h3>
                            <p class="new-caption">Чемпионат мира 2018</p>
                            <p class="news-data">26.09.2018</p>
                            <p class="news-main-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="statistics">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Статистика наших прогнозов</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="chart-wrapper">
                        <canvas id="myChart" width="400" height="400"></canvas>
                        <div id="accuracy_forecasts">Точность прогнозов&nbsp;&nbsp;<span>{{($settings)?$settings->graph_num_1:''}}</span>%</div>
                        {{--<div id="last_month">За последний месяц&nbsp;&nbsp;<span class="plus">+58</span>&nbsp;&nbsp;<span class="minus">-6</span></div>--}}
                        <div id="last_month">За последний месяц  <span class="plus">{{($settings)?$settings->graph_num_2:''}}</span></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="#" class="btn__orange">Купить прогноз</a>
            </div>
        </div>
    </section>

    <section id="more_information">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>О КОМПАНИИ:</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <p>
                        Мы аналитическая компания, которая занимается прогнозами на спортивные события более 3 лет.
                    </p>
                    <p class="q">
                       Что такое прогнозы? 
                    </p>
                    <p>
                        Прогноз- это точное указание, какая команда победит. Также может указываться счет или другие показатели, на которые делается ставка.
                    </p>
                    <p class="q">
                       От чего зависит точность прогнозов?
                    </p>
                    <p>
                       Точность напрямую зависит от знаний и опыта аналитиков, работающих в 77BET.
                    </p>
                    <p class="q">
                      Что нужно, чтобы сделать точный прогноз?
                    </p>
                    <p>
                       В первую очередь нужно хорошо разбираться в конкретном виде спорта. Необходимо проводить большую работу по сбору и анализу статистики. Поэтому, практически все прогнозы уникальны, и делаются на ограниченное число событий, но такой подход значительно увеличивает шансы положительного исхода
                    </p>
                     <p class="q">
                       Как делаются прогнозы? 
                    </p>
                    <p>
                      Сначала наши аналитики изучают общую статистику встреч команд. Для работы они используют все доступные данные о встречах этих команд за последние несколько лет. Учитываются показатели матчей в последний сезон, так как, например, одна из команд может стандартно выигрывать или наоборот проигрывать домашние игры. 
                    </p>
                    <p>
                      Смотрится также кадровое состояние команд, психологический настрой игроков. Ведь ключевые игроки могут быть травмированы, или отбывать дисквалификацию. 
                    </p>
                     <p class="q">
                       Кто составляет прогнозы?
                    </p>
                    <p>
                        Прогнозы составляют наши аналитики, которые всегда имеют непосредственное отношение к спорту, на который делаются прогнозы. Они разбираются в особенностях работы букмекерских контор и могут гарантировать вам прибыль. Наши прогнозы составляются лучшими аналитиками страны, поэтому 77BET показывает результат свыше 90%.
                    </p>
                     <p class="q">
                       Почему стоит выбрать именно 77BET?
                    </p>
                    <p>
                      Вы практически полностью устраняете риск ошибки при выборе события. У нас вы всегда сможете найти наилучшие платные данные. Использование подобной аналитики делает ставки надежным источником доходов.
                    </p>
                    <p>
                      Приобретайте у нас платные прогнозы на спорт. Так вы сможете гарантированно выигрывать у букмекера, при этом не теряя свои деньги, а наоборот, приумножая собственный доход.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('img/more_info.png')}}" alt="Немного" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section id="questions">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Часто задаваемые вопросы</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="drop-down-question first">
                        <i class="fas fa-caret-down"></i>
                        <h3 class="drop-down-question__caption">Что такое 77bet?</h3>
                        <p class="drop-down-question__answer">Это аналитическая компания, осуществляющая консультацию в мире спорта. Одним из главных правил наших работников является тщательный анализ каждого спортивного события и множество необычных приемов – которая дает нам, отличную проходимость, а вам возможность для заработка.</p>
                    </div>
                    <div class="drop-down-question">
                        <i class="fas fa-caret-down"></i>
                        <h3 class="drop-down-question__caption">Как купить прогноз?</h3>
                        <p class="drop-down-question__answer">Чтобы купить прогноз, Вам необходимо перейти на страницу Купить прогноз, выбрать нужный вам продукт указать почту и номер телефона и нажать кнопку "купить"</p>
                    </div>
                    <div class="drop-down-question">
                        <i class="fas fa-caret-down"></i>
                        <h3 class="drop-down-question__caption">Почему вы выбрали нас?</h3>
                        <p class="drop-down-question__answer">Мы потратили более 3-х лет на сбор нашей команды, чтобы давать вам- лучшие прогнозы! В нашу команду входят не только профессионалы по анализу спорта, но и спортсмены, которые отдали спорту всю свою жизнь и знают о нем всё!  В нашей компании, для каждого клиента, подбирается оптимальный план распределения финансов. Чтобы убрать риски потери средств.</p>
                    </div>
                    <div class="drop-down-question">
                        <i class="fas fa-caret-down"></i>
                        <h3 class="drop-down-question__caption">Как пользоваться сервисом?</h3>
                        <p class="drop-down-question__answer">1. Ознакомится с сайтом.<br> 2. Перейти в раздел «Ставки» <br>3. Выбрать ставку. <br> 4. Оплата. <br>5. Получение прогноза в личный кабинет/на почту.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="drop-down-question">
                        <i class="fas fa-caret-down"></i>
                        <h3 class="drop-down-question__caption">С какого возраста допускается регистрация на нашем сайте?</h3>
                        <p class="drop-down-question__answer">Регистрация на сайте и прохождение процедуры идентификации доступна только для лиц достигших 18-летнего возраста.</p>
                    </div>
                    <div class="drop-down-question">
                        <i class="fas fa-caret-down"></i>
                        <h3 class="drop-down-question__caption">Присылаете ли Вы замену, если прогноз не прошёл?</h3>
                        <p class="drop-down-question__answer">Да, замена высылается бесплатно</p>
                    </div>
                    <div class="drop-down-question">
                        <i class="fas fa-caret-down"></i>
                        <h3 class="drop-down-question__caption">В случае не захода прогноза?</h3>
                        <p class="drop-down-question__answer">Мы предоставляем бесплатный прогноз, для этого нужно будет связаться с нашим менеджером.</p>
                    </div>
                    <div class="drop-down-question">
                        <i class="fas fa-caret-down"></i>
                        <h3 class="drop-down-question__caption">Какие гарантии мы даем?</h3>
                        <p class="drop-down-question__answer">Если какой-то прогноз не заходит, замену даём бесплатно. <br>Мы сами ставим на свои прогнозы.<br>Официальные реквизиты. Все наши кошельки идентифицированы.<br>Быстрая и профессиональная помощь любому новичку<br>Большая команда, где один прогнозист работает с одним видом спорта<br>Разумные коэффициенты и высокая проходимость</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    {!! $footer !!}
@endsection

@section('modals')
    {!! $modals !!}
@endsection

@section('scripts')
    {!! $scripts !!}
@endsection