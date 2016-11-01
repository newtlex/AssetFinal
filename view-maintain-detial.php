<style media="screen">
  h1{
    padding-left: 540px;
  }
</style>
<h1>อัพเดทงาน</h1>
<br>

<?php

  include('head.php');


    include('connect.php');

    $id = $_GET['id'];


    //echo "{$_GET['id']}";

    //echo "<h2>{$_SESSION['asid']}</h2>";

    $sql = "SELECT * FROM maintainasset_table WHERE MaintainID = $id";
    $rs = mysqli_query($link, $sql);
    $data = mysqli_fetch_array($rs);

    $sql = "SELECT * FROM asset_table WHERE assetID = {$data['assetID']}";
    $rs = mysqli_query($link, $sql);
    $dataAsset = mysqli_fetch_array($rs);

    $sql = "SELECT * FROM admin WHERE admin_id = {$data['maintainUserID']}";
    $rs = mysqli_query($link, $sql);
    $dataAdmin = mysqli_fetch_array($rs);





 ?>


   <form class="form-horizontal" action="sql-add-maintainDetail.php" method="post">
     <div class="col-md-4 col-md-offset-1">
       <div class="form-group">
         <label for="maintainId" class="col-md-4">เลขที่งานซ่อม</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="maintainId" value="<?php echo "{$data['MaintainID']}"; ?>" readonly>
         </div>
       </div>
       <div class="form-group">
         <label for="asid" class="col-md-4">รหัส และ ชื่ออุปกรณ์</label>
         <div class="col-md-8">
           <input class="form-control" type="text" value="<?php echo "{$dataAsset['assetID']} {$dataAsset['assetName']}"; ?>" readonly>
           <input type="hidden" name="asid" value="<?php echo "{$data['assetID']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="userid" class="col-md-4">ผู้แจ้ง</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="userid" value="<?php echo "{$dataAdmin['admin_fname']} {$dataAdmin['admin_lname'] }"; ?>" readonly>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-4" for="updateDate">วันที่อัพเดท</label>
         <div class="col-md-8">
           <input class="form-control input-sm" type="date" name="updateDate"
           value="<?php echo date("Y-m-d"); ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="updateDetail" class="col-md-4">อาการ</label>
         <div class="col-md-8">
           <input class="form-control" type="text" name="updateDetail" value="<?php echo "{$data['MaintainDetail']}"; ?>">
         </div>
       </div>
       <div class="form-group">
         <label for="fixDetail" class="col-md-4">การดำเนินงานแก้ไข</label>
         <div class="col-md-8">
           <textarea class="form-control" name="fixDetail" rows="4"></textarea>
         </div>
       </div>
       <?php

       if ($data['maintainStatus'] == "inProgress") { ?>
         <div class="form-group">
           <label for="updateStatus" class="col-md-4">อัพเดทสถานะ</label>
           <div class="col-md-8">
             <select class="form-control" name="updateStatus">
               <?php

               echo "<option value='Inprogress' selected>inProgress</option>";
               echo "<option value='Completed'>Completed</option>";

               ?>
             </select>
           </div>
         </div>
      <?php } ?>
      <div class="form-group">
        <label for="Mdetail" class="col-md-4">ผู้คนอัพเดท</label>
        <div class="col-md-8">
          <input class="form-control" type="text" value="<?php echo "{$_SESSION["fname"]} {$_SESSION["lname"]}"; ?>" readonly>
          <input type="hidden" name="updateUserID" value="<?php echo "{$_SESSION["idname"]}"; ?>">
        </div>
      </div>
       <p class="text-right">
         <button class="btn btn-success" type="submit" name="submit">เพิ่ม</button>
       </p>
     </div>
     <div class="col-md-5 col-md-offset-1">
       <table class="table table-hover">
         <thead>
           <th>
             ลำดับ
           </th>
           <th>
             รหัสงานซ่อม
           </th>
           <th>
              วันที่เพิ่ม
           </th>
           <th>
              อาการ
           </th>
           <th>
              การแก้ไข
           </th>
           <th>
              ผู้แจ้ง
           </th>
         </thead>
         <tbody>
           <?php include('list-maintain-datail.php'); ?>
         </tbody>
       </table>

     </div>
   </form>
