<?php include('head.php');
session_start();
if(!($_SESSION['status']))
{
  echo "<script>
  setTimeout(function(){
    window.location.href = 'view-login.php';
  },1);
  </script>";
}

?>
<?php
  switch ($_GET['page']) {
    case 'view-main.php':
      include('view-main.php');
      break;
    case 'view-edit-asset.php':
      include('view-edit-asset.php');
      break;
    case 'view-add-asset.php':
      include('view-add-asset.php');
      break;
    case 'view-add-maintain.php':
      include('view-add-maintain.php');
      break;
    case 'view-edit-profile.php':
      include('view-edit-profile.php');
      break;
    case 'view-add-assetType.php':
      include('view-add-assetType.php');
      break;
    case 'view-add-vendor.php':
        include('view-add-vendor.php');
        break;
    case 'view-admin.php':
        include('view-admin.php');
        break;
    case 'view-report.php':
        include('view-report.php');
        break;
    case 'view-show-maintain.php':
        include('view-show-maintain.php');
        break;
    case 'view-maintain-detial.php':
        include('view-maintain-detial.php');
        break;
    case 'view-add-computer.php':
        include('view-add-computer.php');
        break;
    case 'view-add-printer.php':
        include('view-add-printer.php');
        break;
    case 'view-add-monitor.php':
        include('view-add-monitor.php');
        break;
    case 'view-add-network.php':
        include('view-add-network.php');
        break;
    case 'view-add-other.php':
        include('view-add-other.php');
        break;
    case 'view-maintain.php':
        include('view-maintain.php');
        break;


    default:
      //echo "<h2>Home</h2>";
      include('view-main.php');
      break;
  }
 ?>
