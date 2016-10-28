<?php
  include('head.php');
  include('connect.php');

 ?>

 <div class="container">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#maintain" aria-controls="maintain" role="tab" data-toggle="tab">ตารางงาน</a></li>
    <li role="presentation"><a href="#addmaintain" aria-controls="addmaintain" role="tab" data-toggle="tab">เพิ่มงาน</a></li>
    <li role="presentation"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">Report</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <br>
    <!-- id="maintain" -->
    <div role="tabpanel" class="tab-pane active" id="maintain">
      <table class="table table-bordered">
        <caption id="caption">ข้อมูลองาน</caption>
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
        <tbody id="demo">
          <?php include('list-maintain.php'); ?>
        </tbody>
      </table>
    </div> <!-- end maintain -->

    <!-- id="addmaintain" -->
    <div role="tabpanel" class="tab-pane" id="addmaintain">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><b>Maintain</b></h3>
            </div>
            <div class="panel-body">
              <form action="sql-add-maintain.php" method="get">
                <div class="form-group">
                  <label class="radio-inline">
                    <input type="radio" name="job" value="1">ซ่อม
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="job" value="2">PM
                  </label>
                </div>
                <div class="form-group">
                  <select class="form-control" name="asid">
                    <?php include('asset-sql-assetID.php') ?>
                  </select>
                </div>
                <div class="form-group">
                  <p id="demo">

                  </p>
                </div>
                <div class="form-group">
                  <select class="form-control" name="userid">
                    <?php include('sql-maintain.php') ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="asname">รายละเอียด</label>
                  <textarea class="form-control" rows="3" name="detail"></textarea>
                </div>
                <button class="btn btn-default" type="submit">ตกลง</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end addmaintain -->

    <!-- id="report" -->
    <div role="tabpanel" class="tab-pane" id="report">

    </div> <!-- end report -->

    <!-- id="settings" -->
    <div role="tabpanel" class="tab-pane" id="settings">
      <table class="table table-bordered">
        <caption id="caption">ข้อมูลองาน</caption>
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
        <tbody id="demo">
          <?php include('list-maintain.php'); ?>
        </tbody>
      </table>
    </div> <!-- end settings -->
  </div> <!-- end Tab panes -->

</div> <!-- end container -->


<ul class="nav nav-tabs nav-stacked">
      <li><a href="#tab1" data-toggle="tab">Tab 1</a></li>
      <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
      <li><a href="#tab3" data-toggle="tab">Tab 3</a></li>
  </ul>


  <div class="tab-content">
      <div class="tab-pane fade" id="tab1">
          Tab 1 content
      </div>
      <div class="tab-pane fade" id="tab2">
          Tab 2 content
      </div>
      <div class="tab-pane fade" id="tab3">
          Tab 3 content
      </div>
  </div>
