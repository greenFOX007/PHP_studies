<?php
namespace application\models;
use \application\core\Model;
class Model_Registration extends Model
{

  public function addNewUser()
  {
    header('Content-type:text/html; charset=UTF-8');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $flag = true;

      if (
        !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['email'])
        && !empty($_POST['password']) && !empty($_POST['password_check'])
      ) {

        $name = trim(htmlspecialchars($_POST['name']));
        $gender = trim(str_replace(" ", "", htmlspecialchars($_POST['gender'])));
        $email = trim(str_replace(" ", "", htmlspecialchars($_POST['email'])));
        $password = trim(str_replace(" ", "", htmlspecialchars($_POST['password'])));
        $password_check = trim(str_replace(" ", "", htmlspecialchars($_POST['password_check'])));

        if ($name == '') {
          $flag = false;
          echo "<p style='color:red;'>Введите имя </p> ";
        } else if (mb_strlen($name) > 50) {
          $flag = false;
          echo "<p style='color:red;'>Слишком длинное имя </p> ";
        }

        if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", trim($email))) {
          $flag = false;
          echo "<p style='color:red;'>Неправильно заполнен Email </p> ";
        } else if (mb_strlen($email) > 50) {
          $flag = false;
          echo "<p style='color:red;'>Слишком длинный Email </p> ";
        } else if ($email == '') {
          $flag = false;
          echo "<p style='color:red;'>Заполните Email </p> ";
        }

        if ($gender == '') {
          $flag = false;
          echo "<p style='color:red;'>Выберите пол</p> ";
        }

        if (!preg_match("/^([0-9a-z]{8,20})$/i", trim($password))) {
          $flag = false;
          echo "<p style='color:red;'>Некорректный пароль</p> ";
        } else if ($password == '') {
          $flag = false;
          echo "<p style='color:red;'>Введите пароль</p> ";
        } else if (mb_strlen($password) < 8) {
          $flag = false;
          echo "<p style='color:red;'>Минимальная длинна пароля 8 символов</p> ";
        } else if (mb_strlen($password) > 20) {
          $flag = false;
          echo "<p style='color:red;'>Максимальная длинна пароля 20 символов</p> ";
        }

        if (!preg_match("/^([0-9a-z]{8,20})$/i", trim($password_check))) {
          $flag = false;
          echo "<p style='color:red;'>Некорректный проверочный пароль</p> ";
        } else if ($password_check == '') {
          $flag = false;
          echo "<p style='color:red;'>Введите проверочный пароль</p> ";
        } else if (mb_strlen($password_check) < 8) {
          $flag = false;
          echo "<p style='color:red;'>Минимальная длинна пароля 8 символов</p> ";
        } else if (mb_strlen($password_check) > 20) {
          $flag = false;
          echo "<p style='color:red;'>Максимальная длинна пароля 20 символов</p> ";
        }

        if ($password !== $password_check) {
          $flag = false;
          echo "<p style='color:red;'>Пароли не совпадают</p> ";
        }

        if ($flag == true) {
          $password = md5($password);

            $sql_user = "SELECT email FROM user WHERE email = '$email'";

            $finduser = $this->get_many($sql_user);;

            if (empty($finduser)) {

              $sql_registration = "INSERT INTO `user` (`idUser`,`name`, `email`, `idgroup`, `registrationDate`, `password`, `gender`) 
                    VALUES (NULL,'$name', '$email', '3', CURRENT_TIMESTAMP, '$password', '$gender')";

              if ($this->execute($sql_registration)) {
                echo  "<p style='color:green;'>Вы спушно зарегистрировались!</p>";
              } else {
                echo  "<p style='color:red;'>Ошибка регистрации, попробуйте снова</p>";
              }
             
            } else {
              echo "<p style='color:red;'>Пользователь с таким Email уже зарегистрирован</p>";
            }
        }
      } else {
        echo "<p style='color:red;'>Заполните все поля!</p>";
      }
    }
  }
}
