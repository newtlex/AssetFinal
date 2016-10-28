<?php
include('connect.php');
session_start();

$typeName = $_GET['searchType'];
$searchName = $_GET["searchName"];
$offet = $_GET['pageStart'];
$LIMIT =$_GET['pageEnd'];


if ($typeName==0&&$searchName==null)
{
$sql = "SELECT * FROM asset_table LIMIT $LIMIT OFFSET $offet";

}
else if($typeName !=0&&$searchName == null)
{
$sql = "SELECT * FROM asset_table where assetType = $typeName LIMIT $LIMIT OFFSET $offet";

}
else if($typeName ==0&&$searchName != null)
{
$sql = "SELECT * FROM asset_table where assetName like \"%$searchName%\" or assetID like \"%$searchName%\"";

}
else {
$sql = "SELECT * FROM asset_table where assetName like \"%$searchName%\" AND assetType = $typeName";
}


$rs = mysqli_query($link, $sql);

while ($data = mysqli_fetch_array($rs))
{
  //$data['assetID'] = str_pad($data['assetID'],5,'0',STR_PAD_LEFT);
  $json_data[]=array(
       'assetID'=>$data['assetID'],
       'assetName'=>$data['assetName'],
       'assetDate'=>$data['assetDate'],
       'assetPrice'=>$data['assetPrice'],
       'Expire'=>$data['assetExpire'],
       'Status'=>$data['assetStatus'],
       'Type'=>$data['assetType'],
       'Vendor'=>$data['assetVendor'],
       'detail'=>$data['assetDetail']);
}

echo  json_encode($json_data);

  /*while ($data = mysqli_fetch_array($rs)) {
    //$asset_name = "{$data['assetName']}<br />";
    //$asset_date = "{$data['assetDate']}<br />";
    //$_SESSION['assetname'] = $asset_name;
    //$_SESSION['assetdate'] = $asset_date;
    $_GET['id'] = $data['assetID'];
    echo "<tr>";
    echo "<td> </td>  {$data['assetID']}</td>
    <td> {$data['assetName']} </td>
    <td> {$data['assetPrice']} </td>
    <td> <a href=\"main.php?page=view-edit-asset.php&id={$data['assetID']}\">Edit</a> </td>";

    if($_SESSION["userType"] == "admin")
    {
      echo "<td>
      <a href =\"sql-delete-asset.php?id=$data[assetID]\" onclick=\"return confirm('Are you sure?')\" > ลบ </a>
      </td>";
    }
    echo "</tr>";
    //echo "{$asset_name}";
    //echo "{$asset_date}";

  }*/

 ?>
