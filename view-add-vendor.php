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
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><b>เพิ่มผู้ลิต</b></h3>
        </div>
        <div class="panel-body">
          <form action="sql-add-vendor.php" method="post">
            <div class="form-group">
              <label for="vendorName">ชื่อบริษัท</label>
              <input class="form-control" type="text" name="vendorName"
               value="<?php echo "{$data['vendorName']}"; ?>">
            </div>

            <div class="form-group">
              <label for="ContactName">ชื่อผู้ติดต่อ</label>
              <input class="form-control" type="text" name="ContactName"
              value="<?php echo "{$data['ContactName']}"; ?>">
            </div>

            <div class="form-group">
              <label for="vendorPhone">เบอร์โทร</label>
              <input class="form-control" type="text" name="vendorPhone"
              value="<?php echo "{$data['vendorPhone']}"; ?>">
            </div>

            <div class="form-group">
              <label for="vendorAddress">ที่อยู่</label>
              <input class="form-control" type="text" name="vendorAddress"
              value="<?php echo "{$data['vendorAddress']}"; ?>">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">ตกลง</button>
            <button class="btn btn-primary" type="submit" onclick="goBack()">ยกเลิก</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
