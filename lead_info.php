<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>

<style type="text/css">
   /* .for_hover::hover{
        box-shadow: 4px 8px rgba(0,0,0,0.19);
    }*/
</style>

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
<div class="right_col" role="main" id="main_display" style="display: none">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lead Details</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group" style="float: right">
                        <a href="leads"><button type="button" class="btn btn-success">Back</button></a>
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

            <a href="#" class="btn btn-sm switch_tab btn-primary"  id="info_tab">Lead Info</a>
            <a href="#" class="btn btn-sm switch_tab" id="activity_tab" style="background-color: #c2c2c2">Tasks & Activities</a>
      <!--       <a href="#" class="btn btn-sm switch_tab" id="meeting_tab" style="background-color: #c2c2c2">Meetings</a>
            <a href="#" class="btn btn-sm switch_tab" id="call_tab" style="background-color: #c2c2c2">Calls</a>
            <a href="#" class="btn btn-sm switch_tab" id="campaign_tab" style="background-color: #c2c2c2">Campaign</a>
            <a href="#" class="btn btn-sm switch_tab" id="lo_tab" style="background-color: #c2c2c2">Lead Owners</a> -->

        </div>
        <br>




        <div class="row all_bxs" id="info_tab_bx">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Info</h2>
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
                <ul class="nav navbar-right panel_toolbox">
                      <li style="float: right"><a class="edit_basic_info"><i class="fa fa-pencil" style="color: #f55b5b"></i></a>
                      </li>
                    </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br>
                        <table class="table">
                            <!-- <thead>
                      <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                      </tr>
                  </thead> -->
                           <!--  <tbody>
                                <tr>
                                    <td style="width: 20%"><b>Lead Title:</b></td>
                                    <td><span id="lead_name"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Lead Description:</b></td>
                                    <td><span id="lead_desc"></span></td>
                                </tr>
                                <tr>
                                    <td><b>Lead Value:</b></td>
                                    <td><span id="lead_value"></span></td>
                                </tr>

                                <tr>
                                    <td><b>Lead Status:</b></td>
                                    <td><span id="lead_stage"></span></td>
                                </tr>

                                <tr>
                                    <td><b>Date Inserted:</b></td>
                                    <td><span id="date_inserted"></span></td>
                                </tr>

                            </tbody> -->


                            <tbody>
                                <tr>
                                <!-- <th scope="row">1</th> -->
                              <!--   <td style="width: 20%"><b>Lead Owner:</b></td>
                                <td>
                                    <span id="lead_name" style="cursor: pointer;" class="non_editable"></span>
                                    <input type="text" class="form-control edit_basic_info_form" id="lead__field" style="display: none">
                                </td>
                            </tr> -->
                            <tr>
                                <!-- <th scope="row">1</th> -->
                                <td style="width: 20%"><b>Lead Title:</b></td>
                                <td>
                                    <span id="lead_name" style="cursor: pointer;" class="non_editable"></span>
                                    <input type="text" class="form-control edit_basic_info_form" id="lead_name_field" style="display: none">
                                </td>
                            </tr>
                            <tr>
                                <!-- <th scope="row">2</th> -->
                                <td><b>Lead Description:</b></td>
                                <td>
                                    <span id="lead_desc" class="non_editable"></span>
                                    <textarea class="form-control edit_basic_info_form" id="lead_description_field" style="display: none;"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>Lead Value:</b></td>
                                <td>
                                    <span id="lead_value" class="non_editable"></span>
                                    <input type="text" class="form-control edit_basic_info_form" id="lead_value_field" style="display: none;">
                                </td>
                            </tr>

                            <tr>
                                <td><b>Lead Status:</b></td>
                                <td><span id="lead_stage" class="non_editable"></span>
                                <!-- <input type="text" class="form-control edit_basic_info_form" id="company_email_field" style="display: none"> -->
                                <select id="lead_status" class="form-control edit_basic_info_form" style="display: none;">

                                </select>
                            </td>
                            </tr>

                       

                          <!--   <tr>
                                <td><b>Date Inserted:</b></td>
                                <td>
                                    <span id="company_address" class="non_editable"></span>
                                    <input type="date" class="form-control edit_basic_info_form" id="company_date_field" style="display: none">
                                    
                                </td>
                            </tr>


                            <tr>
                                <td><b>Company Website:</b></td>
                                <td>
                                    <span id="date_inserted" class="non_editable"></span>
                                    <input type="text" class="form-control edit_basic_info_form" id="company_website_field" style="display: none">
                                </td>
                            </tr> -->

                            <tr id="buttons_for_edit_company" style="display: none">
                                <td></td>
                                <td>
                                    <div id="error_msg" style="color: red; display: "></div>
                                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader_lead"></i>
                                    <button type="button" class="btn btn-primary update_lead_details" id="update_lead_details">Update</button>
                                    &nbsp;
                                    <button type="button" class="btn btn-danger" id="cancel_update">Cancel Update</button>
                                </td>
                            </tr>

                        </tbody>
                        </table>



                    </div>
                </div>
            </div>


            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Contact Persons</h2>
                       
                        <ul class="nav navbar-right panel_toolbox">
                      <li style="float: right"><a class="edit_contact_info"><i class="fa fa-pencil" style="color: #f55b5b"></i></a>
                      </li>
                    </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br>
                        <table class="table">
                    

                            <table class="table">
                
                        <tbody>
                            
                            <tr>
                                <!-- <th scope="row">3</th> -->
                                <td style="width: 20%"><b>Contact's Firstname:</b></td>
                                <td>
                                    <span id="contacts_firstname" class="non_contact_editable"></span>
                                    <input type="text" class="form-control edit_contact_info_form" id="contacts_firstname_field" style="display: none">
                                </td>
                                <!-- <td>@twitter</td> -->
                            </tr>

                            <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>Contact's Lastname:</b></td>
                                <td>
                                    <span id="contacts_lastname" class="non_contact_editable"></span>
                                    <input type="text" class="form-control edit_contact_info_form" id="contacts_lastname_field" style="display: none">
                                </td>
                                <!-- <td>@twitter</td> -->
                            </tr>


                            <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>Contact's Phone:</b></td>
                                <td>
                                    <span id="contacts_phone" class="non_contact_editable"></span>
                                    <input type="text" class="form-control edit_contact_info_form" id="contacts_phone_field" style="display: none">
                                </td>
                                <!-- <td>@twitter</td> -->
                            </tr>

                            <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>Contact's Email:</b></td>
                                <td>
                                    <span id="contacts_email" class="non_contact_editable"></span>
                                    <input type="text" class="form-control edit_contact_info_form" id="contacts_email_field" style="display: none">
                                </td>
                                <!-- <td>@twitter</td> -->
                            </tr>

                              <tr id="buttons_for_edit_contact" style="display: none">
                                <td></td>
                                <td>
                                    <div id="error_msg" style="color: red; display: "></div>
                                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader__"></i>
                                    <button type="button" class="btn btn-primary" id="update_details__">Update</button>
                                    &nbsp;
                                    <button type="button" class="btn btn-danger" id="cancel_contact_update">Cancel Update</button>
                                </td>
                            </tr>

                        </tbody>



                    </table>



                    </div>
                </div>
            </div>



            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Company's Details</h2>
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
                        <ul class="nav navbar-right panel_toolbox">
                      <li style="float: right"><a class="edit_comp_info"><i class="fa fa-pencil" style="color: #f55b5b"></i></a>
                      </li>
                    </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br>

                        <table class="table">
                            <tbody>
                            <tr>
                                <!-- <th scope="row">1</th> -->
                                <td style="width: 20%"><b>Company's name:</b></td>
                                <td>
                                    <span id="cont_firstname" style="cursor: pointer;" class="non_comp_editable"></span>
                                    <input type="text" class="form-control edit_comp_info_form" id="comp_name_field" style="display: none">
                                </td>
                            </tr>
                            <tr>
                                <!-- <th scope="row">2</th> -->
                                <td><b>Company's Address:</b></td>
                                <td>
                                    <span id="cont_lastname" class="non_comp_editable"></span>
                                      <input type="tel" class="form-control edit_comp_info_form" id="comp_descr_field" style="display: none;">
                                </td>
                            </tr>
                            <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>Company's Website:</b></td>
                                <td>
                                    <span id="cont_phone" class="non_comp_editable"></span>
                                    <input type="text" class="form-control edit_comp_info_form" id="comp_website_field" style="display: none;">
                                </td>
                            </tr>


                            <tr id="buttons_for_edit_comp" style="display: none">
                                <td></td>
                                <td>
                                    <div id="error_msg" style="color: red; display: "></div>
                                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader"></i>
                                    <button type="button" class="btn btn-primary" id="update_comp_details">Update</button>
                                    &nbsp;
                                    <button type="button" class="btn btn-danger" id="cancel_comp_update">Cancel Update</button>
                                </td>
                            </tr>

                        </tbody>


                        </table>



                    </div>
                </div>
            </div>

        </div>



        <div class="row all_bxs" id="activity_tab_bx" style="display: none">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tasks & Activities <!-- <small>Sessions</small> --></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li style="float: right"><a class="add_info"><i class="fa fa-plus" style="color: #f55b5b"></i></a>
                      </li>
                    </ul>
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
                                        <option value="1" selected>Call</option>
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
                                        <!-- <option value="117" selected>Ugochukwu Nwagba</option> -->
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
                                    <input  type="datetime-local" class="form-control edit_task_form" id="end" >

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
                                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader_task"></i>
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

        </div>




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
                <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">Task <span id=""></span> <span id="" style="display: none"></span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </h3>

            </div>
            <div class="modal-body">

                <table class="table">
                
                        <tbody>
                            
                            <tr>
                                <!-- <th scope="row">3</th> -->
                                <td style="width: 20%"><b>Task Type:</b></td>
                                <td>
                                    <span id="contacts_firstname" class="dont_edit">Call</span>
                                 
                                </td>
                            </tr>

                             <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>Task Title:</b></td>
                                <td>
                                    <span id="task_title" class="dont_edit">Place a call to HR Manager,Chanco Impex</span>

                                </td>
                            </tr>

                            <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>Task Description:</b></td>
                                <td>
                                    <span id="contacts_lastname" class="dont_edit">The topic of the call should be asdgsdsdj ddsjk</span>
                                    
                                </td>
                            </tr>
                              <tr>
                                <td><b>Start Date & Start Time:</b> </td>
                                <td>
                                    <span id="task_title" class="dont_edit"> 7th Jan, 2021 8.00am</span>
                                
                                </td>
                            </tr>

                             <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>End Date & Time:</b> </td>
                                <td>
                                    <span id="task_title" class="dont_edit">7th Jan, 2021 8.00am</span>

                                </td>
                            </tr>
                             <tr>
                                <!-- <th scope="row">3</th> -->
                                <td style="width: 20%"><b>Task Status:</b></td>
                                <td>
                                    <span id="contacts_firstname" class="dont_edit"> Pending</span>
                                   
                                    
                                </td>
                                <!-- <td>@twitter</td> -->
                            </tr>

                             <tr>
                                <!-- <th scope="row">3</th> -->
                                <td><b>Upload File:</b></td>
                                <td>
                                    <span id="task_title" class="dont_edit"></span>
                                </td>
                            </tr>
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



    </div>
</div>
<!-- /page content -->

<script src="js/lead_info.js?v=43602"></script>
<?php
include_once("../gen/_common/footer.php");
?>