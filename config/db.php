<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=biblioteka', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška pri konekciji: " . $e->getMessage());
}
?>
