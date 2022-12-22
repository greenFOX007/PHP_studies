<form name="form" class="form">
    <h2 class="form_title">Добавьте элемент</h2>
    <div class="input_container">
        <label for="userName">Введите имя:</label>
        <input id="userName" class="inputArea" type="text" name="userName"/>
    </div>

    <div class="input_container">
        <label for='user_email'>Введите электронную почту:</label>
        <input id="user_email" class="inputArea" name="user_email" type="email"/>
    </div>
    
     <div class="input_container">
        <label for="message_text">Введите сообщение:</label>
        <textarea id="message_text" class="textArea" name="message_text"></textarea>
    </div>

    <input type="hidden" id="controlInput" name="controlInput" value="controlInput"/>
    
    <button type="button" onclick="formEvent()" class="button">Отправить</button>

    <div id="form_response" class="form_response"></div>
</form>