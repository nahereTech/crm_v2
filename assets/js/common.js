function format_a_date(the_date){

	var monthNames = [

		"Jan", "Feb", "Mar",
		"Apr", "May", "Jun", "Jul",
		"August", "Sep", "Oct",
		"Nov", "Dec"

	];

	var d = new Date(the_date);
	var monthIndex = d.getMonth();
	var datestring = d.getDate()  + "/" +  monthNames[monthIndex] + "/" + d.getFullYear();

	return datestring;

}

function format_a_date_time(the_time){
	dateFormat(the_time, "mm/dd/yy, h:MM:ss TT");
}

function format_to_money(money){

	var output=parseInt(money).toLocaleString(undefined, {
											  minimumFractionDigits: 2,
											  maximumFractionDigits: 2
											}); 
	return output;

}

function remove_commas_from_number(number){
	 return number.replace(/,/g, '');
}

$(document).on("keypress keyup blur", ".allownumericwithdecimal", function (event) {
  
  //this.value = this.value.replace(/[^0-9\.]/g,'');
  $(this).val($(this).val().replace(/[^0-9\.]/g,''));
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
      event.preventDefault();
  }

});



$(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
   $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});


function validateEmail(emailaddress){  

	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  

	if(!emailReg.test(emailaddress)) {
		return false
	}else{
		return true;
	}

}

/* Helper function */
function download_file(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.target = '_blank';
        var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
        save.download = fileName || filename;
	       if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
				document.location = save.href; 
			// window event not working here
			}else{
		        var evt = new MouseEvent('click', {
		            'view': window,
		            'bubbles': true,
		            'cancelable': false
		        });
		        save.dispatchEvent(evt);
		        (window.URL || window.webkitURL).revokeObjectURL(save.href);
			}	
    }

    // for IE < 11
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}

function validateEmail(emailaddress){  

   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  

   if(!emailReg.test(emailaddress)) {  

        return false

   }else{

        return true;

   }

}


const MONTH_NAMES = [
  'January', 'February', 'March', 'April', 'May', 'June',
  'July', 'August', 'September', 'October', 'November', 'December'
];


function getFormattedDate(date, prefomattedDate = false, hideYear = false) {

  const day = date.getDate();
  const month = MONTH_NAMES[date.getMonth()];
  const year = date.getFullYear();
  const hours = date.getHours();
  let minutes = date.getMinutes();

  if (minutes < 10) {
    // Adding leading zero to minutes
    minutes = `0${ minutes }`;
  }

  if (prefomattedDate) {
    // Today at 10:20
    // Yesterday at 10:20
    return `${ prefomattedDate } @ ${ hours }:${ minutes }`;
  }

  if (hideYear) {
    // 10. January at 10:20
    return `${ day }. ${ month } @ ${ hours }:${ minutes }`;
  }

  // 10. January 2017. at 10:20
  return `${ day }. ${ month } ${ year }. @ ${ hours }:${ minutes }`;
}


// --- Main function
function timeAgo(dateParam) {

  if (!dateParam) {
    return null;
  }

  const date = typeof dateParam === 'object' ? dateParam : new Date(dateParam);
  const DAY_IN_MS = 86400000; // 24 * 60 * 60 * 1000
  const today = new Date();
  const yesterday = new Date(today - DAY_IN_MS);
  const seconds = Math.round((today - date) / 1000);
  const minutes = Math.round(seconds / 60);
  const isToday = today.toDateString() === date.toDateString();
  const isYesterday = yesterday.toDateString() === date.toDateString();
  const isThisYear = today.getFullYear() === date.getFullYear();


  if (seconds < 5) {
    return 'now';
  } else if (seconds < 60) {
    return `${ seconds } seconds ago`;
  } else if (seconds < 90) {
    return 'about a minute ago';
  } else if (minutes < 60) {
    return `${ minutes } minutes ago`;
  } else if (isToday) {
    return getFormattedDate(date, 'Today'); // Today at 10:20
  } else if (isYesterday) {
    return getFormattedDate(date, 'Yesterday'); // Yesterday at 10:20
  } else if (isThisYear) {
    return getFormattedDate(date, false, true); // 10. January at 10:20
  }

  return getFormattedDate(date); // 10. January 2017. at 10:20
}