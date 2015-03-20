<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: /index.php");
}
if($_SESSION['rank'] < 7){
       header("Location: /ocpanel/beheer.php?permis");
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
  <li role="presentation" class="active"><a href="b-centralisten.php">Centralisten</a></li>
  <li role="presentation"><a href="b-eenheden.php">Eenheden</a></li>
  <li role="presentation"><a href="b-algemeen.php">Algemeen</a></li>
  <li role="presentation"><a href="b-bewerken.php">Bewerken</a></li>
</ul>


<div class="row">
  <div class="col-xs-3 col-md-4">
      <div class="thumbnail">
      <center>
<h4>Centralist Toevoegen:</h4>
<br>
<form action="/inc/scripts/beheerhandeling.php?addcentralist" method="post">
<input required type="text" placeholder="Voornaam" name="voornaam"><br>
<input required type="text" placeholder="Eerste letter achternaam" name="achternaam"><br>
<select name=rank>
    <option value="1">Reserve Centralist i.o</option>
    <option value="2">Reserve Centralist</option>
    <option value="3">Academie OC</option>
    <option value="4">Centralist i.o</option>
    <option value="5">Centralist</option>
    <option value="6">Ervaren Centralist</option>
    <option value="7">Adjunct Hoofd Centralist</option>
    <option value="8">Hoofd Centralist</option>
    <option value="9">Supervisor</option>
</select><br>
<input required type="text" placeholder="Gebruikersnaam" name="gebruikersnaam"><br>
<input required type="text" placeholder="Wachtwoord" name="wachtwoord"><br>
    <input type="submit" value="Voeg Toe" class="btn btn-success">
      </form>
    </center>
    </div>
    </div>
    <div class="col-xs-6 col-md-4">
            <div class="thumbnail">
  <h4>Zoek centralisten</h4>
                <form action="?zoekcentralist" method="post">
                <input type="text" placeholder="Zoekterm" name="naam">
                    
                </form>
                              
                       <table class="table table-condensed">
                           <tr>
  <td><strong>Naam:</strong></td>
  <td><strong>Achternaam:</strong></td>
                               </tr>
</table>
                <?php if(isset($_GET['zoekcentralist'])){
    require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.php');
    $term = "%".$_POST['naam']."%";
    $query = $pdo->prepare("SELECT * FROM users WHERE name LIKE ?");
    $query->execute(array($term));
    while($result = $query->fetch(PDO::FETCH_OBJ)){
    echo'<table class="table table-condensed">';
    echo'<tr>';
    echo'<td>';
    echo $result->name;
    echo'</td><td>';
    echo $result->surname;
    echo'</td><td>';
    echo'<form action="/ocpanel/b-bewerken.php?bewerkcentralist" method="post">';
    echo'<input type="hidden" name="id" value="';
    echo $result->id;
    echo'">';
    echo'    <input type="submit" value="Bewerk" class="btn btn-small btn-success">';    echo'</td><td>';
    echo'</tr>';
    echo'</table>';

}
}
    ?> 
         
                
        </div>
    </div>
</div>