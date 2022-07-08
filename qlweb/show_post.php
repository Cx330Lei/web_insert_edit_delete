<?php
    include 'config.php';
    session_start();
    if((isset($_SESSION['email']) == NULL))
    {
        header("location:index.php");
        exit();
    }
    $em = $_SESSION['email'];
    $su="select * from infusers where email='".$em."'";
    $qu=mysqli_query($conn,$su);
    $ru=mysqli_fetch_array($qu);
    $role = $ru['role'];
    if($role == '1')
    {
        $url = "account_admin.php";
    }
    else
    {
        $url = "account_user.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show posts</title>
</head>
<body>
<div><a href= "<?php echo $url; ?>">Return Dashboard</a></div>
        <br>
                <h3>Post search</h3>
                <form method="post">
                    Enter title:<input type="text" name ="title">
                    <br><br>
                    <button name="search" class="btn">Search</button>
            
                </form>
                <?php
                    $str = $_POST['title'];
                    $s="select * from confirm where cftitle like '%$str%'";
                    $q=mysqli_query($conn,$s);
    
                    if(isset($_POST['search']))
                    {
                        if(mysqli_num_rows($q) === 0)
                        {
                            echo "No posts found  ";
                            echo $str;
                            exit();
                        }
                        while($r=mysqli_fetch_array($q))
                        {
                            echo "<td><h2>$r[1]</h2></td>";
                            echo "<br>";
                            echo "<td><img src='photo/$r[3]'height=150></td>";
                            echo "<br>";
                            echo '<td><a href="content_posted.php?cfid='.$r['cfid'].'">Content</a></td>';
                            echo "<br>";   
                        }
                    }
                ?>
                <br><br>
                <h3>All posts</h3>
                <?php
  
                    $sql="select * from confirm";
                    $query=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_array($query)) {
                    echo "<td><h2>$row[1]</h2></td>";
                    echo "<br>";
                    echo "<td><img src='photo/$row[3]'height=150></td>";
                    echo "<br>";
                    echo '<td><a href="content_posted.php?cfid='.$row['cfid'].'">Content</a></td>';
                    echo "<br>";                                                                                                                
                    }
                ?>
</body>
</html>

