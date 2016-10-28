<?php
  session_start();
  include('head.php');
  include('connect.php');
 ?>

   <style>
    #caption{
      font-size: 30px;
      color: green;
    }
    #href{
      color: black;
      font-size: 20px;
    }
    .btn-default{
      box-shadow: 1px 2px 5px #000000;
    }
    #head{
      padding-left: 20px;
      color: gray;
      font-size: 25px;
    }
  </style>
  <div class="row">
    <div class="col-md-2">
      <span id="head">ค้นหาอุปกรณ์</span>
    </div>
    <div class="col-md-2 col-md-offset-8" style="padding-right: 30px;">
      <!--<button type="button" data-toggle="modal" data-target="#addAsset" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> เพิ่มอุปกรณ์</button>-->
      <div class="dropdown">
      <button class="btn btn-success btn-block" type="button" id="dropdownAddasset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="glyphicon glyphicon-plus"></span>
        &nbsp;เพิ่มอุปกรณ์&nbsp;
        <span class="glyphicon glyphicon-triangle-bottom"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownAddasset">
        <li><a href="main.php?page=view-add-computer.php">Computer</a></li>
        <li><a href="main.php?page=view-add-printer.php">Printer</a></li>
        <li><a href="main.php?page=view-add-monitor.php">Monitor</a></li>
        <li><a href="main.php?page=view-add-network.php">Network</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="main.php?page=view-add-other.php">Other....</a></li>
      </ul>
    </div>
    </div>
  </div>
  <hr>




<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="addAsset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มอุปกรณ์</h4>
      </div>
      <div class="modal-body">
        <form action="sql-add-asset.php" method="post">
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="asname">ชื่ออุปกรณ์</label>
                <input class="form-control input-sm" type="text" name="asname">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="price">ราคา</label>
                <input class="form-control input-sm" type="text" name="price">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="startdate">วันที่เพิ่มอุปกรณ์</label>
                <input class="form-control input-sm" type="date" name="startdate">
              </div>
            </div>
            <div class="col-md-5">
              <label for="vendor">ตัวแทนจำหน่าย</label>
              <select class="form-control input-sm" name="vendor">
                <?php include('sql-asset-vendor.php'); ?>
              </select>
            </div>
            <div class="col-md-1">
              <label>&nbsp;</label>
              <a class="btn btn-default glyphicon glyphicon-plus" data-toggle="modal" data-target="#btvendor">เพิ่ม</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="enddate">วันหมดประกัน</label>
                <input class="form-control input-sm" type="date" name="enddate">
              </div>
            </div>
            <div class="col-md-5">
              <label for="astype">ชนิดอุปกรณ์</label>
              <select class="form-control input-sm" name="astype">
                <?php include('sql-asset-type.php'); ?>
              </select>
            </div>
            <div class="col-md-1">
              <label>&nbsp;</label>
              <a class="btn btn-default glyphicon glyphicon-plus" data-toggle="modal" data-target="#bttype">เพิ่ม</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <label for="status">สถานะ</label>
              <select class="form-control input-sm" name="status">
                <?php include('sql-asset-status.php'); ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-md-offset-10">
              <button class="btn btn-success btn-lg" type="submit" name="submit">&nbsp;&nbsp; เพิ่ม &nbsp;&nbsp;</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
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

<!-- Modaltype -->
<div class="modal fade" id="bttype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>เพิ่มชนิดอุปกรณ์</b></h4>
      </div>
      <div class="modal-body">
        <form action="sql-add-assetType.php" method="post">
          <div class="form-group">
            <label for="assettype">ชนิดอุปกรณ์</label>
            <input class="form-control" type="text" name="assettype">
          </div>
          <div class="text-right">
            <button class="btn btn-success" type="submit" name="submit">เพิ่ม</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <select id = "selectType" class="form-control" name="searchType">
          <?php include('sql-asset-type.php'); ?>
        </select>
      </div>
      <div class="col-md-3">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-info">
            <input type="radio" name="day" id="option1"><span class="glyphicon glyphicon-time"></span> Day
          </label>
          <label class="btn btn-info">
            <input type="radio" name="week" id="option2"><span class="glyphicon glyphicon-time"></span> Week
          </label>
          <label class="btn btn-info">
            <input type="radio" name="mount" id="option3"><span class="glyphicon glyphicon-time"></span> Mount
          </label>
        </div>
      </div>
      <div class="col-md-4 col-md-offset-1">
        <div class="input-group">
          <input id="inputName" type="text" class="form-control" placeholder="Search for..." name="searchName">
          <span class="input-group-btn">
            <button class="btn btn-info" type="button"><span class="glyphicon glyphicon-search"></span> Go </button>
          </span>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover">
          <caption id="caption">รายละเอียดอุปกรณ์</caption>
          <br>
          <thead id="mythead">
            <th>
              Asset ID
            </th>
            <th>
              ชื่ออุปกรณ์
            </th>
            <th>
              ราคา
            </th>
            <th>
              วันที่หมดประกัน
            </th>
            <th>
              ชนิดของอุปกรณ์
            </th>
            <th>
              ตัวแทนจำหน่าย
            </th>
            <th>
              สถานะ
            </th>
            <th>
              Edit
            </th>
          </thead>

          <tbody id="mySelect">
            <body onload="listAsset(0,null,0,100);">
          </tbody>

        </table>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/script.js">

  </script>
