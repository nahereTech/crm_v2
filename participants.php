<?php
include("_common/header.php");
?>

        <!-- page content -->
        <div class="right_col" role="main" id="main_display" style="display: ;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Team Members</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group" style="float: right">
                    <button type="button" class="btn btn-default" id="add">Add</button>
                    <a href="projects"><button type="button" class="btn btn-primary">Back</button></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="clearfix"></div>
              


              










              <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <br>

                        <div class="x_content">

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">

                                            <th class="column-title" width="5%">S/N</th>
                                            <th class="column-title" width="40%">Member</th>
                                            <th class="column-title" width="15%">Answers To</th>
                                            <th class="column-title" width="15%">Action</th>
                                            
                                            
                                            <th class="bulk-actions" colspan="4">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tr id="loading">
                                        <td colspan="4"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;"></i></td>
                                    </tr>
                                    <tbody id="incomingData">

                                    </tbody>
                                </table>

                                <div class="container">

                                  <!-- <button type="submit" class="btn btn-success" id="add">Update</button> -->
                                  <!-- <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="item_loader"></i> -->
                                    <!-- <nav aria-label="Page navigation">
                                        <ul class="pagination" id="pagination"></ul>
                                    </nav> -->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>














            </div>
          </div>
        </div>
        <!-- /page content -->









        <div class="modal fade" id="modal_view_payment_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;"><i class="fa info-circle"></i> Add Member <span id="btch_cddd_ph"></span> <span id="btch_id_ph" style="display: none"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">



                  
                    <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Answers to...
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12 required answers_to_pop" id="answers_to_pop"><option value="">-- Select --</option></select>
                        </div>
                      </div>
                      
 
                      <!-- <div class="ln_solid"></div> -->
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
              <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                          <div id="error_dds" style="color: red"></div>
                          <button type="submit" class="btn btn-success" id="submit_add">Submit</button>
                          <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="submit_add_loader"></i>
                        </div>
                      </div>

                    </span>
                
                    


                    <!-- <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="headings">

                                      <th class="column-title" width="20%">Date</th>
                                      <th class="column-title" width="50%">Amount</th>
                                      <th class="column-title" width="10%" style="text-align: right">Action</th>

                                    </tr>
                                </thead>

                                <tr id="loading_ph">
                                    <td colspan="3" style="text-align: center; padding-top: 15px"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;"></i></td>
                                </tr>
                                <tbody id="generateData_ph">

                                </tbody>
                            </table>
                        </div>

                    </div> -->

                </div>
                <div class="modal-footer">


                    


                    <span id="">
                    <!-- <button type="button" class="btn btn-default add_payment_ph" id="">Add Payment</button> -->
                    <button type="button" class="btn btn-default" id="cancel_debt" style="display: none">Cancel Debt</button>
                    <button type="button" class="btn btn-default" id="open_debt" style="display: none">Open Debt</button>

                    </span>

                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="cancel_debt_loader"></i>

                </div>
            </div>
        </div>
    </div>


















    <div class="modal fade" id="modal_edit_member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;"><i class="fa info-circle"></i> Edit Member <span id=""></span> <span id="holds_pjm_id" style="display: none"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">



                  
                    <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Project Manager
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12 required" id="pm_eh_edit">
                            <!-- <option value="">-- Select --</option> -->
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Answers to...
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12 required answers_to_pop" id="answers_to_pop_edit"><option value="">-- Select --</option></select>
                        </div>
                      </div>

                      
                      
 
                      <!-- <div class="ln_solid"></div> -->
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
              <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                          <div id="error_dds_edit" style="color: red"></div>
                          <button type="submit" class="btn btn-success" id="submit_edit">Update</button>
                          <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="submit_edit_loader"></i>
                        </div>
                      </div>

                    </span>
                
                    


                    <!-- <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="headings">

                                      <th class="column-title" width="20%">Date</th>
                                      <th class="column-title" width="50%">Amount</th>
                                      <th class="column-title" width="10%" style="text-align: right">Action</th>

                                    </tr>
                                </thead>

                                <tr id="loading_ph">
                                    <td colspan="3" style="text-align: center; padding-top: 15px"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;"></i></td>
                                </tr>
                                <tbody id="generateData_ph">

                                </tbody>
                            </table>
                        </div>

                    </div> -->

                </div>
                <div class="modal-footer">


                    


                    <span id="">
                    <!-- <button type="button" class="btn btn-default add_payment_ph" id="">Add Payment</button> -->
                    <button type="button" class="btn btn-default" id="cancel_debt" style="display: none">Cancel Debt</button>
                    <button type="button" class="btn btn-default" id="open_debt" style="display: none">Open Debt</button>

                    </span>

                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="cancel_debt_loader"></i>

                </div>
            </div>
        </div>
    </div>
















        <!-- modal -->
        <div class="modal fade" id="modal_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header ">
                <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">Success
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>
                
              </div>
              <div class="modal-body">
                <h4>Team Member Added Successfully!</h4>
              </div>
              <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              <!-- </div> -->
            </div>
          </div>
        </div>













        <div class="modal fade" id="modal_member_updated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header ">
                <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">Success
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>
                
              </div>
              <div class="modal-body">
                <h4>Team Member Updated Successfully!</h4>
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
              <div class="page-title">
                
              </div>
              
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

            fetch_list_of_members('');
            fetch_list_of_members_for_popup('');//fetch list of people

            $(document).on('click', '#add', function(){

              $('#modal_view_payment_history').modal('show');

            });



            $(document).on('click', '#submit_add', function(){

              submit_new_member();

            });

            //submit_edit
            $(document).on('click', '#submit_edit', function(){

              // $("#answers_to_pop_edit").val('');
              edit_member();

            });

            $(document).on('click', '.remove_member', function(){
              var id = $(this).attr("id").replace(/war_/,'');
              remove_project_member(id);

            });

            // $(document).on('change', '#pm_eh_edit', function(){
            //   var pm_j = $(this).val();
            //   if(pm_j == "yes"){
            //     $("#answers_to_pop_edit").val('');
            //     $("#answers_to_pop_edit").attr("disabled" , true);
            //   }else{
            //     $("#answers_to_pop_edit").val('');
            //     $("#answers_to_pop_edit").attr("disabled" , false);
            //   }
              
            // });


            $(document).on('click', '.edit_project_member', function(){

              var id = $(this).attr("id").replace(/user_id_/,'');
              $("#holds_pjm_id").html(id);
              var ans_to_id = $("#anst_"+id).attr("dir");
              $("#answers_to_pop_edit").val(ans_to_id);

              // if(ans_to_id == 0){
              //   $("#pm_eh_edit").val("yes");
              //   $("#answers_to_pop_edit").attr("disabled", true);
              // }else{
              //   $("#answers_to_pop_edit").attr("disabled", false);
              //   $("#pm_eh_edit").val("no");
              // }

              $("#submit_edit_loader").hide();
              $("#submit_edit").show();

              edit_project_member();

            });



              var company_id = localStorage.getItem('company_id')

              $( "#vendor_text" ).autocomplete({

                source: function( request, response ) {
                 // Fetch data
                 console.log(response);
                 $.ajax({

                    url: api_path+"crm/clients_autocomplete",
                    type: 'post',
                    dataType: "json",
                    data: {
                     term: request.term,
                     company_id:company_id
                    },
                    success: function( data ) {
                     response( data );
                     console.log(data);
                     console.log(company_id);
                     console.log(request.term);
                    }

                 });
                },
                minLength: 2,
                select: function (event, ui) {

                  console.log(ui.item.id);
                  // Set selection
                  $("#holds_vendor_name").val(ui.item.label);
                  $("#holds_vendor_name").show(ui.item.label);
                  $("#holds_vendor_id").html(ui.item.id);
                  $("#vendor_text").hide();
                  $("#v_name_pencil").show();

                  $('#vendor_text').val(ui.item.label+' '+ui.item.id);
                  return false;

                }

              });




          });

          



          $.urlParam = function(name){
              var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
              if (results==null) {
                 return null;
              }
              return decodeURI(results[1]) || 0;
          }

          function edit_member(){

            var user_id = $("#holds_pjm_id").html();
            var project_id = $.urlParam('id');
            var company_id = localStorage.getItem('company_id');
            var ans_to = $("#answers_to_pop_edit").val();
            var project_manager = $("#pm_eh_edit").val();

            
            // alert(user_id+" 1 "+project_id+" 2 "+company_id+" 3 "+ans_to+" 4 "+project_manager);
            

            $("#submit_edit_loader").show();
            $("#submit_edit").hide();

            // return;

            $.ajax({

                type: "POST",
                dataType: "json",
                url: api_path + "crm/update_project_member",
                data: {
                    "user_id": user_id,
                    "project_id" : project_id,
                    "company_id" : company_id,
                    "answers_to" : ans_to,
                    "project_manager" : project_manager
                },
                
                timeout: 60000,
                statusCode: {

                  400: function (response) {
                    $("#error_dds_edit").html(response.responseJSON.msg);
                    $("#submit_edit_loader").hide();
                    $("#submit_edit").show();
                  },
                  404: function (response) {
                    $("#error_dds_edit").html(response.responseJSON.msg);
                    $("#submit_edit_loader").hide();
                    $("#submit_edit").show();
                  }

                },

                success: function(response) {

                  console.log(response);

                  $("#submit_edit_loader").hide();
                  $("#submit_edit").show();

                  $("#modal_edit_member").modal("hide");
                  $("#modal_member_updated").modal("show");
                  $('#modal_member_updated').on('hidden.bs.modal', function () {
                      window.location.reload();
                  });

                },

                error: function(response) {
                  alert("Error Updating");
                  $("#submit_edit_loader").hide();
                  $("#submit_edit").show();

                }

            });

          }


          function edit_project_member(){
            $("#modal_edit_member").modal("show");
          }


          function remove_project_member(id){

            


            var company_id = localStorage.getItem('company_id');
            var project_id = $.urlParam('id');
            var user_id = id;
            var module_id = 1;

            $("#tr_act_loader_"+user_id).show();
            $("#row_"+user_id).hide();

            $.ajax({

                type: "POST",
                dataType: "json",
                url: api_path + "crm/remove_project_member",
                data: {
                    "company_id": company_id,
                    "project_id" : project_id,
                    "module_id" : module_id,
                    "user_id" : user_id
                },
                
                timeout: 60000,
                statusCode: {

                  400: function (response) {
                    $("#error_dds").html(response.responseJSON.msg);
                    $("#tr_act_loader_"+user_id).hide();
                    $("#row_"+user_id).show();
                  },
                  404: function (response) {
                    $("#error_dds").html(response.responseJSON.msg);
                    $("#tr_act_loader_"+user_id).hide();
                    $("#row_"+user_id).show();
                  }

                },

                success: function(response) {

                  console.log(response)

                  $("#tr_act_loader_"+user_id).hide();
                  // $("#row_").hide();

                },

                error: function(response) {
                  alert("Error Deleting");
                  $("#tr_act_loader_"+user_id).hide();
                  $("#row_"+user_id).show();

                }

            });
          }



          function submit_new_member(){

            $("#submit_add_loader").show();
            $("#submit_add").hide();


            var company_id = localStorage.getItem('company_id');
            var project_id = $.urlParam('id');
            var answers_to = $("#answers_to").val();
            var email = $("#email").val();
            var module_id = 1;

            $.ajax({

                type: "POST",
                dataType: "json",
                url: api_path + "crm/add_project_member",
                data: {
                    "company_id": company_id,
                    "project_id" : project_id,
                    "email" : email,
                    "answers_to" : answers_to,
                    "module_id" : module_id
                },
                
                timeout: 60000,
                statusCode: {

                  400: function (response) {
                    $("#error_dds").html(response.responseJSON.msg);
                  },
                  401: function (response) {
                    $("#error_dds").html(response.responseJSON.msg);
                  }

                },

                success: function(response) {

                  $("#submit_add_loader").hide();
                  $("#submit_add").show();
                  $('#modal_item').on('hidden.bs.modal', function () {
                      
                      window.location.reload();

                  })

                  //close console
                  $('#modal_view_payment_history').modal('hide');
                  $('#modal_item').modal('show');
                  $('#modal_item').on('hidden.bs.modal', function () {
                      window.location.reload();
                  });

                },

                error: function(response) {

                  console.log(response);
                  $("#submit_add_loader").hide();
                  $("#submit_add").show();

                }

            });
          }



          function fetch_list_of_members_for_popup(page){

            var company_id = localStorage.getItem('company_id');
            if (page == "") {
                var page = 1;
            }
            var limit = 1000;

            var project_id = $.urlParam('id');

            $.ajax({

                type: "POST",
                dataType: "json",
                url: api_path + "crm/list_of_team_members",
                data: {
                    "company_id": company_id,
                    "page": page,
                    "limit": limit,
                    "project_id" : project_id
                },
                
                timeout: 60000,

                success: function(response) {

                    var k = 1;
                    var list_team_members = "";
                    $.each(response.data, function (i, v) {

                        list_team_members += '<option value="'+v.team_user_id+'" dir="">'+v.team_member+'</option>';

                      k++;

                    });

                    $(".answers_to_pop").html('');
                    $(".answers_to_pop").append('<option value="">-- Select --</option>'+list_team_members);


                },

                error: function(response) {


                }

            });

          }
          


          

          

          function fetch_list_of_members(page){

            var company_id = localStorage.getItem('company_id');
            if (page == "") {
                var page = 1;
            }
            var limit = 25;

            var project_id = $.urlParam('id');

            $("#loading").show();
            $("#incomingData").html('');

            $("html, body").animate({ scrollTop: 0 }, "slow");

            $.ajax({

                type: "POST",
                dataType: "json",
                url: api_path + "crm/list_of_team_members",
                data: {
                    "company_id": company_id,
                    "page": page,
                    "limit": limit,
                    "project_id" : project_id
                },
                
                timeout: 60000,

                success: function(response) {

                    console.log(response);

                    var strTable = "";

                    if (response.status == '200') {


                      if(response.total_rows > 0) {



                            var k = 1;
                            $.each(response['data'], function(i, v) {

                                

                                
                                var delete_btn = "";
                                var del_forv = "";
                                var undo_del_btn = '';

                                if(response['data'][i]['del_status'] == "no"){

                                    delete_btn = '<li class="del_this_grn"  id="del_this_grn_' + response['data'][i]['team_user_id'] + '"><a>Delete</a></li>';
                                    
                                }else if(response['data'][i]['del_status'] == "yes"){
                                    
                                    undo_del_btn = '<li class="undo_del"  id="undo_del_grn_' + response['data'][i]['team_user_id'] + '"><a>Undo Delete</a></li>';
                                    del_forv = '<li class="del_flva"  id="del_flva_' + response['data'][i]['team_user_id'] + '"><a>Delete Forever</a></li>';

                                }

                                strTable += '<tr id="row_' + response['data'][i]['team_user_id'] + '">';
                                strTable += '<td id="batch_cod_tx_'+response['data'][i]['team_user_id']+'">' + k + '</td>';

                                // +response['data'][i]['Vendor']+
                                strTable += '<td>' + response['data'][i]['team_member'] + '</td>';

                                strTable += '<td valign="top" id="anst_'+response['data'][i]['team_user_id']+'" dir="'+response['data'][i]['ans_to_id']+'" >' + response['data'][i]['answers_to'] + '</td>';
                                strTable += '<td valign="top"><a class="edit_project_member btn btn-info btn-xs" id="user_id_'+response['data'][i]['team_user_id']+'" style="cursor: pointer;"><i  class="fa fa-pencil"  data-toggle="tooltip" data-placement="top" title="Edit Warehouses"></i> Edit</a>  <a class="remove_member btn btn-danger btn-xs" style="cursor: pointer;" id="war_'+response['data'][i]['team_user_id']+'"><i  class="fa fa-trash-o"  data-toggle="tooltip" data-placement="top" title="Delete Warehouse"></i> Remove</a>  </td>';
                                strTable += '</tr>';

                                strTable += '<tr style="display: none;" id="loader_row_' + response['data'][i]['team_user_id'] + '">';
                                strTable += '<td colspan="4"><i class="fa fa-spinner fa-spin fa-fw fa-2x"  id="loading"></i>';
                                strTable += '</td>';
                                strTable += '</tr>';


                                strTable += '<tr id="tr_act_loader_'+response['data'][i]['team_user_id']+'" style="display: none"><td colspan="3"><i class="fa fa-spinner fa-spin fa-fw fa-1x" style="display: ;" id="filter_loader"></i>';
                                strTable += '<td></tr>';

                                k++;

                            });

                        } else {

                            strTable = '<tr><td colspan="4">No team member</td></tr>';

                        }

                        // $('#pagination').twbsPagination({
                        //     totalPages: Math.ceil(response.total_rows / limit),
                        //     visiblePages: 10,
                        //     onPageClick: function(event, page) {
                        //         fetch_list_of_members(page);
                        //     }
                        // });

                        $("#incomingData").html(strTable);
                        $("#incomingData").show();
                        $('#loading').hide();

                    } else if (response.data <= 0) {
                        $('#loading').hide();

                        strTable = '<tr><td colspan="4">' + response.msg + '</td></tr>';

                        $("#incomingData").html(strTable);
                        $("#incomingData").show();

                    } else if (response.status == '400') {
                        var strTable = "";
                        $('#loading').hide();
                        // alert(response.msg);
                        strTable += '<tr>';
                        strTable += '<td colspan="4">' + response.msg + '</td>';
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
                    strTable += '<td colspan="4"><strong class="text-danger">Connection error</strong></td>';
                    strTable += '</tr>';

                    $("#incomingData").html(strTable);
                    $("#incomingData").show();

                }

            });

          }
          
        </script>



<?php
include("_common/footer.php");
?>