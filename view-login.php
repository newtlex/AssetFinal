<?php
  include('head.php');
 ?>

<style>
  #button1{
    text-align: right;;
  }
  #top1{
    margin-top: 180px;
  }
  .btn-default{
    box-shadow: 1px 2px 5px #000000;
  }
  button:hover{
    background-color: red;
  }

</style>


<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-info" id="top1">
        <div class="panel-heading"><h1 style="color: #004040">Login</h1></div>
        <div class="panel-body">
          <form class="form-group" action="check-login.php" method="post">
            <div class="form-group">
              <label for="email-login">Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email-login">
            </div>
            <div class="form-group">
              <label for="password-login">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password-login">
            </div>
            <div class="form-group" id="button1">
              <a class="btn btn-default" data-toggle="modal" data-target="#signUp">สมัครมาชิก</a>
              <button class="btn btn-default" type="submit" name="submit">เข้าสู่ระบบ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">สมัครสมาชิก</h4>
      </div>
      <div class="modal-body">
        <form action="signup-admin.php" method="post">
          <div class="form-group">
            <label for="fname"><span class="glyphicon glyphicon-user"></span> ชื่อ</label>
            <input class="form-control" type="text" name="fname">
          </div>
          <div class="form-group">
            <label for="lname"><span class="glyphicon glyphicon-user"></span> นามสกุล</label>
            <input class="form-control" type="text" name="lname">
          </div>
          <div class="form-group">
            <label for="email"><span class="glyphicon glyphicon-envelope"></span> อีเมล</label>
            <input class="form-control" type="email" name="email">
          </div>
          <div class="form-group">
            <label for="password1"><span class="glyphicon glyphicon-lock"></span> พาสเวิร์ด</label>
            <input class="form-control" type="text" name="password1">
          </div>
          <div class="form-group">
            <label for="password2"><span class="glyphicon glyphicon-lock"></span> พาสเวิร์ด อีกครั้ง</label>
            <input class="form-control" type="text" name="password2">
          </div>
          <div class="form-group">
            <label for="tel"><span class="glyphicon glyphicon-earphone"></span> เบอร์โทรศัพท์</label>
            <input class="form-control" type="tel" name="tel">
          </div>
          <div class="form-group">
            <label for="address"><span class="glyphicon glyphicon-home"></span> ที่อยู่</label>
            <input class="form-control" type="text" name="address" row="2">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
          <button class="btn btn-default" type="submit" name="submit">ตกลง</button>
        </div>
      </form>
    </div>
  </div>
</div>
