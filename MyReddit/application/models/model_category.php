<?php

class Model_Category extends Model
{


    public function get_data_JavaScript($page)
	  {			
      $data = $this->get_any_data('JavaScript',$page);
      return $data;
	  }

    public function get_data_PHP($page)
	  {			
      $data = $this->get_any_data('PHP',$page);
      return $data;
	  }

    public function get_data_DataBases($page)
	  {	
      $data = $this->get_any_data('Базы данных',$page);
      return $data;
	  }

    public function get_data_ReactJS($page)
	  {	
		$data = $this->get_any_data('React.js',$page);
		return $data;
	  }


  function get_any_data($category,$page){
    $itemsPerPage = ITEMS_PER_PAGE;
    $firstNumber = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM news
        INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser 
        
        WHERE moderationStatus = 1 AND categoryName = '$category' ORDER BY createDate DESC LIMIT $firstNumber, $itemsPerPage";
        
        $data['news'] = $this->get_many($sql);
       

       $sql2 = "SELECT COUNT(*) FROM news
       INNER JOIN category
          ON news.idCategory = category.idCategory
        INNER JOIN user
          ON news.idUser = user.idUser  
        WHERE moderationStatus = 1 AND categoryName = '$category'";

      $countItems = $this->get_count($sql2);

      $data['pagesCount'] = ceil($countItems/$itemsPerPage) ;
      $data['category'] = 'JavaScript';
		
		return $data;
  }
}
