// Adjusting the header to selection

$("#dreamerMode").on("click", function() { changeHeader() });
$("#volunteerMode").on("click", function() { changeHeader() });

function changeHeader(){
    let $item1 = $('#dreamerMode');
    let $item2 = $('#volunteerMode');
    let $head = $('#header');
    if($item1.prop("checked")){
        if($item2.prop("checked")){
            $head.html('Email to All')
            $item1.parent().parent().removeClass("invalid-checkbox");
        } else {
            $head.html('Email to Dreamers')
            $item1.parent().parent().removeClass("invalid-checkbox");
        }

    } else {
        if($item2.prop("checked")){
            $head.html('Email to Volunteers')
            $item1.parent().parent().removeClass("invalid-checkbox");
        } else {
            $head.html('Email to');
            $item1.parent().parent().addClass("invalid-checkbox");
            isValid = false;
        }

}
}







// Submittion

isValid = true;

$("#massEmail").on("submit", validate);


function validate(){
    isValid = true;
    validateStandardInput("emailSubject");
    validateStandardInput("emailBody");
    changeHeader();

    if(isValid){
        return finalValidate();
    }


    return false;

}


function finalValidate() {

    let message = 'You are sending this email to all active ';
    if ($('#dreamerMode').prop("checked")) {
        message += 'dreamers';
        if ($('#volunteerMode').prop("checked")) {
            message += ' and volunteers';
        }
    }

    else if ($('#volunteerMode').prop("checked")) {
        message += 'volunteers';
    } else {
        alert("No one is selected for mass email");
        return false;
    }

    message += ". \n Do you confirm?"

    return confirm(message);
}



function validateStandardInput(id){
    let $item = $('#'+id);
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }

}