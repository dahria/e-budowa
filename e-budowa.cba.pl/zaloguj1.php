<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: test.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<title>e-budowa</title>
	<meta charset="utf-8">
	<meta name="e-budowa" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="layout/styles/login.css" rel="stylesheet" type="text/css" media="all">
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

	<div class="wrapper row1">
	  <header id="header" class="hoc clear"> 
		<!-- ################################################################################################ -->
		<div id="logo" class="fl_left">
		  <a href="index.html"><img src="images/logo.png" width="200px"/></a>
		  
		</div>
		 <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="rejestracja.php">Zarejestruj się</a></li>
      </ul>
    </nav>
	  </header>
	</div>

	
	<div id="login">
			<form action="zaloguj.php" method="post">
				
				<input type="text" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'" name="login">	
				<input type="password" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" name="haslo" >
				<input type="submit" value="Zaloguj się" />
				
			</form>
	<?php
		if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
	?>		
	</div>
	

</body>
</html>