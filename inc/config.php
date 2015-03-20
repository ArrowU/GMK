<?php
//Basis instellingen:

//PDO Instellingen, Database naam en host veranderen in 'Sql.php'

$user = 'root'; //USER, Meestal 'Root'
$pass = ''; //Wachtwoord

$pdo = new PDO('mysql:host=localhost;dbname=gmk', $user, $pass);

?>
