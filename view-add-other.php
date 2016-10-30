<style media="screen">
  h1{
    padding-left: 125px;
  }
</style>
<?php
include ("connect.php");
$id = $_GET['id'];

if(isset($id)){
$sql = "SELECT * from  image_table WHERE asset_ID = $id" ;
$rs = mysqli_query($link, $sql);
$data = mysqli_fetch_array($rs);

$imageName = $data['ImageName'];

$sql2 = "SELECT * from  asset_table WHERE assetID = $id" ;
$rs2 = mysqli_query($link, $sql2);
$data2 = mysqli_fetch_array($rs2);

}
else {
$imageName = "blankImage.png";
}
?>
<h1>Accessory</h1>

<hr>
<div class="container">
  <form class="form-horizontal" action="sql-add-asset.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
      <div class="form-group">
        <label for="asname" class="col-md-4">ชื่ออุปกรณ์</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="asname" value="<?php echo "{$data2['assetName']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="typeAccesory" class="col-md-4">ชนิดของอุปกรณ์</label>
        <div class="col-md-7">
          <div class="input-group">
            <select class="form-control input-sm" name="typeAccesory">
              <option value="Mouse">Mouse</option>
              <option value="keyboard">keyboard</option>
              <option value="Speaker">Speaker</option>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#bttypeNetwork">&nbsp;เพิ่ม&nbsp;</button>
            </span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4" for="startdate">วันที่เพิ่มอุปกรณ์</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="date" name="startdate"
          value="<?php
          $time = strtotime($data2['assetDate']);
          $myFormatForView = date("Y-m-d", $time);
          // $myFormatForView is something like: 01/31/14 1:05 PM
           if(isset($id)){
             echo "$myFormatForView";
           }
           else
           {
             echo date("Y-m-d");
           }

          ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4" for="enddate">วันหมดประกัน</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="date" name="enddate" value="<?php echo "{$data2['assetExpire']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="vendor" class="col-md-4">ตัวแทนจำหน่าย</label>
        <div class="col-md-7">
          <div class="input-group">
            <select class="form-control input-sm" name="vendor">
              <?php

              $sql = "SELECT * FROM vendor_table";
              $rs = mysqli_query($link, $sql);
              while($datatype = mysqli_fetch_array($rs)){
                    if($data2['assetVendor']==$datatype['vendorID']){
                        echo "<option value=".$datatype['vendorID']." selected='selected'>".$datatype['vendorName']."</option>";
                    }else{
                        echo "<option value=".$datatype['vendorID'].">".$datatype['vendorName']."</option>";
                    }
              }

              ?>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#btvendor">&nbsp;เพิ่ม&nbsp;</button>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="sn" class="col-md-4">S/N</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="sn" placeholder="xxx.xxxx.xxxxx" value="<?php echo "{$data2['assetSN']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="detail" class="col-md-4">รายละเอียด</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="detail" value="<?php echo "{$data7['detail']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-md-4">ผู้ใช้</label>
        <div class="col-md-7">
          <select class="form-control input-sm" name="newOwner">

              <?php
              $sql = "SELECT * FROM `owner` WHERE `startDate` = (SELECT MAX(`startDate`)
                                           from owner
                                           where `assetID`= '$id')";
              $rs = mysqli_query($link, $sql);
              if($rs!=null){
                    $dataOwner = mysqli_fetch_array($rs);

              }


              $sql = "SELECT * FROM admin";
              $rs = mysqli_query($link, $sql);
              while($dataAdmin = mysqli_fetch_array($rs)){
                    if($dataAdmin['admin_id']==$dataOwner['adminID']){
                        echo "<option value=".$dataAdmin['admin_id']." selected='selected'>".$dataAdmin['admin_fname']."</option>";
                    }else if ($dataOwner['adminID']==null){
                        echo "<option value="."0"." selected='selected'>"."เลือกผู้ใช้"."</option>";
                        $dataOwner['adminID'] ="0";
                    }

                    else{
                        echo "<option value=".$dataAdmin['admin_id'].">".$dataAdmin['admin_fname']."</option>";
                    }
              }

              ?>
          </select>

          <input type="hidden" name="Oldowner" value="<?php echo "{$dataOwner['ownerID']}"; ?>">
        </div>
      </div>


    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="status" class="col-md-4">สถานะ</label>
        <div class="col-md-7">
          <select class="form-control input-sm" name="status">
            <?php

            $sql = "SELECT * FROM status_table";
            $rs = mysqli_query($link, $sql);
            while($datatype = mysqli_fetch_array($rs)){
                  if($data2['assetStatus']==$datatype['statusID']){
                      echo "<option value=".$datatype['statusID']." selected='selected'>".$datatype['statusName']."</option>";
                  }else{
                      echo "<option value=".$datatype['statusID'].">".$datatype['statusName']."</option>";
                  }
            }

            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="price" class="col-md-4">ราคา</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="price" value="<?php echo "{$data2['assetPrice']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4">รูปภาพ</label>
        <div class="col-md-7">
          <label class="btn btn-success btn-file">
              Upload Image <input id="fileUpload" type="file" name="file" style="display: none;" >
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-5 col-md-offset-4" id="image-holder">
          <a href = "imageAsset/<?php echo "{$imageName}"; ?>"><img src="imageAsset/<?php echo "{$imageName}" ?>" class = "img-thumbnail" /></a>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
          <label for="opinion">ความคิดเห็น</label>
        </div>
        <div class="col-md-7">
          <textarea class="form-control" name="opinion" rows="4"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-2 col-md-offset-9 text-right well">
          <input type="hidden" name="astype" value="5">
          <input type="hidden" name="ID" value="<?php echo "$id"; ?>" >
          <input type="hidden" name="assetDetail" value="<?php echo "{$data2['assetDetail']}"; ?>">
          <button class="btn btn-primary" type="submit">ตกลง</button>
        </div>
      </div>
    </div>
  </form>
</div>








<!-- Modaltype -->
<div class="modal fade" id="btvendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>เพิ่มตัวแทนจำหน่าย</b></h4>
      </div>
      <div class="modal-body">
        <form action="sql-add-assetvendor.php" method="post">
          <div class="form-group">
            <label for="vendorname">ตัวแทนจำหน่าย</label>
            <input class="form-control" type="text" name="vendorname">
          </div>
          <div class="form-group">
            <label for="contactName">ผู้ติดต่อ</label>
            <input class="form-control" type="text" name="contactName">
          </div>
          <div class="form-group">
            <label for="vendorPhone">เบอร์โทรศัพท์</label>
            <input class="form-control" type="text" name="vendorPhone">
          </div>
          <div class="form-group">
            <label for="vendorAddress">ที่อยู่</label>
            <input class="form-control" type="text" name="vendorAddress">
          </div>
          <div class="text-right">
            <button class="btn btn-success" type="submit" name="submit">เพิ่ม</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modaltype -->
<div class="modal fade" id="bttypeNetwork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>เพิ่มชนิดอุปกรณ์</b></h4>
      </div>
      <div class="modal-body">
        <form action="sql-add-assetvendor.php" method="post">
          <div class="form-group">
            <label for="Ntype">ชนิดอุปกรณ์</label>
            <input class="form-control" type="text" name="Ntype">
          </div>
          <div class="text-right">
            <button class="btn btn-success" type="submit" name="submit">เพิ่ม</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="scriptImage.js">

</script>
