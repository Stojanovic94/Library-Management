CREATE TABLE korisnici (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    lozinka VARCHAR(255) NOT NULL,
    admin TINYINT(1) DEFAULT 0
);

CREATE TABLE knjige (
    id INT AUTO_INCREMENT PRIMARY KEY,
    naslov VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    godina_izdanja YEAR NOT NULL,
    dostupni_primerci INT DEFAULT 0
);

CREATE TABLE rezervacije (
    id INT AUTO_INCREMENT PRIMARY KEY,
    korisnik_id INT NOT NULL,
    knjiga_id INT NOT NULL,
    datum_iznajmljivanja DATE NOT NULL,
    rok_vracanja DATE NOT NULL,
    FOREIGN KEY (korisnik_id) REFERENCES korisnici(id),
    FOREIGN KEY (knjiga_id) REFERENCES knjige(id)
);
