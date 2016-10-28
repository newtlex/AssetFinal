<?php
 $link = @mysqli_connect("localhost","root","","asset2")
  or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้");

  mysqli_set_charset($link,"utf8");
 ?>
