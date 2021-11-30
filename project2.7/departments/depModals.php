<!-- View Department Modal -->
<div class="modal fade" id="viewD<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewDepModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewDepModalLabel">Department Details</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
				<!-- <form method="POST" action="employees/viewD.php?id=<?php echo $row['id']; ?>"> -->

					<div class="row">
						<div class="col-lg-5">
							<label>Department Name:</label>
						</div>
						<div class="col-lg-7">
							<span><?php echo $row['department']; ?></span>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-5">
							<label>Location:</label>
						</div>
						<div class="col-lg-7">
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


<!-- Edit Department Modal-->
<div class="modal fade" id="editD<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editDepModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="editDepModalLabel">Edit</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST" action="departments/editD.php?id=<?php echo $row['id']; ?>">
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">Department Name:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="name" class="form-control" value="<?php echo $row['department']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label for="selectLocation" style="position:relative; top:7px;">Location:</label>
							</div>
							<div class="col-lg-9">

								<select name="locationID" id="selectLocation" class="form-control"> 
									<!-- <option value="<?php echo $row['id']; ?>" selected><?php echo $row['location']; ?></option> -->
									<?php
										$queryD2 = 'SELECT  l.id as id,
																				l.name as locationL
																FROM location l';
										$outputD = $conn->query($queryD2);

										foreach ($outputD as $outD) {
											$selected = $outD['locationL'] === $row['location'] ? 'selected' : '';
										?>
											<option value="<?php echo $outD['id']; ?>" <?php echo $selected; ?> ><?php echo $outD['locationL']; ?></option>
										<?php
											}
										?>
								</select>

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


<!-- Delete Department Modal-->
<div class="modal fade" id="delD<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="delEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
									<h4 class="modal-title" id="delEmployeeModalLabel">Delete</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
					<div class="container-fluid">
						<p><center>Are you sure to delete <strong><?php echo ucwords($row['department']); ?></strong> from the list? This method cannot be undone.</center></p> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <a href="departments/deleteD.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </div>
				
            </div>
        </div>
    </div>