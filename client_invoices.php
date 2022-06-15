<?php
include("_common/header.php");
?>

    <!-- page content -->
    <div class="right_col" role="main" id="main_display" style="display: ;">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Clients</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                        <div class="input-group" style="float: right">

                            <a href="add_client"><button type="button" class="btn btn-default" id="">Add</button></a>

                            <!-- <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false"> Add <span class="caret"></span>
                            </button>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a href="add_incoming_items">From Vendor</a>
                                </li>
                                <li><a href="upward_adjustment">Quantity Adjustment</a>
                                </li>
                            </ul> -->

                            <button type="button" class="btn btn-default" id="incoming_filter">Filter</button>
                            <!-- <a href="add_incoming_items"><button type="button" class="btn btn-success">Receive</button></a> -->

                            <!-- <a href="upward_adjustment?a=add"><button type="button" class="btn btn-primary">Adjustment</button></a> -->

                        </div>
                    </div>
                </div>
            </div>

            <div id="filter_display" style="display: none;">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">
                                <br />

                                <div class="form-row">

                                    <div class="col-sm-2 col-xs-12">
                                        <label>Code</label>
                                        <input type="text" id="code" class="form-control">
                                    </div>

                                    <div class="col-sm-3 col-xs-4">

                                        <label>Vendor</label>

                                        <span id="canccl_vdn">
                                        <input type="text" class="form-control" placeholder="Last Name" id="holds_vendor_name" style="display: none;" disabled="disabled" >
                                        </span>
                                        

                                        <!-- <div id="holds_vendor_name" style="float: left"></div> -->

                                        <div id="holds_vendor_id" style="float: left; display: none"></div>

                                        <input type="text" id="vendor_text" class="form-control" name="fullname" required="" autocomplete="off">


                                        <!-- <input type="text" id="vendor_text" class="form-control"> -->

                                    </div>

                                    <div class="col-sm-3 col-xs-12">
                                        <label>Date Range</label>
                                        <input type="text" class="form-control" id="date_range">
                                    </div>

                                    <div class="col-sm-2 col-xs-12">
                                        <label>Payment Status</label>
                                        <select class="form-control col-md-7 col-xs-12 required" id="pay_status">
                                          <option value="">-- Select --</option>
                                          
                                          <option value="completed">Completed</option>
                                          <option value="uncompleted">Uncompleted</option>

                                        </select>
                                    </div>

                                    <div class="col-sm-2 col-md-2 col-xs-12">
                                        <label>Trashed</label>
                                        <select class="form-control col-md-7 col-xs-12 required" id="deleted_itms">
                                          <option value="">-- Select --</option>
                                          <option value="yes">Trashed</option>

                                        </select>
                                    </div>

                                </div>
                                <br>
                                <br>

                                <div class="form-row">

                                    <div class="col-sm-3 col-xs-4">
                                        <br>
                                        <button type="button" class="btn btn-success" id="filter">Go</button>
                                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="filter_loader"></i>
                                    </div>

                                </div>

                            </div>
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
                                            <th class="column-title" width="5%">ID</th>
                                            <th class="column-title" width="40%">Company Name</th>
                                            <th class="column-title" width="20%">Contact's Name</th>
                                            <th class="column-title" width="10%">Phone</th>
                                            <th class="column-title" width="10%">Email</th>
                                            <th class="column-title no-link last" width="5%">
                                                <span class="nobr">Actions</span>
                                            </th>
                                            <th class="bulk-actions" colspan="4">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tr id="loading">
                                        <td colspan="5"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;"></i></td>
                                    </tr>
                                    <tbody id="incomingData">

                                    </tbody>
                                </table>

                                <div class="container">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination" id="pagination"></ul>
                                    </nav>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <div class="modal fade" id="modal_view_incoming" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;"><i class="fa info-circle"></i> <span id="btch_cddd"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <b>Vendor</b>
                            <address id="ivvv_fff">
                              asdf af asdfasdf asdf
                              <br>
                              <br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Date</b>
                            <address id="ivvv_dtt">

                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col" id="ivvv_ddtt">

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="headings">

                                      <th class="column-title" width="5%">S/N</th>
                                      <th class="column-title" width="50%">Item</th>
                                      <th class="column-title" width="15%" style="text-align: right">Quantity</th>
                                      <th class="column-title" width="15%" style="text-align: right">Unit Cost(₦)</th>
                                      <th class="column-title" width="15%" style="text-align: right">Total(₦)</th>

                                    </tr>
                                </thead>

                                <tr id="loading">
                                    <td colspan="6"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;"></i></td>
                                </tr>
                                <tbody id="generateData">

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-primary">Generate</button> -->
                    <!-- <button type="button" class="btn btn-primary">Print</button>
                <button type="button" class="btn btn-primary">Email</button> -->
                    <button type="button" class="btn" style="background-color: #f9aba9; color: white" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->

                </div>
            </div>
        </div>
    </div>








    <div class="modal fade" id="modal_view_payment_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;"><i class="fa info-circle"></i> <span id="btch_cddd_ph"></span> <span id="btch_id_ph" style="display: none"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">
                    


                    <div class="row">
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

                    </div>

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












    <div class="modal fade" id="modal_delete_mdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;"><i class="fa info-circle"></i> <span id="">Delete</span> <span id="hold_grnid_to_del" style="display: none"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">
                    


                    <div class="row" style="text-align: center;">

                        <h2>This GRN will now be moved to trash. </h2>
                        Are you sure you want to proceed?<br><br>

                        <div id="pck_btns">
                        <button type="button" class="btn btn-success" id="yes_del_grn" style="display: ">Yes, Delete</button>
                        <button type="button" class="btn btn-danger" id="" style="display: "  data-dismiss="modal" >No, Cancel</button>
                        </div>

                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="deleting_grn_in_progress"></i>

                        <h2 id="show_good_deleted" style="display: none; color: red; font-weight: bold">Deleted</h2>

                    </div>

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










    <div class="modal fade" id="modal_delete_mdl_restore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;"><i class="fa info-circle"></i> <span id=""></span> <span id="hold_grnid_to_del2" style="display: none"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">
                    


                    <div class="row" style="text-align: center;">

                        <h2>This will be restored</h2>
                        Are you sure you want to proceed?<br><br>

                        <div id="pck_btns2">
                        <button type="button" class="btn btn-success" id="yes_undo_del_grn" style="display: ">Yes, Restore</button>
                        <button type="button" class="btn btn-danger" id="" style="display: "  data-dismiss="modal" >No, Cancel</button>
                        </div>

                    </div>

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






    <div class="modal fade" id="modal_doing_dwnld" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;"><i class="fa info-circle"></i> <span id=""></span> <span id="" style="display: none"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">

                    <div class="row" style="text-align: center;">

                        <h2>Preparing Download</h2>
                        Please wait while we prepare the download<br><br>

                        <div id="">
                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;" id="dwlaooda_loader"></i>
                        </div>

                    </div>

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
        $(document).ready(function() {
            page_warehouse_access();
            var list_id;
            var company_id = localStorage.getItem('company_id')
            list_grns('');

            $(document).on('click', '#filter', function() {
                $('#pagination').twbsPagination('destroy');
                list_grns('');
            });

            $('#incoming_filter').on('click', display_filter);

            $('input#date_range').daterangepicker({
                autoUpdateInput: false
            });

            $('input#date_range').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));

            });

            $(document).on('click', '.incoming_info', function() {
                list_id = $(this).attr('id').replace(/in_/, '');
                fetch_incoming_info(list_id);

            });

            //inc_payment_history
            $(document).on('click', '.inc_payment_history', function() {
                list_id = $(this).attr('id').replace(/in_p_/, '');
                fetch_payment_history(list_id);

            });

            //add_payment_ph
            $(document).on('click', '.add_payment_ph', function() {
                // list_id = $(this).attr('id').replace(/in_p_/, '');
                add_payment_history_line();

            });

            $(document).on('click', '.delete_incoming', function() {
                var list_id = $(this).attr('id').replace(/inc_/, '');
                delete_incoming_item(list_id);
            });

            //cancladd_pm
            $(document).on('click', '#cancladd_pm', function() {
                //do_add_pm - hide
                $("#do_add_pm").show();

                //adding_new_pm - show
                $("#adding_new_pm").hide();
            });


            //send_in_new_payment
            $(document).on('click', '#send_in_new_payment', function() {
                send_in_new_payment();
            });

            //send_in_new_payment
            $(document).on('click', '#cancel_debt', function() {
                cancel_debt();
            });


            $(document).on('click', '.undo_del', function(){
                var id = $(this).attr("id").replace(/undo_del_grn_/,'');
                $("#hold_grnid_to_del2").html(id);
                $("#modal_delete_mdl_restore").modal('show');
            });


            $(document).on('click', '.dwnld_grn', function(){
                var id = $(this).attr("id").replace(/dwnld_grn_/,'');
                $("#modal_doing_dwnld").modal('show');
                create_download(id);
            });

            $(document).on('click', '#yes_undo_del_grn', function(){
        
                var id = $("#hold_grnid_to_del2").html();
                $("#tr_act_loader_"+id).show();
                $("#row_"+id).hide();
                $("#modal_delete_mdl_restore").modal('hide');

                yes_undo_delete_grn_now(id);

            });




            


            $(document).on('click', '.del_this_grn', function(){
                var id = $(this).attr("id").replace(/del_this_grn_/,'');
                $("#pck_btns").show();
                $("#deleting_grn_in_progress").hide();
                $("#hold_grnid_to_del").html(id);
                $("#modal_delete_mdl").modal('show');
            });

            $(document).on('click', '#yes_del_grn', function(){
        
                var id = $("#hold_grnid_to_del").html();
                $("#tr_act_loader_"+id).show();
                $("#row_"+id).hide();
                $("#modal_delete_mdl").modal('hide');

                yes_delete_grn_now(id);

            });

            $(document).on('click', '.del_hpay', function(){

                var grn_id = $(this).attr('id').replace(/del_hp_/, '');
                $("#row_lodda_"+grn_id).show();
                $("#row_pmh_"+grn_id).hide();
                $.ajax({

                    type: "POST",
                    dataType: "json",
                    cache: false,
                    url: api_path + "wms/del_payment_details",
                    data: {
                        "row_id": grn_id,
                        "company_id": localStorage.getItem('company_id')
                    },

                    success: function(response) {
                        console.log(response);
                        if (response.status == '200') {

                            $("#row_lodda_"+grn_id).hide();
                            var amount_deleting = remove_commas_from_number( $("#pho_ln_"+grn_id).html() );
                            var new_total_paid = parseFloat(remove_commas_from_number($("#ttlltt").html())) - parseFloat(amount_deleting); //get new total paid
                            $("#ttlltt").html(format_to_money(new_total_paid)); // insert new total paid

                            //bbllance
                            var new_balance_to_pay = parseFloat(remove_commas_from_number($("#bbllance").html())) + parseFloat(amount_deleting);
                            $("#bbllance").html(format_to_money(new_balance_to_pay));

                        }else{

                            $("#row_lodda_"+grn_id).hide();
                            $("#row_pmh_"+grn_id).show();

                        }
                        
                    },

                    error: function(response) {

                        console.log(response);
                        $("#row_lodda_"+grn_id).hide();
                        $("#row_pmh_"+grn_id).show();
                    }

                });

            });

            $( "#vendor_text" ).autocomplete({

              source: function( request, response ) {
               // Fetch data
               console.log(response);
               $.ajax({

                  url: api_path+"wms/vendors_autocomplete",
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

            $(document).on('click', '#canccl_vdn', function(){
                
                $("#holds_vendor_name").val('');
                $("#holds_vendor_name").hide();
                $("#holds_vendor_id").html('');
                $("#vendor_text").show();
                $("#vendor_text").val('');
                
            });

            $("#item_text").autocomplete({

                source: function(request, response) {
                    // Fetch data
                    $.ajax({

                        url: api_path + "wms/items_autocomplete",
                        type: 'post',
                        dataType: "json",
                        data: {
                            term: request.term,
                            company_id: company_id
                        },
                        success: function(data) {
                            response(data);
                            console.log(data);
                        }

                    });
                },
                minLength: 2,
                select: function(event, ui) {

                    console.log(ui.item.id);
                    // Set selection
                    $('#item_text').val(ui.item.label + ' ' + ui.item.id); // display the selected text
                    // save selected id to input
                    // $('#selct_itn_text').html(ui.item.label); // save selected id to input
                    // $("#unit_type").val(ui.item.unit).trigger("change");
                    return false;

                }

            });

        });



        function yes_undo_delete_grn_now(id){

                
                $.ajax({

                    type: "POST",
                    dataType: "json",
                    cache: false,
                    url: api_path + "wms/undo_deleted_grn",
                    data: {
                        "batch_id": id,
                        "company_id" : localStorage.getItem('company_id')
                    },

                    success: function(response) {
                        
                        if (response.status == '200') {
                            $("#row_"+id).hide();
                            $("#tr_act_loader_"+id).hide();
                        } else if(response.status == '400') {
                            alert("Error deleting. Try again");
                            $("#tr_act_loader_"+id).hide();
                            $("#row_"+id).show();
                        }

                    },

                    error: function(response) {

                        $("#tr_act_loader_"+id).hide();
                        $("#row_"+id).show();
                        alert("Connection Error");

                    }

                });

            }



        function create_download(id){
            $.ajax({

                    type: "POST",
                    dataType: "json",
                    cache: false,
                    url: api_path + "wms/grn_batch_download",
                    data: {
                        "batch_id": id,
                        "company_id" : localStorage.getItem('company_id')
                    },

                    success: function(response) {
                        console.log(response);
                        if (response.status == '200') {
                           download_file(response.data.d_file, 'GRN-'+id+'.pdf');
                           $("#modal_doing_dwnld").modal("hide");
                        } else if(response.status == '400') {
                           
                        }

                    },

                    error: function(response) {
                        console.log(response);
                    }

                });
        }


        function yes_delete_grn_now(id){

            $.ajax({

                type: "POST",
                dataType: "json",
                cache: false,
                url: api_path + "wms/grn_delete",
                data: {
                    "batch_id": id,
                    "company_id" : localStorage.getItem('company_id')
                },

                success: function(response) {

                    if (response.status == '200') {
                        $("#row_"+id).hide();
                        $("#tr_act_loader_"+id).hide();
                    } else if(response.status == '400') {
                        alert("Error deleting. Try again");
                        $("#tr_act_loader_"+id).hide();
                        $("#row_"+id).show();
                    }

                },

                error: function(response) {

                    $("#tr_act_loader_"+id).hide();
                    $("#row_"+id).show();
                    alert("Connection Error");

                }

            });

        }


        function cancel_debt(){

            $("#cancel_debt").hide();
            $("#cancel_debt_loader").show();

            $.ajax({

                type: "POST",
                dataType: "json",
                cache: false,
                url: api_path + "wms/grn_cancel_payment",
                data: {
                    "batch_id": $("#btch_id_ph").html(),
                    "company_id" : localStorage.getItem('company_id')
                },

                success: function(response) {

                    console.log(response);

                    if (response.status == '200') {
                        
                        $("#cancel_debt_loader").hide();
                        //update to update

                        $("#pmt_stuts").html('<span class="label label-success">Completed</span>');

                    } else if(response.status == '400') {

                        console.log(response);
                        alert(response);
                        $("#cancel_debt").show();
                        $("#cancel_debt_loader").hide();

                    }

                },

                error: function(response) {
                    
                    console.log(response);
                    alert("Techincal Error");
                    $("#cancel_debt").show();
                    $("#cancel_debt_loader").hide();

                }

            });

        }


        function add_payment_history_line(){

            //do_add_pm - hide
            $("#do_add_pm").hide();

            //adding_new_pm - show
            $("#adding_new_pm").show();

            //date
            $('#payment_date_addn').datepicker({
              dateFormat: "yy-mm-dd"
            });

            var batch_id = $("#btch_id_ph").html();

        }

        function send_in_new_payment(){

            


            var blank;
            $(".add_req").each(function(){

              var the_val = $.trim($(this).val());

              if(the_val == "" || the_val == "0"){

                $(this).addClass('has-error');

                blank = "yes";

              }else{

                $(this).removeClass("has-error");

              }

            });

            if(blank == "yes"){
    
              // $("#error").html("You have a blank field");

              return; 

            }


            $("#do_add_pm_loader").show();
            //adding_new_pm - show
            $("#adding_new_pm").hide();



            var batch_id = $("#btch_id_ph").html();
            var company_id = localStorage.getItem('company_id');
            var payment_date = $("#payment_date_addn").val();
            var amount_paid = $("#amount_paid_addn").val();

            $.ajax({

                type: "POST",
                dataType: "json",
                cache: false,
                url: api_path + "wms/add_grn_payment_bal",
                data: {
                    "amt_paid": amount_paid,
                    "company_id": company_id,
                    "payment_date" : payment_date,
                    "user_id" : localStorage.getItem('user_id') ,
                    "batch_id" : batch_id
                },

                success: function(response) {

                    console.log(response);

                    if (response.status == '200') {

                        //$("#row_lodda_"+grn_id).show();
                        //$("#row_pmh_"+grn_id).hide();
                        
                        var list_trs;
                        list_trs += '<tr id="row_pmh_'+response.last_inserted_id+'" class="pmt_lst"><td>'+format_a_date(payment_date)+'</td><td>'+format_to_money(amount_paid)+'</td><td style="text-align: right"><i class="fa fa-times-circle fa-2x del_hpay" style="color: #fc9e99; cursor: pointer" id="del_hp_'+response.last_inserted_id+'"> </i></td></tr>';

                        list_trs += '<tr id="row_lodda_'+response.last_inserted_id+'" style="display: none"><td colspan="100%"><i class="fa fa-spinner fa-spin fa-fw fa-1x"></td></tr>';
                        
                        $(".pmt_lst:last").after(list_trs);

                        //update amount paid
                        var new_amount_paid = parseFloat(remove_commas_from_number($("#ttlltt").html())) + parseFloat(amount_paid); //calculate new amount paid
                        $("#ttlltt").html( format_to_money( new_amount_paid) ); //insert new amount

                        //update balance
                        var new_balance = parseFloat(remove_commas_from_number($("#bbllance").html())) - parseFloat(amount_paid);
                        $("#bbllance").html( format_to_money( new_balance) );


                        if(response.payment_status == "completed"){
                            
                            var pmstus = '<span class="label label-success">Completed</span>';
                        }else{
                            
                            var pmstus = '<span class="label label-warning">Uncompleted</span>';
                        }

                        // alert(pmstus);

                        $("#pmt_stuts").html(pmstus);


                    } else if(response.status == '400') {

                        alert(response.msg);

                    }

                    $("#do_add_pm_loader").hide();
                    //adding_new_pm - show
                    $("#adding_new_pm").hide();

                    //show add link
                    $("#do_add_pm").show();

                },

                error: function(response) {
                    
                    console.log(response);
                    alert("Connection error. Please try again.");
                    $("#do_add_pm_loader").hide();
                    //adding_new_pm - show
                    $("#adding_new_pm").hide();

                    //show add link
                    $("#do_add_pm").show();

                }

            });
        }

        function page_warehouse_access() {

            var company_id = localStorage.getItem('company_id');

            var user_id = localStorage.getItem('user_id');
            var module_id = 6;

            $.ajax({

                type: "POST",
                dataType: "json",
                url: api_path + "wms/list_user_wms_sections",
                data: {
                    "company_id": company_id,
                    "user_id": user_id,
                    "module_id": module_id
                },
                timeout: 60000,

                success: function(response) {

                    console.log(response);

                    var strTable = "";

                    if (response.status == '200') {

                        if (response.is_admin == 'no') {

                            var k = 1;
                            $.each(response['data'], function(i, v) {

                                if (response['data'][i]['section_name'] == "Incoming" && response['data'][i]['section_exist'] == "yes") {

                                    $('#incoming').show();
                                    $('#main_display').show();
                                    $('#error_display').hide();

                                } else if (response['data'][i]['section_name'] == "Incoming" && response['data'][i]['section_exist'] == "no") {

                                    $('#main_display').hide();
                                    $('#error_display').show();

                                } else if (response['data'][i]['section_name'] == "Outgoing" && response['data'][i]['section_exist'] == "yes") {

                                    $('#outgoing').show();

                                } else if (response['data'][i]['section_name'] == "Outgoing" && response['data'][i]['section_exist'] == "no") {

                                    $('#outgoing').hide();
                                    // $('#user_page').hide();
                                } else if (response['data'][i]['section_name'] == "Sales/Receipts" && response['data'][i]['section_exist'] == "yes") {

                                    $('#receipts').show();
                                    // $('#user_page').hide();

                                } else if (response['data'][i]['section_name'] == "Sales/Receipts" && response['data'][i]['section_exist'] == "no") {

                                    $('#receipts').hide();
                                    // $('#user_page').hide();
                                }

                                k++;

                            });

                        } else if (response.is_admin == 'yes') {

                            $('#incoming').show();
                            $('#outgoing').show();
                            $('#receipts').show();
                            $('#user_page').show();
                        }

                    } else if (response.status == '400') {

                    } else if (response.status == "401") {
                        //missing parameters

                    }

                },

                error: function(response) {

                }

            });
        }

        function display_filter() {

            $('#filter_display').toggle();
            $('#item_text').val("");
            $('#vendor_text').val("");
            $('#item_code').val("");
            $('#date_range').val("");
        }

        function fetch_incoming_info(list_id) {

            var company_id = localStorage.getItem('company_id');

            $('#in_' + list_id).hide();
            $('#loader11_' + list_id).show();

            $.ajax({

                type: "POST",
                dataType: "json",
                cache: false,
                url: api_path + "wms/grn_batch_details",
                data: {
                    "batch_id": list_id,
                    "company_id": company_id
                },

                success: function(response) {

                    console.log(response);

                    $('#loader11_' + list_id).hide();
                    $('#in_' + list_id).show();

                    if (response.status == '200') {

                        $("#modal_view_incoming #ivvv_fff").html(response.data.vendor);
                        $("#modal_view_incoming #ivvv_dtt").html(format_a_date(response.data.date_recieved));
                        $("#modal_view_incoming #btch_cddd").html(response.data.batch_code);

                        var list_trs = "";
                        var k = 1;
                        $.each(response.data.items, function (i, v) {

                          list_trs += '<tr id="row_'+v+'"><td>'+k+'</td><td>'+v.item_name+'</td><td style="text-align: right">'+format_to_money(v.qty)+'</td><td style="text-align: right">'+format_to_money(v.unit_cost)+'</td><td style="text-align: right">'+format_to_money(v.total_line_cost)+'</td></tr>';

                          k++;

                        });

                        list_trs += '<tr id="row_"><td></td><td></td><td style="text-align: right"></td><td style="text-align: right"><b>TOTAL</b></td><td style="text-align: right"><b>'+format_to_money(response.data.batch_total)+'</b></td></tr>';

                        $("#generateData").html(list_trs);

                        $('#modal_view_incoming').modal('show');
                    }

                },

                error: function(response) {
                    $('#loader11_' + list_id).hide();
                    $('#in_' + list_id).show();
                    alert("Connection Error.");

                }

            });
        }


        function fetch_payment_history(list_id) {

            //hide these buttons
            $("#open_debt").hide();
            $("#cancel_debt").hide();

            $("#modal_view_payment_history").modal('show');
            $("#loading_ph").show();
            $("#generateData_ph").html('');
            var clicked_grn = $("#batch_cod_tx_"+list_id).html();
            $("#btch_cddd_ph").html(clicked_grn);
            $("#btch_id_ph").html(list_id);

            var company_id = localStorage.getItem('company_id');

            $.ajax({

                type: "POST",
                dataType: "json",
                cache: false,
                url: api_path + "wms/get_grn_payment_details",
                data: {
                    "grn_id": list_id,
                    "company_id": company_id
                },

                success: function(response) {

                    console.log(response);

                    $("#loading_ph").hide();

                    if (response.status == '200') {

                        var list_trs = "";
                        list_trs += '<tr id="ioi" class="pmt_lst" style="display: none"><td></td></tr>';

                        if(response.data != undefined){

                            var k = 1;
                            $.each(response.data.payment, function (i, v) {

                                if(response.payment_status == "uncompleted"){
                                    var del_btn = '<i class="fa fa-times-circle fa-2x del_hpay" style="color: #fc9e99; cursor: pointer" id="del_hp_'+v.id+'"> </i>';
                                }else{
                                    var del_btn = '';
                                }

                                list_trs += '<tr id="row_pmh_'+v.id+'" class="pmt_lst"><td>'+format_a_date(v.payment_date)+'</td><td id="pho_ln_'+v.id+'">'+format_to_money(v.amount_paid)+'</td><td style="text-align: right">'+del_btn+'</td></tr>';

                                list_trs += '<tr id="row_lodda_'+v.id+'" style="display: none"><td colspan="100%"><i class="fa fa-spinner fa-spin fa-fw fa-1x"></td></tr>';

                              k++;

                            });

                        }else{
                            response.total_paid = 0.00;
                        }


                        

                        if(response.payment_status == "completed" || response.payment_status == "uncompleted_and_closed"){
                            var hide_add_new_pay = "none";
                            var pmstus = '<span class="label label-success">Completed</span>';
                            $("#open_debt").show();
                        }else{
                            var hide_add_new_pay = "";
                            var pmstus = '<span class="label label-warning">Uncompleted</span>';
                            $("#cancel_debt").show();
                        }

                        list_trs += '<tr id="do_add_pm" style="display: '+hide_add_new_pay+'"><td colspan="100%"><span class="label label-default add_payment_ph" style="cursor: pointer">Add New Payment</span></td></tr>';
                        list_trs += '<tr id="adding_new_pm" style="display: none"> <td><input type="text" class="form-control add_req" placeholder="Date" id="payment_date_addn"></td> <td><div class="input-group"><input type="text" class="form-control add_req allownumericwithdecimal" style="width: 55%" id="amount_paid_addn"><span class="input-group-btn" style="float: left"><button type="button" class="btn btn-primary" id="send_in_new_payment"> Add!</button></span></div></td> <td style="text-align: right"><i  class="fa fa-times-circle fa-2x"  data-toggle="tooltip" data-placement="top" id="cancladd_pm" style="color: #f79e94; cursor: pointer"></i></td></tr>';

                        list_trs += '<tr id="do_add_pm_loader"  style="display: none;"><td colspan="100%"><i class="fa fa-spinner fa-spin fa-fw fa-3x"></td></tr>';

                        list_trs += '<tr id="row_"><td style="text-align: right"></td><td style="text-align: right"><b>TOTAL PAID</b></td><td style="text-align: right"><b><span id="ttlltt">'+format_to_money(response.total_paid)+'</span></b></td></tr>';

                        list_trs += '<tr id="row_"><td style="text-align: right"></td><td style="text-align: right"><b>BALANCE</b></td><td style="text-align: right"><b><span id="bbllance">'+format_to_money(response.balance)+'</span></b></td></tr>';


                        list_trs += '<tr id="row_"><td style="text-align: right"></td><td style="text-align: right"><b>TOTAL COST</b></td><td style="text-align: right"><b><span id="bttcst">'+format_to_money(response.batch_total)+'</span></b></td></tr>';

                        list_trs += '<tr id="row_"><td style="text-align: right"></td><td style="text-align: right"><b>STATUS</b></td><td style="text-align: right" id="pmt_stuts">'+pmstus+'</td></tr>';

                        $("#generateData_ph").html(list_trs);                       

                    }else{
                        $("#generateData_ph").html('<tr><td colspan="100%">'+response.msg+'</td></tr>');
                    }

                },

                error: function(response) {
                    console.log(response);
                    $("#loading_ph").hide();
                    $("#generateData_ph").html('<tr><td colspan="100%">Connection Error. Please try again.</td></tr>');

                }

            });
        }

        function delete_incoming_item(list_id) {

            var company_id = localStorage.getItem('company_id');

            var ans = confirm("Are you sure you want to delete this item?");
            if (!ans) {
                return;
            }

            $('#row_' + list_id).hide();
            $('#loader_row_' + list_id).show();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: api_path + "wms/del_incoming_item",
                data: {
                    "company_id": company_id,
                    "list_id": list_id
                },
                timeout: 60000, // sets timeout to one minute
                // objAJAXRequest, strError

                error: function(response) {
                    $('#loader_row_' + list_id).hide();
                    $('#row_' + list_id).show();

                    alert('connection error');
                },

                success: function(response) {
                    // console.log(response);
                    if (response.status == '200') {
                        // $('#row_'+user_id).hide();

                    } else if (response.status == '401') {

                    }

                    $('#loader_row_' + list_id).hide();
                }
            });
        }

        function list_grns(page) {

            var company_id = localStorage.getItem('company_id');
            if (page == "") {
                var page = 1;
            }
            var limit = 30;

            var lead_id = $('#lead_id').val();
            var lead_phone = $('#lead_phone').html();
            var lead_status = $('#lead_status').val();
            var deleted_itms = $('#deleted_itms').val();

            // alert(code+vendor_id+date_range+pay_status);

            $("#loading").show();
            $("#incomingData").html('');

            $("html, body").animate({ scrollTop: 0 }, "slow");

            $.ajax({

                type: "POST",
                dataType: "json",
                url: api_path + "crm/list_of_clients",
                data: {
                    "company_id": company_id,
                    "page": page,
                    "limit": limit
                },
                timeout: 60000,

                success: function(response) {
                    console.log(response);

                    var strTable = "";

                    if (response.status == '200') {

                        // $('#item_id').val('')
                        if (response.data.length > 0) {

                            var k = 1;
                            $.each(response['data'], function(i, v) {

                                
                                var delete_btn = "";
                                var del_forv = "";
                                var undo_del_btn = '';

                                if(response['data'][i]['del_status'] == "no"){

                                    delete_btn = '<li class="del_this_grn"  id="del_this_grn_' + response['data'][i]['id'] + '"><a>Delete</a></li>';
                                    
                                }else if(response['data'][i]['del_status'] == "yes"){
                                    
                                    undo_del_btn = '<li class="undo_del"  id="undo_del_grn_' + response['data'][i]['id'] + '"><a>Undo Delete</a></li>';
                                    del_forv = '<li class="del_flva"  id="del_flva_' + response['data'][i]['id'] + '"><a>Delete Forever</a></li>';

                                }





                                strTable += '<tr id="row_' + response['data'][i]['id'] + '">';
                                strTable += '<td id="batch_cod_tx_'+response['data'][i]['id']+'">' + response['data'][i]['id'] + '</td>';
                                strTable += '<td id="batch_cod_tx_'+response['data'][i]['id']+'">' + response['data'][i]['company_name'] + '</td>';

                                // +response['data'][i]['Vendor']+
                                strTable += '<td>' + response['data'][i]['company_contact'] + '</td>';
                                strTable += '<td>' + response['data'][i]['phone'] + '</td>';
                                strTable += '<td style="text-align: ">' + response['data'][i]['email']+ '</td>';
                                // strTable += '<td></td>';


                                strTable += '<td valign="top">';
                                strTable += '<div class="x_content" style="margin: 0px; padding: 0px"><button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="true">Action <span class="caret"></span></button>';

                                strTable += '<ul role="menu" class="dropdown-menu  pull-right">    <a  href="client_page"><li class="view_info"  id="in_'+ response['data'][i]['batch_id']+'">Client Profile</a></li></a>  <a  href="client_tasks"><li class="view_info"  id="in_'+ response['data'][i]['batch_id']+'">Client Requests</a></li></a> <a  href="client_invoices"><li class="view_info"  id="in_'+ response['data'][i]['batch_id']+'">Client Invoices</a></li></a> <li class="inc_payment_history"  id="in_p_' + response['data'][i]['batch_id'] + '"><a>Send Email</a></li>  <li class="dwnld_grn"  id="dwnld_grn_' + response['data'][i]['batch_id'] + '"><a>Download</a></li>  '+delete_btn+undo_del_btn+del_forv+ ' </ul></div>';

                                strTable += '<!-- <i  class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true" style="display: none;" id="loader11_' + response['data'][i]['batch_id'] + '"></i> &nbsp;&nbsp; <a class="delete_receipt btn btn-danger btn-xs" style="cursor: pointer;" id="inc_' + response['data'][i]['batch_id'] + '"><i  class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Delete Receipt"></i> Delete</a> -->';

                                strTable += '</tr>';

                                strTable += '<tr style="display: none;" id="loader_row_' + response['data'][i]['batch_id'] + '">';
                                strTable += '<td colspan="6"><i class="fa fa-spinner fa-spin fa-fw fa-2x"  id="loading"></i>';
                                strTable += '</td>';
                                strTable += '</tr>';



                                strTable += '<tr id="tr_act_loader_'+response['data'][i]['batch_id']+'" style="display: none"><td colspan="5"><i class="fa fa-spinner fa-spin fa-fw fa-1x" style="display: ;" id="filter_loader"></i>';
                                strTable += '<td></tr>';

                                k++;

                            });

                        } else {

                            strTable = '<tr><td colspan="6">' + response.msg + '</td></tr>';

                        }

                        $('#pagination').twbsPagination({
                            totalPages: Math.ceil(response.total_rows / limit),
                            visiblePages: 10,
                            onPageClick: function(event, page) {
                                list_grns(page);
                            }
                        });

                        $("#incomingData").html(strTable);
                        $("#incomingData").show();
                        $('#loading').hide();

                    } else if (response.data <= 0) {
                        $('#loading').hide();

                        strTable = '<tr><td colspan="6">' + response.msg + '</td></tr>';

                        $("#incomingData").html(strTable);
                        $("#incomingData").show();

                    } else if (response.status == '400') {
                        var strTable = "";
                        $('#loading').hide();
                        // alert(response.msg);
                        strTable += '<tr>';
                        strTable += '<td colspan="6">' + response.msg + '</td>';
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
                    strTable += '<td colspan="6"><strong class="text-danger">Connection error</strong></td>';
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