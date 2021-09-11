
<?php

session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// to remove any whitespace the user has added after their username and password
$user = trim($_POST['username']);
$pass = trim($_POST['password']);

$login_query = "SELECT Password FROM users WHERE Username = '". $user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['Password'];

$verify = password_verify($pass, $hash);
if ($verify) {
    // This sets a session variable to contain the value of True when the user has successfully logged in. 
    $_SESSION['logged_in'] = True;
    header("Location: menu1_v4.1.php");
}
else{
    echo "Incorrect password";
    header("refresh:5; url: login_v4.1.php");

}

?>

