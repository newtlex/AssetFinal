
<?php
include('connect.php');




$sql = "SELECT maintainasset_table.assetID as assetID FROM maintainasset_table";
$rs =mysqli_query($link, $sql);
while($data = mysqli_fetch_array($rs))
{
 echo "assetID, {$data['assetID']} <BR />";
}
$owner = $data['adminID'];
$admin = "admin";
$sql = "SELECT * from admin where admin_id = '$owner' or userType like '$admin'";
$rs =   mysqli_query($link, $sql);
while($data = mysqli_fetch_array($rs)){
 echo "admin_email, {$data['admin_email']}
 admin_id, {$data['admin_id']}
 endDate, {$data['endDate']} <BR />";}
//include("sendmail.php");

?>
