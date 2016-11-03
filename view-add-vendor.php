<style media="screen">
  h2{
    text-align: center;
  }
</style>
<?php

  include('head.php');
  if(!($_SESSION['status']))
  {
    echo "<script>
    setTimeout(function(){
      window.location.href = 'view-login.php';
    },1);
    </script>";
  }
  $id = $_GET['id'];

 if(isset($id)){
  $sql = "SELECT * FROM vendor_table WHERE vendorID = $id";
  $rs = mysqli_query($link, $sql);
  $data = mysqli_fetch_array($rs);
}

 ?>




 <div class="container">
   <form class="form-horizontal" action="sql-add-vendor.php" method="post">
     <div class="col-md-6 col-md-offset-3">
       <h2>แก้ไขตัวแทนจำหน่าย</h2>
       <hr>
       <div class="form-group">
         <label class="col-md-4">ชื่อบริษัท</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="vendorName"
            value="<?php echo "{$data['vendorName']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-4">ชื่อผู้ติดต่อ</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="ContactName"
           value="<?php echo "{$data['ContactName']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-4">เบอร์โทร</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="vendorPhone"
           value="<?php echo "{$data['vendorPhone']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-4">ที่อยู่</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="vendorAddress"
           value="<?php echo "{$data['vendorAddress']}"; ?>">
         </div>
       </div>
       <div class="text-right">
         <button class="btn btn-primary" type="submit" onclick="goBack()">ยกเลิก</button>
         <button class="btn btn-primary" type="submit" name="submit">ตกลง</button>   
       </div>
     </div>
   </form>
 </div>
<script>
function goBack() {
    window.history.back();
}
</script>
