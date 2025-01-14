<?php
session_start();
$korisnik_id = $_SESSION['korisnik_id'];

$pdo = new PDO('mysql:host=localhost;dbname=biblioteka', 'root', '');
$stmt = $pdo->prepare('SELECT k.naslov, r.datum_iznajmljivanja, r.rok_vracanja 
                       FROM rezervacije r 
                       JOIN knjige k ON r.knjiga_id = k.id 
                       WHERE r.korisnik_id = :korisnik_id');
$stmt->execute(['korisnik_id' => $korisnik_id]);
$knjige = $stmt->fetchAll();

foreach ($knjige as $knjiga) {
    echo "<p>{$knjiga['naslov']} - Iznajmljeno: {$knjiga['datum_iznajmljivanja']}, Rok: {$knjiga['rok_vracanja']}</p>";
}
?>
