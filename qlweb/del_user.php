<?php
    include 'config.php';
    session_start();
    $id = $_GET['id'];
    $sql="select * from infusers where id='".$id."'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
    if($row[1] == '1')
    {
	echo "<script>alert('Cannot delete admin !')</script>";
	header("location:manage_user.php");
	exit();
    }
    $sql = "DELETE FROM `infusers` WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	header("location:manage_user.php");
    exit();
?>
