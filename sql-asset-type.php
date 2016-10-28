<?php
  include('connect.php');

  $sql = "SELECT * FROM assettype_table";
  $rs = mysqli_query($link, $sql);
  //$data = mysqli_fetch_array($rs);

echo "<option value = '0' > ShowAll

</option>";
  while ($data = mysqli_fetch_array($rs)) {

    echo "<option value='{$data['IDType']}'>
    {$data['typeName']}
    </option>";
  }

 ?>
