<?php

include('head.php');


include('connect.php');

   $maintain = $_GET['maintain'];
   $detail = $_GET['detail'];

	 $sql = "SELECT * FROM asset_table WHERE assetID = $maintain";
	 $rs = mysqli_query($link, $sql);
	 $data = mysqli_fetch_array($rs);

   $vendorID = $data['assetVendor'];
   echo "$vendoeID";

?>

<style media="screen">
	h2{
		padding-left: 225px;
	}
</style>

<h2>แจ้งซ่อม</h2>
<hr>




<div class="container">
  <form class="form-horizontal" action="sql-add-maintain.php" method="post">
		<div class="container-fluid">
			<div class="col-md-5 col-md-offset-1">
				<div class="form-group">
					<label for="job" class="col-md-3">ประเภท</label>
					<div class="col-md-7">
						<label class="radio-inline">
	  					<input type="radio" value="ส่งเคลม" name="job"> ส่งเคลม
						</label>
						<label class="radio-inline">
	  					<input type="radio" value="ส่งซ่อม" name="job"> ส่งซ่อม
						</label>
					</div>
				</div>
	      <div class="form-group">
	        <label for="asid" class="col-md-3">ID</label>
	        <div class="col-md-7">
	          <input class="form-control input-sm" type="text" name="asid" value="<?php echo "{$data['assetID']}"; ?>">
	        </div>
	      </div>
	      <div class="form-group">
	        <label for="asname" class="col-md-3">ชื่ออุปกรณ์</label>
	        <div class="col-md-7">
	          <input class="form-control input-sm" type="text" name="asname" value="<?php echo "{$data['assetName']}"; ?>">
	        </div>
	      </div>
	      <div class="form-group">
	        <label for="status" class="col-md-3">สถานะ</label>
	        <div class="col-md-7">
	          <select class="form-control input-sm" name="status">
	            <option value="inProgress" selected>กำลังดำเนินการ</option>
              <option value="Completed">ซ่อมเสร็จเเล้ว</option>
	          </select>
	        </div>
	      </div>
				<div class="form-group">
	        <label for="sn" class="col-md-3">S/N</label>
	        <div class="col-md-7">
	          <input class="form-control input-sm" type="text" name="sn" placeholder="xxx.xxxx.xxxxx" value="<?php echo "{$data['assetSN']}"; ?>">
	        </div>
	      </div>
				<div class="form-group">
					<label for="detail" class="col-md-3">แจ้งปัญหา</label>
					<div class="col-md-10">
						<textarea class="form-control" name="detail" rows="8" required></textarea>
					</div>
				</div>
	    </div>


	    <div class="col-md-6">
				<div class="form-group">
	        <label class="col-md-3" for="loginID">&nbsp;</label>
	        <div class="col-md-6">
	          <input class="form-control input-sm" type="text" name="loginID" value="<?php echo "{$_SESSION["idname"]}"; ?>">
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="col-md-3" for="maintainDate">วันที่แจ้งซ่อม</label>
	        <div class="col-md-6">
	          <input class="form-control input-sm" type="date" name="maintainDate"
	          value="<?php echo date("Y-m-d"); ?>">
	        </div>
	      </div>
	      <div class="form-group">
	        <label class="col-md-3" for="enddate">วันหมดประกัน</label>
	        <div class="col-md-6">
	          <input class="form-control input-sm" type="date" name="enddate" value="<?php echo "{$data['assetExpire']}"; ?>">
	        </div>
	      </div>
	      <div class="form-group">
	        <label for="vendor" class="col-md-3">ตัวแทนจำหน่าย</label>
	        <div class="col-md-6">
	          <div class="input-group">


	            <select id = "selectType" class="form-control input-sm" name="vendor">

	              <?php

	              $sql = "SELECT * FROM vendor_table";
	              $rs = mysqli_query($link, $sql);
	              while($datatype = mysqli_fetch_array($rs)){
	                    if($data['assetVendor']==$datatype['vendorID']){
	                        echo "<option value=".$datatype['vendorID']." selected='selected'>".$datatype['vendorName']."</option>";
	                    }else{
	                        echo "<option value=".$datatype['vendorID'].">".$datatype['vendorName']."</option>";
	                    }
	              }

	              ?>


	            </select>
                <input id = "vendorName" type="hidden" name="vendorName" value="">
	            <span class="input-group-btn">
	              <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#btvendor">&nbsp;เพิ่ม&nbsp;</button>
	            </span>
	          </div>
	        </div>
	      </div>
        <div class="form-group">
	        <label class="col-md-3" for="contactName">ผู้ติดต่อ</label>
	        <div class="col-md-6">
	          <input id = "name" class="form-control input-sm" type="text" name="contactName" value="<?php echo "{$data2['ContactName']}"; ?>">
	        </div>
	      </div>
        <div class="form-group">
	        <label class="col-md-3" for="address">ที่อยู่</label>
	        <div class="col-md-6">
	          <input id = "address"class="form-control input-sm" type="address" name="address" value="<?php echo "{$data2['vendorAddress']}"; ?>">
	        </div>
	      </div>
				<div class="form-group">
	        <label class="col-md-3" for="tel">เบอร์โทรศัพท์</label>
	        <div class="col-md-6">
	          <input id = "Phone" class="form-control input-sm" type="text" name="tel" value="<?php echo "{$data2['vendorPhone']}"; ?>">
	        </div>
	      </div>

	    </div>
			<div class="form-group">
				<div class="col-md-2 col-md-offset-9 text-center">
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
            <label for="ContactName">ผู้ติดต่อ</label>
            <input class="form-control" type="text" name="ContactName">
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

<script type="text/javascript">
<?php
$vendorID = $data['assetVendor'];
echo "$vendoeID";


echo "listVendor('$vendorID')";
 ?>

function listVendor(id){
  $.getJSON('sql-list-vendor.php', {ID : id}, function(result) {
    var name  = result[0].contactName;
    var Phone  = result[0].Phone;
    var Address = result[0].Address;
    var vendorName = result[0].vendorName;

    document.getElementById('name').value = name;
    document.getElementById('address').value = Address;
    document.getElementById('Phone').value = Phone;
    document.getElementById('vendorName').value = vendorName;

    console.log(name + " "+Phone+" "+Address);
})

};

$(document).ready(function() {
  $("#selectType").change(function(){
      var id  = $("#selectType").val();
      listVendor(id);
    });
});

</script>
