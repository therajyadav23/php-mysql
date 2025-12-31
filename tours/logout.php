<?php
session_start();

// Destroy session completely
$_SESSION = [];
session_unset();
session_destroy();

// Prevent back button access
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Redirect
header("Location: login.php");
exit;
?>