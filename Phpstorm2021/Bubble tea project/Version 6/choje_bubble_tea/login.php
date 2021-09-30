
<?php

$con = mysqli_connect("localhost", "choje", "grayhen60", "choje_bubble_tea");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";

}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>
        Pearl Island Login
    </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='index.css'>
</head>
<body>
<header>
    <nav>
        <h1><a href="index1.php"><img src="images/logo.jpg" alt="bubbletea_logo" width=4%/>珍珠岛</a></h1>
        <h3>Pearl Island</h3>
        <a href="index1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials.php">SPECIALS</a>
    </nav>
</header>
<main>
    <!-- the form allowing a user to log in -->
    <h2>Login Here</h2>
    <div class="login">
    <form name='login_form' method = 'post' action ='process_login.php'>
        <label for='username'>Username:</label>
        <input type='text' name='username'><br>

        <label for='password'>Password:</label>
        <input type='password' name='password'><br>

        <input type='submit' name='login' id = 'login' value='Log In'>
    </form>
    </div>
</main>

</body>
</html>

