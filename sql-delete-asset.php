<?php
    include('connect.php');
    $id = $_GET['id'];



echo "$id";
  $sql = "DELETE FROM asset_table where assetID=$id";
  $rs = mysqli_query($link, $sql);
//  $data = mysqli_fetch_array($rs);
echo "<h2>ลบข้อมูลเรียบร้อย</h2>";
echo "
<script>
setTimeout(function(){
  window.location.href = 'main.php';
},1500);
</script>
";
?>
