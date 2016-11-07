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
      <a class="active navbar-brand" href="main.php?page=view-main.php"><span class="glyphicons glyphicons-router"></span>Manage Asset</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="main.php?page=view-main.php"><span class="glyphicon glyphicon-list"></span> จัดการอุปกรณ์</a></li>
      <li><a href="main.php?page=view-show-maintain.php"><span class="glyphicon glyphicon-list-alt"></span> ตารางซ่อม</a></li>
      <?php if ($_SESSION["userType"] == 'admin') { ?>
        <li><a href="main.php?page=view-report.php"><span class="glyphicon glyphicon-print"></span> รายงาน</a></li>
    <?php } ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if ($_SESSION["userType"] == 'admin') { ?>
      <li><a href="main.php?page=view-admin.php"><span class="glyphicon glyphicon-cog"></span> จัดการระบบ</a></li>
      <?php } ?>    
      <li><a href="main.php?page=view-edit-profile.php&id=<?php echo "{$_SESSION['idname']}"; ?>"><span class="glyphicon glyphicon-user"></span> คุณ: <?php echo "{$_SESSION["fname"]} {$_SESSION["lname"]}"; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
