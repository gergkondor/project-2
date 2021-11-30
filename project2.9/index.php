<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src\css\bootstrap.min.css">
	<link rel="stylesheet" href="src/css/styles.css" >
  <title>Company Directory 2.9</title>
</head>
<body>
  <div class="sticky-top">
    <header>
      <nav class="bg-warning">
        <div class="container d-flex justify-content-between align-items-center p-2 bd-highlight">
          <h1 class="text-secondary d-inline">Company Directory</h1> 
          <select name="select" id="select" class="form-control">
            <option value="emp">Employees</option>
            <option value="dep">Departments</option>
            <option value="loc">Locations</option>
          </select>
        </div>
      </nav>
    </header>
  </div>
	
	<div class="container">
		<!-- --------SEARCH BOX--------- -->
		<form action="phpSearchAll.php" method="post" class="d-inline-flex my-3">
			<input type="text" name="search" placeholder="Search..." class="form-control">
			<input type="submit" value="Search" class="btn btn-primary">
		</form>
				<!-- --------ADD NEW EMP--------- -->
		<a href="#addNewEmp" id="addNewEmpBtn" data-bs-toggle="modal" class="btn btn-primary float-end m-3">
			<img src="src\icons\person-plus.svg" alt="Add new employee" title="Add new employee" width="20" height="20">
		</a>

    <!-- --------------TABLE-------------- -->
    <table class="table table-striped table-borderless table-hover">
			<thead id="tableHead"></thead>
			<tbody id="tableBody"></tbody>
		</table>


        <!-- Add New Employee -->
    <div class="modal fade" id="addNewEmp" tabindex="-1" role="dialog" aria-labelledby="addEmpModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addEmpModalLabel">Add Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="employees/newE.php">
            <div class="modal-body">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td colspan="2">
                      <label class="control-label" style="position:relative; top:7px;">Firstname:</label>
                    </td>
                    <td colspan="2"> 
                      <input type="text" class="form-control" name="firstname" required>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label class="control-label" style="position:relative; top:7px;">Lastname:</label>
                    </td>
                    <td colspan="2"> 
                      <input type="text" class="form-control" name="lastname" required>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label class="control-label" style="position:relative; top:7px;">Job Title:</label>
                    </td>
                    <td colspan="2"> 
                      <input type="text" class="form-control" name="jobtitle" required>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label class="control-label" style="position:relative; top:7px;">Department:</label>
                    </td>
                    <td colspan="2"> 
                      <select name="departmentID" id="selectDep" class="form-control" required>
                        <option value="">Select department...</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label class="control-label" style="position:relative; top:7px;">Email:</label>
                    </td>
                    <td colspan="2"> 
                      <input type="text" class="form-control" name="email" required>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save</a>
            </div>
          </form>
        </div>
      </div>
    </div>


   


	</div>


  <script src="src\js\jquery-3.6.0.min.js"></script>
  <script src="src\js\bootstrap.bundle.min.js"></script>
  <script src="src\js\scripts.js"></script>
</body>
</html>