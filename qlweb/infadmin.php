<?php
        include 'config.php';
        session_start();
        if((isset($_SESSION['email']) == NULL) || is_user())
        {
            header("location:index.php");
            exit();
        }
        $em = $_SESSION['email'];
        $sql="select * from infusers where email='".$em."'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
     
        if(isset($_POST['edit']))
        {
            if($_POST['password'] != NULL)
            {
                $p=md5($_POST['password']);
            }
            if($_POST['username'] == NULL)
            {
                echo "Please enter your username!";
            }
            else
            {
                $u=$_POST['username'];
            }
            if($_POST['email'] == NULL)
            {
                echo "Please enter your email!";
            }
            else
            {
                $e=$_POST['email'];
            }
            if($_POST['opassword'] == NULL)
            {
                echo "Please enter current password!";
            }
            else
            {
                $op=md5($_POST['opassword']);
            }

            if($op === $row['password'])
            {
                if($_POST['cpassword'] == NULL)
                {
                    $sql="update infusers set username='".$u."', email='".$e."' where email='".$em."'";
                    mysqli_query($conn,$sql);
                    echo "Success!";
                }
                else
                {
                    if($_POST['password'] != $_POST['cpassword'])
                    {
                        echo "New Password and Confirm password is not correct";
                    }
                    else
                    {
                        $sql="update infusers set username='".$u."', password='".$p."', email='".$e."' where email='".$em."'";
                        mysqli_query($conn,$sql);
                        echo "Success!";
                    }
                }
            }else
            {
                echo "Wrong password !";
             
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
        <title>Edit information</title>
        <style>
                td, th {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
                }

                tr:nth-child(even) {
                        background-color: #dddddd;
                }
        </style>
</head>
<body>
        <div class="container">
                <form action="" method="POST" class="login-email">
                        <div><a href="account_admin.php">Return Dashboard</a></div>
                        <br>
                        <table>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                    <tr>
                        <th><?php echo $row['username']; ?></th>
                        <th><?php echo $row['email']; ?></th>
                        <th><?php echo $row['password']; ?></th>
                    </tr>
                        </table>
                        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Edit information</p>
                        <div class="input-group">
                                <input type="username" placeholder="Username" name="username" value="<?php echo $row['username']; ?>" required>
                                </div>
                        <div class="input-group">
                                <input type="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="Current password" name="opassword" value="<?php echo $_POST['opassword']; ?>" >
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="New password" name="password" value="<?php echo $row['password']; ?>" >
                        </div>
                        <div class="input-group">
                                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $row['cpassword']; ?>" >
                        </div>
                        <div class="input-group">
                                <button name="edit" class="btn">Edit</button>
                        </div>
                </form>
        </div>
</body>
</html>

