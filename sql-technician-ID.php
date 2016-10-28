<?php
  include('connect.php');
$id=$_SESSION['idname'];
  if($_SESSION['userType']=='user'){
    $sql = "SELECT * FROM admin WHERE admin_id = \"$id\"";

  }
  else {
    $sql = "SELECT * FROM admin ";

  }
  $rs = mysqli_query($link, $sql);
  //$data = mysqli_fetch_array($rs);
  echo "<option value='0'>
  กรุณาเลือกช่าง
  </option>";
  while ($data = mysqli_fetch_array($rs)) {
    echo "<option value='{$data['admin_id']}'>
    {$data['admin_fname']}  {$data['admin_lname']}
    </option>";
  }
 ?>
