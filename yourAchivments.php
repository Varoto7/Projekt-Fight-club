<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Wasze osiągnięcia</title>
</head>
<body>
    <?php
        require("session.php");
        require("database.php");
    ?>
    <header>
        <p>Zalogowany jako: <?= $_SESSION["login"] ?></p>
        <nav><a href="logout.php">Wyloguj</a></nav>
        <h1>Fightclub</h1>
        <nav>
            <a href="index.php">Strona głowna</a>
            <a href="community.php">Forum społecznościowe</a>
            <a href="bets.php">Głosowanie</a>
            <a href="yourAchivments.php">Wasze osiągnięcia</a>
            <a href="fights.php">Amatorskie walki</a>
        </nav>
    </header>
    <main>
        <div class="form">
        <form method="get" action="yourAchivments.php">
    <p>
        <label for="search">Wyszukaj po tytule:</label><br>
        <input type="text" name="fraza" id="search" class="input">
        <input type="submit" value="Szukaj" class="button">
    </p>
</form>

            <h2>Dodaj nowe osiągnięcie</h2>
            <form action="dodajOsiagniecie.php" method="post" enctype="multipart/form-data">
                <label for="title">Tytuł:</label><br>
                <input type="text" id="title" name="title" class="input" required><br>

                <label for="image">Zdjęcie:</label><br>
                <input type="file" id="image" name="image" class="file" required><br>

                <input type="submit" value="Dodaj osiągnięcie" class="button">

                
            </form>
        </div>
        <h2>Wasze osiągnięcia</h2>
        <?php
            require("wyswietlOsiagniecia.php");
        ?>
    </main>
    <footer>
        <p><b>Informacje o właścicielu strony:</b></p>
        <p><b>Imię i nazwisko:</b> Szymon Karczmarczyk</p>
        <p><b>Telefon:</b> 1231231231</p>
        <p><b>Email:</b>sk89249@stud.uws.edu.pl</p>
    </footer>
</body>
</html>
