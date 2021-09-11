<?php

session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}


if(isset($_GET['drinkid'])){
    $drink_id = $_GET['drinkid'];
    $screen_mode = "Edit";
    // Product info query to get all product information where the product ID is what the user has selected
    $drink_info_query = "SELECT * FROM drinks WHERE DrinkID = '" . $drink_id . "'";
    echo $drink_info_query;
    $drink_info_result = mysqli_query($con, $drink_info_query);
    $drink_info_record = mysqli_fetch_assoc($drink_info_result);
}else {
    $drink_id = "";
    $screen_mode = "Add";
    $drink_info_record = NULL;
}

$all_drinktypes_query = "SELECT * FROM `drinktypes`";
$all_drinktypes_result = mysqli_query($con, $all_drinktypes_query);


// Checks whether the user has logged in or not.
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
    echo "You are a VIP!";
    // TODO redirect user to error page
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
        <a href="index1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials.php">SPECIALS</a>
        <a href="login.php">LOGIN</a>
    </nav>
</header>
<main>
    <h2>Hello! Privileged and honourary member of the Pearl Island family, welcome</h2>

    <h2>
        <?php
        echo $screen_mode;
        ?>
         Bubble Tea</h2>

    <form action="insert_bubbleateas1.php" name='change_bubbletea' method="post">
        <input type="hidden" id="DrinkID" name="DrinkID"
        <?php
        if($drink_info_record != NULL){
            echo " value=\"" . $drink_info_record['DrinkID'] . "\"";
        }
        ?>
        ><br>
        Drink Name: <input type="text" id="Name" name="Name"
        <?php
        if($drink_info_record != NULL){
            echo "value=\"" . $drink_info_record['Name'] . "\"";
        }
        ?>
        maxlength="100" required="required"><br>
        Drink Type:
        <select id="select_drinktype" name="select_drinktype">
            <?php
            while ($all_drinktypes_record = mysqli_fetch_assoc($all_drinktypes_result)){
                echo "<option value = '" . $all_drinktypes_record['DrinkType'] . "'";
                if($drink_info_record != "" AND $drink_info_record['DrinkType'] == $all_drinktypes_record['DrinkType']) {
                    echo " selected='selected'";
                }
                echo ">";
                echo $all_drinktypes_record['Name'];
                echo "</option>";
            }
            ?>
        </select><br>
        Regular Price: <input type="number" id="RPrice"
        <?php
        if($drink_info_record != NULL){
            echo "value=\"" . $drink_info_record['RPrice'] . "\"";
        }
        ?>
        onchange="RPricechanged();" min="1" max="1000" step="any" name="RPrice" required="required"><br>
        Large Price: <input type="number" id="LPrice"
        <?php
        if($drink_info_record != NULL){
            echo "value=\"" . $drink_info_record['LPrice'] . "\"";
        }
        ?>
        onchange="LPricechanged();" max="1000" name="LPrice" required="required"><br>
        Can this drink be warm?
        <input type="radio" onchange="Canbehotchanged();" name="CanBeHot" value="Y"
            <?php
            if($drink_info_record != NULL AND $drink_info_record['CanBeHot'] == "Y"){
                echo "checked";
            }
            ?>
        >Yes
        <input type="radio" onchange="Canbehotchanged();" name="CanBeHot" value="N"
            <?php
            if($drink_info_record != NULL AND $drink_info_record['CanBeHot'] == "N"){
                echo "checked";
            }
            ?>
        >No
        <span class="error_msg" id="CanBeHotErrorMsg" name="CanBeHotErrorMsg" style="visibility: hidden"><br>Please select whether the bubble tea can be hot</span>
        <span class="error_msg" id="RPriceErrorMsg" name="RPriceErrorMsg" style="visibility: hidden"><br>The regular price must be between $1 and $1000. </span>
        <span class="error_msg" id="LPriceErrorMsg" name="LPriceErrorMsg" style="visibility: hidden"><br>The large price must be larger than the regular price but below $1000. </span>
        <p style="color:red" style="visibility: hidden">This is a paragraph.</p>
        <br>
        <input type="submit" onclick="return validate();" value="Add/Edit">
    </form>

</main>
<script type="text/javascript">
function validate() {
    var CanBeHotChecked = document.querySelector('input[name="CanBeHot"]:checked');
    if (CanBeHotChecked === null){
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
    var CanBeHotErrorMessage = document.getElementById("CanBeHotErrorMsg");
    if (CanBeHotErrorMessage !== null) {
        CanBeHotErrorMessage.style.visibility = "hidden";
    }
}

function RPricechanged() {
    var RPriceField = document.getElementById("RPrice");
    var LPriceField = document.getElementById("LPrice");
    if (RPriceField !== null && LPriceField !== null) {
        var RPriceValue = parseFloat(RPriceField.value);
        console.log(RPriceValue);
        if (RPriceValue !== "") {
            console.log('RPrice is something');
            var RPriceErrorMessage = document.getElementById("RPriceErrorMsg");
            if (RPriceValue < parseFloat(RPriceField.min) || RPriceValue > parseFloat(RPriceField.max)) {
                if (RPriceErrorMessage !== null) {
                    console.log('the RPrice error message' + RPriceErrorMessage);
                    RPriceErrorMessage.style.visibility = "visible";
                }
            }
            else {
                console.log('rprice should be hidden');
                RPriceErrorMessage.style.visibility = "hidden";
            }
        }
        LPriceField.min = RPriceValue;
        LPricechanged();
    }
}

function LPricechanged() {
    var RPriceField = document.getElementById("RPrice");
    var LPriceField = document.getElementById("LPrice");
    if (RPriceField !== null && LPriceField !== null) {
        var RPriceValue = parseFloat(RPriceField.value);
        var LPriveValue = parseFloat(LPriceField.value);
        if (LPriceField !== null) {
            console.log('LPrice is something');
            var LPriceErrorMessage = document.getElementById("LPriceErrorMsg");
            if (LPriveValue < parseFloat(RPriceValue) || LPriveValue > parseFloat(LPriceField.max)) {
                if (LPriceErrorMessage !== null) {
                    LPriceErrorMessage.style.visibility = "visible";
                }
            }
            else {
                LPriceErrorMessage.style.visibility = "hidden";
            }
        }
    }
}

</script>
</body>
<footer>

</footer>

</html>
