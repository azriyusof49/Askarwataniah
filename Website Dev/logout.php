<?php
session_start(); // start the session
session_unset(); // unset all the session variables
session_destroy(); // destroy the session

// prevent caching of the page
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// prevent the user from going back to the previous page
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// redirect the user to the login page
header("Location: index.php");
exit(); // make sure to exit the script
?>
