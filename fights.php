<?php
session_start();
require("session.php");
require("database.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Amatorskie walki</title>
</head>
<body>
    <header>
        <p>Zalogowany jako: <?= $_SESSION["login"] ?></p>
        <nav><a href="logout.php">Wyloguj</a></nav>
        <h1>Fightclub</h1>
        <nav>
            <a href="index.php">Strona główna</a>
            <a href="community.php">Forum społecznościowe</a>
            <a href="bets.php">Głosowanie</a>
            <a href="yourAchivments.php">Wasze osiągnięcia</a>
            <a href="fights.php">Amatorskie walki</a>
        </nav>
    </header>

    <main>
        <div class="form">
            <h2>Dodaj nowy post</h2>
            <form action="addFightPost.php" method="post">
                <input type="hidden" name="nick" value="<?php echo $_SESSION['login']; ?>">
                <p>Nagłówek</p>
                <input type="text" name="naglowek" class="input" required>
                <p>Treść wpisu</p>
                <textarea name="tresc" cols="20" rows="10" class="input" required></textarea>
                <input type="submit" value="Dodaj wpis" class="button">
            </form>
        </div>

        <div class="posts">
            <h2>Posty</h2>
            <?php
            $sql = "SELECT * FROM fight_posts ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    echo "<div class='post dark-background'>";
                    echo "<h3>" . $row->naglowek . "</h3>";
                    echo "<p>" . $row->tresc . "</p>";
                    echo "<p>Dodane przez: " . $row->nick . " dnia " . $row->created_at . "</p>";

                    echo "<form action='addFightComment.php' method='post'>";
                    echo "<input type='hidden' name='post_id' value='" . $row->id . "'>";
                    echo "<input type='hidden' name='nick' value='" . $_SESSION['login'] . "'>";
                    echo "<textarea name='tresc' cols='20' rows='3' class='input' required></textarea>";
                    echo "<input type='submit' value='Dodaj komentarz' class='button'>";
                    echo "</form>";

                    $post_id = $row->id;
                    $comment_sql = "SELECT * FROM fight_comments WHERE post_id = '$post_id' ORDER BY created_at ASC";
                    $comment_result = $conn->query($comment_sql);

                    if ($comment_result->num_rows > 0) {
                        echo "<div class='comments'>";
                        echo "<h4>Komentarze:</h4>";
                        while ($comment_row = $comment_result->fetch_object()) {
                            echo "<div class='comment dark-background'>";
                            echo "<p>" . $comment_row->tresc . "</p>";
                            echo "<p>Dodane przez: " . $comment_row->nick . " dnia " . $comment_row->created_at . "</p>";
                            if ($comment_row->nick == $_SESSION['login']) {
                                echo "<a href='editFightComment.php?id=" . $comment_row->id . "' class='button'>Edytuj</a>";
                            }
                            echo "</div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>Brak komentarzy do wyświetlenia.</p>";
                    }
                    echo "</div>";
                    echo "<hr>";
                }
            } else {
                echo "<p>Brak postów do wyświetlenia.</p>";
            }
            $conn->close();
            ?>
        </div>
    </main>

    <footer>
        <p><b>Informacje o właścicielu strony:</b></p>
        <p><b>Imię i nazwisko:</b> Szymon Karczmarczyk</p>
        <p><b>Telefon:</b> 1231231231</p>
        <p><b>Email:</b>sk89249@stud.uws.edu.pl</p>
    </footer>
</body>
</html>
