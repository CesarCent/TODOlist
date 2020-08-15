<?php
    include "../conection.php";

    $statement = "CALL category(?)";
    $pdo->prepare($statement)->execute([$_GET["name"]]);
    header("Location: ../../view/category/index.php");
?>