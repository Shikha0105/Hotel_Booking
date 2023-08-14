<?php
session_start();

 
    $db = mysqli_connect("localhost","root","","project1");

    if(!$db){
        die("connection error...".mysqli_connect_error());
    }
    

if (isset($_POST['username'])){
      
	$username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($db,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($db,$password);
	
    $query = "SELECT * FROM `booking1` WHERE username='$username' and password='$password'";
	$result = mysqli_query($db,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
         
	    header("Location: dashboard.php");
         }else{
	echo "<div class='form'>
<h3>Username OR Password is incorrect.</h3>
<br/><a href='login.php'>Login</a></div>";
	}
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="login.css">
</head>

<body style ="background-image:url(hotel.jpg);background-size:cover; color:white;" >

<div class="form">

<form action="" method="post" name="login"><br><br>
<fieldset>
<legend><h1><b>Login</b></h1></legend>

<label for="username"><h2>User Name</h2></label>
<input type="text" name="username" placeholder="User Name" required>

<label for="password"><h2>Password<h2></label>
<input type="password" name="password" placeholder="Password" required><br>

<input name="submit" type="submit" value="Login"><br>
<p >Not registered yet? <a href='registration.php' > Register Here</a></p></p>

</fieldset>
</form>
</div>

</body>
</html>