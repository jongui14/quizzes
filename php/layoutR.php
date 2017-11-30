<?php session_start (); 
if(isset($_SESSION['erabiltzailea'])){
	echo $_SESSION['erabiltzailea'];
}else{
	echo 'ANONIMOA';
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='../stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../stylesPWS/smartphone.css' />
		   

		   
		 <script type="text/javascript" language="JavaScript">
			xhr0 = new XMLHttpRequest();
			
			xhr0.onreadystatechange = function(){
			if ((xhr0.readyState==4)&&(xhr0.status==200 )){
					location.href="handlingQuizes.php?eposta=<?php echo $_SESSION['eposta']?>";
				}
			}
			
			function erabiltzaileaGehitu(){
				xhr0.open("GET","erabiltzaileaGehitu.php");
				xhr0.send();
			}

		</script>
		
		<script type="text/javascript" language="JavaScript">//Erabiltzailea kendu
			xhr4 = new XMLHttpRequest();
			
			xhr4.onreadystatechange = function(){
			if ((xhr4.readyState==4)&&(xhr4.status==200 )){		
					location.href="./layoutR.php";
				}
			}
			
			function erabiltzaileaKendu(){
				xhr4.open("GET","erabiltzaileaKendu.php",true);
				xhr4.send();
			}

		</script>
		
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
	
			<?php  
		
			if(isset($_SESSION['erabiltzailea'])){
				echo '<input id="boton1" class="botoia" type="button" onclick="erabiltzaileaKendu();" value="LogOut">';
			}else{
				echo  '<span class="right"><a href="./logIn.php">LogIn</a> </span>
					  <span class="right"><a href="./signUp.php">SingUp</a></span>';
			}

		
		?>
	
	
      <!--<span class="right"><a href="./logIn.php">LogIn</a> </span>-->
	  <!--<span class="right"><a href="./signUp.php">SingUp</a> </span>-->
      <!--<span class="right" ><a href="../layout.html">LogOut</a> </span>-->

	
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
	
		<?php  
		
			echo "<span><a href='layoutR.php'>Home</a></span>";
			
			
			if(isset($_SESSION['erabiltzailea'])){
				$mota=$_SESSION['erabiltzailea'];
				
				if($mota=='ikaslea'){
					echo "<span><a href='handlingQuizes.php'>Galdera kudeaketa (AJAX)</a></span>
						  <span><a href='getQuestionI.php'>Galdera Lortu (Lab 6 h1)</a></span>";
				}else if($mota=='irakaslea'){
					echo "<span><a href='reviewingQuizes.php'>Galdera Aldatu</a></span>";
				}
			}else{
				echo "<span><a href='play.php'>PLAY</a></span>";
			}
			
			echo "<span><a href='../author/credits.html'>Credits</a></span>";
		
		?>
		
		
		
		<!--<span><a href='addQuestion.php?eposta=<?php echo($_GET["eposta"]); ?>'>Add quiz</a></span>-->
		<!--<span><a href='erakutsiGalderak.php?eposta=<?php echo($_GET["eposta"]); ?>'>Erakutsi galderak</a></span>
		<span><a href='showQuestionsWithImages.php?eposta=<?php echo($_GET["eposta"]); ?>'>Erakutsi galderak irudiekin</a></span>
		<span><a href='showXMLQuestions.php?eposta=<?php echo($_GET["eposta"]); ?>'>Erakutsi galderak XML</a></span>
		<span><a href='author/credits.php?eposta=<?php echo($_GET["eposta"]); ?>'>Credits</a></span>-->
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
