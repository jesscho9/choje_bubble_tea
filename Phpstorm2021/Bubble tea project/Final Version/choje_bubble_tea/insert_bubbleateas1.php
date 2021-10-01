
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// gets the values entered in from the form by the user
$DrinkID = $_POST['DrinkID'];
$Name = $_POST['Name'];
$DrinkType = $_POST['select_drinktype'];
$RPrice = $_POST['RPrice'];
$LPrice = $_POST['LPrice'];
$CanBeHot = $_POST['CanBeHot'];

// shows different queries for if the user wants to insert or update a bubble tea in the database
if($DrinkID != ""){
    // the query that allows the user to update a bubble tea in to the database
    $update_bubble_tea_query = "UPDATE drinks SET Name='$Name',DrinkType='$DrinkType',RPrice='$RPrice',LPrice='$LPrice',CanBeHot='$CanBeHot' WHERE DrinkID='$DrinkID'";
    if(!mysqli_query($con, $update_bubble_tea_query))
    {
        echo 'Not updated';
    }
    else
    {
        echo 'Updated';
        header("refresh:6; url = menu1.php");
    }
}else{
    // the query that allows the user to add a bubble tea in to the database
    $insert_bubble_tea_query = "INSERT INTO drinks (Name, DrinkType, RPrice, LPrice, CanBeHot) VALUES ('$Name', '$DrinkType', '$RPrice', '$LPrice', '$CanBeHot')";
    if(!mysqli_query($con, $insert_bubble_tea_query))
    {
        echo 'Not inserted';
    }
    else
    {
        echo 'Inserted';
        header("refresh:3; url = change_bubbleteas.php");
    }
}

?>

