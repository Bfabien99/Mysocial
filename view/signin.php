<?php
    
    echo "Hello";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE AN ACCOUNT</title>
</head>
<body>
    <div class="left">
        <h2>Join Us, you won't regreat</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit reprehenderit rerum praesentium repudiandae saepe aperiam qui ipsam, a facilis sequi!</p>
    </div>
    <div class="right">
        <form action="" method="POST">
            <h2>S'inscrire</h2>
            <input type="text" name="fname" placeholder="first name">
            <input type="text" name="name" placeholder="name">
            <input type="email" name="email" placeholder="email">
            <input type="tel" name="phone" placeholder="phone number">
            <input type="text" name="address" placeholder="address">
            <input type="password" name="password" placeholder="new password">
            <input type="date" name="birth" placeholder="birthday">
            <label for="gender">Gender <input type="radio" name="gender" value="Man">M <input type="radio" name="gender" value="Girl">G</label>
            <input type="submit" value="SignIn" name="signin"><a href="/Mysocial/">Go back</a>
        </form>
    </div>
</body>
</html>