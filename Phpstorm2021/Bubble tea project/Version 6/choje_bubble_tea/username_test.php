<?php


$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$password = 'Avocado';
$bcrypt_password = password_hash ($password, PASSWORD_BCRYPT);
echo "<br>Bcrypt Password: " .$bcrypt_password;

$user_types = 'Avocado';

// will echo out the bcrypted password on this page
$verify = password_verify($user_types, $bcrypt_password);
echo "<br>";

if ($verify) {
    echo "Access Granted!";
}
else {
    echo "Incorrect Password";
}

?>