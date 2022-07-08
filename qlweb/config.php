<?php
    $conn = mysqli_connect("localhost", "root", "Mysql309.", "db_qlweb");
    if(!$conn)
{
	echo "Ket noi loi";
}
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    function db_get_row($sql) {
        global $conn;
        $query = mysqli_query($conn, $sql);
        $row = array();
        if(mysqli_num_rows($query) > 0) {
          $row = mysqli_fetch_assoc($query);
        }
        return $row;
    }
   function is_user() {
        if(isset($_SESSION['email']) && !is_null($_SESSION['email']) && $_SESSION['role'] == '0') {
            return true;
        } 
        return false;
    }
    function is_admin() {
        if(isset($_SESSION['email']) && !is_null($_SESSION['email']) && $_SESSION['role'] == '1') {
            return true;
        }
        return false;
    }

?>
