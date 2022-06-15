<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>
        

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">


            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <!-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div> -->
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>


            <div class="row top_tiles">
              
              <a href="leads">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-money"></i></div>
                  <div class="count" id="the_rev">
                    <i class="fa fa-spinner fa-spin fa-fw" style="display: "></i>
                  </div>
                  <h3>Opportunities</h3>
                  <p>Current Leads</p>
                </div>
              </div>
              </a>


              <a href="clients">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-exclamation-triangle"></i></div>
                  <div class="count" id="low_itms">
                    <i class="fa fa-spinner fa-spin fa-fw" style="display: "></i>
                  </div>
                  <h3>Clients</h3>
                  <p>Active Clients</p>
                </div>
              </div>
              </a>


              <a href="projects">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-line-chart"></i></div>
                  <!-- <div class="count">₦90.3mil</div> -->
                  <div class="count" id="total_xxs">
                    <i class="fa fa-spinner fa-spin fa-fw" style="display: "></i>
                  </div>
                  <h3>Projects</h3>
                  <p>Active Projects</p>
                </div>
              </div>
              </a>

              <a href="tasks">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-line-chart"></i></div>
                  <!-- <div class="count">₦90.3mil</div> -->
                  <div class="count" id="total_ddds">
                    <i class="fa fa-spinner fa-spin fa-fw" style="display: "></i>
                  </div>
                  <h3>Tasks</h3>
                  <p>Pending Tasks</p>
                </div>
              </div>
              </a>

            </div>




            <div class="row">
                
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Current Sales Pipeline</h2>
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

                    <div id="yearly_expense_report" style="height:350px;"><i class="fa fa-spinner fa-spin fa-fw fa-3x loader_lga_grh" style="display: " id="loader_lgn"></i></div>

                  </div>
                </div>
              </div>




              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Current Sales Pipeline</h2>
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

                    <div id="yearly_expense_report" style="height:350px;"><i class="fa fa-spinner fa-spin fa-fw fa-3x loader_lga_grh" style="display: " id="loader_lgn"></i></div>

                  </div>
                </div>
              </div>



            </div>





            <div class="row">
                
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo date("Y"); ?> Revenue Summary [₦ mil]</h2>
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

                    <div id="crm_revenue_year" style="height:350px;"><i class="fa fa-spinner fa-spin fa-fw fa-3x loader_lga_grh" style="display: " id="loader_lgn"></i></div>

                  </div>
                </div>
              </div>

            </div>


              
            </div>
          </div>
        </div>
        <!-- /page content -->



        <script>
          $(document).ready(function(){

            function fetch_user_module_roles(){

              var company_id = localStorage.getItem('company_id');
              var user_id = localStorage.getItem('user_id');
              var module_id = 1;

              $.ajax({
                    
                type: "POST",
                dataType: "json",
                url: api_path+"user/get_user_roles_in_modules",
                data: { "company_id" : company_id , "user_id" : user_id , "module_id" : module_id },
                timeout: 60000,

                success: function(response) {
                    
                    console.log(response);

                    if (response.status == '200'){

                      var k = 1;
                      $.each(response['data'], function (i, v) {

                        if(v.role_id == 4){//a
                          //fetch every
                        }

                        if(v.role_id == 2){ //marketing
                          
                        }

                        if(v.role_id == 1){ //project manager
                          
                        }

                        if(v.role_id == 3){ //project manager
                          
                        }

                        k++;
                      });            


                    }else if(response.status == '400'){


                    }else if(response.status == "401"){
                        

                    }
                
                  },

                  error: function(response){


                  }        

              });
            }

            defCalls();//returns the promise object

          });

          function defCalls(){
             var def = $.Deferred();
             $.when(count_opprtn(),low_item_counts(),total_values_of_stock(), fetch_money_we_owe(), fetch_money_we_are_owed()).done(function(){
               setTimeout(function(){
                 def.resolve();
               },6000)
             })
             return def.promise();
          }

          function count_opprtn (){   
              
            var company_id = localStorage.getItem('company_id');

            $.ajax({ 
                type: "POST",
                dataType: "json",
                url: api_path+"crm/count_total_opportunities",
                data: {"company_id": company_id },
                timeout: 60000,
                success: function(response) { 
                  $("#the_rev").html(response.total_rows);
                   console.log(response);
                },
                error: function(response){
                  alert(response);
                  console.log(response);
                }
            });

          }


          function fetch_money_we_owe(){   
              
            var company_id = localStorage.getItem('company_id');

            $.ajax({ 

                type: "POST",
                dataType: "json",
                url: api_path+"crm/count_projects",
                data: {"company_id": company_id },
                timeout: 60000,
                success: function(response) { 

                  $("#total_xxs").html(response.total_rows);
                   console.log(response);
                },
                error: function(response){
                  console.log(response);
                }

            });

          }

          function fetch_money_we_are_owed(){   
              
            var company_id = localStorage.getItem('company_id');

            $.ajax({ 

                type: "POST",
                dataType: "json",
                url: api_path+"crm/count_tasks",
                data: {"company_id": company_id , "task_status" : 'pending' },
                timeout: 60000,
                success: function(response) { 

                  $("#total_ddds").html(response.total_rows);
                   console.log(response);
                },
                error: function(response){
                  console.log(response);
                }

            });

          }

          function low_item_counts (){ 

            var company_id = localStorage.getItem('company_id');

            $.ajax({ 
                type: "POST",
                dataType: "json",
                url: api_path+"crm/count_total_active_clients",
                data: {"company_id": company_id },
                timeout: 60000,
                success: function(response) {
                  
                  if(response.status == "200"){

                    $("#low_itms").html(response.total_rows);  
                   

                  }else if(response.status == "400"){

                    $("#low_itms").html('Error');  
                   

                  }
                
                },
                error: function(response){
                  console.log(response);
                }
            });

          }

          function total_values_of_stock (){   
            
            var company_id = localStorage.getItem('company_id');

            $.ajax({ 
                type: "POST",
                dataType: "json",
                url: api_path+"wms/total_values_of_stock",
                data: {"company_id": company_id },
                timeout: 60000,
                success: function(response) {
                $("#total_st_v").html('₦'+numeral(parseFloat(response.amount)).format('0.0a'));
                   console.log(response);
                },
                error: function(response){
                  console.log(response);
                }
            });

          }

          
           
          

        </script>



<!-- <script src="js/classes.js?v=43"></script> -->
<?php
include_once("../gen/_common/footer.php");
?> 
