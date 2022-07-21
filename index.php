<?php
session_start();
require "vendor/autoload.php";
require "controllers/users.php";
require "controllers/posts.php";

$router = new AltoRouter();

$router->map('GET',"/Mysocial/",function()
{
    require 'view/login.php'; 
});
$router->map('POST',"/Mysocial/",function()
{   
    $initController = new users();
    if ( !empty($_POST["email"]) && !empty($_POST["password"])) {
        $callController = $initController->check($_POST["email"],$_POST["password"]);
        if($callController){
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
        }
        else {
            $msg = "Wrong password or Email";
            echo "<div class ='error'>".$msg."</div>";
        }
    }
    else {
        $msg = "Fill all input field";
        echo "<div class ='error'>".$msg."</div>";
    }
    if ($_SESSION["email"] == $_POST["email"] && $_SESSION["password"] == $_POST["password"] ) {
        header('location:/Mysocial/profile');
    }
    else {
        require 'view/login.php'; 
   }
});


$router->map('GET',"/Mysocial/Signin",function()
{   
    require 'view/signin.php'; 
});
$router->map('POST',"/Mysocial/Signin",function()
{   
    if (!empty($_POST["name"]) && !empty($_POST["fname"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["address"]) && !empty($_POST["password"]) && !empty($_POST["birth"]) && !empty($_POST["gender"])) {
    function cleaner($value){
        $value = htmlentities(strip_tags($value));
        $value = trim($value);
        $value = ucfirst(strtolower($value));
        return $value;
    }

    $name = cleaner($_POST["name"]);
    $fname = cleaner($_POST["fname"]);
    $email = cleaner($_POST["email"]);
    $phone = cleaner($_POST["phone"]);
    $address = cleaner($_POST["address"]);
    $password = htmlentities(md5($_POST["password"]));
    $birth = cleaner($_POST["birth"]);
    $gender = cleaner($_POST["gender"]);
    

    $initController = new users();
    
    if ($_POST["gender"] == "man") {
        $picture = "assets/images/profile_pics/men-profile.png";
    }
    else {
        $picture = "assets/images/profile_pics/woman-profile.jpg";
    }
    $callController = $initController->save($name, $fname,$email,$address,$phone,$gender,$birth,$password,$picture);
    if($callController){
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header('location:/Mysocial/profile');
    }
    else {
        $msg = "We cannot save yet. Please retry after.";
        require 'view/signin.php';
        echo "<div class ='error'>".$msg."</div>";
    }
}
else {
    $msg = "Please, fill all input.";
    require 'view/signin.php';
    echo "<div class ='error'>".$msg."</div>";
}
    
});


$router->map('GET',"/Mysocial/profile",function()
{   
    require 'view/profile.php'; 
});
$router->map('POST',"/Mysocial/profile",function()
{   
    if (!empty($_POST["userpost"])) {
        $postController = new posts();
        $save = $postController->save($_POST["userpost"],$_SESSION["email"]);
        require 'view/profile.php';
    }
    else {
        header('Location:/Mysocial/profile');
        die;
    }
    
});


$router->map('GET',"/Mysocial/profile/deconnect",function()
{   
    unset($_SESSION["email"],$_SESSION["password"]);
    header('Location:/Mysocial');
});


$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) 
{
    call_user_func_array( $match['target'], $match['params'] ); 
} 
else 
{
// no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}