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
  <li role="presentation"><a href="index.php">Home</a></li>
  <li role="presentation"><a href="surveillance.php">Surveillance</a></li>
  <li role="presentation" class="active"><a href="beheer.php">Beheer</a></li>
  <li role="presentation"><a href="eenheden.php">Eenheden</a></li>
     <li role="presentation"><a href="/index.php?logout"><strong>Uitloggen</strong></a></li>
</ul>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="b-centralisten.php">Centralisten</a></li>
  <li role="presentation"><a href="b-eenheden.php">Eenheden</a></li>
  <li role="presentation"><a href="b-algemeen.php">Algemeen</a></li>
  <li role="presentation"><a href="b-bewerken.php">Bewerken</a></li>
</ul>


<h4>Klik op een van de tabjes om naar de pagina's te navigeren.</h4>