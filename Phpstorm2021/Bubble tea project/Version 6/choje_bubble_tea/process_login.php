
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

$login_query = "SELECT * FROM users WHERE Username = '". $user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

// checks if the log-in details the user entered were valid of not
if ($user == $login_record['Username']) {
    $hash = $login_record['Password'];
    $verify = password_verify($pass, $hash);
    if ($verify) {
        // This sets a session variable to contain the value of True when the user has successfully logged in.
        $_SESSION['logged_in'] = True;
        header( "Location: menu1.php");
    }
    else{
        echo "<br>Incorrect password";
        header("refresh:3; url = login.php");

    }
} else {
    echo "<br>Invalid username, please try again.";
    header("refresh:3; url = login.php");

}

?>

