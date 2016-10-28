<?php

session_start();

if ($_POST) {
  include('connect.php');

  $email = $_POST['email-login'];
  $pws = $_POST['password-login'];


  $sql = "SELECT * FROM admin WHERE admin_email = '$email'";

  $rs = mysqli_query($link, $sql);
  $data = mysqli_fetch_array($rs);
  $row = mysqli_num_rows($rs);

  $_SESSION["fname"] = $data['admin_fname'];
  $_SESSION["lname"] = $data['admin_lname'];
  $_SESSION["idname"] = $data['admin_id'];
  $_SESSION["userType"] = $data['userType'];
  $_SESSION["status"] = true;
  //$_GET['id'] = $data['admin_id'];
  $fname = $_SESSION["fname"];
  $lname = $_SESSION["lname"];
  $type = $_SESSION["userType"];



  if (password_verify($pws, $data['admin_password'])) {
    echo "<li>สวัสดีคุณ
    <script>document.write('$fname $lname $type');
    setTimeout(function(){
      window.location.href = 'main.php';
    },1);
    </script>
    </li>";
  } else {
      echo ("ท่านใส่ Email หรือ Password ไม่ถูกต้อง");
      echo "<script>
      setTimeout(function(){
        window.location.href = 'view-login.php';
      },1);
      </script>";
    }

}






 ?>
