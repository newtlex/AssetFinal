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
    $admin = "admin";
    if (is_null($id)) {
      $sql = "INSERT INTO maintainasset_table VALUES('','$asid','$loginID','$job','$maintainDate',
        '$detail','$mtStatus','$vendor','$contactName','$tel','$address')";
      mysqli_query($link, $sql);
      $key = mysqli_insert_id($link);
      $admin = "admin";
      $sql = "SELECT * from admin where admin_id = '$loginID' or userType like '$admin'";
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
       $pickUpdate = date("Y-m-d");
       $url = "http://127.0.0.1/assetfinal/main.php?page=view-maintain-detial.php&id=$key";
       if($mtStatus==inProgress){
        $headMessage = "การแจ้งซ่อมอุปกรณ์ ID : $asid";
        $bodyMessage =
        "อีเมลล์ฉบับนี้ เป็นอีเมล์การแจ้งเตือน <br />
        เรื่องการแจ้ง $job อุปกรณ์ $asid  <br />
        มีอาการ $detail<br />
        ในวันที่ $maintainDate <br />
        โดยส่ง $job ที่  $vendor <br />
        ติดต่อผ่านคุณ $contactName <br />
        ที่อยู่ $address เบอร์โทรศัพท์ $tel<br />
       <a href=$url>Link</a>";
     }
       else {
         $headMessage = "การแจ้งรับอุปกรณ์ ID : $asid";
         $bodyMessage =
         "อีเมลล์ฉบับนี้ เป็นอีเมล์การแจ้งเตือนเรื่อง<br />
         การแจ้ง $job อุปกรณ์ $asid  มีอาการ $detail<br />
         ในวันที่ $maintainDate <br />
         ได้รับมีการซ่อมหรือเคลมกลับมาเรียบร้อยแล้ว ในวันที่ $pickUpdate

          <a href=$url>Link</a>";
       }
       include ('sendmail.php');
      echo "<script>alert('เพิ่มงานเรียบร้อย');
          window.location.href = 'main.php?page=view-showmaintain.php';
        </script>";
    }



  }

 ?>
