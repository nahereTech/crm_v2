<?php
include_once("_common/menu.php"); // menu list
include_once("../gen/_common/header.php"); // header contents
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lead Information <!-- <small> design</small> --></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group" style="float: right" id="lead_buttons">
                    <!-- <a href="leads"><button type="button" class="btn btn-primary" id="">Back</button></a>
                    <a href="edit_lead"><button type="button" class="btn btn-danger" id="">Edit</button></a> -->
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <!-- <div class="x_title">
                    <h2>New Partner Contracts Consultancy</h2>
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
                  </div> -->

                  <div class="x_content">

                    <i class="fa fa-spinner fa-spin fa-fw fa-3x" style="display: ;" id="loading"></i>

                    <div class="col-md-12 col-sm-12 col-xs-12 col-xl-12" id="main_content">

                      <!-- <ul class="stats-overview">
                        <li>
                          <span class="name"> Estimated Value </span>
                          <span class="value text-success"> ₦2,300,000.00 </span>
                        </li>
                        <li>
                          <span class="name"> Days on Lead </span>
                          <span class="value text-success"> 35 Days </span>
                        </li>
                        <li class="hidden-phone">
                          <span class="name"> Estimated Closing </span>
                          <span class="value text-success"> 20/July/2019 </span>
                        </li>
                      </ul>
                      <br />

                

                      <div style="font-size: 14px">
                        <ul class="to_do">

                          <li>
                            <p>
                              <b>Lead Title:</b><br> Website Development for Sales College 
                            </p>
                          </li>

                          <li>
                            <p>
                             <b>Lead Description:</b><br> Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics Ideas House International Logistics 
                            </p>
                          </li>
                          
                          <li>
                            <p>
                              <b>Company Name:</b><br> Ideas House International Logistics 
                            </p>
                          </li>

                          <li>
                            <p>
                              <b>Company Phone:</b><br> 080877767654 
                            </p>
                          </li>

                          <li>
                            <p>
                              <b>Company Address:</b><br> 5/10 Ilupeju Byepass, Ilupeju, Lagos State
                            </p>
                          </li>

                          <li>
                            <p>
                              <b>Contact Person:</b><br> Theadeus Awaziama
                            </p>
                          </li>

                          <li>
                            <p>
                              <b>Contact Person Phone:</b><br> 08098838383
                            </p>
                          </li>


                          <li>
                            <p>
                              <b>Lead Owner:</b><br> Ikanna Obagana 
                            </p>
                          </li>
                          
                          
                          </ul>
                      </div> -->


                    </div>

                    <!-- start project-detail sidebar -->
                    <!-- <div class="col-md-3 col-sm-3 col-xs-12">

                      <section class="panel">

                        <div class="x_title">
                          <h2>Project Description</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <h3 class="green"><i class="fa fa-paint-brush"></i> Gentelella</h3>

                          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                          <br />

                          <div class="project_detail">

                            <p class="title">Client Company</p>
                            <p>Deveint Inc</p>
                            <p class="title">Project Leader</p>
                            <p>Tony Chicken</p>
                          </div>

                          <br />
                          <h5>Project files</h5>
                          <ul class="list-unstyled project_files">
                            <li><a href=""><i class="fa fa-file-word-o"></i> Functional-requirements.docx</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a>
                            </li>
                            <li><a href=""><i class="fa fa-mail-forward"></i> Email-from-flatbal.mln</a>
                            </li>
                            <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-word-o"></i> Contract-10_12_2014.docx</a>
                            </li>
                          </ul>
                          <br />

                          <div class="text-center mtop20">
                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                          </div>
                        </div>

                      </section>

                    </div> -->
                    <!-- end project-detail sidebar -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    <script type="text/javascript">
      $(document).ready(function () {
        // body...
        fetch_lead_summary();
      })

      $.urlParam = function(name){
                   var results = new RegExp('[\?&]' + name + '=([^]*)').exec(window.location.href);
                   if (results==null){
                      return null;
                   }
                   else{
                      return results[1] || 0;
                   }
               }


      function fetch_lead_summary() {

            var company_id = localStorage.getItem('company_id');
            var lead_id = $.urlParam('id');

        
            $('#loading').show();

            $.ajax({

                type: "get",
                dataType: "json",
                cache: false,
                url: api_path + "crm/lead_details",
                data: {
                    "lead_id": lead_id,
                    "company_id": company_id
                },

                success: function(response) {

                    console.log(response);

                    $('#loading').hide();
                  
                    var str = '';
                    var str2 = '';
                    if (response.status == '200') {

                      str2 += '<a href="leads"><button type="button" class="btn btn-primary" id="">Back</button></a>';
                      str2 += '<a href="edit_lead?id='+lead_id+'"><button type="button" class="btn btn-danger" id="">Edit</button></a>';


                      str += '<ul class="stats-overview">';
                      str +=  '<li>';
                      str +=    '<span class="name"> Estimated Value </span>';
                      str +=    '<span class="value text-success">Not Available</span>';
                      str +=  '</li>';
                      str +=  '<li>';
                      str +=    '<span class="name"> Days on Lead </span>';
                      str +=    '<span class="value text-success">Not Available</span>';
                      str +=  '</li>';
                      str +=  '<li class="hidden-phone">';
                      str +=    '<span class="name"> Estimated Closing </span>';
                      str +=    '<span class="value text-success">Not Available</span>';
                      str +=  '</li>';
                      str +=  '<li class="hidden-phone">';
                      str +=    '<span class="name"> Current Status </span>';
                      str +=    '<span class="value text-success">Not Available</span>';
                      str +=  '</li>';
                      str += '</ul>';
                      str += '<br />';


                      str += '<div style="font-size: 14px">';
                      str +=  '<ul class="to_do">';

                      str +=    '<li>';
                      str +=      '<p>';
                      str +=        '<b>Lead Title:</b><br>'+response.data.lead_name+'';
                      str +=      '</p>';
                      str +=    '</li>';

                      str +=    '<li>';
                      str +=      '<p>';
                      str +=       '<b>Lead Description:</b><br>'+response.data.lead_description+'';
                      str +=      '</p>';
                      str +=    '</li>';
                          
                      str +=    '<li>';
                      str +=      '<p>';
                      str +=        '<b>Company Name:</b><br> '+response.data.lead_company_name+'';
                      str +=      '</p>';
                      str +=    '</li>';

                      str +=    '<li>';
                      str +=      '<p>';
                      str +=        '<b>Company Phone:</b><br>'+response.data.lead_company_phone+'';
                      str +=      '</p>';
                      str +=    '</li>';

                      str +=    '<li>';
                      str +=      '<p>';
                      str +=        '<b>Company Address:</b><br>'+response.data.lead_company_address+'';
                      str +=      '</p>';
                      str +=    '</li>';

                      str +=    '<li>';
                      str +=      '<p>';
                      str +=        '<b>Contact Person:</b><br>'+response.data.lead_company_person+'';
                      str +=      '</p>';
                      str +=    '</li>';

                      str +=    '<li>';
                      str +=      '<p>';
                      str +=        '<b>Contact Person Phone:</b><br>'+response.data.lead_company_phone+'';
                      str +=      '</p>';
                      str +=    '</li>';


                      str +=    '<li>';
                      str +=      '<p>';
                      str +=        '<b>Lead Owner:</b><br>'+response.data.lead_company_name+'';
                      str +=      '</p>';
                      str +=    '</li>';
                          
                          
                      str +=    '</ul>';
                      str += '</div>';

                       
                        // $.each(response.data.items, function (i, v) {

                        //   list_trs += '<tr id="row_'+v+'"><td>'+k+'</td><td>'+v.item_name+'</td><td style="text-align: right">'+format_to_money(v.qty)+'</td><td style="text-align: right">'+format_to_money(v.unit_cost)+'</td><td style="text-align: right">'+format_to_money(v.total_line_cost)+'</td></tr>';

                        //   k++;

                        // });

                        
                        $("#lead_buttons").html(str2);
                        $("#main_content").html(str);

                    }

                },

                error: function(response) {
                    $('#loading').hide();
                    $("#main_content").html('<strong class="text-danger">Connection error</strong>');
                  

                }

            });
        }
    </script>
<?php
include_once("../gen/_common/footer.php");
?>