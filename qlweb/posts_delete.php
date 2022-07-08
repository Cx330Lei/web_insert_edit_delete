<?php
    include 'config.php';
    session_start();
    $id = $_GET['postid'];
    $sql = "DELETE FROM `posts` WHERE postid='$id'";
    $query = mysqli_query($conn, $sql);
    header("location:confirm_posts.php");
    exit();
?>

