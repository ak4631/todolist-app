<?php
session_start();
require "../includes/database_connect.php";

$task_title=$_POST['task_title'];
$task_date=$_POST['task_date'];
$task_desc=$_POST['task_desc'];
$task_user_id=$_SESSION['id'];


$sql = "insert into tasks_table (task_title,task_date,task_desc,task_user_id) values ('$task_title','$task_date','$task_desc','$task_user_id')";

$result=mysqli_query($conn,$sql);

if(!$result){
    echo "Error: "+ mysqli_error($conn);
    exit;
}

echo "<script>window.open('prac.php','_self');</script>";

?>