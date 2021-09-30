
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

echo "<br>Please login to access this page";
// redirects the user to the login page once user has been shown the error message above, indicating they have not logged in
header("refresh:3; url = login.php");

?>

