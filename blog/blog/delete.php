<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting post: " . $conn->error;
}

$conn->close();
?>
