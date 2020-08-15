<?php
    include "../conection.php";

    $statement = "CALL update_task(?, ?, ?, ?, ?)";
    $query = $pdo->prepare($statement);
    $query->execute([
        $_POST["id"],
        $_POST["category"],
        $_POST["name"],
        $_POST["description"],
        $_POST["date"]
    ]);


    header("Location: ../../../index.php");
?>