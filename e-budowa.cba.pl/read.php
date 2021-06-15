<?php
	
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: zaloguj1.php');
		exit();
	}
	
?>

<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $opis = $row["opis"];
                $salary = $row["salary"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<html>

<meta name="e-budowa" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>e-budowa - ogłoszenie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<meta name="e-budowa" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

    <!--<style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>-->
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
<br /><br />

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Ogloszenie</h1>
                    </div>

					<p>Numer ogoszenia: <?php echo $row["id"]; ?>
                    <p>Tytul: <?php echo $row["name"]; ?>
					<p>Opis: <?php echo $row["opis"]; ?>
					<p>Kwota: <?php echo $row["salary"]; ?>
										
                    <p><a href="/index.php" class="btn btn-primary">Powrót</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>