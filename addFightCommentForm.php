<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Dodaj komentarz</title>
</head>
<body>
    <?php
        require("session.php");
        require("database.php");
    ?>
    <main>
        <div class="form">
            <form action="addFightComment.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>">
                <input type="hidden" name="nick" value="<?php echo $_SESSION['login']; ?>">
                <p>Treść komentarza</p>
                <textarea name="tresc" cols="20" rows="5" class="input" required></textarea>
                <input type="submit" value="Dodaj komentarz" class="button">
            </form>
            <p><a href="fights.php" class="button">Powrót do strony</a></p>
        </div>
    </main>
</body>
</html>
