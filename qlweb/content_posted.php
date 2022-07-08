<?php
    include 'config.php';
    session_start();
    $id = $_GET['cfid'];
    $sql="select * from confirm where cfid='".$id."'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
    echo "<div>";
    echo "<h2>".$row['cftitle']."</h2>";
    echo "<p>".$row['cfcontent']."</p>";
    echo "</div>";
?>
