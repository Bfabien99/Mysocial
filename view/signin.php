
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SignIn</title>
</head>
<body>

    <div class="container">

        <div class="top">
            <a href="/Mysocial">go Back !</a>
        </div>

        <div class="center">
            <form action="" method="post">
                <h1>SignIn FORM</h1>
                <div class="group">
                    <label for="">Name</label>
                    <input type="text" name="name">
                </div>

                <div class="group">
                    <label for="">First name</label>
                    <input type="text" name="fname">
                </div>

                <div class="group">
                    <label for="">Email</label>
                    <input type="email" name="email">
                </div>

                <div class="group">
                    <label for="">Phone</label>
                    <input type="tel" name="phone">
                </div>

                <div class="group">
                    <label for="">Address</label>
                    <input type="text" name="address">
                </div>

                <div class="group">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>

                <div class="group">
                    <label for="">Birth</label>
                    <input type="date" name="birth">
                </div>

                <div class="group">
                    <label for="">Gender <input type="radio" name="gender" value="man">Man <input type="radio" name="gender" value="woman">Woman </label>
                </div>

                <input type="submit" value="SignIn" name="signin">
            </form>
        </div>
     
    </div>
    
</body>
</html>