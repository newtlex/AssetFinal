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
</style>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-info" id="top1">
        <div class="panel-heading"><h1 style="color: #004040">Login</h1></div>
        <div class="panel-body">
          <form class="form-group" action="check-login.php" method="post">
            <div class="form-group">
              <label for="email-login">Email address</label>
              <input type="email" class="form-control" placeholder="Email" name="email-login">
            </div>
            <div class="form-group">
              <label for="password-login">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password-login">
            </div>
            <div class="form-group" id="button1">
              <a href="view-signup.php">สมัครมาชิก</a>
              <button class="btn btn-default" type="submit" name="submit">เข้าสู่ระบบ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
