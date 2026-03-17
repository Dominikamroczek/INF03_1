<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section class="main">
        <aside>
            <h3>Top 5 gier w tym miesiącu</h3>
            <ul>
                
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>00000000000</p>
        </aside>
        <section class="content">

        </section>
        <aside>
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="POST">
                <label for="nazwa">nazwa</label>
                <input type="text" id="nazwa" name="nazwa">
                 <label for="opis">opis</label>
                <input type="text" id="opis" name="opis">
                 <label for="cena">cena</label>
                <input type="text" id="cena" name="cena">
                 <label for="zdjecie">zdjecie</label>
                <input type="text" id="zdjecie" name="zdjecie">
                <button type="submit">DODAJ</button>
            </form>
        </aside>
    </section>
    <footer>
        <form action="gry.php" method="POST">
            <input type="text">
            <button type="submit">Pokaż opis</button>
        </form>
    </footer>
</body>
</html>