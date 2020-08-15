<?php
    include "../conection.php";

    $statement = "CALL destroy_task(?)";
    $pdo->prepare($statement)->execute([$_GET["id"]]);
    header("Location: ../../../index.php");
?>