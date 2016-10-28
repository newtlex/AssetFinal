<?php

if ($_POST) {
  include('connect.php');

  $id = $_POST['ID'];
  echo "{$id}";

  $vendorName = $_POST['vendorname'];
  $ContactName = $_POST['ContactName'];
  $vendorPhone = $_POST['vendorPhone'];
  $vendorAddress = $_POST['vendorAddress'];


  if($id == null){

    $sql = "INSERT INTO vendor_table VALUES('','$vendorName','$ContactName','$vendorPhone','$vendorAddress')";
       mysqli_query($link, $sql);
      echo "<script>alert('เพิ่มข้อมูล $vendorName เรียบร้อย');
        window.history.back();
      </script>";
    }
  else {
    $sql = "UPDATE asset_table SET assetName='$assetName',assetDate='$assetDate',assetPrice='$assetPrice',
    assetExpire='$assetExpire',assetType='$assetType',assetStatus='$assetStatus',assetVendor='$assetVendor' WHERE (assetID = $id)";

    echo "<script>alert('แก้ไขข้อมูล $vendorName เรียนร้อย');
      window.location.href = 'main.php';
    </script>";
  }





}

 ?>
