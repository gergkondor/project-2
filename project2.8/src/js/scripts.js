// $(document).ready(function(){
//     $('.search-box input[type="text"]').on("keyup input", function(){
//         var inputVal = $(this).val();
//         var resultDropdown = $(this).siblings(".result");
//         if(inputVal.length){
//             $.get("backend-search.php", {term: inputVal}).done(function(data){
//                 resultDropdown.html(data);
//             });
//         } else{
//             resultDropdown.empty();
//         }
//     });
    
//     $(document).on("click", ".result p", function(){
//         $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
//         $(this).parent(".result").empty();
//     });
// });


// $(document).ready(function() {
//     $("#editEmployeeBtn").on('click', function() {
//         $tr = $(this).closest('tr');

//         var data = $tr.children("td").map(function() {
//             return $(this).text();
//         }).get();

//         console.log(data);

//         $('#update_id').val(data[0]);
//         $('#fname').val(data[1]);
//         $('#lname').val(data[2]);
//         $('#email').val(data[3]);
//     });
// });