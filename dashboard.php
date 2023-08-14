<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$db = mysqli_connect("localhost", "root", "", "project1");

if (!$db) {
    die("Connection error..." . mysqli_connect_error());
}

$query = "SELECT * FROM `booking1` WHERE username='$username'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>

<body style="background-image: url(reg.png);vwidth:100%; height:100%; background-size:cover; ">
    <div class="container">
        <h1>Welcome to Your Dashboard</h1>
        <div class="booking-details">
            <p><b><i>Username:  <span style="color: #80266b;"><?php echo $row['username']; ?> </span></b></i></p>
            <p><b><i>Check-in Date:   <span style="color: #80266b;"><?php echo $row['check_in_date']; ?></span></b></i></p>
            <p><b><i>Check-out Date:   <span style="color: #80266b;"><?php echo $row['check_out_date']; ?></span></b></i></p>
            <p><b><i>Number of Guests:    <span style="color: #80266b;"><?php echo $row['guests']; ?></span></b></i></p>
            <p><b><i>Number of Rooms:  <span style="color: #80266b;"><?php echo $row['rooms']; ?></span></b> </i> </p>
        </div>
        <a style="text-decoration: none" class="btn-box" href="logout.php">Logout</a>
    </div>

</body>
</html>
