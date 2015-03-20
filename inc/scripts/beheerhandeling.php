<?php
require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.php');


if(isset($_GET['addcentralist'])){
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $rang = $_POST['rank'];
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    
    $query = $pdo->prepare("INSERT INTO users (name, surname, rank, username, password) VALUES (:name, :surname, :rank, :username, :password)");
    $query->execute(array('name' => $voornaam, 'surname' => $achternaam, 'rank' => $rang, 'username' => $gebruikersnaam, 'password' => $wachtwoord));
    header("Location: /ocpanel/b-centralisten.php");
}



if(isset($_GET['addunit'])){
    $roepnummer = $_POST['roepnummer'];
    $volgnummer = $_POST['volgnummer'];
    $voornaam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];
    $eenheid = $_POST['eenheid'];

    $query = $pdo->prepare("INSERT INTO eenheden (naam, roepnummer, volgnummer, aangemeld, eenheid) VALUES (:naam, :roepnummer, :volgnummer, '0', :eenheid)");
    $query->execute(array('naam' => $voornaam, 'roepnummer' => $roepnummer, 'volgnummer' => $volgnummer, 'eenheid' => $eenheid));
    header("Location: /ocpanel/b-eenheden.php");

}






?>