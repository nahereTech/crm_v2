<?php
include("_common/header.php");
?>
    
    <div id="page_loader" style="display: ;">

          <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <i class="fa fa-spinner fa-spin fa-fw fa-4x"  ></i>
              </div>
            </div>
          </div>
        </div>   
      </div>

    <!-- page content -->
    <div class="right_col" role="main" id="main_display" style="display: none;">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Lead</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                        <div class="input-group" style="float: right" id="lead_buttons">

                            <!-- <a href="lead_summary"><button type="button" class="btn btn-primary" id="">Back</button></a> -->

                        </div>
                    </div>
                </div>
            </div>


            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Lead Profile</h2>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lead_title">Lead Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="lead_title" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lead_description">Lead Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="lead_description" name="lead_description" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_name" class="control-label col-md-3 col-sm-3 col-xs-12">Company Name</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="company_name" class="form-control col-md-7 col-xs-12" type="text" name="company_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_phone" class="control-label col-md-3 col-sm-3 col-xs-12">Company Phone</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="company_phone" class="form-control col-md-7 col-xs-12" type="text" name="company_phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="company_address" class="control-label col-md-3 col-sm-3 col-xs-12">Company Address</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="company_address" class="form-control col-md-7 col-xs-12" type="text" name="company_address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="estimated_value" class="control-label col-md-3 col-sm-3 col-xs-12">Estimated Value</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="estimated_value" class="form-control col-md-7 col-xs-12" type="text" name="estimated_value">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="start_date" class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="start_date" class="form-control col-md-7 col-xs-12" type="text" name="start_date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="end_date" class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="end_date" class="form-control col-md-7 col-xs-12" type="text" name="end_date">
                                    </div>
                                </div>
                                <br>
                                
                                <!-- <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
















                    <div class="row">
                        
                        <div class="col-md-12 col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Lead Owner</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Firstname</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control" id="lead_firstname">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Lastname</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control" id="lead_lastname">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Connect an Email Account</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="emai;" class="form-control" id="lead_email">
                                            </div>
                                        </div>
                                        

                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>



                        

                    </div>




                <br>
                <a href="create_project"><button type="button" class="btn btn-success" id="">Update</button></a>
                <br>
                <br>



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
      $(document).ready(function () {
        // body...
        fetch_lead_summary();

        $('input#start_date').datepicker({
            dateFormat: "yy-mm-dd"
          });


        $('input#end_date').datepicker({
            dateFormat: "yy-mm-dd"
          });

      })

      $.urlParam = function(name){
                   var results = new RegExp('[\?&]' + name + '=([^]*)').exec(window.location.href);
                   if (results==null){
                      return null;
                   }
                   else{
                      return results[1] || 0;
                   }
               }


      function fetch_lead_summary() {

            var company_id = localStorage.getItem('company_id');
            var lead_id = $.urlParam('id');

        
            $('#loading').show();

            $.ajax({

                type: "get",
                dataType: "json",
                cache: false,
                url: api_path + "crm/lead_details",
                data: {
                    "lead_id": lead_id,
                    "company_id": company_id
                },

                success: function(response) {

                    console.log(response);

                    
                  
                    var str = '';
                    var str2 = '';
                    if (response.status == '200') {

                      
                      str2 += '<a href="lead_summary?id='+lead_id+'"><button type="button" class="btn btn-primary" id="">Back</button></a>';


                      $('#lead_description').val(response.data.lead_description);
                      $('#lead_title').val(response.data.lead_description);
                      $('#company_name').val(response.data.lead_company_name);
                      $('#company_address').val(response.data.lead_company_address);
                      $('#company_phone').val(response.data.lead_company_phone);
                      $('#lead_firstname').val(response.data.lead_company_person);
                      $('#lead_lastname').val('');
                      $('#lead_email').val('');
                      $('#estimated_value').val('');
                      $('#start_date').val('');
                      $('#end_date').val('');

                      

                        
                        $("#lead_buttons").html(str2);
                        $('#page_loader').hide();
                        $("#main_display").show();

                    }

                },

                error: function(response) {
                    $('#page_loader').hide();
                    $('#main_display').show();
                    alert('Connection error!');
                    // $("#main_content").html('<strong class="text-danger">Connection error</strong>');
                  

                }

            });
        }
    </script>

<?php
include("_common/footer.php");
?>