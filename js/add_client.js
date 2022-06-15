$(document).ready(function(){

  //this time interval check if the user roles have been fetched before running anything on this page
  var myVar2 = setInterval(

      function(){

        if($("#does_user_have_roles").html() != ""){

          //stop the loop
          myStopFunction();

          //does user have access to this module
          user_page_access();
          
          
        }else{
          console.log("No profile");
        }
         
      },
  1000
  );

  function myStopFunction() {
      clearInterval(myVar2);
  }
  //end of interval set


  $(document).on('click', '#add', function(){

    add_contact();

  });


});


function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-2-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    

  }else{
    
    $("#main_display").remove();
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}



function add_contact(image_name){

  var company_id = localStorage.getItem('company_id');
  var user_id = localStorage.getItem('user_id');

  var company_name = $.trim($('#company_name').val());
  var company_description = $('#company_description').val();
  var company_phone = $('#company_phone').val();
  var company_email = $('#company_email').val();
  var company_website = $('#company_website').val();
  var company_address = $('#company_address').val();


  var contacts_firstname = $('#contacts_firstname').val();
  var contacts_lastname = $('#contacts_lastname').val();
  var contacts_phone = $('#contacts_phone').val();
  var contacts_email = $('#contacts_email').val();
  var contacts_dob = $('#contacts_dob').val();
  var contacts_address = $('#contacts_address').val();


  var blank;

  $(".add_item_required").each(function(){

    var the_val = $.trim($(this).val());

    if(the_val == "" || the_val == "0"){

      $(this).addClass('has-error');

      blank = "yes";

    }else{

      $(this).removeClass("has-error");

    }

  });


  if(blank == "yes"){

    $('#error').html("You have a blank field");

    return; 

  }


  $('#add').hide();
  $('#item_loader').show();

  $('#error').html('');


  $.ajax({

    type: "POST",
    dataType: "json",
    cache: false,
    headers: {
                    'Authorization':localStorage.getItem('token'),
                },
    url: api_path+"crm/add_client",
    data: {

      // "company_id" : company_id, 
      "user_id" : user_id,

      "company_name" : company_name,
      "company_description" : company_description, 
      "company_phone" : company_phone,
      "company_website" : company_website,
      "company_address" : company_address,
      "company_email" : company_email,
      "contacts_firstname" : contacts_firstname,
      "contacts_lastname" : contacts_lastname, 
      "contacts_phone" : contacts_phone,
      "contacts_email" : contacts_email, 
      "contacts_dob" : contacts_dob,
      "contacts_address" : contacts_address,
      
    },

    success: function(response) {

      // console.log(response);

      if (response.status == '200') {

        $('#modal_item').modal('show');

        $('#modal_item').on('hidden.bs.modal', function () {
            
            window.location.reload();
        });
        
        
      }else if(response.status == '400'){ // coder error message

        $('#error').html('Technical Error. Please try again later.');

      }else if(response.status == '401'){ //user error message

        $('#error').html("No result");

      }

      $('#add').show();
      $('#item_loader').hide();

    },

    error: function(response){

      $('#add').show();
      $('#item_loader').hide();
      $('#error').html("Connection Error.");

    }

  });

}
