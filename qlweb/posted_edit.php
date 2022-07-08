<?php
        include 'config.php';
        session_start();
	if((isset($_SESSION['email']) == NULL))
        {
            header("location:index.php");
            exit();
        }
        $cfid = $_GET['cfid'];
        $sql="select * from confirm where cfid='".$cfid."'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);

        if(isset($_POST['edit']))
        {
            $t=$_POST['cftitle'];
            $c=$_POST['cfcontent'];
            $image = $_FILES['image']['name'];
            
            $s="update confirm set cftitle='".$t."', cfcontent='".$c."', cfimage='".$image."' where cfid='".$cfid."'";
            $b = mysqli_query($conn,$s);
            if(!$b)
            {
                echo "Edit post error!";
            }else
            {
                echo "Edit post success!";
            }
            header("location:manage_posted.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
<title>Add post</title>
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
<form action="" enctype="multipart/form-data" method="post" class="form">
        <table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td width="230">Title</td>
    <td><textarea name="cftitle" id="cftitle" class="tinymce" rows="2" cols="80" value="<?=$row['cftitle']?>" /></textarea></td>
  </tr>
    <tr>
    <td>Content </td>
    <td><textarea name="cfcontent" id="cfcontent" class="tinymce" rows="30" cols="80" value="<?=$row['cfcontent']?>" /></textarea></td>
  </tr>
  <tr>
    <td>Image</td>
    <td><input type="hidden" name="size" value="1000000">
        <input type="file" name="image" class="image" value="<?=$row['cfimage']?>" /><br/><br/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="edit" value="Edit post"/></td>
  </tr>
