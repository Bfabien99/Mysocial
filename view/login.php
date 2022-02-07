<?php
    $msg = false;
    $password = $_SESSION["password"] ?? "";
    $email = $_SESSION["email"] ?? "";
    $initController = new users();
    if ( !empty($_POST["email"]) && !empty($_POST["password"])) {
        $callController = $initController->check($_POST["email"],$_POST["password"]);
        if($callController){
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
        }
        else {
            $msg = "Wrong password or Email";
        }
    }
    else {
        $msg = "Fill all input field";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body>
    
    <div class="container">

        <div class="left">
            <h1>MySocial Network</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas iusto saepe nulla ducimus, eos in explicabo numquam veritatis libero? Quis voluptate nisi amet obcaecati nemo labore tenetur iure voluptatibus.</p>
            <p>
                You don't have an Account, create one easily.
                <a href="Signin">SignIn</a>
            </p>
        </div>

        <div class="right">
            <form action="" method="post">
                <div class="group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?= $email;?>">
                </div>
                <div class="group">
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?= $password;?>">
                </div>
                <input type="submit" value="LogIn" name="login">
            </form>
            <a href="">Forget password?</a>
            <?php if($msg == true):?>
                <div class="error"><?= $msg; ?></div>
            <?php endif;?>
        </div>

    </div>

</body>
</html>