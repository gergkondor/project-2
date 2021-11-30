<!-- Edit Department Modal-->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editDepModalLabel" aria-hidden="true">
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
								<input type="text" name="name" class="form-control" value="<?php echo $row['department']; ?>" required>
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label for="selectLocation" style="position:relative; top:7px;">Location:</label>
							</div>
							<div class="col-lg-9">
								<select name="locationID" id="selectLocation" class="form-control" required> 
									<!-- <option value="<?php echo $row['id']; ?>" selected><?php echo $row['location']; ?></option> -->
									<?php
										$queryDep = 'SELECT  l.id,
																				 l.name as locationL
																 FROM location l';
										$resultDep = $conn->query($queryDep);

										foreach ($resultDep as $resDep) {
											$selected = $resDep['locationL'] === $row['location'] ? 'selected' : '';
										?>
											<option value="<?php echo $resDep['id']; ?>" <?php echo $selected; ?> ><?php echo $resDep['locationL']; ?></option>
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
<div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="delEmployeeModalLabel" aria-hidden="true">
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