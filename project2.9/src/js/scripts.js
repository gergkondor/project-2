// ----------GET EMPLOYEES----------
var getEmp = () => {

  $.ajax({
    url: "php/getAll.php",
    type: "GET",
    dataType: "json",

    success: function (response) {
      // console.log(response);
      var data = response.data;

      var rows = "";

      for (var elem of data) {
        rows += 
        '<tr class="border-bottom">' +
          '<td class="d-none" id="row' + elem.id + '">' + elem.departmentID + '</td>' +
          '<td>' + elem.firstName + '</td>' +
          '<td>' + elem.lastName + '</td>' +
          '<td class="d-none d-md-table-cell">' + elem.department + '</td>' +
          '<td>' +
            '<a href="#viewE' + elem.id + '" data-bs-toggle="modal" class="btn btn-primary col align-self-center">' +
              '<img src="src/icons/eye.svg" alt="View" width="20" height="20">' +
            '</a>' +
          '</td>' +
          '<td>' +
            '<a href="#editE' + elem.id + '" data-bs-toggle="modal" class="btn btn-warning col align-self-center">' +
              '<img src="src/icons/pencil.svg" alt="Edit" width="20" height="20">' +
            '</a>' +
          '</td>' +
          '<td>' +
            '<a href="#delE' + elem.id + '" data-bs-toggle="modal" class="btn btn-danger col align-self-center">' +
              '<img src="src/icons/trash.svg" alt="Delete" width="20" height="20">' +
            '</a>' +
          '</td>' +
        '</tr>'
        ;
        
      }
      $("#empTBody").html(rows);
      

      var modalsEmp = "";

      for (var elem of data) {
        modalsEmp += 
        // View Modal
        '<div class="modal fade" id="viewE' + elem.id +'" tabindex="-1" role="dialog" aria-labelledby="viewEmployeeModalLabel" aria-hidden="true">' +
          '<div class="modal-dialog">' +
            '<div class="modal-content">' +
              '<div class="modal-header bg-info bg-gradient">' +
                '<h4 class="modal-title text-white" id="viewEmployeeModalLabel">Employee Details</h4>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
              '</div>' +
              '<div class="modal-body">' +
                '<div class="container-fluid">' +
                  '<div class="d-flex align-items-center">' +
                    '<div class="m-3 w-100 text-center">' +
                      '<div class="image m-2"> <img src="src/icons/person-circle.svg" class="rounded" width="140"> </div>' +
                      '<h4>' + elem.firstName + ' ' + elem.lastName + '</h4> ' +
                      '<span>' + elem.jobTitle + '</span><br>' +
                      '<span>' + elem.department + '</span> - ' +
                      '<span>' + elem.location + '</span><br>' +
                      '<a href="mailto:' + elem.email + '">' + elem.email + '</a><br>' +
                    '</div>' +
                  '</div>' +
                '</div>' +
              '</div>' +
            '</div>' +
          '</div>' +
        '</div>' +

        // Edit Employee Modal
        '<div class="modal fade" id="editE' + elem.id + '" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">' + 
          '<div class="modal-dialog">' +
            '<div class="modal-content">' +
              '<div class="modal-header bg-warning bg-gradient">' +
                '<h4 class="modal-title text-white" id="editEmployeeModalLabel">Edit Employee Details</h4>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
              '</div>' +
              '<form method="POST" action="employees/editE.php?id=' + elem.id + '">' +
                '<div class="modal-body">' +

                  '<div class="container-fluid">' +
                    '<div class="mb-3">' +
                      '<label for="firstname" class="form-label">First Name:</label>' +
                      '<input type="text" name="firstname" class="form-control" id="firstname" value="' + elem.firstName + '" required>' +
                    '</div>' +
                    '<div class="mb-3">' +
                      '<label for="lastName" class="form-label">Last Name:</label>' +
                      '<input type="text" name="lastname" class="form-control" id="lastName" value="' + elem.lastName + '" required>' +
                    '</div>' +
                    '<div class="mb-3">' +
                      '<label for="jobTitle" class="form-label">Job Title:</label>' +
                      '<input type="text" name="jobtitle" class="form-control" id="jobTitle" value="' + elem.jobTitle + '" required>' +
                    '</div>' +
                    '<div class="mb-3">' +
                      '<label for="selectDepart" class="form-label">Department:</label>' +
                      '<select name="selectDepart" id="selectDepart" class="form-control selectDepart" required>' +
                        '<option value="">Select...</option>' +
                      '</select>' +
                   '</div>' +
                    '<div class="mb-3">' +
                      '<label for="email" class="form-label">Email:</label>' +
                      '<input type="email" class="form-control" name="email" id="email" value="' + elem.email + '" required>' +
                    '</div>' +
                  '</div>' +
                  
                '</div>' +
                '<div class="modal-footer">' +
                  '<button type="submit" class="btn btn-warning">Save</button>' +
                '</div>' +
              '</form>' +
            '</div>' +
          '</div>' +
        '</div>' +

        //  Delete Employee Modal
        '<div class="modal fade" id="delE' + elem.id + '" tabindex="-1" role="dialog" aria-labelledby="delEmployeeModalLabel" aria-hidden="true">' +
          '<div class="modal-dialog">' +
            '<div class="modal-content">' +
              '<div class="modal-header bg-danger bg-gradient">' +
                '<h4 class="modal-title text-white" id="delEmployeeModalLabel">Delete Employee</h4>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
              '</div>' +
              '<div class="modal-body">' +
                '<div class="container-fluid">' +
                  '<p><center>Are you sure to delete <strong>' + elem.firstName + ' ' + elem.firstName + '</strong> from the list? <br>This method cannot be undone.</center></p>' +
                '</div>'  +
              '</div>' +
              '<div class="modal-footer">' +
                  '<a href="employees/deleteE.php?id=' + elem.id + '" class="btn btn-danger">Delete</a>' +
              '</div>' +
            '</div>' +
          '</div>' +
        '</div>';
    }

    $("#modals").html(modalsEmp);


  },
  })
};

getEmp();



var addDepOptionsToEdit = () => {
  $.ajax({
    url: "php/getAllDepartments.php",
    type: "GET",
    dataType: "json",

    success: function (resp) {
      // console.log(resp);
      var dataD = resp.data;
      // console.log(dataD);

      var optionsD = '';

      var id = $(".rows").attr("id");
      console.log(id);
      var currentDepart = $(id).text();
      console.log(currentDepart);
      
      for (var elem of dataD) {
        var selected = elem.name === currentDepart ? 'selected' : '';
        // optionsD += '<option value="' + elem.id + '">' + elem.name + '</option>';
        optionsD += '<option value="' + elem.id + '" ' + selected + ' >' + elem.name + '</option>';
      }

      $(".selectDepart").append(optionsD);
      
    },
  });
};
addDepOptionsToEdit();

// $("#selectDep").append($('<option></option>').attr('value', data.id).text(data.department));

// ----------GET DEPARTMENT----------
var getDep = () => {

  $.ajax({
    url: "php/getAllDepartmentJoined.php",
    type: "GET",
    dataType: "json",

    success: function (response) {
      // console.log(response);
      var data = response.data;

      var rows = "";

      for (var elem of data) {
        rows += 
        '<tr class="border-bottom depTRow">' +
          '<td>' + elem.department + '</td>' +
          '<td>' + elem.location + '</td>' +
          '<td>' +
            '<a href="#editD' + elem.id + '" data-bs-toggle="modal" class="btn btn-warning col align-self-center">' +
              '<img src="src/icons/pencil.svg" alt="Edit" width="20" height="20">' +
            '</a>' +
          '</td>' +
          '<td>' +
            '<a href="#delD' + elem.id + '" data-bs-toggle="modal" class="btn btn-danger col align-self-center">' +
              '<img src="src/icons/trash.svg" alt="Delete" width="20" height="20">' +
            '</a>' +
          '</td>' +
        '</tr>'
        ;
      }
      $("#depTBody").html(rows);
      // $("#selectDep").append($('<option></option>').attr('value', data.id).text(data.department));


        var modalsDep = "";

      for (var elem of data) {
        modalsDep += 
        // Edit Modal
        '<div class="modal fade" id="editD' + elem.id + '" tabindex="-1" role="dialog" aria-labelledby="editDepModalLabel" aria-hidden="true">' +
          '<div class="modal-dialog">' +
            '<div class="modal-content">' +
              '<div class="modal-header bg-warning bg-gradient">' +
                '<h4 class="modal-title text-white" id="editDepModalLabel">Edit Department</h4>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
              '</div>' +
              '<form method="POST" action="departments/editD.php?id=' + elem.id + '">' +
                '<div class="modal-body">' +
                  '<div class="container-fluid">' +
                    '<div class="mb-3">' +
                      '<label for="department" class="form-label">Department Name:</label>' +
                      '<input type="text" name="name" class="form-control" id="department" value="' + elem.department + '" required> ' +
                      '</div>' +
                      '<div class="mb-3">' +
                      '<label for="selectLocation" class="form-label">Location:</label>' +
                      '<select name="locationID" id="selectLocation" class="form-control selectLocation" required> ' +
                    '</select>' +
                  '</div>' +
                '</div>' +
              '</div>' +
            '<div class="modal-footer">' +
          '<button type="submit" class="btn btn-warning">Save</button>' +
        '</div>' +
        '</form>' +
        '</div>' +
        '</div>' +
        '</div>' +

        //  Delete Modal
        '<div class="modal fade" id="delD' + elem.id + '" tabindex="-1" role="dialog" aria-labelledby="delEmployeeModalLabel" aria-hidden="true">' +
          '<div class="modal-dialog">' +
            '<div class="modal-content">' +
              '<div class="modal-header bg-danger bg-gradient">' +
                '<h4 class="modal-title text-white" id="delEmployeeModalLabel">Delete Department</h4>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
              '</div>' +
              '<div class="modal-body">' +
                '<div class="container-fluid">' +
                  '<p><center>Are you sure to delete <strong>' + elem.department + '</strong> from the list? <br>This method cannot be undone.</center></p>' +
                '</div>'  +
              '</div>' +
              '<div class="modal-footer">' +
                  // '<a href="php/deleteDepartmentByID.php?id=' + elem.id + '" class="btn btn-danger">Delete</a>' +
                  '<a href="departments/deleteD.php?id=' + elem.id + '" class="btn btn-danger">Delete</a>' +
                  // '<a href="" id="' + elem.id + '" class="btn btn-danger btnDelete">Delete</a>' +
                  // '<button type="button" id="btnDelete" class="btn btn-danger">DeleteBtn</button>' +
              '</div>' +
            '</div>' +
          '</div>' +
        '</div>'
      }
      $("#modals").append(modalsDep);



    },
  });

};
getDep();

// ----------GET LOCATION----------
var getLoc = () => {

  $.ajax({
    url: "php/getLocation.php",
    type: "GET",
    dataType: "json",

    success: function (response) {
      // console.log(response);
      var data = response.data;

      var rows = "";

      for (var elem of data) {
        rows += 
        '<tr class="border-bottom">' +
          '<td>' + elem.name + '</td>' +
          '<td>' +
            '<a href="#editL' + elem.id + '" data-bs-toggle="modal" class="btn btn-warning col align-self-center">' +
              '<img src="src/icons/pencil.svg" alt="Edit" width="20" height="20">' +
            '</a>' +
          '</td>' +
          '<td>' +
            '<a href="#delL' + elem.id + '" data-bs-toggle="modal" class="btn btn-danger col align-self-center">' +
              '<img src="src/icons/trash.svg" alt="Delete" width="20" height="20">' +
            '</a>' +
          '</td>' +
        '</tr>'
        ;
      }
      $("#locTBody").html(rows);



      var modalsLoc = "";

      for (var elem of data) {
        modalsLoc += 
        // Edit Department Modal
        '<div class="modal fade" id="editL' + elem.id + '" tabindex="-1" role="dialog" aria-labelledby="editLocationModalLabel" aria-hidden="true">' +
          '<div class="modal-dialog">' +
            '<div class="modal-content">' +
              '<div class="modal-header bg-warning bg-gradient">' +
                '<h4 class="modal-title text-white" id="editLocationModalLabel">Edit Location</h4>' +
              '	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
              '</div>' +
              '<form method="POST" action="locations/editL.php?id=' + elem.id + '">' +
                '<div class="modal-body">' +
                  '<div class="container-fluid">' +
                    '<div class="mb-3">' +
                      '<label for="location" class="form-label">Location Name:</label>' +
                      '<input type="text" name="name" class="form-control" id="location" value="' + elem.name + '" required>' +
                    '</div>' +
                  '</div>'  +
                '</div>' +
                '<div class="modal-footer">' +
                  '<button type="submit" class="btn btn-warning">Save</button>' +
                '</div>' +
              '</form>' +
            '</div>' +
          '</div>' +
        '</div>' +
        // Delete Department modal
        '<div class="modal fade" id="delL' + elem.id + '" tabindex="-1" role="dialog" aria-labelledby="delLocationModalLabel" aria-hidden="true">' +
          '<div class="modal-dialog">' +
            '<div class="modal-content">' +
              '<div class="modal-header bg-danger bg-gradient">' +
                '<h4 class="modal-title text-white" id="delLocationLabel">Delete Location</h4>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
              '</div>' +
              '<div class="modal-body">' +
                '<div class="container-fluid">' +
                  '<p><center>Are you sure to delete <strong>' + elem.name + '</strong> from the list?<br>This method cannot be undone.</center></p>'  +
                '</div>' +
              '</div>' +
              '<div class="modal-footer">' +
                '<a href="locations/deleteL.php?id=' + elem.id + '" class="btn btn-danger">Delete</a>' +
              '</div>' +
            '</div>' +
          '</div>' +
        '</div>';

      }
      $("#modals").append(modalsLoc);




    },
  });
};
getLoc();


// ----------ADD DEPARTMENT OPTIONS to NEW and Edit EMPLOYEE MODAL----------

                        // <?php
                        // 	$query = 'SELECT  id,
                        // 										name as dep
                        // 							FROM department';
                        // 	$output = $conn->query($query);

                        // 	foreach ($output as $out) {
                        // 		$selected = $out['dep'] === $row['department'] ? 'selected' : '';
                        // ?>
                        // 	<option value="<?php echo $out['id']; ?>" <?php echo $selected; ?> ><?php echo $out['dep']; ?></option>
                        // <?php
                        // 	}
                        // ?>







// --------- ADD DEPARTMENT OPTIONS to NEW EMPLOYEE MODAL ----------------
var addDepOptions = () => {
  $.ajax({
    url: "php/getAllDepartmentJoined.php",
    type: "GET",
    dataType: "json",

    success: function (response) {
      // console.log(response);
      var data = response.data;

      var options = "";

      for (var elem of data) {
        options += "<option value='" + elem.id + "'>" + elem.department + "</option>";
      }
      $(".selectDep").append(options);

    },
  });
};
addDepOptions();
// $(document).ready(addDepOptions());


// ----------ADD lOCATION OPTIONS to NEW DEPARTMENT MODAL----------
var addLocOptions = () => {
  $.ajax({
    url: "php/getLocation.php",
    type: "GET",
    dataType: "json",

    success: function (response) {
      // console.log(response);
      var data = response.data;
      var options = "";

      for (var elem of data) {
        options += "<option value='" + elem.id + "'>" + elem.name + "</option>";
      }
      $(".selectLocation").append(options);

    },
  });
};
addLocOptions();





// ---------SEARCH BOX---------
$("#inputBox").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $(".allTBody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
// ---------RESET BUTTON---------
$("#resetBtn").on("click", function() {
  $("#inputBox").val("");
  var value = $("#inputBox").val();
  $(".allTBody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});

// ----------------------------
if(window.location.hash == "#departments") {
  $("#pills-empBtn").attr("aria-selected", "false").removeClass("active" );
  $("#pills-depBtn").attr("aria-selected", "false").addClass( "active" );
  $("#pills-locBtn").attr("aria-selected", "true").removeClass( "active" );
  $("#pills-employeesTab").removeClass("active show");
  $("#pills-departmentTab").addClass("active show");
  $("#pills-locationTab").removeClass("active show");
} 
  else if(window.location.hash == "#locations") {
    $("#pills-empBtn").attr("aria-selected", "false").removeClass("active" );
    $("#pills-depBtn").attr("aria-selected", "false").removeClass( "active" );
    $("#pills-locBtn").attr("aria-selected", "true").addClass( "active" );
    $("#pills-employeesTab").removeClass("active show");
    $("#pills-departmentTab").removeClass("active show");
    $("#pills-locationTab").addClass("active show");
}



// if($('#modals').on('DOMSubtreeModified')) {
//   console.log("Modified");
// } else {
//   alert('Unable to delete because of constraints');
// }


// var deleteData = function(id){
//   var id = $(this).attr('id');
//   $.ajax({    
//       type: "GET",
//       url: "php/deleteDepartmentByID.php", 
//       data:{id:id},            
//       // dataType: "html",                  
//       success: function(data){   
//         if(data) {
//           console.log('Success');
//           // console.log(data);
//         $('#msg').html(data);

//         } else {
//           alert("can't delete the row");
//         }

         
//       }

//   });
// };

// $(".btnDelete").on('click', deleteData());