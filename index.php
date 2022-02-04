<?php 
require "vendor/autoload.php";
require "controllers/users.php";
function cleaner($value){
    $value = strip_tags($value);
    $value = trim($value);
    $value = ucfirst(strtolower($value));
    return $value;
}

$router = new AltoRouter();

$router->map('GET',"/Mysocial/",function(){
    require 'view/login.php'; 
});
$router->map('POST',"/Mysocial/",function(){
    require 'view/login.php'; 
});


$router->map('GET','/Mysocial/SignIn',function(){
    require 'view/signin.php'; 
});
$router->map('POST','/Mysocial/SignIn',function(){
    $initController = new users();

    if (isset($_POST["signin"])) {

        $fname = cleaner($_POST["fname"]);
        $name = cleaner($_POST["name"]);
        $email = cleaner($_POST["email"]);
        $_SESSION['email'] = $email;
        $phone = cleaner($_POST["phone"]);
        $address = cleaner($_POST["address"]);
        $password = cleaner($_POST["password"]);
        $_SESSION['password'] = $password;
        $password = md5($password);
        $birth = $_POST["birth"];
        $gender = $_POST["gender"];
    }
    $call = $initController->save($name,$fname,$email,$address,$phone,$gender,$birth,$password);
    echo $call;
});

$router->map('GET','/Mysocial/forget',function(){
    require 'view/forget.php'; 
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