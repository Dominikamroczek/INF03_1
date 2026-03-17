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
                <?php
                    $polaczenie = new mysqli("localhost", "root", "", "gry");
                    $zapytanie1 = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5";
                    $wynik1 = $polaczenie->query($zapytanie1);

                    while($row = $wynik1->fetch_assoc()) {
                        echo "<li>" . $row['nazwa'] . " <span class='punkty'>" . $row['punkty'] . "</span></li>";
                    }
                ?>
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>00000000000</p>
        </aside>
        <section class="content">
            <?php
                $zapytanie2 = "SELECT id, nazwa, zdjecie FROM gry";
                $wynik2 = $polaczenie->query($zapytanie2);
                while($row = $wynik2->fetch_assoc()) {
                    echo " 
                        <div class='elementy'>
                            <img src='pliki1/".$row['zdjecie']."'alt='".$row['nazwa']."' title='".$row['id']."'>
                            <p>".$row['nazwa']."</p>
                        </div>
                    ";
                }
            ?>
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
            <?php
                if(!empty($_POST['nazwa'])) {
                    $nazwa = $_POST['nazwa'];
                    $opis = $_POST['opis'];
                    $cena = $_POST['cena'];
                    $zdjecie = $_POST['zdjecie'];

                    $zapytanie4 = "INSERT INTO gry (nazwa, opis, cena, zdjecie, punkty) VALUES ('$nazwa', '$opis', '$cena', '$zdjecie', 0)";
                    $polaczenie->query($zapytanie4);
                }
            ?>
        </aside>
    </section>
    <footer>
        <form action="gry.php" method="POST">
            <input type="text" name="id">
            <button type="submit">Pokaż opis</button>
        </form>
        <?php
            if(!empty($_POST['id'])) {
                $id = $_POST['id'];
                $zapytanie3 = "SELECT nazwa, opis, cena, punkty FROM gry WHERE id = $id";
                $wynik3 = $polaczenie->query($zapytanie3);
                if($row = $wynik3->fetch_assoc()) {
                    echo "<h2>".$row['nazwa'].", ".$row['punkty']."punktów, ".$row['cena']." zł</h2><p>".$row['opis']."</p>";
                }
            }

            $polaczenie->close();
            ?>
    </footer>
</body>
</html>