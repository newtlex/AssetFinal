<?php

session_start(); ?>

<?php

  include('connect.php');

  $id = $_SESSION["idname"];



  //echo "{$_GET['id']}";

  //echo "<h2>{$_SESSION["idname"]}</h2>";

  $sql = "SELECT * FROM admin WHERE admin_id = $id";
  $rs = mysqli_query($link, $sql);
  //$data = mysqli_fetch_array($rs);

  //echo "{$data['admin_id']}";
 ?>


 <style media="screen">
   .mh{
     background-color: #f5f5dc;
     color: #fe6f5e;
   }
 </style>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="main.php?page=view-main.php">Manage Asset</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php?page=view-main.php">จัดการอุปกรณ์</a></li>
      <li><a href="main.php?page=view-show-maintain.php">แจ้งซ่อม</a></li>
      <li><a href="main.php?page=view-report.php">Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="main.php?page=view-admin.php">Edit User</a></li>
      <li><a href="main.php?page=view-edit-profile.php&id=<?php echo "{$_SESSION['idname']}"; ?>"><span class="glyphicon glyphicon-user"></span> คุณ: <?php echo "{$_SESSION["fname"]} {$_SESSION["lname"]}"; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
