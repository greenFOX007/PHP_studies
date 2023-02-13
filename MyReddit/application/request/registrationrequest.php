<?php

header('Content-type:text/html; charset=UTF-8');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $flag = true;

    if(!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['email']) 
    && !empty($_POST['password']) && !empty($_POST['password_check']) ){

        $name = trim(htmlspecialchars($_POST['name']));
        $gender = trim(str_replace(" ","",htmlspecialchars($_POST['gender'])));
        $email = trim(str_replace(" ","",htmlspecialchars($_POST['email'])));
        $password = trim(str_replace(" ","",htmlspecialchars($_POST['password'])));
        $password_check = trim(str_replace(" ","",htmlspecialchars($_POST['password_check'])));

        if($name == ''){
            $flag = false;
            echo "<p style='color:red;'>Введите имя </p> ";
        }else if(mb_strlen($name)>50){
            $flag = false;
            echo "<p style='color:red;'>Слишком длинное имя </p> ";
        }

        if( !preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", trim($email))){
            $flag = false;
            echo "<p style='color:red;'>Неправильно заполнен Email </p> ";
        } else if (mb_strlen($email) > 50 ){
            $flag = false;
            echo "<p style='color:red;'>Слишком длинный Email </p> ";
        } else if ($email == ''){
            $flag = false;
            echo "<p style='color:red;'>Заполните Email </p> ";
        }

        if ($gender == ''){
            $flag = false;
            echo "<p style='color:red;'>Выберите пол</p> ";
        }

        if(!preg_match("/^([0-9a-z]{8,20})$/i",trim($password))){
            $flag = false;
            echo "<p style='color:red;'>Некорректный пароль</p> ";
        } else if($password == ''){
            $flag = false;
            echo "<p style='color:red;'>Введите пароль</p> ";
        }else if(mb_strlen($password)<8){
            $flag = false;
            echo "<p style='color:red;'>Минимальная длинна пароля 8 символов</p> ";
        }
        else if(mb_strlen($password)>20){
            $flag = false;
            echo "<p style='color:red;'>Максимальная длинна пароля 20 символов</p> ";
        }

        if(!preg_match("/^([0-9a-z]{8,20})$/i",trim($password_check))){
            $flag = false;
            echo "<p style='color:red;'>Некорректный проверочный пароль</p> ";
        } else if($password_check == ''){
            $flag = false;
            echo "<p style='color:red;'>Введите проверочный пароль</p> ";
        }else if(mb_strlen($password_check)<8){
            $flag = false;
            echo "<p style='color:red;'>Минимальная длинна пароля 8 символов</p> ";
        }
        else if(mb_strlen($password_check)>20){
            $flag = false;
            echo "<p style='color:red;'>Максимальная длинна пароля 20 символов</p> ";
        }

        if($password !== $password_check){
            $flag = false;
            echo "<p style='color:red;'>Пароли не совпадают</p> ";
        }

        if($flag == true){
            $password = md5($password);
            try{
                include '../dbconnect.php';  
                if($connect->connect_errno){
                    $error1 = "<p style='color:red;'>Не удалось подкоючиться к базе данных</p>";
                    echo $error1;
                    exit();
                }  

                $sql_user = "SELECT email FROM user WHERE email = '$email'";

                if(!($result = $connect->query($sql_user))){
                    throw new Exception($mysqli->error);
                }

                $finduser = $result->fetch_all(MYSQLI_ASSOC);

                if(empty($finduser)){

                    $sql_registration = "INSERT INTO `user` (`idUser`,`name`, `email`, `idgroup`, `registrationDate`, `password`, `gender`) 
                    VALUES (NULL,?, ?, '3', CURRENT_TIMESTAMP, ?, ?)";
                   
                    $adduser_stmt = $connect->prepare($sql_registration);
                    $adduser_stmt->bind_param("sssi",$name,$email,$password,$gender);
                    
                    if( $adduser_stmt->execute()){

                        echo  "<p style='color:green;'>Вы спушно зарегистрировались!</p>";
    
                        
                    }else{
                        echo  "<p style='color:red;'>Ошибка регистрации, попробуйте снова</p>";
                    }
                   
                    $adduser_stmt->close();
                }else{
                    echo "<p style='color:red;'>Пользователь с таким Email уже зарегистрирован</p>";
                }               

            }catch(Throwable $e){
                echo $e->getMessage();
            }
        }

       

    }else{
        echo "<p style='color:red;'>Заполните все поля!</p>";
    }
    
}

