<?php
        include_once 'connect.php';
       
        $id =$_GET['id'];
        $select=mysqli_query($conn,"DELETE FROM collection WHERE id = $id");
        header('Location:index.php');
       
?>