<?php
include('connect.php');
session_start();

$Name = $_GET['searchName'];
$id = $_GET['ID'];


if (isset($Name))
{
$sql = "SELECT * FROM vendor_table
where vendorID = \"%$Name%\"
or vendorName like \"%$Name%\"
or ContactName like \"%$Name%\"
or vendorPhone like \"%$Name%\"
or vendorAddress like \"%$Name%\"";

}
else if (isset($id))
{
$sql = "SELECT * FROM vendor_table where vendorID = '$id' ";

}
else
{
$sql = "SELECT * FROM vendor_table";

}


$rs = mysqli_query($link, $sql);

while ($data = mysqli_fetch_array($rs))
{
  $json_data[]=array(
       'id'=>$data['vendorID'],
       'vendorName'=>$data['vendorName'],
       'contactName'=>$data['ContactName'],
       'Phone'=>$data['vendorPhone'],
       'Address'=>$data['vendorAddress'],);

}
echo  json_encode($json_data);

 ?>
