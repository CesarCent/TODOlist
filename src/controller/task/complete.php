<?php
    include "../conection.php";

    $statement = "CALL complete_task(?)";
    $pdo->prepare($statement)->execute([$_GET["id"]]);

    header("Location: ../../../index.php");
?>