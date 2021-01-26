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
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">   
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Home</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="./add_student.php">Add New Student</a>
        </li>
      </ul>
      
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

	                       	    unset($_SESSION['deleted']);
	                       }


	                       if(!empty($_SESSION['successfully_updated']))
	                       {
	                            echo "<script>
	                                            Swal.fire(
												  'Success?',
												  'Student Successfully updated',
												  'success'
												);
									   </script>";

	                       	    unset($_SESSION['successfully_updated']);
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
					         	  <td><a class="btn btn-md btn-info" href="edit_students.php?sid=<?php echo $row['id'];?>">Edit</a></td>
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