<?php

  include('head.php');
  session_start();

  if(!($_SESSION['status']))
  {
    echo "<script>
    setTimeout(function(){
      window.location.href = 'view-login.php';
    },1);
    </script>";
  }

 ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>เพิ่มอุปกรณ์</b></h3>
                    </div>
                    <div class="panel-body">
                        <form action="sql-add-asset.php" method="post">
                            <div class="form-group">
                                <label for="asname">ชื่ออุปกรณ์</label>
                                <input class="form-control" type="text" name="asname">
                            </div>
                            <div class="form-group">
                                <label for="price">ราคา</label>
                                <input class="form-control" type="text" name="price">
                            </div>
                            <div class="form-group">
                                <label for="startdate">วันที่เพิ่มอุปกรณ์</label>
                                <input class="form-control" type="date" name="startdate">
                            </div>
                            <div class="form-group">
                                <label for="enddate">วันหมดประกัน</label>
                                <input class="form-control" type="date" name="enddate">
                            </div>
                            <div class="form-group">
                                <label for="astype">ชนิดอุปกรณ์</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class="form-control" name="astype">
                                            <?php include('sql-asset-type.php'); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <?php if ($_SESSION["userType"]=="admin" ) { ?>
                                        <a class="btn btn-default glyphicon glyphicon-plus" href="main.php?page=view-add-assetType.php"> เพิ่ม</a>
                                        <?php }  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">สถานะ</label>
                                <select class="form-control" name="status">
                                    <?php include('sql-asset-status.php'); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vendor">ตัวแทนจำหน่าย</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class="form-control" name="vendor">
                                            <?php include('sql-asset-vendor.php'); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <?php if ($_SESSION["userType"]=="admin" ) { ?>
                                        <a class="btn btn-default glyphicon glyphicon-plus" href="main.php?page=view-add-vendor.php"> เพิ่ม</a>
                                        <?php }  ?>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit" name="submit">ตกลง</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
