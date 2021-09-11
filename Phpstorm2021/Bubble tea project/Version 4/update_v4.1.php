<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$Name = $_POST['Name'];

$update_bubbletea = "UPDATE drinks SET Name='$_POST[Name]', DrinkType='$_POST[DrinkType]', RPrice='$_POST[RPrice]', LPrice='$_POST[LPrice]', CanBeHot='$_POST[CanBeHot]', WHERE DrinkID='$_POST[DrinkID]'";
echo "<br>". $update_bubbletea;
echo "<br>". $Name. "<br>";


if(!mysqli_query($con, $update_bubbletea))
{
    echo '<br>Not updated';
}
else {
    echo 'Updated';
}

header("refresh:10; url = menu.php");

?>


