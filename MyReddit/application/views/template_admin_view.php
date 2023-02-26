<?php
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
		<link rel="stylesheet" type="text/css" href="/css/style_admin.css" />
		<script src="/js/request.js"></script>
	</head>
	<body>
		<div class="container">
		<?php 
				if($_SESSION['isLogin']=='true'){
					if(isset($_SESSION['idgroup']) && $_SESSION['idgroup']==1){ ?>
					<a href="/">На сайт</a>
				<?php	}
				}
			?>
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
								<a class='header_exit' href='/authorization/logout'>Выйти</a>
							</div>

						<?php } ?>
				</div>
			</header>
			<nav class="category_nav">
				<ul class="category_list">
					<li class="category_list-item">
						<a class="category-link" href="/admin">Весь контент</a>
					</li>
					<li class="category_list-item">
						<a class="category-link" href="/admin/moderation">Контент на модерации</a>
					</li>
					<li class="category_list-item">
						<a class="category-link" href="/admin/users">Пользователи</a>
					</li>

				</ul>
			</nav>	
				<div id="content">
					
					<div class="box">
					<form action="/admin/allNews/" class="filter_form" method="$_GET">
						<div class="filter_form_title">Поиск:</div>	
						<select class="filter_form_input" name="fillterBY">
							<option value="idNews">ID</option>
							<option value="categoryName">Категория</option>
							<option value="theme">Название</option>
							<option value="createDate">Дата публикации</option>
							<option value="moderationStatus">Активность</option>
						</select>
						<input class="filter_form_input" type="text" name="value" />
						<button type="submit" class="form_fillter_btn">Найти</button>
						<a href="/admin/resetMainFillter" class="form_fillter_btn">Сбросить</a>
					</form>
						<?php include 'application/views/'.$content_view; ?>
					</div>
				</div>
		</div>
		
				
	</body>
</html>