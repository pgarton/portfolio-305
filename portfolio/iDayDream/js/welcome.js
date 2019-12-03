/*
*
    iDayDream Youth Welcome Form javascript page
    Original Author:    Dallas Sloan
    Last Modified by:   Dallas Sloan
    Creation Date:      11/09/2019
    Last Modified Date: 11/09/2019
    Filename:           welcome.js


* */

var $otherEthnicity = $("#other-ethnicity-text");

//creating function to show textbox when "other" option is chosen within Ethnicity dropdown

$("#ethnicity").change(function(){
   if($(this).val() === "10"){
       $otherEthnicity.css("display", "block");
   }
   else{
       $otherEthnicity.css("display", "none");
   }

});