<?php
  include('connect.php');

  $sql = "SELECT * FROM admin";
  $rs = mysqli_query($link, $sql);
  //$data = mysqli_fetch_array($rs);


  while ($data = mysqli_fetch_array($rs)) {
    echo "<option value='{$data['admin_id']}'>
    {$data['admin_fname']} {$data['admin_lname']}
    </option>";
  }

 ?>
