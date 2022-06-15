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


  //if user click on a check box to add or remove role
  $(document).on('click', '.chk_b_k', function(){
      var ans = confirm("Are you sure");
      var role_id = $(this).attr("id").replace(/chkb_/,'');
      add_remove_role(role_id);
  });
    
});

function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-53-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    list_of_profiles();

  }else{

    $("#main_display").remove();
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}


function fetch_users_assigned_profiles(){

  var company_id = localStorage.getItem('company_id');
  var module_id = 1;
  
  $.ajax({

    type: "GET",
    dataType: "json",
    headers: {
        'Authorization':localStorage.getItem('token'),
    },
    url: api_path + "accesscontrol/get_user_profiles_in_module",
    data: {
        "company_id": company_id,
        "module_id": module_id,
        "user_id": $.urlParam('id')
    },
    timeout: 60000,

    success: function(response) {

        var tr_line = "";

        if (response.status == '200') {

            var k = 1;
            $.each(response.data, function (i, v) {

              $("#chkb_"+v.profile_id).attr("checked", true);

              k++;                   
              
            });

        } else {


        }



    },

    error: function(response) {



    }

  });

}

function list_of_profiles(){

  var company_id = localStorage.getItem('company_id');
  var module_id = 1;

  $("#loading").show();
  $("#permData").html('');
  
  $.ajax({

    type: "GET",
    dataType: "json",
    headers: {
        'Authorization':localStorage.getItem('token'),
    },
    url: api_path + "accesscontrol/get_company_profile_in_module",
    data: {
        "company_id": company_id,
        "module_id": module_id
    },
    timeout: 60000,

    success: function(response) {

        var tr_line = "";

        if (response.status == '200') {

            if (response.data.length > 0) {

                var k = 1;
                $.each(response.data, function (i, v) {

                  if(v.profile_name == "Basic"){
                    var disbl = 'disabled="disabled"';
                  }else{
                    var disbl = '';
                  }

                    
                  tr_line += '<tr id="role_tr_'+v.profile_id+'"><td><input type="checkbox" name="chk_b_k" class="chk_b_k" id="chkb_'+v.profile_id+'" '+disbl+' ></td><td>'+v.profile_name+'</td><td>...</td></tr>';

                  tr_line += '<tr id="loading_chng_'+v.profile_id+'" style="display: none"><td colspan="3"><i class="fa fa-spinner fa-spin fa-fw fa-1x" style="display: ;" ></i></td></tr>';

                  k++;                   
                  
                });

                fetch_users_assigned_profiles();

            } else {

                tr_line = '<tr><td colspan="3">' + response.data.msg + '</td></tr>';

            }

            $("#permData").html(tr_line);
            $("#permData").show();
            $('#loading').hide();

            

        } else if (response.data <= 0) {

            tr_line = '<tr><td colspan="3">' + response.data.msg + '</td></tr>';

            $("#permData").html(tr_line);
            $("#permData").show();
            $('#loading').hide();

        } else if (response.status == '400') {

          tr_line += '<tr>';
          tr_line += '<td colspan="3">' + response.data.msg + '</td>';
          tr_line += '</tr>';

          $("#permData").html(tr_line);
          $("#permData").show();
          $('#loading').hide();

        }

    },

    error: function(response) {
      var strTable = "";
        $('#loading').hide();
        // alert(response.msg);
        tr_line += '<tr>';
        tr_line += '<td colspan="3"><strong class="text-danger">Connection error</strong></td>';
        tr_line += '</tr>';

        $("#incomingData").html(tr_line);
        $("#incomingData").show();

    }

  });
}

function add_remove_role(profile_id){


  if ($('#chkb_'+profile_id).is(":checked"))
  {
    var a_r_action = "add";
    var endpoint = "assign_profile_to_user";
  }else{
    var a_r_action = "remove";
    var endpoint = "remove_user_from_profile";
  }

  var company_id = localStorage.getItem('company_id');
  var user_id = $.urlParam('id');

  $("#loading_chng_"+profile_id).show();
  $("#role_tr_"+profile_id).hide();

  $.ajax({
        
    type: "POST",
    dataType: "json",
    url: api_path+"accesscontrol/"+endpoint,
    headers: {
        'Authorization':localStorage.getItem('token'),
    },
    data: { 
      "module_id" : 1 , 
      "company_id" : company_id , 
      "user_id" : user_id , 
      "profile_id" : profile_id 
    },
    timeout: 60000,

    success: function(response) {

      if (response.status == '200'){



      }else if(response.status == '400'){
          
          if(a_r_action == "add"){
            $('#chkb_'+profile_id).attr('checked', false); // Checks it
          }else{
            $('#chkb_'+profile_id).attr('checked', true); // UnChecks it
          }
          alert("error updating permission");

      }

      $("#loading_chng_"+profile_id).hide();
      $("#role_tr_"+profile_id).show();

    },

    error: function(response){
      
      if(a_r_action == "add"){
        $('#chkb_'+profile_id).attr('checked', false); // Checks it
      }else{
        $('#chkb_'+profile_id).attr('checked', true); // UnChecks it
      }
      alert("Error Updating role");
      $("#loading_chng_"+profile_id).hide();
      $("#role_tr_"+profile_id).show();

    }         

  });



}


function list_of_module_roles(){

  var company_id = localStorage.getItem('company_id');
  var user_id = $.urlParam('id');
  

  $.ajax({
        
    type: "POST",
    dataType: "json",
    url: api_path+"user/module_roles_plus_user_roles",
    data: { "module_id" : 1 , "company_id" : company_id , "user_id" : user_id },
    timeout: 60000,

    success: function(response) {
        
      console.log(response);

      var k = 1;
      var tr_line = "";
        
      if (response.status == '200'){

        $.each(response.data, function (i, v) {

          if(v.has_access == "yes"){
            var checkit = "checked";
          }else{
            var checkit = "";
          }

          if(v.role_name == "Admin" || v.role_name == "Basic"){
            var disable_checkbox = "disabled=disabled";
          }else{
            var disable_checkbox = "";
          }
            
          tr_line += '<tr id="role_tr_'+v.role_id+'"><td><input type="checkbox" name="chk_b_k" '+disable_checkbox+' class="chk_b_k" id="chkb_'+v.role_id+'" '+checkit+'></td><td>'+v.role_name+'</td><td>'+v.comment+'</td><td><a class="delete_employee" style="cursor: pointer;" id="emp_` +v.id +`"><i  class="fa fa-trash del_profile"  data-toggle="tooltip" data-placement="top" style="font-style: italic; color: #f97c7c; font-size: 20px;" title="Delete Profile" id="del_profile_`+v.profile_id+`"></i></a></td></tr>';

          tr_line += '<tr id="loading_chng_'+v.role_id+'" style="display: none"><td colspan="3"><i class="fa fa-spinner fa-spin fa-fw fa-1x" style="display: ;" ></i></td></tr>';


          // if(v.role_name == "Basic"){
          //   $("#chkb_"+v.role_id).attr("checked", true);
          // }else{
          //   var disable_checkbox = "";
          // }

          k++;                   
          
        });

        $("#permData").html(tr_line);
        $("#loading").hide();             


      }else if(response.status == '400'){
            
          $("#permData").html('<tr id="loading"><td colspan="3">Error fetching data. Please refresh page</td></tr>');

      }else if(response.status == "401"){
          
          $("#permData").html('<tr id="loading"><td colspan="3">Error fetching data. Please refresh page</td></tr>');

      }

      $("#loading").hide();

    },

    error: function(response){
      
      
      $("#permData").html('<tr id="loading"><td colspan="3">Error fetching data. Please refresh page</td></tr>');

      $("#loading").hide();

    }        

  });
}



$.urlParam = function(name){

    var results = new RegExp('[\?&]' + name + '=([^]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}
