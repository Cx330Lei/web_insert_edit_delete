<!DOCTYPE html>    
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Posted content</title>
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
        <h2></h2>
        <table>
        <tr>
        <td>CfID</td>
        <td>Titile:</td>
        <td>Content</td>
        <td>Image:</td>
        <td>ID Poster:</td>
        <td>Edit</td>
        <td>Delete</td>
        </tr>
                <?php
                    include 'config.php';
                    session_start();
                    if((isset($_SESSION['email']) == NULL) || is_user())
                    {
                        header("location:index.php");
                        exit();
                    }
                    $sql="select * from confirm";
                    $query=mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td><p>".$row['cfid']."</p></td>";
                    echo "<td><h2>".$row['cftitle']."</h2></td>";
                    echo '<td><a href="content_posted.php?cfid='.$row['cfid'].'">Content</a></td>';
                    echo "<td><img src='photo/".$row['image']."'height=100></td>";
                    echo "<td><p>".$row['id']."</p></td>";
                    echo '<td><a href="posted_edit.php?cfid='.$row['cfid'].'">Edit</a></td> | <td><a href="posted_delete.php?cfid='.$row['cfid'].'">Delete</a></td>';
                    echo "</tr>";                                                                                                                                         
                    }
                ?>
        </table>
</body>
</html>
