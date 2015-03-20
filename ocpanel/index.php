<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: /index.php");
}
 echo'    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

';

?>


<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="index.php">Home</a></li>
  <li role="presentation"><a href="surveillance.php">Surveillance</a></li>
  <li role="presentation"><a href="beheer.php">Beheer</a></li>
  <li role="presentation"><a href="eenheden.php">Eenheden</a></li>
     <li role="presentation"><a href="/index.php?logout"><strong>Uitloggen</strong></a></li>
</ul>


<br>
<p>Welkom op de nieuwe versie van het Benelux112 meldkamerbestand.<br>
Klik op een van de tabbladen hierboven om verder te navigeren.</p>