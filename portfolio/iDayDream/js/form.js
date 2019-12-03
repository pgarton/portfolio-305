var $skillsInterestComment = $("#skills-interest-comment");
var $youthExpComment = $("#youth-exp-comment");
var $nonYouthExpComment = $("#non-youth-exp-comment");
var $otherTextRoles = $("#other-text-roles");
var $otherHearAboutUs = $("#other-hear-about-us");
var $weekendAvailability = $("#weekend-text-div");



$("#skills-interest-cb").change(function(){
    if($(this).is(":checked")) {
       $skillsInterestComment.css("display","block");
    }
    else
        $skillsInterestComment.css("display", "none");
});

$("#youth-exp-cb").change(function(){
    if($(this).is(":checked")) {
        $youthExpComment.css("display","block");
    }
    else
        $youthExpComment.css("display", "none");
});

$("#non-youth-exp-cb").change(function(){
    if($(this).is(":checked")) {
        $nonYouthExpComment.css("display","block");
    }
    else
        $nonYouthExpComment.css("display", "none");
});

/*
function showfield(name){
    var $otherInterest = $("#other-interest");

    if(name === "other-interest"){
        otherText.style.display = "block";
    }
    else{
        otherText.style.display = "none";
    }
}
*/

$("#other-interest").change(function(){
   if ($(this).is(":checked")){
       $otherTextRoles.css("display","block");
   }
   else
       $otherTextRoles.css("display","none");
});

//adding textbox to How did you hear about us, when "other" option is selected
$("#hear-about-us").change(function(){
   if ($(this).val() === "other"){
       $otherHearAboutUs.css("display","block");
   }
   else
       $otherHearAboutUs.css("display","none");
});

//adding textboxt for explanation if weekend is chosen
$("#weekend-4").change(function(){
   if ($(this).is(":checked")){
       $weekendAvailability.css("display","block");
   }
   else
       $weekendAvailability.css("display","none");
});


