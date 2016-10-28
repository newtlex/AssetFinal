<?php

  include('connect.php');

  if ($_POST) {
  $loginID = $_POST['loginID'];
  $maintainId = $_POST['maintainId'];
  $asid = $_POST['asid'];
  $updateDate = $_POST['updateDate'];
   $updateDetail = $_POST['updateDetail'];
   $fixDetail = $_POST['fixDetail'];
   $updateStatus = $_POST['updateStatus'];
   $updateUserID = $_POST['updateUserID'];


   echo "maintainId $maintainId <br>";
   echo "asid $asid <br>";
   echo "updateDate $updateDate<br>";
   echo "updateDetail $updateDetail <br>";
   echo "fixDetail $fixDetail <br>";
   echo "updateStatus  $updateStatus<br>";
   echo "updateUserID $updateUserID <br>";




  $sql = "INSERT INTO maintaindetail
          (maintainAsset_ID,updateDetail,updateDate,updateUserID,fixDetail)
          VALUES ('$maintainId','$updateDetail','$updateDate','$updateUserID','$fixDetail')";
    mysqli_query($link, $sql);

     $sql2 = "UPDATE maintainasset_table
              SET maintainStatus ='$updateStatus'
              WHERE MaintainID = '$maintainId'";
      mysqli_query($link, $sql2);

        echo "<script>alert('อัพเดทงานเรียบร้อย');
          window.history.back();
        </script>";*/


  }

 ?>
