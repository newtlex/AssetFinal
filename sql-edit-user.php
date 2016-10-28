<?php

if ($_POST) {

  include('connect.php');
  $id = $_POST['ID'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $address = $_POST['address'];
  $userType = $_POST['userType'];
  $psw1 = $_POST['confirmPassword'];



 echo "$id";
 echo "$fname";
 echo "$lname";
 echo "$email";
 echo "$admin_tel";
 echo "$admin_address";
 echo "$userType";


if($psw1==null){

  $sql = "UPDATE admin SET admin_fname='$fname',admin_lname='$lname',admin_email='$email',
  admin_tel='$admin_tel',admin_address='$address',userType='$userType'
  WHERE (admin_id = $id)";

}
else {
    $pwhash =password_hash( $psw1, PASSWORD_DEFAULT);
  $sql = "UPDATE admin SET admin_fname='$fname',admin_lname='$lname',admin_email='$email',
  admin_tel='$admin_tel',admin_address='$address',userType='$userType',admin_password='$pwhash'
  WHERE (admin_id = $id)";
}




//  assetDate='$startdate',assetPrice='$price', assetExpire='$enddate', assetType='$astype',assetStatus='$status',assetVendor='$vendor'

      mysqli_query($link, $sql);
      $last_id =  mysqli_insert_id($link);
      echo "$last_id";

      //$query2 = "INSERT INTO location_date (assetID,LocationID,location_date) value($assetID,$LocationID,CURRENT_DATE())";


      echo "<h2>แก้ไขข้อมูลเรียบร้อย</h2>";
      echo "
      <script>
      setTimeout(function(){
      window.location.href = \"main.php?page=view-admin.php#editUser\" ;
      },3000);
      </script>
      ";
//echo "<script>alert('ยินดีต้อนรับ $fname $lname เข้าสู่ระบบ');window.location='index.php';</script>";
mysqli_close($link);


}
 ?>
