<?php

if ($_POST) {

  include('connect.php');
$startDate = $_POST['startDate'];
$enddate = $_POST['enddate'];
 echo " startDate $startDate <br >";
 echo " enddate $enddate <br >";


 $time = strtotime($startDate);
 $myFormatForView = date("Y-m-d", $time);
 //echo "$myFormatForView";


$sql = "SELECT * from asset_table
        where STR_TO_DATE(assetDATE, '%Y-%m-%d')
        BETWEEN STR_TO_DATE('$startDate', '%Y-%m-%d')
        AND STR_TO_DATE('$enddate', '%Y-%m-%d')";

 $rs =mysqli_query($link, $sql);

 while($data = mysqli_fetch_array($rs)){
   $time = strtotime($data['assetDate']);
   $myFormatForView = date("Y-m-d", $time);
   echo "ID {$data['assetID']}  assetDATE $myFormatForView<br >";
 }











      /*echo "
      <script>
      setTimeout(function(){
      window.location.href = \"main.php?page=view-admin.php#editUser\" ;
      },3000);
      </script>
      ";*/
mysqli_close($link);


}
 ?>
