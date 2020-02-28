<?php
   include_once("db_connect.php");
   $result = 0;
   
   // Edit upload location here
    $destination_path = "uploads/";
    $fileName = $_FILES['myfile']['name'];
    $target_path = $destination_path . basename( $fileName);
	$imageFileType = '.'.strtolower(pathinfo($target_path,PATHINFO_EXTENSION));
	$fileLen = strlen($imageFileType) * -1;

   // Check if file already exists
	if (file_exists($target_path)) {
		$i=0;
		$temp = $target_path;
		while (file_exists($temp)){
			$i=$i+1;
			$temp = substr($target_path, 0, $fileLen) . '-' . $i .$imageFileType;
		}
		$target_path = $temp;
	}

   if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
      $result = 1;
      $mysql_insert = "INSERT INTO uploads (file_name, upload_time, path)VALUES('".$fileName."','".date("Y-m-d H:i:s")."','".$target_path."')";
		mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
   }
   
   sleep(1);
?>

<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>);</script>   
