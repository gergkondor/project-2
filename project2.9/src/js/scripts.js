// ----------GET EMPLOYEES----------
var getEmp = () => {

  $("#tableHead").html(
    '<th>First Name</th>' +
    '<th>Last Name</th>' +
    '<th class="d-none d-md-table-cell">Department</th>' +
    '<th class="narrowTh">View</th>' +
    '<th class="narrowTh">Edit</th>' +
    '<th class="narrowTh">Delete</th>'
  ) 
    
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
        '<tr>' +
          '<td>' + elem.firstName + '</td>' +
          '<td>' + elem.lastName + '</td>' +
          '<td>' + elem.department + '</td>' +
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
      $("#tableBody").html(rows);


    },
  })
};

// ----------GET DEPARTMENT----------
var getDep = () => {

  $("#tableHead").html(
    '<th>Department Name</th>' +
    '<th>Location</th>' +
    '<th class="narrowTh">Edit</th>' +
    '<th class="narrowTh">Delete</th>'
  ) 

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
        '<tr>' +
          '<td>' + elem.department + '</td>' +
          '<td>' + elem.location + '</td>' +
          '<td>' +
            '<a href="#edit' + elem.id + '" data-bs-toggle="modal" class="btn btn-warning col align-self-center">' +
              '<img src="src/icons/pencil.svg" alt="Edit" width="20" height="20">' +
            '</a>' +
          '</td>' +
          '<td>' +
            '<a href="#del' + elem.id + '" data-bs-toggle="modal" class="btn btn-danger col align-self-center">' +
              '<img src="src/icons/trash.svg" alt="Delete" width="20" height="20">' +
            '</a>' +
          '</td>' +
        '</tr>'
        ;
      }
      $("#tableBody").html(rows);
      // $("#selectDep").append($('<option></option>').attr('value', data.id).text(data.department));

      


    },
  });
};

// ----------GET LOCATION----------
var getLoc = () => {

  $("#tableHead").html(
    '<th>Location</th>' +
    '<th class="narrowTh">Edit</th>' +
    '<th class="narrowTh">Delete</th>'
  ) 

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
        '<tr>' +
          '<td>' + elem.name + '</td>' +
          '<td>' +
            '<a href="#edit' + elem.id + '" data-bs-toggle="modal" class="btn btn-warning col align-self-center">' +
              '<img src="src/icons/pencil.svg" alt="Edit" width="20" height="20">' +
            '</a>' +
          '</td>' +
          '<td>' +
            '<a href="#del' + elem.id + '" data-bs-toggle="modal" class="btn btn-danger col align-self-center">' +
              '<img src="src/icons/trash.svg" alt="Delete" width="20" height="20">' +
            '</a>' +
          '</td>' +
        '</tr>'
        ;
      }
      $("#tableBody").html(rows);

    },
  });
};

// ----------ADD EMPLOYEES ON PAGE LOAD----------
if($("#select").val() == 'emp') {
  getEmp();
};

// ----------UPDATE TABLES ON SELECT----------
$("#select").change(function() {
  if($("#select").val() === 'emp'){
    getEmp();
  } else if ($("#select").val() === 'dep') {
    getDep();
  } else if ($("#select").val() === 'loc') {
    getLoc();
  }
})

// ----------ADD DEPARTMENT OPTIONS----------
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
      $("#selectDep").html('');
      $("#selectDep").append(options);

    },
  });
};

$("#addNewEmpBtn").on('click', function() {
  addDepOptions();
})