<?php
session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// Drinktypes query to populate the dropdown form
$all_drinktypes_query = "SELECT * FROM `drinktypes`";
$all_drinktypes_result = mysqli_query($con, $all_drinktypes_query);

if(isset($_GET['drinktypes'])){
    $drink_type_id = $_GET['drinktypes'];
}else{
    $drink_type_id = "";
}

// Checks whether the user has logged in or not.
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
    echo "You are a VIP!";
    // TODO put everything inside this as user will have soccuessfully logged in.
} else {
    echo "Please log in first to see this page.";
}

if(isset($_GET['drinkid'])){
    $drink_id = $_GET['drinkid'];
}else {
    $drink_id = "";
}

if($drink_id != "") {
    // Product info query to get all product information where the product ID is what the user has selected
    $drink_info_query = "SELECT * FROM drinks WHERE DrinkID = '" . $drink_id . "'";
    echo $drink_info_query;
    $drink_info_result = mysqli_query($con, $drink_info_query);
    $drink_info_record = mysqli_fetch_assoc($drink_info_result);

}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>珍珠岛 Pearl Island</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>

<body>
<header>
    <h1>珍珠岛 Pearl Island</h1>
    <nav>
        <a href="index1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials.php">SPECIALS</a>
        <a href="login.php">LOGIN</a>
    </nav>
</header>

<h2>
    Update Bubble Teas
</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Drink Type</th>
        <th>Regular Price</th>
        <th>Large Price</th>
        <th>Can be hot</th>
        <th>Submit</th>
        <th>Delete</th>
    </tr>
    <?php
        echo "<tr><form action = update.php method = post>";
        echo "<td><input type =text name=Name value='" . $drink_info_record['Name']. "'></td>";
        // TODO change so that it shows the name not the code that is behind the screen
        //echo "<td><input type=text name=DrinkType value='" . $drink_info_record['DrinkType']. "'></td>";
        echo "<td><select id='drinktypes' name='drinktypes'>";

        while ($all_drinktypes_record = mysqli_fetch_assoc($all_drinktypes_result)) {
            //$sel = ''; if(mysqli_fetch_assoc($all_drinktypes_result) == $drink_info_record['DrinkType']){ $sel = 'selected'; }
            //echo "selected". $sel;
            echo "<option value = '" . $all_drinktypes_record['DrinkType'] . "'";
            if($drink_type_id == $all_drinktypes_record['DrinkType']) {
                echo " selected='selected'";
            }
            echo ">";
            echo $all_drinktypes_record['Name'];
            echo "</option>";
        }
        echo "</select></td>";
        echo "<td><input type=text name=RPrice value='" . $drink_info_record['RPrice']. "'></td>";
        echo "<td><input type=text name=LPrice value='" . $drink_info_record['LPrice']. "'></td>";
        echo "<td><input type=text name=CanBeHot value='" . $drink_info_record['CanBeHot']. "'></td>";
        echo "<input type=hidden name=DrinkID value='". $drink_info_record['DrinkID']. "'>";
        echo "<td><input type=submit></td>";
        echo "<td><a href=delete.php?DrinkID=" .$drink_info_record['DrinkID']. ">Delete</a></td>";
        echo "</form></tr>";
        ?>
</table>
</body>

<footer>

</footer>

</html>
