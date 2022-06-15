<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>

    <!-- page content -->
    <div class="right_col" role="main" id="main_display" style="display: ;">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Tasks 

                                              
                    </h3>

                </div>

                <div class="title_right">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                        <div class="input-group" style="float: right">

                            <a href="add_task"><button type="button" class="btn btn-default" id="">Add</button></a>

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

                                    <!-- <div class="col-sm-2 col-xs-12">
                                        <label>Task</label>
                                        <input type="text" id="task_code" class="form-control">
                                    </div> -->

                                    <div class="col-sm-2 col-xs-12">
                                          <label>Task</label>

                                            <datalist id="options_task">

                                            </datalist>

                                            <input list="options_task" class="form-control required1" id="select_item_task" autocomplete="off">
                                      </div>

                                    <!-- <div class="col-sm-2 col-xs-12">
                                        <label>Project</label>
                                        <select class="form-control col-md-7 col-xs-12 required" id="pay_status">
                                          <option value="">-- Select --</option>
                                          <option value="completed">Completed</option>
                                          <option value="uncompleted">Uncompleted</option>

                                        </select>
                                    </div> -->


                                    <div class="col-sm-3 col-xs-12">
                                        <label>Date Range</label>
                                        <input type="text" class="form-control" id="date_range">
                                    </div>


                                </div>



                                    <div class="col-sm-2 col-xs-12">
                                        <label>Active Status</label>
                                        <select class="form-control col-md-7 col-xs-12 required" id="pay_status">
                                          <option value="">-- Select --</option>
                                          
                                          <option value="active">Active</option>
                                          <option value="inactive">Incactive</option>
                                      </select>

                                    </div>


                                      <div class="col-sm-2 col-xs-12">
                                          <label>Company</label>

                                            <datalist id="options">

                                            </datalist>

                                            <input list="options" class="form-control required1" id="select_item" autocomplete="off">
                                      </div>

                                     <div class="col-sm-3 col-xs-4">
                                         <label>Lead</label>

                                            <datalist id="options_leads">

                                            </datalist>

                                            <input list="options_leads" class="form-control required1" id="select_leads" autocomplete="off">
                                    </div>

                                <div class="form-row" style="display: none">
                                    
                                    <div class="col-sm-2 col-md-2 col-xs-12">
                                        <label>Task...</label>
                                        <select class="form-control col-md-7 col-xs-12 required" id="task_owners">
                                          
                                          <?php

                                          if($_GET['a'] == "sfm" || $_GET['a'] == ""){
                                            echo '<option value="for_me">For Me</option>';
                                          }elseif ($_GET['a'] == "sbm") {
                                            echo '<option value="by_me">By Me</option>';
                                          }elseif ($_GET['a'] == "all") {
                                              echo '<option value="all_tasks">All</option>';
                                          }

                                          ?>                                         

                                        </select>
                                    </div>

                                </div>


                                <div class="form-row" style="margin-top:5px">

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

                                            <th class="column-title" width="10%">Task</th>
                                            <th class="column-title" width="10%">Start</th>
                                            <th class="column-title" width="10%">End</th>
                                            <th class="column-title" width="10%">Task For</th>

                                            <!-- <th class="column-title" width="25%">Task For</th> -->
                                            <!-- <th class="column-title" width="15%">End</th> -->
                                            <!-- <th class="column-title" width="30%">Set By</th> -->
                                            <!-- <th class="column-title" width="10%">Project</th> -->
                                            <th class="column-title" width="5%">Status</th>
                                            <!-- <th class="column-title" width="5%">Confirmed</th> -->
                                            <th class="column-title no-link last" width="5%"><span class="nobr">Actions</span>
                                            </th>
                                            <th class="bulk-actions" colspan="8">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tr id="loading_inc">
                                        <td colspan="6"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;"></i></td>
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













    <div class="modal fade" id="modal_mark_task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;"><i class="fa info-circle"></i> <span id=""></span> <span id="holds_task_id" style="display: none"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">
                    


                    <div class="row" style="text-align: center;">

                        <h2>Are you sure you have completed this task?</h2>
                        The creator of the task will be notified.<br><br>

                        <div id="pck_btns_993">
                        <button type="button" class="btn btn-success" id="task_is_complete" style="display: ">Yes, It's Completed</button>
                        <button type="button" class="btn btn-danger" id="" style="display: "  data-dismiss="modal" >No, Cancel</button>
                        </div>

                        <div id="loading_poppp" style="display: none">
                            <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;"></i>
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

<script src="js/tasks.js?v=93"></script>
<?php
include_once("../gen/_common/footer.php");
?>