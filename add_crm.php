<?php
include("_common/header.php");
?>

        <!-- page content -->
        <div class="right_col" role="main" id="main_display" style="display: ;">
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


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Type <span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select class="form-control col-md-7 col-xs-12 required" id="contact_type" disabled="disabled">
                            <option value="">-- Select --</option>
                            <option value="lead" selected="selected">Lead</option>
                          </select>

                        </div>

                      </div>
                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Company Name <span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="company_name"  class="form-control col-md-7 col-xs-12 add_item_required">
                        </div>

                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Contact's Name <span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="contact_name"  class="form-control col-md-7 col-xs-12 add_item_required">
                        </div>

                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_custom_id">Phone<span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="phone"  class="form-control col-md-7 col-xs-12 add_item_required">
                        </div>

                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_custom_id">Email<span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email"  class="form-control col-md-7 col-xs-12 add_item_required">
                        </div>

                      </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_custom_id">Website<span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="website"  class="form-control col-md-7 col-xs-12">
                        </div>

                      </div>


                      <div class="form-group">
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
                          <button type="submit" class="btn btn-success" id="add">Add Item</button>
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
                <h4>Item Added Successfully!</h4>
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

              $(document).on('click', '#add', function(){

                add_company_item();

              });

          })


          

          

          function add_company_item(image_name){

            var company_id = localStorage.getItem('company_id');
            var user_id = localStorage.getItem('user_id');
            var company_name = $.trim($('#company_name').val());
            var contact_name = $('#contact_name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var website = $('#website').val();
            var address = $('#address').val();
            var contact_type = $("#contact_type").val();
            var lead_desc = $("#lead_desc").val();

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
    
              // $('#error').html("You have a blank field");

              return; 

            }
         
          
            $('#add').hide();
            $('#item_loader').show();

            $('#error').html('');


            $.ajax({

              type: "POST",
              dataType: "json",
              cache: false,
              url: api_path+"crm/add_lead",
              data: { "company_id" : company_id, "user_id" : user_id, "company_name" : company_name, "contact_name" : contact_name, "phone" : phone , "email" : email , "website" : website , "address" : address , "contact_type" : contact_type , "lead_desc" : lead_desc },

              success: function(response) {

                // console.log(response);

                if (response.status == '200') {

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
          
        </script>



<?php
include("_common/footer.php");
?>