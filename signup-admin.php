<?php

if ($_POST) {

  include('connect.php');

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $psw1 = $_POST['password1'];
  $psw2 = $_POST['password2'];
  $tel = $_POST['tel'];
  $address = $_POST['address'];


  $err = "";
	if($psw1 !== $psw2) {
		$err .= "<li>ใส่รหัสผ่านทั้งสองครั้งไม่ตรงกัน</li>";
	}

  $pwhash =password_hash( $psw1, PASSWORD_DEFAULT);

  if($err != "") {
		echo '<div>';
		echo '<h3>เกิดข้อผิดพลาดดังนี้คือ</h3>';
		echo "<ul>$err</ul>";
		echo '</div>';
    echo "<script>
      setTimeout(function(){
        window.location.href = 'view-signup.php';
      },3000);
    </script>";
	}

  else {

      $sql = "INSERT INTO admin VALUES(
            '', '$fname', '$lname', '$email', '$pwhash', '$tel', '$address','user')";
      mysqli_query($link, $sql);

      echo "<h2>สมัครสมาชิกเรียบร้อยแล้ว</h2>";
      echo "<li>
      ยินดีต้อนรับคุณ <script>document.write('$fname $lname');
      setTimeout(function(){
        window.location.href = 'index.php';
      },3000);
      </script>
      </li>";

  }

//echo "<script>alert('ยินดีต้อนรับ $fname $lname เข้าสู่ระบบ');window.location='index.php';</script>";
mysqli_close($link);
}





?>
