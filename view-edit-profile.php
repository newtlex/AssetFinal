<style media="screen">
  h1{
    text-align: center;
  }
</style>

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
   <form class="form-horizontal" action="sql-edit-user.php" method="post">
     <div class="col-md-6 col-md-offset-3">
       <h1>แก้ไขข้อมูลส่วนตัว</h1>
       <hr>
       <div class="form-group">
         <label for="ID" class="col-md-4">User ID</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="ID" value="<?php echo "{$data['admin_id']}"; ?>" readonly >
         </div>
       </div>
       <div class="form-group">
         <label for="email" class="col-md-4">อีเมล</label>
         <div class="col-md-8">
           <input class="form-control" type="email" name="email" value="<?php echo "{$data['admin_email']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="fname" class="col-md-4">ชื่อ</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="fname" value="<?php echo "{$data['admin_fname']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="lname" class="col-md-4">นามสกุล</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="lname" value="<?php echo "{$data['admin_lname']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-4">พาสเวิร์ดใหม่</label>
         <div class="col-md-8">
           <input class="form-control" type="password" id="txtNewPassword" name="NewPassword">
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-4">ยืนยันพาสเวิร์ด</label>
         <div class="col-md-8">
           <input class="form-control" id="txtConfirmPassword" type="password" name="confirmPassword">
         </div>
       </div>
       <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
       <div class="form-group">
         <label for="tel" class="col-md-4">เบอร์โทรศัพท์</label>
         <div class="col-md-8">
           <input class="form-control" type="tel" name="tel" value="<?php echo "{$data['admin_tel']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="address" class="col-md-4">ที่อยู่</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="address" value="<?php echo "{$data['admin_address']}"; ?>">
         </div>
       </div>
       <?php  if($_SESSION["userType"]=='admin') { ?>
       <div class="form-group">
         <label for="userType" class="col-md-4">ตำแหน่ง</label></label>
         <div class="col-md-8">
           <select class="form-control" name="userType" value="<?php echo "{$data['userType']}"; ?>">
             <option value="admin">admin</option>
             <option value="user">user</option>
           </select>
         </div>
       </div>
       <?php } ?>
       <p class="text-right">
         <button class="btn btn-primary" type="submit" onclick="goBack()">ยกเลิก</button>
         <button  id="btnSummit" type="button" class="btn btn-primary">ตกลง</button>       
       </p>
     </div>
   </form>
 </div>

  <script type="text/javascript" src="js/script.js">

</script>
