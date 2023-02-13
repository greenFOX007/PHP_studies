<?php
session_start();
header('Content-type:text/html; charset=UTF-8');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $flag = true;

    if(!empty($_POST['login']) && !empty($_POST['password'])){

        $login = trim(htmlspecialchars($_POST['login']));
        $password = trim(htmlspecialchars($_POST['password']));
        

        if( !preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", trim($login))){
            $flag = false;
            echo "<p style='color:red;'>Неправильно введен Email </p> ";
        }else if ($login == ''){
            $flag = false;
            echo "<p style='color:red;'>Введите свой Email </p> ";
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
    

        if($flag == true){
            $password = md5($password);
            try{
                include '../dbconnect.php';  
                if($connect->connect_errno){
                    $error1 = "<p style='color:red;'>Не удалось подкоючиться к базе данных</p>";
                    echo $error1;
                    exit();
                }  

                $sql_user = "SELECT
                user.idUser,
                user.name,
                user.email,
                user.idgroup,
                user.password,
                user.gender
                FROM user
                INNER JOIN userGroup
                  ON user.idgroup = userGroup.idGroup
                WHERE user.email = '$login'";

                if(!($result = $connect->query($sql_user))){
                    throw new Exception($mysqli->error);
                }

                $finduser = $result->fetch_all(MYSQLI_ASSOC);
                // print_r($finduser);
                if(!empty($finduser)){
                    if($finduser[0]['password'] == $password){
                        $_SESSION['isLogin'] = 'true';
                        $_SESSION['idUser'] = $finduser[0]['idUser'];
                        $_SESSION['name'] = $finduser[0]['name'];
                        $_SESSION['email'] = $finduser[0]['email'];
                        $_SESSION['idgroup'] = $finduser[0]['idgroup'];
                        $_SESSION['gender'] = $finduser[0]['gender'];
                        $_SESSION['password'] = $finduser[0]['password'];
                         echo 'OK';

                    }else{
                        echo "<p style='color:red;'>Неправильный пароль!</p>";
                    }
                   
                }else{
                    echo "<p style='color:red;'>Такого пользователя не существует</p>";
                }               

            }catch(Throwable $e){
                echo $e->getMessage();
            }
        }

       

    }else{
        echo "<p style='color:red;'>Заполните все поля!</p>";
    }
    
}

