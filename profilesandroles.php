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
                <h3>Profiles</h3>
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

            <div class="title_right" style="text-align: right;">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group" style="float: right;">
                        <!--span class="input-group-btn"-->
                        <a href="createprofile" class="btn btn-success">Create</a>
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
                        <h2 id="user_name"></h2>

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title" style="width: 5%;">#</th>
                                        <th class="column-title" style="width: 60%;">Profile</th>
                                        <th class="column-title" style="width: 30%;">Actions</th>
                                    </tr>
                                </thead>

                                <tr id="loading">
                                    <td colspan="3"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;"></i></td>
                                </tr>

                                <tbody id="incomingData"></tbody>
                            </table>

                            <!-- <button type="button" class="btn btn-success" id="update_perm">Update</button> -->
                            <!-- <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="perm_loader"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<!-- modal -->
<div class="modal fade" id="modal_warehouse_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <h4>User Added Successfully!</h4>
            </div>
            <!-- <div class="modal-footer"> -->
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            <!-- </div> -->
        </div>
    </div>
</div>

<!-- modal -->

<!-- modal -->
<div class="modal fade" id="modal_perm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <h4 id="modal_msg">User permission updated successfully!</h4>
            </div>
            <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="yes_delete_position" data-dismiss="modal">Yes</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                </div> -->
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
<script src="js/profilesandroles.js?v=4013"></script>
<?php
include_once("../gen/_common/footer.php");
?>
