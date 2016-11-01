<style media="screen">
  h2{
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
<h2>Monitor</h2>

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
        <label for="type" class="col-md-4">ชนิดจอภาพ</label>
        <div class="col-md-7">
          <select class="form-control input-sm" name="type" value="<?php echo "{$data6['type']}"; ?>">
              <option value="LCDMonitor">LCD Monitor</option>
              <option value="Projector">Projector</option>
              <option value="TV Monitor">TV Monitor</option>
          </select>
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

      <div class="form-group">
        <div class="col-md-4">
          <label for="">ข้อมูลจำเพาะ</label>
        </div>
        <div class="col-md-2">
          <label for="">ไมค์</label>
          <select id="micYes" class="form-control" name="mic">
            <option value="mic">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="">ลำโพง</label>
          <select id="speakerYes" class="form-control" name="speaker">
            <option value="speaker">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="">USB</label>
          <select id="USBYes" class="form-control" name="USB">
            <option value="USB">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">
        </div>

        <div class="col-md-2">
          <label for="">Sub-D</label>
          <select id="DSUBYes" class="form-control" name="D-SUB">
            <option value="D-SUB">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="">DVI</label>
          <select id="DVIYes" class="form-control" name="DVI">
            <option value="DVI">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="">Display</label>
          <select id="DisplayPortYes" class="form-control" name="DisplayPort">
            <option value="DisplayPort">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4">

        </div>
        <div class="col-md-2">
          <label for="">HDMI</label>
          <select id="HDMIYes" class="form-control" name="HDMI">
            <option value="HDMI">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="">Pivot</label>
          <select id="PivotYes" class="form-control" name="Pivot">
            <option value="Pivot">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
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
        <div class="col-md-4">
          <label for="">ขนาดจอ</label>
        </div>
        <div class="col-md-7">
          <input class="form-control" type="text" name="size" value="<?php echo "{$data6['size']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="sn" class="col-md-4">S/N</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="sn" placeholder="xxx.xxxx.xxxxx" value="<?php echo "{$data2['assetSN']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4">รูปภาพ</label>
        <div class="col-md-7">
          <label class="btn btn-success btn-sm btn-file">
            Upload Image <input id="fileUpload" type="file" name="file" style="display: none;">
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-5 col-md-offset-4" id="image-holder">
          <a href = "imageAsset/<?php echo "{$imageName}"; ?>"><img src="imageAsset/<?php echo "{$imageName}" ?>" class = "img-thumbnail" /></a>
        </div>
      </div>
      <div class="form-group">

      </div>
      <div class="form-group">
        <div class="col-md-3 col-md-offset-8 text-right">
          <input type="hidden" name="astype" value="3">
          <input type="hidden" name="ID" value="<?php echo "$id"; ?>" >
          <input type="hidden" name="assetDetail" value="<?php echo "{$data2['assetDetail']}"; ?>">
          <button class="btn btn-primary" type="submit">ตกลง</button>
        </div>
      </div>
    </div>
  </form>
</div>



<!-- Modaltype -->
<div class="modal fade" id="btvendor" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
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

  <script type="text/javascript" src="scriptImage.js">

  </script>

  <script type="text/javascript">
           function run(str){

             var n = str.split(' ');
             var l = n.length;

             var i =0;
             while(i<l)
             {

               if(n[i]=="mic")
               {
                 document.getElementById("micYes").selectedIndex  = "0";
               }
               if(n[i]=="speaker")
               {
                 document.getElementById("speakerYes").selectedIndex  = "0";
               }
               if(n[i]=="USB")
               {
                 document.getElementById("USBYes").selectedIndex  = "0";
               }
               if(n[i]=="D-SUB")
               {
                 document.getElementById("DSUBYes").selectedIndex  = "0";
               }
               if(n[i]=="DVI")
               {
                 document.getElementById("DVIYes").selectedIndex  = "0";
               }
               if(n[i]=="HDMI")
               {
                 document.getElementById("HDMIYes").selectedIndex  = "0";
               }
               if(n[i]=="Pivot")
               {
                 document.getElementById("PivotYes").selectedIndex  = "0";
               }
               if(n[i]=="DisplayPort")
               {
                 document.getElementById("DisplayPortYes").selectedIndex  = "0";
               }

              i++;

             }




           }

          <?php
          $port = $data6['port'];

              echo "run('$port')";
          ?>
    </script>
