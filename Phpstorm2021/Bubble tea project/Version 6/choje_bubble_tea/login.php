
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
        <img alt="Bubble Tea logo" src="logo.jpg" width=6%>
        <h1>珍珠岛 Pearl Island</h1>
        <a href="index1.php">HOME</a>
        <a href="menu1.php">MENU</a>
        <a href="specials.php">SPECIALS</a>
        <a href="login.php">LOGIN</a>
    </nav>
</header>
<main>
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
<footer>

</footer>

