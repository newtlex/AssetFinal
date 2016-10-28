<?php
session_start();
session_unset(); // remove all session variables
session_destroy(); // destroy the session

//ลบคุกกี้การเข้าสู่ระบบ
$expire = time() - 3600;
setcookie('email-login', '', $expire);
setcookie('password-login', '', $expire);

//ให้ใช้เฮดเดอร์ refresh เพื่อหน่วงเวลาให้
//PHP สามารถส่งข้อมูลกลับมายังเบราเซอร์ได้
header("refresh: 0; url=index.php");


?>
