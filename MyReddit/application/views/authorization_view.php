<div class="form_auth_container">
    <form class="form_auth" name="form_authorization">       
        <label class="auth_label" for="login">Логин</label>
        <input class="auth_input" type="email" name="login" placeholder="Введите email">
        <label class="auth_label" for="password">Пароль</label>
        <input class="auth_input" type="password" name="password" placeholder="Введите пароль">
        <button class="form_auth_button" type="button" onclick="authEvent()">Войти</button>
        <p>
            У вас нет аккаунта? - <a class="form_auth_link" href="/registration">зарегистрируйтесь</a>!
        </p>
        <div id="formAuthorization_response" class="form_response"></div>
    </form>
</div>