$(document).ready(function() {

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
    //end of interval set

    $('#incoming_filter').on('click', display_filter);

    $(document).on("click", "#filter", function () {
        $("#pagination").twbsPagination("destroy");
        list_of_clients("");
    });

});


function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-1-") >= 0 || role_list.indexOf("-2-") >= 0 || role_list.indexOf("-3-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    list_of_clients('');

  }else{
    
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}




function display_filter() {

    $('#filter_display').toggle();
    $('#item_text').val("");
    $('#vendor_text').val("");
    $('#item_code').val("");
    $('#date_range').val("");

}

function list_of_clients(page){

	var company_id = localStorage.getItem('company_id');
    if (page == "") {
        var page = 1;
    }
    var limit = 50;

    var lead_id = $('#vendor_text').val();
    var phone = $('#phone').val();
    var status = $('#pay_status').val();
    var trashed = $('#deleted_itms').val();

    // alert(code+vendor_id+date_range+pay_status);


     var listObj = document.getElementById(`select_item`);
            console.log(listObj);
            console.log($("#select_item").val())

            if ($("#select_item").val()) {
                var datalist = document.getElementById(listObj.getAttribute("list"));
                var fa = datalist.options.namedItem(listObj.value);
                console.log(fa)

                var cus_id = fa.getAttribute('data-value');
                var cus = cus_id ? cus_id : ""
            }

    $("#loading").show();
    $("#incomingData").html('');

    $("html, body").animate({ scrollTop: 0 }, "slow");

    $.ajax({

        type: "GET",
        dataType: "json",
        headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        url: api_path + "crm/list_of_clients",
        data: {
            "phone": phone,
            "code": lead_id,
            // "status": status,
            "client_id": cus,
            "status": status,
            "trashed": trashed,
            "page": page,
            "limit": limit
        },
        timeout: 60000,

        success: function(response) {

            console.log(response);

            var strTable = "";

            if (response.data.status == '200') {


                // $('#item_id').val('')
                if (response.data.data.length > 0) {

                    var k = 1;
                    $.each(response['data']['data'], function(i, v) {
                        
                        var delete_btn = "";
                        var del_forv = "";
                        var undo_del_btn = '';

                        // if(response['data']['data'][i]['del_status'] == "no"){

                        //     delete_btn = '<li class="del_this_grn"  id="del_this_grn_' + response['data']['data'][i]['id'] + '"><a>Delete</a></li>';
                            
                        // }else if(response['data']['data'][i]['del_status'] == "yes"){
                            
                        //     undo_del_btn = '<li class="undo_del"  id="undo_del_grn_' + response['data']['data'][i]['id'] + '"><a>Undo Delete</a></li>';
                        //     del_forv = '<li class="del_flva"  id="del_flva_' + response['data']['data'][i]['id'] + '"><a>Delete Forever</a></li>';

                        // }

                        if(response['data']['data'][i]['active_status'] == "active"){
                            console.log('iiii')
                            var active_status = '<span class="badge" style="background-color: green">' + response['data']['data'][i]['active_status'] + '</span>';
                        }else{
                            var active_status = '<span class="badge" style="background-color: orange">' + response['data']['data'][i]['active_status'] + '</span>';
                        }



                        strTable += '<tr id="row_' + response['data']['data'][i]['client_id'] + '">';
                        
                        // strTable += '<td id="batch_cod_tx_'+response['data']['data'][i]['client_id']+'">' + response['data']['data'][i]['company_name'] + '</td>';

                        // +response['data'][i]['Vendor']+
                        strTable += '<td>' + response['data']['data'][i]['company_name'] + '</td>';
                        strTable += '<td>' + response['data']['data'][i]['contacts_phone'] + '</td>';
                        // strTable += '<td style="text-align: ">' + response['data'][i]['email']+ '</td>';
                        strTable += '<td>'+active_status+'</td>';


                        strTable += '<td valign="top">';
                        // strTable += '<div class="x_content" style="margin: 0px; padding: 0px"><a href="client_page"><button type="button" class="btn btn-success btn-xs">Profile</button></a>';
                         // <a  href="client_page?id='+ response['data'][i]['id']+'"><li class="view_info"  id="in_'+ response['data'][i]['batch_id']+'">Client Profile</a></li></a>
                        strTable += '<div class="x_content" style="margin: 0px; padding: 0px"><a href="client_page?id='+ response['data']['data'][i]['client_id']+'" class="btn btn-default  btn-xs" type="button" >Details</a><span id="del_client_'+ v.client_id +'" class="btn btn-default del_client btn-xs" type="button" >Delete</span>';

                        strTable += '<ul role="menu" class="dropdown-menu  pull-right">    <a  href="client_page?id='+ response['data']['data'][i]['client_id']+'"><li class="view_info"  id="in_'+ response['data']['data'][i]['batch_id']+'">Client Profile</a></li></a>  <a  href="compose_email"><li class="view_info"  id="in_'+ response['data']['data'][i]['id']+'">Send Email</a></li></a> '+delete_btn+undo_del_btn+del_forv+ ' </ul></div>';

                        strTable += '<!-- <i  class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true" style="display: none;" id="loader11_' + response['data']['data'][i]['id'] + '"></i> &nbsp;&nbsp; <a class="delete_receipt btn btn-danger btn-xs" style="cursor: pointer;" id="inc_' + response['data']['data'][i]['id'] + '"><i  class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Delete Receipt"></i> Delete</a> -->';

                        strTable += '</td></tr>';

                        strTable += '<tr style="display: none;" id="loader_row_' + response['data']['data'][i]['batch_id'] + '">';
                        strTable += '<td colspan="6"><i class="fa fa-spinner fa-spin fa-fw fa-2x"  id="loading"></i>';
                        strTable += '</td>';
                        strTable += '</tr>';



                        strTable += '<tr id="tr_act_loader_'+response['data']['data'][i]['batch_id']+'" style="display: none"><td colspan="5"><i class="fa fa-spinner fa-spin fa-fw fa-1x" style="display: ;" id="filter_loader"></i>';
                        strTable += '<td></tr>';

                        k++;

                    });

                } else {

                    strTable = '<tr><td colspan="5">' + response.data.msg + '</td></tr>';

                }

                $('#pagination').twbsPagination({
                    totalPages: Math.ceil(response.data.total_rows / limit),
                    visiblePages: 10,
                    onPageClick: function(event, page) {
                        list_of_clients(page);
                    }
                });

                $("#incomingData").html(strTable);
                $("#incomingData").show();
                $('#loading').hide();

            } else if (response.data <= 0) {
                $('#loading').hide();

                strTable = '<tr><td colspan="5">' + response.data.msg + '</td></tr>';

                $("#incomingData").html(strTable);
                $("#incomingData").show();

            } else if (response.data.status == '400') {
                var strTable = "";
                $('#loading').hide();
                // alert(response.msg);
                strTable += '<tr>';
                strTable += '<td colspan="5">' + response.data.msg + '</td>';
                strTable += '</tr>';

                $("#incomingData").html(strTable);
                $("#incomingData").show();

            }

        },

        error: function(response) {
            var strTable = "";
            $('#loading').hide();
            // alert(response.msg);
            strTable += '<tr>';
            strTable += '<td colspan="6"><strong class="text-danger">Connection error</strong></td>';
            strTable += '</tr>';

            $("#incomingData").html(strTable);
            $("#incomingData").show();

        }

    });
}


$(document).on('click', '.del_client', function () {
            var id = $(this).attr("id").replace(/del_client_/, '');

            if (confirm("Are you sure you want to delete")) {
                delete_client(id);
            }else{
                return false;
            }
    
    })


   function delete_client(id) {
    
        $.ajax({
    
            type: "POST",
            dataType: "json",
            url: api_path + "crm/delete_client",
            headers: {
                        'Authorization':localStorage.getItem('token'),
            },
            data: { "client_id": id },
            timeout: 60000, // sets timeout to one minute
    
            error: function (response) {
                alert("Error Deleting");
            },
    
            success: function (response) {
                console.log(response);
    
                if (response.data.status == '200') {
                    console.log(`#row_${id}`)
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
    
            }
    
        });
    }

       load_company("")
        function load_company(page) {
            if (page == "") {
                var page = 1;
            }
            var limit = 20000000;

            var company_id = localStorage.getItem('company_id');


            var list_whs = "<option></option>";
            $.ajax({
                    type: "GET",
                    dataType: "json",
                     headers: {
                                'Authorization':localStorage.getItem('token'),
                            },
                    url: api_path + "crm/list_of_clients",
                    data: {
                        "company_id": company_id,
                        "page": page,
                        "limit": limit
                    },
                    timeout: 60000,


                success: function(response) {

                    var k = 1;
                    console.log(response.data)
                    $(response.data.data).each(function(i, v) {
                        console.log('chk',
                            `<option name=${v.company_name} value=${v.company_name} data-value=${v.company_name}></option>`
                        )
                        list_whs +=
                            `<option name='${v.company_name}' value='${v.company_name}' data-value=${v.client_id}></option>`;
                    })

                    $(`#options`).append(list_whs);
                },
                error: function() {
                    console.log(response);
                }

            });

        }
        function get_Item() {
            var listObj = document.getElementById("select_item");
            console.log(listObj);
            var datalist = document.getElementById(listObj.getAttribute("list"));
            console.log(datalist);

            var fa = datalist.options.namedItem(listObj.value);
            console.log(datalist.options.namedItem(listObj.getAttribute("data-value")))

            console.log(fa)
            console.log(fa.getAttribute("data"))
            if (fa.getAttribute("data")) {
                var sku = fa.getAttribute("data");
                $(`#holds_itms_id_${id}`).html(`SKU: ${sku}`);
                $(`#holds_itms_id_${id}`).show()
            } else {
                $(`#holds_itms_id_${id}`).hide()
            }
            // console.log(fa.html());

            var selected = fa.getAttribute('data-value');
            console.log(selected)

            // console.log($(`#select_item_items_${listid}`).val());
            // $("#myInput").val($('option[value='+this.value+']').data("text"))
            $(`#des_${id}`).val($("#select_item"));
        }

