<?php
        include 'config.php';
        session_start();
	if((isset($_SESSION['email']) == NULL) || is_user())
        {
            header("location:index.php");
            exit();
        }
        $id = $_GET['id'];
        $sql="select * from infusers where id='".$id."'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        if($row[1] == '1')
        {
            echo ('Cannot edit user !');
            header("location:manage_user.php");
            exit();
        }
        if(isset($_POST['edit']))
        {
            if($_POST['password'] != NULL)
                {
                    $p=md5($_POST['password']);
                }
                if($_POST['username'] == NULL)
                {
                    echo "Please enter your username";
                }
                else
                {
                    $u=$_POST['username'];
                }
                if($_POST['email'] == NULL)
                {
                    echo "Please enter your email";
                }
                else
                {
                     $e=$_POST['email'];
                }
        if($_POST['cpassword'] == NULL)
        {
            $sql="update infusers set username='".$u."', email='".$e."' where id='".$id."'";
            mysqli_query($conn,$sql);
            header("location:manage_user.php");
            exit();
        }
        else
        {
            if($_POST['password'] != $_POST['cpassword'])
            {
                echo "Password and Confirm password is not correct";
            }
            else
            {
                $sql="update infusers set username='".$u."', password='".$p."', email='".$e."' where id='".$id."'";
                mysqli_query($conn,$sql);
                header("location:manage_user.php");
                exit();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Edit user</title>
</head>
<body>
        <div class="container">
                <form action="" method="POST" class="login-email">
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Edit user</p>
                        <div class="input-group">
                                <input type="username" placeholder="Username" name="username" value="<?=$row['username']?>" required>
                        </div>
                        <div class="input-group">
                                <input type="email" placeholder="Email" name="email" value="<?=$row['email']?>" required>
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="Password" name="password" value="<?=$row['password']?>" >
                        </div>
			<div class="input-group">
                                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?=$row['cpassword']?>" >
                        </div>
                        <div class="input-group">
                                <button name="edit" class="btn">Edit</button>
                        </div>
                </form>
        </div>
</body>
</html>

