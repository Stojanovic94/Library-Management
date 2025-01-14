<?php
$pdo = new PDO('mysql:host=localhost;dbname=biblioteka', 'root', '');
$stmt = $pdo->query('SELECT * FROM knjige');
$knjige = $stmt->fetchAll();

foreach ($knjige as $knjiga) {
    echo "<p>{$knjiga['naslov']} - {$knjiga['autor']} ({$knjiga['godina_izdanja']}) - {$knjiga['dostupni_primerci']} primeraka";
    echo "<form method='POST' action='rezervacija.php'>
        <input type='hidden' name='knjiga_id' value='{$knjiga['id']}'>
        <button type='submit'>Rezerviši</button>
    </form></p>";
}
?>
