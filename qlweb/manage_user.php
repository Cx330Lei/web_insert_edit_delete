<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Account</title>
        <style>
                table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }

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
        <div><a href="account_admin.php">Return Dashboard</a></div>
        <br>
                <h3>Search for user</h3>
                <form action="" method="post">
                    Enter email or id:<input type="text" name ="email">
                    <br><br>
                    <button name="search" class="btn">Search</button>
            
                </form>
                <?php
		    include 'config.php';
                    session_start();
                    if((isset($_SESSION['email']) == NULL) || is_user())
                    {
                        header("location:index.php");
                        exit();
                    }
                    $s="select * from infusers where (email='".$_POST['email']."' or id='".$_POST['email']."')";
                    $q=mysqli_query($conn,$s);
                    if(isset($_POST['search']))
                    {
                        if(mysqli_num_rows($q) ===0)
                        {
                            echo "User not found";
                            exit();
                        }
                        while($r=mysqli_fetch_array($q))
                        {
                            if($r['role'] == '0')
                            {
                                $u_role = 'Member';
                            }
                            else
                            {
                                $u_role = 'Admin';
                            }
                      
                ?>
			<table>
                           <tr>
                            <th><?php echo $r['id']; ?></th>                                  
                            <th><?php echo $u_role; ?></th>
                            <th><?php echo $r['username']; ?></th>
                            <th><?php echo $r['email']; ?></th>
                            <th><?php echo $r['password']; ?></th>
                            <th><a href="del_user.php?id=<?php echo $r['id'] ?>">Delete</a></th>
                            <th><a href="edit_user.php?id=<?php echo $r['id'] ?>">Edit</a></th>
                           </tr>
			</table>
            <?php } ?>
            <?php } ?>
             <br> <br>
		<h3>List of users</h3><br>
		
        <table>
			<thead>
                <tr>
                        <th>ID</th>
			<th>Level</th>
                        <th>Username</th>
                        <th>Email</th>
			<th>Password</th>
                        <th>Delete</th>
                        <th>Edit</th>
        		</tr>
			</thead>
					<?php
						$sql="select * from infusers";
						$query=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($query))
						{
							$u_id = $row[0];
							if($row[1] == '0')
							{
								$u_role = 'Member';
							}
							else
							{
								$u_role = 'Admin';
							}
							$u_name = $row[2];
							$u_email = $row[3];
							$u_pass = $row[4];
					?>
				<tr>
					<th><?php echo $u_id; ?></th>
					<th><?php echo $u_role; ?></th>
					<th><?php echo $u_name; ?></th>
					<th><?php echo $u_email; ?></th>
					<th><?php echo $u_pass; ?></th>
					<th><a href="del_user.php?id=<?php echo $u_id ?>">Delete</a></th>
					<th><a href="edit_user.php?id=<?php echo $u_id ?>">Edit</a></th>
				</tr>
				<?php } ?>
		</table>
</body>
</html>

