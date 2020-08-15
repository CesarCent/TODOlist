<?php
    include "../conection.php";

  

    $categories = $pdo->query("SELECT * FROM category");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo - Category</title>
</head>
<body>
    <h1>Category</h1>
    <form action="create.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name">
        <button type="submit">Add Category</button>
    </form>
    <h2>Category list</h2>
    <ul>
    <?php
        foreach ($categories as $category) {
            echo "<li>".$category["name"]."</li>";
        }
    ?>
    </ul>

</body>
</html>