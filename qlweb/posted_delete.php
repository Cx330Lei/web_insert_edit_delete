<?php
    include 'config.php';
    session_start();
    $cfid = $_GET['cfid'];
    $em = $_SESSION['email'];

    $su="select * from infusers where email='".$em."'";
    $qu=mysqli_query($conn,$su);
    $ru=mysqli_fetch_array($qu);

    $role = $ru[1];
    $sql = "DELETE FROM `confirm` WHERE cfid='$cfid'";
    $query = mysqli_query($conn, $sql);
   
    if($role == 1)
    {
        header("location:manage_posted.php");
    }
    else
    {
        header("location:posts_user.php");
    }

?>
