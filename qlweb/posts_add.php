<?php
    include 'config.php';
    session_start();
    if((isset($_SESSION['email']) == NULL))
    {
      header("location:index.php");
      exit();
    }
    $em = $_SESSION['email'];
    $s="select * from infusers where email='".$em."'";
    $q=mysqli_query($conn,$s);
    $r=mysqli_fetch_array($q);
    $id = $r['id'];
    $role = $r['role'];
    if($role == '1')
    {
      $url = "account_admin.php";
      $sql="select * from confirm";
    }
    else
    {
      $url = "account_user.php";
      $sql="select * from posts";
    }
    $query=mysqli_query($conn,$sql);
    if (isset($_POST['submit'])) {
        $postid=$_GET['postid'];
        $title = $_POST['title'];
        $content = $_POST['content'];
    
        $image = $_FILES['image']['name'];
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
        $expensions= array("jpeg","jpg","png");
    
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }
    
        if($file_size > 2097152) {
            $errors[]='Kích thước file không được lớn hơn 2MB';
        }
        while($row=mysqli_fetch_array($query))
        {
            if($content === $row['content'])
            {
                echo "This content already exists!";
                exit();
            }
        }
        if($role == '1')
        {
            $a = "INSERT INTO `confirm` (`cftitle`,`cfcontent`,`cfimage`, `id`) VALUES ('$title','$content','$image','$id')";
        }
        else
        {
            $a = "INSERT INTO `posts` (`title`,`content`,`image`, `id`) VALUES ('$title','$content','$image','$id')";
        }
        $b = mysqli_query($conn, $a);
        if(!$b || empty($errors)==false)
        {
            echo "Add post error!";
        }else
        {
            echo "Add post success!";
        }
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
<div><a href= " <?php echo $url; ?>">Return Dashboard</a></div>
        <br>
<form action="posts_add.php" enctype="multipart/form-data" method="post" class="form">
        <table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr>
    <td width="230">Title</td>
    <td><textarea name="title" id="title" class="tinymce" rows="2" cols="80"></textarea></td>
 </tr>
    <tr>
    <td>Content </td>
    <td><textarea name="content" id="content" placeholder="Enter content..." class="tinymce" rows="30" cols="80"></textarea></td>
  </tr>
  <tr>
    <td>Image</td>
    <td><input type="hidden" name="size" value="1000000">
        <input type="file" name="image" class="image"><br/><br/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="submit" value="Post"/></td>
  </tr>
    </body>
    </html>
