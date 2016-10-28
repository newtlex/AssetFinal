<?php
  include('connect.php');

  $img_status="
  		[ <img src=\"image/clock_16.png\" /> กำลังดำเนินการ  ]
  		[ <img src=\"image/tick_16.png\" />  เสร็จ ]
  		";
      echo "{$img_status}";



  $sql = "SELECT * FROM maintainasset_table";
  $rs = mysqli_query($link, $sql);

  $r = "";



  while ($data = mysqli_fetch_array($rs)) {

    $_GET['id'] = $data['MaintainID'];

    if ($data['maintainStatus'] == "Completed") {
      $r = "<img src=\"image/tick_16.png\" /> เสร็จ";
    }else {
      $r = "<img src=\"image/clock_16.png\" /> กำลังดำเนินการ";
    };

    echo "<tr>";
    echo "<td>
    {$data['MaintainID']}
    </td>
    <td>
    {$data['assetID']}
    </td>
    <td>
    {$data['MaintainName']}
    </td>
    <td>
    {$data['MaintainDate']}
    </td>
    <td>
    {$data['MaintainDetail']}
    </td>
    <td>
    {$data['technician']}
    </td>
    <td>
    <a href=\"main.php?page=view-maintain-detial.php&id={$data['MaintainID']}\">$r</a> <!---->
    </td>
    ";
    echo "</tr>";
  }


 ?>
