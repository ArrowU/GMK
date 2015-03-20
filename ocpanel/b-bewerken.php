<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: /index.php");
}
if($_SESSION['rank'] < 8){
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
  <li role="presentation"><a href="b-eenheden.php">Eenheden</a></li>
  <li role="presentation"><a href="b-algemeen.php">Algemeen</a></li>
  <li role="presentation" class="active"><a href="b-bewerken.php">Bewerken</a></li>
</ul>


<?php
require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.php');
if(isset($_GET['bewerkcentralist'])){
    $id = $_POST['id'];
    $query = $pdo->prepare("SELECT * FROM users WHERE id=:id");
    $query->execute(array('id' => $id));
    while($result = $query->fetch(PDO::FETCH_OBJ)){
        echo'<h4>Centralist ' .$result->name. ' bewerken:</h4><br>';
        echo'<form action="?savecentralist" method="post"> <br>';
        echo'<h5>naam: </h5><input type="text" value="' .$result->name.'" name="name"><br>';
        echo'<h5>achternaam: </h5><input type="text" value="' .$result->surname.'" name="surname"><br>';
        echo'<h5>gebruikersnaam: </h5><input type="text" value="' .$result->username.'" name="username"><br>';
        echo'<h5>wachtwoord: </h5><input type="text" value="' .$result->password.'" name="password"><br>';
        echo'<h5>ID: </h5><input type="text" readonly value="' .$result->id.'" name="uid"><br>';
        echo'<h5>rang: </h5><select name=rank>';
        echo'<option value="'.$result->rank.'">';
        if($result->rank == 1){
    echo'Reserve Centralist i.o';

}
if($result->rank == 2){
    echo'Reserve Centralist';

}
if($result->rank == 3){
    echo'Academie OC';

}
if($result->rank == 4){
    echo'Centralist i.o';

}
if($result->rank == 5){
    echo'Centralist';

}
if($result->rank == 6){
    echo'Ervaren Centralist';

}
if($result->rank == 7){
    echo'Adjunct Hoofd Centralist';

}
if($result->rank == 8){
    echo'Hoofd Centralist';

}
if($result->rank == 9){
    echo'Meldkamer Supervisor';

}
echo'</option>
    <option value="1">Reserve Centralist i.o</option>
    <option value="2">Reserve Centralist</option>
    <option value="3">Academie OC</option>
    <option value="4">Centralist i.o</option>
    <option value="5">Centralist</option>
    <option value="6">Ervaren Centralist</option>
    <option value="7">Adjunct Hoofd Centralist</option>
    <option value="8">Hoofd Centralist</option>
    <option value="9">Meldkamer Supervisor</option>
</select><br>';
        echo'<input type="submit" value="Opslaan" class="btn btn-success">';
        echo'</form>';
        //echo'<input type="submit" value="Annuleren" class="btn btn-danger">';

    }


}
if(isset($_GET['savecentralist'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $rang = $_POST['rank'];
    $surname = $_POST['surname'];
    $id = $_POST['uid'];

    $query = $pdo->prepare("UPDATE `users` SET username=:username, password=:password, name=:name, surname=:surname, rank=:rang WHERE id=:uid");
    $query->execute(array('username' => $username, 'password' => $password, 'name' => $name, 'surname' => $surname, 'rang' => $rang, 'uid' => $id));
    header("Location: /ocpanel/b-centralisten.php");
}


?>