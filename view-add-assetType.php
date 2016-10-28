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
  include('connect.php');

  $id = $_GET['id'];

 if(isset($id)){
  $sql = "SELECT * FROM assettype_table WHERE IDType = $id";
  $rs = mysqli_query($link, $sql);
  $data = mysqli_fetch_array($rs);
}

 ?>



<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><b>เพิ่มชนิดอุปกรณ์</b></h3>
        </div>
        <div class="panel-body">
          <form action="sql-add-assettype.php" method="post">
            <div class="form-group">
              <label for="typeName">ชนิดอุปกรณ์</label>
              <input class="form-control" type="text" name="typeName" value="<?php echo "{$data['typeName']}"; ?>">
            </div>

            <div class="form-group">
              <label for="detail">รายละเอียด</label>
              <input class="form-control" type="text" name="detail" value="<?php echo "{$data['detail']}"; ?>">
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
