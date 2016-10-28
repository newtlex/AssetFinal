<?php
  include('connect.php');

  $sql = "SELECT * FROM status_table";
  $rs = mysqli_query($link, $sql);
  //$data = mysqli_fetch_array($rs);


  while ($data = mysqli_fetch_array($rs)) {
    echo "<option value='{$data['statusID']}'>
    {$data['statusName']}
    </option>";
  }

 ?>
