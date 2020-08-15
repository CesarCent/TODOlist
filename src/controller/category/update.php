<?php
    include "../conection.php";

    $statement = "CALL update_category(?, ?)";
    $pdo->prepare($statement)->execute([ $_GET["id"] ,$_GET["name"]]);
    header("Location: ../../view/category/index.php");
?>