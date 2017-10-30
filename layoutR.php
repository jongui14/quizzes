<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <!--<span class="right"><a href="./php/logIn.php">LogIn</a> </span>-->
	  <!--<span class="right"><a href="./php/signUp.php">SingUp</a> </span>-->
      <span class="right" ><a href="layout.html" onmouseDown="alert('Saioa itxi duzu.')">LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
	
		<span><a href='layoutR.php?eposta=<?php echo($_GET["eposta"]); ?>'>Home</a></span>
		<span><a href='php/addQuestion.php?eposta=<?php echo($_GET["eposta"]); ?>'>Add quiz</a></span>
		<span><a href='php/erakutsiGalderak.php?eposta=<?php echo($_GET["eposta"]); ?>'>Erakutsi galderak</a></span>
		<span><a href='php/showQuestionsWithImages.php?eposta=<?php echo($_GET["eposta"]); ?>'>Erakutsi galderak irudiekin</a></span>
		<span><a href='author/credits.php?eposta=<?php echo($_GET["eposta"]); ?>'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
	Quizzes and credits will be displayed in this spot in future laboratories ...
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com/jongui14/quizzes'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>