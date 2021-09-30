<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// delete bubble tea query getting the drink id that the user chose from the menu page
$delete_bubbletea_query = "DELETE FROM drinks WHERE DrinkID='$_GET[DrinkID]'";

if(!mysqli_query($con, $delete_bubbletea_query))
{
    echo 'Not deleted';
}

else{
    echo "<br>". 'Drink successfully deleted';
}

// redirects the user to the menu page after selected drink has been deleted
header("refresh:3; url = menu1.php");

?>

