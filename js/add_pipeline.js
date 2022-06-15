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


    $(document).on("click", "#add", function () {
        add_pipeline();
    });

});

function user_page_access(){

  var role_list = $("#does_user_have_roles").html();
  if (role_list.indexOf("-53-") >= 0) {
    
    //Settings
    $("#main_display_loader_page").hide();
    $("#main_display").show();
    

  }else{
    
    $("#main_display").remove();
    $("#loader_mssg").html("You do not have access to this page");
    $("#ldnuy").hide();
    // $("#modal_no_access").modal('show');

  }

}

function add_pipeline() {

    var pipeline_name = $.trim($("#stage_name").val());
    var the_desc = $.trim($("#stage_desc").val());
    var company_id = localStorage.getItem("company_id");
    var user_id = localStorage.getItem("user_id");
    var color_code = "#"+Math.floor(Math.random()*16777215).toString(16);

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

    $("#add").hide();
    $("#item_loader").show();

    $("#error").html("");

    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
         headers: {
                    'Authorization':localStorage.getItem('token'),
                },
        url: api_path + "crm/add_pipeline_stage",
        data: { pipeline_name: pipeline_name, the_desc: the_desc , color_code : color_code },

        success: function (response) {

            if (response.data.status == "200") {

                window.location.href = "pipeline_stages";

            } else if (response.data.status == "401") {

                $("#add").show();
                $("#item_loader").hide();
                $("#error").html(response.status.msg);

            }

        },

        error: function (response) {

            $("#add").show();
            $("#item_loader").hide();
            $("#error").html(response.status.msg);

        },
    });

}