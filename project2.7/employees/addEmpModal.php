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
									<input type="text" class="form-control" name="firstname">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label class="control-label" style="position:relative; top:7px;">Lastname:</label>
								</td>
								<td colspan="2"> 
									<input type="text" class="form-control" name="lastname">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label class="control-label" style="position:relative; top:7px;">Job Title:</label>
								</td>
								<td colspan="2"> 
									<input type="text" class="form-control" name="jobtitle">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label class="control-label" style="position:relative; top:7px;">Department:</label>
								</td>
								<td colspan="2"> 
									<select name="departmentID" id="selectDep" class="form-control" required>
										<option value="">Select department...</option>
										<?php

										$queryD = 'SELECT  d.id as id,
																			d.name as departmentD, 
																			l.name as location 
																FROM department d 
																LEFT JOIN location l 
																			ON (l.id = d.locationID)';

										$resultD = $conn->query($queryD);

										foreach ($resultD as $resD) {
									?>

											<option value="<?php echo $resD['id']; ?>"><?php echo $resD['departmentD']; ?></option>
											
									<?php
										}
									?>
								</select>

								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label class="control-label" style="position:relative; top:7px;">Email:</label>
								</td>
								<td colspan="2"> 
									<input type="text" class="form-control" name="email">
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

