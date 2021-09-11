<?php
session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$update_bubbleteas = "SELECT * FROM drinks";
$update_bubbleteas_record = mysqli_query($con, $update_bubbleteas);

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
        <a href="index.php">HOME</a>
        <a href="menu.php">MENU</a>
        <a href="specials_v5.1.php">SPECIALS</a>
        <a href="login_v5.1.php">LOGIN</a>
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
    while($row = mysqli_fetch_array($update_bubbleteas_record))
    {
        echo "<tr><form action = update_v5.1.phpupdate_v5.1.php method = post>";
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
</body>

<footer>

</footer>

</html>
