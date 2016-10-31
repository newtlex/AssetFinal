<?php

if ($_POST) {

include('connect.php');

$assetDateStart = $_POST['assetDateStart'];
$assetDateEnd = $_POST['assetDateEnd'];
$expireDateStart = $_POST['expireDateStart'];
$expireDateEnd =  $_POST['expireDateEnd'];
$assetType = $_POST['assetType'];
$assetVendor = $_POST['assetVendor'];
$assetstatus = $_POST['assetStatus'];

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
$searchStatus
$searchAssetType
$searchAssetVendor
$searchAssetDate
$searchExpireDate";

$rs =mysqli_query($link, $sql);

echo "<table class=\"table table-bordered\" id=\"colshow\">";
echo "<caption\>รายงาน</caption>";
echo "<thead>";
echo "<tr>";
foreach ($columeArray as $key => $value) {
  echo "<th>$value </th>";
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






  // echo "ID {$data['assetID']}  assetType {$data['assetType']}  assetVendor {$data['vendorName']} assetDATE $myFormatForView<br >";



mysqli_close($link);


}
 ?>