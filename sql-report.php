<?php

if ($_POST) {
include('head.php');
include('connect.php');
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ

$assetDateStart = $_POST['assetDateStart'];
$assetDateEnd = $_POST['assetDateEnd'];
$expireDateStart = $_POST['expireDateStart'];
$expireDateEnd =  $_POST['expireDateEnd'];
$assetType = $_POST['assetType'];
$assetVendor = $_POST['assetVendor'];
$assetstatus = $_POST['assetStatus'];
$minPrice = $_POST['minPrice'];
$maxPrice = $_POST['maxPrice'];


if($assetstatus=="0"){
  $searchStatus = '';
}
else {
  $searchStatus = " AND assetStatus='$assetstatus'";
}
if($assetType=="0"){
  $searchAssetType = '';
}
else {
  $searchAssetType = " AND assetType='$assetType'";
}
if($assetVendor=="0"){
  $searchAssetVendor = '';
}
else {
  $searchAssetVendor = " AND assetVendor='$assetVendor'";
}
if($minPrice==null||$maxPrice==null){
  $searchAssetPrice = '';

}
else {
  $searchAssetPrice = " AND assetPrice > '$minPrice' AND assetPrice < '$maxPrice'";
}
if($assetDateStart==null||$assetDateEnd==null){
  $searchAssetDate = '';

}
else {
  $searchAssetDate = " AND (STR_TO_DATE(assetDATE,'%Y-%m-%d')
  BETWEEN STR_TO_DATE('$assetDateStart', '%Y-%m-%d')
  AND STR_TO_DATE('$assetDateEnd', '%Y-%m-%d'))";
}
if($expireDateStart==null||$expireDateEnd==null){
  $searchExpireDate = '';

}
else {
  $searchExpireDate = " AND (STR_TO_DATE(assetExpire,'%Y-%m-%d')
  BETWEEN STR_TO_DATE('$expireDateStart', '%Y-%m-%d')
  AND STR_TO_DATE('$expireDateEnd', '%Y-%m-%d'))";
}

//echo "searchStatus $searchStatus<br >";


$showColum = implode(",", $_POST['showColum']);
$columeArray = (explode(",",$showColum));
$columeLength = count($columeArray);
/* echo "columeArray $columeArray";
 echo " startDate $startDate <br >";
 echo " enddate $enddate <br >";
 echo " assetVendor $assetVendor <br >";*/

/*foreach ($columeArray as $key => $value) {
  echo "$value";
}*/
 $time = strtotime($startDate);
 $myFormatForView = date("Y-m-d", $time);
 //echo "$myFormatForView";

$sql = "SELECT $showColum
FROM  asset_table,vendor_table,assettype_table,status_table
WHERE assetVendor=vendorID
AND assetType=IDType
AND assetStatus=statusID
$searchAssetPrice
$searchStatus
$searchAssetType
$searchAssetVendor
$searchAssetDate
$searchExpireDate";

$rs =mysqli_query($link, $sql); ?>

<?php

date_default_timezone_set('Asia/Bangkok');

$months = array(0=>"", 1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
 						 "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

$birth1 = strtotime("{$assetDateStart}");
$birth2 = strtotime("{$assetDateEnd}");

$a1 = date("j-n-Y", $birth1);
$a2 = date("j-n-Y", $birth2);

$d1 = explode("-", $a1);
$d2 = explode("-", $a2);

$m1 = $months[$d1[1]];
$m2 = $months[$d2[1]];

$y1 = $d1[2] + 543;  //แปลงเป็นปี พ.ศ.
$y2 = $d2[2] + 543;  //แปลงเป็นปี พ.ศ.
//echo "<p>$m1.$y1 - $m2.$y2<p><hr>";

$text = "";

if ($_POST['assetDateStart'] || $_POST['assetDateEnd']) {
  $text = "$m1.$y1 - $m2.$y2";
}
else {
  $text = "อุปกรณ์ทั้งหมด";
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <caption align="center" height="100"><h4 class="text-center">รายงานอุปกรณ์ทั้งหมดที่มีตั้งแต่เดือน(<?php echo "$text"; ?>)<br>บริษัท จีเนียส-ทรี จำกัด</h4></caption>
    <table border="1" cellspacing="0" cellpadding="12" align="center" class="table table-bordered">
      <thead>
        <tr bgcolor="steelblue">
          <?php
          foreach ($columeArray as $key => $value) {
            echo "<th> $value </th>";
          } ?>
        </tr>
      </thead>
      <tbody>
        <?php $text ='';
         while($data = mysqli_fetch_array($rs)){
        $text ='';
        echo "<tr align='left'>";
           foreach ($columeArray as $key => $value) {
             if ($value=='assetDate') {
               $time = strtotime($data['assetDate']);
               $myFormatForView = date("Y-m-d", $time);
               echo "<td>";
               echo "$myFormatForView";
               echo "</td>";
             }else if ($value=='assetExpire') {
               $time = strtotime($data['assetExpire']);
               $myFormatForView = date("Y-m-d", $time);
               echo "<td>";
               echo "$myFormatForView";
               echo "</td>";
             }
             else {
                $temp = $data[$value];
                echo "<td>";
                echo "$temp";
                echo "</td>";
              // $text +="<td>"+{$data[$value]}+"</td>";

             }

           }
           echo "$text";
          echo "</tr>";
        } ?>
      </tbody>
    </table>
  </body>
</html>

<!--echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<meta charset=\"utf-8\">";
echo "<title></title>";
echo "</head>";
echo "<body>";
echo "<table bordercolor='#000000' border='1' align='center' cellpadding='5' cellspacing='0' bgcolor='steelblue' id=\"colshow\">";
echo "<caption style='font-size: 20px;'>รายงาน</caption>";
echo "<thead>";
echo "<tr>";
foreach ($columeArray as $key => $value) {
  if($value == 'assetName'){
    echo "<th> ชื่อุปกรณ์ </th>";
  }
  else  if($value== 'assetID'){
    echo "<th> วันที่แจ้ง </th>";
  }
  else  if($value== 'assetDate'){
    echo "<th> วันที่แจ้ง </th>";
  }
  else  if($value== 'assetPrice'){
    echo "<th> ราคา </th>";
  }
  else  if($value== 'assetExpire'){
    echo "<th> วันหมดประกัน </th>";
  }
  else if($value == 'statusName'){
    echo "<th>สถานะอุปกรณ์</th>";
  }
  else if($value == 'vendorName'){
    echo "<th>ผู้ขายหรือผลิต </th>";
  }
  else {
    echo "<th> $value </th>";
  }

}
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$text ='';
 while($data = mysqli_fetch_array($rs)){
$text ='';
echo "<tr>";
   foreach ($columeArray as $key => $value) {
     if ($value=='assetDate') {
       $time = strtotime($data['assetDate']);
       $myFormatForView = date("Y-m-d", $time);
       echo "<td>";
       echo "$myFormatForView";
       echo "</td>";
     }else if ($value=='assetExpire') {
       $time = strtotime($data['assetExpire']);
       $myFormatForView = date("Y-m-d", $time);
       echo "<td>";
       echo "$myFormatForView";
       echo "</td>";
     }
     else {
        $temp = $data[$value];
        echo "<td>";
        echo "$temp";
        echo "</td>";
      // $text +="<td>"+{$data[$value]}+"</td>";

     }

   }
   echo "$text";
  echo "</tr>";
}

echo "</tbody>";
echo "</table>";



echo "</body>";
echo "</html>";-->


<?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html
ob_end_clean();
echo "$html";

$pdf = new mPDF('th', 'A4-L', '0', 'THSaraban');

$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');

$pdf->WriteHTML($html, 2);

$pdf->Output("MyPDF/MyPDF.pdf");     // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด
echo "<a class='btn btn-primary' href=\"MyPDF/MyPDF.pdf\"><span class='glyphicon glyphicon-print'></span> PDF</a>";
  // echo "ID {$data['assetID']}  assetType {$data['assetType']}  assetVendor {$data['vendorName']} assetDATE $myFormatForView<br >";



mysqli_close($link);


}
 ?>
