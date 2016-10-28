<?php
include('connect.php');
session_start();

$Name = $_GET['searchName'];
$id = $_GET['ID'];



if (isset($Name))
{
$sql = "SELECT * FROM assettype_table
where IDType = \"%$Name%\"
or typeName like \"%$Name%\"
or detail like \"%$Name%\"";

}
else if (isset($id))
{
$sql = "SELECT * FROM assettype_table where IDType = '$id' ";

}
else
{
$sql = "SELECT * FROM assettype_table";

}


$rs = mysqli_query($link, $sql);

while ($data = mysqli_fetch_array($rs))
{
  $json_data[]=array(
       'id'=>$data['IDType'],
       'Name'=>$data['typeName'],
       'Detail'=>$data['detail']);

}
echo  json_encode($json_data);

 ?>
