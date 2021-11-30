<?php

include('conn.php');

// $executionStartTime = microtime(true);

header('depIndex.php');


// $search = $_REQUEST['search'];


if(isset($_GET['order'])) {
  $order = $_GET['order'];
} else {
  $order = 'department';
}

if(isset($_GET['sort'])) {
  $sort = $_GET['sort'];
} else {
  $sort = 'ASC';
}

$query = "SELECT  d.id as id,
                  d.name as department, 
                  l.name as location 
          FROM department d 
          LEFT JOIN location l 
                  ON (l.id = d.locationID) 
          ORDER BY $order $sort";

$result = $conn->query($query);

$data = [];

while ($row = $result -> fetch_assoc()) {
	array_push($data, $row);
}

$sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

// mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="src\css\bootstrap.min.css">
	<link rel="stylesheet" href="src/css/styles.css">
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
              Departments
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a href="index.php" class="dropdown-item">Employees</a></li>
              <li><a href="locIndex.php" class="dropdown-item">Locations</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </div>

<!-- -----------DEPARTMENTS----------- -->

  <div class="container">
    <a href="#addNewDep" data-bs-toggle="modal" class="btn btn-primary float-end m-3 ">
      <img src="src\building.svg" alt="Add new department" title="Add new department" width="20" height="20">
      +
    </a>

    <table class="table table-striped table-borderless table-hover">
      <thead>
        <th>
          <a href='?order=department&&sort=<?php echo $sort; ?>' class="text-decoration-none text-dark">
            Department <img src="src\arrow-down-up.svg" alt="View" width="12" height="12">
          </a>
        </th>
        <th>
          <a href='?order=location&&sort=<?php echo $sort; ?>' class="text-decoration-none text-dark">
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
            <td><?php echo ucwords($row['department']); ?></td>
            <td><?php echo ucwords($row['location']); ?></td>
            <td>
              <a href="#edit<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-warning">
                <img src="src\pencil.svg" alt="Edit" width="20" height="20">
              </a>
            </td>
            <td>
              <a href="#del<?php echo $row['id']; ?>" data-bs-toggle="modal" class="btn btn-danger">
                <img src="src\trash.svg" alt="Delete" width="20" height="20">
              </a>
            </td>
          </tr>
          <?php include('departments/depModals.php'); ?>
        <?php
          }
        ?>
      </tbody>
    </table>
		<?php include('departments/addDepModal.php'); ?>
  </div>

	<script src="src/js/jquery-3.6.0.min.js"></script>
  <script src="src/js/bootstrap.bundle.min.js"></script>
  <script src="src/js/scripts.js"></script>
</body>
</html>