<?php
    include "../conection.php";

    $categories = $pdo->query( "SELECT * FROM category" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<body>
    <h1>Task</h1>
    <br>
    <form action="create.php" method="post">
        <label for="category">Categoria:</label>
        <select name="category" id="category">
            <?php
                foreach ($categories as $category) {
                    echo "<option value=\"".$category["id"]."\">".$category["name"]."</option>";
                }
            ?>
        </select>
        <br>

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name"><br>


        <label for="description">Descripcion:</label><br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea><br>

        <label for="date">Fecha:</label><br>
        <input type="date" name="date" required><br><br>

        <button type="submit">Crear Tarea</button><br>
    </form>
</body>
</html>