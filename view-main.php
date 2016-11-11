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

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <select id = "selectType" class="form-control" name="searchType">
          <?php include('sql-asset-type.php'); ?>
        </select>
      </div>
      <div class="col-md-3">
        <div class="btn-group">
          <label class="btn btn-info">
            <input type="radio" name="period" value="month1" id="month" data-toggle="button"><span class="glyphicon glyphicon-time"> </span> Month
          </label>
          <label class="btn btn-info">
            <input type="radio" name="period" value="month6" id="6month" data-toggle="button"><span class="glyphicon glyphicon-time"></span> 6 Months
          </label>
          <label class="btn btn-info">
            <input type="radio" name="period" value="year" id="year" data-toggle="button"><span class="glyphicon glyphicon-time"></span> 1 year
          </label>
          <label class="btn btn-info">
            <input type="radio" name="period" value="all" id="all" data-toggle="button"><span class="glyphicon glyphicon-time"></span> ALL
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
              ลำดับ
            </th>
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
              วันที่ซื้อ
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
            <th style="width:11%;">
              จัดการ
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
