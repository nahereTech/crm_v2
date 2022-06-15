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
        <h3>Add Lead</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group" style="float: right">
            <a href="leads"><button type="button" class="btn btn-primary">Back</button></a>
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

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Lead Title<span>*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" id="lead_title" class="form-control add_item_required" name="lead_title" required="" autocomplete="off">

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_description">Lead Description
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea cols="3" class="form-control col-md-7 col-xs-12" id="lead_desc"></textarea>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lead_value">Lead Value
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="lead_value" class="form-control" name="lead_value" required="" autocomplete="off">
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Firstname
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" id="firstname" class="form-control" name="opportunity" required="" autocomplete="off">

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Lastname
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" id="lastname" class="form-control" name="opportunity" required="" autocomplete="off">

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Phone
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" id="phone" class="form-control" name="opportunity" required="" autocomplete="off">

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Email
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" id="email" class="form-control" name="email" required="" autocomplete="off">

                </div>
              </div>


              <hr>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Company
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" id="company_name" class="form-control" name="company_name" required="" autocomplete="off">

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" id="address" class="form-control" name="address" required="" autocomplete="off">

                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Website
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" id="website" class="form-control" name="website" required="" autocomplete="off">

                </div>
              </div>


              <hr>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="status">Lead Status
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <select id="lead_status" class="form-control add_item_required">
                    <!-- <option value="">-- Select Status --</option> -->
                  </select>

                </div>
              </div>
          
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12 text-danger" id="error">
                  
                </div>
              </div>

              <div class="ln_solid"></div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" id="add_lead">Add Lead</button>
                  <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="item_loader"></i>
                  <!-- <div id="add_user_loading" style="display:  none">Loading...</div> -->
                </div>
              </div>

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
      <div class="modal-header ">
        <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">Success
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


<script src="js/add_lead.js?v=4013"></script>
<?php
include_once("../gen/_common/footer.php");
?>