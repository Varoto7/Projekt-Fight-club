<?php
require("session.php");
require("database.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM fight_comments WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_object();
    } else {
        echo "Nie znaleziono komentarza.";
        exit;
    }
} else {
    echo "Brak ID komentarza.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Edytuj komentarz</title>
</head>
<body>
    <h2>Edytuj komentarz</h2>
    <form action="updateFightComment.php" method="post">
        <input type="hidden" name="id" value="<?= $row->id ?>">
        <p>Treść komentarza:</p>
        <textarea name="tresc" cols="30" rows="10"><?= $row->tresc ?></textarea><br>
        <input type="submit" value="Zapisz zmiany">
    </form>
</body>
</html>
