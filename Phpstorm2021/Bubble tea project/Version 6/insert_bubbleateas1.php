
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$Name = $_POST['Name'];
$DrinkType = $_POST['select_drinktype'];
$RPrice = $_POST['RPrice'];
$LPrice = $_POST['LPrice'];
$CanBeHot = $_POST['CanBeHot'];

$CanBeHotvalue = $_POST['CanBeHot'];
if ($CanBeHotvalue == "Y" OR "N") {
    $CanBeHot = $_POST['CanBeHot'];
    echo "can be hot value ".$CanBeHot;
    echo "<br>" . "a radio button has been selected yaysies";

}
else
{
    echo 'not allowed to be nothing u bum';
    header("refresh:5; url = add_bubbleteas1.php");
}

?>

