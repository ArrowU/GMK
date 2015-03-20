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
  <li role="presentation" class="active"><a href="surveillance.php">Surveillance</a></li>
  <li role="presentation"><a href="beheer.php">Beheer</a></li>
  <li role="presentation"><a href="eenheden.php">Eenheden</a></li>
     <li role="presentation"><a href="/index.php?logout"><strong>Uitloggen</strong></a></li>
</ul>



<div class="row">
  <div class="col-xs-6 col-md-4"><h5>Eenheid aanmelden<br></h5>
      <form action="/inc/scripts/survhandeling.php?ACTIVATEUNIT" method="post">
   <select required name="addid" class="form-control">
<?php
require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.php');
    $query = $pdo->prepare("SELECT * FROM eenheden WHERE aangemeld='0' ORDER BY roepnummer");
    $query->execute();
    while($result = $query->fetch(PDO::FETCH_OBJ)){
        echo'<option value="';
        echo $result->id;
        echo'">';
        echo $result->roepnummer;
        echo'-';
        echo $result->volgnummer;
        echo', ';
        echo $result->naam;
        echo'</option>';
    }
?>
</select> 
<select name="spec" class="form-control">

    <?php
    $query = $pdo->prepare("SELECT * FROM specialisaties ORDER BY id");
    $query->execute();
    while($result = $query->fetch(PDO::FETCH_OBJ)){
        echo'<option value="';
        echo $result->id;
        echo'">';
        echo $result->beschrijving;
        echo' - ';
        echo $result->afkorting;
        echo'</option>';
    }
?> 
    
</select> 
    <input type="number" required name="grip">
           <center><input type="submit" value="Meld In" class="btn btn-default"></center>
</form>
    

    
    
    
</div>

    
    
    
    </div>
    
    <div class="col-xs-6 col-md-4">
        
    <h4>Ingemelde Eenheden:</h4>    
    <div id="activeunits"></div></div>
  <div class="col-xs-6 col-md-4">
          <h4>Voeg een melding toe:</h4>   
      <form action="/inc/scripts/survhandeling.php?addcall" method="post">
          <textarea required placeholder="Titel, een korte beschrijving van de melding." type="text" name="titel" cols="50"></textarea>
          <textarea required placeholder="Vul hier de volledige melding in." type="text" name="melding" rows="5" cols="50"></textarea>
          <center><input type="submit" value="Voeg Toe" class="btn btn-default"></center>
      </form>




    </div>
  <div class="col-xs-6 col-md-4"><h4>Meldingen:</h4>
        
       <div id="meldingen"></div>
      </div>
</div>







<script src="http://code.jquery.com/jquery-latest.js"></script>

<script>$(document).ready(function(){    
    activeunits();
});
    
$(document).ready(function(){    
    meldingen();
});



function activeunits(){
    $("#activeunits").load("/inc/scripts/survhandeling.php?ACTIVEUNITS");
    setTimeout(activeunits, 10000);
}

    
function meldingen(){
    $("#meldingen").load("/inc/scripts/survhandeling.php?meldingen");
    setTimeout(meldingen, 5000);
}




</script>


