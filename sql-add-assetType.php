<?php

if ($_POST) {
  include('connect.php');

  $id = $_POST['ID'];
  echo "{$id}";

  $typeName = $_POST['typeName'];
  $detail = $_POST['detail'];



  if($id == null){

    $sql = "INSERT INTO assettype_table VALUES('','$typeName','$detail')";
       mysqli_query($link, $sql);
      echo "<script>alert('เพิ่มข้อมูล $typeName เรียบร้อย');
        window.location.href = 'view-add-asset.php';
      </script>";
    }
  else {
    $sql = "UPDATE asset_table SET assetName='$assetName',assetDate='$assetDate',assetPrice='$assetPrice',
    assetExpire='$assetExpire',assetType='$assetType',assetStatus='$assetStatus',assetVendor='$assetVendor' WHERE (assetID = $id)";

    echo "<script>alert('แก้ไขข้อมูล $typeName เรียบร้อย');
      window.location.href = 'main.php';
    </script>";
  }





}

 ?>
