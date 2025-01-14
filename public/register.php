<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prikupljanje podataka sa forme
    $ime = trim($_POST['ime']);
    $email = trim($_POST['email']);
    $lozinka = $_POST['lozinka'];
    
    // Validacija unosa
    if (empty($ime) || empty($email) || empty($lozinka)) {
        echo "Sva polja moraju biti popunjena.";
        exit;
    }

    // Provera da li je email validan
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Neispravan format email adrese.";
        exit;
    }

    // Konekcija sa bazom
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=biblioteka', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Provera da li već postoji korisnik sa istim email-om
        $stmt = $pdo->prepare('SELECT * FROM korisnici WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            echo "Korisnik sa tim emailom već postoji.";
            exit;
        }

        // Heširanje lozinke
        $hashedPassword = password_hash($lozinka, PASSWORD_DEFAULT);

        // Ubacivanje korisnika u bazu
        $stmt = $pdo->prepare('INSERT INTO korisnici (ime, email, lozinka) VALUES (:ime, :email, :lozinka)');
        $stmt->execute(['ime' => $ime, 'email' => $email, 'lozinka' => $hashedPassword]);

        // Uspešna registracija
        echo "Uspešna registracija! Sada možete da se prijavite.";
        // Preusmeravanje na login stranicu
        header('Location: login.php');
        exit;

    } catch (PDOException $e) {
        echo "Greška prilikom povezivanja sa bazom: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="/assets/css/style.css"> <!-- Povezivanje sa CSS fajlom -->
</head>
<body>

    <form method="POST" action="register.php">
        <input type="text" name="ime" placeholder="Ime" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="lozinka" placeholder="Lozinka" required>
        <button type="submit">Registruj se</button>
    </form>

</body>
</html>
