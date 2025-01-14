<?php
session_start();
$korisnik_id = $_SESSION['korisnik_id']; // Pretpostavlja se da je korisnik prijavljen
$knjiga_id = $_POST['knjiga_id'];

$pdo = new PDO('mysql:host=localhost;dbname=biblioteka', 'root', '');

// Provera dostupnosti i da li korisnik već ima rezervaciju
$stmt = $pdo->prepare('SELECT dostupni_primerci FROM knjige WHERE id = :knjiga_id');
$stmt->execute(['knjiga_id' => $knjiga_id]);
$knjiga = $stmt->fetch();

if ($knjiga['dostupni_primerci'] > 0) {
    $stmt = $pdo->prepare('INSERT INTO rezervacije (korisnik_id, knjiga_id, datum_iznajmljivanja, rok_vracanja) 
                           VALUES (:korisnik_id, :knjiga_id, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 30 DAY))');
    $stmt->execute(['korisnik_id' => $korisnik_id, 'knjiga_id' => $knjiga_id]);

    $stmt = $pdo->prepare('UPDATE knjige SET dostupni_primerci = dostupni_primerci - 1 WHERE id = :knjiga_id');
    $stmt->execute(['knjiga_id' => $knjiga_id]);

    echo "Rezervacija uspešna!";
} else {
    echo "Nema dostupnih primeraka.";
}
?>
