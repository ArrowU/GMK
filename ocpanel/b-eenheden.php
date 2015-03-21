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
                <form id="AddUnit" action="/inc/scripts/beheerhandeling.php?addunit" method="post">
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
                    </select><br>
                    <input type="number" required name="volgnummer" placeholder="Volgnummer"><br>
                    <input type="text" required name="naam" placeholder="Voornaam"><br>
                    <input type="text" required name="achternaam" placeholder="Achternaam"><br>
                    Eenheid: <select name="eenheid">
                        <?php
                        $query = $pdo->prepare("SELECT * FROM units ORDER BY eenheid");
                        $query->execute();
                        while($result = $query->fetch(PDO::FETCH_OBJ)){

                            echo'<option value="'.$result->eenheid.'">';
                            echo $result->eenheid;
                            echo'</option>';
                        }

                        ?>
                    </select><br>
                   <input type="submit" value="toevoegen" class="btn btn-success">
                </form>

            </center>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="thumbnail">
            <h4>Zoek Eenheden</h4>
            <form action="?zoekeenheid" method="post">
                <input type="text" placeholder="Zoekterm(Naam)" name="naam">

            </form>

        <table class="table table-condensed">
            <tr>
                <td><strong>Roepnummer:</strong></td>
                <td><strong>Naam:</strong></td>
            </tr>
        </table>
        <?php if(isset($_GET['zoekeenheid'])){
            $term = "%".$_POST['naam']."%";
            $query = $pdo->prepare("SELECT * FROM eenheden WHERE naam LIKE ? ORDER BY id");
            $query->execute(array($term));
            while($result = $query->fetch(PDO::FETCH_OBJ)){
                echo'<table class="table table-condensed">';
                echo'<tr>';
                echo'<td>';
                echo $result->roepnummer;
                echo'-';
                echo $result->volgnummer;
                echo'</td><td>';
                echo $result->naam;
                echo'</td><td>';
                echo'<a href="/ocpanel/b-bewerken.php?eid='.$result->id.'"><button class="btn btn-small btn-success">Bewerk</button> </a>';
                echo'</td><td>';
                echo'</tr>';
                echo'</table>';

            }
        }
        ?>

        </div>
    </div>

    <div class="col-xs-4 col-md-3">
        <div class="thumbnail">
        <h5>Voeg eenheid toe:</h5>
        <form action="?addunit" method="post">
            <input name="unitname" required type="text" placeholder="Eenheid naam">

            <input type="submit" value="toevoegen" class="btn btn-success">
        </form>
        <table>
            <caption>Eenheden:</caption>
            <thead>
            <tr>
                <th>Naam: </th>
                <th>Verwijderen:</th>
            </tr>
            </thead>
            <tbody>
        <?php
        $query = $pdo->prepare("SELECT * FROM units ORDER BY eenheid");
        $query->execute();
        while($result = $query->fetch(PDO::FETCH_OBJ)){
            echo'<tr>';
            echo'<td>'.$result->eenheid.'</td>';
            echo'<td><a href="?deleteunitid='.$result->id.'" class="btn btn-danger">X</a></td>';
            echo'</tr>';
        }
        if(isset($_GET['deleteunitid'])){
            if(is_numeric($_GET['deleteunitid'])){
                $uid = $_GET['deleteunitid'];
                $query2 = $pdo->prepare("DELETE FROM units WHERE id=:id");
                $query2->execute(array('id' => $uid));
                header("Location: /ocpanel/b-eenheden.php");
            }
        }
        if(isset($_GET['addunit'])){
            $unitname = $_POST['unitname'];
            $query2 = $pdo->prepare("INSERT INTO units (eenheid) VALUES (:unitname)");
            $query2->execute(array('unitname' => $unitname));
            header("Location: /ocpanel/b-eenheden.php");
        }
        if(isset($_GET['newroepnummer'])) {
            $query11 = $pdo->prepare("INSERT INTO roepnummers (roepnummer) VALUES (:roepnummer)");
            $query11->execute(array('roepnummer' => $_POST['roepnummer']));
            header("Location: /ocpanel/b-eenheden.php");
        }
        if(isset($_GET['deleteroepnummer'])){
            if(is_numeric($_GET['deleteroepnummer'])){
            $query12 = $pdo->prepare("DELETE FROM roepnummers WHERE id=:id");
            $query12->execute(array('id' => $_GET['deleteroepnummer']));
        }
        }
        ?>
            </tbody>
            </table>
            </div>
        </div>

<div class="col-xs-3 col-md-4">
    <div class="thumbnail">
        <h5>Roepnummers:</h5>
            <form action="?newroepnummer" method="post">
                <input type="number" required name="roepnummer" placeholder="Roepnummer">
                <input type="submit" value="toevoegen" class="btn btn-success">
            </form>
        <table>
            <caption>Roepnummers:</caption>
            <thead>
            <tr>
                <th>Nummer: </th>
                <th>Bewerker:</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query10 = $pdo->prepare("SELECT * FROM roepnummers ORDER BY roepnummer");
            $query10->execute();
            while($result10 = $query10->fetch(PDO::FETCH_OBJ)){
                echo'<tr>';
                echo'<td>'.$result10->roepnummer.'</td>';
                echo'<td><a href="?deleteroepnummer='.$result10->id.'" class="btn btn-danger">X</a></td>';
                echo'</tr>';
            }

            ?>
            </tbody>
            </table></div></div>
    </div>

        <?php

        ?>
        </div>
</div>
</div>