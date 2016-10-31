<?php
  session_start();

  include('head.php');
  if(!($_SESSION['status']))
  {
    echo "<script>
    setTimeout(function(){
      window.location.href = 'view-login.php';
    },1);
    </script>";
  }
  include('connect.php');

  $id = $_GET['id'];

 if(isset($id)){
  $sql = "SELECT * FROM admin WHERE admin_id = $id";
  $rs = mysqli_query($link, $sql);
  $data = mysqli_fetch_array($rs);
}

 ?>


<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><b>แก้ไขข้อมูลส่วนตัว</b></h3>
        </div>
        <div class="panel-body">
          <form action="sql-edit-user.php" method="post">
            <div class="form-group">
              <label for="ID">User ID</label>
              <input class="form-control" type="text" name="ID" value="<?php echo "{$data['admin_id']}"; ?>" readonly >
            </div>
            <div class="form-group">
              <label for="fname">ชื่อ</label>
              <input class="form-control" type="text" name="fname" value="<?php echo "{$data['admin_fname']}"; ?>">
            </div>
            <div class="form-group">
              <label for="lname">นามสกุล</label>
              <input class="form-control" type="text" name="lname" value="<?php echo "{$data['admin_lname']}"; ?>">
            </div>
            <div class="form-group">
              <label for="email">อีเมล</label>
              <input class="form-control" type="email" name="email" value="<?php echo "{$data['admin_email']}"; ?>">
            </div>


            <div class="form-group">
              <label >พาสเวิร์ดใหม่</label>
              <input class="form-control" type="password" id="txtNewPassword" name="NewPassword">
            </div>

            <div class="form-group">
              <label   >ยืนยันพาสเวิร์ด</label>
              <input class="form-control" id="txtConfirmPassword" type="password" name="confirmPassword">
            </div>
            <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
            <div class="form-group">
              <label for="tel">เบอร์โทรศัพท์</label>
              <input class="form-control" type="tel" name="tel" value="<?php echo "{$data['admin_tel']}"; ?>">
            </div>
            <div class="form-group">
              <label for="address">ที่อยู่</label>
              <input class="form-control" type="text" name="address" value="<?php echo "{$data['admin_address']}"; ?>">
            </div>

            <?php  if($_SESSION["userType"]=='admin') { ?>
            <div class="form-group">
              <label for="userType">userType</label></label>
              <select class="form-control" name="userType" value="<?php echo "{$data['userType']}"; ?>">

                <option value="admin">admin</option>
                <option value="user">user</option>
              </select>
            </div>
            <?php } ?>
            <button  id="btnSummit" type="button" class="btn btn-primary">ตกลง</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript" src="js/script.js">

</script>
