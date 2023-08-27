<?php
session_start();
require_once 'funct.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle registration form submission
    if (isset($_POST['register-username']) && isset($_POST['register-password']) && isset($_POST['confirm-password'])) {
        $username = $_POST['register-username'];
        $password = $_POST['register-password'];
        $confirmPassword = $_POST['confirm-password'];

        // Validate passwords match
        if ($password !== $confirmPassword) {
            echo "Passwords do not match.";
        } else {
            // Attempt to register the user
            $registrationResult = registerUser($username, $password);

            if ($registrationResult === true) {
                // Redirect to the login page after successful registration
                header('Location: login.html');
                exit();
            } else {
                echo $registrationResult;
            }
        }
    }

    // Handle login form submission
    if (isset($_POST['login-username']) && isset($_POST['login-password'])) {
        $username = $_POST['login-username'];
        $password = $_POST['login-password'];

        // Attempt to log in the user
        $loginResult = loginUser($username, $password);

        if ($loginResult === true) {
            // Redirect to the home page or any other authenticated page
            header('Location: home.php');
            exit();
        } else {
            echo $loginResult;
        }
    }
}
?>