<?php
    require("session.php");
    require("database.php");

    $liczbaGlosow = $_REQUEST["liczbaGlosow"]+1;
    $idGlosowania = $_REQUEST["id"];

    echo "liczba glosow:", $liczbaGlosow;

    $sql = "UPDATE glosowanie SET liczbaGlosow2=$liczbaGlosow WHERE id=$idGlosowania";
    
    
    if ($conn->query($sql) !== TRUE) 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
    else 
    {
        echo $liczbaGlosow;
    }
    $conn->close();

?>