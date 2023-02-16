<?php

class Model_Admin extends Model
{
	
	public function get_dataPage($page)
	{	
		include './application/dbconnect.php';

        $itemsPerPage = 5;
        $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      ORDER BY news.createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result = $connect->query($sql);

       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news ";
       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
		
		return $data;
	}

  public function get_dataFillter($fillterBy,$like,$page)
	{	
		include './application/dbconnect.php';
        
        $itemsPerPage = 5;
        $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE $fillterBy = '$like'
      ORDER BY news.createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);

       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
          WHERE $fillterBy = '$like'";

       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
				
		return $data;
	}


    public function get_data_moderation($page)
	{	
		include './application/dbconnect.php';
        $itemsPerPage = 5;
        $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE moderationStatus = 0
      ORDER BY news.createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);

       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
          WHERE moderationStatus = 0 ";

       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
		
		return $data;
	}

    public function get_data_moderationFilter($fillterBy,$value,$page)
	{	
		include './application/dbconnect.php';

        $itemsPerPage = 5;
        $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE moderationStatus = 0 AND $fillterBy = '$value'
      ORDER BY news.createDate DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);

       $data = $result->fetch_all(MYSQLI_ASSOC);

       $data['news'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
          WHERE moderationStatus = 0 AND $fillterBy = '$value'";

       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
		
		return $data;
	}

    public function get_data_users($page)
	{	
		include './application/dbconnect.php';
        $itemsPerPage = 5;
        $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT
        *
      FROM user
        INNER JOIN userGroup
          ON user.idgroup = userGroup.idGroup
        INNER JOIN accessRights
          ON userGroup.idAaccessRights = accessRights.idRigths
      ORDER BY user.idUser DESC LIMIT $firstNumber, $itemsPerPage";

       $result =  $connect->query($sql);

       $data['users'] = $result->fetch_all(MYSQLI_ASSOC);

       $sql2 = "SELECT COUNT(*) FROM user";

       if (!($result2 = $connect->query($sql2))){
        throw new Exception($connect->error);
      }

      $data['pagesCount'] = ceil($result2->fetch_row()[0]/$itemsPerPage) ;
		
		return $data;
		
		return $data;
	}


}
