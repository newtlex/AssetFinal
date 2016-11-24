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
$maintainNumber  = $_POST['maintainNumber'];
$maintainText  = $_POST['maintainText'];
$time ='';
if($maintainText&&$maintainNumber)
{
  $time = "and MaintainDate > DATE_SUB(NOW(), INTERVAL $maintainNumber $maintainText)";
}

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


$sql = "SELECT maintainasset_table.assetID as assetID,$showColum
FROM maintainasset_table,asset_table,assettype_table,admin
WHERE asset_table.assetID = maintainasset_table.assetID
and IDType = asset_table.assetType
and maintainUserID = admin_id
$time
$searchMaintainType
$searchMaintainUserIDname
$searchMaintainDetail
$searchMaintainStatus
$searchMaintainVendor
$searchAssetType
$searchMaintianDate";



$rs =mysqli_query($link, $sql);
date_default_timezone_set('Asia/Bangkok');

$months = array(0=>"", 1=>"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
 						 "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

$birth1 = strtotime("{$maintianDateStart}");
$birth2 = strtotime("{$maintianDateEnd}");
echo "maintianDateStart $maintianDateStart";

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

if ($_POST['maintianDateStart']||$_POST['maintianDateEnd']) {
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
            if($value == 'assetName'){
              echo "<th> ชื่อุปกรณ์ </th>";
            }
            else  if($value== 'MaintainDate'){
              echo "<th> วันที่แจ้งซ่อม </th>";
            }
            else if($value == 'MaintainType'){
              echo "<th> ชนิดการซ่อม </th>";
            }
            else if($value == 'admin_fname'){
              echo "<th> ชื่อ </th>";
            }
            else if($value == 'admin_lname'){
              echo "<th> นามสกุล </th>";
            }
            else if($value == 'maintainStatus'){
              echo "<th> สถานะการซ่อม </th>";
            }
            else if($value == 'MaintainDetail'){
              echo "<th> อาการ </th>";
            }
            else if($value == 'maintainVendorName'){
              echo "<th> บริษัทที่รับผิดชอบ </th>";
            }
            else if($value == 'typeName'){
              echo "<th> ชนิดอุปกรณ์ </th>";
            }

            else {
              echo "<th> $value </th>";
            }
          } ?>
        </tr>
      </thead>
      <tbody>
        <?php $text ='';
         while($data = mysqli_fetch_array($rs)){
        $text ='';
        echo "<tr align='left'>";
           foreach ($columeArray as $key => $value) {
             if ($value=='MaintainDate') {
               $time = strtotime($data['MaintainDate']);
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

<?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html
ob_end_clean();
echo "$html";

$pdf = new mPDF('th', 'A4', '0', 'THSaraban');

$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');

$pdf->WriteHTML($html, 2);

-$pdf->Output("MyPDF/MyPDF.pdf");        // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด
echo "ดาวโหลดรายงานในรูปแบบ PDF <a href=\"MyPDF/MyPDF.pdf\">คลิกที่นี้</a>";
  // echo "ID {$data['assetID']}  assetType {$data['assetType']}  assetVendor {$data['vendorName']} assetDATE $myFormatForView<br >";



mysqli_close($link);


}
 ?>
