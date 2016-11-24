<?php

if ($_POST) {
  include('connect.php');

  $id = $_POST['ID'];
  echo "TOP  ID $id";

  $assetName = $_POST['asname'];
  $assetDate = $_POST['startdate'];
  $assetPrice = $_POST['price'];
  $assetExpire = $_POST['enddate'];
  $assetType = $_POST['astype'];
  $assetStatus = $_POST['status'];
  $assetVendor = $_POST['vendor'];
  $assetSN  = $_POST['sn'];
  $assetDetail = $_POST['assetDetail'];

  //computer
  $cpu =$_POST['cpu'];
  $ram =$_POST['ram'];
  $hardisk=$_POST['hardisk'];
  $mainboard=$_POST['mainboard'];
  $OS=$_POST['os'];



  //printer
  $type     =$_POST['type'];
  $ink      =$_POST['ink'];
  $Serial   =$_POST['Serial'];
  $Parallel =$_POST['Parallel'];
  $USB      =$_POST['USB'];
  $Wifi     =$_POST['Wifi'];
  $Ethernet =$_POST['Ethernet'];
  $PrinterPort  = $Serial." ".$Parallel." ".$USB." ".$Wifi." ".$Ethernet;


  //monitor

  $size     =$_POST['size'];
  $mic      =$_POST['mic'];
  $speaker  =$_POST['speaker'];
  $USB      =$_POST['USB'];
  $DSUB     =$_POST['D-SUB'];
  $DVI      =$_POST['DVI'];
  $HDMI     =$_POST['HDMI'];
  $Pivot    =$_POST['Pivot'];
  $DisplayPort =$_POST['DisplayPort'];
  $MonitorPort  = $mic." ".$speaker." ".$USB." ".$DSUB." ".$DVI
  ." ".$HDMI." ".$Pivot." ".$DisplayPort;



  //network
  $typeNetwork    =$_POST['typeNetwork'];
  //other
  $typeAccesory    =$_POST['typeAccesory'];

  $detail    =$_POST['detail'];
  $Oldowner  =$_POST['Oldowner'];
  $newOwnerID =$_POST['newOwner'];
  echo "<br> Oldowner $Oldowner<br> ";
  if($Oldowner!=0)
  {
    $sql = "UPDATE owner
            set endDate = CURRENT_TIME
            where ownerID = '$Oldowner'";
    $rs = mysqli_query($link,$sql);

  }

  if($id == null){
    if($assetType==1) //computer
    {
      echo "$cpu <br>";
      echo "$ram <br>";
      echo "$hardisk <br>";
      echo "$mainboard <br>";
      echo "$OS <br>";
    $sql = "INSERT INTO detail_computer (cpu,ram,hardisk,mainboard,OS)VALUES('$cpu','$ram','$hardisk','$mainboard','$OS')";
    $rs = mysqli_query($link,$sql);
    $assetDetail = mysqli_insert_id($link);
    echo "$assetDetail <br>";
   }
   else if($assetType==2) //printer
   {
     echo " type $type <br>";
     echo " ink $ink <br>";
     echo  "$Serial <br>";
     echo "$Parallel <br>";
     echo "$USB <br>";
     echo "$Wifi <br>";
     echo "$Ethernet <br>";
     echo " port $port <br>" ;
   $sql = "INSERT INTO detail_printer (printer_type,ink,port)VALUES('$type','$ink','$PrinterPort')";
   $rs = mysqli_query($link,$sql);
   $assetDetail = mysqli_insert_id($link);
   echo "assetDetail $assetDetail <br>";
 }
 else if($assetType==3) //monitor
 {
   echo " type $type <br>";
   echo " size $size <br>";
   echo  "$mic <br>";
   echo "$speaker <br>";
   echo "$USB <br>";
   echo "$DSUB <br>";
   echo "$DVI <br>";
   echo " port $port <br>" ;
 $sql = "INSERT INTO detail_monitor (type,size,port)VALUES('$type','$size','$MonitorPort')";
 $rs = mysqli_query($link,$sql);
 $assetDetail = mysqli_insert_id($link);
 echo "assetDetail $assetDetail <br>";
 }
 else if($assetType==4)
 {
 $sql = "INSERT INTO detail_network(type,detail)VALUES('$typeNetwork','$detail')";
 $rs = mysqli_query($link,$sql);
 $assetDetail = mysqli_insert_id($link);
 echo "assetDetail $assetDetail <br>";
}
else if($assetType==5){
 $sql = "INSERT INTO detail_accessory(type,detail)VALUES('$typeAccesory','$detail')";
 $rs = mysqli_query($link,$sql);
 $assetDetail = mysqli_insert_id($link);
 echo "assetDetail $assetDetail <br>";
}
  echo "$assetName <br>";
  echo "$assetDate <br>";
  echo "$assetPrice <br> ";
  echo "$assetExpire <br> ";
  echo "type $assetType <br> ";
  echo "status $assetStatus <br>";
  echo "vendor $assetVendor<br>";
  echo "sn $assetSN <br>";
  echo "detail $assetDetail <br>";

    $sql = "INSERT INTO asset_table (assetName,assetDate,assetPrice,assetExpire,
      assetType,assetStatus,assetVendor,assetSN,assetDetail)
    VALUES('$assetName','$assetDate','$assetPrice','$assetExpire',
      '$assetType','$assetStatus','$assetVendor','$assetSN','$assetDetail')";
    $rs = mysqli_query($link,$sql);
    $id = mysqli_insert_id($link);
    echo "ID $id";
    if($newOwnerID!="0")
    {
      $sql= "INSERT INTO owner (ownerID,adminID,assetID,startDate)
              VALUES ('','$newOwnerID','$id',CURRENT_TIME)";
      $rs = mysqli_query($link,$sql);
    }

    include ("sql-upload.php");

  echo "<script>alert('เพิ่มข้อมูลเรียบร้อย');
        window.location.href = 'main.php';
      </script>";
    }
  else {
    if($assetType==1) //computer
    {
    $sql = "UPDATE detail_computer
            set cpu='$cpu',ram='$ram',hardisk='$hardisk',
                 mainboard='$mainboard',OS='$OS'
            where id = '$assetDetail'";
    $rs = mysqli_query($link,$sql);
   }
   else if($assetType==2) //printer
   {
   $sql = "UPDATE detail_printer
           set printer_type ='$type',ink ='$ink',port='$PrinterPort'
           where printer_ID = '$assetDetail'";
   $rs = mysqli_query($link,$sql);
   }
   else if($assetType==3) //monitor
   {
     echo  "UPDATE <br>";
     echo " type $type <br>";
     echo " size $size <br>";
     echo "$mic <br>";
     echo "$speaker <br>";
     echo "$USB <br>";
     echo "$DSUB <br>";
     echo "$DVI <br>";
     echo "$HDMI <br>";
     echo " port $MonitorPort <br><br>" ;
     echo "assetDetail  $assetDetail";

   $sql = "UPDATE detail_monitor
          set type='$type',size='$size',port='$MonitorPort'
          where monitor_ID = '$assetDetail'";
   $rs = mysqli_query($link,$sql);

   }
   else if($assetType==4)
   {
     echo "Network $typeNetwork <br>";
     echo "detail $detail <br>";

    $sql = "UPDATE detail_network
                  SET type = '$typeNetwork', detail = '$detail'
                  WHERE Network_ID = '$assetDetail'";
   $rs = mysqli_query($link,$sql);




   echo "assetDetail $assetDetail <br>";
  }
  else if($assetType==5){
    $sql = "UPDATE detail_accessory
            SET type = '$typeAccesory', detail = '$detail'
            WHERE accessory_ID = '$assetDetail'";

   $rs = mysqli_query($link,$sql);

   echo "assetDetail $assetDetail <br>";
  }
   echo "$assetName <br>";
   echo "$assetDate <br>";
   echo "$assetPrice <br> ";
   echo "$assetExpire <br> ";
   echo "type $assetType <br> ";
   echo "status $assetStatus <br>";
   echo "vendor $assetVendor <br>";
   echo "sn $assetSN <br>";
   echo "detail $assetDetail <br><br><br>";
    $sql = "UPDATE asset_table SET assetName='$assetName',assetDate='$assetDate',
    assetPrice='$assetPrice',assetExpire='$assetExpire',assetType='$assetType',
    assetStatus='$assetStatus',assetVendor='$assetVendor',assetSN ='$assetSN'
    WHERE assetID = '$id'";
    $rs = mysqli_query($link,$sql);
    if($newOwnerID!="0")
    {
      $sql= "INSERT INTO owner (ownerID,adminID,assetID,startDate)
              VALUES ('','$newOwnerID','$id',CURRENT_TIME)";
      $rs = mysqli_query($link,$sql);
    }

    include ("sql-upload.php");

   echo "<script>alert('แก้ไขข้อมูล ID : $id เรียบร้อย');
      window.location.href = 'main.php';
    </script>";
  }



}


 ?>
