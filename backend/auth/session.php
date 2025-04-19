<?php
// session.php

session_start();

// Redirect unauthenticated users to login
if (!isset($_SESSION['user_id'])) {
  // Optional: You can include a flash message or log it
  header("Location: ../../pages/login.php"); // Adjust path as needed
  exit();
}
?>