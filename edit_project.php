<?php
include("_common/header.php");
?>

        <!-- page content -->
        <div class="right_col" role="main" id="main_display" style="display: ;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create Project</h3>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Client <span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <span id="canccl_vdn">
                          <input type="text" class="form-control" placeholder="Last Name" id="holds_vendor_name" style="display: none;" disabled="disabled" >
                          </span>

                          <div id="holds_vendor_id" style="float: left; display: none"></div>

                          <input type="text" id="vendor_text" class="form-control" name="fullname" required="" autocomplete="off">


                        </div>

                      </div>
                      
                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_item_name">Project Name <span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="project_name"  class="form-control col-md-7 col-xs-12 add_item_required">
                        </div>

                      </div>
                   


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="add_description">Project Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea cols="3" class="form-control col-md-7 col-xs-12 add_item_required" id="project_desc"></textarea>
                        </div>
                      </div>




                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 text-danger" id="error">
                          
                        </div>
                      </div>

                      <!-- <div class="ln_solid"></div> -->

                      <!-- <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" id="add">Add Item</button>
                          <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="item_loader"></i>
                          
                        </div>
                      </div> -->

                    </span>
							
						
                  </div>
                </div>
              </div>




              


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Participants</h2>
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

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Level</th>
                          <th>Level Members</th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>
                            <span class="label label-success pull-left" style="font-size: 12px">Ugochukwu Nwagba</span>
                            <span class="label label-success pull-left" style="font-size: 12px">Ugochukwu</span></td>
                          <!-- <td>Otto</td> -->
                        </tr>

                        <tr>
                          <th scope="row">2</th>
                          <td><div>Mark</div><div>Mark</div></td>
                          <!-- <td>Otto</td> -->
                        </tr>
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
















              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">

                    <button type="submit" class="btn btn-success" id="add">Create</button>
                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="item_loader"></i>

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

                add_project();

              });


              $(document).on('click', '#canccl_vdn', function(){
                
                    $("#holds_vendor_name").val('');
                    $("#holds_vendor_name").hide();
                    $("#holds_vendor_id").html('');
                    $("#vendor_text").show();
                    $("#vendor_text").val('');
                    
              });

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


          

          

          function add_project(){

            var company_id = localStorage.getItem('company_id');
            var user_id = localStorage.getItem('user_id');
            var project_name = $.trim($('#project_name').val());
            var project_client = $('#holds_vendor_id').html();
            var project_desc = $('#project_desc').val();

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


            if(project_client == ""){
              $("#vendor_text").addClass("has-error");
              return;
            }
         
          
            $('#add').hide();
            $('#item_loader').show();

            $('#error').html('');



            $.ajax({

              type: "POST",
              dataType: "json",
              cache: false,
              url: api_path+"crm/add_project",
              data: { "company_id" : company_id, "added_by" : user_id, "project_name" : project_name, "project_client" : project_client, "project_desc" : project_desc },

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