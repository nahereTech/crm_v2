<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Task Details</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group" style="float: right">
                        <a href="tasks"><button type="button" class="btn btn-success">Back</button></a>
                        <!-- <a href="edit_client"><button type="button" class="btn btn-danger">Edit</button></a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>


        <!-- <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Project Budget</span>
                <div class="count">20,500</div>
                <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Current Expenditure</span>
                <div class="count">123.50</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>% Completion</span>
                <div class="count green">60%</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Project Team</span>
                <div class="count">5</div>
                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Estimated Completion</span>
                <div class="count">23/12/19</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Execution Rating</span>
                <div class="count">89%</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
        </div> -->


        <div class="text-left mtop20">

            <!-- <a class="btn btn-sm switch_tab btn-primary"  id="info_tab">Info</a> -->
            <a class="btn btn-sm switch_tab" id="activity_tab" style="background-color: #c2c2c2">Task Info</a>
            <!-- <a class="btn btn-sm switch_tab" id="tickets_tab" style="background-color: #c2c2c2">Tickets</a> -->
        <!--     <a class="btn btn-sm switch_tab" id="call_tab" style="background-color: #c2c2c2">Calls</a>
            <a class="btn btn-sm switch_tab" id="campaign_tab" style="background-color: #c2c2c2">Campaign</a>
            <a class="btn btn-sm switch_tab" id="lo_tab" style="background-color: #c2c2c2">Lead Owners</a> -->

        </div>
        <br>




        <div class="row all_bxs" id="info_tab_bx">

            <!--<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Basic Info</h2>
                        <ul class="nav navbar-right panel_toolbox">
                          
                          <li style="float: right"><a class="edit_basic_info"><i class="fa fa-pencil" style="color: #f55b5b"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br>
                        <table class="table col-md-12 col-sm-12 col-xs-12">
                           
                            <tbody>
                                <tr>
                                    <td style="width: 20%"><b>Company Name:</b></td>
                                    <td>
                                        <span id="company_name" style="cursor: pointer;" class="non_editable"></span>
                                        <input type="text" class="form-control edit_basic_info_form" id="company_name_field" style="display: none">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Company Description:</b></td>
                                    <td>
                                        <span id="company_description" class="non_editable"></span>
                                        <input type="text" class="form-control edit_basic_info_form" id="company_description_field" style="display: none" >
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Company Phone:</b></td>
                                    <td>
                                        <span id="company_phone" class="non_editable"></span>
                                        <input type="text" class="form-control edit_basic_info_form" id="company_phone_field" style="display: none;">
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>Company Email:</b></td>
                                    <td><span id="company_email" class="non_editable"></span>
                                    <input type="text" class="form-control edit_basic_info_form" id="company_email_field" style="display: none">
                                </td>
                                </tr>

                                <tr>
                                    <td><b>Company Address:</b></td>
                                    <td>
                                        <span id="company_address" class="non_editable"></span>
                                        <textarea class="form-control edit_basic_info_form" id="company_address_field" style="display: none;"></textarea>
                                    </td>
                                </tr>


                                <tr>
                                    <td><b>Company Website:</b></td>
                                    <td>
                                        <span id="company_website" class="non_editable"></span>
                                        <input type="text" class="form-control edit_basic_info_form" id="company_website_field" style="display: none">
                                    </td>
                                </tr>

                                <tr id="buttons_for_edit_company" style="display: none">
                                    <td></td>
                                    <td>
                                        <div id="error_msg" style="color: red; display: "></div>
                                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader"></i>
                                        <button type="button" class="btn btn-primary" id="update_company_details">Update</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger" id="cancel_update">Cancel Update</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>



                    </div>
                </div>
            </div> -->


    

        </div>






            <div class="row all_bxs" id="activity_tab_bx" style="display: ">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Tasks & Activities <!-- <small>Sessions</small> --></h2>
                        <!-- <ul class="nav navbar-right panel_toolbox">
                          <li style="float: right"><a class="add_info"><i class="fa fa-plus" style="color: #f55b5b"></i></a>
                          </li>
                        </ul> -->
                       <!--  <ul class="nav navbar-right panel_toolbox">
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
                      <div class="x_content" >
                        <!-- <div class="x_content" id="add_task"> -->
                        <br>
                      



                    </div>
                        <ul class="list-unstyled timeline">

                            <li class="" id="add_task"  style="display:none;">
                            <div class="block">
                              <div class="tags">
                                <!-- <a href="" class="tag">
                                  <span>Entertainment</span>
                                </a> -->
                              </div>
                              <div class="block_content to_add_task" >
                                <div class="x_title" style="border:none;">
                        <h2>Post Task<!-- <small>Sessions</small> --></h2>
                        <!-- <ul class="nav navbar-right panel_toolbox">
                          <li style="float: right"><a class="edit_task"><i class="fa fa-pencil" style="color: #f55b5b"></i></a>
                          </li>
                        </ul> -->
                       
                        <div class="clearfix"></div>
                      </div>

                        <table class="table">
                    
                            <tbody>
                                
                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td style="width: 20%"><b>Task Type:</b></td>
                                    <td>
                                        <span style="display:none;" id="contacts_firstname" class="dont_edit">Call</span>
                                        <select class="form-control edit_task_form add_item_required" id="task_type" name="gender" >
                                            <option value="">-- Select Type --</option>
                                            <option value="1" >Call</option>
                                            <option value="2">Office Meeting</option>
                                            <option value="3">Online Meeting</option>
                                            <option value="4">Email</option>
                                        </select>
                                        <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>



                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td style="width: 20%"><b>Task For:</b></td>
                                    <td>
                                        <!-- <span style="display:none;" id="contacts_firstname" class="dont_edit">Call</span> -->
                                        <select class="form-control edit_task_form" id="task_for" name="gender" >
                                            <option value="117" selected>Ugochukwu Nwagba</option>
                                           <!--  <option value="2">Office Meeting</option>
                                            <option value="3">Online Meeting</option>
                                            <option value="4">Email</option> -->
                                        </select>
                                        <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Task Title:</b></td>
                                    <td>
                                        <span style="display:none;" id="task_title" class="dont_edit">Place a call to HR Manager,Chanco Impex</span>
                                        <input type="text" class="form-control edit_task_form add_item_required" id="contacts_tasktitle_field" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Task Description:</b></td>
                                    <td>
                                        <span style="display:none;" id="contacts_lastname" class="dont_edit">The topic of the call should be asdgsdsdj ddsjk</span>
                                         <textarea  class="form-control edit_task_form add_item_required" id="main_task" ></textarea>
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                  <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Start Date & Start Time:</b> </td>
                                    <td>
                                        <span style="display:none;" id="task_title" class="dont_edit"> 7th Jan, 2021 8.00am</span>
                                        <input type="datetime-local" class="form-control edit_task_form add_item_required" id="start" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>


                                    <td><b>End Date & Time:</b> </td>
                                    <td>
                                        <span style="display:none;" id="task_title" class="dont_edit">7th Jan, 2021 8.00am</span>
                                        <input  type="datetime-local" class="form-control edit_task_form" add_item_required id="end" >

                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td style="width: 20%"><b>Task Status:</b></td>
                                    <td>
                                        <span style="display:none;" id="contacts_firstname" class="dont_edit"> Pending</span>
                                        <select class="form-control edit_task_form add_item_required" id="status" name="gender">
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Ongoing">Ongoing</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Not Done">Not Done</option>
                                        </select>
                                        <!-- <input type="text" class="form-control edit_info_form" id="contacts_firstname_field" > -->
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Upload File:</b></td>
                                    <td>
                                        <span style="display:none;" id="task_title" class="dont_edit"></span>
                                        <input type="file" class="form-control edit_task_form" id="file" multiple>
                                    </td>
                                    <!-- <td>@twitter</td> -->
                                </tr>
                                  <tr id="buttons_for_task_edit" >
                                    <td></td>
                                    <td>
                                        <div id="error_msg" style="color: red; display: "></div>
                                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader_clnt"></i>
                                        <button type="button" class="btn btn-primary add_item_required" id="post_task">Post Task</button>
                                        &nbsp;
                                        <!-- <button type="button" class="btn btn-danger" id="cancel_task_update">Cancel Update</button> -->
                                    </td>
                                </tr>
                            </tbody>



                        </table>
                              <!--   <h2 class="title">
                                                <b><a>Visit HR Manager at Ikeja Office</a></b>
                                            </h2>
                                <div class="byline">
                                  <span>5 days ago</span> by <a>Jane Smith</a>
                                </div>
                                <p class="excerpt">Visit the HR Manager by 10 a.m. on Monday 14th September. Key discussions to have are on the modules and how it solves all their HR issues… <a>Read&nbsp;More</a>
                                </p> -->
                              </div>
                            </div>
                          </li>



                          <diV id="popData"></diV>








                         
                        </ul>

                      </div>
                    </div>
                  </div>

<!-- 

        <div class="row all_bxs" id="activity_tab_bx" style="display: none">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Activity History ></h2>
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
                    <ul class="list-unstyled timeline">
                      <li class="for_hover">
                        <div class="block">
                          <div class="tags">
                            <a href="" class="tag">
                              <span>Entertainment</span>
                            </a>
                          </div>
                          <div class="block_content">
                            <h2 class="title">
                                            <a>Ugochukwu Nwagba</a>
                                        </h2>
                            <div class="byline">
                              <span>13 hours ago</span> by <a>Jane Smith</a>
                            </div>
                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                            </p>
                          </div>
                        </div>
                      </li>
                      <li class="for_hover">
                        <div class="block">
                          <div class="tags">
                            <a href="" class="tag">
                              <span>Entertainment</span>
                            </a>
                          </div>
                          <div class="block_content">
                            <h2 class="title">
                                            <a>Seye Oluwatobin</a>
                                        </h2>
                            <div class="byline">
                              <span>13 hours ago</span> by <a>Jane Smith</a>
                            </div>
                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                            </p>
                          </div>
                        </div>
                      </li>
                      <li class="for_hover">
                        <div class="block">
                          <div class="tags">
                            <a href="" class="tag">
                              <span>Entertainment</span>
                            </a>
                          </div>
                          <div class="block_content">
                            <h2 class="title">
                                            <a>Ikenna Okonkwo</a>
                                        </h2>
                            <div class="byline">
                              <span>13 hours ago</span> by <a>Jane Smith</a>
                            </div>
                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                            </p>
                          </div>
                        </div>
                      </li>




                    </ul>

                  </div>
                </div>
              </div>

        </div> -->




        <div class="row all_bxs" id="lo_tab_bx" style="display: none;">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lead Owners</h2>
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


                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FirstName Lastname</th>
                                    <th>Project Role</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark Assanya</td>
                                    <td>Front-end Programmer</td>
                                    <td>Active</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Tunde Obasanjo Ikeduru</td>
                                    <td>Back-end Programmer</td>
                                    <td>Inactive</td>
                                </tr>

                            </tbody>
                        </table>


                    </div>

                </div>
            </div>

        </div>


            <div class="modal fade" id="modal_task_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">History<span id=""></span> <span id="" style="display: none"></span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </h3>

                </div>
                <div class="modal-body">

                    <table class="table">
                    
                            <tbody>
                                
                                <!-- <tr> -->
                                  <!--   <td style="width: 20%"><b>Task Type:</b></td>
                                    <td>
                                        <span id="contacts_firstname" class="dont_edit">Call</span>
                                     
                                    </td>
                                </tr>  -->

                                 <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>Name:</b></td>
                                    <td>
                                        <span id="task_title" class="dont_edit">Ugochukwu Nwagba</span>

                                    </td>
                                </tr>

                                <tr>
                                    <!-- <th scope="row">3</th> -->
                                    <td><b>History:</b></td>
                                    <td>
                                        <span id="contacts_lastname" class="dont_edit">The topic of the call should be asdgsdsdj ddsjk</span>
                                        
                                    </td>
                                </tr>
                                  <!-- <tr>
                                    <td><b>Start Date & Start Time:</b> </td>
                                    <td>
                                        <span id="task_title" class="dont_edit"> 7th Jan, 2021 8.00am</span>
                                    
                                    </td>
                                </tr>

                                 <tr>
                                    <td><b>End Date & Time:</b> </td>
                                    <td>
                                        <span id="task_title" class="dont_edit">7th Jan, 2021 8.00am</span>

                                    </td>
                                </tr>
                                 <tr>
                                    <td style="width: 20%"><b>Task Status:</b></td>
                                    <td>
                                        <span id="contacts_firstname" class="dont_edit"> Pending</span>
                                       
                                        
                                    </td> -->
                                <!-- </tr>

                                 <tr>
                                    <td><b>Upload File:</b></td>
                                    <td>
                                        <span id="task_title" class="dont_edit"></span>
                                    </td>
                                </tr> -->
                                 <!--  <tr id="buttons_for_task_edit" >
                                    <td></td>
                                    <td>
                                        <div id="error_msg" style="color: red; display: "></div>
                                        <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader"></i>
                                        <button type="button" class="btn btn-primary" id="update_details">Post Task</button>
                                        &nbsp;
                                        <button type="button" class="btn btn-danger" id="cancel_task_update">Cancel Update</button>
                                    </td>
                                </tr> -->
                            </tbody>



                        </table>

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





       <!--  <div class="row all_bxs" id="tickets_tab_bx">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Request Tickets</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-3 mail_list_column">
                                <button id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</button>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left"><i class="fa fa-circle"></i> <i class="fa fa-edit"></i></div>
                                        <div class="right">
                                            <h3>Dennis Mugo <small>3.00 PM</small></h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="right">
                                            <h3>Jane Nobert <small>4.09 PM</small></h3>
                                            <p><span class="badge">To</span> Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left"><i class="fa fa-circle-o"></i><i class="fa fa-paperclip"></i></div>
                                        <div class="right">
                                            <h3>Musimbi Anne <small>4.09 PM</small></h3>
                                            <p><span class="badge">CC</span> Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-paperclip"></i>
                                        </div>
                                        <div class="right">
                                            <h3>Jon Dibbs <small>4.09 PM</small></h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            .
                                        </div>
                                        <div class="right">
                                            <h3>Debbis &amp; Raymond <small>4.09 PM</small></h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            .
                                        </div>
                                        <div class="right">
                                            <h3>Debbis &amp; Raymond <small>4.09 PM</small></h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left"><i class="fa fa-circle"></i> <i class="fa fa-edit"></i></div>
                                        <div class="right">
                                            <h3>Dennis Mugo <small>3.00 PM</small></h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="right">
                                            <h3>Jane Nobert <small>4.09 PM</small></h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-9 mail_view">
                                <div class="inbox-body">
                                    <div class="mail_heading row">
                                        <div class="col-md-8">
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
                                                <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
                                                <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                                                <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <p class="date">8:02 PM 12 FEB 2014</p>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. Donec ultrices faucibus rutrum.</h4>
                                        </div>
                                    </div>
                                    <div class="sender-info">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Jon Doe</strong>
                                                <span>(jon.doe@gmail.com)</span> to
                                                <strong>me</strong>
                                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-mail">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                            officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p>
                                            Riusmod tempor incididunt ut labor erem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p>
                                            Modesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                    <div class="attachment">
                                        <p>
                                            <span><i class="fa fa-paperclip"></i> 3 attachments — </span>
                                            <a href="#">Download all attachments</a> |
                                            <a href="#">View all images</a>
                                        </p>
                                        <ul>
                                            <li>
                                                <a href="#" class="atch-thumb">
                                                    <img src="images/inbox.png" alt="img" />
                                                </a>
                                                <div class="file-name">
                                                    image-name.jpg
                                                </div>
                                                <span>12KB</span>
                                                <div class="links">
                                                    <a href="#">View</a> -
                                                    <a href="#">Download</a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="atch-thumb">
                                                    <img src="images/inbox.png" alt="img" />
                                                </a>
                                                <div class="file-name">
                                                    img_name.jpg
                                                </div>
                                                <span>40KB</span>
                                                <div class="links">
                                                    <a href="#">View</a> -
                                                    <a href="#">Download</a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="atch-thumb">
                                                    <img src="images/inbox.png" alt="img" />
                                                </a>
                                                <div class="file-name">
                                                    img_name.jpg
                                                </div>
                                                <span>30KB</span>
                                                <div class="links">
                                                    <a href="#">View</a> -
                                                    <a href="#">Download</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
                                        <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
                                        <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                                        <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 -->







    </div>
</div>
<!-- /page content -->

<script src="js/task_details.js?v=10189"></script>
<?php
include_once("../gen/_common/footer.php");
?>