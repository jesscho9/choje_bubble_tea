
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

if(isset($_GET['bubbletea_name'])){
    $product_name =$_GET['bubbletea_name'];
}else{
    $product_name = "";
}

// leave cost for now

if(isset($_GET['hot_bubbleteas'])){
    $hot_bubbleteas = True;
}else{
    $hot_bubbleteas = False;
}

if(isset($_GET['order_bubbleteas'])){
    $order_bubbleteas =$_GET['order_bubbleteas'];
}else{
    $order_bubbleteas = "product_name_asc";
}

if(isset($_GET['search_button'])){
    $search_done = True;
}else{
    $search_done = False;
}


?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        珍珠岛 Pearl Island Menu
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>
<body>
<header>
    <img alt="Bubble Tea logo" src="logo.jpg" width=4%>
    <h1>珍珠岛 Pearl Island!!!!!</h1>
    <nav>
        <a href="index1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials.php">SPECIALS</a>
        <a href="login.php">LOGIN</a>
        <?php
        // Checks whether the user has successfully logged in or not and if they have then displays extra navigation links below
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == True) {
            ?>
            <a href="add_bubbleteas1.php">Add Bubble Teas</a>
            <a href="update_bubbleteas.php">Update Bubble Teas</a>
            <a href="process_logout.php">LOGOUT</a>
            <?php
        } else {
            // TODO do i need to have an else??????? bad practice? smth to check
            echo "<br>not logged in";
        }
        ?>

    </nav>
</header>
<main>
    <?php
    if($search_done == True) {
    ?>
    <!--<h1>珍珠岛 Pearl Island Menu</h1>-->
    <p>Enter search criteria</p>

    <div class="search_bubbleteas">
        <form name='search_bubble_tea_form' id='search_bubble_tea_form' method = 'get' action='menu1.php'>
            <table>
                <tr>
                    <td>Drink series: </td>
                    <td>
                        <select id='drinktypes' name='drinktypes'>
                            <option value="">All Drink Series</option>
                            <!--shows the other options - php below-->
                            <?php
                            while ($all_drinktypes_record = mysqli_fetch_assoc($all_drinktypes_result)){
                                echo "<option value = '" . $all_drinktypes_record['DrinkType'] . "'";
                                if($drink_type_id == $all_drinktypes_record['DrinkType']) {
                                    echo " selected='selected'";
                                }
                                echo ">";
                                echo $all_drinktypes_record['Name'];
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name='bubbletea_name'
                        <?php
                            if($product_name != "") {
                                echo "value='". $product_name ."'";
                            }
                        ?>
                        >
                    </td>
                </tr>
                <tr>
                    <td> cost range? </td>
                </tr>
                <tr>
                    <td>Only include hot bubble teas</td>
                    <td>
                        <input type="checkbox" name='hot_bubbleteas' value="false" unchecked
                        <?php
                        if($hot_bubbleteas == True) {
                            echo " checked";
                        }
                        ?>
                        >
                    </td>
                </tr>
                <tr>
                    <td>Order Bubble Teas By: </td>
                    <td>
                        <select id="order_bubbleteas" name="order_bubbleteas">
                            <option value="product_name_asc"
                                <?php
                                if($order_bubbleteas == "product_name_asc") {
                                    echo " selected='selected'";
                                }
                                ?>
                            >Name Ascending</option>
                            <option value="product_name_desc"
                                <?php
                                if($order_bubbleteas == "product_name_desc") {
                                    echo " selected='selected'";
                                }
                                ?>
                            >Name Descending</option>
                            <!--<option value="cost_asc"
                                <?php
                                if($order_bubbleteas == "cost_asc") {
                                    echo " selected='selected'";
                                }
                                ?>
                            >Cost Ascending</option>
                            <option value="cost_desc"
                                <?php
                                if($order_bubbleteas == "cost_desc") {
                                    echo " selected='selected'";
                                }
                                ?>
                            >Cost Descending</option>-->
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' name='search_button' value='Search'>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    }else {
        ?>
        <h2>珍珠岛 Pearl Island Menu</h2>
        <h4>Feel free to browse through the menu of bubble teas or search and filter bubble teas of your choice. </h4>
        <?php
    }

    $arguments_added = false;

    // All products query to get all products from the database, and will display certain values to the user
    $all_drinks_query = "SELECT * FROM drinks";
    echo "this is the drink type id ".$drink_type_id;
    if ($drink_type_id != "") {
        $all_drinks_query = $all_drinks_query . " WHERE DrinkType = '" . $drink_type_id . "'";
        $arguments_added = true;
    }
    if ($product_name != "") {
        if ($arguments_added == true) {
            $all_drinks_query = $all_drinks_query . " AND ";
        } else {
            $all_drinks_query = $all_drinks_query . " WHERE ";
        }

        $all_drinks_query = $all_drinks_query . "Name LIKE '%$product_name%'";
        $arguments_added = true;
    }
    /*
    if ($max_cost != "") {
        if ($arguments_added == true) {
            $all_drinks_query = $all_drinks_query . " AND ";
        } else {
            $all_drinks_query = $all_drinks_query . " WHERE ";
        }

        $all_drinks_query = $all_drinks_query . "Cost <= " . $max_cost;
        $arguments_added = true;
    }
    */
    if ($hot_bubbleteas == True) {
        if ($arguments_added == true) {
            $all_drinks_query = $all_drinks_query . " AND ";
        } else {
            $all_drinks_query = $all_drinks_query . " WHERE ";
        }

        $all_drinks_query = $all_drinks_query . "CanBeHot = 'Y'";
        $arguments_added = true;
    }
    $all_drinks_query = $all_drinks_query . " ORDER BY ";
    if ($order_bubbleteas == "product_name_asc" or $order_bubbleteas == "product_name_desc") {
        $all_drinks_query = $all_drinks_query . "Name ";
    } /*else {
        $all_drinks_query = $all_drinks_query . "Cost ";
    }*/
    if ($order_bubbleteas == "product_name_asc" or $order_bubbleteas == "cost_asc") {
        $all_drinks_query = $all_drinks_query . "ASC";
    } /*else {
        $all_drinks_query = $all_drinks_query . "DESC";
    }*/

    $all_drinks_result = mysqli_query($con, $all_drinks_query);
    echo "<br>this is the drinks query ".$all_drinks_query;
        $count = mysqli_num_rows($all_drinks_result);
        echo "<br>the count ".$count;
        if($count == 0) {
            echo "<br>There were no search results.";
        }else {
        ?>
        <table>
            <tr>
                <td>
                    <h3>Name</h3>
                </td>
                <td>
                    <h3>Regular Price</h3>
                </td>
                <td>
                    <h3>Large Price</h3>
                </td>
                <td>
                    <h3>Can Be Hot</h3>
                </td>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($all_drinks_result)) {
                echo "<tr>";
                echo "<td>". $row['Name'] ."</td>";
                echo "<td>". $row['RPrice'] ."</td>";
                echo "<td>". $row['LPrice'] ."</td>";
                echo "<td>". $row['CanBeHot'] ."</td>";
                echo "<td><a href='update_bubbleteas.php?drinkid=". $row['DrinkID'] ."&drinktypes='>Edit/Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <?php
    }
    ?>
</main>
</body>
<footer>

</footer>
</html>
