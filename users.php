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
        <h3 id="user_count"></h3>
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

      <div class="title_right" style="text-align: right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group" style="float: right">
            <!--span class="input-group-btn"-->
            <button type="button" class="btn btn-success" id="add">Add User</button>
            
            
          </div>
        </div>
      </div>
    </div>

    <div id="user_display" style="display: none;">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          <div class="x_content">
            <br />
            <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Add User <span>*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" id="email" class="form-control col-md-7 col-xs-12 required" placeholder="Enter User's E-mail">
                </div>
              </div>


              <span></span>

            

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12 text-danger" id="error">
                  
                </div>
              </div>
                  
              
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <!-- <button class="btn btn-primary" type="button">Cancel</button>
                  <button class="btn btn-primary" type="reset">Reset</button> -->
                  <button type="button" class="btn btn-success" id="add_user">Add</button>
                  <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="user_loader"></i>
                </div>
              </div>

            </span>
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
                    
                    <th class="column-title">S/N </th>
                    <th class="column-title">Name </th>
                    <th class="column-title">Email </th>
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="2">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                 <tr id="loading">
                  <td colspan="4"><i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;" ></i></td>
                </tr>
                
               <tbody  id="userData">
                  
                
                  
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

<!-- modal -->
<div class="modal fade" id="modal_warehouse_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div class="modal fade" id="modal_no_access" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header ">
                <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">Access Denied
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>
                
              </div>
              <div class="modal-body">
                <h4>You do not have access to this role</h4>
              </div>
              <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              <!-- </div> -->
            </div>
          </div>
        </div>





          <!-- modal -->
        
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


<script src="js/users.js?v=4160"></script>
<?php
include_once("../gen/_common/footer.php");
?>