<?php

//first connect to database
require "includes/database_connect.php";

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$number=$_POST['phoneno'];
$gender=$_POST['gender'];

$search_sql="select email from userdata where email='$email'";
$res=mysqli_query($conn,$search_sql);

    if(!$res){
        echo "Error is: "+ mysqli_error($conn);
        exit;
    }

$row_count=mysqli_num_rows($res);



if($row_count==0){

    $sql="insert into userdata (fname,lname,email,password1,number,gender) values ('$fname','$lname','$email','$password','$number','$gender')";

    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo "Error: "+ mysqli_error($conn);
        exit;
    }

    echo "<script>window.open('login.html','_self');</script>";
}
else{
    echo "<script>alert('This email already exists');</script>";
    echo "<script>window.open('sign-up.html','_self');</script>";
    exit;
    
}



mysqli_close($conn);
?>