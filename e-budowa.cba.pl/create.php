<?php
	
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: zaloguj1.php');
		exit();
	}
	
?>

<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $opis = $salary = "";
$name_err = $opis_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate opis
    $input_opis = trim($_POST["opis"]);
    if(empty($input_opis)){
        $opis_err = "Please enter an opis.";     
    } else{
        $opis = $input_opis;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($opis_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, opis, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_opis, $param_salary);
            
            // Set parameters
            $param_name = $name;
            $param_opis = $opis;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>e-budowa - dodawanie ogłoszenia</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link href="layout/styles/login.css" rel="stylesheet" type="text/css" media="all">
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	
	<style type="text/css">
	 	.error
	 	{
	 		color: red;
	 		margin-top: 10px;
	 		margin-bottom: 10px;
	 	}
	 </style>
</head>
<body>

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <a href="index.php"><img src="images/logo.png" /></a>
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
	
    <div id="login">
        <p style=font-size:25px;>Dodaj nowe ogłoszenie</p>
		<br />
                    <!--<p>Please fill this form and submit to add employee record to the database.</p>-->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Tytuł</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($opis_err)) ? 'has-error' : ''; ?>">
                            <label>opis</label>
                            <textarea name="opis" class="form-control"><?php echo $opis; ?></textarea>
                            <span class="help-block"><?php echo $opis_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>koszt za remont</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Opublikuj">
                    </form>
               
          
    </div>
</body>
</html>