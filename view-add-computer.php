<style media="screen">
  h1{
    padding-left: 125px;
  }
</style>
<h1>Computer</h1>
<?php
include ("connect.php");
$id = $_GET['id'];
//$id = 139;
if(isset($id)){
  $sql = "SELECT * from  image_table WHERE asset_ID = $id" ;
  $rs = mysqli_query($link, $sql);
  $data = mysqli_fetch_array($rs);
  $imageName = $data['ImageName'];

  $sql2 = "SELECT * from  asset_table WHERE assetID = $id" ;
  $rs2 = mysqli_query($link, $sql2);
  $data2 = mysqli_fetch_array($rs2);
  //echo "{$data2['assetName']}";

}
else {
$imageName = "blankImage.png";
}

?>
<hr>


<div class="container">
  <form class="form-horizontal" action="sql-add-asset.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">

      <div class="form-group">
        <label for="asname" class="col-md-4">ชื่ออุปกรณ์</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="asname" value="<?php echo "{$data2['assetName']}"; ?>" required>
        </div>
      </div>
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
          <input class="form-control input-sm" type="text" name="price" value="<?php echo "{$data2['assetPrice']}"; ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="cpu" class="col-md-4">CPU</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="cpu" value="<?php echo "{$data3['cpu']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="os" class="col-md-4">OS</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="os" value="<?php echo "{$data3['OS']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="ram" class="col-md-4">RAM</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="ram" value="<?php echo "{$data3['ram']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="hardisk" class="col-md-4">HARDISK</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="hardisk" value="<?php echo "{$data3['hardisk']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="mainboard" class="col-md-4">MAINBOARD</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="mainboard" value="<?php echo "{$data3['mainboard']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="Newowner" class="col-md-4">ผู้ใช้</label>
        <div class="col-md-7">
          <select class="form-control input-sm" name="newOwner" required>

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
        <label class="col-md-3" for="startdate">วันที่เพิ่มอุปกรณ์</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="date" name="startdate"
          value="<?php
          // $datetime is something like: 2014-01-31 13:05:59
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

          ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3" for="enddate">วันหมดประกัน</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="date" name="enddate"   value="<?php
            // $datetime is something like: 2014-01-31 13:05:59
           $time = strtotime($data2['assetExpire']);
           $myFormatForView = date("Y-m-d", $time);
           // $myFormatForView is something like: 01/31/14 1:05 PM
            if(isset($id)){
              echo "$myFormatForView";
            }
            else
            {
              echo date("Y-m-d");
            }
            ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="vendor" class="col-md-3">ตัวแทนจำหน่าย</label>
        <div class="col-md-7">
          <div class="input-group">
            <select class="form-control input-sm" name="vendor" required>
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
        <label for="sn" class="col-md-3">S/N</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="sn" placeholder="xxx.xxxx.xxxxx" value="<?php echo "{$data2['assetSN']}"; ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3">รูปภาพ</label>
        <div class="col-md-7">
          <label class="btn btn-success btn-sm btn-file">
            Upload Image <input id="fileUpload" type="file" name="file" style="display: none;">
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-5 col-md-offset-3" id="image-holder">
          <a href = "imageAsset/<?php echo "{$imageName}"; ?>"><img src="imageAsset/<?php echo "{$imageName}" ?>" class = "img-thumbnail" /></a>
        </div>
      </div>
      <div class="form-group">
        <label for="opinion" class="col-md-3">ความคิดเห็น</label>
        <div class="col-md-7">
          <textarea class="form-control" name="opinion" rows="1"></textarea>
        </div>
      </div>
      <div class="form-group">

      </div>
      <div class="form-group">

      </div>
      <div class="form-group">
        <div class="col-md-2 col-md-offset-8 text-right">
          <input type="hidden" name="astype" value="1">
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
        <form action="sql-add-vendor.php" method="post">
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


<script type="text/javascript" src="scriptImage.js">


</script>
