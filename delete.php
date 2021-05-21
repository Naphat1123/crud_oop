<?php
    include_once('function.php');
    
    
    if (isset($_GET['id'])) {
        $userid = $_GET['id'];
        $delete_data  = new DB_con();
        $sql = $delete_data->delete_data($userid);

        if ($sql) {
            echo "<script>alert ('delete complete');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } 
    }



?>