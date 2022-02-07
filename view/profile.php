<?php 
    $initController = new users();
    $callController = $initController->userinfo($_SESSION["email"]);
    $getAll = $initController->getAll();
    $key = array_search($_SESSION["email"],array_column($getAll,'email'));
    array_splice($getAll,$key,1);

    if (!empty($_POST["userpost"])) {
        $postController = new posts();
        $save = $postController->save($_POST["userpost"],$_SESSION["email"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>PAGE</title>
</head>
<body>

    <div class="container">

        <div class="top">
            <img src="<?= $callController["picture"] ?>" alt="" width="100px">
            <p>Name : <?= $callController["name"] ?></p>
            <p>First Name : <?= $callController["firstname"] ?></p>
            <p>Created at : <?= $callController["created_at"] ?></p>
            <p>gender : <?= $callController["gender"] ?></p>
        </div>


        <div class="content">

            <div class="left">Menu</div>

            <div class="post">
                <form action="" method="post">
                    <textarea name="userpost" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="post" name="post">
                </form>
            </div>

            <div class="main">
                <?php foreach ($getAll as $data):?>
                    <div class="card">
                        <img src="<?= $data["picture"] ?>" alt="" width="100px">
                        <p>Name : <?= $data["name"] ?></p>
                        <p>First Name : <?= $data["firstname"] ?></p>
                        <p>Created at : <?= $data["created_at"] ?></p>
                        <p>gender : <?= $data["gender"] ?></p>
                    </div>
                <?php endforeach?>
            </div>
            
        </div>

    </div>

</body>
</html>