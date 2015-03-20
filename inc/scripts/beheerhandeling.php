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










?>