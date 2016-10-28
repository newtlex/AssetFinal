<?php
include('connect.php');
if(is_uploaded_file($_FILES['file']['tmp_name'])) {
	$e = $_FILES['file']['error'];

	//ถ้าเป็นเลขที่ไม่ใช่ 0 แสดงว่าเกิดข้อผิดพลาด
	if($e != 0) {
		$msg = "";
		if($e == 3) {
			$msg = "ไฟล์ถูกอัปโหลดมาไม่ครบ";
		}
		else if($e == 4) {
			$msg = "ไม่มีไฟล์อัปโหลดมา";
		}
		else {
			$msg = "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
		}

		echo '<span class="err">'.$msg.'</span>';
	}
	else {
		@mkdir("imageAsset"); //ถ้ายังไม่มีไดเร็กทอรี ให้สร้างขึ้นใหม่

		$target = "imageAsset/".$_FILES['file']['name'];
		$oldname = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
	  $ext =  pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		do {
			$r = rand();
			$newname = $oldname."_".$r.".$ext";
			$target = "imageAsset/$newname";
			if(!file_exists($target)) {
					move_uploaded_file($_FILES['file']['tmp_name'], $target);
					$sql = "SELECT * from image_table where asset_ID = '$id'";
					$rs = mysqli_query($link, $sql);
					$row = mysqli_num_rows($rs);
					echo "ID $id";
					echo " row $row sadfasdf";
					if($row)
					{
						$data = mysqli_fetch_array($rs);
						$imageID = $data['ID'];
						$sql = "UPDATE image_table set ImageName='$newname'
						         where ID = '$imageID'";
					}

					else{
						$sql = "INSERT INTO image_table VALUES('','$id','$newname')";
					}


					mysqli_query($link, $sql);
					break;
				}
			} while(file_exists($target));
	/*		echo "<h3>$ID</h3>";
			echo "<h3>จัดเก็บไฟล์เรียบร้อยแล้ว</h3>";
			echo "<img src =\"imageAsset/$newname\" />";
*/
	}
}
