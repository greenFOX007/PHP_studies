<?php
	session_start();
	if(!isset($_SESSION['isLogin'])){
		$_SESSION['isLogin'] = 'false';
	}
	
 ?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>MyReddit</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/request.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="header">	
				<a class="logo_link" href="/"><p>MyReddit</p></a>
				<div class="login">
					<?php
						if($_SESSION['isLogin'] == 'false'){?>
							<a class='header_login' href='/authorization'>Войти</a>
						<?php	
						}elseif($_SESSION['isLogin']=='true'){ ?>
							<div class='loggined_user_container'>
								<a class='header_login' href='/profile'><?=isset($_SESSION['name'])?$_SESSION['name']:''?></a>
								<a class='header_exit' href='/application/request/exit.php'>Выйти</a>
							</div>

						<?php } ?>
				</div>
			</header>
			<nav class="category_nav">
				<ul class="category_list">
					<li class="category_list-item">
						<a class="category-link" href="/category/JavaScript">JavaScript</a>
					</li>
					<li class="category_list-item">
						<a class="category-link" href="/category/PHP">PHP</a>
					</li>
					<li class="category_list-item">
						<a class="category-link" href="/category/DataBases">Базы Данных</a>
					</li>
					<li class="category_list-item">
						<a class="category-link" href="/category/ReactJS">ReactJS</a>
					</li>
				</ul>
			</nav>
			<?php 
				if($_SESSION['isLogin'] == 'true'){ ?>
					
					<div class='news_creator_container'>
						<form name='postnews' class='news_creator_form' >	
							<label for='categoty'>Выберете категорию</label>
							<select class='news_creator_select' name='category'>
								<option value='JavaScript' selected>JavaScript</option>
								<option value='PHP'>PHP</option>
								<option value='Базы данных'>Базы Данных</option>
								<option value='React.js'>ReactJS</option>
							</select>
							<label for='theme'>Тема:</label>
							<input class='news_creator_input' name='theme' type='text' placeholder='Введите название'>
							<label for='text'>Текст:</label>
							<textarea class='news_creator_textarea' name='text' placeholder='Введите текст'></textarea>
							<input type='hidden' name='MAX_FILE_SIZE' value='50000000' />
							<label for='picture'>Вставьте картинку</label>
							<input class='picture_form' name='picture' type='file'>
							<input name='idUser' value='<?=$_SESSION['idUser']?>' type='hidden'>
							<button class='news_creator_button' type='button' onclick='postNewsEvent()'>Создать</button>
							<div id='postNews_response'></div>	
						</form>
					</div>
					<?php } ?>
					
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					</div>
				</div>
		</div>
		
				
	</body>
</html>