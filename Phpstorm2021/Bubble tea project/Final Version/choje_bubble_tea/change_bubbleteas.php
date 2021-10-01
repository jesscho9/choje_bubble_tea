<?php

session_start();

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "<span style='visibility: hidden'>connected to database</span>";

}


if(isset($_GET['drinkid'])){
    $drink_id = $_GET['drinkid'];
    // This variable sets the screen mode and tells the user whether they are in the edit or add function
    $screen_mode = "Edit";
    // Drink info query to get all drink information where the Drink ID is equal to what the user has selected
    $drink_info_query = "SELECT * FROM drinks WHERE DrinkID = '" . $drink_id . "'";
    $drink_info_result = mysqli_query($con, $drink_info_query);
    $drink_info_record = mysqli_fetch_assoc($drink_info_result);
}else {
    $drink_id = "";
    $screen_mode = "Add";
    $drink_info_record = NULL;
}

$all_drinktypes_query = "SELECT * FROM `drinktypes`";
$all_drinktypes_result = mysqli_query($con, $all_drinktypes_query);


// Checks whether the user has logged in or not
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
    echo "<br><span>You're a VIP!</span>";
} else {
    header("Location: error_page.php");
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
    <h1><a href="index1.php"><img src="images/logo.jpg" alt="bubbletea_logo" width=4%/>珍珠岛</a></h1>
    <h3>Pearl Island</h3>
    <nav>
        <a href="index1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials.php">SPECIALS</a>
        <?php
        // Changes navigation links based on whether the user has logged in or not
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
            ?>
            <a href="change_bubbleteas.php">ADD BUBBLE TEA</a>
            <a href="process_logout1.php">LOGOUT</a>
            <?php
        } else {
            echo "<a href=\"login.php\">LOGIN</a>";
        }
        ?>
    </nav>
</header>
<main>
    <h2>Welcome, privileged and honourary member of the Pearl Island family</h2>
    <h2>
        <?php
        echo $screen_mode;
        ?>
         Bubble Tea</h2>

    <form action="insert_bubbleateas1.php" name='change_bubbletea' method="post">
        <input type="hidden" id="DrinkID" name="DrinkID"
        <?php
        // If statement is for edit function, and gets values from what the user has selected to set as default values
        if($drink_info_record != NULL){
            echo " value=\"" . $drink_info_record['DrinkID'] . "\"";
        }
        ?>
        ><br>
        <!-- maxlength sets max length of characters within the text input, required=required means user can't leave it
        empty-->
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
        <!-- onchange is called when user changes the regular price, this calls a javascript function below,
        step="any" allows user to enter in decimals -->
        Regular Price: <input type="number" id="RPrice"
        <?php
        if($drink_info_record != NULL){
            echo "value=\"" . $drink_info_record['RPrice'] . "\"";
        }
        ?>
        onchange="RPricechanged();" min="1" max="99" step="any" name="RPrice" required="required"><br>
        Large Price: <input type="number" id="LPrice"
        <?php
        if($drink_info_record != NULL){
            echo "value=\"" . $drink_info_record['LPrice'] . "\"";
        }
        ?>
        onchange="LPricechanged();" max="100" name="LPrice" required="required"><br>
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
        <!-- possible error messages below that will appear if the user has entered invalid input -->
        <span class="error_msg" id="CanBeHotErrorMsg" name="CanBeHotErrorMsg" style="visibility: hidden"><br>Please select whether the bubble tea can be hot or not</span>
        <span class="error_msg" id="RPriceErrorMsg" name="RPriceErrorMsg" style="visibility: hidden"><br>The regular price must be between $1 and $99. </span>
        <span class="error_msg" id="LPriceErrorMsg" name="LPriceErrorMsg" style="visibility: hidden"><br>The large price must be larger than the regular price but below $100. </span>
        <br>
        <input type="submit" onclick="return validate();" value="
        <?php
        // sets the button value as either edit or add depending on what the user clicked to come onto this page
        echo $screen_mode;
        ?>
        ">
    </form>

</main>
<!-- javascript functions below used to validate the users' input -->
<script type="text/javascript">
function validate() {
    // Setting a variable and getting it from the form above
    var CanBeHotChecked = document.querySelector('input[name="CanBeHot"]:checked');
    // 3 equal signs used to check if something is equal to something in javascript, null means not selected
    if (CanBeHotChecked === null){
        var CanBeHotErrorMessage = document.getElementById("CanBeHotErrorMsg");
        if (CanBeHotErrorMessage !== null) {
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
        if (RPriceValue !== "") {
            var RPriceErrorMessage = document.getElementById("RPriceErrorMsg");
            // Checks the regular price and will set the error message to visible if regular price is below or above the minimum and maximum set values
            if (RPriceValue < parseFloat(RPriceField.min) || RPriceValue > parseFloat(RPriceField.max)) {
                if (RPriceErrorMessage !== null) {
                    RPriceErrorMessage.style.visibility = "visible";
                }
            }
            else {
                RPriceErrorMessage.style.visibility = "hidden";
            }
        }
        // Sets the minimum value of the large price to be equal to the regular price the user has entered after being successfully validated
        LPriceField.min = RPriceValue;
        // Calls the large price function again to validate large price, ensures that user doesnt change the regular price after setting the large price
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
            // Checks the large price and will set the error message to visible if large price is below or above the minimum and maximum set values
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
</html>
