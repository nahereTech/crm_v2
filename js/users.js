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

  
  $('#add').on('click', user);
  $('#add_user').on('click', add_user);

  $(document).on('click', '.delete_user', function(){
    var row_id = $(this).attr('id').replace(/usr_/,''); 
    delete_user(row_id);
  });

});



function user_page_access(){
  
  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-53-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    list_of_warehouse_users('');

  }else{
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}

function delete_user(row_id){
  
  var company_id = localStorage.getItem('company_id');
  var module_id = 1;

  var ans = confirm("Are you sure you want to delete this user?");
  if(!ans){
      return;
  }
  

  $('#row_'+row_id).hide();
  $('#loader_row_'+row_id).show();
  $.ajax({ 
      type: "POST",
      dataType: "json",
      // url: api_path+"modules/delete_module_user",
      url: api_path+"user/remove_user_from_this_module",
      data: {"company_id": company_id, "module_id" : module_id , "user_id" : row_id },
      timeout: 60000, // sets timeout to one minute
      // objAJAXRequest, strError

      error: function(response){
          $('#loader_row_'+row_id).hide();
          $('#row_'+row_id).show();

          alert('connection error');
      },

      success: function(response) {  
          // console.log(response);
          if(response.status == '200'){
              $('#row_'+row_id).hide();
          }else{
              alert("Error Deleting User");
          }

          $('#loader_row_'+row_id).hide();
      }
  });
}

function edit_company_warehouse(warehouse_id){
  var warehouse_name = $("#modal_edit_warehouse #warehouse_name").val();                 
  var warehouse_address =  $("#modal_edit_warehouse #warehouse_address").val();
  var company_id = localStorage.getItem('company_id');
  
  var blank;

  
  // alert(warehouse_id);

  $("#modal_edit_warehouse .required").each(function(){

    var the_val = $.trim($(this).val());

    if(the_val == "" || the_val == "0"){

      $(this).addClass('has-error');

      blank = "yes";

    }else{

      $(this).removeClass("has-error");

    }

  });

  if(blank == "yes"){

    $("#modal_edit_warehouse #error").html("You have a blank field");

    return; 

  }

              
 // $("#modal_edit_warehouse #error").html("");

$("#modal_edit_warehouse #edit_ware").hide();
$("#modal_edit_warehouse #edit_ware_loader").show();



$.ajax({

  type: "POST",
  dataType: "json",
  cache: false,
  url: api_path+"wms/edit_warehouse",
  data: { "warehouse_name" : warehouse_name, "warehouse_address" : warehouse_address, "company_id" : company_id, "warehouse_id" : warehouse_id},

  success: function(response) {

    console.log(response);

    if (response.status == '200') {
      $("#modal_edit_warehouse #error").html("");
      $("#modal_edit_warehouse #edit_ware_loader").hide();   
      $("#modal_edit_warehouse #edit_ware").show();

      
      $('#modal_edit_warehouse #edit_form').hide();
      $('#modal_edit_warehouse #edit_msg').show();

      // $('#modal_department_edit').on('hidden.bs.modal', function () {
      //     $('#department_name').val();
      //     $('#department_description').val();
      //     // window.location.reload();
      //     window.location.href = base_url+"/erp/hrm/departments";
      // })
      
      
    }else if(response.status == '400'){ // coder error message

      
       $("#modal_edit_warehouse #error").html('Technical Error. Please try again later.');

    }else if(response.status == '401'){ //user error message

      
       $("#modal_edit_warehouse #error").html(response.msg);

    }

     
 



  },

  error: function(response){

        console.log(response);
       $("#modal_edit_warehouse #edit_ware_loader").hide(); 
       $("#modal_edit_warehouse #edit_ware").show();
       $("#modal_edit_warehouse #error").html("Connection Error.");

  }

});

}

function fetch_warehouse_info(warehouse_id){
   
  var company_id = localStorage.getItem('company_id');

  $('#wareIn_'+warehouse_id).hide();
  $('#loader11_'+warehouse_id).show();
   
$.ajax({

  type: "POST",
  dataType: "json",
  cache: false,
  url: api_path+"wms/get_warehouse_details",
  data: { "warehouse_id" : warehouse_id, "company_id" : company_id},

  success: function(response) {

    var str = "";
    console.log(response);

      
    $('#loader11_'+warehouse_id).hide();
    $('#wareIn_'+warehouse_id).show();

    if (response.status == '200') {

      $("#modal_view_warehouse #name").html( response.data.warehouse_name); 
      $("#modal_view_warehouse #address").html( response.data.warehouse_address);

      
      $('#modal_view_warehouse').modal('show');          
    }


  },

  error: function(response){
    $('#loader11_'+warehouse_id).hide();
    $('#wareIn_'+warehouse_id).show();
    alert("Connection Error.");

  }

  });
}

function fetch_warehouse_details(warehouse_id){
  // var pathArray = window.location.pathname.split( '/' );
  // var warehouse_id = $.urlParam('id');  

  var company_id = localStorage.getItem('company_id');

  $('#warh_'+warehouse_id).hide();
  $('#loader_'+warehouse_id).show();
   
$.ajax({

  type: "POST",
  dataType: "json",
  cache: false,
  url: api_path+"wms/get_warehouse_details",
  data: { "warehouse_id" : warehouse_id, "company_id" : company_id},

  success: function(response) {

    var str = "";
    console.log(response);
     $("#modal_edit_warehouse #error").html("");

      $("#modal_edit_warehouse .required").each(function(){

        var the_val = $.trim($(this).val());

        $(this).removeClass("has-error");

      });
    $('#loader_'+warehouse_id).hide();
    $('#warh_'+warehouse_id).show();
    if (response.status == '200') {

      $("#modal_edit_warehouse #warehouse_name").val( response.data.warehouse_name); 
      $("#modal_edit_warehouse #warehouse_address").val( response.data.warehouse_address);

      // str += '<button type="submit" class="btn btn-success" id="edt_'+response.data.warehouse_id+'" class="update_ware">Update</button>';
      // str += '<i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="edit_ware_loader"></i>';   

      // $("#modal_edit_warehouse #form_footer").html(str);
      $('#modal_edit_warehouse').modal('show');          
    }


  },

  error: function(response){
    $('#loader_'+warehouse_id).hide();
    $('#warh_'+warehouse_id).show();
    alert("Connection Error.");

  }

  });
}

function delete_warehouse(warehouse_id){
  
  var company_id = localStorage.getItem('company_id');


  var ans = confirm("Are you sure you want to delete this warehouse?");
  if(!ans){
      return;
  }
  

  $('#row_'+warehouse_id).hide();
  $('#loader_row_'+warehouse_id).show();
  $.ajax({ 
      type: "POST",
      dataType: "json",
      url: api_path+"wms/delete_warehouse",
      data: {"company_id": company_id, "warehouse_id" : warehouse_id},
      timeout: 60000, // sets timeout to one minute
      // objAJAXRequest, strError

      error: function(response){
          $('#loader_row_'+warehouse_id).hide();
          $('#row_'+warehouse_id).show();

          alert('connection error');
      },

      success: function(response) {  
          // console.log(response);
          if(response.status == '200'){
              // $('#row_'+user_id).hide();


          }else if(response.status == '401'){
                  
                      
          }

          $('#loader_row_'+warehouse_id).hide();
      }
  });
}

function add_user(){
  var company_id = localStorage.getItem('company_id');
  var module_id = 1;
  var email = $('#email').val();

  // alert(employee_id);
  var blank;

  // alert('welcome');


  $(".required").each(function(){

    var the_val = $.trim($(this).val());

    if(the_val == "" || the_val == "0"){

      $(this).addClass('has-error');

      blank = "yes";

    }else{

      $(this).removeClass("has-error");

    }

  });

  if(blank == "yes"){

    return; 

  }
  if(!validateEmail(email)){
  
    // $('#error-email').show();
    $('#error').html('invalid Email');
        
    return;
  }

// alert('success');
$('#add_user').hide();
$('#user_loader').show();



$.ajax({

  type: "POST",
  dataType: "json",
  cache: false,
  url: api_path+"user/add_module_user",
  data: { "company_id" : company_id, "module_id" : module_id, "email" : email , "role_id" : 3 },

  success: function(response) {

    console.log(response);

    if (response.status == '200') {

      $('#error').html('');
      $('#modal_warehouse_user').modal('show');

      $('#modal_warehouse_user').on('hidden.bs.modal', function () {
          // do something…
          $('#user_display').hide();
          window.location.reload();
          //window.location.href = base_url+"/erp/hrm/employees";
      })
      
      
    }else if(response.status == '400'){ // coder error message

      
      $('#error').html(response.msg);

    }else if(response.status == '401'){ //user error message

      
      $('#error').html(response.msg);

    }

     
    $('#add_user').show();
    $('#user_loader').hide();

  },

  error: function(response){

    $('#add_user').show();
    $('#user_loader').hide();
    $('#error').html("Connection Error.");

  }

});

}

function user(){
  $('#user_display').toggle();
  $('#email').val('');


  $('#error').html('');

  $(".required").each(function(){

    var the_val = $.trim($(this).val());

    $(this).removeClass("has-error");

  });
}

function list_of_warehouse_users(page){

  var company_id = localStorage.getItem('company_id');
  var module_id = 1;
  var limit = 10;

  if(page == ""){
    var page = 1;
    var k = 1;
  }else{
    var k = (page * limit) - limit  + 1;
  }
  

  $("#loading").show();
  $("#userData").html('');

  $.ajax({
        
    type: "POST",
    dataType: "json",
      headers: {'Authorization':localStorage.getItem('token') 
    },
    url: api_path+"user/fetch_list_of_module_invitees", //list_module_users
    data: { "company_id": company_id, "module_id": module_id, "page": page, "limit": limit},
    timeout: 60000,

    success: function(response) {
        
        console.log(response);
        $('#loading').hide();
        var strTable = "";
        
        if (response.status == '200'){

            if(response.data.length > 0){



              $('#user_count').html('Users ('+response.total_rows+')');

                var k = 1;
                $.each(response['data'], function (i, v) {
                    // strTable += '<td width="8%" valign="top"><div class="profile_pic"><img src="'+base_url+'/erp/assets/admin_template/production/images/img.jpg" alt="..." width="50"></div></td>';

                    function status(string) {
                        return string.charAt(0).toUpperCase() + string.slice(1);
                    }



                    strTable += '<tr id="row_'+response['data'][i]['user_id']+'">';
                    strTable += '<td valign="top">'+k+'</td>';

                    strTable += '<td valign="top">'+response['data'][i]['lastname']+ ' ' +response['data'][i]['firstname']+'</td>';
                    strTable += '<td valign="top">'+response['data'][i]['email']+'</td>';
                    

                    // strTable +=  '<td valign="top">
                    // <a href="usage_log?id='+response['data'][i]['user_id']+'"><i  class="fa fa-clock-o"  data-toggle="tooltip" data-placement="top" style="color: #000; font-size: 20px;" title="User Logs"></i></a>&nbsp;&nbsp;';

                    strTable += '<td valign="top"><a href="user_roles?id='+response['data'][i]['user_id']+'"><i  class="fa fa-pencil"  data-toggle="tooltip" data-placement="top" title="User Permissions" style="font-size : 24px; cursor : pointer;"></i></a>&nbsp;&nbsp;';
                    
                    strTable += '<a class="delete_user  btn btn-danger btn-xs" style="cursor: pointer;" id="usr_'+response['data'][i]['user_id']+'"><i  class="fa fa-trash"  data-toggle="tooltip" data-placement="top" title="Delete User"></i> Delete</a></td>'; 
                    
                    strTable += '</tr>';



                    strTable += '<tr style="display: none;" id="loader_row_'+response['data'][i]['user_id']+'">';
                    strTable += '<td colspan="4"><i class="fa fa-spinner fa-spin fa-fw fa-1x"></i>';
                    strTable +=  '</td>';
                    strTable += '</tr>';
                    
                    
                    // if(response['data'][i]['is_mod_admin'] == "yes"){

                    //   strTable += '<tr>';
                    //   strTable += '<td valign="top">'+k+'</td>';

                    //   strTable += '<td valign="top">'+response['data'][i]['lastname']+ ' ' +response['data'][i]['firstname']+'</td>';
                    //   strTable += '<td valign="top">'+response['data'][i]['email']+'</td>';


                    //   strTable +=  '<td valign="top"><a href="'+base_url+'user_logs?id='+response['data'][i]['user_id']+'"><i  class="fa fa-clock-o"  data-toggle="tooltip" data-placement="top" style="color: #000; font-size: 20px;" title="User Logs"></i></a></td>';
                      
                    //   strTable += '</tr>';


                    // }else if(response['data'][i]['is_mod_admin'] == "no"){

                    //   strTable += '<tr id="row_'+response['data'][i]['row_id']+'">';
                    //   strTable += '<td valign="top">'+k+'</td>';

                    //   strTable += '<td valign="top">'+response['data'][i]['lastname']+ ' ' +response['data'][i]['firstname']+'</td>';
                    //   strTable += '<td valign="top">'+response['data'][i]['email']+'</td>';
                      

                    //   strTable +=  '<td valign="top"><a href="user_logs?id='+response['data'][i]['user_id']+'"><i  class="fa fa-clock-o"  data-toggle="tooltip" data-placement="top" style="color: #000; font-size: 20px;" title="User Logs"></i></a>&nbsp;&nbsp;';

                    //   strTable += '<a href="user_roles?id='+response['data'][i]['user_id']+'"><i  class="fa fa-lock"  data-toggle="tooltip" data-placement="top" title="User Permissions" style="font-size : 24px; cursor : pointer;"></i></a>&nbsp;&nbsp;';
                      
                    //   strTable += '<a class="delete_user  btn btn-danger btn-xs" style="cursor: pointer;" id="usr_'+response['data'][i]['row_id']+'"><i  class="fa fa-trash"  data-toggle="tooltip" data-placement="top" title="Delete User"></i> Delete</a></td>'; 
                      
                    //   strTable += '</tr>';



                    //   strTable += '<tr style="display: none;" id="loader_row_'+response['data'][i]['row_id']+'">';
                    //   strTable += '<td colspan="4"><i class="fa fa-spinner fa-spin fa-fw fa-2x"  id="loading"></i>';
                    //   strTable +=  '</td>';
                    //   strTable += '</tr>';

                    // }
                    


                    k++;
                     
                });

            }else{

                strTable = '<tr><td colspan="4">No record.</td></tr>';

            }

            $('#pagination').twbsPagination({
                totalPages: Math.ceil(response.total_rows/limit),
                visiblePages: 10,
                onPageClick: function (event, page) {
                   list_of_warehouse_users(page);
                }
            });
           
                       
            $("#userData").html(strTable);
            $("#userData").show();

        }else if(response.status == '400'){
            
            $('#loading').hide();
            strTable += '<tr>';
            strTable += '<td colspan="4">No result</td>';
            strTable += '</tr>';

            
            $("#userData").html(strTable);
            $("#userData").show();
            

        }else if(response.status == "401"){
            //missing parameters
            var strTable = "";
            $('#loading').hide();
            strTable += '<tr>';
            strTable += '<td colspan="4">'+response.msg+'</td>';
            strTable += '</tr>';

            
            $("#userData").html(strTable);
            $("#userData").show();

        }


        $("#loading").hide();
    
    },

    error: function(response){
      

      var strTable = "";
      $('#loading').hide();
      // alert(response.msg);
      strTable += '<tr>';
      strTable += '<td colspan="4"><strong class="text-danger">Connection error!</strong></td>';
      strTable += '</tr>';

      
      $("#userData").html(strTable);
      $("#userData").show();
      $("#loading").hide();

    }        

});
}

function validateEmail(emailaddress){  

   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  

   if(!emailReg.test(emailaddress)) {  

        return false

   }else{

        return true;

   }

}



// $(document).ready(function(){

//   //this time interval check if the user roles have been fetched before running anything on this page
//   var myVar2 = setInterval(

//     function(){

//       if($("#does_user_have_roles").html() != ""){

//         //stop the loop
//         myStopFunction();

//         //does user have access to this module
//         user_page_access();
        
//       }else{
//         console.log("No profile");
//       }
       
//     },
//     1000
//   );

//   function myStopFunction() {
//     clearInterval(myVar2);
//   }
    
  
//   $('#add').on('click', user);
//   $('#add_user').on('click', add_user);

//   $(document).on('click', '.delete_user', function(){
//     var row_id = $(this).attr('id').replace(/usr_/,''); 
//     delete_user(row_id);
//   });

// });



// function user_page_access(){
//   alert("chief")
//   var role_list = $("#does_user_have_roles").html();
//   if (role_list.indexOf("-53-") >= 0) {
//     alert("hello")
//     //Settings
//     $("#main_display").show();
//     list_of_warehouse_users('');

//   }else{

//     $("#modal_no_access").modal('show');

//   }

//   // var company_id = localStorage.getItem('company_id');
//   // var user_id = localStorage.getItem('user_id');
//   // var module_id = 1;

//   // $.ajax({
        
//   //   type: "POST",
//   //   dataType: "json",
//   //   url: api_path+"user/does_user_have_access_to_this_role",
//   //   data: { "company_id": company_id,  "user_id": user_id, "module_id": module_id , "role_id" : 4 },
//   //   timeout: 60000,

//   //   success: function(response) {
        
//   //       console.log(response);
        
//   //       if (response.status == '200'){
//   //         //show div
//   //         $("#main_display").show();
//   //         list_of_warehouse_users('');
          

//   //       }else{

//   //         $("#modal_no_access").modal('show');

//   //       }

//   //   },

//   //   error: function(response){
      
//   //     $("#modal_no_access").modal('show');

//   //   }        

//   // });
// }

// function delete_user(row_id){
  
//   var company_id = localStorage.getItem('company_id');
//   var module_id = 1;

//   var ans = confirm("Are you sure you want to delete this user?");
//   if(!ans){
//       return;
//   }
  

//   $('#row_'+row_id).hide();
//   $('#loader_row_'+row_id).show();
//   $.ajax({ 
//       type: "POST",
//       dataType: "json",
//       // url: api_path+"modules/delete_module_user",
//       url: api_path+"user/remove_user_from_this_module",
//       data: {"company_id": company_id, "module_id" : module_id , "user_id" : row_id },
//       timeout: 60000, // sets timeout to one minute
//       // objAJAXRequest, strError

//       error: function(response){
//           $('#loader_row_'+row_id).hide();
//           $('#row_'+row_id).show();

//           alert('connection error');
//       },

//       success: function(response) {  
//           // console.log(response);
//           if(response.status == '200'){
//               $('#row_'+row_id).hide();
//           }else{
//               alert("Error Deleting User");
//           }

//           $('#loader_row_'+row_id).hide();
//       }
//   });
// }

// function edit_company_warehouse(warehouse_id){
//   var warehouse_name = $("#modal_edit_warehouse #warehouse_name").val();                 
//   var warehouse_address =  $("#modal_edit_warehouse #warehouse_address").val();
//   var company_id = localStorage.getItem('company_id');
  
//   var blank;

  
//   // alert(warehouse_id);

//   $("#modal_edit_warehouse .required").each(function(){

//     var the_val = $.trim($(this).val());

//     if(the_val == "" || the_val == "0"){

//       $(this).addClass('has-error');

//       blank = "yes";

//     }else{

//       $(this).removeClass("has-error");

//     }

//   });

//   if(blank == "yes"){

//     $("#modal_edit_warehouse #error").html("You have a blank field");

//     return; 

//   }

              
//  // $("#modal_edit_warehouse #error").html("");

// $("#modal_edit_warehouse #edit_ware").hide();
// $("#modal_edit_warehouse #edit_ware_loader").show();



// $.ajax({

//   type: "POST",
//   dataType: "json",
//   cache: false,
//   url: api_path+"wms/edit_warehouse",
//   data: { "warehouse_name" : warehouse_name, "warehouse_address" : warehouse_address, "company_id" : company_id, "warehouse_id" : warehouse_id},

//   success: function(response) {

//     console.log(response);

//     if (response.status == '200') {
//       $("#modal_edit_warehouse #error").html("");
//       $("#modal_edit_warehouse #edit_ware_loader").hide();   
//       $("#modal_edit_warehouse #edit_ware").show();

      
//       $('#modal_edit_warehouse #edit_form').hide();
//       $('#modal_edit_warehouse #edit_msg').show();

//       // $('#modal_department_edit').on('hidden.bs.modal', function () {
//       //     $('#department_name').val();
//       //     $('#department_description').val();
//       //     // window.location.reload();
//       //     window.location.href = base_url+"/erp/hrm/departments";
//       // })
      
      
//     }else if(response.status == '400'){ // coder error message

      
//        $("#modal_edit_warehouse #error").html('Technical Error. Please try again later.');

//     }else if(response.status == '401'){ //user error message

      
//        $("#modal_edit_warehouse #error").html(response.msg);

//     }

     
 



//   },

//   error: function(response){

//         console.log(response);
//        $("#modal_edit_warehouse #edit_ware_loader").hide(); 
//        $("#modal_edit_warehouse #edit_ware").show();
//        $("#modal_edit_warehouse #error").html("Connection Error.");

//   }

// });

// }

// function fetch_warehouse_info(warehouse_id){
   
//   var company_id = localStorage.getItem('company_id');

//   $('#wareIn_'+warehouse_id).hide();
//   $('#loader11_'+warehouse_id).show();
   
// $.ajax({

//   type: "POST",
//   dataType: "json",
//   cache: false,
//   url: api_path+"wms/get_warehouse_details",
//   data: { "warehouse_id" : warehouse_id, "company_id" : company_id},

//   success: function(response) {

//     var str = "";
//     console.log(response);

      
//     $('#loader11_'+warehouse_id).hide();
//     $('#wareIn_'+warehouse_id).show();

//     if (response.status == '200') {

//       $("#modal_view_warehouse #name").html( response.data.warehouse_name); 
//       $("#modal_view_warehouse #address").html( response.data.warehouse_address);

      
//       $('#modal_view_warehouse').modal('show');          
//     }


//   },

//   error: function(response){
//     $('#loader11_'+warehouse_id).hide();
//     $('#wareIn_'+warehouse_id).show();
//     alert("Connection Error.");

//   }

//   });
// }

// function fetch_warehouse_details(warehouse_id){
//   // var pathArray = window.location.pathname.split( '/' );
//   // var warehouse_id = $.urlParam('id');  

//   var company_id = localStorage.getItem('company_id');

//   $('#warh_'+warehouse_id).hide();
//   $('#loader_'+warehouse_id).show();
   
// $.ajax({

//   type: "POST",
//   dataType: "json",
//   cache: false,
//   url: api_path+"wms/get_warehouse_details",
//   data: { "warehouse_id" : warehouse_id, "company_id" : company_id},

//   success: function(response) {

//     var str = "";
//     console.log(response);
//      $("#modal_edit_warehouse #error").html("");

//       $("#modal_edit_warehouse .required").each(function(){

//         var the_val = $.trim($(this).val());

//         $(this).removeClass("has-error");

//       });
//     $('#loader_'+warehouse_id).hide();
//     $('#warh_'+warehouse_id).show();
//     if (response.status == '200') {

//       $("#modal_edit_warehouse #warehouse_name").val( response.data.warehouse_name); 
//       $("#modal_edit_warehouse #warehouse_address").val( response.data.warehouse_address);

//       // str += '<button type="submit" class="btn btn-success" id="edt_'+response.data.warehouse_id+'" class="update_ware">Update</button>';
//       // str += '<i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="edit_ware_loader"></i>';   

//       // $("#modal_edit_warehouse #form_footer").html(str);
//       $('#modal_edit_warehouse').modal('show');          
//     }


//   },

//   error: function(response){
//     $('#loader_'+warehouse_id).hide();
//     $('#warh_'+warehouse_id).show();
//     alert("Connection Error.");

//   }

//   });
// }

// function delete_warehouse(warehouse_id){
  
//   var company_id = localStorage.getItem('company_id');


//   var ans = confirm("Are you sure you want to delete this warehouse?");
//   if(!ans){
//       return;
//   }
  

//   $('#row_'+warehouse_id).hide();
//   $('#loader_row_'+warehouse_id).show();
//   $.ajax({ 
//       type: "POST",
//       dataType: "json",
//       url: api_path+"wms/delete_warehouse",
//       data: {"company_id": company_id, "warehouse_id" : warehouse_id},
//       timeout: 60000, // sets timeout to one minute
//       // objAJAXRequest, strError

//       error: function(response){
//           $('#loader_row_'+warehouse_id).hide();
//           $('#row_'+warehouse_id).show();

//           alert('connection error');
//       },

//       success: function(response) {  
//           // console.log(response);
//           if(response.status == '200'){
//               // $('#row_'+user_id).hide();


//           }else if(response.status == '401'){
                  
                      
//           }

//           $('#loader_row_'+warehouse_id).hide();
//       }
//   });
// }

// function add_user(){
//   var company_id = localStorage.getItem('company_id');
//   var module_id = 1;
//   var email = $('#email').val();

//   // alert(employee_id);
//   var blank;

//   // alert('welcome');


//   $(".required").each(function(){

//     var the_val = $.trim($(this).val());

//     if(the_val == "" || the_val == "0"){

//       $(this).addClass('has-error');

//       blank = "yes";

//     }else{

//       $(this).removeClass("has-error");

//     }

//   });

//   if(blank == "yes"){

//     return; 

//   }
//   if(!validateEmail(email)){
  
//     // $('#error-email').show();
//     $('#error').html('invalid Email');
        
//     return;
//   }

// // alert('success');
// $('#add_user').hide();
// $('#user_loader').show();



// $.ajax({

//   type: "POST",
//   dataType: "json",
//   cache: false,
//   url: api_path+"user/add_module_user",
//   data: { "company_id" : company_id, "module_id" : module_id, "email" : email , "role_id" : 3 },

//   success: function(response) {

//     console.log(response);

//     if (response.status == '200') {

//       $('#error').html('');
//       $('#modal_warehouse_user').modal('show');

//       $('#modal_warehouse_user').on('hidden.bs.modal', function () {
//           // do something…
//           $('#user_display').hide();
//           window.location.reload();
//           //window.location.href = base_url+"/erp/hrm/employees";
//       })
      
      
//     }else if(response.status == '400'){ // coder error message

      
//       $('#error').html(response.msg);

//     }else if(response.status == '401'){ //user error message

      
//       $('#error').html(response.msg);

//     }

     
//     $('#add_user').show();
//     $('#user_loader').hide();

//   },

//   error: function(response){

//     $('#add_user').show();
//     $('#user_loader').hide();
//     $('#error').html("Connection Error.");

//   }

// });

// }

// function user(){
//   $('#user_display').toggle();
//   $('#email').val('');


//   $('#error').html('');

//   $(".required").each(function(){

//     var the_val = $.trim($(this).val());

//     $(this).removeClass("has-error");

//   });
// }

// function list_of_warehouse_users(){

//   var company_id = localStorage.getItem('company_id');
//   var module_id = 1;

//   if(page == ""){
//     var page = 1;
//   }
//   var limit = 10;

//   $("#loading").show();
//   $("#userData").html('');

//   $.ajax({
        
//     type: "POST",
//     dataType: "json",
//     url: api_path+"user/fetch_list_of_module_users", //list_module_users
//     data: { "company_id": company_id, "module_id": module_id, "page": page, "limit": limit},
//     timeout: 60000,

//     success: function(response) {
        
//         console.log(response);
//         $('#loading').hide();
//         var strTable = "";
        
//         if (response.status == '200'){

//             if(response.data.length > 0){



//               $('#user_count').html('Users ('+response.total_rows+')');

//                 var k = 1;
//                 $.each(response['data'], function (i, v) {
//                     // strTable += '<td width="8%" valign="top"><div class="profile_pic"><img src="'+base_url+'/erp/assets/admin_template/production/images/img.jpg" alt="..." width="50"></div></td>';

//                     function status(string) {
//                         return string.charAt(0).toUpperCase() + string.slice(1);
//                     }



//                     strTable += '<tr id="row_'+response['data'][i]['user_id']+'">';
//                     strTable += '<td valign="top">'+k+'</td>';

//                     strTable += '<td valign="top">'+response['data'][i]['lastname']+ ' ' +response['data'][i]['firstname']+'</td>';
//                     strTable += '<td valign="top">'+response['data'][i]['email']+'</td>';
                    

//                     // strTable +=  '<td valign="top">
//                     // <a href="usage_log?id='+response['data'][i]['user_id']+'"><i  class="fa fa-clock-o"  data-toggle="tooltip" data-placement="top" style="color: #000; font-size: 20px;" title="User Logs"></i></a>&nbsp;&nbsp;';

//                     strTable += '<td valign="top"><a href="user_roles?id='+response['data'][i]['user_id']+'"><i  class="fa fa-pencil"  data-toggle="tooltip" data-placement="top" title="User Permissions" style="font-size : 24px; cursor : pointer;"></i></a>&nbsp;&nbsp;';
                    
//                     strTable += '<a class="delete_user  btn btn-danger btn-xs" style="cursor: pointer;" id="usr_'+response['data'][i]['user_id']+'"><i  class="fa fa-trash"  data-toggle="tooltip" data-placement="top" title="Delete User"></i> Delete</a></td>'; 
                    
//                     strTable += '</tr>';



//                     strTable += '<tr style="display: none;" id="loader_row_'+response['data'][i]['user_id']+'">';
//                     strTable += '<td colspan="4"><i class="fa fa-spinner fa-spin fa-fw fa-1x"></i>';
//                     strTable +=  '</td>';
//                     strTable += '</tr>';
                    
                    
//                     // if(response['data'][i]['is_mod_admin'] == "yes"){

//                     //   strTable += '<tr>';
//                     //   strTable += '<td valign="top">'+k+'</td>';

//                     //   strTable += '<td valign="top">'+response['data'][i]['lastname']+ ' ' +response['data'][i]['firstname']+'</td>';
//                     //   strTable += '<td valign="top">'+response['data'][i]['email']+'</td>';


//                     //   strTable +=  '<td valign="top"><a href="'+base_url+'user_logs?id='+response['data'][i]['user_id']+'"><i  class="fa fa-clock-o"  data-toggle="tooltip" data-placement="top" style="color: #000; font-size: 20px;" title="User Logs"></i></a></td>';
                      
//                     //   strTable += '</tr>';


//                     // }else if(response['data'][i]['is_mod_admin'] == "no"){

//                     //   strTable += '<tr id="row_'+response['data'][i]['row_id']+'">';
//                     //   strTable += '<td valign="top">'+k+'</td>';

//                     //   strTable += '<td valign="top">'+response['data'][i]['lastname']+ ' ' +response['data'][i]['firstname']+'</td>';
//                     //   strTable += '<td valign="top">'+response['data'][i]['email']+'</td>';
                      

//                     //   strTable +=  '<td valign="top"><a href="user_logs?id='+response['data'][i]['user_id']+'"><i  class="fa fa-clock-o"  data-toggle="tooltip" data-placement="top" style="color: #000; font-size: 20px;" title="User Logs"></i></a>&nbsp;&nbsp;';

//                     //   strTable += '<a href="user_roles?id='+response['data'][i]['user_id']+'"><i  class="fa fa-lock"  data-toggle="tooltip" data-placement="top" title="User Permissions" style="font-size : 24px; cursor : pointer;"></i></a>&nbsp;&nbsp;';
                      
//                     //   strTable += '<a class="delete_user  btn btn-danger btn-xs" style="cursor: pointer;" id="usr_'+response['data'][i]['row_id']+'"><i  class="fa fa-trash"  data-toggle="tooltip" data-placement="top" title="Delete User"></i> Delete</a></td>'; 
                      
//                     //   strTable += '</tr>';



//                     //   strTable += '<tr style="display: none;" id="loader_row_'+response['data'][i]['row_id']+'">';
//                     //   strTable += '<td colspan="4"><i class="fa fa-spinner fa-spin fa-fw fa-2x"  id="loading"></i>';
//                     //   strTable +=  '</td>';
//                     //   strTable += '</tr>';

//                     // }
                    


//                     k++;
                     
//                 });

//             }else{

//                 strTable = '<tr><td colspan="4">No record.</td></tr>';

//             }

//             $('#pagination').twbsPagination({
//                 totalPages: Math.ceil(response.total_rows/limit),
//                 visiblePages: 10,
//                 onPageClick: function (event, page) {
//                    list_of_warehouse_users(page);
//                 }
//             });
           
                       
//             $("#userData").html(strTable);
//             $("#userData").show();

//         }else if(response.status == '400'){
            
//             $('#loading').hide();
//             strTable += '<tr>';
//             strTable += '<td colspan="4">No result</td>';
//             strTable += '</tr>';

            
//             $("#userData").html(strTable);
//             $("#userData").show();
            

//         }else if(response.status == "401"){
//             //missing parameters
//             var strTable = "";
//             $('#loading').hide();
//             strTable += '<tr>';
//             strTable += '<td colspan="4">'+response.msg+'</td>';
//             strTable += '</tr>';

            
//             $("#userData").html(strTable);
//             $("#userData").show();

//         }


//         $("#loading").hide();
    
//     },

//     error: function(response){
      

//       var strTable = "";
//       $('#loading').hide();
//       // alert(response.msg);
//       strTable += '<tr>';
//       strTable += '<td colspan="4"><strong class="text-danger">Connection error!</strong></td>';
//       strTable += '</tr>';

      
//       $("#userData").html(strTable);
//       $("#userData").show();
//       $("#loading").hide();

//     }        

// });
// }

// function validateEmail(emailaddress){  

//    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  

//    if(!emailReg.test(emailaddress)) {  

//         return false

//    }else{

//         return true;

//    }

// }
