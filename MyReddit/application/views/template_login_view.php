<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>MyReddit</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<script src="../js/request.js"></script>
	</head>
<body>
    <div class="container">
        <header class="header">	
			<a class="logo_link" href="/"><p>MyReddit</p></a>
		</header>
        <div id="content">
			<div class="box">
				<?php include 'application/views/'.$content_view; ?>
				
			</div>
			<br class="clearfix" />
		</div>
    </div>
</body>
</html>