<?php

  include('head.php');


 ?>

 <style>
   body{
     background-image: url(image/bg-main.jpg);
   }
   #signup{
     padding-top: 5px;
   }
 </style>

<div class="container">
  <div class="row" id="signup">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><b>สมัครสมาชิก</b></h3>
        </div>
        <div class="panel-body">
          <form action="signup-admin.php" method="post">
            <div class="form-group">
              <label for="fname">ชื่อ</label>
              <input class="form-control" type="text" name="fname" required>
            </div>
            <div class="form-group">
              <label for="lname">นามสกุล</label>
              <input class="form-control" type="text" name="lname" required>
            </div>
            <div class="form-group">
              <label for="email">อีเมล</label>
              <input class="form-control" type="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password1">พาสเวิร์ด</label>
              <input class="form-control" type="password" name="password1" required>
            </div>
            <div class="form-group">
              <label for="password2">พาสเวิร์ด อีกครั้ง</label>
              <input class="form-control" type="password" name="password2" required>
            </div>
            <div class="form-group">
              <label for="tel">เบอร์โทรศัพท์</label>
              <input class="form-control" type="tel" name="tel" required>
            </div>
            <div class="form-group">
              <label for="address">ที่อยู่</label>
              <input class="form-control" type="text" name="address" row="2" required>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">ตกลง</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
