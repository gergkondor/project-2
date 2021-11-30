<!-- Add New Department -->
<div class="modal fade" id="addNewDep" tabindex="-1" role="dialog" aria-labelledby="addDepModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addDepModalLabel">Add Department</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST" action="departments/newD.php">
				<div class="modal-body">
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td colspan="2">
									<label class="control-label" style="position:relative; top:7px;">Department Name:</label>
								</td>
								<td colspan="2"> 
									<input type="text" class="form-control" name="name">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label class="control-label" style="position:relative; top:7px;">Location:</label>
								</td>
								<td colspan="2"> 
									<select name="locationID" id="selectLoc" class="form-control" required>
										<option value="">Select location...</option>
										<?php
											$queryL = 'SELECT id,
																				name as location 
																	FROM location';
											$resultL = $conn->query($queryL);

											foreach ($resultL as $resL) {
										?>
												<option value="<?php echo $resL['id']; ?>"><?php echo $resL['location']; ?></option>
										<?php
											}
										?>
									</select>
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

