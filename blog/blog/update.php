<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating post: " . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT title, content FROM posts WHERE id=$id";
    $result = $conn->query($sql);
    $post = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Update Post</h1>
            <nav>
                <a href="index.php">Home</a>
            </nav>
        </header>
        <main>
            <form method="post" action="update.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" required><br>
                <label for="content">Content:</label>
                <textarea id="content" name="content" required><?php echo $post['content']; ?></textarea><br>
                <input class="btn" type="submit" value="Update">
            </form>
        </main>
    </div>
</body>
</html>
