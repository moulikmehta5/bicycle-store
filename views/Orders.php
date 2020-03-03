<?php
	require('../repository/formRepository.php'); 
	session_start();

	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: login.php");
		exit;
	}
	$justRunOnce = true;
	$pageNumberToSend = null;
	$previousNumber = null;
	$nextNumber = null;
	$repository = new FormRepository();   
	$result = $repository->getAllOrders();
	$getCountOfRecords = $repository->getCountOfRecords();
	$pages = (mysqli_num_rows($getCountOfRecords)/10);

	if (isset($_POST['searchSubmit'])) {
		$searchTerm = $_POST['searchTerm'];
		$searchBy = $_POST['searchBy'];	
		$repository = new FormRepository();
		$result = $repository->getSearchResults($searchTerm, $searchBy);
	}

	if (isset($_GET['previous'])) {
		$lastId = $_GET['lastId'];
		$result = $repository->getAllOrdersBeforeID($lastId);
	} 

	if (isset($_GET['next'])) {
		$lastId = $_GET['lastId'];
		$result = $repository->getAllOrdersAfterID($lastId);
	} 
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>User</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
				body{ font: 14px sans-serif; text-align: center; }
				div.dropdown_container {
						width:100px;
				}

				select.my_dropdown {
						width:auto;
				}

				/*IE FIX */
				select#my_dropdown {
						width:100%;
				}

				select:focus#my_dropdown {
						width:auto\9;
				}  
				.col-lg-6 {
					padding:10px;
				}
		</style>    
	</head>
	<body>
		<div class="topnav" align="left">
			<a href="adminPage.php" class="btn btn-primary">Home</a><br>
			<div class="col-lg-12">
				<form action="" method="POST">
					<div class="col-lg-6">
						<div class="dropdown_container">
							<select name="searchBy" id="my_dropdown">
								<option > Search By </option>
								<option value="Brand"> Brand </option>
								<option value="Gender"> Gender </option>
								<option value="Color"> Color </option>
								<option value="first_name"> First Name </option>
								<option value="last_name"> Last Name </option>
								<option value="city"> City </option>
								<option value="state"> State </option>
							</select>        	
						</div>
					</div>
					<div class="col-lg-6">
						<input type="text" name="searchTerm" placeholder="Search.."><button name="searchSubmit" type="submit">Search</button>
					</div>
				</form>
			</div>
		</div>
		<br>
		<div>
			<a href="logout.php" class="topleft">
				<u> Logout </u>
			</a>
		</div>
		<hr>

		<?php
			echo "<table class='table table-bordered' border='1 solid black;margin-left:auto;margin-right:auto;' cellpadding=1 width='70%' align='center'>
			<tr>
				<th>ID</th>
				<th>Brand</th>
				<th>Gender</th>
				<th>Color</th>
				<th>Price</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>ZipCode</th>
				<th> Created </th>
			</tr>";

			while($row = mysqli_fetch_array($result))
			{
				
				$pageNumberToSend = $row['id'];
				
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['brand'] . "</td>";
				echo "<td>" . $row['gender'] . "</td>";
				echo "<td>" . $row['color']. "</td>";
				echo "<td>" . $row['price']. "</td>";
				echo "<td>" . $row['first_name']. "</td>";
				echo "<td>" . $row['last_name']. "</td>";
				echo "<td>" . $row['address']. "</td>";
				echo "<td>" . $row['city']. "</td>";
				echo "<td>" . $row['state']. "</td>";
				echo "<td>" . $row['pin_code']. "</td>";
				echo "<td>" . $row['created_at']. "</td>";
				echo "</tr>";
			}
			echo "</table>";

		?>
		<div class="pagination">
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<?php
						if ($pageNumberToSend != 1)	{
							echo '<li class="page-item"><a class="page-link" href="?previous=1&lastId='.$pageNumberToSend.'"> Previous </a></li>';	
						}					
						echo '<li class="page-item"><a class="page-link" href="?next=1&lastId='.$pageNumberToSend.'"> Next </a></li>';			
					?>
					
				</ul>
			</nav>
		</div>
	</body>
</html>