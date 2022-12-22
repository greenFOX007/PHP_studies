<?php

header('Content-type:text/plain; charset=UTF-8');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    if($_SERVER["HTTP_REFERER"] == "http://localhost/lesson-9/index.php" || "http://localhost/lesson-9/index.php?page=[0-9][0-9][0-9]"){
        $flag = true;
        if(!empty($_POST['userName']) && !empty($_POST['user_email']) && !empty($_POST['message_text']) && !empty($_POST['controlInput'])){
            if(trim($_POST['userName']) == ''){
                $flag = false;
                echo "<p style='color:red;'>Введите имя </p> ";
            }else if (mb_strlen($_POST['userName']) > 30 ){
                $flag = false;
                echo "<p style='color:red;'>Слишком длинное имя </p> ";
            }

            if( !preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", trim($_POST['user_email']))){
                $flag = false;
                echo "<p style='color:red;'>Неправильно заполнен Email </p> ";
            } else if (mb_strlen($_POST['user_email']) > 200 ){
                $flag = false;
                echo "<p style='color:red;'>Слишком длинное имя </p> ";
            }

            if(mb_strlen($_POST['message_text']) > 2000){
                $flag = false;
                echo "<p style='color:red;'>Слишком длинное сообщение </p> ";
            }else if (mb_strlen(trim($_POST['message_text']))==0){
                $flag = false;
                echo "<p style='color:red;'>Введите сообщение </p> ";
            }

            if($flag == true){
                try{
                    $mysqli = new mysqli("localhost", "root","", "guestbook");
        
                    if($mysqli->connect_errno){
                        $error1 = "<p style='color:red;'>Не удалось подкоючиться к базе данных</p>";
                        echo $error1;
                        exit();    
                    };
                    
                    $user = $_POST["userName"];
                    $email = $_POST['user_email'];
                    $text = $_POST["message_text"];
        
                    $sql = "INSERT INTO `message` (`id`, `user`, `message_text`, `message_time`, `user_email`) VALUES (NULL, '$user', '$text', CURRENT_TIMESTAMP, '$email')";
        
                    if(!($mysqli->query($sql))){
                        throw new Exception($mysqli->error);
                    }

                    echo "<p style='color:green;'>Успешно отправленно!</p>";
                    
                }catch(Throwable $e){
                    echo $e->getMessage();
                }  
            }

        }else{
            echo "<p style='color:red;'>Заполните все поля!</p>";
        }
    }else{
        echo "<p style='color:red;'>Запрос отправлен с другого сайта! </p>";
    }
   
    
}else{
    echo "<p>Что-то пошло не так...</p>";
}

