<?php
function validateForm($title, $description) {
    $errors = array();

    if (empty($title)) {
        $errors[] = "Title is required.";
    }

    if (empty($description)) {
        $errors[] = "Description is required.";
    }

    return $errors;
}

function connectDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_management_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function insertProject($title, $description, $image) {
    $conn = connectDatabase();

    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $image = $conn->real_escape_string($image);

    $sql = "INSERT INTO projects (Title, Description, Image) VALUES ('$title', '$description', '$image')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function getProjects() {
    $conn = connectDatabase();

    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);
    $projects = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    $conn->close();
    return $projects;
}

function updateProject($id, $title, $description) {
    $conn = connectDatabase();

    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);

    $sql = "UPDATE projects SET Title='$title', Description='$description' WHERE ID=$id";

    if ($conn->query($sql) !== TRUE) {
        echo "Error updating project information: " . $conn->error;
    }

    $conn->close();
}

function deleteProject($id) {
    $conn = connectDatabase();

    $sql = "DELETE FROM projects WHERE ID=$id";

    if ($conn->query($sql) !== TRUE) {
        echo "Error deleting project: " . $conn->error;
    }

    $conn->close();
}
?>
