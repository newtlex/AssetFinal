<?php
include('connect.php');
session_start();

$type = $_GET['searchtype'];
$Name = $_GET['searchName'];


if (isset($Name)){
  if($type =="0")
  {
    $sql = "SELECT * FROM admin
    where admin_id like \"%$Name%\"
    or admin_fname like \"%$Name%\"
    or admin_email like \"%$Name%\"";
  }
  else {
    $sql = "SELECT * FROM admin
    where (admin_fname like \"%$Name%\"
      or admin_id like \"%$Name%\"
      or admin_email like \"%$Name%\")
      and  userType like \"$type\"";
  }
}
else if ($typename == 0 && $Name==null){
    $sql = "SELECT * FROM admin";
}else {
    $sql = "SELECT * FROM admin where  userType like \"$type\"" ;
}





$rs = mysqli_query($link, $sql);

$start = 1;


while ($data = mysqli_fetch_array($rs))
{
  /*if($data['admin_id']==null)
  {
    $json_data[]=array(
         'id'=>"",
         'fname'=>"",
         'lname'=>"",
         'email'=>"",
         'tel'=>"",
         'address'=>"",
         'Type'=>"");
         break;
      }*/
  $json_data[]=array(
       'start'=>$start++,
       'id'=>$data['admin_id'],
       'fname'=>$data['admin_fname'],
       'lname'=>$data['admin_lname'],
       'email'=>$data['admin_email'],
       'tel'=>$data['admin_tel'],
       'address'=>$data['admin_address'],
       'Type'=>$data['userType']);

}
echo  json_encode($json_data);
//echo json_last_error();
 ?>
