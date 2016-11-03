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
 if($updateStatus=='Completed'){
  $sql = "SELECT * from owner where $asid = assetID and enddate = \"0000-00-00\"";
  mysqli_query($link, $sql);
  $owner = $data['adminID'];
  $admin = "admin";
  $sql = "SELECT * from admin where admin_id = '$owner' or userType like '$admin'";
  $rs =   mysqli_query($link, $sql);

  $email = '';
  $recipients = array();
  while($data = mysqli_fetch_array($rs)){
     //echo "{$data['admin_email']} <br />";
     $email = $data['admin_email'] ;
     $lname = $data['admin_lname'];
     $name = $data['admin_fname'];
     $fullName = "$name $lname";
     $recipients[$email] = $fullName;

   }
   $url = "http://127.0.0.1/assetfinal/main.php?page=view-maintain-detial.php&id=$maintainId";
   $headMessage = "การแจ้งรับอุปกรณ์ ID : $asid";
   $bodyMessage =
     "อีเมลล์ฉบับนี้ เป็นอีเมล์การแจ้งเตือนเรื่อง<br />
     การแจ้ง $job อุปกรณ์ $asid  มีอาการ $detail<br />
     ในวันที่ $maintainDate <br />
     ได้รับมีการซ่อมหรือเคลมกลับมาเรียบร้อยแล้ว ในวันที่ $updateDate
   <a href=$url>Link</a>";
   include ('sendmail.php');
 }
  echo "<script>alert('อัพเดทงานเรียบร้อย');
          window.location.href = 'main.php?page=view-show-maintain.php';
        </script>";


  }

 ?>
