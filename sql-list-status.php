<?php
include('connect.php');
session_start();

$Name = $_GET['searchName'];
$id = $_GET['ID'];


if (isset($Name))
{

}
else if (isset($id))
{
$sql = "SELECT * FROM status_table where statusID = '$id' ";

}
else
{
$sql = "SELECT * FROM status_table";

}


$rs = mysqli_query($link, $sql);

while ($data = mysqli_fetch_array($rs))
{
  $json_data[]=array(
       'id'=>$data['statusID'],
       'Name'=>$data['statusName']);

}
echo  json_encode($json_data);

 ?>
