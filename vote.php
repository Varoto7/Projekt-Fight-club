<?php
    require("session.php");
    require("database.php");

    $liczbaGlosow = $_REQUEST["liczbaGlosow"];
    $idGlosowania = $_REQUEST["id"];
    $przycisk = $_REQUEST["button"];

    echo "liczba glosow:", $liczbaGlosow;
    echo "request id: ", $id;
    echo "przycisk: ", $przycisk;
    
    if($przycisk == "button1")
    {
        $sql = "UPDATE glosowanie SET liczbaGlosow1=$liczbaGlosow WHERE id=$idGlosowania";
    }
    else if($przycisk == "button2")
    {
        $sql = "UPDATE glosowanie SET liczbaGlosow2=$liczbaGlosow WHERE id=$idGlosowania";
    }

    if ($conn->query($sql) !== TRUE) 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>