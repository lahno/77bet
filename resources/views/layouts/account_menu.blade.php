<ul class="settings">
    <li>
        <i class="fas fa-user"></i><span>Изменить имя</span><i class="fas fa-caret-right"></i>
        <div class="forma">
            <form class="order js-form edit_profile_form" method="POST" action="{{ route('edit_name') }}">
                {{ csrf_field() }}
                <input type="text" name="new_name" class="order__input" placeholder="Введите имя" required><br>

                <button class="btn__orange btn-submit" type="submit">Сохранить изменения</button>

            </form>
        </div>
    </li>
    <li>
        <i class="fas fa-envelope"></i><span>Изменить e-mail</span><i class="fas fa-caret-right"></i>
        <div class="forma">
            <form class="order js-form edit_profile_form" method="POST" action="{{ route('edit_email') }}">
                {{ csrf_field() }}
                <input type="email" name="new_email" class="order__input" placeholder="Введите e-mail"><br>

                <button class="btn__orange btn-submit" type="submit" data-submit>Сохранить изменения</button>

            </form>
        </div>
    </li>
    <li>
        <i class="fas fa-mobile-alt"></i><span>Изменить телефон</span><i class="fas fa-caret-right"></i>
        <div class="forma">
            <form class="order js-form edit_profile_form" method="POST" action="{{ route('edit_phone') }}">
                {{ csrf_field() }}
                <input type="text" name="new_phone" class="order__input" placeholder="Введите телефон" required><br>

                <button class="btn__orange btn-submit" type="submit" data-submit>Сохранить изменения</button>

            </form>
        </div>
    </li>
    <li>
        <i class="fal fa-key"></i><span>Изменить пароль</span><i class="fas fa-caret-right"></i>
        <div class="forma">
            <form class="order js-form edit_profile_form" method="POST" action="{{ route('edit_password') }}">
                {{ csrf_field() }}
                <input type="password" name="new_password" class="order__input" placeholder="Введите проль" required><br>

                <input type="password" name="new_password_confirmation" class="order__input" placeholder="Подтвердите пароль" required><br>

                <button class="btn__orange btn-submit" type="submit" data-submit>Сохранить изменения</button>

            </form>
        </div>
    </li>
    @if(Auth::user()->adm)
        <li>
            <a href="{{route('rates')}}">Ставки</a>
        </li>
        <li>
            <a href="{{route('promo_codes')}}">Промо коды</a>
        </li>
        <li>
            <a href="{{route('games')}}">Соревнования</a>
        </li>
        <li>
            <a href="{{route('settings')}}">Настройки</a>
        </li>
    @endif
</ul>