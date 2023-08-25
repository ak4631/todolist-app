<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Task</title>
    <link rel="stylesheet" href="update.css" />
  </head>
  <body>
    <?php 
        session_start();
        require "../includes/database_connect.php";

          $t_id=$_GET['update_task'];
          $sql="select task_cnt,task_title,task_date,task_desc from tasks_table where task_cnt=$t_id";
          $result=mysqli_query($conn,$sql);
          if(!$result){
            echo "Error: ".mysqli_error($conn);
            exit;
          }
          while($row=mysqli_fetch_assoc($result)){
          $p_id=$row['task_cnt'];
          $task_tt=$row['task_title'];
          $task_dd=$row['task_date'];
          $task_des=$row['task_desc'];
        
       ?>

    <div class="form-class">
      <form action="" method="post">
        <div class="heading">
          <h1>Update Task</h1>
        </div>
        <label for="input-text">Task Title</label>
        <input
          type="text"
          name="task_title"
          value="<?php echo $row['task_title'] ?>"
        />
        <div id="msg"></div>
        <label for="DD-Date">Due Date</label>
        <input
          type="date"
          name="task_date"
          value="<?php echo $row['task_date'] ?>"
        />
        <label for="Desc-data">Description</label>
        <textarea
          rows="10"
          cols="30"
          name="task_desc"
        ><?php echo $row['task_desc'] ?></textarea>
        <?php } ?>
        
        <input type="submit" value="Submit" name="update"/>
        <?php
        if(isset($_POST['update'])){
          $task_tt=$_POST['task_title'];
          $task_dd=$_POST['task_date'];
          $task_des=$_POST['task_desc'];

          $update_task="update tasks_table set task_title='$task_tt',task_date='$task_dd',task_desc='$task_des' where task_cnt='$p_id'";
          if(mysqli_query($conn,$update_task)){
            echo "<script>window.open('prac.php','_self');</script>";
          }
        }
        ?>
        <a href="prac.php" class="del" ><button type="button">Go Back</button></a>
      </form>
    </div>
  </body>
</html>
