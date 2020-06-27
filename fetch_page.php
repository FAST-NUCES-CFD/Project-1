<?php

require("server_conn.php");

	$sql = "SELECT id, email, password, age, city, phone_number, image_add, description FROM user";
	$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
  <script src="mindmup-editabletable.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
	<table class="table table-striped" align="center" border="1px" style="width: 1200px; line-height: 40px;">
		<tr>
			<th scope="col"><center>ID</center></th>
			<th scope="col"><center>Email</center></th>
			<th scope="col"><center>Password</center></th>
			<th scope="col"><center>Age</center></th>
			<th scope="col"><center>City</center></th>
			<th scope="col"><center>Phone Number</center></th>
			<th scope="col"><center>Photo</center></th>
			<th scope="col"><center>Description</center></th>
			<th scope="col"><center>Action</center></th>
		</tr>
		<?php
			while($row = mysqli_fetch_assoc($result))
    		{
		?>
		<tr>
			<th><?php 
				$getid = $row['id'];
				echo $row['id']
				?>				
			</th>
			<td><?php echo $row['email']?></td>
			<td><?php echo $row['password']?></td>
			<td><?php echo $row['age']?></td>
			<td><?php echo $row['city']?></td>
			<td><?php echo $row['phone_number']?></td>
			
			<?php
				if ($row['image_add'] == null)
				{
					$temp = $row['image_add'];
			?>
					<td><?php echo 'No Image' ?></td>
			<?php
				}
				else
				{
			?>
					<td><?php echo $row['image_add']?></td>
			<?php
				}
			?>
			<td><?php echo $row['description']?></td>
			<td width="165px">
				<a href="http://localhost:8012/native/delete_page.php?id=<?php echo $getid; ?>"><button class="btn btn-primary">Delete</button></a>  | <a href="http://localhost:8012/native/edit_page.php?id=<?php echo $getid; ?>"><button class="btn btn-primary">Edit</button></a>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>