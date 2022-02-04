<?php

    if ( isset($_SESSION['email']) && isset($_SESSION['password']) ) {
        $emailval =  $_SESSION['email'];
        $passwordval =  $_SESSION['password'];
    }
    else{
      $emailval = $passwordval = "";  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNECT</title>
</head>
<body>
    <div class="container">
        <div class="left">
            <h2>Hello</h2>
            <h5>#MysocialNetwork</h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit ratione quisquam totam, perferendis earum odit dolorum dignissimos debitis. Praesentium, nisi! Mollitia corrupti debitis perspiciatis saepe incidunt vel sed officia quia.
            Facilis eveniet reprehenderit aspernatur libero itaque, deserunt ut quasi voluptate, quidem nemo ipsam at eos cupiditate facere consectetur, exercitationem quos vel vitae dolores. Quae minima laudantium illum fuga suscipit nam!</p>
        </div>
        <div class="right">
            <form action="" method="POST">
                <input type="email" name="email" placeholder="email" value="<?= $emailval ?>">
                <input type="password" name="password" placeholder="password" value="<?= $passwordval ?>">
                <input type="submit" value="login" name="login">
                <a href="/Mysocial/forget">forget password ?</a>
            </form>
        </div>
        <div>
            <h6>You are new? Join us</h6>
            <a href="/Mysocial/SignIn">Sign in</a>
        </div>
        <footer></footer>
    </div>
</body>
</html>