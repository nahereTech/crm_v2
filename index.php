<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>
        

        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">


            <div class="page-title">
              <div class="title_left">
                <h3>My Dashboard </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group" style="padding-top: 10px">
                    &nbsp;
                    <!-- <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span> -->
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>


            <div class="row top_tiles">

              <a href="clients" style="display: none;" id="clients_bx">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-briefcase"></i></div>
                  <div class="count" id="clients_fg">
                    <i class="fa fa-spinner fa-spin fa-fw" style="display: "></i>
                  </div>
                  <h3>Clients</h3>
                  <p>Active Clients</p>
                </div>
              </div>
              </a>
              
              <a href="leads" style="display: none;" id="leads_bx">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count" id="leads_fg">
                    <i class="fa fa-spinner fa-spin fa-fw" style="display: "></i>
                  </div>
                  <h3>Leads</h3>
                  <p>Current Leads</p>
                </div>
              </div>
              </a>

              <a href="tasks">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-bullhorn"></i></div>
                  <!-- <div class="count">???90.3mil</div> -->
                  <div class="count" id="total_ddds">
                    <i class="fa fa-spinner fa-spin fa-fw" style="display: "></i>
                  </div>
                  <h3>Pending Tasks</h3>
                  <p>Pending Tasks</p>
                </div>
              </div>
              </a>

              <a href="deals" style="display: none;" id="deals_closed_bx">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-line-chart"></i></div>
                  <!-- <div class="count">???90.3mil</div> -->
                  <div class="count" id="total_ddds_deals">
                    <i class="fa fa-spinner fa-spin fa-fw" style="display: "></i>
                   
                  </div>
                  <h3>Deals Closed</h3>
                  <p>Total Deals Made</p>
                </div>
              </div>
              </a>

            </div>




            <div class="row">
                
              <div class="col-md-6 col-sm-6 col-xs-12" style="display: none" id="sales_pipeline_bx">
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

                    <div id="pipeline_stages" style="height:350px;"><i class="fa fa-spinner fa-spin fa-fw fa-3x loader_lga_grh" style="display: " id="loader_lgn"></i></div>

                  </div>
                </div>
              </div>




              <div class="col-md-6 col-sm-6 col-xs-12" style="display: none" id="closed_deals_grh_bx">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Deals Closed (???)</h2>
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

                    <div id="deals_closed_grh" style="height:350px;"><i class="fa fa-spinner fa-spin fa-fw fa-3x loader_lga_grh" style="display: " id="loader_lgn_deals"></i></div>

                  </div>
                </div>
              </div>



            </div>





            <div class="row" style="display: none">
                
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo date("Y"); ?> Revenue Summary [??? mil]</h2>
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

<script src="js/index.js?v=416"></script>

<?php
include_once("../gen/_common/footer.php");
?>