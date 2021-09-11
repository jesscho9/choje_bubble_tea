
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
    <link rel='stylesheet' type='text/css' href='index_v3.1.css'>
</head>
<body>
<header>
    <nav>
        <a href="index_v3.1.php">Home</a>
        <a href="menu.php">Menu</a>
        <a href="specials.php">Specials</a>
    </nav>
</header>
<main>
    <h2>Login Here</h2>
    <!-- TODO login -->
    <form name='login_form' method = 'post' action ='process_login_v3.1.php'>
        <label for='username'>Username:</label>
        <input type='text' name='username'><br>

        <label for='password'>Password:</label>
        <input type='password' name='password'><br>

        <input type='submit' name='submit' id = 'submit' value='Log In'>
    </form>
</main>
</body>
<footer>

</footer>

