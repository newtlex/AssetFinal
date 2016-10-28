<?php include('connect.php');
session_start();

$typename = $_POST['searchtype'];
$searchName = $_POST['searchName'];
echo "seacchname.$searchName";
  echo "typename1.$typename";
$searchName2 = "%".$searchName."%";

if(isset($searchName)) {
    # cssdfode...
    echo "seacchname2.$searchName2";
  $sql = "SELECT * FROM asset_table where (assetName LIKE '%$searchName%' or assetID = '$searchName')";
  }
else if (($typeName==0))
{
$sql = "SELECT * FROM asset_table";
    echo "typename2.$typename";
}
else if($typeName!=0)
{
$sql = "SELECT * FROM asset_table where assetType = $typename";

}

$rs = mysqli_query($link, $sql);
 ?>
