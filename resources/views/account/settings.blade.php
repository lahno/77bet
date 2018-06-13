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
                    <h2>Настройки</h2>
                    <form action="{{route('edit_settings')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="settings_12">Отображение блока "БЛИЖАЙШИЕ СОРЕВНОВАНИЯ"</label>
                            <select class="custom-select" name="view_block_games" id="settings_12">
                                <option value="1" {{($settings->view_block_games == 1)?'selected':''}}>Да</option>
                                <option value="0" {{($settings->view_block_games == 0)?'selected':''}}>Нет</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="settings_1">Telegram link</label>
                            <input type="text" name="telegram_link" class="form-control" id="settings_1" value="{{($settings)?$settings->telegram_link:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_2">Facebook link</label>
                            <input type="text" name="fb_link" class="form-control" id="settings_2" value="{{($settings)?$settings->fb_link:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_3">VK link</label>
                            <input type="text" name="vk_link" class="form-control" id="settings_3" value="{{($settings)?$settings->vk_link:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_4">Instagram link</label>
                            <input type="text" name="instagram_link" class="form-control" id="settings_4" value="{{($settings)?$settings->instagram_link:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_5">Phone</label>
                            <input type="text" name="phone" class="form-control" id="settings_5" value="{{($settings)?$settings->phone:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_6">График</label>
                            <input type="text" name="graph" class="form-control" id="settings_6" placeholder="1, 2, 3" value="{{($settings)?$settings->graph:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_7">Цифра на графике 1</label>
                            <input type="text" name="graph_num_1" class="form-control" id="settings_7" value="{{($settings)?$settings->graph_num_1:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_8">Цифра на графике 2</label>
                            <input type="text" name="graph_num_2" class="form-control" id="settings_8" value="{{($settings)?$settings->graph_num_2:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_9">ПОЧЕМУ НАМ ДОВЕРЯЮТ 1</label>
                            <input type="text" name="block_1_1" class="form-control" id="settings_9" value="{{($settings)?$settings->block_1_1:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_10">ПОЧЕМУ НАМ ДОВЕРЯЮТ 2</label>
                            <input type="text" name="block_1_2" class="form-control" id="settings_10" value="{{($settings)?$settings->block_1_2:''}}">
                        </div>
                        <div class="form-group">
                            <label for="settings_11">ПОЧЕМУ НАМ ДОВЕРЯЮТ 3</label>
                            <input type="text" name="block_1_3" class="form-control" id="settings_11" value="{{($settings)?$settings->block_1_3:''}}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Save</button>
                    </form>
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