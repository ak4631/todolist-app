<?php

session_start();
require "includes/database_connect.php";

$email=$_POST['email'];
$password=$_POST['password'];

$sql="select * from userdata where email='$email' and password1='$password'";

$result=mysqli_query($conn,$sql);

if(!$result){
    echo "Error: "+mysqli_error($conn);
    exit;
}

$row=mysqli_fetch_assoc($result);



if($row){
    $_SESSION['id']=$row['user_id'];
    $_SESSION['name']=$row['fname'];
    // echo "Login Successfull".$_SESSION['id'];
    echo "<script>window.open('ToDO/prac.php','_self');</script>";
}
else{
    echo "<script>alert('Invalid Mail or Password Please Check');</script>";
    echo "<script>window.open('login.html','_self');</script>";
}

?>