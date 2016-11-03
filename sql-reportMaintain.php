<?php

if ($_POST) {

include('connect.php');
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ

$maintianDateStart = $_POST['maintianDateStart'];
$maintianDateEnd = $_POST['maintianDateEnd'];
$assetType = $_POST['assetType'];
$MaintainType= $_POST['MaintainType'];
$MaintainDetail = $_POST['MaintainDetail'];
$maintainStatus = $_POST['maintainStatus'];
$maintainVendor = $_POST['maintainVendor'];
$maintainUserIDname  = $_POST['maintainUserIDname'];

if($MaintainType =="0"){
  $searchMaintainType = '';
}
else {
  $searchMaintainType = " AND MaintainType ='$MaintainType'";
}
if($MaintainDetail==null){
  $searchMaintainDetail = '';
}
else {
  $searchMaintainDetail = " AND MaintainDetail like '%$MaintainDetail%'";
}
if($maintainStatus =="0"){
  $searchMaintainStatus = '';
}
else {
  $searchMaintainStatus = " AND maintainStatus like '$maintainStatus'";
}
if($maintainVendor =="0"){
  $searchMaintainVendor = '';
}
else {
  $searchMaintainVendor = " AND maintainVendorName like '$maintainVendor'";
}
if($assetType=="0"){
  $searchAssetType = '';
}
else {
  $searchAssetType = " AND assetType='$assetType'";
}

if($maintainUserIDname == "0"){
  $searchMaintainUserIDname = '';
}else {
  $searchMaintainUserIDname = " AND maintainUserID = '$maintainUserIDname'";
}
if($maintianDateStart==null||$maintianDateEnd==null){
  $searchMaintianDate = '';
}
else {
  $searchMaintianDate = " AND (STR_TO_DATE(MaintainDate,'%Y-%m-%d')
  BETWEEN STR_TO_DATE('$maintianDateStart', '%Y-%m-%d')
  AND STR_TO_DATE('$maintianDateEnd', '%Y-%m-%d'))";
}



$showColum = implode(",", $_POST['showMaintainColum']);
$columeArray = (explode(",",$showColum));
array_unshift($columeArray,"assetID");


foreach ($columeArray as $key => $value) {
  //echo "$value";
}
 $time = strtotime($startDate);
 $myFormatForView = date("Y-m-d", $time);
 //echo "$myFormatForView";

$sql = "SELECT maintainasset_table.assetID as assetID,$showColum
FROM maintainasset_table,asset_table,assettype_table,admin
WHERE asset_table.assetID = maintainasset_table.assetID
and IDType = asset_table.assetType
and maintainUserID = admin_id
$searchMaintainType
$searchMaintainUserIDname
$searchMaintainDetail
$searchMaintainStatus
$searchMaintainVendor
$searchAssetType
$searchMaintianDate";



$rs =mysqli_query($link, $sql);
/*
while($data = mysqli_fetch_array($rs)){
  echo "{$data['admin_fname']}   ";
  echo "{$data['admin_lname']}   ";
  echo "{$data['maintainVendorName']}   ";
  echo "{$data['maintainStatus']}   ";
  echo "{$data['typeName']}   ";
  echo "{$data['MaintainType']}   ";
  echo "{$data['MaintainDetail']}   ";
  echo "{$data['MaintainDate']}   ";

  echo "{$data['assetID']} <br />";
}*/

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<meta charset=\"utf-8\">";
echo "<title></title>";
echo "</head>";
echo "<body>";
echo "<table class=\"table table-bordered\" id=\"colshow\">";
echo "<caption\>รายงาน</caption>";
echo "<thead>";
echo "<tr>";
//echo "<th> assetID </th>";
foreach ($columeArray as $key => $value) {
  echo "<th>$value </th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$text ='';
 while($data = mysqli_fetch_array($rs)){
echo "<tr>";
//echo "<td>{$data['assetID']}</td> ";

   foreach ($columeArray as $key => $value) {
     if ($value=='MaintainDate ') {
       $time = strtotime($data['MaintainDate ']);
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
echo "</html>";



$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html
ob_end_clean();
echo "$html";

$pdf = new mPDF('th', 'A4', '0', 'THSaraban');

$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');

$pdf->WriteHTML($html, 2);

$pdf->Output("MyPDF/MyPDF.pdf");     // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด
echo "ดาวโหลดรายงานในรูปแบบ PDF <a href=\"MyPDF/MyPDF.pdf\">คลิกที่นี้</a>";
  // echo "ID {$data['assetID']}  assetType {$data['assetType']}  assetVendor {$data['vendorName']} assetDATE $myFormatForView<br >";



mysqli_close($link);


}
 ?>
