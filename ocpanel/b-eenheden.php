<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: /index.php");
}
if($_SESSION['rank'] < 4){
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
  <li role="presentation"><a href="b-centralisten.php">Centralisten</a></li>
  <li role="presentation" class="active"><a href="b-eenheden.php">Eenheden</a></li>
  <li role="presentation"><a href="b-algemeen.php">Algemeen</a></li>
  <li role="presentation"><a href="b-bewerken.php">Bewerken</a></li>
</ul>


<div class="row">
    <div class="col-xs-3 col-md-4">
        <div class="thumbnail">
            <center>
                <h5>Eenheid toevoegen:</h5>
                <form action="/inc/scripts/beheerhandeling.php?addunit" method="post">
                    Roepnummer: <select name="roepnummer">
                        <?php
                        require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.php');
                        $query = $pdo->prepare("SELECT * FROM roepnummers ORDER BY roepnummer");
                        $query->execute();
                        while($result = $query->fetch(PDO::FETCH_OBJ)){

                            echo'<option value="'.$result->roepnummer.'">';
                            echo $result->roepnummer;
                            echo'</option>';
                        }

                        ?>
                    </select>
                    <input type="number" name="volgnummer" placeholder="Volgnummer">
                    <input type="text" name="naam" placeholder="Voornaam">
                    <input type="text" name="achternaam" placeholder="Achternaam">
                    Eenheid: <select name="eenheid">
                        <?php
                        $query = $pdo->prepare("SELECT * FROM units ORDER BY id");
                        $query->execute();
                        while($result = $query->fetch(PDO::FETCH_OBJ)){

                            echo'<option value="'.$result->eenheid.'">';
                            echo $result->eenheid;
                            echo'</option>';
                        }

                        ?>
                    </select>
                   <input type="submit" value="toevoegen" class="btn btn-success">
                </form>

            </center>
        </div>
    </div>
</div>