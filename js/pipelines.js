$(document).ready(function () {

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

});

function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-53-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    list_pipeline_stages('','','');

  }else{
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}

$("#employeeData").sortable();


// $(function () {
    // $("#employeeData").sortable({
    //     items: 'tr:not(tr:first-child)',
    //     cursor: 'pointer',
    //     axis: 'y',
    //     dropOnEmpty: false,
    //     start: function (e, ui) {
    //         ui.item.addClass("selected");
    //     },
    //     stop: function (e, ui) {
    //         ui.item.removeClass("selected");
    //         $(this).find("tr").each(function (index) {
    //             if (index > 0) {
    //                 $(this).find("td").eq(2).html(index);
    //             }
    //         });
    //     }
    // });
// });

$('#employeeData').sortable({
    axis: 'y',
    update: function (event, ui) {
        var data = $(this).sortable('serialize');
        // alert('y')

        // POST to server using $.post or $.ajax
        // $.ajax({
        //     data: data,
        //     type: 'POST',
        //     url: '/your/url/here'
        // });

        var list = new Array();


        $(".row_").each(function() {
        var id = $(this).attr("id").replace(/row_/, ''); // the box id
        var name = $(this).attr("data")
             console.log(id);
             console.log(name);


         list.push({

                pipeline_id: id,
                name: name

            });

         console.log({list})


    });

        $.ajax({
    
            type: "POST",
            dataType: "json",
            url: api_path + "crm/update_pipeline_ranking",
            headers: {
                'Authorization':localStorage.getItem('token'),
            },
            data: { "list": list },
            timeout: 60000, // sets timeout to one minute
    
            error: function (response) {
                alert("Error Deleting");
            },
    
            success: function (response) {
                
                console.log(list)
                console.log(response);
    
                if (response.status == '200') {
                    // location.reload();
                } else {
                    alert("Error deleting post");
                }
    
            }
    
        });
    }
});












 $(document).on('click', '.delete_employee', function () {
            var id = $(this).attr("id").replace(/emp_/, '');

            if (confirm("Are you sure you want to delete")) {
                delete_pipeline(id);
            }else{
                return false;
            }
    
    })



  $(document).on('click', '.set_default', function () {
            var id = $(this).attr("id").replace(/set_default_/, '');
            if (confirm("Are you sure you want to make this your CLOSED DEAL PIPELINE?")) {
                set_default(id);
            }else{
                return false;
            }
    })




   function set_default(id) {
    
        $.ajax({
    
            type: "POST",
            dataType: "json",
            url: api_path + "crm/mark_pipeline",
            headers: {
                        'Authorization':localStorage.getItem('token'),
            },
            data: { "pipeline_id": id},
            timeout: 60000, // sets timeout to one minute
    
            error: function (response) {
                alert("Error");
            },
    
            success: function (response) {
                console.log(response);
    
                if (response.status == '200') {
                    
                    
    
                } 
                else {
                    alert("Error Try again");

                }
    
            }
    
        });
    }





function list_pipeline_stages(page, serial, order_by) {

    var company_id = localStorage.getItem('company_id');
    if (page == '') {
        var page = 1;
    }

    var limit = 50;

    $('#loading').show();
    $('#employeeData').html('');

    $.ajax({
        type: 'GET',
        dataType: 'json',
         headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        url: api_path + 'crm/list_company_pipeline_stages',
        data: {

            company_id: company_id,
            page: page,
            limit: limit
        },
        timeout: 60000,

        success: function(response) {
            
            $('#loading').hide();
            
            var strTable = '';

            if (response.data.status == '200') {

                if (response.data.data.length > 0) {


                    if (page == 1 || page == '') {
                        var k = 1;
                    } else {
                        var k = page * limit - limit + 1;
                    }

                    $(response.data.data).map((i, v) => {


                        function status(string) {
                            return string.charAt(0).toUpperCase() + string.slice(1);
                        }


                        if(v.active_status == "yes"){
                            var active_status = '<span style="color: green"><i class="fa fa-check fa-2x" aria-hidden="true"></i></span>';
                        }else{
                            var active_status = '<span style="color: red"><i class="fa fa-times fa-2x" aria-hidden="true"></i>';
                        }

                        console.log(v.is_default)
                        console.log(`${v.is_default =="no" ? `checked` : 'unchecked'}`)

                        strTable += `<tr id="row_${v.id}" class="row_" data="${v.name}">`;
                        strTable += '<td valign="top">' + k + '</td>';

                        strTable += '<td valign="top"><b>' + v.name + '</b><br><i>' + v.stage_desc + '</i></td>';
                        strTable += '<td valign="top">' + active_status + '</td>';
                        strTable += `<td valign="top"><input class="set_default" id="set_default_${v.id}" type="radio" name="default" value="${v.id}" ${v.final_stage =="yes" ? `checked` : ''}></td>`
                        strTable +=
                            '<td valign="top"><a href="edit_pipeline?id='+v.id+'"><i  class="fa fa-pencil"  data-toggle="tooltip" data-placement="top" style="font-style: italic; font-size: 20px;" title="Edit Employee"></i></a>&nbsp;&nbsp; <a class="delete_employee" style="cursor: pointer;" id="emp_' +
                            v.id +
                            '"><i  class="fa fa-trash"  data-toggle="tooltip" data-placement="top" style="font-style: italic; color: #f97c7c; font-size: 20px;" title="Delete Employee info"></i></a></td>';

                        strTable += '</tr>';

                        strTable +=
                            '<tr style="display: none;" id="loader_row_' + v.id + '">';
                        strTable +=
                            '<td colspan="5"><i class="fa fa-spinner fa-spin fa-fw fa-2x"  id="loading"></i>';
                        strTable += '</td>';
                        strTable += '</tr>';

                        k++;
                    });

                } else {

                    strTable = '<tr><td colspan="6">No record.</td></tr>';

                }

                $('#pagination').twbsPagination({
                    totalPages: Math.ceil(response.data.total_rows / limit),
                    visiblePages: 10,
                    onPageClick: function(event, page) {
                        var serial;
                        if (page == 1) {
                            serial = 1;
                        } else {
                            serial = 1 + (page - 1) * limit;
                        }

                        list_of_companies_employees(page, serial);
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                    },
                });

                $('#employeeData').html(strTable);
                $('#employeeData').show();

            } else if (response.data.status == '400') {
                $('#loading').hide();
                strTable += '<tr>';
                strTable += '<td colspan="6">No result</td>';
                strTable += '</tr>';

                $('#employeeData').html(strTable);
                $('#employeeData').show();
            } else if (response.status == '401') {
                //missing parameters
                var strTable = '';
                $('#loading').hide();
                strTable += '<tr>';
                strTable += '<td colspan="6">' + response.msg + '</td>';
                strTable += '</tr>';

                $('#employeeData').html(strTable);
                $('#employeeData').show();
            }

            // <a href="view_pipeline_info?id=' +
                            // v.id +'"><i  class="fa fa-info-circle"  data-toggle="tooltip" data-placement="top" style="font-style: italic; color: #add8e6; font-size: 20px;" title="View Pipeline Info"></i></a>

            $('#loading').hide();

        },

        error: function(response) {

            console.log(response);

            var strTable = '';
            $('#loading').hide();
            
            strTable += '<tr>';
            strTable +=
                '<td colspan="6"><strong class="text-danger">Connection error!</strong></td>';
            strTable += '</tr>';

            $('#employeeData').html(strTable);
            $('#employeeData').show();
            $('#loading').hide();

        },
    });
}



   function delete_pipeline(id) {
    
        $.ajax({
    
            type: "POST",
            dataType: "json",
            url: api_path + "crm/delete_pipeline_stage",
            headers: {
                        'Authorization':localStorage.getItem('token'),
            },
            data: { "pipeline_id": id, confirm_del : "no" },
            timeout: 60000, // sets timeout to one minute
    
            error: function (response) {
                alert("Error Deleting");
            },
    
            success: function (response) {
                console.log(response);
    
                if (response.status == '200') {
                    console.log(`#row_${id}`)
                    $("#row_" + id).remove();
    
                } else if(response.status == '400'){
                   if(confirm(response.msg, "Do you wish to continue?")){
                    confirm_delete(id)
                    } else {
                    return;
                    }
                }
                else {
                    alert("Error deleting pipeline");
                }
    
            }
    
        });
    }


    function confirm_delete(id) {
    
        $.ajax({
    
            type: "POST",
            dataType: "json",
            url: api_path + "crm/delete_pipeline_stage",
            headers: {
                        'Authorization':localStorage.getItem('token'),
            },
            data: { "pipeline_id": id, confirm_del : "yes" },
            timeout: 60000, // sets timeout to one minute
    
            error: function (response) {
                alert("Error Deleting");
            },
    
            success: function (response) {
                console.log(response);
    
                if (response.status == '200') {
                    console.log(`#row_${id}`)
                    $("#row_" + id).remove();
    
                }
                else {
                    alert("Error deleting pipeline");
                }
    
            }
    
        });
    }