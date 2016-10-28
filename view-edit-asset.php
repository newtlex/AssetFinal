<?php
   session_start();

   include('head.php');

  ?>

 <?php

   include('connect.php');

   $id = $_GET['id'];
   $detail = $_GET['detail'];

   $sql = "SELECT * FROM asset_table WHERE assetID = $id";
    $rs = mysqli_query($link, $sql);
    $data = mysqli_fetch_array($rs);

    if($detail){
    $sql3 = "SELECT * FROM detail_computer WHERE id = $detail";
    $rs3 = mysqli_query($link, $sql3);
    $data3 = mysqli_fetch_array($rs3);

    $sql4 = "SELECT * FROM detail_printer WHERE printer_ID = $detail";
    $rs4 = mysqli_query($link, $sql4);
    $data4 = mysqli_fetch_array($rs4);

    $sql5 = "SELECT * FROM detail_network WHERE Network_ID = $detail";
    $rs5 = mysqli_query($link, $sql5);
    $data5 = mysqli_fetch_array($rs5);

    $sql6 = "SELECT * FROM detail_monitor WHERE monitor_ID = $detail";
    $rs6 = mysqli_query($link, $sql6);
    $data6 = mysqli_fetch_array($rs6);

    $sql7 = "SELECT * FROM detail_accessory WHERE accessory_ID = $detail";
    $rs7 = mysqli_query($link, $sql7);
    $data7 = mysqli_fetch_array($rs7);

}



  ?>

  <?php

  switch ($data['assetType']) {
    case 1:
       include('view-add-computer.php');
       break;
    case 2:
       include('view-add-printer.php');
       break;
    case 3:
       include('view-add-monitor.php');
       break;
    case 4:
       include('view-add-network.php');
       break;
    case 5:
       include('view-add-other.php');
       break;

    default:
      include('main.php');
      break;
  }

   ?>
