<div class='news_creator_container'>
    
	<form name='news_editor_form' class='news_creator_form' >	
		<label for='categoty'>Выберете категорию</label>
		<select class='news_creator_select' name='category'>
			<option value='JavaScript' <?php if($data['categoryName']=='JavaScript'){?> selected <?php } ?>>JavaScript</option>
			<option value='PHP' <?php if($data['categoryName']=='PHP'){?> selected <?php } ?>>PHP</option>
			<option value='Базы данных' <?php if($data['categoryName']=='Базы данных'){?> selected <?php }?>>Базы Данных</option>
			<option value='React.js' <?php if($data['categoryName']=='React.js'){?> selected <?php } ?>>ReactJS</option>
		</select>
		<label for='theme'>Тема:</label>
		<input class='news_creator_input' name='theme' type='text' value="<?=$data['theme']?>" placeholder='Введите название'>
		<label for='text'>Текст:</label>
		<textarea class='news_creator_textarea' name='text' ><?=$data['textContent']?></textarea>
		<input type='hidden' name='MAX_FILE_SIZE' value='50000000' />
		<label for='picture'>Вставьте картинку</label>
		<input class='picture_form' name='picture' type='file'>
		<input name='idUser' value='<?=$data['idNews']?>' type='hidden'>
		<button class='news_creator_button' type='button' onclick='updateNewsEvent()'>Изменить</button>
		<div id='postNews_response'></div>	
	</form>
</div>