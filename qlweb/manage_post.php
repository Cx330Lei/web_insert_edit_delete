<?php
        session_start();
        if((isset($_SESSION['email']) == NULL) || $_SESSION['role']== '0')
        {
                header("location:index.php");
                exit();
        }
        if(isset($_POST['post'])) {
                header("location:posts_add.php");
        }
        if(isset($_POST['manage_post'])) {
                header("location:confirm_posts.php");
        }
        if(isset($_POST['manage_posted'])) {
                header("location:manage_posted.php");
        }
        if(isset($_POST['show_post'])) {
                header("location:show_post.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Login Admin</title>
</head>
<body>
        <div class="container">
                <form action="" method="POST" class="login-email">
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Manage post</p>
                        <div class="input-group">
                                <button name="post" class="btn">Post</button>
                        </div>
                        <div class="input-group">
                                <button name="manage_post" class="btn">Confirm the posts</button>
			</div>
                        <div class="input-group">
                                <button name="manage_posted" class="btn">Manage posts</button>
                        </div>
                        <div class="input-group">
                                <button name="show_post" class="btn">Read posts</button>
                        </div>
                </form>
        </div>
</body>
</html>

