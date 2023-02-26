<?php

class Model_Admin extends Model
{

  public $itemperpage = ITEMS_PER_PAGE;
	
	public function get_dataPage($page)
	{	
   
    $firstNumber = ($page - 1) *  $this->itemperpage;

    $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
        ORDER BY news.createDate DESC LIMIT $firstNumber,  $this->itemperpage";

    $data['news']= $this->get_many($sql);;

    $sql2 = "SELECT COUNT(*) FROM news ";
      
    $pageCount = $this->get_count($sql2);

    $data['pagesCount'] = ceil($pageCount/ $this->itemperpage) ;
		
		return $data;
	}

  public function get_dataFillter($fillterBy,$like,$page)
	{	
        
    $itemsPerPage = ITEMS_PER_PAGE;
    $firstNumber = ($page - 1) * $itemsPerPage;

    $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
        WHERE $fillterBy = '$like'
        ORDER BY news.createDate DESC LIMIT $firstNumber, $itemsPerPage";

    $data['news'] = $this->get_many($sql);

    $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        WHERE $fillterBy = '$like'";
 
    $pageCount = $this->get_count($sql2);

    $data['pagesCount'] = ceil($pageCount/$itemsPerPage) ;
				
		return $data;
	}


    public function get_data_moderation($page)
	  {	
   
      $firstNumber = ($page - 1) *  $this->itemperpage;

      $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
        WHERE moderationStatus = 0
        ORDER BY news.createDate DESC LIMIT $firstNumber,  $this->itemperpage";

      

    $data['news'] = $this->get_many($sql);

    $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        WHERE moderationStatus = 0 ";

    $pageCount = $this->get_count($sql2);

    $data['pagesCount'] = ceil($pageCount/ $this->itemperpage) ;
		
		return $data;
	}

    public function get_data_usersFillter($fillterBy,$value,$page){
      $firstNumber = ($page - 1) *  $this->itemperpage;

        $sql = "SELECT * FROM user
        INNER JOIN userGroup
          ON user.idgroup = userGroup.idGroup
        INNER JOIN accessRights
          ON userGroup.idAaccessRights = accessRights.idRigths
          WHERE $fillterBy = '$value'
        ORDER BY user.registrationDate DESC LIMIT $firstNumber,  $this->itemperpage";

      $data['users'] = $this->get_many($sql);

       $sql2 = "SELECT COUNT(*) FROM user
       INNER JOIN userGroup
          ON user.idgroup = userGroup.idGroup
        INNER JOIN accessRights
          ON userGroup.idAaccessRights = accessRights.idRigths
          WHERE $fillterBy = '$value'";

      $pageCount = $this->get_count($sql2);

      $data['pagesCount'] = ceil($pageCount/ $this->itemperpage) ;
		
		return $data;
    }


    public function get_data_moderationFilter($fillterBy,$value,$page)
	  {	

      $firstNumber = ($page - 1) *  $this->itemperpage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE moderationStatus = 0 AND $fillterBy = '$value'
      ORDER BY news.createDate DESC LIMIT $firstNumber,  $this->itemperpage";

      $data['news'] = $this->get_many($sql);

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        WHERE moderationStatus = 0 AND $fillterBy = '$value'";

      $pageCount = $this->get_count($sql2);

      $data['pagesCount'] = ceil($pageCount/ $this->itemperpage) ;
		
		return $data;
	}

  public function get_data_users($page)
	{	
	

    $firstNumber = ($page - 1) *  $this->itemperpage;

    $sql = "SELECT *
      FROM user
        INNER JOIN userGroup
          ON user.idgroup = userGroup.idGroup
        INNER JOIN accessRights
          ON userGroup.idAaccessRights = accessRights.idRigths
      ORDER BY user.idUser DESC LIMIT $firstNumber,  $this->itemperpage";

    $data['users'] = $this->get_many($sql);;

    $sql2 = "SELECT COUNT(*) FROM user";

    $pageCount = $this->get_count($sql2);

    $data['pagesCount'] = ceil($pageCount/ $this->itemperpage) ;
		
		return $data;
	}

  public function deleteNews($idNews)
	{	
    $sql = "DELETE FROM news
    WHERE idNews = '$idNews'";

    if($this->execute($sql)){
      echo 'OK';
    };

	}

  public function deleteUser($idUser)
	{	
    $sql = "DELETE FROM user
    WHERE idUser = '$idUser'";

    if($this->execute($sql)){
      echo 'OK';
    };

	}

  public function publishNews($idNews)
	{	
    $sql = "UPDATE news
    SET moderationStatus = 1
    WHERE idNews = '$idNews'";

    if($this->execute($sql)){
      echo 'OK';
    };

	}

  public function sendForModerationNews($idNews){
    $sql = "UPDATE news
    SET moderationStatus = 0
    WHERE idNews = '$idNews'";

    if($this->execute($sql)){
      echo 'OK';
    };
  }

  public function get_data_detailNews($idNews){
    $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE news.idNews = '$idNews' ";

       $data = $this->get_one($sql);
		
		return $data;
  }


  public function update_news(){
    header('Content-type:text/html; charset=UTF-8');
    
    
      if($_SERVER["REQUEST_METHOD"] == "POST"){
      $flag = true;
      if(isset($_FILES['picture'])){
         if($_FILES['picture']['name']!==''){
            $picture = $_FILES['picture'];
            $pictureTmpName = $_FILES['picture']['tmp_name'];
            $errorCode = $_FILES['picture']['error'];
    
            if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($pictureTmpName)) {
                // Массив с названиями ошибок
                $errorMessages = [
                  UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
                  UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
                  UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
                  UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
                  UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                  UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                  UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
                ];
                // Зададим неизвестную ошибку
                $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
                // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
                $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
                // Выведем название ошибки
                $flag = false; 
                echo $outputMessage;
              } 
    
                $fi = finfo_open(FILEINFO_MIME_TYPE);
        
                // Получим MIME-тип
                $mime = (string) finfo_file($fi, $pictureTmpName);
                
                // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
                if (strpos($mime, 'image') === false) {
                    $flag=false;
                    echo "<p style='color:red;'>Можно загружать только изображения!</p>";
                };
    
                $name = md5_file($pictureTmpName);
    
                
                $image = getimagesize($pictureTmpName);
     
                // Сгенерируем расширение файла на основе типа картинки
                $extension = image_type_to_extension($image[2]);
                
                // Сократим .jpeg до .jpg
                $format = str_replace('jpeg', 'jpg', $extension);

                // Переместим картинку с новым именем и расширением в папку /upload
                if (!move_uploaded_file($pictureTmpName,ROOTDIR.'/upload/' . $name . $format)) {
                    $flag = false;
                    echo "<p style='color:red;'>При записи изображения на диск произошла ошибка.</p>";
                }
                $pictureSRC = $name . $format;
        }else{
            $pictureSRC = NULL;
        }
        
    }
 
    if(!empty($_POST['category']) && !empty($_POST['theme']) && !empty($_POST['text']) && !empty($_POST['idUser'])){
        $categoryName = htmlspecialchars($_POST['category']) ;
        $theme = htmlspecialchars($_POST['theme']) ;
        $text = htmlspecialchars($_POST['text']) ;
        $idNews = htmlspecialchars($_POST['idUser']) ;


        if(trim($categoryName) == ''){
            $flag = false;
            echo "<p style='color:red;'>Выберите категорию</p> ";
        }

        if (mb_strlen($theme) > 255 ){
            $flag = false;
            echo "<p style='color:red;'>Слишком длинное название темы</p> ";
        }else if(trim($theme) == ''){
            $flag = false;
            echo "<p style='color:red;'>Введите название темы</p> ";
            
        }

        if (mb_strlen($text) > 2000 ){
            $flag = false;
            echo "<p style='color:red;'>Слишком длинное сообщение</p> ";
        }else if(trim($text) == ''){
            $flag = false;
            echo "<p style='color:red;'>Введите сообщение</p> ";
        }

        
        if($flag == true){
            $sql_IDCategory = "SELECT idCategory FROM category WHERE categoryName = '$categoryName'";
           
            if($categoryIDquary = $this->get_one($sql_IDCategory)['idCategory']){
              $sql_postnews = "UPDATE news SET idCategory = '$categoryIDquary', theme = '$theme', pictureLink = '$pictureSRC', textContent = '$text', changeDate = CURRENT_TIMESTAMP
              WHERE idNews = '$idNews'";

              if($this->execute($sql_postnews)) {
                echo "<p style='color:green;'>Успешно изменено</p>";
              }else{
                echo  "<p style='color:red;'>Ошибка отправки, попробуйте еще раз</p>";
              }
            }else{
              echo  "<p style='color:red;'>Ошибка отправки, попробуйте еще раз</p>";
            }
        }        
    }else{
        $flag = false;
        echo "<p style='color:red;'>Заполните все поля</p>";
    }
    
    }   
  }

  // public function get_editNews($idNews){
  //   $sql = "SELECT * FROM news
  //       INNER JOIN category
  //         ON news.idCategory = category.idCategory
  //       INNER JOIN user
  //         ON news.idUser = user.idUser
  //     WHERE news.idNews = '$idNews' ";

  //      $data = $this->get_one($sql);
		
	// 	return $data;
  // }


}
