<?php
require("session.php");
require("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $video_url = $_POST['video_url'];
    $nick = $_SESSION['login'];

    $target_dir = "uploads/";
    
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO osiagniecia (nick, title, image, video_url) VALUES ('$nick', '$title', '$target_file', '$video_url')";

        if ($conn->query($sql) === TRUE) {
            header("Location: yourAchivments.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
       echo "Błąd wysyłania pliku";
    }
}
$conn->close();
?>
