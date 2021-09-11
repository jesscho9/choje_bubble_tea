<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$delete_bubbletea = "DELETE FROM drinks WHERE DrinkID='$_GET[DrinkID]'";

if(!mysqli_query($con, $delete_bubbletea))
{
    echo 'Not deleted';
}

else{
    echo 'Deleted';
}

header("refresh:10; url = menu1.php");


?>

