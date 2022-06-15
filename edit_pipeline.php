<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>

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
<div class="right_col" role="main" id="main_display" style="display: none;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Pipeline</h3>
            </div>


            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <a href="pipeline_stages"><button type="button" class="btn btn-primary">Back</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="x_panel">
                    <ul class="nav navbar-right panel_toolbox">
                          <li style="float: right"><a class="edit_info"><i class="fa fa-pencil" style="color: #f55b5b"></i></a>
                          </li>
                        </ul>

                    <div class="x_content">
                        <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Type <span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select class="form-control col-md-7 col-xs-12 required" id="contact_type" disabled="disabled">
                            <option value="">-- Select --</option>
                            <option value="lead" selected="selected">Lead</option>
                          </select>

                        </div>

                      </div> -->







                       <div class="x_content">
                        <br>
                        <table class="table">
                    
                            <tbody>
                                
                                <tr>
                                    <td style="width: 20%"><b>Pipeline Name:</b></td>
                                    <td>
                                        <span id="stage_name_val" class="dont_edit"></span>
                                        <input type="text" class="form-control edit_info_form" id="stage_name"  style="display: none">
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>Pipeline Description:</b></td>
                                    <td>
                                        <span id="stage_desc_val" class="dont_edit"></span>
                                        <input type="text" class="form-control edit_info_form" id="stage_desc" style="display: none">
                                    </td>
                                </tr>

                               


                                <tr>
                                    <td><b>Status</b></td>
                                    <td>
                                        <span id="active_status_val" class="dont_edit"></span>
                                        <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                    <select class=" form-control edit_info_form form-control col-md-7 col-xs-12 add_item_required" id="active_status" style="display: none">
                                        <option value="yes">Active</option>
                                        <option value="no">Inactive</option>
                                    <!-- </select> -->
                                    </div>
                                    </td>
                                </tr>

                                 <tr>
                                    <td><b>Color Picker:</b></td>
                                    <td>
                                        <span id="stage_color_vall" class="dont_edit"></span>
                                        <input type="text" class="form-control edit_info_form" id="picker" style="display: none">
                                    </td>
                                </tr>

                                <tr id="buttons_for_edit" style="display: none">
                                    <td></td>
                                    <td>
                                        <div id="error_msg" style="color: red; display: "></div>
                                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader__"></i>
                                        <button type="button" class="btn btn-primary" id="edit">Update</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger" id="cancel_details_update">Cancel Update</button>
                                    </td>
                                </tr>
                            </tbody>



                        </table>
                        <!--  <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 text-danger" id="error"></div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success" id="edit">Update</button>
                                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="item_loader"></i>
                                </div>
                            </div> -->



                    </div>




                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Pipeline Name<span>*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="stage_name" class="form-control add_item_required" name="opportunity" required="" autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_description">Pipeline Description </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea cols="3" class="form-control col-md-7 col-xs-12 add_item_required" id="stage_desc"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="active_status">Status<span>*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12 add_item_required" id="active_status">
                                        <option value="yes">Active</option>
                                        <option value="no">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 text-danger" id="error"></div>
                            </div>

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success" id="edit">Update</button>
                                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="item_loader"></i>
                                </div>
                            </div> -->
                        </span>
                    </div>
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
                <h4>Opportunity Added Successfully!</h4>
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

<script src="js/edit_pipeline.js?v=1208382"></script>
<?php
include_once("../gen/_common/footer.php");
?>