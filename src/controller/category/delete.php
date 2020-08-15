<?php
    include "../conection.php";

    $statement = "CALL destroy_category(?)";
    $pdo->prepare($statement)->execute([$_GET["id"]]);
    header("Location: ../../view/category/index.php");
?>