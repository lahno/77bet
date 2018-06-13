@extends('layouts.site')

@section('header')
    {!! $header !!}
@endsection

@section('content')

    <section id="first_cabinet">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="left-sidebar">
                        <div class="left-sidebar__caption">
                            <i class="fas fa-cog"></i>&nbsp;&nbsp;Настройки
                        </div>

                        @include('layouts.account_menu')

                    </div>
                </div>

                @if(Auth::user()->adm)
                    <div class="col-lg-9 col-md-9">
                        <h2>История пользователей</h2>
                        <div class="table">
                            <table border="1">
                                <thead>
                                <tr>
                                    <th>Имя пользователя</th>
                                    <th>Дата покупки</th>
                                    <th>Наименование покупки</th>
                                    <th>Цена</th>
                                    <th>Номер заказа</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchase as $item)
                                    @if($item->status == 'paid')
                                    <tr>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <div class="bibs">
                                                <div class="bibs-type">{{$item->rate->name}}</div>
                                                {{--<div class="bibs-caption">Футбол<br><span>Чемпионат мира 2018</span></div>--}}
                                            </div>
                                        </td>
                                        <td><span>{{$item->value}}</span>&nbsp;р</td>
                                        <td>{{$item->order_id}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="col-lg-9 col-md-9">
                        <h2>История покупок</h2>
                        <div class="table">
                            <table border="1">
                                <thead>
                                <tr>
                                    <th>Дата покупки</th>
                                    <th>Наименование покупки</th>
                                    <th>Цена</th>
                                    <th>Номер заказа</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchase as $item)
                                    <tr>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <div class="bibs">
                                                <div class="bibs-type">{{$item->rate->name}}</div>
                                                {{--<div class="bibs-caption">Футбол<br><span>Чемпионат мира 2018</span></div>--}}
                                            </div>
                                        </td>
                                        <td><span>{{$item->value}}</span>&nbsp;р</td>
                                        <td>{{$item->order_id}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

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