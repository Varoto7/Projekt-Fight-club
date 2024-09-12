<?php
require("session.php");
require("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tresc = $_POST['tresc'];

    $sql = "UPDATE fight_comments SET tresc = '$tresc' WHERE id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: fights.php");
    } else {
        echo "Błąd podczas aktualizacji komentarza: " . $conn->error;
    }
}
$conn->close();
?>
