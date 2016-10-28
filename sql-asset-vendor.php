<?php
  include('connect.php');

  $sql = "SELECT * FROM vendor_table";
  $rs = mysqli_query($link, $sql);
  //$data = mysqli_fetch_array($rs);


  while ($data = mysqli_fetch_array($rs)) {
    echo "<option value='{$data['vendorID']}'>
    {$data['vendorName']}
    </option>";
  }

 ?>
