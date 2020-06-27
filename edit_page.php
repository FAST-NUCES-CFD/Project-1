<?php 

// Create connection
if(isset($_POST['submit']))
{

	require("server_conn.php");

	$id = $_POST['id'];
	$emaildata = $_POST['email'];
	$passworddata = $_POST['password'];
	$agedata = $_POST['age'];
	$citydata = $_POST['city'];
	$phonedata = $_POST['phone_number'];
	$descriptiondata = $_POST['description'];
	
	$sql = "UPDATE user
	SET email = '$emaildata', password = '$passworddata', age = '$agedata', city = '$citydata', phone_number = '$phonedata' , description = '$descriptiondata'
	WHERE id = $id";
	mysqli_query($conn, $sql);
	header('Location:http://localhost:8012/native/fetch_page.php');
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
  <script src="mindmup-editabletable.js"></script>
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
  <!--<script>
		$(document).ready(function(){
		  $("button").click(function(){
		    $("img").remove();
		  });
		});
	</script>-->
</head>

<body>

	<div class="container jumbotron" style="width: 500px;">

		<?php
		
		require("server_conn.php");

		$id= $_GET['id'];


		$sql = "SELECT id, email, password, age, city, phone_number, image_add, description 
				FROM user 
				WHERE id=$id";
		$result = mysqli_query($conn, $sql);
				
				if ($row = mysqli_fetch_assoc($result)) 
				{
					$id = $row['id'];
					$emaildata = $row['email'];
					$passworddata = $row['password'];
					$agedata = $row['age'];
					$citydata = $row['city'];
					$phone_numberdata = $row['phone_number'];
					$image_adddata = $row['image_add'];
					$descriptiondata = $row['description'];
				}
		?>
		<form action="edit_page.php" method="POST" enctype="multipart/form-data">
		  <div class="form-group">
		    <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>" readonly>
		  </div>
		  <div class="form-group">
		    <input type="email" name="email" class="form-control" value="<?php echo $emaildata ?>">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" name="password" class="form-control" value="<?php echo $passworddata ?>">
		  </div>
		  <div class="form-group">
		    <label for="age">Age</label>
		    <input type="age" name="age" class="form-control" value="<?php echo $agedata ?>">
		  </div>
		  <div class="form-group">
		    <label for="city">City</label>
		    <select class="form-control" name="city" value="<?php echo $citydata ?>">
		      <option>Karachi</option>
		      <option>Lahore</option>
		      <option>Islamabad</option>
		      <option>Peshawar</option>
		      <option>Quetta</option>
		    </select>
		  </div>

		  <div class="form-group">
			  <label for="phone">Enter a phone number:</label>
			  <input type="tel" name="phone_number" class="form-control" value="<?php echo $phone_numberdata ?>" placeholder="123-45-678" required>
			  <small>Format: 123-45-678</small>
		  </div>
		  <div class="form-group">
		  	<img src="web_images/<?php echo $row['image_add'] ?>" width="100" height="100">
		  	<a href="#">Remove</a><br>
		  	<label>Select image to upload:</label>	
		   	<input type="file" name="uploadfile">
		  </div>
		  <div class="form-group">
			<textarea id="mytextarea" name="description"><?php echo $descriptiondata ?></textarea>
		  </div>
		  <!-- Data Submit Button -->
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>

</body>
</html>