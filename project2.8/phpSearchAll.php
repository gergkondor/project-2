<?php

include('conn.php');

header('phpSearchAll.php');

$search = $_POST['search'];

// $sql = "SELECT * 
// 				FROM personnel p
// 				WHERE p.firstName LIKE '%$search%'
// 					 OR p.lastName LIKE '%$search%'";

// if(isset($_GET['order'])) {
//   $order = $_GET['order'];
// } else {
//   $order = 'firstName';
// }

// if(isset($_GET['sort'])) {
//   $sort = $_GET['sort'];
// } else {
//   $sort = 'ASC';
// }

$query = "SELECT  p.id,
									p.lastName, 
									p.firstName, 
									p.jobTitle, 
									p.email, 
									d.name as department, 
									l.name as location 
									FROM personnel p 
				  FROM personnel p
				  WHERE p.firstName LIKE '%$search%'
						 OR p.lastName LIKE '%$search%'
			";

$result = $conn->query($query);

$data = [];

	foreach($result as $row){
		// echo $row["firstName"]."  ".$row["lastName"]."  ".$row["department"]."<br>";
		array_push($data, $row);
	}

// $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="src\css\bootstrap.min.css">
	<link rel="stylesheet" href="src/css/styles.css" >
	<title>Company Directory 2.8</title>
</head>
<body>

<div class="sticky-top">
    <header>
      <nav class="bg-warning">
        <div class="container d-flex justify-content-between align-items-center p-2 bd-highlight">
          <h1 class="text-secondary d-inline">Company Directory</h1> 
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Employees
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a href="depIndex.php" class="dropdown-item">Departments</a></li>
              <li><a href="locIndex.php" class="dropdown-item">Locations</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </div>
	
	<!-- -----------EMPLOYEES----------- -->
	
	<div class="container">
		<div class="container tab-pane fade show active" id="pills-employeesTab" role="tabpanel" aria-labelledby="pills-employeesTab">
		<!-- --------SEARCH BOX--------- -->
		<form action="phpSearchAll.php" method="post" class="d-inline-flex my-3">
			<input type="text" name="search" placeholder="Search..." class="form-control">
			<input type="submit" value="Search" class="btn btn-primary">
		</form>
				<!-- --------ADD NEW EMP--------- -->
		<a href="#addNewEmp" data-bs-toggle="modal" class="btn btn-primary float-end m-3">
			<img src="src\person-plus.svg" alt="Add new employee" title="Add new employee" width="20" height="20">
		</a>

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
				<th class="d-none d-md-table-cell">
					<a href='?order=department&&sort=<?php echo $sort; ?>' class="text-decoration-none text-dark">
						Department <img src="src\arrow-down-up.svg" alt="View" width="12" height="12">
					</a>
				</th>
				<th class="narrowTh px-0 col align-self-center">View</th>
				<th class="narrowTh px-0 col align-self-center">Edit</th>
				<th class="narrowTh px-0 col align-self-center">Delete</th>
			</thead>

			<tbody>
				<?php
					foreach ($data as $row) {
				?>
					<tr class="container">
						<td><?php echo ucwords($row['firstName']); ?></td>
						<td><?php echo ucwords($row['lastName']); ?></td>
						<td class="d-none d-md-table-cell"><?php echo ucwords($row['departmentID']); ?></td>
						<td class="p-0">
							<a href="#viewE<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-primary col align-self-center">
								<img src="src\eye.svg" alt="View" width="20" height="20">
							</a>
						</td>
						<td class="p-0">
							<a href="#editE<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-warning col align-self-center">
								<img src="src\pencil.svg" alt="Edit" width="20" height="20">
							</a>
						</td>
						<td class="p-0">
							<a href="#delE<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-danger col align-self-center">
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
		<?php include('employees/addEmpModal.php'); ?>
	</div>

	<script src="src/js/jquery-3.6.0.min.js"></script>
  <script src="src/js/bootstrap.bundle.min.js"></script>
  <script src="src/js/scripts.js"></script>
</body>
</html>