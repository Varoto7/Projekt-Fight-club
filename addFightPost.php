<?php
require("session.php");
require("database.php");

$nick = $_POST["nick"];
$naglowek = $_POST["naglowek"];
$tresc = $_POST["tresc"];

$sql = "INSERT INTO fight_posts (nick, naglowek, tresc) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nick, $naglowek, $tresc);

if ($stmt->execute()) {
    header("Location: fights.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
