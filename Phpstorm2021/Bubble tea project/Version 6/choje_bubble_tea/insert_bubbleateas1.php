
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$DrinkID = $_POST['DrinkID'];
$Name = $_POST['Name'];
$DrinkType = $_POST['select_drinktype'];
$RPrice = $_POST['RPrice'];
$LPrice = $_POST['LPrice'];
$CanBeHot = $_POST['CanBeHot'];
echo "this is the can be hot value ". $CanBeHot;
echo "drink type ". $DrinkType;
echo "regular price ". $RPrice;

// TODO INSERT AND UPDATE

echo "this is the drinkid ".$DrinkID;

if($DrinkID != ""){
    $update_bubble_tea = "UPDATE drinks SET Name='$Name',DrinkType='$DrinkType',RPrice='$RPrice',LPrice='$LPrice',CanBeHot='$CanBeHot' WHERE DrinkID='$DrinkID'";
    if(!mysqli_query($con, $update_bubble_tea))
    {
        echo 'Not updated';
    }
    else
    {
        echo 'Updated';
        header("refresh:6; url = change_bubbleteas.php");
    }
}else{
    $insert_bubble_tea = "INSERT INTO drinks (Name, DrinkType, RPrice, LPrice, CanBeHot) VALUES ('$Name', '$DrinkType', '$RPrice', '$LPrice', '$CanBeHot')";
    if(!mysqli_query($con, $insert_bubble_tea))
    {
        echo 'Not inserted';
    }
    else
    {
        echo 'Inserted';
        header("refresh:6; url = change_bubbleteas.php");
    }
}

?>

