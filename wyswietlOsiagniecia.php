<?php
require("database.php");

$sql = "SELECT * FROM osiagniecia";
if (isset($_GET['fraza']) && !empty($_GET['fraza'])) {
    $fraza = $_GET['fraza'];
    $sql .= " WHERE title LIKE '%$fraza%'";
}
$sql .= " ORDER BY created_at DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        echo "<div class='achievement dark-background'>";
        echo "<h3>" . $row->title . "</h3>";
        echo "<p>Użytkownik: " . $row->nick . "</p>";
        if (!empty($row->image)) {
            echo "<img src='" . $row->image . "' alt='" . $row->title . "' style='max-width: 100%; width: 300px; height: auto;'>";
        }

        echo "<p>Dodano: " . $row->created_at . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Brak osiągnięć</p>";
}
$conn->close();
?>
