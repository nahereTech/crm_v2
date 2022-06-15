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

  
  
  $(document).on('click', '#update_profile', function(){
    update_profile();
  });
  

});

function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-53-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    fetch_app_roles(); //fetch all the roles in this app
    fetch_role_given_to_a_profile();

  }else{
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}


function fetch_profile_details(){


  var profile_id = $.urlParam('id');
  
  $.ajax({

      type: "GET",
      dataType: "json",
      headers: {
          'Authorization':localStorage.getItem('token'),
      },
      url: api_path + "accesscontrol/get_profile_details",
      data: {
          "profile_id": profile_id
      },
      timeout: 60000,

      success: function(response) {

          var strTable = "";

          if (response.status == '200') {

            $("#profile_name").val(response.data.profile_name);
            $("#profile_desc").val(response.data.profile_description);
            $("#update_profile").show();

            var k = 1;
            $.each(response.data.roles, function(i, v) {

              $("#chkb_"+v.id).attr("checked", true);
              
              k++;

            });

          } else if (response.data <= 0) {


          }

      },
      error: function(response) {

      }

  });
}


function fetch_role_given_to_a_profile(){

}

function fetch_app_roles(){

  var company_id = localStorage.getItem('company_id');
  var module_id = 1;

  $("#loading").show();
  $("#incomingData").html('');

  
  $.ajax({

      type: "GET",
      dataType: "json",
      headers: {
          'Authorization':localStorage.getItem('token'),
      },
      url: api_path + "modules/get_roles_in_module",
      data: {
          "module_id": module_id
      },
      timeout: 60000,

      success: function(response) {

          var strTable = "";

          if (response.status == '200') {

              if (response.data.length > 0) {

                  var k = 1;
                  $.each(response.data, function(i, v) {

                      strTable += `<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="checkbox" id="chkb_`+v.role_id+`" class="role_box">&nbsp;&nbsp;`+v.role_name+`

                        </div>
                      </div>`;

                      k++;

                  });


                  fetch_profile_details(); // fetch the roles that were assigned to the profile


              } else {

                  strTable = '<tr><td colspan="5">' + response.data.msg + '</td></tr>';

              }

              $("#holds_roles").html(strTable);
              $("#holds_roles").show();
              $('#loading').hide();

          } else if (response.data <= 0) {

            $('#loading').hide();

              strTable = '<tr><td colspan="3">' + response.data.msg + '</td></tr>';

              $("#incomingData").html(strTable);
              $("#incomingData").show();

          }

      },

      error: function(response) {
        var strTable = "";
        $('#loading').hide();
        // alert(response.msg);
        strTable += '<tr>';
        strTable += '<td colspan="3"><strong class="text-danger">Connection error</strong></td>';
        strTable += '</tr>';

        $("#incomingData").html(strTable);
        $("#incomingData").show();

      }

  });
}

function update_profile(){

  var company_id = localStorage.getItem('company_id');
  var profile_id = $.urlParam('id');
  var profile_name = $.trim($('#profile_name').val());
  var profile_desc = $.trim($('#profile_desc').val());


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


  //role_box
  var acheck = "";
  var keys = [];
  var role_list = [];
  $('.role_box:checked').each(function () {

    acheck = "yes";
    var id = $(this).attr("id").replace(/chkb_/,'');
    role_list.push(id);

  });


  if(acheck != "yes"){

    $('#error').html("You have to check at least one role box before submitting");

    return; 

  }


  $('#update_profile').hide();
  $('#item_loader').show();

  $('#error').html('');


  $.ajax({

    type: "POST",
    dataType: "json",
    cache: false,
    headers: {
      'Authorization':localStorage.getItem('token'),
    },
    url: api_path+"accesscontrol/update_profile",
    data: {

      "company_id" : company_id, 
      "profile_id" : profile_id,
      "profile_name": profile_name,
      "profile_description": profile_desc,
      "role_list" : role_list,
      "module_id": 1
      
    },

    success: function(response) {


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

      $('#update_profile').show();
      $('#item_loader').hide();

    },

    error: function(response){

      $('#update_profile').show();
      $('#item_loader').hide();
      $('#error').html("Connection Error.");

    }

  });

}