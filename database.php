<?php

// Function to establish a database connection
function connectDB() {
    $host = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "project_database"; 

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Function to insert a new project into the database
function insertProject($title, $description, $image) {
    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO project_details (Title, Description, Image) VALUES (:title, :description, :image)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Function to retrieve all projects from the database
function getProjects() {
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM project_details");

    try {
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

// Function to update project information
function updateProject($id, $title, $description, $image) {
    $conn = connectDB();
    $stmt = $conn->prepare("UPDATE project_details SET Title = :title, Description = :description, Image = :image WHERE ID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Function to delete a project
function deleteProject($id) {
    $conn = connectDB();
    $stmt = $conn->prepare("DELETE FROM project_details WHERE ID = :id");
    $stmt->bindParam(':id', $id);

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}





?>