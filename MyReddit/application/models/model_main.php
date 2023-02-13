<?php

class Model_Main extends Model
{
	
	public function get_data()
	{	
		include './application/dbconnect.php';

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE news.moderationStatus = 1
      ORDER BY news.createDate DESC";

       $result =  $connect->query($sql);

       $data = $result->fetch_all(MYSQLI_ASSOC);
		
		return $data;
	}

  public function get_dataPage($page)
	{	
		include './application/dbconnect.php';


    $itemsPerPage = 10;
    $firstNumber = ($page - 1) * $itemsPerPage;


        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE news.moderationStatus = 1
      ORDER BY news.createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);

       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news";
       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
		
		return $data;
	}


}
