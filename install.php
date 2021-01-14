<?php

echo "Sukuriame DB MySQL serveryje ir dvi lenteles.</br></br>";

//1. prisijungiam prie MySQL serverio
$con = mysqli_connect("localhost", "root", "mysql");
if (mysqli_connect_errno()) {
    printf('<br>Negaliu prisijungti:' . mysqli_connect_error());
}

//jei nera sukurta DB, pirmojo paleidimo metu sukuriam ja
$sql = "CREATE DATABASE IF NOT EXISTS testas";
mysqli_query($con, $sql) or die("Neimanoma sukurti duomenų bazės 'testas': %s\n" . mysqli_error($con));

//patikrinam ar pavyko prisijungti prie nurodytos DB
$db = mysqli_select_db($con, 'testas');
if (!$db) {
    die('Nerasta duomenų bazė: ' . mysqli_error($con));
}

// kuriame lentele darbuotojai ir uzpildom pirminiais duomenimis
$sql = <<<MySQL_QUERY
			CREATE TABLE IF NOT EXISTS darbuotojai (
			ID int(11) NOT NULL,
            Vardas varchar(50) NOT NULL,
            Miestas varchar(25) NOT NULL,
            Amzius int(11) NOT NULL
			)
MySQL_QUERY;

mysqli_query($con, $sql) or die("Neimanoma sukurti lentelės: 'darbuotojai': %s\n" . mysqli_error($con));


$sql = "ALTER TABLE darbuotojai ADD PRIMARY KEY (ID)";
mysqli_query($con, $sql); //or die("Klaida: %s\n" . mysqli_error($con));


$sql = "ALTER TABLE darbuotojai MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;";
mysqli_query($con, $sql); //or die("Klaida: %s\n" . mysqli_error($con));

$sql = "INSERT INTO darbuotojai (Vardas, Miestas, Amzius) VALUES ('Zivile', 'Kaunas', 35), ('test', 'abc', 32), ('Marijus', 'Kaunas', 30);";
mysqli_query($con, $sql); //or die("Klaida: %s\n" . mysqli_error($con));


// kuriame lentele projektai ir uzpildom pirminiais duomenimis
$sql = <<<MySQL_QUERY
			CREATE TABLE IF NOT EXISTS projektai (
                ID int(11) NOT NULL,
                Pavadinimas varchar(50)  NOT NULL,
                Aprasymas varchar(100)  NOT NULL
			)
MySQL_QUERY;

mysqli_query($con, $sql) or die("Neimanoma sukurti lentelės: 'projektai': %s\n" . mysqli_error($con));


$sql = "ALTER TABLE projektai ADD PRIMARY KEY (ID)";
mysqli_query($con, $sql); //or die("Klaida: %s\n" . mysqli_error($con));


$sql = "ALTER TABLE projektai MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";
mysqli_query($con, $sql); //or die("Klaida: %s\n" . mysqli_error($con));

$sql = "INSERT INTO projektai (Pavadinimas, Aprasymas) VALUES ('Planavimas', 'Gamybos planavimas'), ('Tiekimas', 'Žaliavų užsakymas');";
mysqli_query($con, $sql); //or die("Klaida: %s\n" . mysqli_error($con));


print "</br></br><a href='SQL_select.php'> Pereiti į SPRINT2</a>";

//4. atsijungiame nuo MySQL serverio
mysqli_close($con);
