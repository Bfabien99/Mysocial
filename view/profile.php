<?php 
    $initController = new users();
    $postController = new posts();
    $callController = $initController->userinfo($_SESSION["email"]);
    $getAll = $initController->getAll();
    $key = array_search($_SESSION["email"],array_column($getAll,'email'));
    array_splice($getAll,$key,1);

    $getPost = $postController->getAll();

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
            <div class="img">
                <img src="<?= $callController["picture"] ?>" alt="" width="100px">
            </div>
            <div class="info">
                <p>Name : <?= $callController["name"] ?></p>
                <p>First Name : <?= $callController["firstname"] ?></p>
                <p>Created at : <?= $callController["created_at"] ?></p>
                <p>gender : <?= $callController["gender"] ?></p>
            </div>
        </div>

        <div class="left">
            <h3>Menu</h3>
            <ul>
                <div>
                <li><a href="">Friends</a></li>
                <?php foreach ($getAll as $data):?>
                    <div class="card">
                        <img src="<?= $data["picture"] ?>" alt="" width="50px" style="border-radius:50%">
                        <span><?= $data["name"] ?> <?= $data["firstname"]?></span>
                    </div>
                <?php endforeach?>
                </div>
                
                <div></div>

                <li><a href="">Notification</a></li>
                <li><a href="">Update information</a></li>
                <li><a href="">Create invitation Link</a></li>
                <li><a href="">Log out</a></li>
            </ul>
        </div>

        <div class="content">
            <div class="post">
                <form action="" method="post">
                    <textarea name="userpost" cols="80" rows="10" placeholder="Write something..."></textarea>
                    <input type="submit" value="post" name="post">
                </form>
            </div>

            <div class="main">
                <?php foreach ($getPost as $data):?>
                    <div class="card">
                        <img src="<?= $data["picture"] ?? "asst.png" ?>" alt="" width="100px">
                        <p>Post : <?= $data["post"] ?></p>
                        <p>Email : <?= $data["useremail"] ?></p>
                        <p>Posted the : <?= $data["date"] ?></p>
                    </div>
                <?php endforeach?>
            </div>
            
        </div>

    </div>

</body>
</html>