<?php

include('conn.php');

// $executionStartTime = microtime(true);

header('index.php');


// $search = $_REQUEST['search'];


if(isset($_GET['order'])) {
  $order = $_GET['order'];
} else {
  $order = 'firstName';
}

if(isset($_GET['sort'])) {
  $sort = $_GET['sort'];
} else {
  $sort = 'ASC';
}

$query = "SELECT  p.id,
									p.lastName, 
									p.firstName, 
									p.jobTitle, 
									p.email, 
									d.name as department, 
									l.name as location 
						FROM personnel p 
						LEFT JOIN department d 
									ON (d.id = p.departmentID) 
						LEFT JOIN location l 
									ON (l.id = d.locationID) 
						ORDER BY $order $sort";
	
$resultSet = $conn->query($query);
	
// $data = [];

// while ($row = mysqli_fetch_assoc($result)) {

// 	array_push($data, $row);

// }

// mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="src\css\bootstrap.min.css">
	<link rel="stylesheet" href="src/css/styles.css" >
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
	<title>Company Directory 2.7</title>
</head>
<body>

<div class="sticky-top">
	<header class="bg-warning bg-gradient p-3">
		<h1 class="text-secondary d-inline-block">Company Directory 2.7</h1>
		<!-- --------SEARCH BOX--------- -->

		<form action="phpSearchAll.php" method="post" class="d-inline-flex float-end">
			<input type="text" placeholder="Search..." name="search" class="form-control">
			<input type="submit" value="Search" class="btn btn-primary">
		</form>

	</header>



	<!-- ---------------TABS--------------- -->
	<ul class="nav nav-pills nav-justified bg-light" id="pills-tab" role="tablist">
		<li class="nav-item m-1 mx-4" role="presentation">
			<button class="nav-link active fs-5" id="pills-employeesTab-tab" data-bs-toggle="pill" data-bs-target="#pills-employeesTab" type="button" role="tab" aria-controls="pills-employeesTab" aria-selected="true">Employees</button>
		</li>
		<li class="nav-item m-1 mx-4" role="presentation">
			<button class="nav-link fs-5" id="pills-departmentTab-tab" data-bs-toggle="pill" data-bs-target="#pills-departmentTab" type="button" role="tab" aria-controls="pills-departmentTab" aria-selected="false">Departments</button>
		</li>
		<li class="nav-item m-1 mx-4" role="presentation">
			<button class="nav-link fs-5" id="pills-locationTab-tab" data-bs-toggle="pill" data-bs-target="#pills-locationTab" type="button" role="tab" aria-controls="pills-locationTab" aria-selected="false">Locations</button>
		</li>
	</ul>

</div>

<div class="tab-content" id="pills-tabContent">
	<!-- -----------EMPLOYEES----------- -->
	<div class="container tab-pane fade show active" id="pills-employeesTab" role="tabpanel" aria-labelledby="pills-employeesTab">


			<a href="#addNewEmp" data-bs-toggle="modal" class="btn btn-primary float-end m-3"><img src="src\person-plus.svg" alt="Add new employee" title="Add new employee" width="20" height="20"></a>

			<?php
				if($resultSet->num_rows > 0) {
					$sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
			?>
		<!-- <div class="table-responsive"> -->
			<table class="table table-striped table-borderless table-hover">
				<thead>
					<th>
						<a href='?order=firstName&&sort=<?php echo $sort; ?>' class="text-decoration-none text-dark">
							First Name <img src="src\arrow-down-up.svg" alt="View" width="12" height="12">
						</a>
					</th>
					<th>
						<a href='?order=lastName&&sort=<?php echo $sort; ?>' class="text-decoration-none text-dark">
							Last Name <img src="src\arrow-down-up.svg" alt="View" width="12" height="12">
						</a>
					</th>
					<th>
						<a href='?order=department&&sort=<?php echo $sort; ?>' class="text-decoration-none text-dark">
							Department <img src="src\arrow-down-up.svg" alt="View" width="12" height="12">
						</a>
					</th>
					<th class="narrowTh">View</th>
					<th class="narrowTh">Edit</th>
					<th class="narrowTh">Delete</th>
				</thead>

				<tbody>
				<?php
					while($row = $resultSet -> fetch_assoc()){
						$firstName = $row['firstName'];
						$lastName = $row['lastName'];
						$department = $row['department'];
				?>
						<tr>
							<td><?php echo ucwords($firstName); ?></td>
							<td><?php echo ucwords($lastName); ?></td>
							<td><?php echo ucwords($department); ?></td>

							<!-- <td><?php echo ucwords($row['jobTitle']); ?></td> -->
							<!-- <td><?php echo $row['email']; ?></td> -->

							<td>
								<a href="#viewE<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-primary">
									<img src="src\eye.svg" alt="View" width="20" height="20">
								</a>
							</td>

							<td>
								<a href="#editE<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-warning">
									<img src="src\pencil.svg" alt="Edit" width="20" height="20">
								</a>
							</td>

							<td>
								<a href="#delE<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-danger">
									<img src="src\trash.svg" alt="Delete" width="20" height="20">
								</a>
							</td>

						</tr>
						<?php include('employees/empModals.php'); ?>
						<?php
					}
					?>
				</tbody>
			</table>
		<!-- </div> -->
			<?php
				} else {
					echo "No records returned.";
				}
			include('employees/addEmpModal.php'); ?>
	</div>

	<!-- -----------DEPARTMENTS----------- -->

	<div class="container tab-pane fade" id="pills-departmentTab" role="tabpanel" aria-labelledby="pills-departmentTab">
		<!-- <div class="well" style="margin:auto; padding:auto; width:80%;"> -->
			<a href="#addNewDep" data-bs-toggle="modal" class="btn btn-primary float-end m-3 "><img src="src\building.svg" alt="Add new department" title="Add new department" width="20" height="20">+</a>

		


			<table class="table table-striped table-borderless table-hover">
				<thead>
					<!-- <th>Department <a href='?order=department&&sort=<?php echo $sort; ?>'>
						<img src="src\arrow-down-up.svg" alt="View" width="12" height="12">
						</a>
					</th>
					<th>Location <a href='?order=location&&sort=<?php echo $sort; ?>'>
						<img src="src\arrow-down-up.svg" alt="View" width="12" height="12">
					</a>
				</th> -->
				<th>Department</th>
				<th>Location</th>
					<!-- <th class="narrowTh">View</th> -->
					<th class="narrowTh">Edit</th>
					<th class="narrowTh">Delete</th>
				</thead>
				<tbody>

				<?php
					// include('conn.php');
					// $resultD=mysqli_query($conn,"SELECT * FROM `department`");

					$queryDD = mysqli_query($conn,
						"SELECT d.id,
										d.name as department, 
										l.name as location 
							FROM department d 
							LEFT JOIN location l ON (l.id = d.locationID) 
							ORDER BY d.name, 
											 l.name"
					);

?>

				<?php
						while ($row = $queryDD -> fetch_assoc()) {
							$department = $row['department'];
							$location = $row['location'];
					?>
					<tr>
						<td><?php echo ucwords($department); ?></td>
						<td><?php echo ucwords($location); ?></td>
			
						<td>
							<a href="#editD<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-warning"><img src="src\pencil.svg" alt="Edit" width="20" height="20"></a>
						</td>

						<td>
							<a href="#delD<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-danger"><img src="src\trash.svg" alt="Delete" width="20" height="20"></a>
						</td>
							<?php include('departments/depModals.php'); ?>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
		<!-- </div> -->

		<?php include('departments/addDepModal.php'); ?>
	</div>

	<!-- -----------LOCATIONS----------- -->

	<div class="container tab-pane fade" id="pills-locationTab" role="tabpanel" aria-labelledby="pills-locationTab">
		<!-- <div class="well" style="margin:auto; padding:auto; width:80%;"> -->
			<a href="#addNewLoc" data-bs-toggle="modal" class="btn btn-primary float-end m-3"><img src="src\geo-alt.svg" alt="Add new Location" title="Add new location" width="20" height="20">+</a>
			<table class="table table-striped table-borderless table-hover">
				<thead>
					<th>Location</th>
					<!-- <th class="narrowTh">View</th> -->
					<th class="narrowTh">Edit</th>
					<th class="narrowTh">Delete</th>
				</thead>
				<tbody>
				<?php
					// include('conn.php');
					
					$queryL=mysqli_query($conn,"SELECT * FROM `location`");
					while($row=mysqli_fetch_array($queryL)){
						?>
						<tr>
							<td><?php echo ucwords($row['name']); ?></td>
							<!-- <td>
								<a href="#viewL<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-primary"><img src="src\eye.svg" alt="View" width="20" height="20"></a>
							</td> -->
							<td>
								<a href="#editL<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-warning"><img src="src\pencil.svg" alt="Edit" width="20" height="20"></a>
							</td>
							<td>
								<a href="#delL<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-danger"><img src="src\trash.svg" alt="Delete" width="20" height="20"></a>
							</td>
								<?php include('locations/locModals.php'); ?>
						</tr>
						<?php
					}
				
				?>
				</tbody>
			</table>
		<!-- </div> -->
		<?php include('locations/addLocModal.php'); 
		
					mysqli_close($conn)
		
		?>
	</div>

</div>
	<script src="src/js/jquery-3.6.0.min.js"></script>
  <script src="src/js/bootstrap.bundle.min.js"></script>
  <script src="src/js/scripts.js"></script>
</body>
</html>