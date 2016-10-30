<?php include('head.php'); ?>


<style media="screen">
  tr{
    background-color: #ffebcd;
  }
</style>
<script type="text/javascript">
function  testCheck()
{
  var check = document.getElemenybyID.('timeCheck').checked;
  if (check)
  {
    echo ("check");
  }

}
</script>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form action= "sql-report.php" method = "post" >
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h3 class="panel-title">Report</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div id="alldiv" class="col-md-4">
                <div class="form-group" >
                  <label class="radio-inline">
                    <input type="radio" name="report"  onchange="selectReport();" value="1"> รายงานอุปกรณ์
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="report" value="2"> รายงานการแจ้งซ่อม
                  </label>
                  <br>
                  <label>
                    <input type="checkbox" name="selectDate"   id="timeCheckbox" onclick="timeCheck()"> เลือกช่วงเวลา
                  </label>
                  <div class="input-group">
                    <input  id = "Date" type="date" name="startDate" class="form-control" disabled >
                    <span class="input-group-addon"> To </span>
                    <input  id = "endDate" type="date" name="enddate" class="form-control" disabled>
                  </div>
                  <br>
                  <label>
                    <input type="checkbox" name="selectStatus"> เลือกจากสถานะ
                  </label>
                  <select class="form-control" name="status">
                    <option value="0">เลือก</option>
                    <?php include('asset-sql-status.php'); ?>
                  </select>
                  <br>
                  <label>
                    <input type="checkbox" name="selectType"> เลือกจากชนิดอุปกรณ์
                  </label>
                  <select class="form-control" name="type">
                    <?php include('asset-sql-type.php') ?>
                  </select>
                  <br>
                  <label>
                    <input type="checkbox" name="selectMaintain"> เลือกจากงาน
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
                    <input type="checkbox" name="selectVendor"> เลือกจากผู้ผลิต
                  </label>
                  <select class="form-control" name="vendor">
                    <option value="0">
                      เลือก
                    </option>
                    <?php include('asset-sql-vendor.php') ?>
                  </select>
                  <br>
                  <label>
                    <input type="checkbox" name="selectUser"> เลือกจากช่าง
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
                  <button type="summit" name="button"> summit</button>
                </div> <!-- form-group -->

              </div> <!-- col-md-4 -->


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
   $("#hide").click(function(){
    $("alldiv").hide();
});

</script>
