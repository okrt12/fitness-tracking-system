<?php
session_start();
session_unset(); // remove all session variables
session_destroy(); // destroy the session

// Redirect to login
header("Location: ../../pages/login.html");
exit();
?>