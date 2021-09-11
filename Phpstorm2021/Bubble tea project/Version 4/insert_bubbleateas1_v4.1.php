
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$Name = $_POST['Name'];
$DrinkType = $_POST['DrinkType'];
$RPrice = $_POST['RPrice'];
$LPrice = $_POST['LPrice'];
$CanBeHot = $_POST['CanBeHot'];

echo "<br>". $Name. "<br>";

$insert_bubbletea = "INSERT INTO drinks (Name, DrinkType, RPrice, LPrice, CanBeHot) VALUES ('$Name', '$DrinkType', '$RPrice', '$LPrice', '$CanBeHot')";

if(!mysqli_query($con, $insert_bubbletea))
{
    echo 'Not inserted';
}
else
{
    echo 'Inserted';
}

header("refresh:3; url = menu1_v4.1.php");

?>

