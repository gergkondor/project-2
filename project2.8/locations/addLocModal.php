<!-- Add New Location -->
<div class="modal fade" id="addNewLoc" tabindex="-1" role="dialog" aria-labelledby="addLocModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="addLocModalLabel">Add Location</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST" action="locations/newL.php">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-4">
							<label class="control-label" style="position:relative; top:7px;">Location Name:</label>
						</div>
						<div class="col-lg-8">
							<input type="text" class="form-control" name="name" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</a>
				</div>
			</form>
		</div>
	</div>
</div>