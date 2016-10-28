<?php

  include('connect.php');

  if ($_POST) {
    include('connect.php');

    $job = $_POST['job'];
    $loginID = $_POST['loginID'];

    $asid = $_POST['asid'];
    $userid = $_POST['userid'];
    $detail = $_POST['detail'];
    $mtStatus = $_POST['status'];
    $maintainDate = $_POST['maintainDate'];
    $vendor = $_POST['vendorName'];
    $contactName = $_POST['contactName'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];

   echo "vendor $vendor";
  echo "loginID $loginID";

    $id = $_GET['id'];
    echo "$id";

    if (is_null($id)) {
      $sql = "INSERT INTO maintainasset_table VALUES('','$asid','$loginID','$job','$maintainDate',
        '$detail','$mtStatus','$vendor','$contactName','$tel','$address')";
      mysqli_query($link, $sql);

      echo "<script>alert('เพิ่มงานเรียบร้อย');
          window.location.href = 'main.php?page=view-showmaintain.php';
        </script>";
    }

  }

 ?>
