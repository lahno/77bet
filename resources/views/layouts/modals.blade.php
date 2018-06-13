<!-- Modal Purchase-->
<div class="modal fade modal_purchase" id="modal_purchase" tabindex="-1" role="dialog" aria-labelledby="modal_purchase" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Ваша ставка</h3>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="caption-table">Ставка</div>
                        <div class="rate-description"></div>
                    </div>
                    <div class="col right text-center">
                        <div class="caption-table">Сумма покупки</div>
                        <div class="price_bibs"><span></span>&nbsp;&nbsp;<i class="fas fa-ruble-sign"></i></div>
                    </div>
                </div>
                <form action="{{route('add_pay')}}" method="POST" class="add_pay">
                    {{ csrf_field() }}
                    <input type="hidden" name="value" class="pay_value">
                    <input type="hidden" name="rate_id" class="pay_rate_id">
                    <input type="hidden" name="user_email" class="pay_user_email">
                    <div class="row">
                        <div class="col-md-12 code_block">
                            <input type="text" name="promo_code" class="order__input pay_promo_code" placeholder="Ваш промо-код">
                            <span class="btn__transparent btn-submit_promo_code">Применить</span>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn__orange btn-submit" type="submit" data-submit>Перейти к оплате</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal_purchase" id="modal_purchase_noauth" tabindex="-1" role="dialog" aria-labelledby="modal_purchase_noauth" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Ваша ставка</h3>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="caption-table">Ставка</div>
                        <div class="rate-description"></div>
                    </div>
                    <div class="col right text-center">
                        <div class="caption-table">Сумма покупки</div>
                        <div class="price_bibs"><span></span>&nbsp;&nbsp;<i class="fas fa-ruble-sign"></i></div>
                    </div>
                </div>
                <form action="{{route('add_pay')}}" method="POST" class="add_pay">
                    {{ csrf_field() }}
                    <input type="hidden" name="value" class="pay_value">
                    <input type="hidden" name="rate_id" class="pay_rate_id">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="email" name="user_email" class="order__input pay_user_email" placeholder="Введите Ваш e-mail" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 code_block">
                            <input type="text" name="promo_code" class="order__input pay_promo_code" placeholder="Ваш промо-код">
                            <span class="btn__transparent btn-submit_promo_code">Применить</span>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn__orange btn-submit" type="submit" data-submit>Перейти к оплате</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_pay_confirm" tabindex="-1" role="dialog" aria-labelledby="modal_pay_confirm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Подтверждение оплаты</h3>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="caption-table">Сумма к оплате</div>
                        <div class="price_bibs"><span></span>&nbsp;&nbsp;<i class="fas fa-ruble-sign"></i></div>
                    </div>
                    <div class="col right text-center">
                        <div class="caption-table">Номер заказа</div>
                        <div class="number_order"><span></span></div>
                    </div>
                </div>
                <form action="">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_value" id="pay_price">
                    <input type="hidden" name="order_id" id="pay_number">
                    <input type="hidden" name="order_code" id="pay_code">
                    <div class="row justify-content-center">
                        <button class="btn__orange btn-submit" type="submit" data-submit>Оплатить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Message-->
<div class="modal fade" id="modal_message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Lorem ipsum dolor sit amet</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="rate-description text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Authorization-->
<div class="modal fade" id="modal_authorization" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Авторизация</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <form class="order js-form text-center" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <input type="email" name="email" class="order__input" placeholder="Введите e-mail" required><br>

                            <input type="password" name="password" class="order__input" placeholder="Введите пароль" required><br>

                            <button class="btn__orange" type="submit" data-submit>Авторизироваться</button>

                        </form>
                        <p class="or">Или</p>
                        <a href="{{ url('/login/vkontakte') }}" class="btn__transparent">Авторизироваться с помощью&nbsp;&nbsp;<i class="fab fa-vk"></i></a>
                        <p class="or">Или</p>
                        <div class="btn__orange two" data-toggle="modal" data-target="#modal_registration" aria-label="Close" data-dismiss="modal">Зарегистрироваться</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Registration-->
<div class="modal fade" id="modal_registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Заполните форму,<br>чтобы зарегистрироваться</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <form class="order js-form text-center" id="register_from" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <input type="text" name="name" class="order__input" placeholder="Введите имя" maxlength="12" required><br>

                            <input type="email" name="email" class="order__input" placeholder="Введите e-mail" required><br>

                            <input type="text" name="phone" class="order__input" placeholder="Ваш телефон:" required aria-required="true"><br>

                            <input type="password" name="password" class="order__input" placeholder="Введите пароль" required><br>

                            <input type="password" name="password_confirmation" class="order__input" placeholder="Повторите пароль" required><br>

                            <div class="recaptcha">
                                {!! Recaptcha::render() !!}
                            </div>

                            <button class="btn__orange btn-submit" type="submit" data-submit>Зарегистрироваться</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal ADD RATE-->
<div class="modal fade" id="modal_add_rate" tabindex="-1" role="dialog" aria-labelledby="modal_add_rate" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Добавить новую ставку</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <form class="order js-form text-center" id="add_rate_from" method="POST" action="{{ route('add_rate') }}">
                            {{ csrf_field() }}
                            <input type="text" name="name" class="order__input" placeholder="Введите имя" required><br>
                            <input type="text" name="label" class="order__input" placeholder="Ярлык"><br>
                            <input type="datetime-local" name="date_left" class="order__input" placeholder="Дата окончания" required><br>
                            <input type="number" step="0.1" name="coefficient" class="order__input" placeholder="Коэффициент" required><br>
                            <input type="text" name="chance" class="order__input" placeholder="Вероятность" required><br>
                            <input type="text" name="cost" class="order__input" placeholder="Цена" required><br>
                            <textarea name="body" cols="30" rows="10" placeholder="Тело" required></textarea>
                            <button class="btn__orange btn-submit" type="submit" data-submit>Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal ADD PROMO CODE-->
<div class="modal fade" id="modal_add_promo_code" tabindex="-1" role="dialog" aria-labelledby="modal_add_promo_code" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Добавить промо код</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <form class="order js-form text-center" id="add_promo_code_from" method="POST" action="{{ route('add_promo_code') }}">
                            {{ csrf_field() }}
                            <label>Код</label>
                            <input type="text" name="code" class="order__input" placeholder="Введите код" required><br>
                            <label>Скидка</label>
                            <input type="text" name="value" class="order__input" placeholder="Скидка"><br>
                            <label for="used_checkbox">Использован</label>
                            <select class="form-control" name="used" id="used_checkbox">
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                            <button class="btn__orange btn-submit" type="submit" data-submit>Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal ADD GAMES-->
<div class="modal fade" id="modal_add_game" tabindex="-1" role="dialog" aria-labelledby="modal_add_game" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3>Добавить новое соревнование</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <form class="order js-form text-center" id="add_game_from" method="POST" action="{{ route('add_game') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="text" name="competition" class="order__input" placeholder="Соревнование" required><br>
                            <input type="text" name="title" class="order__input" placeholder="Заголовок" required><br>
                            <input type="date" name="date" class="order__input" placeholder="Дата" required><br>
                            <input type="file" name="img" class="order__input" placeholder="Изображение" required><br>
                            <input type="url" name="link" class="order__input" placeholder="Ссылка"><br>
                            <button class="btn__orange btn-submit" type="submit" data-submit>Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>