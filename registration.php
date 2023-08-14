<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <title>Hotel Booking</title>
</head>
<body style="background-image: url(reg.png); width:100%; height:100%; background-size:cover; ">
</div>

<div class="container">
    <?php
session_start();

$db = mysqli_connect("localhost","root","","project1");

    if(!$db){
        die("connection error...".mysqli_connect_error());
    }
    
    
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $check_in_date=date('Y-m-d',strtotime($_POST['check_in_date']));
        $check_out_date=date('Y-m-d',strtotime($_POST['check_out_date']));
        $guests=$_POST['guests'];
        $rooms=$_POST['rooms'];
        
    $temp = mysqli_query($db,"INSERT INTO booking1 (username,check_in_date,check_out_date,guests,rooms,password) 
    VALUES ('$username','$check_in_date','$check_out_date','$guests','$rooms','$password')");
    
    if(!$temp){
        echo "error";
      
    }else{
        echo "Your registration is done.";
       
    }
    }
?>

<div style="text-align: right; margin-top: 10px;">
    <a style="text-decoration: none; display: inline-block; padding: 10px 20px;" class="btn-box" href="login.php">Login</a>
</div>
    <h1>Hotel Room Booking</h1>
    <form class="form-signin" method="POST" name="registration" >
    <div class="input-group">

        <span class="input-group-addon" id="basic-addon1"><b>Username<b></span><br><br>
	    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
        
        <span class="input-group-addon" id="basic-addon1"><b>Check-in-Date</b></span><br><br>
        <input type="date" name="check_in_date" id="check-in-date" class="form-control" placeholder="YYYY-MM-DD"  required>
        
        <span class="input-group-addon" id="basic-addon1"><b>Check-out-Date</b></span><br><br>
        <input type="date" name="check_out_date" id="check-out-date" class="form-control" placeholder="YYYY-MM-DD"  required><br>

        <label for="guests">Number of Guests</label>
        <input type="number" name="guests" id="guests" min="1" required>

        <label for="rooms">Number of Rooms</label>
        <input type="number" name="rooms"id="rooms" min="1" required>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            
        <div style="display: flex; justify-content: space-between;">
        <input type="submit" name="submit" id="submit" value="Book Now" style="width: 120px; height: 40px; font-size: 16px;">
        <input type="reset" name="submit" id="submit" value="Reset" style="width: 100px; height: 40px; font-size: 16px;">
    </div>
    </form>
</body>
</html>

