

<!DOCTYPE html>
<html>
<head>
	<title>PWA</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>
<body>



<?php 
      session_start();

      $servername = "localhost";
	  $username = "root";
	  $password = "";
	  $dbname = "pwa";

	  $conn = new mysqli($servername, $username, $password, $dbname);
     
      

      if (isset($_POST['submit']))
      {
		      	    $name = $_POST['name'];
		      	    $email = $_POST['email'];
		      	    $city = $_POST['city'];
		      	    $age = $_POST['age'];
		      	    $phone = $_POST['phone'];

		      	    
		      	    if (empty($_POST["name"])) {
					    $nameErr = "Name is required";
					}else{
						$nameErr = "";
					}

					if (empty($_POST["email"])) {
					    $emailErr = "Email is required";
					}else{
						$emailErr = "";
					}

					if (empty($_POST["city"])) {
					    $cityErr = "City is required";
					}else{
						$cityErr = "";
					}

					if (empty($_POST["age"])) {
					    $ageErr = "Age is required";
					}else{
						$ageErr = "";
					}

					if (empty($_POST["phone"])) {
					    $phoneErr = "Phone is required";
					}else{
						 $phoneErr = "";
					}


					if($nameErr || $emailErr || $cityErr || $ageErr || $phoneErr)
					{
						   
					}else{
						    $sql = "INSERT INTO students (name , email , city , phone , age) VALUES ('".$name."','".$email."','".$city."','".$age."','".$phone."')";

						    if ($conn->query($sql) === TRUE) 
						    {
								   
								   $_SESSION['success'] = 'New Student Successfully Added';

								   echo "<script>
                                        window.location = './index.php';
								   </script>";
							}
					}


		      	    

      }
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Add New Student</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>





<br /><br />

<div class="row offset-md-2 col-md-8">
<form action="" method="post">
		  <div class="mb-3">
				    <label  class="form-label">Student Name</label>
				    <input type="text" class="form-control" name="name">
				    <span class="error" style="color:red;">* <?php 
							                        if(!empty($nameErr)) {
							                              echo $nameErr;
							                        }
				                          ?></span>
		  </div>
		  
		  <div class="mb-3">
				    <label  class="form-label">Email Address</label>
				    <input type="text" class="form-control" name="email">
				    <span class="error" style="color:red;">* <?php 
							                        if(!empty($emailErr)) {
							                              echo $emailErr;
							                        }
				                          ?></span>
		  </div>

		  <div class="mb-3">
				    <label  class="form-label">City</label>
				    <input type="text" class="form-control" name="city">
				    <span class="error" style="color:red;">* <?php 
							                        if(!empty($cityErr)) {
							                              echo $cityErr;
							                        }
				                          ?></span>
		  </div>

		  <div class="mb-3">
				    <label  class="form-label">Phone Number</label>
				    <input type="text" class="form-control" name="phone">
				    <span class="error" style="color:red;">* <?php 
							                        if(!empty($phoneErr)) {
							                              echo $phoneErr;
							                        }
				                          ?></span>
		  </div>

		  <div class="mb-3">
				    <label  class="form-label">Age</label>
				    <input type="text" class="form-control" name="age">
				    <span class="error" style="color:red;">* <?php 
							                        if(!empty($ageErr)) {
							                              echo $ageErr;
							                        }
				                          ?></span>
		  </div>

		  <input type="submit" name="submit" value="Submit" class="btn btn-success">
</form>
</div>

</body>
</html>