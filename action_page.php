<?php
$temp = 0;
if (isset($_POST['submit']))
{	
	if ($_POST['name'] == null) 
	{
		$value_name = "Field Required";
		$temp = 1;
		//header('Location: http://localhost:8012/native/index.php?nameerror=Field Required');
	}

	if ($_POST['email'] == null) 
	{
		$value_email = "Field Required";
		$temp = 1;
		//header('Location: http://localhost:8012/native/index.php?emailerror=Field Required');
	}

	if ($_POST['password'] == null) 
	{
		$value_password = "Field Required";
		$temp = 1;
		//header('Location: http://localhost:8012/native/index.php?passworderror=Field Required');
	}

	if ($_POST['age'] == null) 
	{
		$value_age = "Field Required";
		$temp = 1;
		//header('Location: http://localhost:8012/native/index.php?ageerror=Field Required');
	}

	if ($_POST['phone_number-2'] == null) 
	{
		$value_phn_number = "Field Required";
		$temp = 1;
		//header('Location: http://localhost:8012/native/index.php?phoneerror=Field Required');
	}

	else 
	{
		if (strlen($_POST['phone_number-2']) != 10) 
		{
			$value_phn_number = "Invalid Phone Number";
			$temp = 1;
		}


		 $password = $_POST['password'];
		 $specialChars = preg_match('@[^\w]@', $password);

		if(strlen($password) < 8) 
		{
		    $value_password = "Weak Password, Enter Again";
		    $temp = 1;
		}

		$age = $_POST['age'];

		$uppercase = preg_match('@[A-Z]@', $age);
		$lowercase = preg_match('@[a-z]@', $age);
		$specialChars = preg_match('@[^\w]@', $age);

		if(strlen($_POST['age']) > 2)  
		{
			$value_age = "Invalid Age";
			$temp = 1;
		}
	}
	if ($temp == 1) 
	{
		header("Location: http://localhost:8012/native/index.php?name=$value_name&email=$value_email&password=$value_password&age=$value_age&phone_number-2=$value_phn_number");
	}
	
}
	
		$phonedata = $_POST['phone_number-1'];
		$phonedata .= $_POST['phone_number-2'];

		require("server_conn.php");

 		$filename = $_FILES['uploadfile']['name'];
 		$filetmpname = $_FILES['uploadfile']['tmp_name'];
 		$folder = 'web_images/';

 		$tmp = move_uploaded_file($filetmpname, $folder.$filename);

 		$emaildata = $_POST['email'];
 		$passworddata = $_POST['password'];
 		$agedata = $_POST['age'];
 		$citydata = $_POST['city'];
 		$descriptiondata = $_POST['description'];

 		$sql = "INSERT INTO user (email,password,age,city,phone_number,image_add,description) 
 				VALUES ('$emaildata','$passworddata','$agedata','$citydata','$phonedata','$filename','$descriptiondata')";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/lxwsd5mosjevn817prf4n7altio23wrn3e6z5hl9r41tgeea/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',

      });
    </script>
</head>
<body>
		<center>
			<div class="jumbotron" style="width: 500px;">
			<?php
			if (!mysqli_query($conn,$sql)) {
			?>
				<center>
				<!--	<?php //header('http://localhost:8012/native/index.php'); ?> -->
				<label>Not Inserted !!!</label>
				<label>Try Again</label>
				<br>
				<a href="http://localhost:8012/native/index.php"><button class="btn btn-primary">Ok</button></a></center>
			<?php 
			}

			else
			{
			?>
				<center>
				<!--	<script>
						alert('Form Submitted Successfully !!!');
					</script>
					<?php //header('http://localhost:8012/native/index.php','http://localhost:8012/native/action_page.php'); ?> -->
				<label>Form Submitted Successfully !!!</label>
				<br>
				<a href="http://localhost:8012/native/index.php"><button class="btn btn-primary">Ok</button></a></center>
			<?php 
			} 
			?>
		</div>
		</center>
</body>
</html>