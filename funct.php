<?php

// Function to establish a database connection and return the connection object
function connectDatabase() {
    // Replace these with your actual database credentials
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'project_database';

    // Create a new PDO connection
    try {
        $connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e) {
		die("Database connection failed: " . $e->getMessage());
    }
}

// Function to register a new user
function registerUser($username, $password) {
    $connection = connectDatabase();

    // Check if the username is already taken
    $query = "SELECT * FROM users WHERE username = :username";
    $statement = $connection->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        return "Username already taken. Please choose a different username.";
    }
// Hash the password for secure storage
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user details into the database
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $statement = $connection->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $hashedPassword);

    if ($statement->execute()) {
        return true; // Registration successful
    } else {
        return "Error registering the user. Please try again.";
    }
}
// Function to authenticate user login
function loginUser($username, $password) {
    $connection = connectDatabase();

    // Retrieve the hashed password for the given username
    $query = "SELECT id, password FROM users WHERE username = :username";
    $statement = $connection->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, create a session for the authenticated user
        session_start();
        $_SESSION['user_id'] = $user['id'];
        return true; // Login successful
    } else {
        return "Invalid username or password.";
    }
}
// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to log out the user
function logoutUser() {
    session_start();
    session_destroy();
}

// Customize additional functions based on your specific requirements below

?>