<!DOCTYPE html>
<html>
<head>
	<title>Native Project</title>
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
	<br>
	<br>
	<br>
	<div class="container jumbotron" style="width: 500px;">
		<form action="action_page.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="name">Name:</label>
		    <input type="name" name="name" class="form-control" id="name">
		     <span style="color: red;">
		     	<?php
		            if(isset($_GET['name']))
		            {
				        echo $_GET['name'];
		            }   
                ?>
             </span>
		  </div>
		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" name="email" class="form-control" id="email">
		    <span style="color: red;">
		     	<?php
		            if(isset($_GET['email']))
		            { 
		            	echo $_GET['email'];
		            }
                   
                ?>
            </span>
		  </div>
		  <div class="form-group">
		  	<label for="pwd">Password:<span style="font-size: 12px;"> (Atleast 8 Characters including numbers)</span></label>
		  	<input type="password" name="password" class="form-control" id="pwd">
		  	 <span style="color: red;">
		     	<?php
		            if(isset($_GET['password']))
		            {
			            echo $_GET['password'];
		            }  
                ?>
             </span>
		  </div>
		  <div class="form-group">
		    <label for="age">Age</label>
		    <input type="age" name="age" class="form-control" id="age">
		     <span style="color: red;">
		     	<?php
		            if(isset($_GET['age']))
		            {
			            echo $_GET['age'];
		            }
                ?>
             </span>
		  </div>
		  <div class="form-group">
		    <label for="city">City</label>
		    <select class="form-control" name="city" id="city">
		      <option>Karachi</option>
		      <option>Lahore</option>
		      <option>Islamabad</option>
		      <option>Peshawar</option>
		      <option>Quetta</option>
		    </select>
		  </div>

		  <div class="form-group">
			  <label for="phone">Enter a phone number:</label>
			  
			  <div class="row">
		    	<div class="col-lg-3">
		    		<input type="tel" placeholder="+92" class="form-control" id="pwd" readonly>
		    		<input type="hidden" name="phone_number-1" value="+92">
		    	</div>
		    	<div class="col-lg-9">
		    		<input type="tel" name="phone_number-2" class="form-control" id="pwd" placeholder="321-1234567">
		    		 <span style="color: red;">
				     	<?php
				        if(isset($_GET['phone_number-2']))
			            {
				            echo $_GET['phone_number-2'];
			            }
                ?>
             		</span>
		    	</div>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label>Select image to upload:</label>	
		    <input type="file" name="uploadfile">
		  </div>

		  
		  <!-- Data Submit Button -->
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		
		</form>

		<br>
		<br>
		<a href="http://localhost:8012/native/fetch_page.php" class="btn btn-primary">Fetch Data</a>

		
	</div>

</body>
</html>
