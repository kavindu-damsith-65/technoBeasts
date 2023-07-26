$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
      event.preventDefault();
  
      // Submit the form data using AJAX
      $.ajax({
        type: 'POST',
        url: 'php/register.php',
        data: $(this).serialize(),
        success: function(response) {
          if(response=="suceed"){
            window.location.href = "index.php";
            // Swal.fire('Success!', "Registration Done", 'success');
          }else{
            Swal.fire('Error!', response, 'error');
          }
          // Display success message using SweetAlert2
          
          
          // Reset the form
          // $('#registrationForm')[0].reset();
        },
        error: function(xhr, status, error) {
          // Display error message using SweetAlert2
          Swal.fire('Error!', xhr.responseText, 'error');
        }
      });
    });



    $('#loginForm').submit(function(event) {
      event.preventDefault();
  
      // Submit the form data using AJAX
      $.ajax({
        type: 'POST',
        url: 'php/register.php',
        data: $(this).serialize(),
        success: function(response) {
          if(response=="suceed"){
            window.location.href = "index.php";
            // Swal.fire('Success!', "Registration Done", 'success');
          }else{
            Swal.fire('Error!', response, 'error');
          }
          $('#loginForm')[0].reset();
        },
        error: function(xhr, status, error) {
          // Display error message using SweetAlert2
          Swal.fire('Error!', xhr.responseText, 'error');
        }
      });
    });





    $('#addComponentForm').submit(function(event) {
      event.preventDefault();
  
      // Submit the form data using AJAX
      $.ajax({
        type: 'POST',
        url: 'php/addComponent.php',
        data: $(this).serialize(),
        success: function(response) {
          if(response=="suceed"){
               Swal.fire('Success!', "Component Added", 'success');
               loadData();
          }else{
            Swal.fire('Error!', response, 'error');
          }
          $('#loginForm')[0].reset();
        },
        error: function(xhr, status, error) {
          // Display error message using SweetAlert2
          Swal.fire('Error!', xhr.responseText, 'error');
        }
      });
    });

   
 
  });




  function loadData(){
    $.ajax({
      type: 'POST',
      url: 'php/addComponent.php',
      data: {getData:'loadData'},
      success: function(response) {
        document.getElementById('loadComps').innerHTML=response;
     
      },
    });
  }




  function deleteComp(compid){
  
    $.ajax({
      type: 'POST',
      url: 'php/addComponent.php',
      data: {getData:'deleteData',compid:compid},
      success: function(response) {
        Swal.fire('Success!', "Successfully Deleted", 'success');
        loadData();
      },
    });
  }




  function turnOffButton(compid){
    $.ajax({
      type: 'POST',
      url: 'php/addComponent.php',
      data: {getData:'turnOffBulb',compid:compid},
      success: function(response) {
        Swal.fire('Success!', "Successfully Turned Off", 'success');
        loadData();
      },
    });
  }
  


function myFunc(compid){
  $.ajax({
    type: 'POST',
    url: 'php/addComponent.php',
    data: {getData:'setSide',compid:compid},
    success: function(response) { 
      Swal.fire('Success!', "Successfully Changed Side", 'success');
      loadData();
    },
  });
}
 