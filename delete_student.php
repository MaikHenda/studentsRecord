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


<?php 
         if(isset($_GET['sid']))
         {

                      $sql = "DELETE from students where id = ".$_GET['sid'];
                      if ($conn->query($sql) === TRUE) 
                      {
						           $_SESSION['deleted'] = 'Student Successfully Removed';

								   echo "<script>
                                        window.location = './index.php';
								   </script>";
					  }
         }

?>


</body>
</html>