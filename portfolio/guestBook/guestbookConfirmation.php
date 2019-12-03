
<?php
/**
 * Guest Book
 * Original Author:    Paul Garton
 * Last Modified by:   Paul Garton
 * Creation Date:      10/12/2019
 * Last Modified Date: 12/01/2019
 *  Filename:          guestbookConfirmation.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
// print_r($_POST);

// connection setup
$user = posix_getpwuid(posix_getuid());
$userDir = $user['dir'];
require ("$userDir/connect_grc.php");  // 20191201

// global passes validation
$isValid=true;
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$emailAddress = trim($_POST['emailAddress']);
$mailingList = isset($_POST['mailingList']);
$linkedIn = trim($_POST['linkedIn']);
$howMeet = trim($_POST['howMeet']);
$title = trim($_POST['title']);
$company = trim($_POST['company']);
$comment = trim($_POST['comment']);
$otherInfo = trim($_POST['otherInfo']);
$format = trim($_POST['format']);


function populated($key, $val, $required) {
  global $isValid;
  if (strlen($val)  > 0)
    return true;
  else if ($required) {
    echo "<p> $key cannot be NULL"."\r\n</p>";
    $isValid = false;
    return false;
  }
  else {
    return false;
  }
}
//textbox not null alpha
function validateStandardInput($key, $val, $required){
  global $isValid;
  $populated = populated($key, $val, $required);
  if ($populated && (! preg_match("/^[A-Za-z]*$/", $val))) {
    echo "<p> $val is not a valid $key" . "\r\n</p>";
    $isValid = false;
  }
}

function validateEmail($key, $val){
  global $isValid;
  $populated = populated($key, $val, false);
  if ($populated && ! preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',$val)) {
    echo "<p> $val is not a valid $key" . "\r\n</p>";
    $isValid = false;
  }
}

function validateLinkedIn($key, $val){
  global $isValid;
  $populated = populated($key, $val, false);
  // below borrowed from https://stackoverflow.com/questions/8450403/how-to-validate-a-linkedin-public-profile-url#19289494https://stackoverflow.com/questions/8450403/how-to-validate-a-linkedin-public-profile-url#19289494
  if ($populated && ! preg_match("^(http(s)?:\/\/)?([\w]+\.)?linkedin\.com\/(pub|in|profile)^",$val)) {
    echo "<p> $val is not a valid $key" . "\r\n</p>";
    $isValid = false;
  }
}

function howMeet($key, $val){
  global $isValid;
  global $howMeet;
  $hmValues = array("meetup", "jobFair", "other", "notYet");
  $inHM = in_array($val, $hmValues);
  $populated = ($howMeet != 'none');
  if (!($populated && $inHM)) {
    $isValid = false;
    echo "<p>$val is not a valid $key </p>";
  }
}

function ifMailingThenEmail($key, $val) {
  global $isValid;
  global $mailingList;
  $populated = populated($key, $val, false);
  if ($mailingList & !$populated) {
    echo "<p> $key must be valid when Mailing List checked" . "\r\n</p>";
    $isValid = false;
  }
}
validateStandardInput("First Name", $firstName, true);
validateStandardInput("Last Name", $lastName, true);
validateEmail("Email Address", $emailAddress);
ifMailingThenEmail("Email Address", $emailAddress);
validateLinkedIn("LinkedIn", $linkedIn);
howMeet("How Met", $howMeet);


if ($isValid === true) {
  echo "<h1>Guest Book Entry Confirmed</h1>";
  echo "<p>First Name:<b> $firstName</b></p>";
  echo "<p>Last Name:<b> $lastName</b></p>";
  echo "<p>Title:<b> $title</b></p>";
  echo "<p>Company:<b> $company</b></p>";
  echo "<p>LinkedIn:<b> $linkedIn</b></p>";
  echo "<p>Email:<b> $emailAddress</b></p>";
  echo "<p>Comment:<b> $comment</b></p>";
  if ($mailingList) {
    echo "<p>Add to mailing list</p>";
  } else {
    echo "<p>Not added to mailing list</p>";
  }
  echo "<p>Format: <b>$format</b></p>";
  echo "<p>How we met:<b> $howMeet</b></p>";
  if ($howMeet === "other") {
    echo "<p>Other meetup info:<b> $otherInfo</b></p>";
  }

  $firstName = mysqli_real_escape_string($cnxn, "$firstName");
  $lastName = mysqli_real_escape_string($cnxn, "$lastName");
  $emailAddress = mysqli_real_escape_string($cnxn, "$emailAddress");
  $mailingList = mysqli_real_escape_string($cnxn, "$mailingList");
  $linkedIn = mysqli_real_escape_string($cnxn, "$linkedIn");
  $howMeet = mysqli_real_escape_string($cnxn, "$howMeet");
  $title = mysqli_real_escape_string($cnxn, "$title");
  $company = mysqli_real_escape_string($cnxn, "$company");
  $comment = mysqli_real_escape_string($cnxn, "$comment");
  $otherInfo = mysqli_real_escape_string($cnxn, "$otherInfo");
  $format = mysqli_real_escape_string($cnxn, "$format");
  // insert into the database
  $sql = "insert into entries (first_name, last_name, title, linked_in, email, comment, add_to_mailing_list, format,
  	how_we_met, meetup_other)
  values ('$firstName', '$lastName', '$title', '$linkedIn', '$emailAddress', '$comment', '$mailingList', '$format', '$howMeet', '$otherInfo');";
 // echo "<p>$sql</p>";
  $result = mysqli_query($cnxn, $sql);
  if ($result)
    echo "<h3>Thank you for completing this Guestbook entry.</h3>";
} else {
  echo "<h1>Use back key and fix input</h1>";
}
