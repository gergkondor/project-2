<!-- View Modal -->
<div class="modal fade" id="viewE<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewEmployeeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewEmployeeModalLabel">Details</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
				<!-- <form method="POST" action="employees/viewE.php?id=<?php echo $row['id']; ?>"> -->

					<!-- <table class="table table-borderless">
						<tbody>
							<tr>
								<td colspan="2"><label>Firstname:</label></td>
								<td colspan="2"><?php echo $row['firstName']; ?></td>
							</tr>
							<tr>
								<td colspan="2"><label>Lastname:</label></td>
								<td colspan="2"><?php echo $row['lastName']; ?></td>
							</tr>
							<tr>
								<td colspan="2"><label>Department:</label></td>
								<td colspan="2"><?php echo $row['department']; ?></td>
							</tr>
							<tr>
								<td colspan="2"><label>Email:</label></td>
								<td colspan="2"><?php echo $row['email']; ?></td>
							</tr>

						</tbody>
					</table> -->

					<div class="row">
						<div class="col-lg-3">
							<label>Firstname:</label>
						</div>
						<div class="col-lg-9">
							<span><?php echo $row['firstName']; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label>Lastname:</label>
						</div>
						<div class="col-lg-9">
							<span><?php echo $row['lastName']; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label>Job Title:</label>
						</div>
						<div class="col-lg-9">
							<span><?php echo $row['jobTitle']; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label>Email:</label>
						</div>
						<div class="col-lg-9">
							<span><?php echo $row['email']; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label>Department:</label>
						</div>
						<div class="col-lg-9">
							<span><?php echo $row['department']; ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label>Location:</label>
						</div>
						<div class="col-lg-9">
							<span><?php echo $row['location']; ?></span>
						</div>
					</div>

					<!-- </form> -->
				</div>
			</div> 
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Edit  Modal-->
<div class="modal fade" id="editE<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="editEmployeeModalLabel">Edit</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST" action="employees/editE.php?id=<?php echo $row['id']; ?>">
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">Firstname:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="firstname" class="form-control" value="<?php echo $row['firstName']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">Lastname:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="lastname" class="form-control" value="<?php echo $row['lastName']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">Job Title:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="jobtitle" class="form-control" value="<?php echo $row['jobTitle']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label for="selectLocation" style="position:relative; top:7px;">Department:</label>
							</div>
							<div class="col-lg-9">
								<select name="departmentID" id="selectLocation" class="form-control"> 
									<?php
										$query = 'SELECT  id,
																			name as dep
																FROM department';
										$output = $conn->query($query);

										foreach ($output as $out) {
											$selected = $out['dep'] === $row['department'] ? 'selected' : '';
									?>
										<option value="<?php echo $out['id']; ?>" <?php echo $selected; ?> ><?php echo $out['dep']; ?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">Email:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
							</div>
						</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
					<button type="submit" class="btn btn-warning">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Delete  Modal-->
<div class="modal fade" id="delE<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="delEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
									<h4 class="modal-title" id="delEmployeeModalLabel">Delete</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
					<div class="container-fluid">
						<p><center>Are you sure to delete <strong><?php echo ucwords($row['firstName'].' '.$row['lastName']); ?></strong> from the list? This method cannot be undone.</center></p> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <a href="employees/deleteE.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </div>
				
            </div>
        </div>
    </div>