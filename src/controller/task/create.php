<?php
    include "../conection.php";
    //var_dump($_POST);

    $statement = "CALL task(?, ?, ?, ?)";
    $query = $pdo->prepare($statement);
    $query->execute([
        $_POST["category"],
        $_POST["name"],
        $_POST["description"],
        $_POST["date"]
    ]);

    header("Location: ../../../index.php");
?>