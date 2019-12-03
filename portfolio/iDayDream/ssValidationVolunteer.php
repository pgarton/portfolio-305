<?php
/**
 * iDayDream Volunteer Form Server Side validation
 * Original Author:    Dallas Sloan
 * Last Modified by:   Dallas Sloan
 * Creation Date:      11/10/2019
 * Last Modified Date: 11/10/2019
 *  Filename:          ssValidationVolunteer.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//creating valid variable
$isValidSSVolunteer = true;

//creating function to validate standard textboxes with only alpha characters
function validateStandardInputAlpha($id, $field){
    global $isValidSSVolunteer;
    if ( !empty($id)) {
        return;
    }
    else
        echo "<p>Valid $field must be entered"."\r\n</p>";
    $isValidSSVolunteer = false;
}

//validate textboxes with only numeric characters
function validateStandardInputNumeric($id, $field){
    global $isValidSSVolunteer;
    if (ctype_digit($id) && !empty($id)){
        return;
    }
    else
        echo "<p>Valid $field must be entered"."\r\n</p>";
    $isValidSSVolunteer = false;
}

//validate textboxes with mix of alpha and numeric characters
function validateStandardInputMixed($id, $field){
    global $isValidSSVolunteer;
    if (!empty($id)){
        return;
    }
    else
        echo "<p>Valid $field must be entered"."\r\n</p>";
    $isValidSSVolunteer = false;
}



// function to validate phone number
function validatePhone($id, $field){
    global $isValidSSVolunteer;
    //remove basic phone characters
    $id = str_replace(" ","",$id);
    $id = preg_replace('/-/',"",$id);
    $id = preg_replace('/\(/',"",$id);
    $id = preg_replace('/\)/',"",$id);
    $id = preg_replace('/_/',"",$id);
    //echo "<p>$id</p>"; for de-bugging purposes
    if (is_numeric($id) && strlen($id)===10){
        return;
    }
    else{
        echo "<p>Valid Phone Number must be entered for $field</p>";
        $isValidSSVolunteer = false;
    }
}

// validating email
function validateEmail($id, $field){
    global $isValidSSVolunteer;
    if (!empty($id) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',$id)){
        return;
    }
    else{
        echo "<p>Valid Email must be entered for $field</p>";
        $isValidSSVolunteer = false;

    }
}

//standard drop-down validation function
function validateDropdown($id, $field){
    global $isValidSSVolunteer;
    if ($id != "none") {
        return;
    } else {
        echo "<p>Please Select $field</p>";
        $isValidSSVolunteer = false;
    }
}

//standard checkbox validation
function validateCheckbox($id, $field){
    global $isValidSSVolunteer;
    if(isset($id)){
        return;
    } else {
        echo "<p>Please Select $field</p>";
        $isValidSSVolunteer = false;
    }
}


//calling validate functions to validate form

validateStandardInputAlpha($firstName, "First Name");
validateStandardInputAlpha($lastName, "Last Name");
validatePhone($homePhone, "Home Phone");
validateEmail($email, "Volunteer");
validateStandardInputMixed($streetAddress, "Street Address");
validateStandardInputAlpha($city, "City");
validateStandardInputNumeric($zipCode, "Zip Code");
validateDropdown($tShirtSize, "T-Shirt Size");
validateStandardInputMixed($motivation, "Motivation Explanation");
//validating reference 1
validateStandardInputAlpha($ref1Name, "Name for Reference 1 : $ref1Name");
validatePhone($ref1Phone, "for Reference 1");
validateEmail($ref1Email, "for Reference 1");
validateStandardInputAlpha($ref1Relationship,"Relationship to Reference 1");
//validating reference 2
validateStandardInputAlpha($ref2Name, "Name for Reference 2");
validatePhone($ref2Phone, "for Reference 2");
validateEmail($ref2Email, "for Reference 2");
validateStandardInputAlpha($ref2Relationship,"Relationship to Reference 2");
//validating reference 3
validateStandardInputAlpha($ref3Name, "Name for Reference 3");
validatePhone($ref3Phone, "for Reference 3");
validateEmail($ref3Email, "for Reference 3");
validateStandardInputAlpha($ref3Relationship,"Relationship to Reference 3");

validateCheckbox($policyAccepted,"response to Policy");

if (!$isValidSSVolunteer){
    Echo "<h3>Please Navigate Back to the Volunteer Form and Correct Any Errors Displayed Above</h3>";

}











