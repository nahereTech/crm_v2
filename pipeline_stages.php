<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>


    <style>
        .no-border {
            border: none;
            outline: none;
            background-color: #f5f6f8;
            border-radius: 5px;
            padding: 5px;
            margin-bottom: 2em;
        }
    </style>


    <!-- loader page -->
    <div class="right_col" role="main" id="main_display_loader_page" style="display: ;">

      <div class="page-title">
        <div class="title_left">
          <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ; margin-top: 20px;" id="ldnuy"></i>
          <div id="loader_mssg" style="color: red; font-size: 14px; margin-top: 30px; background-color: ;"></div>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          </div>
        </div>
      </div>

    </div>
    <!-- /loader page content -->



    <!-- page content -->
    <div  id="main_display" style="display: none;">
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3 id="employee_no">Pipeline Stages</h3>
                    </div>

                    <div class="title_right" style="text-align: right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group" style="float: right">
                                <!--span class="input-group-btn"-->
                                <!-- <button type="button" class="btn btn-primary" id="filter_employee">Filter</button> -->
                                <a href="add_pipeline"><button type="button" class="btn btn-success">Add</button></a>
                                <!-- </span> -->

                            </div>
                        </div>
                    </div>

                    <!-- <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Go!</button>
                        </span>
                      </div>
                    </div>
                  </div> -->
                </div>


                <div id="filter_display" style="display: none;">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">

                                <div class="x_content">
                                    <br />


                                    <div class="form-row">

                                        <div class="col-sm-2 col-xs-4">
                                            <input type="text" class="form-control required" placeholder="Firstname" id="firstname">
                                        </div>


                                        <div class="col-sm-2 col-xs-4">
                                            <input type="text" class="form-control" placeholder="Lastname" id="lastname">
                                        </div>

                                        <div class="col-sm-2 col-xs-4">
                                            <select class="form-control col-sm-2 col-xs-2" id="gender">
                                            <option value="">-- Select gender --</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>

                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-sm-2 col-xs-4">
                                            <select class="form-control col-sm-2 col-xs-2" id="position">
                                            <option value="">-- Select position --</option>

                                        </select>
                                        </div>

                                        <!-- <div class="col-sm-2 col-xs-4">
                        <input type="text" class="form-control" placeholder="Code" id="employee_code">
                      </div> -->


                                        <div class="col-sm-2 col-xs-4">
                                            <select class="form-control col-sm-2 col-xs-2" id="employee_department">
                                            <option value="">-- Select Department --</option>

                                        </select>
                                        </div>

                                        <div class="col-sm-2 col-xs-4">
                                            <select class="form-control col-sm-2 col-xs-4 required" id="status">
                                            <option value="">-- Select status --</option>
                                            <option value="active">Active</option>
                                            <option value="suspended">Suspended</option>
                                            <option value="terminated">Terminated</option>

                                        </select>
                                        </div>
                                    </div>
                                    <br><br><br>



                                    <div class="form-row">

                                        <!-- <div class="col-sm-2 col-xs-4">
                                        <input type="text" class="form-control" placeholder="Phone">
                                      </div>


                                      <div class="col-sm-2 col-xs-4">
                                        <input type="text" class="form-control" placeholder="email">
                                      </div> -->

                                    </div>
                                    <!-- <div class="col-sm-3">
                        <select class="form-control col-md-7 col-xs-12 required" id="employee_department" name="sel_employee">
                            <option value="">-- Select department --</option>
                            
                        </select>
                      </div> -->

                                    <div class="form-row">






                                        <div class="col-sm-2 col-xs-4">
                                            <button type="button" class="btn btn-success" id="filter">Search</button>
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
                                    <!-- <select class="form-select no-border" id="order_by" aria-label="Default select example">
                                    <option value="most_recent">Order by Latest</option>
                                    <option value="alphabet">Order from A-Z </option>
                                </select> -->
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                  <input type="checkbox" id="check-all" class="flat">
                                                </th> -->
                                                <!-- <th class="column-title">S/N </th> -->
                                                <th class="column-title" style="width: 5%">#</th>
                                                <!-- <th class="column-title" style="width: 10%">Code</th> -->

                                                <th class="column-title" style="width: 45%">Stage Name</th>
                                                <th class="column-title" style="width: 15%">Status</th>
                                                <th class="column-title" style="width: 20%">Set Deals Closed</th>



                                                <th class="column-title" style="width: 20%">
                                                    <span class="nobr">Action</span>
                                                </th>
                                                <!-- <th class="bulk-actions" colspan="6">
                                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th> -->
                                            </tr>
                                        </thead>

                                        <tr id="loading">
                                            <td colspan="4"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;"></i></td>
                                        </tr>

                                        <tbody id="employeeData">



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
    </div>
    <!-- /page content -->


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
                <h4>There are existing Leads for the pipeline you want to delete!</h4>
            </div>
            <!-- <div class="modal-footer"> -->
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            <!-- </div> -->
        </div>
    </div>
</div>

    <div id="employee_error_display" style="display: none;">

        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">

                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="alert alert-danger alert-dimissible fade-in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true"></span>
                        </button>
                            <strong>Connection error</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="js/pipelines.js?v=43de03"></script>
<?php
include_once("../gen/_common/footer.php");
?>