
$("#homePhone").on("keyup", function() {
    formatPhone("#homePhone");
});

$("#ref1-phone").on("keyup", function(){
    formatPhone("#ref1-phone");
});
$("#ref2-phone").on("keyup", function(){
    formatPhone("#ref2-phone");
});
$("#ref3-phone").on("keyup", function(){
    formatPhone("#ref3-phone");
});

function formatPhone(id) {
    // formats phone number
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

