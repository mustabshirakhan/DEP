<?php
include 'db.php';

$sql = "SELECT id, title, content, created_at FROM posts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>My Blog</h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="create.php">Create New Post</a>
            </nav>
        </header>
        <main>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='post'>";
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "<p><small>Posted on " . $row["created_at"] . "</small></p>";
                    echo "<a class='btn edit' href='update.php?id=" . $row["id"] . "'>Edit</a>";
                    echo "<a class='btn delete' href='delete.php?id=" . $row["id"] . "'>Delete</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No posts available.</p>";
            }
            $conn->close();
            ?>
        </main>
    </div>
</body>
</html>
