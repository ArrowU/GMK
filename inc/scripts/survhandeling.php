<?php
require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.php');
if(isset($_GET['ACTIVATEUNIT'])){
    $query2 = $pdo->prepare("SELECT afkorting FROM specialisaties WHERE id=:id");
    $query2->execute(array('id' => $_POST['spec']));
    $result2 = $query2->fetch(PDO::FETCH_OBJ);

    
    $query3 = $pdo->prepare("SELECT * FROM eenheden WHERE id=:id");
    $query3->execute(array('id' => $_POST['addid']));
    $result3 = $query3->fetch(PDO::FETCH_OBJ);
    
    //Variables
    $specialisatie = $result2->afkorting;
    $eenheid_id = $result3->id;
    $naam = $result3->naam;
    $roepnummer = $result3->roepnummer;
    $volgnummer = $result3->volgnummer;
    $aangemeld = 1;
    
  $query = $pdo->prepare("INSERT INTO actieve_eenheden (grip, eenheid_id, naam, roepnummer, volgnummer, specialisatie) VALUES (:grip, :eenheid_id, :naam, :roepnummer, :volgnummer, :specialisatie)");
    $query->execute(array('grip' => $_POST['grip'],'eenheid_id' => $eenheid_id, 'naam' => $naam, 'roepnummer' => $roepnummer, 'volgnummer' => $volgnummer, 'specialisatie' => $specialisatie));
    $query4 = $pdo->prepare("UPDATE eenheden SET aangemeld=:a WHERE id=:id");
    $query4->execute(array('a' => $aangemeld, 'id' => $eenheid_id));
    header("Location: /ocpanel/surveillance.php");
}


if(isset($_GET['ACTIVEUNITS'])){
    


    $query = $pdo->prepare("SELECT * FROM actieve_eenheden ORDER BY roepnummer");
    $query->execute();
    while($result = $query->fetch(PDO::FETCH_OBJ)){
        echo'<div class="thumbnail">';
        echo'<h6>Nummer: <strong>';
        echo $result->roepnummer;
        echo'-';
        echo $result->volgnummer;
        echo '</strong>';
        echo '<br>';
        echo 'Naam: ';
        echo '<strong>';
        echo $result->naam;
        echo '</strong>';
        echo '<br>';
        echo 'Specialisatie: <strong>';
        echo $result->specialisatie;
        echo '</strong><br>';
        echo 'GRIP: ';
        echo '<strong>';
        echo $result->grip;
        echo'</strong>';
        echo'<form action="/inc/scripts/survhandeling.php?changecallout" method="post">';
        echo'<select name="gekoppelde_melding">';
        $query1 = $pdo->prepare("SELECT id, titel FROM meldingen");
        $query1->execute();
        while($result1 = $query1->fetch(PDO::FETCH_OBJ)){
            echo'<option value="';
            echo $result1->id;
            echo'">';
            echo $result1->titel;
            echo'</option>';
        }
        echo'<option value="">Ontkoppel</option>';
        echo'</select>';  
        echo'<input name="unitid" type="hidden" value="';
        echo $result->id; 
        echo'">';
        echo'<input type="submit" value="(Ont)koppel" class="btn btn-sm btn-default">';      
        echo'</form>';
        echo'<form action="/inc/scripts/survhandeling.php?UNITCODE" method="post">';
        echo'<input type="hidden" name="uid" value="';
        echo $result->eenheid_id;
        echo'">';
        echo'<input type="submit" value="CODE9" class="btn btn-sm btn-warning">';
        echo'<input type="submit" value="CODE10" class="btn btn-sm btn-danger">';
        echo'</form>';
        
        echo'<h6>Gekoppeld aan melding:<small><br>';
        if(!$result->melding_id){
            echo 'Niet gekoppeld';
        }
            else{
            $melding = $result->melding_id; 
            $query5 = $pdo->prepare("SELECT id, titel FROM meldingen WHERE id=:id");
            $query5->execute(array('id' => $melding));
            $result5 = $query5->fetch(PDO::FETCH_OBJ);
            echo $result5->titel;
            }
             echo'</small></h6>';   
             echo'</small></h6>';   
    echo'</div>';
    echo'</div>';

        
        }
    

}







if(isset($_GET['meldingen'])){
    $query = $pdo->prepare("SELECT * FROM meldingen ORDER BY id");
    $query->execute();
        while($result = $query->fetch(PDO::FETCH_OBJ)){
            echo'<div class="thumbnail">';
            echo'<h5>Titel:</h5>';
            echo $result->titel;
            echo'<h5>Melding:</h5>';
            echo $result->melding;
            echo'<form action="/inc/scripts/survhandeling.php?code4" method="post">';
            echo'<br><center><input type="submit" value="CODE4/AFGEROND" class="btn btn-success"></center>';
            echo'<input type="hidden" value="';
            echo $result->id;
            echo'" name="mid">';
            echo'</form>';
            echo'</div>';
        }
}

if(isset($_GET['code4'])){
    $mid = $_POST['mid'];
    
    $query = $pdo->prepare("DELETE FROM meldingen WHERE id=:id");
    $query->execute(array('id' => $mid));
    
    $query1 = $pdo->prepare("UPDATE actieve_eenheden SET melding_id='' WHERE melding_id=:id");
    $query1->execute(array('id' => $mid));
    header("Location: /ocpanel/surveillance.php");
}









if(isset($_GET['changecallout'])){
    $unitid = $_POST['unitid'];
    $melding = $_POST['gekoppelde_melding'];
    
    $query1 = $pdo->prepare("SELECT id, titel FROM meldingen WHERE id=:id");
    $query1->execute(array('id' => $melding));
    
    $query = $pdo->prepare("UPDATE actieve_eenheden SET melding_id=:id WHERE id=:unid");
    $query->execute(array('id' => $melding, 'unid' => $unitid));
    
    header("Location: /ocpanel/surveillance.php");
}












if(isset($_GET['UNITCODE'])){
    $uid = $_POST['uid'];
    
    $query = $pdo->prepare("DELETE FROM actieve_eenheden WHERE eenheid_id=:id");
    $query->execute(array('id' => $uid));
    
    $query2 = $pdo->prepare("UPDATE eenheden SET aangemeld='0' WHERE id=:id");
    $query2->execute(array('id' => $uid));
    
    header("Location: /ocpanel/surveillance.php");
}



if(isset($_GET['addcall'])){
    $titel = $_POST['titel'];
    $melding = $_POST['melding'];
    
    $query = $pdo->prepare("INSERT INTO meldingen (titel, melding) VALUES (:titel, :melding)");
    $query->execute(array('titel' => $titel, 'melding' => $melding));
    header("Location: /ocpanel/surveillance.php");
}



?>