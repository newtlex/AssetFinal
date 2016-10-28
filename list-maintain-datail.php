<?php
  include('connect.php');


  $sql = "SELECT * FROM maintaindetail where maintainAsset_ID = {$data['MaintainID']}";
  $rsDetail = mysqli_query($link, $sql);


  while ($data = mysqli_fetch_array($rsDetail)) {


  $sql = "SELECT * FROM admin WHERE admin_id = {$data['updateUserID']}";
  $rsAdmin = mysqli_query($link, $sql);
  $dataAdmin = mysqli_fetch_array($rsAdmin);

    echo "<tr>";
    echo "<td>
    {$data['maintainAsset_ID']}
    </td>
    <td>
    {$data['updateDate']}
    </td>
    <td>
    {$data['updateDetail']}
    </td>
    <td>
    {$data['fixDetail']}
    </td>
    <td>
    {$dataAdmin['admin_fname']} {$dataAdmin['admin_lname']}
    </td>
    <td>
    {$data['technician']}
    </td>
    ";
    echo "</tr>";
  }


 ?>
