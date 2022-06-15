<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>
   
<style type="text/css">
.profile_img {
    border-radius: 100%
}
</style>
<div id="page_loader" style="display: ;">

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <i class="fa fa-spinner fa-spin fa-fw fa-4x"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- page content -->
<div id="employee_details_display" style="display: none;">
    <div class="right_col" role="main">

        <div class="">

            <div class="page-title">
                <div class="title_left">
                    <h3 id="profile_name"></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group" style="float: right">
                            <!-- <button type="button" class="btn btn-default" id="incoming_filter">Filter</button> -->
                            <!-- <button type="button" class="btn btn-success" id="apply">Add</button> -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal_drag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">Edit Profile Picture
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h3>

                        </div>
                        <div class="modal-body">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Profile Picture</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                                    <p>Drag files to the box below or click to select files.</p>
                                    <form class="dropzone" id="userimage"></form>
                                    <br />
                                    <br />
                                    <br />
                                </div>
                            </div>
                        </div>
                        <!-- <div class="modal-footer"> -->
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>


            <div class="clearfix"></div>
            <div class="clearfix"></div>

            <div class="modal fade" id="modal_edt_profile" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h3 class="modal-title" id="exampleModalLabel" style="color: #fff;">Edit Profile
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h3>
                        </div>
                        <div class="modal-body" style="height:auto; display: block; overflow-y: auto;
                             overflow-x: hidden;">
                            <div class="col-md-12 col-sm-12 col-xs-12"
                                style="background-image:linear-gradient(90deg, rgba(42, 63, 84, 0.92) 0%, rgba(42, 63, 84, 0.95) 100%), url(../files/images/general_images/ware.jpg); height: 100px; border-radius: 20px; ">

                                <span style="position: relative; left:170px; top: 140px; cursor: pointer;"
                                    id="edt_pic"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top"
                                        title="Edit Profile Picture"></i></span>

                                <img class="img-responsive avatar-view" src="" alt="Profile Picture"
                                    title="Profile Picture" id="user_image_" class="profile_img"
                                    style="width:160px; height:160px; border-radius:100%; border: 4px solid #E1E1E1; margin-left: 20px; margin-bottom: 50px; box-shadow: 0 4px 8px rgba(0,0,0,0.19); ">


                                <span
                                    style="margin-left: 0px; text-align: left; position: relative; left: 50px; top: 5px;">
                                </span>
                                <!-- <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none ; " id="lg_change_loader"></i> -->
                                <br>
                            </div>
                            <div style="width: 80%;margin-left: auto;margin-right: auto;
                                margin-top: 40px;position: relative;top: 30px;">
                                <div style="margin-top: 170px;">
                                    <span style="font-size: 16px; font-weight: bold; margin:10px;">First Name<input
                                            style="border-radius: 10px;" type="text" id="first_name" required="required"
                                            class="form-control col-md-7 col-xs-12 required">
                                    </span>
                                </div>
                                <div>
                                    <span style="font-size: 16px; font-weight: bold; margin:10px ">Last Name
                                        <input style="border-radius: 10px;" type="text" id="last_name"
                                            required="required" class="form-control col-md-7 col-xs-12 required">
                                    </span>
                                </div>

                                <!-- <div>
                                    <span style="font-size: 16px; font-weight: bold; margin:10px;">Other Names
                                        <input style="border-radius: 10px;" type="text" id="other_names"
                                            class="form-control col-md-7 col-xs-12">
                                    </span>
                                </div> -->

                                <div>
                                    <span style="font-size: 16px; font-weight: bold; margin:10px; ">Profession
                                        <input style="border-radius: 10px;" type="text" id="profession"
                                            class="form-control col-md-7 col-xs-12">
                                    </span>
                                </div>

                                <div>
                                    <span style="font-size: 16px; font-weight: bold; margin:10px; ">Gender
                                        <select style="border-radius: 10px;"
                                            class="form-control col-md-7 col-xs-12 required" id="gender_">
                                            <option value="">Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </span>
                                </div>
                                <div style="margin-bottom:-20px ;">
                                    <span style="font-size: 16px; font-weight: bold; margin:10px;">Date of Birth
                                        <input style="border-radius: 10px;" data-date-format="yyyy/mm/dd"
                                            id="datepicker" class="form-control">
                                    </span>
                                </div>

                                <div>
                                    <span style="font-size: 16px; font-weight: bold; margin:10px;">Phone Number
                                        <input style="border-radius: 10px;" type="number" id="phone_"
                                            required="required" class="form-control col-md-7 col-xs-12">
                                    </span>
                                </div>

                                <div>
                                    <span style="font-size: 16px; font-weight: bold; margin:10px;">Email
                                        <input style="border-radius: 10px;" type="email" id="email_" required="required"
                                            class="form-control col-md-7 col-xs-12 required" disabled>
                                    </span>
                                </div>
                                <!-- <div>
                             <span  style="font-size: 16px; font-weight: bold; ">Residential Address
                              <textarea style="border-radius: 20px" cols="3" class="form-control col-md-7 col-xs-12" id="address_">
                             
                           </textarea>
                            </span>
                            </div> -->



                                <!-- <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Firstname<span>*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="first_name" required="required" class="form-control col-md-7 col-xs-12 required">
                          </div>
                        </div> 

                  <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Lastname <span>*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="last_name" required="required" class="form-control col-md-7 col-xs-12 required">
                          </div>
                  </div>
 -->
                                <!-- <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="other_names">Othernames <span>*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="other_names" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender_">Gender <span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12 required" id="gender_">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            
                          </select>
                        </div>
                      </div> -->
                                <!--  <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_of_birth_">Date of Birth
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <!-- <input type="text" id="date_of_birth_" required="required" class="form-control col-md-7 col-xs-12"> -->


                                <!-- <input type="text" id="dobtotal" class="form-control"> -->

                                <!-- <input type="date" id="dobtot" class="form-control"> -->
                                <!-- <input data-date-format="yyyy/mm/dd" id="datepicker" class="form-control"> -->



                                <!--  <div class="col-xs-4" style="padding-left: 0px">
                            <select id="dobday" class="form-control input-sm"></select>
                            </div>
                            <div class="col-xs-4">
                            <select id="dobmonth" class="form-control input-sm"></select>
                            </div>
                            <div class="col-xs-4">
                            <select id="dobyear" class="form-control input-sm"></select>
                            </div>  -->

                                <!-- </div>
                        </div> -->
                                <!-- <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_">Phone Number
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="number" id="phone_" required="required" class="form-control col-md-7 col-xs-12">
                         </div>
                       </div>


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_">Email <span>*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="email" id="email_" required="required" class="form-control col-md-7 col-xs-12 required" disabled>
                         </div>
                       </div> 

                        <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address_">Residential Address
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea cols="3" class="form-control col-md-7 col-xs-12" id="address_">
                             
                           </textarea>
                         </div>
                       </div>  -->



                            </div>
                            <div class="modal-footer" style="margin-top: 100px;">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button style="border-radius: 20px; width: 100%; margin-top: 20px;" type="button"
                                        class="btn btn-success" id="add_profile">Update</button>
                                    <span style="width: 100%; margin-top: 20px;"> <i
                                            class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;"
                                            id="loader"></i></span>
                                </div>
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="clearfix"></div>

                <!-- <div class="col-md-4 col-sm-12 col-xs-12">

                  <div class="x_panel" >
                    <br><br>
                    <span style="width: 100%;">
                    <img class="img-responsive avatar-view" src="" alt="Profile Picture" title="Profile Picture" id="user_image" class="profile_img"
                    style="width:100%; height:300px; border: 7px solid #E1E1E1; margin-left: auto; margin-right: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.19)">
                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none ; " id="lg_change_loader"></i>
                    </span>

                    <br>
                  </div>

                </div> -->


                <div class="col-md-12 col-sm-12 col-xs-12"
                    style="box-shadow: 0 4px 8px rgba(0,0,0,0.19); border-radius: 20px; ">
                    <div class="x_panel" style=" margin-left: auto;margin-right: auto; position: relative;top: 6px;">
                        <!-- <div class="x_title">
                      <h2>Personal Profile</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        
                      </ul>
                      <div class="clearfix"></div>
                    </div> -->

                        <!-- <br> -->


                        <div class="col-md-12 col-sm-12 col-xs-12"
                            style="background-image:linear-gradient(90deg, rgba(42, 63, 84, 0.92) 0%, rgba(42, 63, 84, 0.95) 100%), url(../files/images/general_images/ware.jpg); height: 200px; box-shadow: 0 4px 8px rgba(0,0,0,0.19); border-radius: 20px">

                            <div class="col-md-4 col-sm-12 col-xs-12" style="margin-top: 100px">
                                <img class="img-responsive avatar-view" src="" alt="Profile Picture"
                                    title="Profile Picture" id="user_image" class="profile_img"
                                    style="width:160px; height:160px; border-radius:100%; border: 4px solid #E1E1E1; margin-left: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.19)">
                                <span
                                    style="margin-left: 0px; text-align: left; position: relative; left: 50px; top: 5px;">
                                    <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Firstname </label> -->
                                    <h2 id="firstname"></h2>
                                </span>
                                <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none ; "
                                    id="lg_change_loader"></i>

                                <br>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h2 style="color: white; font-size: 30px;margin-top: 80px; margin-left: 40px;">Personal
                                    Profile</h2>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12" style="margin-top: 220px">
                                <button id="edt_profile"
                                    style="background-color: #2674C2; color: white; border: none; padding: 10px; border-radius: 5px;">Edit
                                    Personal Profile</button>

                            </div>


                        </div>
                        <!-- <div class="col-md-8 col-sm-12 col-xs-12 x_content"> -->

                        <div class="col-md-12 col-sm-12 col-xs-12"
                            style="margin-top: 70px; position: relative;left: 10px; padding: 10px">
                            <br />

                            <span id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <!-- <span>
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Firstname </label>
                          <h4 id="firstname"></h4>
                        </span> -->

                                <!--  <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">Firstname <span>*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="firstname" required="required" class="form-control col-md-7 col-xs-12 required">
                          </div>
                        </div> -->

                                <!-- <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Lastname <span>*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lastname" required="required" class="form-control col-md-7 col-xs-12 required">
                          </div>
                        </div> -->
                                <div class="col-md-6 col-sm-12 col-xs-12"
                                    style=" position: relative; top: 10px; left: 40px">
                                    <!-- <div style="padding-bottom: 5px;">
                          <span style="color: black; font-size: 16px;">Othernames:  <span id="othernames"></span></span>
                        </div> -->
                                    <div style="padding-bottom: 5px;">
                                        <span style="color: black; font-size: 16px;">Gender: <span
                                                id="gender"></span></span>
                                        <!-- <h2 ></h2> -->
                                    </div>
                                    <div style="padding-bottom: 5px;">
                                        <span style="color: black; font-size: 16px;">Date Of Birth: <span
                                                id="date_of_birth"></span></span>
                                    </div>
                                    <span>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12"
                                    style="position: relative; top: -10px left: 40px;">

                                    <div style="padding-bottom: 5px;">
                                        <span style="color: black; font-size: 16px;">Phone Number: <span
                                                id="phone"></span></span>
                                    </div>
                                    <div style="padding-bottom: 5px;">
                                        <span style="color: black; font-size: 16px;">Email: <span
                                                id="email"></span></span>
                                    </div>
                                </div>
                                <!-- <span >
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="othernames">Othernames </label>
                          <h2 id="othernames"></h2>
                        </span> -->

                                <!-- <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="othernames">Othernames <span>*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="othernames" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div> -->

                                <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender <span>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12 required" id="gender">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            
                          </select>
                        </div>
                      </div> -->

                                <!-- <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date_of_birth">Date of Birth
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12"> -->
                                <!-- <input type="text" id="date_of_birth" required="required" class="form-control col-md-7 col-xs-12"> -->


                                <!-- <input type="text" id="dobtotal" class="form-control"> -->

                                <!-- <input type="date" id="dobtot" class="form-control"> -->
                                <!-- <input data-date-format="yyyy/mm/dd" id="datepicker" class="form-control"> -->



                                <!-- <div class="col-xs-4" style="padding-left: 0px">
                            <select id="dobday" class="form-control input-sm"></select>
                            </div>
                            <div class="col-xs-4">
                            <select id="dobmonth" class="form-control input-sm"></select>
                            </div>
                            <div class="col-xs-4">
                            <select id="dobyear" class="form-control input-sm"></select>
                            </div> -->

                                <!-- </div>
                        </div> -->



                                <!-- <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital_status">Marital Status
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" id="marital_status">
                              <option value="">Select</option>
                              <option value="single">Single</option>
                              <option value="married">Married</option>
                              <option value="divorced">Divorced</option>
                              <option value="widow">Widow</option>
                              <option value="widower">Widower</option>
                            </select>
                          </div>
                        </div> -->


                                <!-- <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone Number
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="number" id="phone" required="required" class="form-control col-md-7 col-xs-12">
                         </div>
                       </div>


                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span>*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="email" id="email" required="required" class="form-control col-md-7 col-xs-12 required" disabled>
                         </div>
                       </div> -->

                                <!-- <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Residential Address
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea cols="3" class="form-control col-md-7 col-xs-12" id="address">
                             
                           </textarea>
                         </div>
                       </div> -->


                                <!-- <div id="add_user_loading" style="display:  none">Loading...</div> -->


                                <!--  <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12 text-danger" id="error"></div>
                        </div>

                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-success" id="add_profile">Update</button>
                            <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none;" id="loader"></i>
                          </div>
                        </div> -->

                            </span>

                        </div>

                    </div>
                </div>
            </div>


            <div class="row" style="position: relative; top: 20px">

                <div class="clearfix"></div>

                <div class="col-md-12 col-sm-12 col-xs-12"
                    style="box-shadow: 0 4px 8px rgba(0,0,0,0.19); border-radius: 20px;">
                    <div class="x_panel" style=" margin-left: auto;margin-right: auto; position: relative; top: 6px">
                        <div class="col-md-10 col-sm-12 col-xs-12" style="position: relative; left: 60px;">
                            <h4 style="font-weight: bold;">Work Experience</h4>
                            <br>
                            <span><i class="fa fa-building"
                                    style="color: #B3B6B9; font-size: 20px; background-color: #fff"></i><span>
                                </span></span>
                            <i class="fa fa-edit"
                                style="color: #B3B6B9; font-size: 20px; background-color: #fff; position: relative; left: 580px;"></i>

                        </div>

                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <button
                                style="background-color: #2674C2; color: white; border: none; padding: 5px; border-radius: 5px; margin-top: 5px;">Add
                                Work Experience</button>

                        </div>





                    </div>
                </div>
            </div>

            <div class="row">

                <!-- <div class="col-md-4 col-sm-12 col-xs-12">

                  <div class="x_panel">
                    Current Profile Picture
                    <br><br>
                    <img class="img-responsive avatar-view" src="" alt="Profile Picture" title="Profile Picture" id="user_image">
                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: none ; " id="lg_change_loader"></i>
                    <br>
                  </div>

                </div> -->


                <!-- <div class="drag_picture col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Profile Picture</h2>
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
                      <p>Drag files to the box below or click to select files.</p>
                      <form class="dropzone" id="userimage"></form>
                      <br />
                      <br />
                      <br />
                    </div>
                  </div>
                </div> -->
            </div>


        </div>
    </div>
</div>


<div id="employee_data_display" style="display: none;">

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-danger alert-dimissible fade-in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true"></span>
                        </button>
                        <strong>Connection error!</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal_user_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                <h4>Your profile has been updated successfully!</h4>
            </div>
            <!-- <div class="modal-footer"> -->
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            <!-- </div> -->
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '#edt_profile', function() {
        $('#modal_edt_profile').modal('show');

    })

    $(document).on('click', '#edt_pic', function() {
        $('#modal_edt_profile').modal('hide');
        $('#modal_drag').modal('show');
    })

    console.log($('datepicker').val())
    var url_source = window.location.hostname
    console.log(`https://api.${url_source}`);

    var socket = io.connect(`https://api.${url_source}`, { 'forceNew': true });

    var pathArray = window.location.href.split('/');
    var username = pathArray[2].split('.')[0];

    $('#userimage').attr('action', window.location.origin + '/api/company/upload_images?to_where=user_photo');

    fetch_user_details();

    $('input#dobtotal').datepicker({
        dateFormat: "yy-mm-dd"
    });

    $.dobPicker({
        daySelector: '#dobday',
        /* Required */
        monthSelector: '#dobmonth',
        /* Required */
        yearSelector: '#dobyear',
        /* Required */
        dayDefault: 'Day', //Optional 
        monthDefault: 'Month',
        /* Optional */
        yearDefault: 'Year',
        /* Optional */
        minimumAge: 12,
        /* Optional */
        maximumAge: 80 /* Optional */
    });

    // $('#date_of_birth').birthdayPicker();
    $('#add_profile').on('click', update_personal_profile_registration);

    Dropzone.options.userimage = {

        // maxFiles: 1,
        accept: function(file, done) {
            if (file.type != "image/jpeg" && file.type != "image/png" && file.type != "image/gif") {
                alert("You are allowed to drag only images");
            } else {
                done();
            }

        },
        init: function() {

            // this.on("maxfilesexceeded", function(file){
            //     alert("No more files please!");
            // });

            this.on("sending", function(file, xhr, formData) {

                formData.append("user_id", localStorage.getItem('user_id'));

            });
        },
        success: function(file, response) {

            // alert(file+response);

            var obj = jQuery.parseJSON(response);
            if (obj.status == "200") {

                $("#user_image").attr("src", "");
                $("#user_image").attr("src", site_url + '/files/images/user_profile_images/' + obj.data
                    .image_name + '?t=' + new Date().getTime());

                localStorage.setItem('profile_photo', obj.data.image_name);
                socket.emit('edit_profile_picture', {
                    image_path: site_url + '/files/images/user_profile_images/' + obj.data.image_name + '?t=' + new Date().getTime(),
                    image_name: `${obj.data.image_name}`
                });

                console.log(`${obj.data.image_name}`)

            }
            console.log(obj);

        }

    };

});



function update_personal_profile_registration() {

    var user_id = localStorage.getItem('user_id');
    var firstname = $('#first_name').val();
    var lastname = $('#last_name').val();
    var othernames = $('#other_names').val();
    var profession = $('#profession').val();

    var email = $.trim($('#email_').val());
    // var address = $.trim($('#address').val());
    var gender = $('#gender_').val();
    // var marital_status = $('#marital_status').val();

    var phone = $('#phone_').val();
    var dobday = $('#dobday').val();
    var dobmonth = $('#dobmonth').val();
    var dobyear = $('#dobyear').val();
    // var date_of_birth = dobyear+'-'+dobmonth+'-'+dobday;
    var dob = $('#datepicker').val();
    console.log(dobday);
    console.log(dobmonth);
    console.log(dobyear);
    // console.log(date_of_birth);
    // return;
    $('#error').html("");

    var blank;

    $(".required").each(function() {

        var the_val = $.trim($(this).val());

        if (the_val == "" || the_val == "0") {

            $(this).addClass('has-error');

            blank = "yes";

        } else {

            $(this).removeClass("has-error");

        }

    });


    if (blank == "yes") {

        $('#error').html("You have a blank field");

        return;

    }

    // if (!validateEmail(email)) {

    //     $('#error').html('invalid Email');

    //     return;
    // }

    $('#add_profile').hide();
    $('#loader').show();

    $.ajax({

        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "user/update_profile",
        // "lastname" : lastname, "othernames" : othernames, 
        data: {
            "firstname": firstname,
            "lastname": lastname,
            "phone": phone,
            "user_id": user_id,
            "email": email,
            "dob": dob,
            "gender": gender,
            "user_profession": profession
        },
        // headers: {
        //         'Accept': 'application/json',
        //         'Content-Type': 'application/json',
        //         'Authorization':'Basic '+tkn
        //      },
        success: function(response) {
            // console.log(response);
            // return;

            if (response.status == '200') {
                console.log(dob)

                $('#loader').hide();
                $('#add_profile').show();

                localStorage.setItem('firstname', firstname);
                localStorage.setItem('lastname', lastname);
                $('#modal_user_profile').modal('show');
                $('#modal_user_profile').on('hidden.bs.modal', function() {
                    // do something…
                    // $('#item_display').hide();
                    window.location.reload();
                    //window.location.href = base_url+"/erp/hrm/employees";
                })





            } else if (response.status == '400') { // coder error message

                $('#add_profile').show();
                $('#loader').hide();
                $('#error').html(response.msg);

            } else if (response.status == '401') { //user error message

                $('#add_profile').show();
                $('#loader').hide();
                $('#error').html(response.msg);

            }

        },
        error: function(response) {
            console.log(response);
            $('#add_profile').show();
            $('#loader').hide();
            $('#error').html("Connection Error.");

        }

    });
}

function fetch_user_details() {

    var user_id = localStorage.getItem('user_id');

    $.ajax({

        type: "GET",
        dataType: "json",
        url: api_path + "user/get_profile",
        data: {
            "user_id": user_id
        },
        timeout: 60000,

        success: function(response) {
            $('#page_loader').hide();
            $('#employee_details_display').show();


            if (response.status == '200') {
                console.log(response)

                // var dob = response.data.dob.split("-");
                var dob = response.data.dob;
                console.log(dob)
                // var dobyear = dob[0];
                // var dobmonth = dob[0];
                // var dobday = dob[0];

                // alert(response.data.firstname);



                // $('#profile_name').html('<b>'+response.data.firstname+' '+response.data.lastname+' '+response.data.othernames+'</b>');
                $('#firstname').html('<b>' + response.data.firstname + ' ' + response.data.lastname + ' ' +
                    response.data.othernames + '</b>');
                // $('#othernames').html('<b>'+response.data.othernames+'</b>');
                $('#gender').html('<b>' + response.data.gender + '</b>');
                $('#date_of_birth').html('<b>' + response.data.dob + '</b>');
                $('#phone').html('<b>' + response.data.phone + '</b>');
                $('#email').html('<b>' + response.data.email + '</b>');

                $('#first_name').val(response.data.firstname);
                $('#last_name').val(response.data.lastname);
                $('#other_names').val(response.data.othernames);
                $('#gender_').val(response.data.gender);
                $('#profession').val(response.data.profession);
                $("#user_image_").attr("src", site_url + '/files/images/user_profile_images/' + response
                    .data.pics);




                // $('#date_of_birth').val(response.data.date_of_birth);
                // $('#marital_status').val(response.data.marital_status);
                $('#phone_').val(response.data.phone);
                $('#email_').val(response.data.email);
                $('#datepicker').val(dob);
                // $('#dobmonth').val(dobmonth);
                // $('#dobyear').val(dobyear);
                // $('#next_of_kin').val(response.data.next_of_kin);
                // $('#address').val(response.data.address);
                $("#user_image").attr("src", site_url + '/files/images/user_profile_images/' + response.data
                    .pics);
                // console.log(response.data.pics);
                // $('#religion').val(response.data.religion);


            } else if (response.status == '400') {
                $('#employee_details_display').show();
                $('#employee_details_display').hide();
                $('#employee_data_display').show();

            }

        },
        // objAJAXRequest, strError
        error: function(response) {
            $('#employee_details_display').show();
            $('#employee_details_display').hide();
            $('#employee_data_display').show();

        }

    });
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$('#datepicker').datepicker({

    weekStart: 1,
    daysOfWeekHighlighted: "6,0",
    autoclose: true,
    todayHighlight: true,
    startDate: new Date('1900-01-01'),
    endDate: new Date('2019-01-01')
});
$('#datepicker').datepicker("setDate", new Date());
</script>


<?php
include_once("../gen/_common/footer.php");
?>
