
<?php
// WONT NEED NOW AS MENU CHECKS THIS??

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

echo "Please login to access this page";
header("refresh:4; url = login.php");

?>