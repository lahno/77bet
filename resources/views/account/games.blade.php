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
                    <h2>Ближайшие соревнования</h2>
                    <div class="text-right">
                        <a href="#modal_add_game" data-toggle="modal" class="btn btn-danger" >Новое соревнование</a>
                    </div>
                    <div class="table">
                        <table border="1">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Competition</th>
                                <th>Title</th>
                                <th>Дата</th>
                                <th>Image</th>
                                <th>Ссылка</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($games as $game)
                                <tr>
                                    <td>{{$game->id}}</td>
                                    <td>{{$game->competition}}</td>
                                    <td>{{$game->title}}</td>
                                    <td>{{$game->date}}</td>
                                    <td><img src="{{asset($game->img)}}" style="max-width: 250px;"></td>
                                    <td>{{$game->link}}</td>
                                    <td>
                                        <a href="#modal_delete_game_{{$game->id}}" data-toggle="modal" class="btn btn-danger text-white">Удалить</a>
                                        <a href="#modal_edit_game_{{$game->id}}" data-toggle="modal" class="btn btn-danger text-white">Изменить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @foreach($games as $game)
        <!-- Modal EDIT GAME-->
            <div class="modal fade modal_edit_game" id="modal_edit_game_{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_edit_game" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <h3>Изменение соревнования: {{$game->title}}</h3>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-9 col-12">
                                    <form class="order js-form text-center edit_game_from" method="POST" action="{{ route('edit_game', ['game_id' => $game->id]) }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="text" name="competition" class="order__input" placeholder="Соревнование" required value="{{$game->competition}}"><br>
                                        <input type="text" name="title" class="order__input" placeholder="Заголовок" required value="{{$game->title}}"><br>
                                        <input type="date" name="date" class="order__input" placeholder="Дата" required value="{{$game->date}}"><br>
                                        <input type="file" name="img" class="order__input" placeholder="Изображение"><br>
                                        <input type="url" name="link" class="order__input" placeholder="Ссылка" value="{{$game->link}}"><br>
                                        <button class="btn__orange btn-submit" type="submit" data-submit>Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal EDIT GAME-->
            <!-- Modal DELETE GAME-->
            <div class="modal fade modal_delete_game" id="modal_delete_game_{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_delete_game" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <h3>Уверены что хотите удалить: {{$game->title}}?</h3>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-9 col-12">
                                    <form class="order js-form text-center delete_game_from" method="POST" action="{{ route('delete_game', ['game_id' => $game->id]) }}">
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