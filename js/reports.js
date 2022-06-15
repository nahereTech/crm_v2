$(document).ready(function () {

  //this time interval check if the user roles have been fetched before running anything on this page
  var myVar2 = setInterval(

    function(){

      if($("#does_user_have_roles").html() != ""){

        //stop the loop
        myStopFunction();

        //does user have access to this module
        user_page_access();

        
        
      }else{
        console.log("No profile");
      }
       
    },
    1000
  );

  function myStopFunction() {
    clearInterval(myVar2);
  }

});

function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-55-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();

    setTimeout(() => {
      defCalls(); //returns the promise object
    }, 1000);


  }else{

    $("#main_display").remove();
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}

function defCalls() {
    var def = $.Deferred();
    $.when(count_opprtn(), low_item_counts(), total_values_of_stock(), fetch_money_we_owe(), total_deals(), fetch_money_we_are_owed(), fetch_pipeline(), deals_closed(), fetch_leads(''),fetch_tasks('')).done(function () {
        setTimeout(function () {
            def.resolve();
        }, 6000);
    });
    return def.promise();
}



function startOfWeek(date)
{
    var diff = date.getDate() - date.getDay() + (date.getDay() === 0 ? -6 : 1);
  
    return new Date(date.setDate(diff));
 
}

function endOfWeek(date)
{
   
  var lastday = date.getDate() - (date.getDay() - 1) + 6;
  return new Date(date.setDate(lastday));

}

function fetch_tasks(page) {

    var company_id = localStorage.getItem("company_id");
    var user_id = localStorage.getItem("user_id");
    if (page == "") {
        var page = 1;
    }
    var limit = 20;

    var task_for = "lead";

    

    var project_id = $("#holds_vendor_id").html();
    var task_status = $("#task_status").val();
    var task_owners = $("#task_owners").val();

    dt = new Date();
    var dd = String(startOfWeek(dt).getDate()).padStart(2, '0');
    var mm = String(startOfWeek(dt).getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = startOfWeek(dt).getFullYear();
    start_date = yyyy + '/' + mm + '/' + dd;


    dt = new Date();
    var dd = String(endOfWeek(dt).getDate()).padStart(2, '0');
    var mm = String(endOfWeek(dt).getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = endOfWeek(dt).getFullYear();
    end_date = yyyy + '/' + mm + '/' + dd;
    

    var date_range = start_date+" - "+end_date;

    $("#tasks_listing_loader").show();
    $("#tasks_listing").html("");

    $("html, body").animate({ scrollTop: 0 }, "slow");

    $.ajax({
        type: "GET",
        dataType: "json",
        url: api_path + "crm/list_of_tasks",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        data: {
            company_id: company_id,
            page: page,
            limit: limit,
            task_for: task_for,
            task_owners: "all_tasks",
            user_id: user_id,
        },
        timeout: 60000,

        success: function (response) {

            console.log(response);

            var strTable = "";

            if (response.status == "200") {
                
                if (response.data.length > 0) {
                    var k = 1;
                    $.each(response["data"], function (i, v) {
                        if (v.progress_status == "done") {
                            var status_icon = `<span class="badge" style="background: green" id="icnn_'${v.task_id}" aria-hidden="true">${v.progress_status}</span>`;
                            var link_to_mark = "";
                        }

                        if (v.progress_status == "Ongoing") {
                            var status_icon = `<span class="badge" style="background: gray" id="icnn_'${v.task_id}" aria-hidden="true">${v.progress_status}</span>`;
                            var link_to_mark = "";
                        }

                        if (v.progress_status == "Not Done") {
                            var status_icon = `<span class="badge" style="background: darkred" id="icnn_'${v.task_id}" aria-hidden="true">${v.progress_status}</span>`;
                            var link_to_mark = "";
                        }
                        if (v.progress_status == "Completed") {
                            var status_icon = `<span class="badge" style="background: darkgreen" id="icnn_'${v.task_id}" aria-hidden="true">${v.progress_status}</span>`;
                            var link_to_mark = "";
                        }
                        if (v.progress_status == "Pending" || v.progress_status == "pending") {
                            var status_icon = `<span class="badge" style="background: darkorange" id="icnn_'${v.task_id}" aria-hidden="true" style="color: orange">${v.progress_status}</span>`;

                            //if owned by user
                            if (v.task_for_id == localStorage.getItem("user_id")) {
                                var link_to_mark = '<li class="mark_task" id="mac_id_' + v.task_id + '"><a>Mark As Completed</a></li>';
                            } else {
                                var link_to_mark = "";
                            }
                        }

                        if (v.confirmed_status == "pending") {
                            var confirmed_status_icon = `<span class="badge" style="background: darkgray" id="icnn_'${v.task_id}" aria-hidden="true">${v.progress_status}</span>`;
                        } else if (v.confirmed_status == "done") {
                            var confirmed_status_icon = '<i class="fa fa-check fa-2x" style="color: green"></i>';
                        }

                        if (v.created_by == localStorage.getItem("user_id")) {
                            var delete_link = '<li class="inc_payment_history"  id="in_p_"><a>Delete Task</a></li>';
                            var edit_link = '<li class="view_info"  id="in_"><a href="participants?id=' + v.task_id + '">Edit Task</a></li>';

                            //if assignee has donen the task
                            if (v.confirmed_status == "done") {
                                var close_as_confirmed = '<li class="confirm_task"  id="mac_id_' + v.task_id + '"><a>Confirm</a></li>';
                            } else {
                                var close_as_confirmed = "";
                            }
                        } else {
                            var delete_link = "";
                            var edit_link = "";
                            var close_as_confirmed = "";
                        }


                        dto = new Date(start_date);
                        var dd = String(dto.getDate()).padStart(2, '0');
                        var mm = String(dto.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = dto.getFullYear();
                        start_date = dd + '/' + mm + '/' + yyyy;


                        strTable += "<tr>";
                        strTable += "<td>" + v.task + "</td>";
                        strTable += "<td>" + v.name_of_creator + "</td>";
                        // strTable += "<td>" + v.name_of_creator + "</td>";

                        strTable += "<td>" + start_date + "</td>";
                        // strTable += "<td>" + v.task_for + " (" + v.task_from + ")</td>";

                        // strTable += '<td>'+v.project_name+'</td>';
                        // strTable += `<td>${v.name_of_taskfor ? v.name_of_taskfor`(${v.task_from})` : `No Name(${v.task_from})`}</td>`
                        strTable += "<td>" + status_icon + "</td>";
                        // strTable += "<td>" + confirmed_status_icon + "</td>";
                        strTable += '<td valign="top">';

                        // strTable += '<a class="edit_warehouse_icon btn btn-info btn-xs" id="warh_" style="cursor: pointer;"><i  class="fa fa-pencil"  data-toggle="tooltip" data-placement="top" title="Edit Warehouses"></i> Edit</a>   <a class="edit_warehouse_icon btn btn-info btn-xs" id="warh_" style="cursor: pointer;"><i  class="fa fa-pencil"  data-toggle="tooltip" data-placement="top" title="Edit Warehouses"></i> Enter</a>  <a class="delete_warehouse btn btn-danger btn-xs" style="cursor: pointer;" id="war_"><i  class="fa fa-trash-o"  data-toggle="tooltip" data-placement="top" title="Delete Warehouse"></i> Remove</a>  ';

                        strTable += '<div class="x_content" style="margin: 0px; padding: 0px"><a  href="task_details?id=' + v.task_id + '" class="btn btn-default dropdown-toggle btn-xs" type="button" aria-expanded="true">View Task </a>';
                        strTable +=
                            '<ul role="menu" class="dropdown-menu  pull-right">  <li class="view_info"  id="in_"><a href="task_details?id=' +
                            v.task_id +
                            '">View Task</a></li> ' +
                            edit_link +
                            link_to_mark +
                            close_as_confirmed +
                            delete_link +
                            " </ul></div>";

                        strTable += "</td>";

                        strTable += "</tr>";

                        k++;
                    });
                } else {
                    strTable = '<tr><td colspan="8">' + response.msg + "</td></tr>";
                }

                $("#pagination").twbsPagination({
                    totalPages: Math.ceil(response.total_rows / limit),
                    visiblePages: 10,
                    onPageClick: function (event, page) {
                        list_of_tasks(page);
                    },
                });

                $("#tasks_listing_loader").hide();
                $("#tasks_listing").html(strTable);
                $("#tasks_listing").show();

            } else if (response.status == "400") {

                var strTable = "";
                strTable += "<tr>";
                strTable += '<td colspan="4">' + response.msg + "</td>";
                strTable += "</tr>";

                $("#tasks_listing_loader").hide();
                $("#tasks_listing").html(strTable);
                $("#tasks_listing").show();

            }
        },

        error: function (response) {

            var strTable = "";
            strTable += "<tr>";
            strTable += '<td colspan="4"><strong class="text-danger">Connection error</strong></td>';
            strTable += "</tr>";

            $("#tasks_listing_loader").hide();
            $("#tasks_listing").html(strTable);
            $("#tasks_listing").show();

        },
    });
}


function fetch_leads(page){

  var company_id = localStorage.getItem("company_id");
  if (page == "") {
      var page = 1;
  }
  var limit = 50;

  var lead_id = $("#lead_id").val();
  var lead_title = $("#code").val();

  var phone = $("#lead_phone").html();
  var status = $("#pay_status").val();
  var trashed = $("#deleted_itms").val();
  var date_range = $("#date_range").val();

  $("#leads_listing").html('');
  $("#leads_listing").hide();
  $("#leads_listing_loader").show();

  $.ajax({
      type: "GET",
      dataType: "json",
      headers: {
          Authorization: localStorage.getItem("token"),
      },
      url: api_path + "crm/list_of_leads",
      data: {
          
          lead_title: "",
          lead_status: "",
          date_range: date_range,
          trashed: trashed,
          user_id: "all",
          page: page,
          limit: limit,
      },
      timeout: 60000,

      success: function (response) {
          // console.log(response);

          var strTable = "";

          if (response.status == "200") {
              if (response.data.length > 0) {
                  var k = 1;

                  $.each(response.data, function (i, v) {
                      var delete_btn = "";
                      var del_forv = "";
                      var undo_del_btn = "";

                      if (response["data"][i]["lead_status"] == null) {
                          var lead_status = '<span class="badge ull-left" style="font-weight: normal; background: #b5b5b5; color: #fff"><b>Uncategorized</b></span>';
                      } else {
                          var lead_status = `<span class="badge-crm ull-left" style="font-weight: normal; background: #${response["data"][i]["pipeline_color_code"] ? response["data"][i]["pipeline_color_code"] : "b5b5b5"}; color: #fff"><b>${
                              response["data"][i]["pipeline_name"]
                          }</b></span>`;
                      }

                      if (response["data"][i]["del_status"] == "no") {
                          delete_btn = '<li class="del_this_grn"  id="del_this_grn_' + response["data"][i]["id"] + '"><a>Delete</a></li>';
                      } else if (response["data"][i]["del_status"] == "yes") {
                          undo_del_btn = '<li class="undo_del"  id="undo_del_grn_' + response["data"][i]["id"] + '"><a>Undo Delete</a></li>';
                          del_forv = '<li class="del_flva"  id="del_flva_' + response["data"][i]["id"] + '"><a>Delete Forever</a></li>';
                      }

                      strTable += '<tr id="row_' + response["data"][i]["id"] + '">';
                      strTable += '<td id="batch_cod_tx_' + response["data"][i]["id"] + '">' + response["data"][i]["lead_name"] + "</td>";
                      strTable += "<td>"+v.lead_owner_name+"</td>";

                      strTable += "<td>" + lead_status + "</td>";
                      // strTable += "<td>" + response["data"][i]["date_inserted"].split(" ")[0] + "</td>";

                      strTable += '<td valign="top">';

                      strTable +=
                          '<div class="x_content" style="margin: 0px; padding: 0px; text-align: right"><a href="lead_info?id=' +
                          response["data"][i]["id"] +
                          '"class="btn btn-default btn-xs" type="button" aria-expanded="true">Details</a></div>';

                      strTable += "</tr>";

                      strTable += '<tr style="display: none;" id="loader_row_' + response["data"][i]["batch_id"] + '">';
                      strTable += '<td colspan="6"><i class="fa fa-spinner fa-spin fa-fw fa-2x"  id="loading"></i>';
                      strTable += "</td>";
                      strTable += "</tr>";

                      strTable += '<tr id="tr_act_loader_' + response["data"][i]["batch_id"] + '" style="display: none"><td colspan="5"><i class="fa fa-spinner fa-spin fa-fw fa-1x" style="display: ;" id="filter_loader"></i>';
                      strTable += "<td></tr>";

                      k++;
                  });
              } else {
                  strTable = '<tr><td colspan="7">' + response.data.msg + "</td></tr>";
              }

              $("#lead_pagination").twbsPagination({
                  totalPages: Math.ceil(response.total_rows / limit),
                  visiblePages: 10,
                  onPageClick: function (event, page) {
                      fetch_leads(page);
                  },
              });

              $("#leads_listing").html(strTable);
              $("#leads_listing").show();
              $("#leads_listing_loader").hide();
          } else if (response.data.data <= 0) {
              $("#leads_listing_loader").hide();

              strTable = '<tr><td colspan="5">' + response.data.msg + "</td></tr>";

              $("#leads_listing").html(strTable);
              $("#leads_listing").show();
          } else if (response.data.status == "400") {
              var strTable = "";
              $("#leads_listing_loader").hide();
              // alert(response.msg);
              strTable += "<tr>";
              strTable += '<td colspan="5">' + response.data.msg + "</td>";
              strTable += "</tr>";

              $("#leads_listing").html(strTable);
              $("#leads_listing").show();
          }
      },

      error: function (response) {
          var strTable = "";
          $("#leads_listing_loader").hide();
          strTable += "<tr>";
          strTable += '<td colspan="5"><strong class="text-danger">Connection error</strong></td>';
          strTable += "</tr>";

          $("#leads_listing").html(strTable);
          $("#leads_listing").show();
      },
  });

}

function deals_closed() {

  var role_list = $("#does_user_have_roles").html();
  if(role_list.indexOf("-47-") >= 0 || role_list.indexOf("-48-") >= 0){
    $("#closed_deals_grh_bx").show();
  }else{
    return;
  }

  $.ajax({
      type: "GET",
      dataType: "json",
      headers: {
          Authorization: localStorage.getItem("token"),
      },
      url: api_path + "/crm/graphical_monthly_closed_deals",
      data: {
          // "company_id": company_id,
          // "store_id": store_,
          // "date_range": $("#date_range").val(),
          // "cashier_id":cash,
      },
      timeout: 60000,
      success: function (response) {
          if (response.status == "200") {
              // console.log(response);
              if (response.data.list.length != 0) {
                  var list_of_name = [];
                  var list_of_values = [];
                  $(response.data.list).each(function (index, value) {
                      // alert(index)
                      list_of_name.push(value.month);
                      list_of_values.push(Number(value.amount));
                  });
                  // var echartDonut = echarts.init(document.getElementById("yearly_sales_report"));

                  // var chartDom = document.getElementById('deals_closed_grh');
                  // var myChart = echarts.init(chartDom);
                  //  var option;
                  var chartDom = document.getElementById("deals_closed_grh");
                  var myChart = echarts.init(chartDom);
                  var option;

                  option = {
                      title: {},
                      tooltip: {
                          trigger: "axis",
                      },
                      legend: {
                          data: ["Value"],
                      },
                      toolbox: {
                          show: true,
                          feature: {
                              dataView: { show: true, readOnly: false },
                              magicType: {
                                  show: true,
                                  type: ["line", "bar"],
                              },
                              restore: { show: true },
                              saveAsImage: { show: true },
                          },
                      },
                      calculable: true,
                      xAxis: [
                          {
                              type: "category",
                              data: list_of_name,
                          },
                      ],
                      yAxis: [
                          {
                              type: "value",
                          },
                      ],
                      series: [
                          {
                              name: "Value",
                              type: "bar",
                              data: list_of_values,
                              markPoint: {
                                  data: [
                                      { type: "max", name: "Value" },
                                      { type: "min", name: "Value" },
                                  ],
                              },
                              markLine: {
                                  data: [{ type: "average", name: "Value" }],
                              },
                          },
                      ],
                  };
              }
          }
          option && myChart.setOption(option);

          // $("#main_transac_loader").hide()
          // $("#main_transac").show()
      },
      error: function (response) {
          // $("#ddsh_loading_1").hide();
          alert("error");
          // $('#employee_details_display').hide();
          // $('#employee_error_display').show();
      },
  });
}

function fetch_pipeline() {

  // sales_pipeline_bx
  var role_list = $("#does_user_have_roles").html();
  if(role_list.indexOf("-47-") >= 0 || role_list.indexOf("-48-") >= 0){
    $("#sales_pipeline_bx").show();
  }else{
    return;
  }

  $.ajax({
      type: "GET",
      dataType: "json",
      headers: {
          Authorization: localStorage.getItem("token"),
          // 'Content-Type':'application/json'
      },
      url: api_path + "/crm/graphical_sales_pipeline",
      data: {
        "user_id" : "all"
      },
      timeout: 60000,
      success: function (response) {
          if (response.status == "200") {
              // console.log(response);
              if (response.data.list.length != 0) {
                  var list_of_name = [];
                  var list_of_values = [];
                  $(response.data.list).each(function (index, value) {
                      // alert(index)
                      list_of_name.push(value.name);
                      list_of_values.push(Number(value.counts));
                  });
                  var chartDom = document.getElementById("pipeline_stages");
                  var myChart = echarts.init(chartDom);
                  var option;

                  option = {
                      title: {},
                      tooltip: {
                          trigger: "axis",
                      },
                      legend: {
                          data: ["Leads"],
                      },
                      toolbox: {
                          show: true,
                          feature: {
                              dataView: { show: true, readOnly: false },
                              magicType: {
                                  show: true,
                                  type: ["line", "bar"],
                              },
                              restore: { show: true },
                              saveAsImage: { show: true },
                          },
                      },
                      calculable: true,
                      xAxis: [
                          {
                              type: "category",
                              data: list_of_name,
                          },
                      ],
                      yAxis: [
                          {
                              type: "value",
                          },
                      ],
                      series: [
                          {
                              name: "Leads",
                              type: "bar",
                              data: list_of_values,
                              markPoint: {
                                  data: [
                                      { type: "max", name: "Leads" },
                                      { type: "min", name: "Leads" },
                                  ],
                              },
                              markLine: {
                                  data: [{ type: "average", name: "Leads" }],
                              },
                          },
                      ],
                  };
              }
          }
          option && myChart.setOption(option);

          // $("#main_transac_loader").hide()
          // $("#main_transac").show()
      },
      error: function (response) {
          // $("#ddsh_loading_1").hide();
          alert("error");
          // $('#employee_details_display').hide();
          // $('#employee_error_display').show();
      },
  });
}

function count_opprtn() {

  var role_list = $("#does_user_have_roles").html();
  if(role_list.indexOf("-47-") >= 0 || role_list.indexOf("-48-") >= 0 || role_list.indexOf("-49-") >= 0){
    $("#leads_bx").show();
  }else{
    return;
  }

  var company_id = localStorage.getItem("company_id");

  $.ajax({
      type: "get",
      dataType: "json",
      headers: {
          Authorization: localStorage.getItem("token"),
      },
      url: api_path + "crm/count_total_opportunities",
      data: { 
        company_id: company_id,
        "user_id": "all" 
      },
      timeout: 60000,
      success: function (response) {
          $("#leads_fg").html(response.total_rows);
          // console.log(response);
      },
      error: function (response) {
          // alert(response);
          // console.log(response);
      },
  });
}


function fetch_money_we_owe() {
    var company_id = localStorage.getItem("company_id");

    $.ajax({
        type: "POST",
        dataType: "json",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        url: api_path + "crm/count_projects",
        data: { company_id: company_id },
        timeout: 60000,
        success: function (response) {
            $("#total_xxs").html(response.total_rows);
            // console.log(response);
        },
        error: function (response) {
            // console.log(response);
        },
    });
}

function fetch_money_we_are_owed() {
    var company_id = localStorage.getItem("company_id");

    $.ajax({
        type: "get",
        dataType: "json",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        url: api_path + "crm/count_tasks",
        data: { 
          company_id: company_id, 
          task_status: "pending" 
        },
        timeout: 60000,
        success: function (response) {
            $("#total_ddds").html(response.total_rows);
            // console.log(response);
        },
        error: function (response) {
            // console.log(response);
        },
    });
}

function low_item_counts() {

  var role_list = $("#does_user_have_roles").html();
  if(role_list.indexOf("-1-") >= 0 || role_list.indexOf("-2-") >= 0){
    $("#clients_bx").show();
  }else{
    return;
  }

  var company_id = localStorage.getItem("company_id");
  $.ajax({
      type: "get",
      dataType: "json",
      headers: {
          Authorization: localStorage.getItem("token"),
      },
      url: api_path + "crm/count_total_active_clients",
      data: { company_id: company_id },
      timeout: 60000,
      success: function (response) {
          if (response.status == "200") {
              $("#clients_fg").html(response.total_rows);
          } else if (response.status == "400") {
              $("#clients_fg").html("Error");
          }
      },
      error: function (response) {
          // console.log(response);
      },
  });

}

function total_values_of_stock() {
    var company_id = localStorage.getItem("company_id");

    $.ajax({
        type: "POST",
        dataType: "json",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        url: api_path + "wms/total_values_of_stock",
        data: { company_id: company_id },
        timeout: 60000,
        success: function (response) {
            $("#total_st_v").html("₦" + numeral(parseFloat(response.amount)).format("0.0a"));
            // console.log(response);
        },
        error: function (response) {
            // console.log(response);
        },
    });
}

function total_deals() {

  var role_list = $("#does_user_have_roles").html();
  if(role_list.indexOf("-47-") >= 0 || role_list.indexOf("-48-") >= 0){
    $("#deals_closed_bx").show();
  }else{
    return;
  }

  var company_id = localStorage.getItem("company_id");

  $.ajax({
      type: "GET",
      dataType: "json",
      headers: {
          Authorization: localStorage.getItem("token"),
      },
      url: api_path + "crm/total_deals_made",
      data: { 
        date_range: "",
        "user_id" : "all"
      },
      timeout: 60000,
      success: function (response) {
          $("#total_ddds_deals").html("₦" + numeral(parseFloat(response.data.amount)).format("0.0a"));
          // console.log(response);
      },
      error: function (response) {
          // console.log(response);
      },
  });

}
