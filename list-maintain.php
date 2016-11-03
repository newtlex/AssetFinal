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

  $start = 1;

  while ($data = mysqli_fetch_array($rs)) {

    $_GET['id'] = $data['MaintainID'];

    if ($data['maintainStatus'] == "inProgress") {
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
    {$data['technician']}
    </td>
    <td>
    {$r}
    </td>
    <td>
    <a class='btn btn-info' href=\"main.php?page=view-maintain-detial.php&id={$data['MaintainID']}\"><span class='glyphicon glyphicon-eye-open'></span></a>
    </td>
    <td>";
    $start++;
    if ($data['maintainStatus'] == "inProgress") {
        continue;
    }
    else {
      echo "
          <a class='btn btn-warning' href=\"main.php?page=view-maintain-detial.php&id={$data['MaintainID']}\"><span class='glyphicon glyphicon-pencil'></span></a>
          </td>
          ";
          echo "</tr>";

        }

    }

 ?>
