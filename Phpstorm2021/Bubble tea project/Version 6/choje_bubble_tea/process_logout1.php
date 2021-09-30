
<?php
session_start();
session_destroy();
// confirms the log out of the user and redirects them to the login page
echo "User successfully logged out";
header("refresh:2; url = login.php");

?>
