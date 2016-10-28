



 <?php
   session_start();
   if ($_SESSION['fname']){
   include('head.php');

   include('connect.php');

   include('navbar.php');

   include('config-page.php');



 }
 else {
   echo "<script>
   setTimeout(function(){
     window.location.href = 'view-login.php';
   },1000);
   </script>";
 }
  ?>
  <style>
    #das{
      color: white;
      background-color: white;
    }
  </style>
