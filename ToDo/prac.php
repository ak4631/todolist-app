<?php
      session_start();
        require "../includes/database_connect.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trial</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="main">
    <div class="form-class">
      <div class="header">
        <h1>Add New Task</h1>
      </div>
      <form action="tasksinsert.php" method="post">
        <label for="input-text">Task Title</label>
        <input type="text" name="task_title" />
        <div id="msg"></div>
        <label for="DD-Date">Due Date</label>
        <input type="date" name="task_date" />
        <label for="Desc-data">Description</label>
        <textarea rows="10" cols="30" name="task_desc"></textarea>
        <input type="submit" value="Submit" />
        <button class="del" type="button">Close</button>
      </form>
    </div>
    <!-- //connection check then session id ke liye data fetch ok -->
    <?php
        $user_id=$_SESSION['id'];
        $sql="select fname from userdata where user_id=$user_id";
        $result=mysqli_query($conn,$sql);
        if(!$result){
          echo "User Not found...";
          exit;
        }
        
        $row=mysqli_fetch_assoc($result);

    ?>
    <div class="heading">
      <div class="hname">
        <h1>Hi,<br>
          <?php echo $row['fname'] ?>
        </h1>
      </div>
      <div class="exit">
        <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-lg" style="color: #00040a;"></i></a>
      </div>
    </div>
    <div class="All-tasks">
      <div class="add-tasks">
        <h2>Add New Task<h2>
            <p class="trigger"><a class="btn-open" href="#"><i class="fa-solid fa-plus fa-bounce fa-lg" style="color: #1aa210;"></i></a></p>
      </div>
      <?php
        
        $user_id=$_SESSION['id'];
        $sql="select task_cnt,task_title,task_date,task_desc from tasks_table where task_user_id=$user_id";
        $result=mysqli_query($conn,$sql);

        if(!$result){
            echo "Error: ".mysqli_error($conn);
            exit;
        }
        while($row=mysqli_fetch_assoc($result)){
          $p_id=$row['task_cnt'];
        ?>
      <div class="box">
        <div class="tname">
          <h1 class="task-title">
            <?php echo $row['task_title'] ?>
          </h1>
          <span>
            <?php echo $row["task_date"] ?>
          </span>
        </div>
        <div>
          <a href="update_form.php?update_task=<?php echo $p_id ?>" class="update"><i class="fa-solid fa-pen-to-square fa-bounce" style="color: #00ffaa;"></i></a>
          <a href="del_task.php?del_task=<?php echo $p_id ?>" class="dele"><i class="fa-solid fa-trash-can fa-lg" style="color: #fa0000;"></i></a>
        </div>
        <p>
          <?php echo $row["task_desc"] ?>
        </p>
      </div>
      <?php
    }
    ?>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>