
<?php
include('connect.php');


$asid =139;

$sql = "SELECT * from owner where $asid = assetID and enddate = \"0000-00-00\"";
$rs =mysqli_query($link, $sql);
while($data = mysqli_fetch_array($rs))
{
 echo "adminID, {$data['adminID']}
 assetID, {$data['assetID']}
 endDate, {$data['endDate']} <BR />";
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
