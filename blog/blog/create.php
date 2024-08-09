<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Create a New Post</h1>
            <nav>
                <a href="index.php">Home</a>
            </nav>
        </header>
        <main>
            <form method="post" action="create.php">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required><br>
                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea><br>
                <input class="btn" type="submit" value="Submit">
            </form>
        </main>
    </div>
</body>
</html>
