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
                    <input type="email" name="email" value="<?= $_SESSION["email"] ?? "";?>">
                </div>
                <div class="group">
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?= $_SESSION["password"] ?? "";?>">
                </div>
                <input type="submit" value="LogIn" name="login">
            </form>
            <a href="">Forget password?</a>
        </div>

    </div>

</body>
</html>