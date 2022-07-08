<!DOCTYPE html>    
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin manage posts</title>
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
        <br><br>
        <h2>Posts that need confirmation</h2>
        <table>
        <tr>
        <td>PostID</td>
        <td>Titile:</td>
        <td>Content</td>
        <td>Image:</td>
        <td>Poster:</td>
        <td>Edit</td>
        <td>Delete</td>
        <td>Post</td>
        </tr>
                <?php
                    include 'config.php';
                    session_start();
                    if((isset($_SESSION['email']) == NULL) || is_user())
                    {
                        header("location:index.php");
                        exit();
                    }
                    $sql="select * from posts";
                    $query=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_array($query)) {
                  
                    echo "<tr>";
                    echo "<td><p>".$row['postid']."</p></td>";
                    echo "<td><p>".$row['title']."</p></td>";
                    echo '<td><a href="content.php?postid='.$row['postid'].'">Content</a></td>';
                    echo "<td><img src='photo/".$row['image']."'height=100></td>"; 
                    echo "<td><p>".$row['id']."</p></td>";
                    echo '<td><a href="posts_edit.php?postid='.$row['postid'].'">Edit</a></td> | <td><a href="posts_delete.php?postid='.$row['postid'].'">Delete</a></td>';
                    echo '<td><a href="confirm.php?postid='.$row['postid'].'">Post</a></td>';
                    echo "</tr>";
                                                                                                                                                               
                    }
                ?>
	</table>
</body>
</html>
