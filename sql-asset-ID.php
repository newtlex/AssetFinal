<?php
  include('connect.php');
  $sql = "SELECT * FROM asset_table";
  $rs = mysqli_query($link, $sql);
  //$data = mysqli_fetch_array($rs);
  echo "<option value='0'>
  กรุณาเลือก ID อุปกรณ์
  </option>";
  while ($data = mysqli_fetch_array($rs)) {
    echo "<option value='{$data['assetID']}'>{$data['assetID']}  {$data['assetName']}
    </option>";
  }
 ?>
