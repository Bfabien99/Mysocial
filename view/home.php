<?php

    if ( isset($_SESSION['name']) || isset($_SESSION['password'])  || isset($_SESSION['email']) ) {
        $emailval =  $_SESSION['email'];
        $passwordval =  $_SESSION['password'];
        $nameval = $_SESSION['name'];
    }
    else{
        $emailval = $passwordval = $nameval = "";
      header("location:/Mysocial/");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>BIENVENUE <?= $nameval ?> </h1>
    <a href="/Mysocial/" onclick="<?php unset($_SESSION['name']); unset($_SESSION['email']); unset($_SESSION['password']) ?>">Déconnexion</a>
</body>
</html>