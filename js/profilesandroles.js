$(document).ready(function() {

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


	list_of_profiles('');
	$(document).on('click', '.del_profile', function () {

        var id = $(this).attr("id").replace(/del_profile_/, '');

        if (confirm("Are you sure you want to delete")) {
            delete_profile(id);
        }else{
            return false;
        }
    
    });
});

function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-53-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    list_of_profiles('');

  }else{
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}

function delete_profile(id){

	var company_id = localStorage.getItem('company_id');

    $.ajax({

        type: "POST",
        dataType: "json",
        url: api_path + "accesscontrol/delete_profile",
        headers: {
            'Authorization':localStorage.getItem('token'),
        },
        data: { 
        	"profile_id": id,
        	"company_id": company_id
        },
        timeout: 60000, // sets timeout to one minute

        error: function (response) {
            alert("Error Deleting");
        },

        success: function (response) {

            if (response.data.status == '200') {
                $('#row_'+id).remove();
            } else {
                alert("Error deleting post");
            }

        }

    });
}

function list_of_profiles(page){

	var company_id = localStorage.getItem('company_id');
    if (page == "") {
        var page = 1;
    }
    var limit = 10;

    var module_id = 1;

    $("#loading").show();
    $("#incomingData").html('');

    $("html, body").animate({ scrollTop: 0 }, "slow");

    
    $.ajax({

        type: "GET",
        dataType: "json",
        headers: {
            'Authorization':localStorage.getItem('token'),
        },
        url: api_path + "accesscontrol/get_company_profile_in_module",
        data: {
            "company_id": company_id,
            "module_id": module_id,
            "page": page,
            "limit": limit
        },
        timeout: 60000,

        success: function(response) {

            var strTable = "";

            if (response.status == '200') {

                if (response.data.length > 0) {

                    var k = 1;
                    $.each(response.data, function(i, v) {

                    	if(v.is_editable == "yes"){
                    		var editmatr = `<a href="editpermissionprofile?id=`+v.profile_id+`"><i  class="fa fa-pencil"  data-toggle="tooltip" data-placement="top" style="font-style: italic; font-size: 20px;" title="Edit Profile"></i></a>&nbsp;&nbsp; <a class="delete_employee" style="cursor: pointer;" id="emp_` +v.id +`"><i  class="fa fa-trash del_profile"  data-toggle="tooltip" data-placement="top" style="font-style: italic; color: #f97c7c; font-size: 20px;" title="Delete Profile" id="del_profile_`+v.profile_id+`"></i></a>`;
                    	}else{
                    		var editmatr = "";
                    	}


                        strTable += '<tr id="row_' + v.profile_id + '">';                       
                        strTable += '<td>' + k + '</td>';
                        strTable += '<td><b>' + v.profile_name + '</b><br><i>'+v.profile_description+'</i></td>';
                        strTable += '<td>'+editmatr+'</td>';


                        k++;

                    });

                } else {

                    strTable = '<tr><td colspan="5">' + response.data.msg + '</td></tr>';

                }

                // $('#pagination').twbsPagination({
                //     totalPages: Math.ceil(response.data.total_rows / limit),
                //     visiblePages: 10,
                //     onPageClick: function(event, page) {
                //         list_of_clients(page);
                //     }
                // });

                $("#incomingData").html(strTable);
                $("#incomingData").show();
                $('#loading').hide();

            } else if (response.data <= 0) {

            	$('#loading').hide();

                strTable = '<tr><td colspan="3">' + response.data.msg + '</td></tr>';

                $("#incomingData").html(strTable);
                $("#incomingData").show();

            } else if (response.status == '400') {

            	var strTable = "";
                $('#loading').hide();
                // alert(response.msg);
                strTable += '<tr>';
                strTable += '<td colspan="3">' + response.data.msg + '</td>';
                strTable += '</tr>';

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