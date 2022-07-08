<?php
    include 'config.php';
    session_start();
    $id = $_GET['postid'];
    $sql="select * from posts where postid='".$id."'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
    echo "<div>";
    echo "<h2>Content</h2>";
    echo "<p>".$row['content']."</p>";
    echo "</div>";
?>

