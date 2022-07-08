<?php
        include 'config.php';
        session_start();
        $postid = $_GET['postid'];
        $sql="select * from posts where postid='".$postid."'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
        $s = "select * from confirm";
        $q=mysqli_query($conn,$s);
        while($r=mysqli_fetch_array($q))
        {
            if($row[2] === $r['cfcontent'])
            {
                echo "This content is already taken!";
                exit();
            }
        }      
        $s = "INSERT INTO `confirm` (`cftitle`,`cfcontent`,`cfimage`, `id`) VALUES ('$row[1]','$row[2]','$row[3]',$row[4])"; 
        $b = mysqli_query($conn,$s);
        if(!$b)
        {
            echo "Post error!";
        }else
        {
            echo "Post success!";
        }
        header("location:confirm_posts.php");
    
?>
