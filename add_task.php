<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>
<!-- page content -->
<div class="right_col" role="main" id="main_display" style="display: ;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Add Task</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <a href="tasks"><button type="button" class="btn btn-primary">Back</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <br />

                    <div class="x_content">
                        <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <!--  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_custom_id">Project<span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select  class="form-control col-md-7 col-xs-12 add_item_required" id="project_dp">
                          </select>
                        </div>
                      </div> -->

                            <div class="form-group">
                                <!-- <th scope="row">3</th> -->
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_custom_id">Task Type<span>*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control edit_task_form add_item_required" id="task_type" name="gender">
                                        <option value="">-- Select Type --</option>
                                        <option value="1">Call</option>
                                        <option value="2">Office Meeting</option>
                                        <option value="3">Online Meeting</option>
                                        <option value="4">Email</option>
                                    </select>
                                    <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                </div>
                                <!-- <td>@twitter</td> -->
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_custom_id">Task For<span>*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12 add_item_required" id="task_for">
                                        <option value="">--- Select ---</option>
                                        <option value="1">Client</option>
                                        <option value="2">Lead</option>
                                    </select>
                                    <i class="fa fa-spinner fa-spin fa-fw fa-2x" style="display: none;" id="task_for_loader"></i>
                                </div>
                            </div>

                            <div class="form-group select_name" style="display: none;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_custom_id">Client/Lead Name<span>*</span> </label>
                                <datalist id="options"> </datalist>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input list="options" class="form-control col-md-7 col-xs-12 add_item_required" id="select_item" autocomplete="off" />
                                </div>
                                <div id="holds_vendor_id" style="float: left; display: none;"></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Task Name<span>*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="task_name" class="form-control col-md-7 col-xs-12 add_item_required" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Task Description <span>*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea cols="3" rows="5" class="form-control col-md-7 col-xs-12" id="task_desc"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <th scope="row">3</th> -->
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Start Date & Time: <span>*</span> </label>


                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="datetime-local" class="form-control edit_task_form add_item_required" id="start" />
                                </div>
                                <!-- <td>@twitter</td> -->
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">End Date & Time: <span>*</span> </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="datetime-local" class="form-control edit_task_form" add_item_required id="end" />
                                </div>
                                <!-- <td>@twitter</td> -->
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Task Status <span>*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <span style="display: none;" id="contacts_firstname" class="dont_edit"> Pending</span>
                                    <select class="form-control edit_task_form add_item_required" id="status" name="gender">
                                        <option value="Pending" selected>Pending</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Not Done">Not Done</option>
                                    </select>
                                    <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                </div>
                                <!-- <td>@twitter</td> -->
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Upload File <span></span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <span style="display: none;" id="task_title" class="dont_edit"></span>
                                    <input type="file" class="form-control edit_task_form" id="file" multiple />
                                </div>
                                <!-- <td>@twitter</td> -->
                            </div>

                            <!--   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_custom_id">Delivery Date<span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="delivery_date"  class="form-control col-md-7 col-xs-12 add_item_required">
                        </div>

                      </div> -->

                            <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_description">Address
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea cols="3" class="form-control col-md-7 col-xs-12" id="add_description"></textarea>
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_description">Lead Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea cols="3" class="form-control col-md-7 col-xs-12" id="add_description"></textarea>
                        </div>
                      </div> -->

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 text-danger" id="error"></div>
                            </div>

                            <!-- <div class="ln_solid"></div> -->

                            <!-- <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" id="add">Add Task</button>
                          <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="item_loader"></i>
                          <div id="add_user_loading" style="display:  none">Loading...</div>
                        </div>
                      </div> -->
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title"  style="display:none;">
                        <h2>Multiple file uploader</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content"  style="display:none;">
                        <p>Drag multiple files to the box below for multi upload or click to select files.</p>
                        <form action="form_upload.html" class="dropzone"></form>
                        <br />
                        <br />
                    </div>

                    <button type="submit" class="btn btn-success" id="add">Add Task</button>
                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="item_loader"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- modal -->
<div class="modal fade" id="modal_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">
                    Success
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h3>
            </div>
            <div class="modal-body">
                <h4>Task Added Successfully!</h4>
            </div>
            <!-- <div class="modal-footer"> -->
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            <!-- </div> -->
        </div>
    </div>
</div>

<div id="error_display" style="display: none;">
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title"></div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-info alert-dimissible fade-in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true"></span>
                        </button>
                        <strong>Sorry you don't have access to this page!</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

          $(document).ready(function(){

            list_projects_dropdown('');

            $(document).on('click', '#add', function(){

              add_new_task();

            });

            $(document).on('change', '#project_dp', function(){

              var id = $(this).val();
              fetch_project_subs(id,'');

            });

            $(document).on('change', '#task_for', function(){
              $(`.select_name`).hide();

              var id = $(this).val();
              if(!id){
                alert('Select task for')
              }else{
                fetch_clients_leads(id, "");
              }
            });


            $('input#delivery_date').datepicker({
              dateFormat: "yy-mm-dd"
            });

          });


          function fetch_project_subs(id,page){

            if(id == ""){
              $("#task_for").html('');
              return;
              //reset and disable selection box for subs
            }else{

            }

            var company_id = localStorage.getItem('company_id');
            if (page == "") {
                var page = 1;
            }
            var limit = 50;

            var user_id = localStorage.getItem('user_id');
            var project_id = id;

            $("#task_for_loader").show();
            $("#task_for").hide();

            $.ajax({

                type: "POST",
                dataType: "json",
                url: api_path + "crm/fetch_my_subordinates",
                headers: {
                    'Authorization':localStorage.getItem('token'),
                },
                data: {
                    "company_id": company_id,
                    "project_id" : project_id,
                    "page": page,
                    "limit": limit,
                    "user_id" : user_id,
                    "module_id" : 1
                },
                timeout: 60000,

                success: function(response) {
                    console.log(response);

                    var strTable = "";

                    if (response.status == '200') {

                        if (response.data.length > 0) {

                            console.log(response);

                            var k = 1;
                            var strTable = "";
                            $.each(response.data, function (i, v) {

                                strTable += '<option value="'+v.user_id+'" dir="">'+v.subs_name+'</option>';

                              k++;

                            });


                            $("#task_for").html('<option value="">-- Select --</option>'+strTable);

                        } else {



                        }

                    } else if (response.data <= 0) {


                    } else if (response.status == '400') {

                    }


                    $("#task_for_loader").hide();
                    $("#task_for").show();

                },

                error: function(response) {

                  $("#task_for_loader").hide();
                  $("#task_for").show();

                }

            });

          }


          function list_projects_dropdown(page) {

            var company_id = localStorage.getItem('company_id');
            if (page == "") {
                var page = 1;
            }
            var limit = 50;

            var user_id = localStorage.getItem('user_id');

            $.ajax({

                type: "POST",
                dataType: "json",
                headers: {
                  'Authorization':localStorage.getItem('token'),
              },
                url: api_path + "crm/fetch_projects_i_work_on",
                data: {
                    "company_id": company_id,
                    "page": page,
                    "limit": limit,
                    "user_id" : user_id
                },
                timeout: 60000,

                success: function(response) {
                    console.log(response);

                    var strTable = "";

                    if (response.status == '200') {

                        if (response.data.length > 0) {

                            console.log(response);

                            var k = 1;
                            var strTable = "";
                            $.each(response.data, function (i, v) {

                                strTable += '<option value="'+v.project_id+'" dir="">'+v.project_name+'</option>';

                              k++;

                            });


                            $("#project_dp").append('<option value="">-- Select --</option>'+strTable);

                        } else {



                        }

                    } else if (response.data <= 0) {


                    } else if (response.status == '400') {

                    }

                },

                error: function(response) {


                }

            });
        }






          function add_new_task(image_name){

            var company_id = localStorage.getItem('company_id');
            var added_by = localStorage.getItem('user_id');
            var project_id = $('#project_dp').val();
            var task_name = $('#task_name').val();
            var task_desc = $('#task_desc').val();
            // var task_for = $('#task_for').val() ;
            var task_from = $('#task_for').val() == "1" ? "client" : "lead";





            var task_type = $("#task_type").val();

            var date_created = $("#start").val();
            var finished_date= $("#end").val();
            var task_status = $("#status").val();
            var file = $("#file").val();

            var delivery_date = $('#delivery_date').val();

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

              return;

            }

                var listObj = document.getElementById(`select_item`);
            console.log(listObj);
            console.log($("#select_item").val())

            if ($("#select_item").val()) {
                var datalist = document.getElementById(listObj.getAttribute("list"));
                var fa = datalist.options.namedItem(listObj.value);
                console.log(fa)

                var cus_id = fa.getAttribute('data-value');
                var cus = cus_id ? cus_id : ""
            }


              var fd = new FormData();
            var data_file = $('#file').prop("files")[0];
            fd.append("task_title", task_name);
            fd.append("task_type", task_type);
            // fd.append("task_for", cus);
            fd.append("task_status", task_status);
            fd.append("task_from", task_from);
            fd.append("task_from_id", cus);

            fd.append("task_desc", task_desc);
            fd.append("start_date", date_created);
            fd.append("end_date", finished_date);

            fd.append("files", data_file ? data_file : '');
            console.log(data_file)


            $('#add').hide();
            $('#item_loader').show();

            $('#error').html('');


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

              success: function(response) {

                // console.log(response);

                if (response.data.status == '200') {

                  $('#modal_item').modal('show');

                  $('#modal_item').on('hidden.bs.modal', function () {

                      window.location.reload();
                  })


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

        function fetch_clients_leads(id, page) {

            if (page == "") {
                var page = 1;
            }
            var limit = 100000000;

            var company_id = localStorage.getItem('company_id');
            var url = id == "1" ? "crm/list_of_clients" : "crm/list_of_leads"



            var list_whs = "<option></option>";
            $.ajax({
                    type: "GET",
                    dataType: "json",
                     headers: {
                                'Authorization':localStorage.getItem('token'),
                            },
                    url: api_path + url,
                    data: {
                        "company_id": company_id,
                        "page": page,
                        "limit": limit
                    },
                    timeout: 60000,


                success: function(response) {

                    var k = 1;
                    console.log(response.data)
                   if(id == "1"){


                     $(response.data.data).each(function(i, v) {
                      console.log(v)
                           list_whs +=
                            `<option name='${v.company_name}' value='${v.company_name}' data-value=${v.client_id}></option>`;
                          
                     })
                    }
                    
                    if(id == "2"){

                      $(response.data).each(function(i, v) {
                      console.log(v)
                       
                              list_whs +=
                            `<option name='${v.lead_name}' value='${v.lead_name}' data-value=${v.id}></option>`;
                      })
                    }
                   $(`#options`).html("");

                    $(`#options`).append(list_whs);
                    $(`.select_name`).show();
               },
                error: function() {
                    console.log(response);
                }

            });

        }
        function get_Item() {
            var listObj = document.getElementById("select_item");
            console.log(listObj);
            var datalist = document.getElementById(listObj.getAttribute("list"));
            console.log(datalist);

            var fa = datalist.options.namedItem(listObj.value);
            console.log(datalist.options.namedItem(listObj.getAttribute("data-value")))

            console.log(fa)
            console.log(fa.getAttribute("data"))
            if (fa.getAttribute("data")) {
                var sku = fa.getAttribute("data");
                $(`#holds_itms_id_${id}`).html(`SKU: ${sku}`);
                $(`#holds_itms_id_${id}`).show()
            } else {
                $(`#holds_itms_id_${id}`).hide()
            }
            // console.log(fa.html());

            var selected = fa.getAttribute('data-value');
            console.log(selected)

            // console.log($(`#select_item_items_${listid}`).val());
            // $("#myInput").val($('option[value='+this.value+']').data("text"))
            $(`#des_${id}`).val($("#select_item"));
        }
</script>

<?php
include_once("../gen/_common/footer.php");
?>
