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
                    <h2>Промо коды</h2>
                    <div class="text-right">
                        <a href="#modal_add_promo_code" data-toggle="modal" class="btn btn-danger" >Новый код</a>
                    </div>
                    <div class="table">
                        <table border="1">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Код</th>
                                <th>Скидка</th>
                                <th>Использован</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($codes as $code)
                                <tr>
                                    <td>{{$code->id}}</td>
                                    <td>{{$code->code}}</td>
                                    <td>- {{$code->value}}</td>
                                    <td>{{($code->used)?'Да':'Нет'}}</td>
                                    <td>
                                        <a href="#modal_delete_promo_code_{{$code->id}}" data-toggle="modal" class="btn btn-danger">Удалить</a>
                                        <a href="#modal_edit_promo_code_{{$code->id}}" data-toggle="modal" class="btn btn-danger">Изменить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @foreach($codes as $code)
        <!-- Modal EDIT RATE-->
        <div class="modal fade modal_edit_promo_code" id="modal_edit_promo_code_{{$code->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_edit_promo_code" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <h3>Изменение ставки: {{$code->code}}</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                <form class="order js-form text-center edit_promo_code_from" method="POST" action="{{ route('edit_promo_code', ['code_id' => $code->id]) }}">
                                    {{ csrf_field() }}
                                    <label>Код</label>
                                    <input type="text" name="code" class="order__input" placeholder="Введите код" required value="{{$code->code}}"><br>
                                    <label>Скидка</label>
                                    <input type="text" name="value" class="order__input" placeholder="Скидка" value="{{$code->value}}"><br>
                                    <label>Использован</label>
                                    <select class="form-control" name="used">
                                        <option value="true" {{($code->used)?'selected':''}}>Да</option>
                                        <option value="false" {{($code->used)?'':'selected'}}>Нет</option>
                                    </select>
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
        <div class="modal fade modal_delete_promo_code" id="modal_delete_promo_code_{{$code->id}}" tabindex="-1" role="dialog" aria-labelledby="modal_delete_promo_code" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <h3>Уверены что хотите удалить ставку: {{$code->name}}?</h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                <form class="order js-form text-center delete_promo_code_from" method="POST" action="{{ route('delete_promo_code', ['code_id' => $code->id]) }}">
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