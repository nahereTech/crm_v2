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


    $(document).on('click', ".switch_tab", function(){

        $(".switch_tab").css("background-color","#c2c2c2");
        $(".switch_tab").removeClass("btn-primary");

        $(this).css("background-color","");
        $(this).addClass("btn-primary");

        var the_tab_id = $(this).attr("id");
        switch_tab(the_tab_id);

    });

});

$('#task_for').append(`<option value="${localStorage.getItem('user_id')}" selected="selected">${localStorage.getItem('firstname')} ${localStorage.getItem('lastname')}</option>`);


function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-47-") >= 0 || role_list.indexOf("-48-") >= 0 || role_list.indexOf("-49-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    fetch_lead_details();
    list_of_tasks("");
    fetch_pipelines();

  }else{

    $("#main_display").remove();
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}

var one;



// $(document).on('click', "#post_task", function(){
//        post_task();
//     });

$(document).on('click', "#post_task", function(){
    const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
       post_task(id);
    });

 $(document).on('click', ".post_task_", function(){

        var id = $(this).attr("id").replace(/post_task_/, '');

        // const urlParams = new URLSearchParams(window.location.search);

        update_task_details(id);

    });


    $(document).on('click', ".edit_basic_info", function(){
        $(".edit_basic_info_form").show();
        $(".non_editable").hide();
        $("#buttons_for_edit_company").show();
       });

    $(document).on('click', "#cancel_update", function(){
        $(".edit_basic_info_form").hide();
        $(".non_editable").show();
        $("#buttons_for_edit_company").hide();
    });

      $(document).on('click', ".edit_contact_info", function(){
        $(".edit_contact_info_form").show();
        $(".non_contact_editable").hide();
        $("#buttons_for_edit_contact").show();
       });

       $(document).on('click', "#cancel_contact_update", function(){
        $(".edit_basic_info_form").hide();
        $(".non_contact_editable").show();
        $("#buttons_for_edit_contact").hide();
    });

    $(document).on('click', "#cancel_comp_update", function(){
        $(".edit_comp_info_form").hide();
        $(".non_comp_editable").show();
        $("#buttons_for_edit_comp").hide();
    });

     $(document).on('click', ".edit_comp_info", function(){
        $(".edit_comp_info_form").show();
        $(".non_comp_editable").hide();
        $("#buttons_for_edit_comp").show();
       });

       $(document).on('click', ".add_info", function(){
          $('#add_task').toggle();
        // $(".to_add_task").toggle();

       });

       $(document).on('click', ".edit_task", function(){
        $(".edit_task_form").show();
        $(".dont_edit").hide();
        $("#buttons_for_task_edit").show();
       });

           $(document).on('click', ".edit_task", function(){
        $(".edit_task_form").show();
        $(".dont_edit").hide();
        $("#buttons_for_task_edit").show();
       });

       // $(document).on('click', ".edit_posted_task", function(){
       //  $(".edit_posted_form").toggle();
       //  $(".for_one").show();
       //  if($('#contacts_firstname_field1').is(':visible'))
       //      {
       //                 // one = true
       //  $("#buttons_for_task_edit1").show();



       //      }else{
       //                 // one = false
       //       $("#buttons_for_task_edit1").hide();

       //      }

       //  $(".for_one").css("display", "block !important");

       //  $(".dont_edit_posted_form").toggle();
       // });

       $(document).on('click', ".edit_posted2_task", function(){
        $(".edit_posted2_form").toggle();
        $(".dont_edit_posted2_form").toggle();
        $("#buttons_for_task_edit").show();
       });

       $(document).on('click', ".edit_posted3_task", function(){
        $(".edit_posted3_form").toggle();
        $(".dont_edit_posted3_form").toggle();
        $("#buttons_for_task_edit").show();
       });


       
       $(document).on('click', ".for_hover3", function(){
                $(this).css('background-color', 'white ');

          $('.for_third').toggle();
      });
       $(document).on('click', ".for_hover2", function(){
                $(this).css('background-color', 'white ');

      }); $(document).on('click', ".for_hover1", function(){
                $(this).css('background-color', 'white ');

      });

       $(".for_hover1").on({
        mouseenter: function () {
            //stuff to do on mouse enter


            if($('.for_one').is(':visible'))
            {
                $(".for_hover1").css('background-color', 'white ');
            }else{
                $(".for_hover1").css('background-color', '#BADCFF');

            }
        },
         mouseleave: function () {
        //stuff to do on mouse leave
                $(".for_hover1").css('background-color', 'white');

        }
        
    });


       


         $(".for_hover2").on({
        mouseenter: function () {
            //stuff to do on mouse enter

            if($('.for_second').is(':visible'))
            {
                $(".for_hover2").css('background-color', 'white ');
            }else{
                $(".for_hover2").css('background-color', '#BADCFF');

            }
        },
         mouseleave: function () {
        //stuff to do on mouse leave
                $(".for_hover2").css('background-color', 'white');

        }
        
    });

           $(".for_hover3").on({
        mouseenter: function () {
            //stuff to do on mouse enter

            if($('.for_third').is(':visible'))
            {
                $(".for_hover3").css('background-color', 'white ');
            }else{
                $(".for_hover3").css('background-color', '#BADCFF');

            }
        },
         mouseleave: function () {
        //stuff to do on mouse leave
                $(".for_hover3").css('background-color', 'white');

        }
        
    });


       $(document).on('click', ".for_hover2", function(){
          $('.for_second').toggle();
      });

      
 $(document).on('click', ".hover_here", function(){

      });

 $(document).on('click', '.hover_here', function () {
            var id = $(this).attr("id").replace(/show_fields_/, '');
             $(`#for_one_${id}`).show();
             $(`#show_fields_${id}`).toggle();

            
        })

 $(document).on('click', '.arrow-down', function () {
            var id = $(this).attr("id").replace(/arrow_down_/, '');
             $(`#for_one_${id}`).hide();
             $(`#show_fields_${id}`).toggle();


            
        })

 $(document).on('click', ".cancel_task_update", function(){
            var id = $(this).attr("id").replace(/cancel_task_update_/, '');
           $(`.edit_posted_form_${id}`).hide();
           $(`.span_posted_${id}`).show();
           $(`#buttons_for_task_edit1_${id}`).toggle();

           
      });

   $(document).on('click', '.delete_task', function () {
            var id = $(this).attr("id").replace(/show_del_/, '');

            if (confirm("Are you sure you want to delete")) {
                delete_post(id);
            }else{
                return false;
            }
    
    })


   function delete_post(id) {
    
        $.ajax({
    
            type: "POST",
            dataType: "json",
            url: api_path + "crm/delete_task",
            headers: {
                        'Authorization':localStorage.getItem('token'),
            },
            data: { "task_id": id },
            timeout: 60000, // sets timeout to one minute
    
            error: function (response) {
                alert("Error Deleting");
            },
    
            success: function (response) {
                console.log(response);
    
                if (response.data.status == '200') {
                    console.log(`#for_hover_${id}`)
                    $("#for_hover_" + id).remove();
    
                } else {
                    alert("Error deleting post");
                }
    
            }
    
        });
    }
    


   


// task_details("")
function task_details(page) {
    var company_id = localStorage.getItem("company_id");
    var user_id = localStorage.getItem("user_id");

    var client_id = $.urlParam('id');
    // var company_id = localStorage.getItem("company_id");
    // var user_id = localStorage.getItem("user_id");

    if (page == "") {
        var page = 1;
    }
    var limit = 50;

    var task_code = $("#task_code").val();
    var task_text = $("#task_text").html();
    var task_by = $("#task_by").val();
    var task_for = $("#task_for").val();
    var date_range = $("#date_range").val();
    var project_id = $("#holds_vendor_id").html();
    var task_status = $("#task_status").val();
    var task_owners = $("#task_owners").val();

    $("#loading").show();
    $("#popData").html("");

    $("html, body").animate({ scrollTop: 0 }, "slow");

    $.ajax({
        type: "GET",
        dataType: "json",
        url: api_path + "crm/get_details_of_task",
        headers: {
            'Authorization':localStorage.getItem('token'),
        },
        data: {
            task_id: client_id,
           
        },
        timeout: 60000,

        success: function (response) {
            console.log(response.data);

            var strTable = "";


            if (response.status == "200") {
               console.log(response.data);
                // $('#item_id').val('')
       

                        



                       strTable +=`<li class="for_hover1" id="for_hover_${response.data.task_id}" style="border-radius: 10px; margin-bottom:5px; border-right:${response.data.progress_status == "Pending" ? "5px solid darkorange" :
                        response.data.progress_status == "Ongoing" ? "5px solid darkgray" :
                         response.data.progress_status == "Completed" ? "5px solid #169F85" : 
                         "5px solid darkred" }">
                            <div class="block">
                              <div class="tags">
                                  <span>${response.data.task_type == "Call" ? `<i class="fa fa-phone" aria-hidden="true" style="font-size:40px; color:#169F85; display:flex; justify-content: center;"></i>`: response.data.task_type == "Office Meeting" ? `<i class="fa fa-briefcase" style="font-size:40px; color:coral; display:flex; justify-content: center;" aria-hidden="true"></i>` : response.data.task_type == "Online Meeting" ? `<i class="fa fa-desktop" aria-hidden="true" style="font-size:40px; color:dimgrey; display:flex; justify-content: center;"></i>` : `<i class="fa fa-envelope" style="font-size:40px; color:gray; display:flex; justify-content: center;" aria-hidden="true"></i>` }
                                  </span>
                              </div>

                              <div class="block_content">

                                <div class="for_one" id="for_one_${response.data.task_id}" style="display:none;">
                                           <div class="x_title" style="border:none;">
                        <h2>Task<!-- <small>Sessions</small> --></h2>
                        <ul class="nav navbar-right panel_toolbox" style="">
                        <a class="arrow-down" id="arrow_down_${response.data.task_id}"><i class="fa fa-arrow-up blob green" aria-hidden="true" style="font-size: 20px; margin-top: 3px;color: rgba(51, 217, 178, 1);
                          "></i></a>
                          <li style="float: right; display:flex;"><a class="edit_posted_task" id="show_pen_${response.data.task_id}"><i class="fa fa-pencil" style="color: #f55b5b"></i></a>
                          <a class="delete_task" id="show_del_${response.data.task_id}"><i class="fa fa-times" style="color: #f55b5b"></i></a>
                          </li>
                        </ul>
                       
                        <div class="clearfix"></div>
                      </div>
                                    

                        <table class="table">

                    
                            <tbody>
                                
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td style="width: 20%"><b>Task Type:</b></td>
                                    <td>
                                        <span id="contacts_firstname" class="dont_edit_posted_form span_posted_${response.data.task_id}">${response.data.task_type}</span>
                                        <select class="form-control edit_posted_form_${response.data.task_id} task_type_${response.data.task_id}" id="contacts_firstname_field_${response.data.task_id}" value="${response.data.task_type}" name="gender" style="display:none;">
                                            <option value="1" selected>Call</option>
                                            <option value="2">Office Meeting</option>
                                            <option value="3">Online Meeting</option>
                                            <option value="4">Email</option>
                                        </select>
                                        <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Task Title:</b></td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${response.data.task_id} ">${response.data.task}</span>
                                        <input type="text" style="display:none;" class="form-control task_title_${response.data.task_id} edit_posted_form_${response.data.task_id}" value="${response.data.task}" id="contacts_tasktitle_field_${response.data.task_id}" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

<tr>
                                    <td style="width: 20%"><b>Task For:</b></td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${v.task_for_id} ">${v.task_for}</span>
                                        <select class="form-control edit_posted_form_${v.task_for_id} task_for_${v.task_for_id}" id="task_for_${v.task_for_id}" lang="${v.task_for_id}" value="${v.task_for}" name="gender" style="display:none;" name="gender" >
                                            <option value="${localStorage.getItem("user_id")}" selected>${localStorage.getItem("firstname")} ${localStorage.getItem("lastname")}</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Task Description:</b></td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${response.data.task_id}">${response.data.description}</span>
                                         <textarea style="display:none;"  class="form-control task_description_${response.data.task_id} edit_posted_form_${response.data.task_id}" value="${response.data.description}" id="main_task_${response.data.task_id}" >${response.data.description}</textarea>
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                  <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Start Date & Start Time:</b> </td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${response.data.task_id}"> ${response.data.date_created}</span>
                                        <input style="display:none;" type="datetime-local" class="form-control date_created_${response.data.task_id} edit_posted_form_${response.data.task_id}" value="${response.data.start_date.split('+')[0]}" id="contacts_tasktitle_field_${response.data.task_id}" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>End Date & Time:</b> </td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${response.data.task_id}">${response.data.finished_date_non_iso}</span>
                                        <input style="display:none;" type="datetime-local" class="form-control finished_date_${response.data.task_id} edit_posted_form_${response.data.task_id}" value="${response.data.finished_date.split('+')[0]}" id="contacts_tasktitle_field_${response.data.task_id}" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td style="width: 20%"><b>Task Status:</b></td>
                                    <td>
                                        <span class="dont_edit_posted_form span_posted_${response.data.task_id}">${response.data.progress_status}</span>
                                        <select style="display:none" class="form-control edit_posted_form_${response.data.task_id} task_status_${response.data.task_id}" value="${response.data.progress_status}"  id="contacts_firstname_field1_${response.data.task_id}" name="gender">
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Ongoing">Ongoing</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Not Done">Not Done</option>
                                        </select>
                                        <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Upload File:</b></td>
                                    <td>
                                        ${response.data.files ? display_files(response.data.files) : `<span class="dont_edit_posted_form span_posted_${response.data.task_id}">No file</span>`}

                                        <span class="dont_edit_posted_form"></span>
                                        <input style="display: none;" type="file" class="form-control edit_posted_form_${response.data.task_id}" id="contacts_tasktitle_field_${response.data.task_id}" >
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                  <tr id="buttons_for_task_edit1_${response.data.task_id}" style="display:none">
                                    <td></td>
                                    <td>
                                        <div id="error_msg" style="color: red; display: "></div>
                                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader_${response.data.task_id}"></i>
                                        <button type="button" class="btn btn-primary post_task_" id="post_task_${response.data.task_id}">Post Task</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger cancel_task_update" id="cancel_task_update_${response.data.task_id}">Cancel Update</button>
                                    </td>
                                </tr>
                            </tbody>



                        </table>


                                </div>
                                <div class="hover_here" id="show_fields_${response.data.task_id}">
                                <h2 class="title" style="display:flex; justify-content:space-between">
                                                <b><a>${response.data.task} </a></b>
                                                      ${response.data.progress_status == "Pending" ?
                                                `<span style= 'background: darkorange; padding:10px;color:white; font-size:12px; border-radius: 5px;'>Pending</span>`: 
                                                response.data.progress_status == "Ongoing" ? "<span style= 'background: darkgray; padding:10px;color:white; border-radius: 5px; font-size:12px;'>Ongoing</span>" : 
                                                response.data.progress_status == "Completed" ? "<span style= 'background: #169F85; padding:10px;color:white; border-radius: 5px;font-size:12px;'>Completed</span>" :
                                                 "<span style= 'background: darkred;font-size:12px; padding:10px;color:white; border-radius: 5px;'>Not Done</span>" }
                                            </h2>
                                <div class="byline">
                                  <span>${response.data.date_created}</span> by <a>${response.data.name_of_creator}</a>
                                </div>
                                <p class="excerpt"> ${response.data.description}<a></a>
                                </p>
                            </div>
                              </div>
                            </div>
                          </li>`

                        




               
                // $("#pagination").twbsPagination({
                //     totalPages: Math.ceil(response.data.total_rows / limit),
                //     visiblePages: 10,
                //     onPageClick: function (event, page) {
                //         list_of_tasks(page);
                //     },
                // });

                $("#popData").html(strTable);
                $("#popData").show();
                $("#loading").hide();
            } else if (response.data < 0) {
                $("#loading").hide();

                strTable = '<tr><td colspan="8">' + response.msg + "</td></tr>";

                $("#popData").html(strTable);
                $("#popData").show();
            } else if (response.data.status == "400") {
                var strTable = "";
                $("#loading").hide();
                // alert(response.msg);
                strTable += "<tr>";
                strTable += '<td colspan="8">' + response.msg + "</td>";
                strTable += "</tr>";

                $("#popData").html(strTable);
                $("#popData").show();
            }
        },

        error: function (response) {
            var strTable = "";
            $("#loading").hide();
            // alert(response.msg);
            strTable += "<tr>";
            strTable += '<td colspan="8"><strong class="text-danger">Connection error</strong></td>';
            strTable += "</tr>";

            $("#popData").html(strTable);
            $("#popData").show();
        },
    });
}



function switch_tab(id){
    $(".all_bxs").hide();
    $("#"+id+"_bx").show();
}


  $(document).on('click', ".edit_posted_task", function(){
        var id = $(this).attr("id").replace(/show_pen_/, '');

        $(`.edit_posted_form_${id}`).toggle();
        // $(".for_one").show();
        if($(`#contacts_firstname_field1_${id}`).is(':visible'))
            {
                       // one = true
        $(`#buttons_for_task_edit1_${id}`).show();



            }else{
                       // one = false
             $(`#buttons_for_task_edit1_${id}`).hide();

            }

        $(`#for_one_${id}`).css("display", "block !important");

        $(`.span_posted_${id}`).toggle();
       });



function fetch_lead_details(){

    var lead_id = $.urlParam('id');
    var company_id = localStorage.getItem("company_id");
    var user_id = localStorage.getItem("user_id");


    $.ajax({

        type: "GET",
        dataType: "json",
        cache: false,
        headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        url: api_path + "crm/get_lead_info",
        data: { company_id: company_id, user_id: user_id, lead_id: lead_id },

        success: function (response) {

            console.log(response);

            if (response.status == "200") {

                $("#lead_name").html(response.data.lead_name);
                $("#lead_desc").html(response.data.lead_desc);
                $("#lead_value").html(response.data.lead_value);
                $("#lead_stage").html(response.data.lead_stage.name);


                $("#lead_name_field").val(response.data.lead_name);
                $("#lead_description_field").val(response.data.lead_desc);
                $("#lead_value_field").val(response.data.lead_value);
                $("#lead_stage").val(response.data.lead_stage.name);


                $("#contacts_firstname").html(response.data.contacts_firstname);
                $("#contacts_lastname").html(response.data.contacts_lastname);
                $("#contacts_phone").html(response.data.contacts_phone);
                $("#contacts_email").html(response.data.contacts_email);




                $("#contacts_firstname_field").val(response.data.contacts_firstname);
                $("#contacts_lastname_field").val(response.data.contacts_lastname);
                $("#contacts_phone_field").val(response.data.contacts_phone);
                $("#contacts_email_field").val(response.data.contacts_email);


                $("#cont_firstname").html(response.data.company_name);
                $("#cont_lastname").html(response.data.company_address);
                $("#cont_phone").html(response.data.company_website);




                $("#comp_name_field").val(response.data.company_name);
                $("#comp_descr_field").val(response.data.company_address);
                $("#comp_website_field").val(response.data.company_website);

                // $(`#pipe_${response.data.lead_stage.id}`).attr("selected", "selected")







            } else if (response.status == "401") {

                $("#add").show();
                $("#item_loader").hide();
                $("#error").html(response.status.msg);

            }

        },

        error: function (response) {

            $("#add").show();
            $("#item_loader").hide();
            $("#error").html(response.status.msg);

        },

    });

}



function post_task(id){





    
    var task_for = $("#task_for").val();
    var task_type = $("#task_type").val();

    var title = $("#contacts_tasktitle_field").val();

    var description = $("#main_task").val();
    var start = $("#start").val();
    var end= $("#end").val();
    var status = $("#status").val();
    var file = $("#file").val();

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

      $("#loader_task").hide();
      $("#post_task").show();

      // return; 

    }





           var fd = new FormData();
            var data_file = $('#file').prop("files")[0];
            fd.append("task_title", title);
            fd.append("task_type", task_type);
            fd.append("task_for", task_for);
            fd.append("task_status", status);
            fd.append("task_from", 'lead');
            fd.append("task_from_id", id);
            fd.append("task_desc", description);
            fd.append("start_date", start);
            fd.append("end_date", end);
            fd.append("files", data_file ? data_file : '');
            console.log(data_file)

           


    $("#loader_task").show();
    $("#post_task").hide();


     $.ajax({

                type: "POST",
                dataType: 'json',
                  headers: {
                        'Authorization':localStorage.getItem('token'),
                        // 'Content-Type':'application/json'
            },
                processData: false,
                contentType: false,
                // enctype: "multipart/form-data",
                cache: false,
                url: api_path + "crm/add_task",
                data: fd,

        timeout: 60000,

        success: function (response) {

            if (response.data.status == "200") {

                $("#loader_task").hide(); //hide loader
                $("#post_task").show();//show update button
                $("#cancel_update").show();//show cancel button
                alert('Task Posted Successful')



                location.reload()

                // $(".edit_basic_info_form").hide(); //hide all edit boxes
                // $(".non_editable").show(); //show the text



            } else if (response.data.status == "401") {

                $("#loader_task").hide(); //hide loader
                $("#post_task").show();
                $("#item_loader").hide();
                $("#error").html(response.status.msg);

            }

        },

        error: function (response) {

            $("#edit").show();
            $("#item_loader").hide();
            $("#error").html(response.status.msg);

        },
    });

}




function update_task_details(task_id){


    
    var task_type = $(`.task_type_${task_id}`).val();
    var task_title = $(`.task_title_${task_id}`).val();

    var task_description= $(`.task_description_${task_id}`).val();
    var date_created = $(`.date_created_${task_id}`).val();
    var finished_date= $(`.finished_date_${task_id}`).val();
    var task_status = $(`.task_status_${task_id}`).val();
    var task_for = $(`.task_for_${task_id}`).val();



    $(`#loader_${task_id}`).show();
    $(`#post_task_${task_id}`).hide();

    $.ajax({

        type: "POST",
        dataType: "json",
        headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        url: api_path + "crm/edit_task",
        
        data: {


            "task_id": task_id, 
            "task_desc": task_description,
            "start_date":  date_created,
            "end_date"  : finished_date, 
            "task_status" : task_status,
            "task_type" : task_type,
            "task_for" : task_for,
            "task_title" : task_title,



        },

        timeout: 60000,

        success: function (response) {

            if (response.data.status == "200") {

                $(`#loader_${task_id}`).hide(); //hide loader
                $(`#post_task_${task_id}`).show();//show update button
                $("#cancel_update").show();//show cancel button

                $(".edit_basic_info_form").hide(); //hide all edit boxes
                $(".non_editable").show(); //show the text
                alert('Update Successful')
                location.reload()


            } else if (response.data.status == "401") {

                $(`#loader_${task_id}`).hide(); //hide loader
                $("#edit").show();
                $("#item_loader").hide();
                $("#error").html(response.status.msg);

            }

        },

        error: function (response) {

            $("#edit").show();
            $("#item_loader").hide();
            $("#error").html(response.status.msg);

        },
    });

}




 function display_files(imgs) {
        console.log('here2')
        var docs = "";
        var pics = "";
        // if(imgs !== undefined || imgs !== "undefined"){
        //     imgs_v = imgs.split(',');
        // }
        // var imgs_v = imgs.split(',');
        // console.log(imgs_v);
    
        
        
        
    
        if (imgs.length !== 0) {
            // var path = imgs_v;
            // var file_path = path.join().replace(/workgroup_images/gi, 'temp_upload');
            // var file_path = path.join();
    
            // console.log(file_path)
            // if(!(path.includes('files'))){
            //     console.log('am')
            //     $('.gallery-image').hide();
            // }
            
            {imgs.length !== undefined || imgs.length !== "undefined " ? imgs.map((a, i) => {
    
    
            // path.map((a, i) => {

                console.log(a['url'])
                var url = a['url']
    
                if (url.includes('.pdf') || url.includes('.xls') || url.includes('.doc')) {
    
                    if (url.includes('.pdf')) {
                        docs += `<div class="gallery-item" ><a href="${url}" target="_blank"><img src="./js/pdf.png" style="width: 50%;height: 90px; width: 50%;
                        margin-left: auto;margin-right: auto;display: flex;"/></a><div class="bottom-right">Pdf file</div></div>`
                    }
                    if (a.includes('.xls')) {
                        docs += `<div class="gallery-item"><a href="${url}" target="_blank"><img src="./icons/Excel-icon.png"style="width: 50%;height: 90px; width: 50%;
                        margin-left: auto;margin-right: auto;display: flex;"/></a><div class="bottom-right">Excel file</div></div>`
                    }
                    if (a.includes('.doc')) {
                        docs += `<div class="gallery-item"><a href="${url}" target="_blank"><img src="./icons/Word-icon.png" style="width: 50%;height: 90px; width: 50%;
                        margin-left: auto;margin-right: auto;display: flex;"/></a><div class="bottom-right">Doc file</div></div>`
                    }
    
                } else {
    
                    // pics +=`<a href="${a}" data-lightbox="roadtrip"><img src="${a}" /></a>`
    
                    pics += `<div class="gallery-item"><a href="${url}" data-lightbox="roadtrip_${i}"><img class="gallery-image" src="${url}" /></a>
                             </div>`
    
                    // pics += `<div class="gg-element gg-${i}"><img src="${a}" /></div>`;
    
                }
    
            }) : '' }
    
    
            // docs = `<div class="gallery">${docs}</div>`;
    
            // pics = `<div id="gg-screen"></div> <div class="gg-box" style="background-color:green;">`+pics+`</div>`;
    
            pics = `<div class="gallery" style="grid-template-columns: repeat(3, 250px);">${pics}${docs}</div>`;
    
    
        } else { //no docs
    
        }
        if(imgs.length > 0){
        imgs = [];
        }
        console.log(imgs)
        // alert(imgs)
    
        var combo = pics;
    
        return combo;
    
        //          var docs = `<div style="background-color:red; margin: 10px 65px; display: grid;grid-template-columns: repeat(2, 150px);grid-auto-rosocket: 150px;
        //                grid-gap: 8px;">`;
    
        //                var pics = `<div id="gg-screen"></div>
        //             <div class="gg-box" style="background-color:green;">`;
    
        // if(imgs.length !== 0){
        //            imgs.map((a,i) => { 
    
        //              if(a.includes('.pdf') || a.includes('.xls') || a.includes('.doc')){
        //                  if(a.includes('.pdf')){
        //                  docs +=`
        //     <div class="gg-element gg-${i}" style="width: 150px;" ><a href="${a}"><img src="./icons/Apps-Pdf-icon-diff.png" /></a></div></div>`
        //                  }
        //                  if(a.includes('.xls')){
        //                  docs +=`
        //     <div class="gg-element gg-${i}" style="width: 150px;" ><a href="${a}"><img src="./icons/Excel-icon.png" /></a></div></div>`
        //                  }
        //                  if(a.includes('.doc')){
        //                  docs +=`
        //     <div class="gg-element gg-${i}" style="width: 150px;" ><a href="${a}"><img src="./icons/Word-icon.png" /></a></div></div>`
        //                  }
    
        //              }
    
        //              else {
        //                  pics += `<div class="gg-element gg-${i}"><img src="${a}" /></div>`
        //              }
    
        //               }); 
        //                  return `${docs}${pics}</div>`;
        //             }
        //          else{
        //              return `<span style="display: none"></span>`
        //          }
    
    
    
    }







function list_of_tasks(page) {
    var company_id = localStorage.getItem("company_id");
    var user_id = localStorage.getItem("user_id");
    if (page == "") {
        var page = 1;
    }
    var limit = 50;

      const urlParams = new URLSearchParams(window.location.search);
        const task_from_id = urlParams.get('id');

    var task_code = $("#task_code").val();
    var task_text = $("#task_text").html();
    var task_by = $("#task_by").val();
    var task_for = $("#task_for").val();
    var date_range = $("#date_range").val();
    var project_id = $("#holds_vendor_id").html();
    var task_status = $("#task_status").val();
    var task_owners = $("#task_owners").val();

    $("#loading").show();
    $("#popData").html("");

    $("html, body").animate({ scrollTop: 0 }, "slow");

    $.ajax({
        type: "GET",
        dataType: "json",
        url: api_path + "crm/list_of_tasks",
        headers: {
            'Authorization':localStorage.getItem('token'),
        },
        data: {
            company_id: company_id,
            task_from_id: task_from_id,
            page: page,
            limit: limit,
            task_code: "",
            task_text: "",
            task_by: "",
            date_range: "",
            task_for: "",
            project_id: "",
            task_status: "",
            task_from: "lead",
            task_owners: "all_tasks",
        },
        timeout: 60000,

        success: function (response) {
            console.log(response);

            var strTable = "";


            if (response.status == "200") {
                // $('#item_id').val('')
                if (response.data.length > 0) {
                    var k = 1;
                    $.each(response["data"], function (i, v) {



                       strTable +=`<li class="for_hover1" id="for_hover_${v.task_id}" style="border-radius: 10px; margin-bottom:5px; border-right:${v.progress_status == "Pending" ? "5px solid darkorange" :
                        v.progress_status == "Ongoing" ? "5px solid darkgray" :
                         v.progress_status == "Completed" ? "5px solid #169F85" : 
                         "5px solid darkred" }">
                            <div class="block">
                              <div class="tags">
                                  <span>${v.task_type == "Call" ? `<i class="fa fa-phone" aria-hidden="true" style="font-size:40px; color:#169F85; display:flex; justify-content: center;"></i>`: v.task_type == "Office Meeting" ? `<i class="fa fa-briefcase" style="font-size:40px; color:coral; display:flex; justify-content: center;" aria-hidden="true"></i>` : v.task_type == "Online Meeting" ? `<i class="fa fa-desktop" aria-hidden="true" style="font-size:40px; color:dimgrey; display:flex; justify-content: center;"></i>` : `<i class="fa fa-envelope" style="font-size:40px; color:gray; display:flex; justify-content: center;" aria-hidden="true"></i>` }
                                  </span>
                              </div>

                              <div class="block_content">

                                <div class="for_one" id="for_one_${v.task_id}" style="display:none;">
                                           <div class="x_title" style="border:none;">
                        <h2>Task<!-- <small>Sessions</small> --></h2>
                        <ul class="nav navbar-right panel_toolbox" style="">
                          <a class="arrow-down" id="arrow_down_${v.task_id}"><i class="fa fa-arrow-up blob green"  aria-hidden="true" style="font-size: 20px; margin-top: 3px;color: rgba(51, 217, 178, 1);
                          "></i></a>

                          <li style="float: right; display:flex;">
                          
                          <a class="edit_posted_task" id="show_pen_${v.task_id}"><i class="fa fa-pencil" style="color: #f55b5b"></i></a>
                          <a class="delete_task" id="show_del_${v.task_id}"><i class="fa fa-times" style="color: #f55b5b"></i></a>
                          </li>
                        </ul>
                       
                        <div class="clearfix"></div>
                      </div>
                                    

                        <table class="table">

                    
                            <tbody>
                                
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td style="width: 20%"><b>Task Type:</b></td>
                                    <td>
                                        <span id="contacts_firstname" class="dont_edit_posted_form span_posted_${v.task_id}">${v.task_type}</span>
                                        <select class="form-control edit_posted_form_${v.task_id} task_type_${v.task_id}" id="contacts_firstname_field_${v.task_id}" value="${v.task_type}" name="gender" style="display:none;">
                                            <option value="1" selected>Call</option>
                                            <option value="2">Office Meeting</option>
                                            <option value="3">Online Meeting</option>
                                            <option value="4">Email</option>
                                        </select>
                                        <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Task Title:</b></td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${v.task_id} ">${v.task}</span>
                                        <input type="text" style="display:none;" class="form-control task_title_${v.task_id} edit_posted_form_${v.task_id}" value="${v.task}" id="contacts_tasktitle_field_${v.task_id}" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>


                                <tr>
                                    <td style="width: 20%"><b>Task For:</b></td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${v.task_for_id} ">${v.task_for}</span>
                                        <select class="form-control edit_posted_form_${v.task_for_id} task_for_${v.task_for_id}" id="task_for_${v.task_for_id}" lang="${v.task_for_id}" value="${v.task_for}" name="gender" style="display:none;" name="gender" >
                                            <option value="${localStorage.getItem("user_id")}" selected>${localStorage.getItem("firstname")} ${localStorage.getItem("lastname")}</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Task Description:</b></td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${v.task_id}">${v.description}</span>
                                         <textarea style="display:none;"  class="form-control task_description_${v.task_id} edit_posted_form_${v.task_id}" value="${v.description}" id="main_task_${v.task_id}" >${v.description}</textarea>
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                  <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Start Date & Start Time:</b> </td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${v.task_id}"> ${v.date_created}</span>
                                        <input style="display:none;" type="datetime-local" class="form-control date_created_${v.task_id} edit_posted_form_${v.task_id}" value="${v.start_date.split('+')[0]}" id="contacts_tasktitle_field_${v.task_id}" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>End Date & Time:</b> </td>
                                    <td>
                                        <span  class="dont_edit_posted_form span_posted_${v.task_id}">${v.finished_date_non_iso}</span>
                                        <input style="display:none;" type="datetime-local" class="form-control finished_date_${v.task_id} edit_posted_form_${v.task_id}" value="${v.finished_date.split('+')[0]}" id="contacts_tasktitle_field_${v.task_id}" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td style="width: 20%"><b>Task Status:</b></td>
                                    <td>
                                        <span class="dont_edit_posted_form span_posted_${v.task_id}">${v.progress_status}</span>
                                        <select style="display:none" class="form-control edit_posted_form_${v.task_id} task_status_${v.task_id}" value="${v.progress_status}"  id="contacts_firstname_field1_${v.task_id}" name="gender">
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Ongoing">Ongoing</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Not Done">Not Done</option>
                                        </select>
                                        <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Upload File:</b></td>
                                    <td>
                                        ${v.files ? display_files(v.files) : `<span class="dont_edit_posted_form span_posted_${v.task_id}">No file</span>`}

                                        <span class="dont_edit_posted_form"></span>
                                        <input style="display: none;" type="file" class="form-control edit_posted_form_${v.task_id}" id="contacts_tasktitle_field_${v.task_id}" >
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                  <tr id="buttons_for_task_edit1_${v.task_id}" style="display:none">
                                    <td></td>
                                    <td>
                                        <div id="error_msg" style="color: red; display: "></div>
                                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader_${v.task_id}"></i>
                                        <button type="button" class="btn btn-primary post_task_" id="post_task_${v.task_id}">Post Task</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger cancel_task_update" id="cancel_task_update_${v.task_id}">Cancel Update</button>
                                    </td>
                                </tr>
                            </tbody>



                        </table>


                                </div>
                                <div class="hover_here" id="show_fields_${v.task_id}">
                                <h2 class="title" style="display:flex; justify-content:space-between">
                                                <b><a>${v.task} </a></b>
                                               ${v.progress_status == "Pending" ?
                                                `<span style= 'background: darkorange; padding:10px;color:white; font-size:12px; border-radius: 5px;'>Pending</span>`: 
                                                v.progress_status == "Ongoing" ? "<span style= 'background: darkgray; padding:10px;color:white; border-radius: 5px; font-size:12px;'>Ongoing</span>" : 
                                                v.progress_status == "Completed" ? "<span style= 'background: #169F85; padding:10px;color:white; border-radius: 5px;font-size:12px;'>Completed</span>" :
                                                 "<span style= 'background: darkred;font-size:12px; padding:10px;color:white; border-radius: 5px;'>Not Done</span>" }
                                            </h2>
                                <div class="byline">
                                  <span>${v.date_created}</span> by <a>${v.name_of_creator}</a>
                                </div>
                                <p class="excerpt"> ${v.description}<a></a>
                                </p>
                            </div>
                              </div>
                            </div>
                          </li>`

                        




                    });
                } else {
                   strTable = '<tr><td colspan="8">' + response.msg + "</td></tr>";
                }

                // $("#pagination").twbsPagination({
                //     totalPages: Math.ceil(response.data.total_rows / limit),
                //     visiblePages: 10,
                //     onPageClick: function (event, page) {
                //         list_of_tasks(page);
                //     },
                // });

                console.log(strTable)

                $("#popData").html(strTable);
                $("#popData").show();
                $("#loading").hide();
            } else if (response.data <= 0) {
                $("#loading").hide();

                strTable = '<tr><td colspan="8">' + response.msg + "</td></tr>";

                $("#popData").html(strTable);
                $("#popData").show();
            } else if (response.status == "400") {
                var strTable = "";
                $("#loading").hide();
                // alert(response.msg);
                strTable += "<tr>";
                strTable += '<td colspan="8">' + response.msg + "</td>";
                strTable += "</tr>";

                $("#popData").html(strTable);
                $("#popData").show();
            }
        },

        error: function (response) {
            var strTable = "";
            $("#loading").hide();
            // alert(response.msg);
            strTable += "<tr>";
            strTable += '<td colspan="8"><strong class="text-danger">Connection error</strong></td>';
            strTable += "</tr>";

            $("#popData").html(strTable);
            $("#popData").show();
        },
    });
}

$(document).on('click', "#update_details__", function(){
        const urlParams = new URLSearchParams(window.location.search);
        const client_id = urlParams.get('id'); // johnny
           update_contact_details(client_id);

    });



function update_contact_details(client_id){


    
    var contact_name = $("#contacts_firstname_field").val();
    var contact_lastname = $("#contacts_lastname_field").val();

    var contact_phone = $("#contacts_phone_field").val();
    var contact_email = $("#contacts_email_field").val();
    // var contact_address= $("#contacts_address_field").val();
    // var contact_dob = $("#contacts_dob_field").val();


    // console.log({"client_id": client_id, "contact_firstname": company_name, "contact_lastname":  contact_lastname,"contact_phone"  : contact_phone,"contact_email" : contact_email,"contact_address" : contact_address,"contact_dob" : contact_dob})
            
  
    $("#loader__").show();
    $("#update_details__").hide();

    $.ajax({

        type: "POST",
        dataType: "json",
        headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        url: api_path + "crm/update_lead_contact",
        
        data: {

            "lead_id": client_id, 
            "firstname": contact_name,
            "lastname":  contact_lastname,
            "phone"  : contact_phone, 
            "email" : contact_email,
        },

        timeout: 60000,

        success: function (response) {

            if (response.data.status == "200") {

                $("#loader__").hide(); //hide loader
                $("#update_details__").show();//show update button
                $("#cancel_update").show();//show cancel button


            


                $("#contacts_firstname").html(contact_name);
                $("#contacts_lastname").html(contact_lastname);
                $("#contacts_phone").html(contact_phone);
                $("#contacts_email").html(contact_email);




                $("#contacts_firstname_field").val(contact_name);
                $("#contacts_lastname_field").val(contact_lastname);
                $("#contacts_phone_field").val(contact_phone);
                $("#contacts_email_field").val(contact_email);


                // $("#comp_name_field").html(response.data.contacts_lastname);
                // $("#comp_descr_field").html(response.data.contacts_phone);
                // $("#comp_website_field").html(response.data.contacts_email);

                $(".edit_contact_info_form").hide(); //hide all edit boxes
                $(".non_contact_editable").show(); //show the text
                // alert('Update Successful')



            } else if (response.data.status == "401") {

                $("#loader__").hide(); //hide loader
                $("#edit").show();
                $("#item_loader").hide();
                $("#error").html(response.status.msg);

            }

        },

        error: function (response) {

            $("#edit").show();
            $("#item_loader").hide();
            $("#error").html(response.status.msg);

        },
    });

}


 $(document).on('click', "#update_comp_details", function(){
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id'); // johnny
           update_company_details(id);

    });


    function update_company_details(company_id){

    var company_name = $("#comp_name_field").val();
    var company_description = $("#comp_descr_field").val();
    // var company_phone = $("#company_phone_field").val();
    // var company_email = $("#company_email_field").val();
    // var company_address = $("#company_address_field").val();
    var company_website = $("#comp_website_field").val();
    var company_id = $.urlParam('id');


    if(company_id == "" || company_id == null){
        $("#error_msg").html("Missing company id");
        return;
    }

    $("#loader").show();
    $("#update_comp_details").hide();

    $.ajax({

        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "crm/update_company_info",
        headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        data: {

            client_id: company_id, 
            company_name: company_name, 
            company_description: company_description, 
            company_website : company_website

        },

        success: function (response) {

            if (response.data.status == "200") {


                $("#cont_firstname").html(company_name);
                $("#cont_lastname").html(company_description);
                $("#cont_phone").html(company_website);



                $("#comp_name_field").val(company_name);
                $("#comp_descr_field").val(company_description);
                $("#comp_website_field").val(company_website);



                $("#loader").hide(); //hide loader
                $("#update_comp_details").show();//show update button
                $("#cancel_update").show();//show cancel button

                $(".edit_comp_info_form").hide(); //hide all edit boxes
                $(".non_comp_editable").show(); //show the text




            } else if (response.data.status == "401") {

                $("#loader").hide(); //hide loader
                $("#update_comp_details").show();//show update button
                $("#edit").show();
                $("#item_loader").hide();
                $("#error").html(response.status.msg);

            }

        },

        error: function (response) {

            $("#edit").show();
               $("#loader").hide(); //hide loader
                $("#update_comp_details").show();//show update button
            $("#item_loader").hide();
            $("#error").html(response.status.msg);

        },
    });

}


 $(document).on('click', ".update_lead_details", function(){
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id'); // johnny
           update_lead_details(id);



    });

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
                    strTable += '<option value="'+v.id+'" id="pipe_'+v.id+'">' + v.name + '</option>';
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


    function update_lead_details(company_id){

    var lead_name = $("#lead_name_field").val();
    var lead_description = $("#lead_description_field").val();
    var lead_value = $("#lead_value_field").val();
    var lead_status = $("#lead_status").val();
    var company_website = $("#comp_website_field").val();
    var company_id = $.urlParam('id');


    if(company_id == "" || company_id == null){
        $("#error_msg").html("Missing company id");
        return;
    }

    $("#loader_lead").show();
    $("#update_lead_details").hide();

    $.ajax({

        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "crm/update_lead_info",
        headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        data: {

            lead_id: company_id, 
            lead_name: lead_name, 
            lead_desc: lead_description, 
            lead_value : lead_value,
            lead_status : lead_status

        },

        success: function (response) {

            if (response.status == "200") {

                $("#loader_lead").hide(); //hide loader
                $("#update_lead_details").show();//show update button
                $("#cancel_update").show();//show cancel button


                $("#lead_name").html(lead_name);
                $("#lead_desc").html(lead_description);
                $("#lead_value").html(lead_value);
                $("#lead_stage").html(lead_status);


                $("#lead_name_field").val(lead_name);
                $("#lead_description_field").val(lead_desc);
                $("#lead_value_field").val(lead_value);
                $("#lead_stage").val(lead_status);


                $(".edit_basic_info_form").hide(); //hide all edit boxes
                $(".non_editable").show(); //show the text
                alert('Update Successful')


            } else if (response.data.status == "401") {

                $("#loader_lead").hide(); //hide loader
                $("#edit").show();
                $("#item_loader").hide();
                $("#error").html(response.status.msg);

            }

        },

        error: function (response) {

            $("#edit").show();
            $("#item_loader").hide();
            $("#error").html(response.status.msg);

        },
    });

}
