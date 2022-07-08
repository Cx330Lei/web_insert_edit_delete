<?php
        session_start();
        if((isset($_SESSION['email']) == NULL) || $_SESSION['role']== '0')
        {
        header("location:index.php");
        exit();
	}
        if(isset($_POST['manage_inf'])) {
                header("location:infadmin.php");
        }
        if(isset($_POST['manage_user'])) {
                header("location:manage_user.php");
        }
        if(isset($_POST['manage_post'])) {
                header("location:manage_post.php");
        }
        if(isset($_POST['logout'])) {
                header("location:logout.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>LOGIN Admin</title>
</head>
<body>
        <div class="container">
                <form action="" method="POST" class="login-email">
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Admin</p>
                        <div class="input-group">
                                <button name="manage_inf" class="btn">Manage information</button>
                        </div>
                        <div class="input-group">
                                <button name="manage_user" class="btn">Manage users</button>
                        </div>
                        <div class="input-group">
                                <button name="manage_post" class="btn">Manage Posts</button>
                        </div>
                        <div class="input-group">
                                <button name="logout" class="btn">Logout</button>
                        </div>
                </form>
        </div>
</body>
</html>
