<?php 
      session_start();

      $servername = "localhost";
	  $username = "root";
	  $password = "";
	  $dbname = "pwa";

	  $conn = new mysqli($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html>
<head>
	<title>PWA</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>
<body>



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
          <a class="nav-link" href="./add_student.php">Add New Student</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<br />

<div class="row offset-md-2 col-md-8">
	             <?php 
	                       if(!empty($_SESSION['success']))
	                       {
	                            echo "<script>
	                                            Swal.fire(
												  'Success?',
												  'New Student Successfully Added',
												  'success'
												);
									   </script>";

	                       	    unset($_SESSION['success']);
	                       }



	                       if(!empty($_SESSION['deleted']))
	                       {
	                            echo "<script>
	                                            Swal.fire(
												  'Success?',
												  'Student Successfully Deleted',
												  'success'
												);
									   </script>";

	                       	    unset($_SESSION['success']);
	                       }
	              ?>


<br />


             <table class="table table-bordered table-striped table-condensed">
             	    <tr>
             	    	  <th>Student Name</th>
             	    	  <th>Student Email</th>
             	    	  <th>Phone Number</th>
             	    	  <th>City</th>
             	    	  <th>Age</th>
             	    	  <th>Edit</th>
             	    	  <th>Delete</th>
             	    </tr>


            <?php 

                    $query = "SELECT * FROM students";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0)
                    {
						  while($row = $result->fetch_assoc()) 
						  {
				    ?>

					         <tr>
					         	  <td><?php echo $row['name']; ?></td>
					         	  <td><?php echo $row['email']; ?></td>
					         	  <td><?php echo $row['phone']; ?></td>
					         	  <td><?php echo $row['city']; ?></td>
					         	  <td><?php echo $row['age']; ?></td>
					         	  <td><button class="btn btn-md btn-info">Edit</button></td>
					         	  <td><a class="btn btn-md btn-danger" href="delete_student.php?sid=<?php echo $row['id'];?>">Delete</a></td>
					         </tr>

				    <?php
						  }
					}

            ?>
             </table>

</div>






</body>
</html>