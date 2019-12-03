/*
iDayDream student form validation
Original Author:    Dallas Sloan
Last Modified by:   Paul Garton
Creation Date:      10/25/2019
Last Modified Date: 11/26/2019
Filename:           validate_welcome.js
*/


/*
As an iDayDream youth, I can complete a
Welcome form online so that the organization can get to know me.
    Acceptance criteria:
    -Given a youth member completing the signup form, when the required fields
    (marked with an asterisk) are not provided or are invalid, then they will see a friendly error message*/


let isValid;
//Dynamically Validating Form


//commenting out dynamic validation found some issues
$("#firstName").on("blur", function(){validateStandardInput("firstName")});
$("#lastName").on("blur", function(){validateStandardInput("lastName")});
$("#homePhone").on("blur", function(){validatePhone("homePhone")});
$("#email").on("blur", function(){validateEmail("email")});
$("#graduatingClass").on("click", function(){validateDropdown("graduatingClass")});
$("#birthdate").on("blur", function(){validateBirthdate()});
$("#gender").on("click", function(){validateDropdown("gender")});
$("#ethnicity").on("click", function(){validateDropdown("ethnicity")});

$("#guardianEmail").on("blur", function(){validateEmail("guardianEmail")});
$("#guardianName").on("blur", function(){validateStandardInput("guardianName")});
$("#guardianPhone").on("blur", function(){validatePhone("guardianPhone")});


// Formatting phone input

$("#homePhone").on("keyup", function() {
    formatPhone("#homePhone");
});

$("#guardianPhone").on("keyup", function() {
    formatPhone("#guardianPhone");
});

//validating the form on submission
$("#welcomeForm").on("submit", validate);



function validate() {
    isValid = true;
    validateStandardInput("firstName");
    validateStandardInput("lastName");
    validatePhone("homePhone");
    validateEmail("email");
    validateDropdown("graduatingClass");
    validateBirthdate();
    validateDropdown("gender");
    validateDropdown("ethnicity");

    validateStandardInput("guardianName");
    validateEmail("guardianEmail");
    validatePhone("guardianPhone");


    //end
    return isValid;


}


//creating functions

function validateStandardInput(id){
    let $item = $('#'+id);
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }

}

function validatePhone(id){
    let $num = $('#'+id);
    let $numVal = $num.val();
    // remove basic phone characters
    $numVal = $numVal.replace(" ", "");
    $numVal = $numVal.replace(/-/g, "");
    $numVal = $numVal.replace(/\(/g, "");
    $numVal = $numVal.replace(/\)/g,"");
    $numVal = $numVal.replace(/_/g, "");
    if($numVal.length != 10){
        $num.addClass("invalid");
        isValid = false;
    } else {
        $num.removeClass("invalid");
    }

}

function validateEmail(id) {
    let $email = $('#'+id);
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email.val())) {
        $email.removeClass("invalid");
    } else {
        $email.addClass("invalid");
        isValid = false;

    }
}

function validateDropdown(id){
    let $size = $('#'+id);
    if ($size.val() == "none") {
        $size.addClass("invalid");
        isValid = false;
    } else {
        $size.removeClass("invalid");
    }

}


function validateBirthdate(){
    let $dateOfBirth = $("#birthdate").val();

    console.log($dateOfBirth);

    let minDate = Date.parse("01/01/2000"); //Dreamers will be within this range
    let today = new Date();
    today = Date.parse(today);

    let DOB = Date.parse($dateOfBirth);
    console.log("Today: "+today);
    console.log("minDate: "+minDate);
    console.log("DOB: "+DOB);
    if (isNaN(DOB)||(DOB >= today || DOB <= minDate)) {
        $("#birthdate").addClass("invalid");
        isValid =  false;
    } else {
        $("#birthdate").removeClass("invalid");
    }

}


function formatPhone(id) { // auto-formats phone input
    // formats phone number
    console.log("formatting phone");
    let str = $(id).val();
    str = str.replace(/\D/g, "");

    if (str.length < 4) {
        // do nothing
    } else if (str.length < 7) {
        str = "(" + str.substring(0, 3) + ") " + str.substring(3, 6);
    } else {
        str = "(" + str.substring(0, 3) + ") " + str.substring(3, 6) + "-" + str.substring(6, 10);
    }

    $(id).val(str);
}






