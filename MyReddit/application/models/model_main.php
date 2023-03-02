<?php
namespace application\models;
use \application\core\Model;

class Model_Main extends Model
{

  public $itemperpage = ITEMS_PER_PAGE;

	
	public function get_data()
	{	

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE news.moderationStatus = 1
      ORDER BY news.createDate DESC";

      

       $data = $this->get_many($sql);;
		
		return $data;
	}

  public function get_dataPage($page)
	{	
    $firstNumber = ($page - 1) * $this->itemperpage;


        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE news.moderationStatus = 1
      ORDER BY news.createDate DESC LIMIT $firstNumber, $this->itemperpage";

      $result =  $this->get_many($sql);;

       $data['news'] = $result;

       $sql2 = "SELECT COUNT(*) FROM news
       WHERE news.moderationStatus = 1";
    

      $pages = $this->get_count($sql2);
      

      $data['pagesCount'] = ceil($pages/$this->itemperpage) ;
		
		return $data;
	}


  public function post_news(){
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
                include "./config.php";
                // Переместим картинку с новым именем и расширением в папку /upload
                if (!move_uploaded_file($pictureTmpName,"$ROOTDIR".'/upload/' . $name . $format)) {
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
        $iduser = htmlspecialchars($_POST['idUser']) ;


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
              $sql_postnews = "INSERT INTO `news` (`idNews`, `idCategory`, `theme`, `pictureLink`, `textContent`, `idUser`, `createDate`, `changeDate`, `likeCount`, `moderationStatus`) 
              VALUES (NULL, '$categoryIDquary', '$theme', '$pictureSRC', '$text', '$iduser', CURRENT_TIMESTAMP, NULL, NULL, '0')";

              if($this->execute($sql_postnews)) {
                echo "Успешно отправленно";
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


  public function searchNews($page){
    // header('Content-type:text/html; charset=UTF-8');
    $firstNumber = ($page - 1) * $this->itemperpage;
    if($_SERVER["REQUEST_METHOD"] == "GET"){
      if(!empty($_GET['searchValue'])){
        $value = $_GET['searchValue'];

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser
      WHERE news.moderationStatus = 1 AND MATCH (theme,textContent) AGAINST ('$value')
      ORDER BY news.createDate DESC LIMIT $firstNumber, $this->itemperpage";


        $data['news'] = $this->get_many($sql);

        $sql2 = "SELECT COUNT(*) FROM news
        WHERE news.moderationStatus = 1 AND MATCH (theme,textContent) AGAINST ('$value')"; 

        $pages = $this->get_count($sql2);

        $data['pagesCount'] = ceil($pages/$this->itemperpage) ;
        
        return $data;

      }
    }
  }

}
