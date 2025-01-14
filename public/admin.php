<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naslov = $_POST['naslov'];
    $autor = $_POST['autor'];
    $godina = $_POST['godina'];
    $primerci = $_POST['primerci'];

    $pdo = new PDO('mysql:host=localhost;dbname=biblioteka', 'root', '');
    $stmt = $pdo->prepare('INSERT INTO knjige (naslov, autor, godina_izdanja, dostupni_primerci) 
                           VALUES (:naslov, :autor, :godina, :primerci)');
    $stmt->execute(['naslov' => $naslov, 'autor' => $autor, 'godina' => $godina, 'primerci' => $primerci]);

    echo "Knjiga uspešno dodata!";
}
?>
<form method="POST">
    <input type="text" name="naslov" placeholder="Naslov" required>
    <input type="text" name="autor" placeholder="Autor" required>
    <input type="number" name="godina" placeholder="Godina izdanja" required>
    <input type="number" name="primerci" placeholder="Broj primeraka" required>
    <button type="submit">Dodaj knjigu</button>
</form>
