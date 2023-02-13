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
				<!--
				<h2>Welcome to Accumen</h2>
				<img class="alignleft" src="images/pic01.jpg" width="200" height="180" alt="" />
				<p>
					This is <strong>Accumen</strong>, a free, fully standards-compliant CSS template by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The images used in this template are from <a href="http://fotogrph.com/">Fotogrph</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions 3.0</a> license, so you are pretty much free to do whatever you want with it (even use it commercially) provided you keep the footer credits intact. Aside from that, have fun with it :)
				</p>
				-->
			</div>
			<br class="clearfix" />
		</div>
    </div>
</body>
</html>