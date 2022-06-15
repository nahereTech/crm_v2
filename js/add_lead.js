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


	
	$(document).on('click', '#add_lead', function() {
		add_lead();
	});
});


function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-48-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    fetch_pipelines();

  }else{

    $("#main_display").remove();
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}

function fetch_pipelines(){

	$.ajax({

	  type: "GET",
	  dataType: "json",
	  cache: false,
	  headers: {
	    'Authorization':localStorage.getItem('token'),
	  },
	  url: api_path+"crm/list_company_pipeline_stages",
	  data: {

	  	"company_id" : localStorage.getItem('company_id'), 
	  	"user_id" : localStorage.getItem('user_id'),
	  	"limit" : 1000000,
	  	"page" : 1

	  },

	  success: function(response) {
	  	console.log(response);
	  	strTable = '<option value="">-- Select --</option>';
	    if (response.data.status == '200') {

	     	if (response.data.data.length > 0) {

                $.each(response.data.data, function(i, v) {
                	strTable += '<option value="'+v.id+'">' + v.name + '</option>';
                });

                $("#lead_status").html(strTable);

            } else {

            }

	    }else{

	    }

	  },

	  error: function(response){

	    $('#add').show();
	    $('#item_loader').hide();
	    $('#error').html("Connection Error.");

	  }

	});
}

// list_pipeline_stages("")
// function list_pipeline_stages(page) {

//     var company_id = localStorage.getItem('company_id');
//     if (page == '') {
//         var page = 1;
//     }

//     var limit = 100;

//     $('#loading').show();
//     $('#employeeData').html('');

//     $.ajax({
//         type: 'GET',
//         dataType: 'json',
//          headers: {
//                     'Authorization':localStorage.getItem('token'),
//                 },
//         url: api_path + 'crm/list_company_pipeline_stages',
//         data: {

//             company_id: company_id,
//             page: page,
//             limit: limit
//         },
//         timeout: 60000,

//         success: function(response) {
            
//             $('#loading').hide();
            
//             var strTable = '<option value="">Select status</option>';

//             if (response.data.status == '200') {

//                 if (response.data.data.length > 0) {
            

//                     $(response.data.data).map((i, v) => {
//                     	strTable+=`<option value="${v.id}">${v.name}</option>`
//                 	})

//               }
//           }

//           $("#lead_status").html(strTable)
//       },
//         error: function(response){

// 	    $('#add_lead').show();
// 	    $('#item_loader').hide();
// 	    $('#error').html("Connection Error.");

// 	  }

// 	});
// }

function add_lead(){

  	var lead = $.trim($('#lead_title').val());
	var lead_desc = $.trim($("#lead_desc").val());
	var lead_value = $.trim($("#lead_value").val());
	var lead_note = $.trim($('#lead_note').val());

	var company_id = localStorage.getItem('company_id');
	var user_id = localStorage.getItem('user_id');

	var firstname = $('#firstname').val();
	var lastname = $('#lastname').val();
	var phone = $('#phone').val();
	var email = $('#email').val();
	var website = $('#website').val();
	var lead_address = $('#address').val();

	var company_name = $('#company_name').val();
	var lead_status = $('#lead_status').val();

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
	  
	  // alert("asdf");
	  $('#error').html("You have a blank field");

	  return; 

	}


	$('#add_lead').hide();
	$('#item_loader').show();

	$('#error').html('');


	$.ajax({

	  type: "POST",
	  dataType: "json",
	  cache: false,
	  headers: {
                    'Authorization':localStorage.getItem('token'),
                },
	  url: api_path+"crm/add_lead",
	  data: { "company_id" : company_id, "user_id" : user_id, "lead_name" : lead, "lead_desc" : lead_desc , "lead_value" : lead_value, "lead_company" : company_name , "firstname" : firstname , "lastname" : lastname , "email" : email , "phone" : phone , "lead_websites" : website , "lead_status" : lead_status , "lead_address" : lead_address , "lead_note" : lead_note  },

	  //, "lead_company" : lead_company

	  success: function(response) {

	    // console.log(response);

	    if (response.status == '200') {

	    	  alert('Lead added')
	          window.location.reload();


	      // $('#modal_item').modal('show');

	      // $('#modal_item').on('hidden.bs.modal', function () {
	      //     window.location.reload();
	      // });
	      
	      
	    }else{

	      $('#error').html(response.msg);

	    }

	    $('#add_lead').show();
	    $('#item_loader').hide();

	  },

	  error: function(response){

	    $('#add_lead').show();
	    $('#item_loader').hide();
	    $('#error').html("Connection Error.");

	  }

	});

}