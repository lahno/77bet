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

                <div class="col-lg-9 col-md-9">
                    <h2>Ставки</h2>
                    <div class="text-right">
                        <a href="#modal_add_rate" data-toggle="modal" class="btn btn-danger" >Новая ставка</a>
                    </div>
                    <div class="table">
                        <table border="1">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Ярлык</th>
                                <th>Дата окончания</th>
                                <th>Коэффициент</th>
                                <th>Вероятность</th>
                                <th>Цена</th>
                                <th>Тело</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rates as $rate)
                                <tr>
                                    <td>{{$rate->id}}</td>
                                    <td>{{$rate->name}}</td>
                                    <td>{{$rate->label}}</td>
                                    <td>{{$rate->date_left}}</td>
                                    <td>{{$rate->coefficient}}</td>
                                    <td><span>{{$rate->chance}}</span>&nbsp;%</td>
                                    <td><span>{{$rate->cost}}</span>&nbsp;р</td>
                                    <td>{{$rate->body}}</td>
                                    <td>
                                        <a href="#modal_delete_rate_{{$rate->id}}" data-toggle="modal" class="btn btn-danger text-white">Удалить</a>
                                        <a href="#modal_edit_rate_{{$rate->id}}" data-toggle="modal" class="btn btn-danger text-white">Изменить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @foreach($rates as $rate)
            <!-- Modal EDIT RATE-->
            <div class="modal fade modal_edit_rate" id="modal_edit_rate_{{$rate->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_edit_rate" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <h3>Изменение ставки: {{$rate->name}}</h3>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-9 col-12">
                                    <form class="order js-form text-center edit_rate_from" method="POST" action="{{ route('edit_rate', ['rate_id' => $rate->id]) }}">
                                        {{ csrf_field() }}
                                        @php
                                            $cDate = Carbon\Carbon::parse($rate->date_left);
                                        @endphp
                                        <input type="text" name="name" class="order__input" placeholder="Введите имя" required value="{{$rate->name}}"><br>
                                        <input type="text" name="label" class="order__input" placeholder="Ярлык" value="{{$rate->label}}"><br>
                                        <input type="datetime-local" name="date_left" class="order__input" required value="{{$cDate->format('Y-m-d\TH:i')}}"><br>
                                        <input type="number" step="0.1" name="coefficient" class="order__input" placeholder="Коэффициент" required value="{{$rate->coefficient}}"><br>
                                        <input type="text" name="chance" class="order__input" placeholder="Вероятность" required value="{{$rate->chance}}"><br>
                                        <input type="text" name="cost" class="order__input" placeholder="Цена" required value="{{$rate->cost}}"><br>
                                        <textarea name="body" cols="30" rows="10" placeholder="Тело" required>{{$rate->body}}</textarea>
                                        <button class="btn__orange btn-submit" type="submit" data-submit>Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal EDIT RATE-->
            <!-- Modal DELETE RATE-->
            <div class="modal fade modal_delete_rate" id="modal_delete_rate_{{$rate->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_delete_rate" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <h3>Уверены что хотите удалить ставку: {{$rate->name}}?</h3>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-9 col-12">
                                    <form class="order js-form text-center delete_rate_from" method="POST" action="{{ route('delete_rate', ['rate_id' => $rate->id]) }}">
                                        {{ csrf_field() }}
                                        <button class="btn__orange btn-submit" type="submit" data-submit>Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal DELETE RATE-->
        @endforeach
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