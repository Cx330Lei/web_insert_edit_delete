<?php
include 'config.php';
error_reporting(0);
session_start();

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $s="select * from infusers";
    $q=mysqli_query($conn,$s);
    while($r=mysqli_fetch_array($q))
        {
                if($email === $r['email'])
                {
                        echo "This email is already taken!";
                        exit();
                }
        }
    if($password === $cpassword)
    {

        $sql = "INSERT INTO `infusers` (`username`,`email`, `password`) VALUES ('$username','$email','$password')";
        $query = mysqli_query($conn, $sql);
        if(!$query)
        {
            echo "Register error!";
        }else
		{
			echo "Register success!";
		}
    }else
    {
		echo "<script>alert('Password not matched !')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
