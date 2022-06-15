$(document).ready(function () {
    var list_id;
    var company_id = localStorage.getItem("company_id");
    list_of_tasks("");

    $(document).on("click", "#filter", function () {
        $("#pagination").twbsPagination("destroy");
        list_of_tasks("");
    });

    $("#incoming_filter").on("click", display_filter);

    $("input#date_range").daterangepicker({
        autoUpdateInput: false,
    });

    $("input#date_range").on("apply.daterangepicker", function (ev, picker) {
        $(this).val(picker.startDate.format("YYYY/MM/DD") + " - " + picker.endDate.format("YYYY/MM/DD"));
    });

    $(document).on("click", ".incoming_info", function () {
        list_id = $(this).attr("id").replace(/in_/, "");
        fetch_incoming_info(list_id);
    });

    //inc_payment_history
    $(document).on("click", ".inc_payment_history", function () {
        list_id = $(this).attr("id").replace(/in_p_/, "");
        fetch_payment_history(list_id);
    });

    //add_payment_ph
    $(document).on("click", ".add_payment_ph", function () {
        // list_id = $(this).attr('id').replace(/in_p_/, '');
        add_payment_history_line();
    });

    $(document).on("click", ".delete_incoming", function () {
        var list_id = $(this).attr("id").replace(/inc_/, "");
        delete_incoming_item(list_id);
    });

    //cancladd_pm
    $(document).on("click", "#task_is_complete", function () {
        var id = $("#holds_task_id").html();
        mark_task_as_complete(id);
    });

    //send_in_new_payment
    $(document).on("click", "#send_in_new_payment", function () {
        send_in_new_payment();
    });

    //send_in_new_payment
    $(document).on("click", "#cancel_debt", function () {
        cancel_debt();
    });

    $(document).on("click", ".undo_del", function () {
        var id = $(this)
            .attr("id")
            .replace(/undo_del_grn_/, "");
        $("#hold_grnid_to_del2").html(id);
        $("#modal_delete_mdl_restore").modal("show");
    });

    $(document).on("click", ".dwnld_grn", function () {
        var id = $(this)
            .attr("id")
            .replace(/dwnld_grn_/, "");
        $("#modal_doing_dwnld").modal("show");
        create_download(id);
    });

    //mark_as_completed
    $(document).on("click", ".mark_task", function () {
        var id = $(this)
            .attr("id")
            .replace(/mac_id_/, "");
        $("#modal_mark_task").modal("show");
        $("#holds_task_id").html(id);

        //reset submit button and loader if it was clicked before
        $("#loading_poppp").hide();
        $("#pck_btns_993").show();
    });

    $(document).on("click", "#yes_undo_del_grn", function () {
        var id = $("#hold_grnid_to_del2").html();
        $("#tr_act_loader_" + id).show();
        $("#row_" + id).hide();
        $("#modal_delete_mdl_restore").modal("hide");

        yes_undo_delete_grn_now(id);
    });

    $(document).on("click", ".del_this_grn", function () {
        var id = $(this)
            .attr("id")
            .replace(/del_this_grn_/, "");
        $("#pck_btns").show();
        $("#deleting_grn_in_progress").hide();
        $("#hold_grnid_to_del").html(id);
        $("#modal_delete_mdl").modal("show");
    });

    $(document).on("click", "#yes_del_grn", function () {
        var id = $("#hold_grnid_to_del").html();
        $("#tr_act_loader_" + id).show();
        $("#row_" + id).hide();
        $("#modal_delete_mdl").modal("hide");

        yes_delete_grn_now(id);
    });

    $(document).on("click", ".del_hpay", function () {
        var grn_id = $(this)
            .attr("id")
            .replace(/del_hp_/, "");
        $("#row_lodda_" + grn_id).show();
        $("#row_pmh_" + grn_id).hide();
        $.ajax({
            type: "POST",
            dataType: "json",
            cache: false,
            url: api_path + "wms/del_payment_details",
            data: {
                row_id: grn_id,
                company_id: localStorage.getItem("company_id"),
            },

            success: function (response) {
                console.log(response);
                if (response.status == "200") {
                    $("#row_lodda_" + grn_id).hide();
                    var amount_deleting = remove_commas_from_number($("#pho_ln_" + grn_id).html());
                    var new_total_paid = parseFloat(remove_commas_from_number($("#ttlltt").html())) - parseFloat(amount_deleting); //get new total paid
                    $("#ttlltt").html(format_to_money(new_total_paid)); // insert new total paid

                    //bbllance
                    var new_balance_to_pay = parseFloat(remove_commas_from_number($("#bbllance").html())) + parseFloat(amount_deleting);
                    $("#bbllance").html(format_to_money(new_balance_to_pay));
                } else {
                    $("#row_lodda_" + grn_id).hide();
                    $("#row_pmh_" + grn_id).show();
                }
            },

            error: function (response) {
                console.log(response);
                $("#row_lodda_" + grn_id).hide();
                $("#row_pmh_" + grn_id).show();
            },
        });
    });

    $("#vendor_text").autocomplete({
        source: function (request, response) {
            // Fetch data
            console.log(response);
            $.ajax({
                url: api_path + "wms/vendors_autocomplete",
                type: "post",
                dataType: "json",
                data: {
                    term: request.term,
                    company_id: company_id,
                },
                success: function (data) {
                    response(data);
                    console.log(data);
                    console.log(company_id);
                    console.log(request.term);
                },
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

            $("#vendor_text").val(ui.item.label + " " + ui.item.id);
            return false;
        },
    });

    $(document).on("click", "#canccl_vdn", function () {
        $("#holds_vendor_name").val("");
        $("#holds_vendor_name").hide();
        $("#holds_vendor_id").html("");
        $("#vendor_text").show();
        $("#vendor_text").val("");
    });

    $("#item_text").autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: api_path + "wms/items_autocomplete",
                type: "post",
                dataType: "json",
                data: {
                    term: request.term,
                    company_id: company_id,
                },
                success: function (data) {
                    response(data);
                    console.log(data);
                },
            });
        },
        minLength: 2,
        select: function (event, ui) {
            console.log(ui.item.id);
            // Set selection
            $("#item_text").val(ui.item.label + " " + ui.item.id); // display the selected text
            // save selected id to input
            // $('#selct_itn_text').html(ui.item.label); // save selected id to input
            // $("#unit_type").val(ui.item.unit).trigger("change");
            return false;
        },
    });
});

function yes_undo_delete_grn_now(id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "wms/undo_deleted_grn",
        data: {
            batch_id: id,
            company_id: localStorage.getItem("company_id"),
        },

        success: function (response) {
            if (response.status == "200") {
                $("#row_" + id).hide();
                $("#tr_act_loader_" + id).hide();
            } else if (response.status == "400") {
                alert("Error deleting. Try again");
                $("#tr_act_loader_" + id).hide();
                $("#row_" + id).show();
            }
        },

        error: function (response) {
            $("#tr_act_loader_" + id).hide();
            $("#row_" + id).show();
            alert("Connection Error");
        },
    });
}

function mark_task_as_complete(id) {
    $("#loading_poppp").show();
    $("#pck_btns_993").hide();

    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "crm/mark_task",
        data: {
            task_id: id,
            company_id: localStorage.getItem("company_id"),
            status: "done",
        },

        success: function (response) {
            console.log(response);
            if (response.status == "200") {
                $("#modal_mark_task").modal("hide");
                $("#mac_id_" + id).remove();

                $("#icnn_" + id)
                    .removeClass("fa-exclamation-triangle")
                    .addClass("fa-check");

                $("#icnn_" + id).css("color", "green");
            } else if (response.status == "400") {
                $("#loading_poppp").hide();
                $("#pck_btns_993").show();
            }
        },

        error: function (response) {
            console.log(response);
            $("#loading_poppp").hide();
            $("#pck_btns_993").show();
        },
    });
}

function create_download(id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "wms/grn_batch_download",
        data: {
            batch_id: id,
            company_id: localStorage.getItem("company_id"),
        },

        success: function (response) {
            console.log(response);
            if (response.status == "200") {
                download_file(response.data.d_file, "GRN-" + id + ".pdf");
                $("#modal_doing_dwnld").modal("hide");
            } else if (response.status == "400") {
            }
        },

        error: function (response) {
            console.log(response);
        },
    });
}

function yes_delete_grn_now(id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "wms/grn_delete",
        data: {
            batch_id: id,
            company_id: localStorage.getItem("company_id"),
        },

        success: function (response) {
            if (response.status == "200") {
                $("#row_" + id).hide();
                $("#tr_act_loader_" + id).hide();
            } else if (response.status == "400") {
                alert("Error deleting. Try again");
                $("#tr_act_loader_" + id).hide();
                $("#row_" + id).show();
            }
        },

        error: function (response) {
            $("#tr_act_loader_" + id).hide();
            $("#row_" + id).show();
            alert("Connection Error");
        },
    });
}

function cancel_debt() {
    $("#cancel_debt").hide();
    $("#cancel_debt_loader").show();

    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "wms/grn_cancel_payment",
        data: {
            batch_id: $("#btch_id_ph").html(),
            company_id: localStorage.getItem("company_id"),
        },

        success: function (response) {
            console.log(response);

            if (response.status == "200") {
                $("#cancel_debt_loader").hide();
                //update to update

                $("#pmt_stuts").html('<span class="label label-success">Completed</span>');
            } else if (response.status == "400") {
                console.log(response);
                alert(response);
                $("#cancel_debt").show();
                $("#cancel_debt_loader").hide();
            }
        },

        error: function (response) {
            console.log(response);
            alert("Techincal Error");
            $("#cancel_debt").show();
            $("#cancel_debt_loader").hide();
        },
    });
}

function add_payment_history_line() {
    //do_add_pm - hide
    $("#do_add_pm").hide();

    //adding_new_pm - show
    $("#adding_new_pm").show();

    //date
    $("#payment_date_addn").datepicker({
        dateFormat: "yy-mm-dd",
    });

    var batch_id = $("#btch_id_ph").html();
}

function send_in_new_payment() {
    var blank;
    $(".add_req").each(function () {
        var the_val = $.trim($(this).val());

        if (the_val == "" || the_val == "0") {
            $(this).addClass("has-error");

            blank = "yes";
        } else {
            $(this).removeClass("has-error");
        }
    });

    if (blank == "yes") {
        // $("#error").html("You have a blank field");

        return;
    }

    $("#do_add_pm_loader").show();
    //adding_new_pm - show
    $("#adding_new_pm").hide();

    var batch_id = $("#btch_id_ph").html();
    var company_id = localStorage.getItem("company_id");
    var payment_date = $("#payment_date_addn").val();
    var amount_paid = $("#amount_paid_addn").val();

    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "wms/add_grn_payment_bal",
        data: {
            amt_paid: amount_paid,
            company_id: company_id,
            payment_date: payment_date,
            user_id: localStorage.getItem("user_id"),
            batch_id: batch_id,
        },

        success: function (response) {
            console.log(response);

            if (response.status == "200") {
                //$("#row_lodda_"+grn_id).show();
                //$("#row_pmh_"+grn_id).hide();

                var list_trs;
                list_trs +=
                    '<tr id="row_pmh_' +
                    response.last_inserted_id +
                    '" class="pmt_lst"><td>' +
                    format_a_date(payment_date) +
                    "</td><td>" +
                    format_to_money(amount_paid) +
                    '</td><td style="text-align: right"><i class="fa fa-times-circle fa-2x del_hpay" style="color: #fc9e99; cursor: pointer" id="del_hp_' +
                    response.last_inserted_id +
                    '"> </i></td></tr>';

                list_trs += '<tr id="row_lodda_' + response.last_inserted_id + '" style="display: none"><td colspan="100%"><i class="fa fa-spinner fa-spin fa-fw fa-1x"></td></tr>';

                $(".pmt_lst:last").after(list_trs);

                //update amount paid
                var new_amount_paid = parseFloat(remove_commas_from_number($("#ttlltt").html())) + parseFloat(amount_paid); //calculate new amount paid
                $("#ttlltt").html(format_to_money(new_amount_paid)); //insert new amount

                //update balance
                var new_balance = parseFloat(remove_commas_from_number($("#bbllance").html())) - parseFloat(amount_paid);
                $("#bbllance").html(format_to_money(new_balance));

                if (response.payment_status == "completed") {
                    var pmstus = '<span class="label label-success">Completed</span>';
                } else {
                    var pmstus = '<span class="label label-warning">Uncompleted</span>';
                }

                // alert(pmstus);

                $("#pmt_stuts").html(pmstus);
            } else if (response.status == "400") {
                alert(response.msg);
            }

            $("#do_add_pm_loader").hide();
            //adding_new_pm - show
            $("#adding_new_pm").hide();

            //show add link
            $("#do_add_pm").show();
        },

        error: function (response) {
            console.log(response);
            alert("Connection error. Please try again.");
            $("#do_add_pm_loader").hide();
            //adding_new_pm - show
            $("#adding_new_pm").hide();

            //show add link
            $("#do_add_pm").show();
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

function fetch_incoming_info(list_id) {
    var company_id = localStorage.getItem("company_id");

    $("#in_" + list_id).hide();
    $("#loader11_" + list_id).show();

    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "wms/grn_batch_details",
        data: {
            batch_id: list_id,
            company_id: company_id,
        },

        success: function (response) {
            console.log(response);

            $("#loader11_" + list_id).hide();
            $("#in_" + list_id).show();

            if (response.status == "200") {
                $("#modal_view_incoming #ivvv_fff").html(response.data.vendor);
                $("#modal_view_incoming #ivvv_dtt").html(format_a_date(response.data.date_recieved));
                $("#modal_view_incoming #btch_cddd").html(response.data.batch_code);

                var list_trs = "";
                var k = 1;
                $.each(response.data.items, function (i, v) {
                    list_trs +=
                        '<tr id="row_' +
                        v +
                        '"><td>' +
                        k +
                        "</td><td>" +
                        v.item_name +
                        '</td><td style="text-align: right">' +
                        format_to_money(v.qty) +
                        '</td><td style="text-align: right">' +
                        format_to_money(v.unit_cost) +
                        '</td><td style="text-align: right">' +
                        format_to_money(v.total_line_cost) +
                        "</td></tr>";

                    k++;
                });

                list_trs +=
                    '<tr id="row_"><td></td><td></td><td style="text-align: right"></td><td style="text-align: right"><b>TOTAL</b></td><td style="text-align: right"><b>' + format_to_money(response.data.batch_total) + "</b></td></tr>";

                $("#generateData").html(list_trs);

                $("#modal_view_incoming").modal("show");
            }
        },

        error: function (response) {
            $("#loader11_" + list_id).hide();
            $("#in_" + list_id).show();
            alert("Connection Error.");
        },
    });
}

function fetch_payment_history(list_id) {
    //hide these buttons
    $("#open_debt").hide();
    $("#cancel_debt").hide();

    $("#modal_view_payment_history").modal("show");
    $("#loading_ph").show();
    $("#generateData_ph").html("");
    var clicked_grn = $("#batch_cod_tx_" + list_id).html();
    $("#btch_cddd_ph").html(clicked_grn);
    $("#btch_id_ph").html(list_id);

    var company_id = localStorage.getItem("company_id");

    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        url: api_path + "wms/get_grn_payment_details",
        data: {
            grn_id: list_id,
            company_id: company_id,
        },

        success: function (response) {
            console.log(response);

            $("#loading_ph").hide();

            if (response.status == "200") {
                var list_trs = "";
                list_trs += '<tr id="ioi" class="pmt_lst" style="display: none"><td></td></tr>';

                if (response.data != undefined) {
                    var k = 1;
                    $.each(response.data.payment, function (i, v) {
                        if (response.payment_status == "uncompleted") {
                            var del_btn = '<i class="fa fa-times-circle fa-2x del_hpay" style="color: #fc9e99; cursor: pointer" id="del_hp_' + v.id + '"> </i>';
                        } else {
                            var del_btn = "";
                        }

                        list_trs +=
                            '<tr id="row_pmh_' +
                            v.id +
                            '" class="pmt_lst"><td>' +
                            format_a_date(v.payment_date) +
                            '</td><td id="pho_ln_' +
                            v.id +
                            '">' +
                            format_to_money(v.amount_paid) +
                            '</td><td style="text-align: right">' +
                            del_btn +
                            "</td></tr>";

                        list_trs += '<tr id="row_lodda_' + v.id + '" style="display: none"><td colspan="100%"><i class="fa fa-spinner fa-spin fa-fw fa-1x"></td></tr>';

                        k++;
                    });
                } else {
                    response.total_paid = 0.0;
                }

                if (response.payment_status == "completed" || response.payment_status == "uncompleted_and_closed") {
                    var hide_add_new_pay = "none";
                    var pmstus = '<span class="label label-success">Completed</span>';
                    $("#open_debt").show();
                } else {
                    var hide_add_new_pay = "";
                    var pmstus = '<span class="label label-warning">Uncompleted</span>';
                    $("#cancel_debt").show();
                }

                list_trs += '<tr id="do_add_pm" style="display: ' + hide_add_new_pay + '"><td colspan="100%"><span class="label label-default add_payment_ph" style="cursor: pointer">Add New Payment</span></td></tr>';
                list_trs +=
                    '<tr id="adding_new_pm" style="display: none"> <td><input type="text" class="form-control add_req" placeholder="Date" id="payment_date_addn"></td> <td><div class="input-group"><input type="text" class="form-control add_req allownumericwithdecimal" style="width: 55%" id="amount_paid_addn"><span class="input-group-btn" style="float: left"><button type="button" class="btn btn-primary" id="send_in_new_payment"> Add!</button></span></div></td> <td style="text-align: right"><i  class="fa fa-times-circle fa-2x"  data-toggle="tooltip" data-placement="top" id="cancladd_pm" style="color: #f79e94; cursor: pointer"></i></td></tr>';

                list_trs += '<tr id="do_add_pm_loader"  style="display: none;"><td colspan="100%"><i class="fa fa-spinner fa-spin fa-fw fa-3x"></td></tr>';

                list_trs +=
                    '<tr id="row_"><td style="text-align: right"></td><td style="text-align: right"><b>TOTAL PAID</b></td><td style="text-align: right"><b><span id="ttlltt">' + format_to_money(response.total_paid) + "</span></b></td></tr>";

                list_trs +=
                    '<tr id="row_"><td style="text-align: right"></td><td style="text-align: right"><b>BALANCE</b></td><td style="text-align: right"><b><span id="bbllance">' + format_to_money(response.balance) + "</span></b></td></tr>";

                list_trs +=
                    '<tr id="row_"><td style="text-align: right"></td><td style="text-align: right"><b>TOTAL COST</b></td><td style="text-align: right"><b><span id="bttcst">' +
                    format_to_money(response.batch_total) +
                    "</span></b></td></tr>";

                list_trs += '<tr id="row_"><td style="text-align: right"></td><td style="text-align: right"><b>STATUS</b></td><td style="text-align: right" id="pmt_stuts">' + pmstus + "</td></tr>";

                $("#generateData_ph").html(list_trs);
            } else {
                $("#generateData_ph").html('<tr><td colspan="100%">' + response.msg + "</td></tr>");
            }
        },

        error: function (response) {
            console.log(response);
            $("#loading_ph").hide();
            $("#generateData_ph").html('<tr><td colspan="100%">Connection Error. Please try again.</td></tr>');
        },
    });
}

function delete_incoming_item(list_id) {
    var company_id = localStorage.getItem("company_id");

    var ans = confirm("Are you sure you want to delete this item?");
    if (!ans) {
        return;
    }

    $("#row_" + list_id).hide();
    $("#loader_row_" + list_id).show();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: api_path + "wms/del_incoming_item",
        data: {
            company_id: company_id,
            list_id: list_id,
        },
        timeout: 60000, // sets timeout to one minute
        // objAJAXRequest, strError

        error: function (response) {
            $("#loader_row_" + list_id).hide();
            $("#row_" + list_id).show();

            alert("connection error");
        },

        success: function (response) {
            // console.log(response);
            if (response.status == "200") {
                // $('#row_'+user_id).hide();
            } else if (response.status == "401") {
            }

            $("#loader_row_" + list_id).hide();
        },
    });
}

load_lead("");
function load_lead(page) {
    if (page == "") {
        var page = 1;
    }
    var limit = 2000000000;

    var company_id = localStorage.getItem("company_id");

    var list_whs = "<option></option>";
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
            $(response.data.data).each(function (i, v) {
                console.log("chk", `<option name=${v.lead_company} value=${v.lead_company} data-value=${v.lead_company}></option>`);
                list_whs += `<option name='${v.lead_company}' value='${v.lead_company}' data-value=${v.id}></option>`;
            });

            $(`#options_leads`).append(list_whs);
        },
        error: function () {
            console.log(response);
        },
    });
}

load_task("");
function load_task(page) {
    if (page == "") {
        var page = 1;
    }
    var limit = 2000000000;

    var company_id = localStorage.getItem("company_id");

    var list_whs = "<option></option>";
    $.ajax({
        type: "GET",
        dataType: "json",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        url: api_path + "crm/list_of_tasks",
        data: {
            company_id: company_id,
            task_owners: "for_me_by_me",
            page: page,
            limit: limit,
        },
        timeout: 60000,

        success: function (response) {
            var k = 1;
            console.log(response.data);
            $(response.data.data).each(function (i, v) {
                list_whs += `<option name='${v.code}' value='${v.code}' data-value=${v.task_id}></option>`;
            });

            $(`#options_task`).append(list_whs);
        },
        error: function () {
            console.log(response);
        },
    });
}
// function get_Item_() {
//     var listObj = document.getElementById("select_item_leads");
//     console.log(listObj);
//     var datalist = document.getElementById(listObj.getAttribute("list"));
//     console.log(datalist);

//     var fa = datalist.options.namedItem(listObj.value);
//     console.log(datalist.options.namedItem(listObj.getAttribute("data-value")))

//     console.log(fa)
//     console.log(fa.getAttribute("data"))
//     if (fa.getAttribute("data")) {
//         var sku = fa.getAttribute("data");
//         $(`#holds_itms_id_${id}`).html(`SKU: ${sku}`);
//         $(`#holds_itms_id_${id}`).show()
//     } else {
//         $(`#holds_itms_id_${id}`).hide()
//     }
//     // console.log(fa.html());

//     var selected = fa.getAttribute('data-value');
//     console.log(selected)

//     // console.log($(`#select_item_items_${listid}`).val());
//     // $("#myInput").val($('option[value='+this.value+']').data("text"))
//     $(`#des_${id}`).val($("#select_item_leads"));
// }

load_company("");
function load_company(page) {
    if (page == "") {
        var page = 1;
    }
    var limit = 20;

    var company_id = localStorage.getItem("company_id");

    var list_whs = "<option></option>";
    $.ajax({
        type: "GET",
        dataType: "json",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        url: api_path + "crm/list_of_clients",
        data: {
            company_id: company_id,
            page: page,
            limit: limit,
        },
        timeout: 60000,

        success: function (response) {
            var k = 1;
            console.log(response.data);
            $(response.data.data).each(function (i, v) {
                console.log("chk", `<option name=${v.company_name} value=${v.company_name} data-value=${v.company_name}></option>`);
                list_whs += `<option name='${v.company_name}' value='${v.company_name}' data-value=${v.client_id}></option>`;
            });

            $(`#options`).append(list_whs);
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

function list_of_tasks(page) {
    var company_id = localStorage.getItem("company_id");
    var user_id = localStorage.getItem("user_id");
    if (page == "") {
        var page = 1;
    }
    var limit = 50;

    var task_code = $("#task_code").val();
    var task_text = $("#task_text").html();
    var task_by = $("#task_by").val();
    var task_for = $("#task_for").val();
    var date_range = $("#date_range").val();
    var project_id = $("#holds_vendor_id").html();
    var task_status = $("#task_status").val();
    var task_owners = $("#task_owners").val();

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

    var listObj = document.getElementById(`select_lead`);
    console.log(listObj);
    console.log($("#select_lead").val());

    if ($("#select_lead").val()) {
        var datalist = document.getElementById(listObj.getAttribute("list"));
        var fa = datalist.options.namedItem(listObj.value);
        console.log(fa);

        var lead_name_ = fa.getAttribute("data-value");
        var lead_task = lead_name_ ? lead_name_ : "";
    }

    var listObj = document.getElementById(`select_item_tasks`);
    console.log(listObj);
    console.log($("#select_item_tasks").val());

    if ($("#select_item_tasks").val()) {
        var datalist = document.getElementById(listObj.getAttribute("list"));
        var fa = datalist.options.namedItem(listObj.value);
        console.log(fa);

        var status_name_ = fa.getAttribute("data-value");
        var status_val = status_name_ ? status_name_ : "";
    }

    $("#loading_inc").show();
    $("#incomingData").html("");

    $("html, body").animate({ scrollTop: 0 }, "slow");

    $.ajax({
        type: "GET",
        dataType: "json",
        url: api_path + "crm/list_of_tasks",
        headers: {
            Authorization: localStorage.getItem("token"),
        },
        data: {
            company_id: cus,
            page: page,
            limit: limit,
            task_code: lead_task,
            task_text: task_text,
            task_by: task_by,
            date_range: date_range,
            task_for: task_for,
            // project_id: lead_val,
            task_status: task_status,
            task_owners: "for_me_by_me",
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

                        strTable += "<tr>";

                        strTable += "<td>" + v.code + "</td>";
                        strTable += "<td>" + format_a_date(v.date_created) + "</td>";
                        strTable += "<td>" + format_a_date(v.finished_date) + "</td>";
                        // strTable += "<td>" + v.name_of_creator + "</td>";

                        // strTable += "<td>" + v.task + "</td>";
                        strTable += "<td>" + v.task_for + " (" + v.task_from + ")</td>";

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

                $("#incomingData").html(strTable);
                $("#incomingData").show();
                $("#loading_inc").hide();
            } else if (response.status == "400") {
                var strTable = "";
                $("#loading_inc").hide();
                // alert(response.msg);
                strTable += "<tr>";
                strTable += '<td colspan="6">' + response.msg + "</td>";
                strTable += "</tr>";

                $("#incomingData").html(strTable);
                $("#incomingData").show();
                $("#loading_inc").hide();
            }
        },

        error: function (response) {
            var strTable = "";
            $("#loading").hide();
            // alert(response.msg);
            strTable += "<tr>";
            strTable += '<td colspan="6"><strong class="text-danger">Connection error</strong></td>';
            strTable += "</tr>";

            $("#incomingData").html(strTable);
            $("#incomingData").show();
            $("#loading_inc").hide();
        },
    });
}
