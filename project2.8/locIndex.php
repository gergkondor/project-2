<?php

include('conn.php');

// $executionStartTime = microtime(true);

header('locIndex.php');


// $search = $_REQUEST['search'];


if(isset($_GET['order'])) {
  $order = $_GET['order'];
} else {
  $order = 'name';
}

if(isset($_GET['sort'])) {
  $sort = $_GET['sort'];
} else {
  $sort = 'ASC';
}

$query = "SELECT  *
					FROM location 
					ORDER BY $order $sort";
	
$result = $conn->query($query);
	
$data = [];

while ($row = $result -> fetch_assoc()) {
	array_push($data, $row);
}

$sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="src\css\bootstrap.min.css">
	<link rel="stylesheet" href="src/css/styles.css" >
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
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
              Locations
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a href="index.php" class="dropdown-item">Employees</a></li>
              <li><a href="depIndex.php" class="dropdown-item">Departments</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </div>
    <!-- <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-warning p-4 position-relative">
        <span class="text-muted">Toggleable via the navbar brand.</span>
        <div class="position-absolute top-50 end-0 translate-middle-y p-2">
          <button type="button" class="btn btn-primary">
            <a href="index.php" class="text-decoration-none text-light">Employees</a>
          </button>
          <button type="button" class="btn btn-primary">
            <a href="depIndex.php" class="text-decoration-none text-light">Department</a>
          </button>
        </div>
      </div>
    </div> -->


    <!-- <nav class="navbar navbar-light bg-warning">
      <div class="container-fluid">
        <h1 class="text-secondary">Company Directory 2.8 Location</h1> 
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="text-dark">Location</span>
        </button>
      </div>
    </nav>
    
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-warning p-4 position-relative">
        <span class="text-muted">Toggleable via the navbar brand.</span>
        <div class="position-absolute top-50 end-0 translate-middle-y p-2">
          <button type="button" class="btn btn-primary">
            <a href="index.php" class="text-decoration-none text-light">Employees</a>
          </button>
          <button type="button" class="btn btn-primary">
            <a href="depIndex.php" class="text-decoration-none text-light">Department</a>
          </button>
        </div>
      </div>
    </div> -->
		<!-- --------SEARCH BOX--------- -->

		<!-- <form action="phpSearchAll.php" method="post" class="d-inline-flex float-end">
			<input type="text" placeholder="Search..." name="search" class="form-control">
			<input type="submit" value="Search" class="btn btn-primary">
		</form> -->




  
	<!-- ---------------TABS--------------- -->
	<!-- <ul class="nav nav-pills nav-justified bg-light" id="pills-tab" role="tablist">
		<li class="nav-item m-1 mx-4" role="presentation">
			<button class="nav-link active fs-5" id="pills-employeesTab-tab" data-bs-toggle="pill" data-bs-target="#pills-employeesTab" type="button" role="tab" aria-controls="pills-employeesTab" aria-selected="true">Employees</button>
		</li>
		<li class="nav-item m-1 mx-4" role="presentation">
			<button class="nav-link fs-5" id="pills-departmentTab-tab" data-bs-toggle="pill" data-bs-target="#pills-departmentTab" type="button" role="tab" aria-controls="pills-departmentTab" aria-selected="false">Departments</button>
		</li>
		<li class="nav-item m-1 mx-4" role="presentation">
			<button class="nav-link fs-5" id="pills-locationTab-tab" data-bs-toggle="pill" data-bs-target="#pills-locationTab" type="button" role="tab" aria-controls="pills-locationTab" aria-selected="false">Locations</button>
		</li>
	</ul> -->



<!-- <div class="tab-content" id="pills-tabContent"> -->


	<!-- -----------LOCATIONS----------- -->
<div class="container">
	<!-- <div class="container tab-pane fade" id="pills-locationTab" role="tabpanel" aria-labelledby="pills-locationTab"> -->
			<a href="#addNewLoc" data-bs-toggle="modal" class="btn btn-primary float-end m-3"><img src="src\geo-alt.svg" alt="Add new Location" title="Add new location" width="20" height="20">+</a>
			<table class="table table-striped table-borderless table-hover">
				<thead>
					<!-- <th>Location</th> -->
          <th>
            <a href='?order=name&&sort=<?php echo $sort; ?>' class="text-decoration-none text-dark">
						  Location <img src="src\arrow-down-up.svg" alt="View" width="12" height="12">
						</a>
					</th>
					<th class="narrowTh">Edit</th>
					<th class="narrowTh">Delete</th>
				</thead>
				<tbody>

				<?php
					foreach ($data as $row) {
						?>
						<tr>
							<td>
                  <?php echo ucwords($row['name']); ?>
              </td>
							<td>
								<a href="#editL<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-warning">
                  <img src="src\pencil.svg" alt="Edit" width="20" height="20">
                </a>
							</td>
							<td>
								<a href="#delL<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-danger">
                  <img src="src\trash.svg" alt="Delete" width="20" height="20">
                </a>
							</td>
								<?php include('locations/locModals.php'); ?>
						</tr>
						<?php
					}
				
				?>
				</tbody>
			</table>
		<?php include('locations/addLocModal.php'); 
		
					mysqli_close($conn);
		
		?>
	</div>
</div>

</div>
	<script src="src/js/jquery-3.6.0.min.js"></script>
  <script src="src/js/bootstrap.bundle.min.js"></script>
  <script src="src/js/scripts.js"></script>
</body>
</html>