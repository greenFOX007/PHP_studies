<div class="form_auth_container">
    <form class="form_auth" name="registration_form" >
        <label class="auth_label" for="name">Имя</label>
        <input class="auth_input" type="text" name="name" placeholder="Введите ваше имя">
        <label class="auth_label" for="gender">Ваш пол</label>
        <select class="auth_input" name="gender">
            <option value="1" selected>Мужчина</option>
            <option value="2">Женщина</option>
        </select>
        <label class="auth_label" for="email">E-mail</label>
        <input class="auth_input" type="email" name="email" placeholder="Введите E-mail">
        <label class="auth_label" for="password">Пароль</label>
        <input class="auth_input" type="password" name="password" placeholder="Введите пароль">
        <label class="auth_label" for="password_check">Подтвердите пароль</label>
        <input class="auth_input" type="password" name="password_check" placeholder="Подтвердите пароль">
        <input type="hidden" id="controlInput" name="controlInput" value="controlInput"/>
        <button type="button" onclick="registrationEvent()" class="form_auth_button">Войти</button>
        <p>
            У вас есть аккаунт? - <a class="form_auth_link" href="/authorization">авторизуйтесь</a>!
        </p>
        <div id="formRegistration_response" class="form_response"></div>
    </form>
</div>