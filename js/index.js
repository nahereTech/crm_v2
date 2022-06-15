$(document).ready(function () {

  //this time interval check if the user roles have been fetched before running anything on this page
  var myVar2 = setInterval(

    function(){

      if($("#does_user_have_roles").html() != ""){

        //stop the loop
        myStopFunction();

        setTimeout(() => {
          defCalls(); //returns the promise object
        }, 1000);
        
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

function defCalls() {
    var def = $.Deferred();
    $.when(count_opprtn(), low_item_counts(), total_values_of_stock(), fetch_money_we_owe(), total_deals(), fetch_money_we_are_owed(), fetch_pipeline(), deals_closed()).done(function () {
        setTimeout(function () {
            def.resolve();
        }, 6000);
    });
    return def.promise();
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
          "user_id" : "self"
      },
      timeout: 60000,
      success: function (response) {
          if (response.status == "200") {
              console.log(response);
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
      url: api_path + "crm/graphical_sales_pipeline",
      data: {
          // "company_id": company_id,
          // "store_id": store_,
          // "date_range": $("#date_range").val(),
          // "cashier_id":cash,
      },
      timeout: 60000,
      success: function (response) {
          if (response.status == "200") {
              console.log(response);
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
        "user_id" : "self"
      },
      timeout: 60000,
      success: function (response) {
          $("#leads_fg").html(response.total_rows);
          console.log(response);
      },
      error: function (response) {
          // alert(response);
          console.log(response);
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
            console.log(response);
        },
        error: function (response) {
            console.log(response);
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
          task_status: "pending",
          "user_id": "self" 
        },
        timeout: 60000,
        success: function (response) {
            $("#total_ddds").html(response.total_rows);
            console.log(response);
        },
        error: function (response) {
            console.log(response);
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
          console.log(response);
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
            console.log(response);
        },
        error: function (response) {
            console.log(response);
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
        "req_type" : "personal"
      },
      timeout: 60000,
      success: function (response) {
          $("#total_ddds_deals").html("₦" + numeral(parseFloat(response.data.amount)).format("0.0a"));
          console.log(response);
      },
      error: function (response) {
          console.log(response);
      },
  });

}
