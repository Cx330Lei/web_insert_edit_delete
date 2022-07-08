<?php
        session_start();
        if((isset($_SESSION['email']) == NULL) || $_SESSION['role']== '1')
        {
                header("location:index.php");
                exit();
        }

        if(isset($_POST['manage_inf'])) {
            header("location:infuser.php");
        }
        if(isset($_POST['manage_post'])) {
            header("location:manage_postUser.php");
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
        <title>LOGIN USER</title>
</head>
<body>
        <div class="container">
                <form action="" method="POST" class="login-email">
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">USER</p>
                        <div class="input-group">
                                <button name="manage_inf" class="btn">Manage information</button>
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
