$(document).ready(function () {
    //this time interval check if the user roles have been fetched before running anything on this page
    var myVar2 = setInterval(function () {
        if ($("#does_user_have_roles").html() != "") {
            //stop the loop
            myStopFunction();

            //does user have access to this module
            user_page_access();
        } else {
            console.log("No profile");
        }
    }, 1000);

    function myStopFunction() {
        clearInterval(myVar2);
    }
    //end of interval set

    $(document).on("click", "#filter", function () {
        $("#pagination").twbsPagination("destroy");
        list_grns("");
    });

    $("#incoming_filter").on("click", display_filter);

    $("input#date_range").daterangepicker({
        autoUpdateInput: false,
    });

    $("input#date_range").on("apply.daterangepicker", function (ev, picker) {
        $(this).val(picker.startDate.format("YYYY/MM/DD") + " - " + picker.endDate.format("YYYY/MM/DD"));
    });
});

function user_page_access() {
    var role_list = $("#does_user_have_roles").html();
    if (role_list.indexOf("-47-") >= 0 || role_list.indexOf("-48-") >= 0 || role_list.indexOf("-49-") >= 0) {
        //Settings
        $("#main_display_loader_page").hide();
        $("#main_display").show();
        // var company_id = localStorage.getItem('company_id')
        list_grns("");
        fetch_pipelines();
    } else {
        $("#main_display").remove();
        $("#loader_mssg").html("You do not have access to this page");
        $("#ldnuy").hide();
        // $("#modal_no_access").modal('show');
    }
}

function fetch_pipelines() {
    $.ajax({
        type: "GET",
        dataType: "json",
        cache: false,
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        url: api_path + "crm/list_company_pipeline_stages",
        data: {
            company_id: localStorage.getItem("company_id"),
            user_id: localStorage.getItem("user_id"),
            limit: 1000000,
            page: 1,
        },

        success: function (response) {
            console.log(response);
            strTable = '<option value="">-- Select --</option>';
            if (response.data.status == "200") {
                if (response.data.data.length > 0) {
                    $.each(response.data.data, function (i, v) {
                        strTable += `<option name='${v.name}' value='${v.name}' data-value=${v.id}></option>`;
                    });

                    $("#options_status").html(strTable);
                } else {
                }
            } else {
            }
        },

        error: function (response) {
            $("#add").show();
            $("#item_loader").hide();
            $("#error").html("Connection Error.");
        },
    });
}

function display_filter() {
    $("#filter_display").toggle();
    $("#item_text").val("");
    $("#vendor_text").val("");
    $("#item_code").val("");
    $("#date_range").val("");
}

$(document).on("click", ".del_client", function () {
    var id = $(this)
        .attr("id")
        .replace(/del_client_/, "");

    console.log(id);

    if (confirm("Are you sure you want to delete")) {
        delete_lead(id);
    } else {
        return false;
    }
});

function delete_lead(id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: api_path + "crm/delete_lead",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        data: { lead_id: id },
        timeout: 60000, // sets timeout to one minute

        error: function (response) {
            alert("Error Deleting");
        },

        success: function (response) {
            console.log(response);

            if (response.data.status == "200") {
                console.log(`"#row_${id}`);
                $(`#row_${id}`).remove();
                // $("#for" + id).hide();
                // var box = parseFloat($("#hdwod").height()) + parseFloat($(".nav_menu").height()) - 120;
                // console.log(box);
                // var height_ = msg.length/2;
                // $(".right_col").css('height', parseFloat($("#hdwod").height()) + 250 + 'px');

                // var k = [id, msg]

                // return k;

                // send_to_mobile(id, msg);
            } else {
                alert("Error deleting post");
            }
        },
    });
}

function list_grns(page) {
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

    // alert(code+vendor_id+date_range+pay_status);

    var listObj = document.getElementById(`select_item`);
    console.log(listObj);
    console.log($("#select_item").val());

    if ($("#select_item").val()) {
        var datalist = document.getElementById(listObj.getAttribute("list"));
        var fa = datalist.options.namedItem(listObj.value);
        console.log(fa);

        var cus_id = fa.getAttribute("data-value");
        var cus = cus_id ? cus_id : "";
    }

    var listObj = document.getElementById(`select_item_name`);
    console.log(listObj);
    console.log($("#select_item_name").val());

    if ($("#select_item_name").val()) {
        var datalist = document.getElementById(listObj.getAttribute("list"));
        var fa = datalist.options.namedItem(listObj.value);
        console.log(fa);

        var lead_name_ = fa.getAttribute("data-value");
        var lead_val = lead_name_ ? lead_name_ : "";
    }

    var listObj = document.getElementById(`select_item_status`);
    console.log(listObj);
    console.log($("#select_item_status").val());

    if ($("#select_item_status").val()) {
        var datalist = document.getElementById(listObj.getAttribute("list"));
        var fa = datalist.options.namedItem(listObj.value);
        console.log(fa);

        var status_name_ = fa.getAttribute("data-value");
        var status_val = status_name_ ? status_name_ : "";
    }

    $("#loading").show();
    $("#incomingData").html("");

    $("html, body").animate({ scrollTop: 0 }, "slow");

    $.ajax({
        type: "GET",
        dataType: "json",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        url: api_path + "crm/list_of_leads",
        data: {
            lead_id: cus,
            lead_title: lead_val,
            lead_status: status_val,
            date_range: date_range,
            trashed: trashed,
            user_id: "self",
            page: page,
            limit: limit,
        },
        timeout: 60000,

        success: function (response) {
            console.log(response);

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
                            var lead_status = `<span class="badge-crm ull-left" style="font-weight: normal; background: #${
                                response["data"][i]["pipeline_color_code"] ? response["data"][i]["pipeline_color_code"] : "b5b5b5"
                            }; color: #fff"><b>${response["data"][i]["pipeline_name"]}</b></span>`;
                        }

                        if (response["data"][i]["del_status"] == "no") {
                            delete_btn = '<li class="del_this_grn"  id="del_this_grn_' + response["data"][i]["id"] + '"><a>Delete</a></li>';
                        } else if (response["data"][i]["del_status"] == "yes") {
                            undo_del_btn = '<li class="undo_del"  id="undo_del_grn_' + response["data"][i]["id"] + '"><a>Undo Delete</a></li>';
                            del_forv = '<li class="del_flva"  id="del_flva_' + response["data"][i]["id"] + '"><a>Delete Forever</a></li>';
                        }

                        // if(response['data'][i]['lead_status'] == "no"){

                        //     lead_status = '<span class="badge" style="background-color: orange">Inactive</span>';

                        // }else if(response['data'][i]['lead_status'] == "yes"){

                        //     lead_status = '<span class="badge" style="background-color: green">Active</span>';

                        // }

                        strTable += '<tr id="row_' + response["data"][i]["id"] + '">';
                        strTable += '<td id="batch_cod_tx_' + response["data"][i]["id"] + '">' + response["data"][i]["lead_name"] + "</td>";
                        strTable += "<td>" + response["data"][i]["lead_company"] + "</td>";

                        strTable += "<td>" + lead_status + "</td>";
                        strTable += "<td>" + response["data"][i]["date_inserted"].split(" ")[0] + "</td>";

                        strTable += '<td valign="top">';
                        strTable +=
                            '<div class="x_content" style="margin: 0px; padding: 0px"><a href="lead_info?id=' +
                            response["data"][i]["id"] +
                            '"class="btn btn-default btn-xs" type="button" aria-expanded="true">Details</a><span id="del_client_' +
                            v.id +
                            '" class="btn btn-default del_client btn-xs" type="button" >Delete</span></div>';
                        // strTable += '<ul role="menu" class="dropdown-menu  pull-right">    <li><a href="lead_info?id='+response['data'][i]['id']+'">Lead Info</a></li> <!--<li class="inc_payment_history"  id="in_p_' + response['data'][i]['id'] + '"><a>Lead Files</a></li>   <li><a href="lead_tasks_history">Lead Tasks</a></li>'+delete_btn+undo_del_btn+del_forv+ '-->   </ul></div>';

                        // <li class="dwnld_grn"  id="dwnld_grn_' + response['data'][i]['batch_id'] + '"><a>Download</a></li>
                        strTable +=
                            '<!-- <i  class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true" style="display: none;" id="loader11_' +
                            response["data"][i]["id"] +
                            '"></i> &nbsp;&nbsp; <a class="delete_receipt btn btn-danger btn-xs" style="cursor: pointer;" id="inc_' +
                            response["data"][i]["batch_id"] +
                            '"><i  class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Delete Receipt"></i> Delete</a> -->';

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
                    strTable = '<tr><td colspan="5">' + response.msg + "</td></tr>";
                }

                $("#pagination").twbsPagination({
                    totalPages: Math.ceil(response.total_rows / limit),
                    visiblePages: 10,
                    onPageClick: function (event, page) {
                        list_grns(page);
                    },
                });

                $("#incomingData").html(strTable);
                $("#incomingData").show();
                $("#loading").hide();
            } else if (response.data <= 0) {
                $("#loading").hide();

                strTable = '<tr><td colspan="5">' + response.msg + "</td></tr>";

                $("#incomingData").html(strTable);
                $("#incomingData").show();
            } else if (response.status == "400") {
                var strTable = "";
                $("#loading").hide();
                // alert(response.msg);
                strTable += "<tr>";
                strTable += '<td colspan="5">' + response.msg + "</td>";
                strTable += "</tr>";

                $("#incomingData").html(strTable);
                $("#incomingData").show();
            }
        },

        error: function (response) {
            var strTable = "";
            $("#loading").hide();
            strTable += "<tr>";
            strTable += '<td colspan="5"><strong class="text-danger">Connection error</strong></td>';
            strTable += "</tr>";

            $("#incomingData").html(strTable);
            $("#incomingData").show();
        },
    });
}

load_company("");
function load_company(page) {
    if (page == "") {
        var page = 1;
    }
    var limit = 200000000;

    var company_id = localStorage.getItem("company_id");

    var list_whs = "<option></option>";
    var list_name = "<option></option>";
    var list_status = "<option></option>";

    $.ajax({
        type: "GET",
        dataType: "json",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        url: api_path + "crm/list_of_leads",
        data: {
            company_id: company_id,
            page: page,
            limit: limit,
        },
        timeout: 60000,

        success: function (response) {
            var k = 1;
            console.log(response.data);
            $(response.data).each(function (i, v) {
                console.log("chk", `<option name=${v.lead_company} value=${v.lead_company} data-value=${v.lead_company}></option>`);
                list_whs += `<option name='${v.lead_company}' value='${v.lead_company}' data-value=${v.id}></option>`;
                list_name += `<option name='${v.lead_name}' value='${v.lead_name}' data-value=${v.id}></option>`;
            });
            $(`#options`).append(list_whs);
            $(`#options_name`).append(list_name);
        },
        error: function () {
            console.log(response);
        },
    });
}
function get_Item() {
    var listObj = document.getElementById("select_item");
    console.log(listObj);
    var datalist = document.getElementById(listObj.getAttribute("list"));
    console.log(datalist);

    var fa = datalist.options.namedItem(listObj.value);
    console.log(datalist.options.namedItem(listObj.getAttribute("data-value")));

    console.log(fa);
    console.log(fa.getAttribute("data"));
    if (fa.getAttribute("data")) {
        var sku = fa.getAttribute("data");
        $(`#holds_itms_id_${id}`).html(`SKU: ${sku}`);
        $(`#holds_itms_id_${id}`).show();
    } else {
        $(`#holds_itms_id_${id}`).hide();
    }
    // console.log(fa.html());

    var selected = fa.getAttribute("data-value");
    console.log(selected);

    // console.log($(`#select_item_items_${listid}`).val());
    // $("#myInput").val($('option[value='+this.value+']').data("text"))
    $(`#des_${id}`).val($("#select_item"));
}
