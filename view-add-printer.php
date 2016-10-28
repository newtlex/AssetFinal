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
//echo "{$data2['assetName']}";
//echo "{$data4['port']}";
}
else {
$imageName = "blankImage.png";
}
?>

<h2>Printer</h2>
<hr>


<div class="container">
  <form class="form-horizontal" action="sql-add-asset.php" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
      <div class="form-group">
        <label for="asname" class="col-md-4 ">ชื่ออุปกรณ์</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="text" name="asname" value="<?php echo "{$data2['assetName']}"; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4">ชนิดเครื่องพิมพ์</label>
        <div class="col-md-7">
          <select class="form-control input-sm" name="type">
            <option value="Laser">
              Laser
            </option>
            <option value="Inkjet">
              Inkjet
            </option>
            <option value="Dotmatrix">
              Dotmatrix
            </option>
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
        <label class="col-md-4" for="startdate">วันที่เพิ่มอุปกรณ์</label>
        <div class="col-md-7">
          <input class="form-control input-sm" type="date" name="startdate"
          value="<?php
          if(isset($id)){
            echo "{$data2['assetDate']}";
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
        <label class="col-md-4 ">พอร์ต</label>
        <div class="col-md-2">
          <label for="">Serial</label>
          <select id="SerialYes"class="form-control input-sm" name="Serial">
            <option value='Serial'>yes</option>
            <option value='' selected>no</option>"
          </select>
        </div>
        <div class="col-md-2">
          <label for="">Parallel</label>
          <select id="ParallelYes"class="form-control input-sm" name="Parallel">
            <option value="Parallel">yes</option>
            <option value="" selected>no</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="">USB</label>
          <select id="USBYes" class="form-control input-sm" name="USB">
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
        <label class="col-md-4 ">&nbsp;</label>
        <div class="col-md-2">
          <label for="">Wifi</label>
          <select  id="WifiYes"class="form-control input-sm" name="Wifi">
            <option value="Wifi">
              yes
            </option>
            <option value="" selected>
              no
            </option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="">Ethernet</label>
          <select id="EthernetYes"class="form-control" name="Ethernet">
            <option  value="Ethernet">
              yes
            </option>
            <option id="EthernetNo"value="" selected>
              no
            </option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="" class="col-md-4">หมึก</label>
        <div class="col-md-7">
          <select class="form-control input-sm" name="ink">
            <option value="Color">Color</option>
            <option value="MonoChrom">MonoChrom</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="status" class="col-md-4 ">สถานะ</label>
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
        <label for="vendor" class="col-md-4">ตัวแทนจำหน่าย</label>
        <div class="col-md-7">
          <div class="input-group">
            <select class="form-control input-sm" name="vendor">
              <?php include('sql-asset-vendor.php'); ?>
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
          <input class="form-control input-sm" type="text" name="sn" placeholder="xxx.xxxx.xxxxx">
        </div>

      </div>
      <div class="form-group">
        <label class="col-md-4">รูปภาพ</label>
        <div class="col-md-7">
          <label class="btn btn-success btn-sm btn-file">
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

      </div>
      <div class="form-group">
        <div class="col-md-4 col-md-offset-7 text-right">
            <input type="hidden" name="astype" value="2">
            <input type="hidden" name="ID" value="<?php echo "$id"; ?>" >
            <input type="hidden" name="assetDetail" value="<?php echo "{$data2['assetDetail']}"; ?>">
          <button class="btn btn-primary" type="submit">ตกลง</button>
        </div>
      </div>
    </div>
  </form>
</div>



<!--4 Modaltype -->
<div class="modal fade" id="btvendor" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
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

  <script type="text/javascript" src="scriptImage.js">

  </script>

  <script type="text/javascript">
           function run(str){
             var n = str.split(' ');
             var l = n.length;
             var i =0;
             while(i<l)
             {
               if(n[i]=="Serial")
               {
                 document.getElementById("SerialYes").selectedIndex  = "0";
               }
               if(n[i]=="Parallel")
               {
                 document.getElementById("ParallelYes").selectedIndex  = "0";
               }
               if(n[i]=="USB")
               {
                 document.getElementById("USBYes").selectedIndex  = "0";
               }
               if(n[i]=="Wifi")
               {
                 document.getElementById("WifiYes").selectedIndex  = "0";
               }
               if(n[i]=="Ethernet")
               {
                 document.getElementById("EthernetYes").selectedIndex  = "0";
               }

              i++;

             }
           }

          <?php
          $port = $data4['port'];

              echo "run('$port')";
          ?>
    </script>
