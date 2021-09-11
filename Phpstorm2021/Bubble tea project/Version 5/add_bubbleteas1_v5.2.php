<?php

session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

$all_drinktypes_query = "SELECT * FROM `drinktypes`";
$all_drinktypes_result = mysqli_query($con, $all_drinktypes_query);


// Checks whether the user has logged in or not.
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
    echo "You are a VIP!";
    // TODO put everything inside this as user will have soccuessfully logged in.
} else {
    echo "Please log in first to see this page.";
}



?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        珍珠岛 Pearl Island Add Bubble Tea
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>
<body>
<header>
    <nav>
        <a href="index1_v5.1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials_v5.1.php">SPECIALS</a>
        <a href="login_v5.1.php">LOGIN</a>
    </nav>
</header>
<main>
    <h2>Hello! Privileged and honourary member of the Pearl Island family, welcome</h2>
    <h2>Add A Bubble Tea</h2>

    <form action="insert_bubbleateas1.php" name='add_bubbletea' method="post">
        Drink Name: <input type="text" id="Name" name="Name" maxlength="100" required="required"><br>
        Drink Type:
        <!--<input type="text" name="DrinkType">-->
        <select id="select_drinktype" name="select_drinktype">
            <?php
            while ($all_drinktypes_record = mysqli_fetch_assoc($all_drinktypes_result)){
                echo "<option value = '" . $all_drinktypes_record['DrinkType'] . "'>";
                echo $all_drinktypes_record['Name'];
                echo "</option>";
            }
            ?>
        </select><br>
        Regular Price: <input type="number" min="1" max="1000" step="any" name="RPrice" required="required"><br>
        Large Price: <input type="number" name="LPrice" required="required"><br>
        Can this drink be warm?
        <input type="radio" onchange="Canbehotchanged();" name="CanBeHot" value="Y">Yes
        <input type="radio" onchange="Canbehotchanged();" name="CanBeHot" value="N">No
        <span class="error_msg" id="CanBeHotErrorMsg" name="CanBeHotErrorMsg" style="visibility: hidden"><br>Please select whether the bubble tea can be hot</span>
        <br>
        <input type="submit" onclick="return validate();" value="Insert">
    </form>

</main>
<script type="text/javascript">
function validate() {
    var CanBeHotChecked = document.querySelector('input[name="CanBeHot"]:checked');
    if (CanBeHotChecked === null){
        console.log('is null ');
        var CanBeHotErrorMessage = document.getElementById("CanBeHotErrorMsg");
        if (CanBeHotErrorMessage !== null) {
            console.log('error message setting if its not nothing');
            CanBeHotErrorMessage.style.visibility = "visible";
        }
        return false;
    }
    return true;
}

function Canbehotchanged() {
    console.log('can be hot changed function called');
    var CanBeHotErrorMessage = document.getElementById("CanBeHotErrorMsg");
    if (CanBeHotErrorMessage !== null) {
        CanBeHotErrorMessage.style.visibility = "hidden";
    }
}

</script>
</body>
<footer>

</footer>

</html>
