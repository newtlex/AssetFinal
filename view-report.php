<?php include('head.php');

 ?>


<style media="screen">
  tr{
    background-color: #ffebcd;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form  id ="formAsset"class="" method="post">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h3 class="panel-title">Report</h3>
          </div>
          <div  class="panel-body">
            <div class="row">
              <div id="reportdiv" class="col-md-4">
                <div class="form-group">
                  <label class="radio-inline">

                    <input type="radio" name="report"   value="1" > รายงานอุปกรณ์
                  </label>
                  <label class="radio-inline">
                    <input type="radio" id="maintainReport" name="report" value="2"> รายงานการแจ้งซ่อม
                  </label>
                  <br>
                      <br>
                   <label for="">เลือกข้อมูล</label>
                   <br>
                     <input type="checkbox" name = "showColum[]" value ="assetID" >หมายเลขอุปกรณ์</input>
                     <input type="checkbox" name = "showColum[]" value="assetName" >ชื่ออุปกรณ์</input>


                  <br>
                  <br>

                  <label>
                  <input type="checkbox" name = "showColum[]" value="assetDate" >วันที่ซื้อ</input>
                  </label>
                  <div class="input-group">
                    <input   type="date" name="assetDateStart" class="form-control">
                    <span class="input-group-addon"> To </span>
                    <input   type="date" name="assetDateEnd" class="form-control"
                    value="<?php
                    $time = strtotime("2017-10-5");
                   $myFormatForView = date("Y-m-d", $time);
                   echo "$myFormatForView";
                      ?>">
                  </div>
                  <br>
                  <label>
                    <input type="checkbox" name = "showColum[]" value="assetPrice" >ราคา</input>
                  </label>
                  <div class="input-group">
                    <input  type="text" name="minPrice" class="form-control">
                    <span class="input-group-addon"> To </span>
                    <input  type="text" name="maxPrice" class="form-control">
                  </div>
                  <br>
                  <label>
                  <input type="checkbox" name = "showColum[]" value="assetExpire" >วันที่หมดประกัน</input>
                  </label>
                  <div class="input-group">
                    <input  type="date" name="expireDateStart" class="form-control">
                    <span class="input-group-addon"> To </span>
                    <input  type="date" name="expireDateEnd" class="form-control">
                  </div>
                    <br>
                  <label>
                    <input type="checkbox" name = "showColum[]" value="statusName" >สถานะ</input>
                  </label>
                  <select class="form-control" name="assetStatus">
                    <option value="0">เลือก</option>
                    <?php include('sql-asset-status.php'); ?>
                  </select>
                  <br>
                  <label>
                  <input type="checkbox" name = "showColum[]" value="typeName" >ประเภท</input>
                  </label>
                  <select class="form-control" name="assetType">
                        <option value="0">เลือก</option>
                    <?php include('sql-asset-type.php') ?>
                  </select>
                  <br>



                  <label>
                   <input type="checkbox" name = "showColum[]" value="vendorName" >ผู้ขาย</input>
                  </label>
                  <select class="form-control" name="assetVendor">
                    <option value="0">
                      เลือก
                    </option>
                    <?php include('sql-asset-vendor.php') ?>
                  </select>
                  <br>

             </form>

              <body onload="maintainDivhidden()">


                </div> <!-- form-group -->
             <button id = 'submitButton' type =""  name="button"> submit</button>
              </div> <!-- col-md-4 -->
             <form id="formMaintian" class=""  method="post">


              <div id="maintainDiv"   >
              <div class="col-md-4">
                <div class="form-group">
                  <label class="radio-inline">
                    <input type="radio" id="assetReport" name="report" value="1"> รายงานอุปกรณ์
                  </label>
                  <label class="radio-inline">
                    <input type="radio"  name="report" value="2" > รายงานการแจ้งซ่อม
                  </label>
                  <br>
                  <br>
                  <label for="">เลือกข้อมูล</label>
                  <br>

                  <br>
                  <label>
                    <input type="checkbox" name = "showMaintainColum[]" value="MaintainDate" >วันที่แจ้งซ่อม</input>
                  </label>
                  <br>
                  <div class="input-group">
                    <input   type="date" name="maintianDateStart" class="form-control"  >
                    <span class="input-group-addon"> To </span>
                    <input   type="date" name="maintianDateEnd" class="form-control" >
                  </div>
                  <br>
                  <label>
                    <input type="checkbox" name = "showMaintainColum[]" value="MaintainType" >ประเภทการซ่อม</input>
                  </label>
                  <select class="form-control" name="MaintainType">
                    <option value="0">เลือก</option>
                    <option value="ส่งซ่อม">ส่งซ่อม</option>
                    <option value="ส่งเคลม">ส่งเคลม</option>
                  </select>
                  <br>
                  <label>
                    <input type="checkbox" name = "showMaintainColum[]" value ="admin_fname,admin_lname,maintainUserID" >ผู้แจ้งซ่อม </input>
                  </label>
                  <select class="form-control" name="maintainUserIDname">
                    <option value='0'>เลือก</option>
                    <?php    include("sql-list-maintainUserID.php"); ?>

                  </select>
                  <br>
                  <label>
                       <input type="checkbox" name = "showMaintainColum[]" value="maintainStatus" >สถานะงานซ่อม</input>
                  </label>
                  <select class="form-control" name="maintainStatus">
                    <option value="0">เลือก</option>
                    <option value="inProgress">inProgress</option>
                    <option value="Completed">Completed</option>
                  </select>
                  <br>

                  <label>
                    <input type="checkbox" name = "showMaintainColum[]" value="MaintainDetail" >อาการ</input>

                  </label>

                  <input type = "text" class="form-control" name="MaintainDetail">
                  <label>
                    <input type="checkbox" name = "showMaintainColum[]" value="maintainVendorName" >สถานที่ซ่อมหรือเคลม</input>
                  </label>
                  <select class="form-control" name="maintainVendor">
                    <option value="0">
                      เลือก
                    </option>
                    <?php include('sql-maintain-vendor.php') ?>
                  </select>
                  <br>

                  <label>
                  <input type="checkbox" name = "showMaintainColum[]" value="typeName" >ชนิดอุปกรณ์</input>
                  </label>
                  <select class="form-control" name="assetType">
                        <option value="0">เลือก</option>
                    <?php include('sql-asset-type.php') ?>
                  </select>
                  <br>

                </div> <!-- form-group -->
          <button id = 'submitButton' type =""  name="button"> submit</button>
              </div> <!-- col-md-4 -->

           </div>


              <div class="col-md-8">
              <div id = "body">

              </div>

              </div>

            </div> <!-- row -->
          </div> <!-- panel-body -->


          <div class="panel-footer">

          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">


$( "#formAsset" ).on( "submit", function( event ) {
  event.preventDefault();
  console.log( $( this ).serialize() );
  $.ajax({
  url: 'sql-report.php',
  type: 'POST',
  dataType: 'text',
  data:$( this ).serialize(),
  success : callback
  });
});
$( "#formMaintian" ).on( "submit", function( event ) {
  event.preventDefault();
  console.log( $( this ).serialize() );
  $.ajax({
  url: 'sql-reportMaintain.php',
  type: 'POST',
  dataType: 'text',
  data:$( this ).serialize(),
  success : callback
  });
});
$(document).ready(function(){
  $("#maintainReport").change(function(){
    $("#reportdiv").hide();
    $("#maintainDiv").show();

  });
  $("#assetReport").change(function(){
    $("#reportdiv").show();
    $("#maintainDiv").hide();

  });
});
function callback(result){
  $("#body").html(result);

}
function maintainDivhidden(){
  $("#maintainDiv").hide();
}

</script>
