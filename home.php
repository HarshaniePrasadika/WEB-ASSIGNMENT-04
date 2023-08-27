<?php
session_start();
require_once 'funct.php';

if (!isLoggedIn()) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
</head>
<body>
  <h1>Welcome, <?php echo $_SESSION['user_id']; ?>!</h1>
  <p>This is the home page for authenticated users.</p>
  <a href="logout.php">Logout</a>
</body>
</html>