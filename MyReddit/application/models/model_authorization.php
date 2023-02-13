<?php

class Model_Authorization extends Model
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



}
