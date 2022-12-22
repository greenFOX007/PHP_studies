<?php 

$page = intval($_GET['page'] ?? 1);
    if ($page < 1) {
        $error = 'Запрошенная страница не существует';
        include "error.php";
        exit();
    }

try{
    $mysqli = new mysqli("localhost", "root","", "guestbook");
    if($mysqli->connect_errno){
        $error1 = 'Не удалось подкоючиться к базе данных';
        include "error1.php";
        exit();
    };

    $sql = "SELECT COUNT(*) FROM message";

    if (!($result = $mysqli->query($sql))){
        throw new Exception($mysqli->error);
    }

    $n = $result->fetch_row()[0];

    $itemsPerPage = 2; 

    if($page == 0) { 
            $page = 1; 
     }
    if ($page > $n) {
        $error = 'Запрошенная страница не существует';
        include "error.php";
         exit();
    };

    $pagesCount = ceil($n/$itemsPerPage); 

    $firstNumber = ($page - 1) * $itemsPerPage;
   
    $sql = "SELECT * FROM message ORDER BY id DESC LIMIT $firstNumber, $itemsPerPage";

    if(!($result = $mysqli->query($sql))){
        throw new Exception($mysqli->error);
    }
     
    $data = $result->fetch_all(MYSQLI_ASSOC);


}catch(Throwable $e){
    echo $e->getMessage();
};


    
include 'page.php';