<?php

    require("server_conn.php");

    $sql = "SELECT DISTINCT city
            FROM user";

    $result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Search Page</title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/lxwsd5mosjevn817prf4n7altio23wrn3e6z5hl9r41tgeea/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>



<body>

<br>
<br>
<br>
    <div class="container jumbotron">
        <form action="search_page-1.php" method="post"  enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="email"  name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="col-lg-3">
                            <input type="age" name="age" class="form-control" placeholder="Enter Age">
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name="city" id="exampleFormControlSelect1">
                                <option>Select City</option>
                                <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                        <option><?php echo $row['city']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-lg-1">
                            <button type="submit" name="submit" class="btn btn-primary">Search</button>
                        </div>
                        <div class="col-lg-2">
                        	<a href="http://localhost:8012/native/showall.php" class="btn btn-primary">Show All</a>
                        </div>
                    </div>

                </div>
                <br>
                <br>
                
                <?php
		            if (isset($_GET['email']) || isset($_GET['age']) || isset($_GET['city']))  
                    {
			    ?>
	                <span style="color: red;">
	                <div class="alert alert-danger" role="alert">
			     <?php
                        echo "This entry ";
                        if ($_GET['email'] != null) 
                        {
                            echo " '";
                            echo $_GET['email'];
                            echo "' ";
                        }
                        if ($_GET['age'] != null) 
                        {
                            echo " '";
                            echo $_GET['age'];
                            echo "' ";
                        }
                        if ($_GET['city'] != null) 
                        {
                            echo " '";
                            echo $_GET['city'];
                            echo "' ";
                        }
                        echo " is not found";
                    }
                    elseif(isset($_GET['emptybar']))
                    {
                           echo $_GET['emptybar'];
                    }
                ?>
            	</div>
            </span>
            </div>
        </form>
    </div>



</body>
</html>