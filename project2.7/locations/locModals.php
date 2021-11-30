<!-- View -->
<div class="modal fade" id="viewL<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewLocationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
									<h4 class="modal-title" id="viewLocationModalLabel">Location Details</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
				<div class="modal-body">
				<?php
					$viewLoc=mysqli_query($conn,"SELECT * FROM location WHERE id='".$row['id']."'");
					$vrow=mysqli_fetch_array($viewLoc);
				?>
				<div class="container-fluid">
				<form method="POST" action="locations/viewL.php?id=<?php echo $vrow['id']; ?>">
					<div class="row">
						<div class="col-lg-4">
							<label>Location Name:</label>
						</div>
						<div class="col-lg-8">
							<span><?php echo $vrow['name']; ?></span>
						</div>
					</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
				</div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="editL<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editLocationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
									<h4 class="modal-title" id="editLocationModalLabel">Edit Location</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
				<?php
					$editLoc=mysqli_query($conn,"SELECT * FROM location WHERE id='".$row['id']."'");
					$erow=mysqli_fetch_array($editLoc);
				?>
				<div class="container-fluid">
				<form method="POST" action="locations/editL.php?id=<?php echo $erow['id']; ?>">
					<div class="row">
						<div class="col-lg-4">
							<label style="position:relative; top:7px;">Location Name:</label>
						</div>
						<div class="col-lg-8">
							<input type="text" name="name" class="form-control" value="<?php echo $erow['name']; ?>">
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
<!-- /.modal -->


<!-- Delete -->
<div class="modal fade" id="delL<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="delLocationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
									<h4 class="modal-title" id="delLocationLabel">Delete Location</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <div class="modal-body">
				<?php
					$delLoc=mysqli_query($conn,"SELECT * FROM location WHERE id='".$row['id']."'");
					$drow=mysqli_fetch_array($delLoc);
				?>
				<div class="container-fluid">
					<p><center>Are you sure to delete <strong><?php echo ucwords($drow['name']); ?></strong> from the list? This method cannot be undone.</center></p> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <a href="locations/deleteL.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->