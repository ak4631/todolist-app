<?php
    session_start();
    require "../includes/database_connect.php";

   if(isset($_GET['del_task'])){
    $t_id=$_GET['del_task'];
    $sql="delete from tasks_table where task_cnt=$t_id";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Task has been deleted....');</script>";
        echo "<script>window.open('prac.php','_self');</script>";
        echo "Hello World";
    }
   }


?>