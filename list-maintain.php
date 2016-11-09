<?php
  include('connect.php');


  $sql = "SELECT * FROM maintainasset_table";
  $rs = mysqli_query($link, $sql);

  $r = "";

  $start = 1;

  while ($data = mysqli_fetch_array($rs)) {

    $_GET['id'] = $data['MaintainID'];

    if ($data['maintainStatus'] == "Completed") {
      $r = "<img src=\"image/tick_16.png\" /> เสร็จ";
    }else {
      $r = "<img src=\"image/clock_16.png\" /> กำลังดำเนินการ";
    };

    echo "<tr>";
    echo "
    <td>
    {$start}
    </td>
    <td>
    {$data['MaintainID']}
    </td>
    <td>
    {$data['assetID']}
    </td>
    <td>
    {$data['MaintainDate']}
    </td>
    <td>
    {$data['maintainUserID']}
    </td>
    <td>
    {$data['MaintainDetail']}
    </td>
    <td>
    {$r}
    </td>
    <td>
    <a class='btn btn-info' data-toggle='tooltip' title='ดูรายละเอียดอุปกรณ์' href=\"main.php?page=view-maintain-detial.php&id={$data['MaintainID']}\"><span class='glyphicon glyphicon-eye-open'></span></a>
    </td>
    <td>";
    $start++;
    if ($data['maintainStatus'] == "Completed") {
        continue;
    }
    else {
      echo "
          <a class='btn btn-warning' data-toggle='tooltip' title='อัพเดทสถานะงานซ่อม' data-placement='left' href=\"main.php?page=view-maintain-detial.php&id={$data['MaintainID']}\"><span class='glyphicon glyphicon-pencil'></span></a>
          </td>
          ";
          echo "</tr>";

        }

    }

 ?>


 <script>
 $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();
 });
 </script>
