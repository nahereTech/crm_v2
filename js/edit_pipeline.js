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
    //end of interval set
    
    

    $(document).on("click", "#edit", function () {
        update_pipeline();
    });

});

function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-53-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    fetch_pipeline_details();

  }else{
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}


$(document).on('click', ".edit_basic_info", function(){
        $(".edit_basic_info_form").show();
        $(".non_editable").hide();
        $("#buttons_for_edit_company").show();
    });

$(document).on('click', "#cancel_update", function(){
    $(".edit_basic_info_form").hide();
    $(".non_editable").show();
    $("#buttons_for_edit_company").hide();
});


 $(document).on('click', ".edit_info", function(){
    $(".edit_info_form").toggle();
    $(".dont_edit").toggle();
    $("#buttons_for_edit").toggle();
});

$(document).on('click', "#cancel_details_update", function(){
    $(".edit_info_form").hide();
    $(".dont_edit").show();
    $("#buttons_for_edit").hide();
});


function fetch_pipeline_details(){

    var pipeline_id = $.urlParam('id');
    var company_id = localStorage.getItem("company_id");
    var user_id = localStorage.getItem("user_id");

    $.ajax({

        type: "GET",
        dataType: "json",
        cache: false,
         headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        url: api_path + "crm/fetch_pipeline_details",
        data: { company_id: company_id, user_id: user_id, pipeline_id: pipeline_id },

        success: function (response) {

            if (response.data.status == "200") {

                $("#stage_name").val(response.data.data.name);
                $("#stage_desc").val(response.data.data.stage_desc);
                $("#active_status").val(response.data.data.active_status);

                $("#stage_color_vall").html(response.data.data.color_code);
                $("#picker").val(response.data.data.color_code);

                

                 $("#stage_name_val").text(response.data.data.name);
                $("#stage_desc_val").text(response.data.data.stage_desc);
                $("#active_status_val").text(response.data.data.active_status =="yes" ? "Active" : "Inactive");

            } else if (response.status == "401") {

                $("#add").show();
                $("#item_loader").hide();
                $("#error").html(response.data.status.msg);

            }

        },

        error: function (response) {

            $("#add").show();
            $("#item_loader").hide();
            $("#error").html(response.status.msg);

        },

    });

}

 $('#picker').ColorPicker({
    onSubmit: function(hsb, hex, rgb, el) {
        $(el).val(hex);
        $(el).ColorPickerHide();
    },
    onBeforeShow: function () {
        $(this).ColorPickerSetColor(this.value);
    }
}).bind('keyup', function(){
    $(this).ColorPickerSetColor(this.value);
});

function update_pipeline() {

    var pipeline_name = $.trim($("#stage_name").val());
    var the_desc = $.trim($("#stage_desc").val());
    var company_id = localStorage.getItem("company_id");
    var user_id = localStorage.getItem("user_id");
    var pipeline_id = $.urlParam('id');
    var active_status = $("#active_status").val();

    var blank;

    $(".add_item_required").each(function () {
        var the_val = $.trim($(this).val());

        if (the_val == "" || the_val == "0") {
            $(this).addClass("has-error");

            blank = "yes";
        } else {
            $(this).removeClass("has-error");
        }
    });

    if (blank == "yes") {
        
        $("#error").html("You have a blank field");
        return;

    }

    $("#edit").hide();
    $("#loader__").show();

    $("#error").html("");

    $.ajax({

        type: "POST",
        dataType: "json",
        cache: false,
         headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        url: api_path + "crm/update_pipeline_stage",
        data: { 
            company_id: company_id, 
            pipeline_name: pipeline_name, 
            pipeline_name: pipeline_name, 
            color_code: $("#picker").val(),
            the_desc: the_desc, 
            pipeline_id  : pipeline_id, 
            active_status : active_status 
        },

        success: function (response) {

            if (response.data.status == "200") {

                // window.location.href = "pipeline_stages";
                location.reload()

            } else if (response.status == "401") {

                $("#edit").show();
                $("#loader__").hide();
                $("#error").html(response.status.msg);

            }

        },

        error: function (response) {

            $("#edit").show();
            $("#loader__").hide();
            $("#error").html(response.status.msg);

        },
    });

}