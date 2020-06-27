<?php

	require("server_conn.php");



	if (isset($_POST["uploadfilesub"])) 
	{
		$filename = $_FILES['uploadfile']['name'];
		$filetmpname = $_FILES['uploadfile']['tmp_name'];
		$folder = 'web_images/';

		$tmp = move_uploaded_file($filetmpname, $folder.$filename);

		$sql = "INSERT INTO user(image_add) VALUES ('$filename')";

		if (mysqli_query($conn, $sql)) 
		{
			echo "Image Uploaded Succesfully";
		}
		else
		{
			echo "There was a problem uploading the pic";
		}
	}
 
?>