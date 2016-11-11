<?php include('head.php');

 ?>


<style media="screen">
  #padiing{
    padding-left: 15px;
  }
</style>

<h1>รายงาน</h1>
<hr>
<div class="container-fluid">
  <div class="col-md-4">
    <div class="form-group">
      <label>เลือกการรายงาน</label>
      <div class="form-group">
        <label class="radio-inline">
          <input id="assetReport" type="radio" name="report" value="1" checked> รายงานอุปกรณ์
        </label>
        <label class="radio-inline">
          <input id="maintainReport" type="radio" name="report" value="2"> รายงานการแจ้งซ่อม
        </label>
      </div>
    </div>

    <div id="reportdiv">
      <form id="formAsset" method="post" action="sql-report.php">
        <label>เลือกข้อมูลที่ต้องการแสดง</label>
        <div class="form-group">
          <label class="checkbox-inline">
            <input type="checkbox" name="showColum[]" value="assetID" checked> หมายเลขอุปกรณ์
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="showColum[]" value="assetName" checked> ชื่ออุปกรณ์
          </label>
        </div>
        <div class="form-group">
          <div class="form-inline">
            <div class="form-group">
              <label>ช่วงเวลา</label>
              &nbsp;
              &nbsp;
              <select class="form-control" name="">
                <option value="0">
                  เลือกเดือน...&nbsp;&nbsp;&nbsp;&nbsp;
                </option>
                <option value="1">
                  1
                </option>
                <option value="2">
                  2
                </option>
                <option value="3">
                  3
                </option>
                <option value="4">
                  4
                </option>
                <option value="5">
                  5
                </option>
                <option value="6">
                  6
                </option>
                <option value="7">
                  7
                </option>
                <option value="8">
                  8
                </option>
                <option value="9">
                  9
                </option>
                <option value="10">
                  10
                </option>
                <option value="11">
                  11
                </option>
                <option value="12">
                  12
                </option>
              </select>
            </div>
            &nbsp;
            &nbsp;
            <div class="form-group">
              <label>ปี</label>
              &nbsp;
              &nbsp;
              <select class="form-control" name="">
                <option value="0">
                  กรุณาเลือกช่วง&nbsp;&nbsp;&nbsp;
                </option>
                <option value="">
                  Week
                </option>
                <option value="">
                  Month
                </option>
                <option value="">
                  Year
                </option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>วันที่ซื่อ</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showColum[]" value="assetDate" checked>
            </span>
              <input type="date" name="assetDateStart" class="form-control">
            <span class="input-group-addon"> - </span>
              <input type="date" name="assetDateEnd" class="form-control" value="
              <?php
                  $time = strtotime("2017-10-5");
                  $myFormatForView = date("Y-m-d", $time);
                  echo "$myFormatForView";
                ?>
                ">
            </div>
        </div>
        <div class="form-group">
          <label>ราคา</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showColum[]" value="assetPrice" checked>
            </span>
              <input  type="text" name="minPrice" class="form-control">
            <span class="input-group-addon"> - </span>
              <input  type="text" name="maxPrice" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label>วันที่หมดประกัน</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showColum[]" value="assetExpire">
            </span>
              <input  type="date" name="expireDateStart" class="form-control">
            <span class="input-group-addon"> - </span>
              <input  type="date" name="expireDateEnd" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <label>สถานะ</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showColum[]" value="statusName">
            </span>
            <select class="form-control" name="assetStatus">
              <option value="0">
                เลือก
              </option>
              <?php include('sql-asset-status.php'); ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>ประเภท</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showColum[]" value="typeName">
            </span>
            <select class="form-control" name="assetType">
              <option value="0">
                เลือก
              </option>
              <?php include('sql-asset-type.php') ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>ตัวแทนจำหน่าย</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showColum[]" value="vendorName">
            </span>
            <select class="form-control" name="assetVendor">
              <option value="0">
                เลือก
              </option>
              <?php include('sql-asset-vendor.php') ?>
            </select>
          </div>
        </div>
        <button class="btn btn-primary" id="submitReport" name="button">ค้นหา</button>
        <button class="btn btn-primary" type="submit" name="button">รายงาน</button>
      </form> <!-- form 1 -->
    </div>

    <div id="maintainDiv">
      <form id="formMaintian" method="post" action="sql-reportMaintain.php">
        <div class="form-group">
          <label class="checkbox-inline">
            <input type="hidden" name="" value="maintainasset_table.assetID" checked>
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="showMaintainColum[]" value="assetName" checked>
          </label>
        </div>
        <div class="form-group">
          <label>วันที่แจ้งซ่อม</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showMaintainColum[]" value="MaintainDate">
            </span>
              <input   type="date" name="maintianDateStart" class="form-control"  >
            <span class="input-group-addon"> - </span>
              <input   type="date" name="maintianDateEnd" class="form-control" >
          </div>
        </div>
        <div class="form-group">
          <label>ช่วงเวลา</label>
          <select class="form-control" name="">
            <option value="0">
              เลือกเดือน..
            </option>
            <option value="1">
              1
            </option>
            <option value="2">
              2
            </option>
            <option value="3">
              3
            </option>
            <option value="4">
              4
            </option>
            <option value="5">
              5
            </option>
            <option value="6">
              6
            </option>
            <option value="7">
              7
            </option>
            <option value="8">
              8
            </option>
            <option value="9">
              9
            </option>
            <option value="10">
              10
            </option>
            <option value="11">
              11
            </option>
            <option value="12">
              12
            </option>
          </select>
        </div>
        <label>ช่วง...</label>
        <div class="form-group">
          <label class="radio-inline">
            <input type="radio" name="Week" value="1"> Week
          </label>
          <label class="radio-inline">
            <input type="radio" name="Month" value="2"> Month
          </label>
          <label class="radio-inline">
            <input type="radio" name="Year" value="2"> Year
          </label>
        </div>
        <div class="form-group">
          <label>ประเภทการซ่อม</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showMaintainColum[]" value="MaintainType">
            </span>
            <select class="form-control" name="MaintainType">
              <option value="0">
                เลือก
              </option>
              <option value="ส่งซ่อม">
                ส่งซ่อม
              </option>
              <option value="ส่งเคลม">
                ส่งเคลม
              </option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>ผู้แจ้งซ่อม</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showMaintainColum[]" value="admin_fname,admin_lname">
            </span>
            <select class="form-control" name="maintainUserIDname">
              <option value='0'>
                เลือก
              </option>
              <?php include("sql-list-maintainUserID.php"); ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>สถานะงานซ่อม</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showMaintainColum[]" value="maintainStatus">
            </span>
            <select class="form-control" name="maintainStatus">
              <option value="0">
                เลือก
              </option>
              <option value="inProgress">
                inProgress
              </option>
              <option value="Completed">
                Completed
              </option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>อาการ</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showMaintainColum[]" value="MaintainDetail">
            </span>
              <input type="text" class="form-control" name="MaintainDetail">
          </div>
        </div>
        <div class="form-group">
          <label>สถานที่ซ่อมหรือเคลม</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showMaintainColum[]" value="maintainVendorName">
            </span>
            <select class="form-control" name="maintainVendor">
              <option value="0">
                เลือก
              </option>
              <?php include('sql-maintain-vendor.php') ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>ชนิดอุปกรณ์</label>
          <div class="input-group">
            <span class="input-group-addon">
              <input type="checkbox" name="showMaintainColum[]" value="typeName">
            </span>
            <select class="form-control" name="assetType">
              <option value="0">
                เลือก
              </option>
              <?php include('sql-asset-type.php') ?>
            </select>
          </div>
        </div>
        <button class="btn btn-primary" id="showMaintain" name="button">ตกลง</button>
        <button class="btn btn-primary" type="submit" name="button">รายงาน</button>
      </form> <!-- form 1 -->
    </div>

  </div> <!-- col-md-4 -->
  <div class="col-md-8" id="body">
    <body onload="maintainDivhidden()">
  </div>
</div>


<script type="text/javascript">



$("#submitReport").click(function(event){
  event.preventDefault();
  console.log( $( '#formAsset' ).serialize() );
  $.ajax({
  url: 'sql-report.php',
  type: 'POST',
  dataType: 'html',
  data:$( '#formAsset' ).serialize(),
  success : callback
  });
});
$( "#showMaintain" ).click(function(event){
  event.preventDefault();
  console.log( $('#formMaintian').serialize() );
  $.ajax({
  url: 'sql-reportMaintain.php',
  type: 'POST',
  dataType: 'text',
  data:$('#formMaintian').serialize(),
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
