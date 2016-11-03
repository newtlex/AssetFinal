<style media="screen">
  div{
    margin-top: 20px;
  }
  dd{
    font-size: 20px;
    color: black;
  }
  dt{
    font-size: 20px;
  }
</style>

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



  if (password_verify($pws, $data['admin_password'])) { ?>
      <?php include('head.php'); ?>

      <div class="row">
        <div class="col-md-5 col-md-offset-3">
          <h2><p class="text-center">ยินดีต้อนรับ</p></h2>
          <dl class="dl-horizontal">
            <dt>ตำแหน่ง:</dt>
            <dd><?php echo "{$data['userType']}"; ?></dd>
            <dt>ชื่อ - นามสกุล:</dt>
            <dd>คุณ<?php echo "{$data['admin_fname']} {$data['admin_lname']}"; ?></dd>
            <dt>E-mail</dt>
            <dd><?php echo "{$data['admin_email']}"; ?></dd>
            <dt>เบอร์โทรศัพท์</dt>
            <dd><?php echo "{$data['admin_tel']}"; ?></dd>
          </dl>
        </div>
      </div>
      <script type="text/javascript">
        setTimeout(function(){
          window.location.href = 'main.php';
        },2000);
      </script>

<?php  } else { ?>
  <?php include('head.php'); ?>
  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      <h2><p class="text-center">E-mail หรือ Password ไม่ถูกต้อง</p></h2>

    </div>
  </div>
  <script>
    setTimeout(function(){
      window.location.href = 'index.php';
    },1000);
  </script>

<?php }

}

 ?>
