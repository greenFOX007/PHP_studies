<?php

class Model_Category extends Model
{
	

    public function get_data_JavaScript($page)
	{	
		include './application/dbconnect.php';

    $itemsPerPage = 10;
    $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = 'JavaScript' ORDER BY createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);
       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = 'JavaScript'";
       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
      $data['category'] = 'JavaScript';
		
		return $data;
	}

    public function get_data_PHP($page)
	{	
		include './application/dbconnect.php';

    $itemsPerPage = 10;
    $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = 'PHP' ORDER BY createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);
       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = 'PHP'";
       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
      $data['category'] = 'PHP';
		
		return $data;
	}

    public function get_data_DataBases($page)
	{	
		include './application/dbconnect.php';

    $itemsPerPage = 10;
    $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = 'Базы данных' ORDER BY createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);
       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = 'Базы данных'";
       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
      $data['category'] = 'Базы данных';
		
		return $data;
	}

    public function get_data_ReactJS($page)
	{	
		include './application/dbconnect.php';

    $itemsPerPage = 10;
    $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = 'React.js' ORDER BY createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);
       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = 'React.js'";
       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
      $data['category'] = 'React.js';
		
		return $data;
	}
}
