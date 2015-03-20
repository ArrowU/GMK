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
<h4>Hey, <?php echo $_SESSION['name'] ?></h4><br>
<p>Welkom bij het nieuwe meldkamersysteem van de Benelux112 GTA IV Roleplay Clan.</p>

<h5>Jouw info:</h5>



<strong>Gebruikers-ID:</strong> <?PHP echo $_SESSION['id']; ?><br>
<strong>Gebruikersnaam:</strong> <?PHP echo $_SESSION['username']; ?><br>
<strong>Naam: </strong> <?php echo $_SESSION['name']; ?><br>
<strong>Achernaam: </strong> <?php echo $_SESSION['surname']; ?><br>
<strong>Rang: </strong><?php $rang = $_SESSION['rank'];

if($rang == 1){
    echo'Reserve Centralist i.o';

}
if($rang == 2){
    echo'Reserve Centralist';

}
if($rang == 3){
    echo'Academie OC';

}
if($rang == 4){
    echo'Centralist i.o';

}
if($rang == 5){
    echo'Centralist';

}
if($rang == 6){
    echo'Ervaren Centralist';

}
if($rang == 7){
    echo'Adjunct Hoofd Centralist';

}
if($rang == 8){
    echo'Hoofd Centralist';

}
if($rang == 9){
    echo'Meldkamer Supervisor';

}

?>
