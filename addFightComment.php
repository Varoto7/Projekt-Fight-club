<?php
require("session.php");
require("database.php");

$nick = $_POST["nick"];
$tresc = $_POST["tresc"];
$post_id = $_POST["post_id"];

$sql = "INSERT INTO fight_comments (post_id, nick, tresc) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $post_id, $nick, $tresc);

if ($stmt->execute()) {
    header("Location: fights.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>


