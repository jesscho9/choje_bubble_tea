
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

// TODO NOT SURE IF NEEDED OR NOT - Checks whether the user has logged in or not.
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
    $drink_info_query = "SELECT * FROM products WHERE ProductID = '" . $drink_id . "'";
    echo $drink_info_query;
    $drink_info_result = mysqli_query($con, $drink_info_query);
    $drink_info_record = mysqli_fetch_assoc($drink_info_result);

}

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        Pearl Island Product Information
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>
<body>
<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="menu1.php">Menu</a>
        <a href="specials.php">Specials</a>
    </nav>
</header>
<main>
    <h2>Product Information</h2>

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
        while($row = mysqli_fetch_array($update_bubbleteas_record))
        {
            echo "<tr><form action = update.php method = post>";
            echo "<td><input type =text name=Name value='" . $row['Name']. "'></td>";
            echo "<td><input type=text name=DrinkType value='" . $row['DrinkType']. "'></td>";
            echo "<td><input type=text name=RPrice value='" . $row['RPrice']. "'></td>";
            echo "<td><input type=text name=LPrice value='" . $row['LPrice']. "'></td>";
            echo "<td><input type=text name=CanBeHot value='" . $row['CanBeHot']. "'></td>";
            echo "<input type=hidden name=DrinkID value='". $row['DrinkID']. "'>";
            echo "<td><input type=submit></td>";
            echo "<td><a href=delete.php?DrinkID=" .$row['DrinkID']. ">Delete</a></td>";
            echo "</form></tr>";
        }
        ?>
    </table>

</main>
</body>
<footer>

</footer>

