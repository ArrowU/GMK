<?php

require($_SERVER['DOCUMENT_ROOT'].'/inc/sql.php');
if(isset($_GET['login'])){
    $query = $pdo->prepare("SELECT * FROM users WHERE username=:username");
    $query->execute(array('username' => $_POST['username']));
    if(!$query){
        header("Location: /login.php?error-username");
}
    else{
        $array = $query->fetch(PDO::FETCH_OBJ);
        if($array->password != $_POST['password']){
                  header("Location: /login.php?error-password");  
        }
        elseif($array->password == $_POST['password']){
            session_start();
            $_SESSION['id'] = htmlentities($array->id);
            $_SESSION['username'] = htmlentities($array->username);
            $_SESSION['password'] = htmlentities($array->password);
            $_SESSION['name'] = htmlentities($array->name);
            $_SESSION['surname'] = htmlentities($array->surname);
            $_SESSION['rank'] = htmlentities($array->rank);
            header("Location: /ocpanel/index.php");
        }
    }
}


