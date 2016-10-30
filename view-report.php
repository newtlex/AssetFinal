<?php include('head.php'); ?>


<style media="screen">
  tr{
    background-color: #ffebcd;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form  action="sql-report.php" method = "POST">
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
                     <input type="checkbox" name = "showColum[]" value ="assetID" > ID </input>
                     <input type="checkbox" name = "showColum[]" value="assetName" > assetName </input>
                     <input type="checkbox" name = "showColum[]" value="assetDate" > assetDate </input>
                     <input type="checkbox" name = "showColum[]" value="assetExpire" > assetExpire </input>
                         <br>
                     <input type="checkbox" name = "showColum[]" value="assetPrice" > assetPrice </input>
                     <input type="checkbox" name = "showColum[]" value="vendorName" > vendorName </input>
                     <input type="checkbox" name = "showColum[]" value="typeName" > typeName </input>
                      <input type="checkbox" name = "showColum[]" value="statusName" > statusName </input>

                  <br>
                  <br>

                  <label>
                    <input type="checkbox" name="selectDate" id="timeCheckbox"> เลือกช่วงเวลา
                  </label>
                  <div class="input-group">
                    <input  id = "Date" type="date" name="assetStartDate" class="form-control"
                  >
                    <span class="input-group-addon"> To </span>
                    <input  id = "endDate" type="date" name="assetEndDate" class="form-control"
                    value="<?php
                    $time = strtotime("2017-10-5");
                   $myFormatForView = date("Y-m-d", $time);
                   echo "$myFormatForView";
                      ?>">
                  </div>
                  <br>
                  <label>
                    <input type="checkbox" name="selectStatus"> เลือกจากสถานะอุปกรณ์
                  </label>
                  <select class="form-control" name="assetStatus">
                    <option value="0">เลือก</option>
                    <?php include('sql-asset-status.php'); ?>
                  </select>
                  <br>
                  <label>
                    <input type="checkbox" name="selectType"> เลือกจากชนิดอุปกรณ์
                  </label>
                  <select class="form-control" name="assetType">
                        <option value="0">เลือก</option>
                    <?php include('sql-asset-type.php') ?>
                  </select>
                  <br>



                  <label>
                    <input type="checkbox" name="selectVendor"> เลือกจากผู้ผลิต
                  </label>
                  <select class="form-control" name="assetVendor">
                    <option value="0">
                      เลือก
                    </option>
                    <?php include('sql-asset-vendor.php') ?>
                  </select>
                  <br>



              <body onload="maintainDivhidden()">


                </div> <!-- form-group -->
                <button type="submit" name="button"> summit</button>
              </div> <!-- col-md-4 -->

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
                  <label>
                    <input type="checkbox" name="selectDate"   id="timeCheckbox" onclick="timeCheck()"> เลือกช่วงเวลา
                  </label>
                  <br>
                  <div class="input-group">
                    <input  id = "Date" type="date" name="startDate" class="form-control" disabled >
                    <span class="input-group-addon"> To </span>
                    <input  id = "endDate" type="date" name="enddate" class="form-control" disabled>
                  </div>
                  <br>
                  <label>
                    <input type="checkbox" name="selectStatus"> เลือกจากชนิดงานซ่อม
                  </label>
                  <select class="form-control" name="status">
                    <option value="0">เลือก</option>
                    <?php

                    ?>
                  </select>
                  <br>

                  <label>
                    <input type="checkbox" name="selectMaintain"> เลือกสถานะงานซ่อม
                  </label>
                  <select class="form-control" name="maintain">
                    <option value="0">
                      เลือก
                    </option>
                    <option value="1">
                      ซ่อม
                    </option>
                    <option value="2">
                      PM
                    </option>
                  </select>
                  <br>


                  <label>
                    <input type="checkbox" name="selectUser"> เลือกจากผู้ใช้
                  </label>
                  <select class="form-control" name="user">
                    <option value="0">
                      เลือก
                    </option>
                    <option value="1">
                      ช่าง1
                    </option>
                    <option value="2">
                      ช่าง2
                    </option>
                  </select>



                </div> <!-- form-group -->
                <button type="button" name="button"> submit</button>
              </div> <!-- col-md-4 -->
           </div>


              <div class="col-md-8">
                <h1>ตัวอย่าง</h1>
                <table class="table table-bordered" id="colshow">
                  <caption\>ข้อมูลองาน</caption>
                  <thead>
                    <tr>
                      <th>
                        ID งาน
                      </th>
                      <th>
                        ID อุปกรณ์
                      </th>
                      <th>
                        รายการ
                      </th>
                      <th>
                        วันที่แจ้งเข้ามา
                      </th>
                      <th>
                        รายละเอียด
                      </th>
                      <th>
                        ช่าง
                      </th>
                      <th>
                        สถานะ
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php include('list-maintain.php'); ?>
                  </tbody>
                </table>
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

function maintainDivhidden(){
  $("#maintainDiv").hide();
}

  function timeCheck(){
    var x = document.getElementById("timeCheckbox").checked;
 if(x){
    document.getElementById("Date").disabled = false;
    document.getElementById("endDate").disabled = false;
  }
  else{
     document.getElementById ("Date").disabled = true;
     document.getElementById("endDate").disabled = true;
   }

   };

</script>
