<?php
    require("database.php");
    $zdjecie = $_POST["zdjecie"];
    $tytul = $_POST["tytul"];
    $data = $_POST["data"];
    $sql = "INSERT INTO wydarzenia(zdjecie, tytul, data) VALUES ('$zdjecie','$tytul','$data')";
    $conn->query($sql);
    $conn->close();
    header("location: index.php");
?>
