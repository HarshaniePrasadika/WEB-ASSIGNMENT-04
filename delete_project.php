<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["delete_id"];

    $sql = "DELETE FROM projects WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error deleting project: " . $conn->error;
    }
}

$conn->close();
?>
