<?php
	
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: zaloguj1.php');
		exit();
	}
	
?>
<html>
<head>
<title>e-budowa</title>
<meta charset="utf-8">
<meta name="e-budowa" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <a href="index.html"><img src="images/logo.png" /></a>
    </div>
    <!-- ################################################################################################ -->
    
	<nav id="mainav" class="fl_right">
      <ul class="clear">
        <li>Witaj<?php echo " ".$_SESSION['login'].'!</p>'; ?></li>
        <li><a href="logout.php">Wyloguj się</a></p></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>

<!--<div class="wrapper bgded overlay">
	<div class="test">
		<div id="pageintro" class="hoc clear"> 

			<article>
			  <h2 class="heading">Zlecę remont</h2>
			  <p>Kliknij poniżej, aby dodać swoje<br /> ogłoszenie / wyszukać wykonawcy</p>
			  <footer><a class="btn" href="/index.php">Sprawdź</a></footer>
			</article>

		</div>
	</div> 
	 
	<div class="test">
	  <div id="test1">
		<article>
			  <h2 class="heading">Wykonam remont</h2>
			  <p>Kliknij poniżej, aby wyszukać<br /> zlecenia dla Ciebie i twojej firmy</p>
			  <footer><a class="btn" href="/ogloszenia.php">Sprawdź</a></footer>
			</article>
	  </div>
	</div>
  
</div>-->
<div style="clear:both;"></div>
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="center btmspace-50">
      <h2 class="heading">Najnowsze ogłoszenia</h2>
      <p>Sprawdź czy czegoś nie przegapiłeś i bądź na bieżąco!</p>
    </div>
	
	

		Nazwa <?php echo " ".$_SESSION['name'] ?> <br />
		ad <?php echo " ".$_SESSION['opis'] ?> <br />
		temat<a href="read.php?id=1"> tak</a>
		<br />
	
	
	
	<?php
                    // Include config file
                    require_once "config.php";
					
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            //echo "<table class='table table-bordered table-striped'>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    //echo "<tr>";
                                        echo $row['id'];
                                        echo $row['name'];
                                        echo $row['opis'];
                                        echo $row['salary'];
                                        /*echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>"*/
                                    //echo "</tr>";
                                }
                                echo "</tbody>";                            
                            //echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
					
					
					
	
    <ul class="nospace group btmspace-50">
      <li class="one_third first">
        <article class="element">
          <figure><img src="images/demo/320x210.png" alt="">
            <figcaption><a class="btn small" href="#">More</a></figcaption>
          </figure>
          <div class="excerpt">
            <time datetime="2045-06-06T08:15+00:00" data-title="June"><strong>Jun</strong> <em>06</em></time>
            <h6 class="heading"><a href="#">Remont łazienki</a></h6>
            <p>Położenie kafelek w łazience 10m^2&hellip;</p>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="element">
          <figure><img src="images/demo/320x210.png" alt="">
            <figcaption><a class="btn small" href="#">More</a></figcaption>
          </figure>
          <div class="excerpt">
            <time datetime="2045-05-05T08:15+00:00" data-title="May"><strong>May</strong> <em>05</em></time>
            <h6 class="heading"><a href="#">Wymiana podłogi</a></h6>
            <p>Do wymiany podłoga w salonie 15m^2. Zerwanie parkietu oraz położenie paneli&hellip;</p>
          </div>
        </article>
      </li>
      <li class="one_third">
        <article class="element">
          <figure><img src="images/demo/320x210.png" alt="">
            <figcaption><a class="btn small" href="#">More</a></figcaption>
          </figure>
          <div class="excerpt">
            <time datetime="2045-04-04T08:15+00:00" data-title="April"><strong>Apr</strong> <em>04</em></time>
            <h6 class="heading"><a href="#">Montaż kuchni</a></h6>
            <p>Montaż mebli kuchennych IKEA&hellip;</p>
          </div>
        </article>
      </li>
    </ul>
    <p class="center nospace"><a class="btn" href="#">Sprawdź</a></p>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="group">
      <div class="one_third first btmspace-30">
        <h6 class="font-x3 uppercase">Polecani wykonawcy <a href="#">&raquo;</a></h6>
      </div>
      <article class="one_third btmspace-30">
        <h6 class="uppercase font-x1"><a href="#">Firma A</a></h6>
        <p class="nospace">Frima A, jest na rynku od ponad 10lat. Specjalizujemy się w remontach oraz wykończeniówce&hellip;</p>
      </article>
      <article class="one_third btmspace-30">
        <h6 class="uppercase font-x1"><a href="#">Firma B</a></h6>
        <p class="nospace">Firma B, oferujemy usługi malarskie w najlepszych cenach na rynku&hellip;</p>
      </article>
      <article class="one_third first">
        <h6 class="uppercase font-x1"><a href="#">Firma C</a></h6>
        <p class="nospace">Jeśli remont Cię przeraża, a w ręku nigdy nie trzymałeś młotka to jestesmy tu własnie dla Ciebie! Remonty&hellip;</p>
      </article>
      <article class="one_third">
        <h6 class="uppercase font-x1"><a href="#">Firma D</a></h6>
        <p class="nospace">Firma D jest małą rodzinną firmą, która od lat specjalizuje się w remontach oraz budowlance. Sprawdź co oferujemy&hellip;</p>
      </article>
      <article class="one_third">
        <h6 class="uppercase font-x1"><a href="#">Firma E</a></h6>
        <p class="nospace">Jesteśmy specjalistami w układaniu podłóg. Ułożymy dla Ciebie wymarzony parkiet, panele czy płytki&hellip;</p>
      </article>
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Zlecę remont</h2>
                        <a href="create.php" class="btn btn-success pull-right">dodaj nowe ogłoszenie</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Tytuł</th>";
                                        echo "<th>Opis</th>";
                                        echo "<th>Kwota</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['opis'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
	
	<div class="wrapper row5">
		<div id="copyright" class="hoc clear"> 
		<!-- ################################################################################################ -->
		<p style="fl_left">Copyright &copy; 2020 - All Rights Reserved |<a href="#"> e-budowa.cba.pl</a></p>
		<!-- ################################################################################################ -->
		</div>
	</div>
	<!-- ################################################################################################ -->

	<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
	<!-- JAVASCRIPTS -->
	<script src="layout/scripts/jquery.min.js"></script>
	<script src="layout/scripts/jquery.backtotop.js"></script>
	<script src="layout/scripts/jquery.mobilemenu.js"></script>
	<!-- IE9 Placeholder Support -->
	<script src="layout/scripts/jquery.placeholder.min.js"></script>
	<!-- / IE9 Placeholder Support -->
	
</body>
</html>