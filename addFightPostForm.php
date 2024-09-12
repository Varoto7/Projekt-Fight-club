<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Dodaj wpis</title>
</head>
<body>
    <?php
    require("session.php");
    require("database.php");
    ?>
    <main>
        <div class="form">
            <form action="addFightPost.php" method="post">
                <input type="hidden" name="nick" value="<?php echo $_SESSION['login']; ?>">
                <p>Nagłówek</p>
                <input type="text" name="naglowek" class="input" required>
                <p>Treść wpisu</p>
                <textarea name="tresc" cols="20" rows="10" class="input" required></textarea>
                <input type="submit" value="Dodaj wpis" class="button">
            </form>
            <p><a href="fights.php" class="button">Powrót do strony</a></p>
        </div>
    </main>
</body>
</html>
