<?php
/**
 * iDayDream Youth Welcome Form Confirmation
 * Original Author:    Dallas Sloan
 * Last Modified by:   Paul Garton
 * Creation Date:      11/09/2019
 * Last Modified Date: 11/26/2019
 *  Filename:          ssValidationWelcome.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

// creating valid variable
$isValidSSWelcome=true;

//creating function to validate standard textboxes

function validateStandardInput($id, $field){
    global $isValidSSWelcome;
    if (ctype_alpha(str_replace(" ","",$id)) && !empty($id)){
        return;
    }
    else
        echo "<p>Valid $field must be entered"."\r\n</p>";
        $isValidSSWelcome = false;
}

// function to validate phone number

function validatePhone($id){
    global $isValidSSWelcome;
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
        echo "<p>Valid Phone Number must be entered</p>";
        $isValidSSWelcome = false;
    }
}

// validating email
function validateEmail($id){
    global $isValidSSWelcome;
    if (!empty($id) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',$id)){
        return;
    }
    else{
        echo "<p>Valid Email must be entered</p>";
        $isValidSSWelcome = false;

    }
}

//validating graduating class was chosen
function validateGraduatingClass($id){
    global $isValidSSWelcome;
    if ($id != "none"){
        return;
    }
    else{
        echo "<p>Please select a Graduating Class</p>";
        $isValidSSWelcome = false;

    }
}

//validating birthdate
function validateBirthdate($id){
    global $isValidSSWelcome;
    //complete once Elijah makes his change
    //echo "<p>$id</p>"; //for de-bugging purposes
    $year = substr("$id",0,4);
    //echo "Year: ".$year." "; //for de-bugging purposes
    $day = substr($id,8,2);
    //echo "Day: ". $day." "; //for de-bugging purposes
    $month = substr($id,5,2);
    //echo "Month: ".$month." "; //for de-bugging purposes

    if (checkdate((int)$month, (int)$day, (int)$year)){
        return;
    }
    else{
        echo "<p>Please enter Valid Birth Date</p>";
        $isValidSSWelcome = false;


    }
}

//validating gender was chosen
function validateGender($id){
    global $isValidSSWelcome;
    if (in_array($id, array(1,2,3,4))){
        return;
    }
    else{
        echo "<p>Please select a Gender</p>";
        $isValidSSWelcome = false;

    }
}

//validating ethnicity was chosen
function validateEthnicity($id){
    global $isValidSSWelcome;
    if (in_array($id, array(1,2,3,4,5,6,7,8,9,10,11))){
        return;
    }
    else{
        echo "<p>Please select an Ethnicity Option</p>";
        $isValidSSWelcome = false;

    }
}





validateStandardInput($firstName, "First Name");
validateStandardInput($lastName, "Last Name");
validatePhone($homePhone);
validateEmail($email);
validateGraduatingClass($graduatingClass);
validateBirthdate($birthdate);
validateGender($gender);
validateEthnicity($ethnicity);
validateStandardInput($guardianName, "Guardian Name");
validatePhone($guardianPhone, "Guardian Phone");
validateEmail($guardianEmail, "Guardian Email");

if (!$isValidSSWelcome){
    Echo "<h3>Please Navigate Back to Welcome Form and Correct Any Errors Displayed Above</h3>";

}
