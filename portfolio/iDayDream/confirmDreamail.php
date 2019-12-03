<?php
/*  iDayDream Youth Summary
    Original Author:    Elijah Maret
    Last Modified by:   Paul Garton
    Creation Date:      11/18/2019
    Last Modified Date: 11/26/2019
    Filename:           youthSummary.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
//var_dump($_POST);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Mass Email</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">
    <link rel="stylesheet" href="styles/confirmation.css">
</head>
<body>

<?php

$user = posix_getpwuid(posix_getuid());
$userDir = $user['dir'];
require ("$userDir/connect.php");

if (isset($_POST["dreamerMode"])) {
  $dreamers = $_POST['dreamerMode'];
} else {
  $dreamers = false;
}

if (isset($_POST["volunteerMode"])) {
  $volunteers = $_POST['volunteerMode'];
} else {
  $volunteers = false;
}

$subject = $_POST['emailSubject'];
$body = $_POST['emailBody'];
$isValid = true;
$finalSuccess = true;
$mode = '';

//echo "<p>Dreamers: $dreamers</p>";
//echo "<p>Volunteers: $volunteers</p>";

if ($dreamers == 'yes' && $volunteers == 'yes') {
  $mode = "ALL";
} elseif ($dreamers == 'yes') {
  $mode = "DREAMERS";
} elseif ($volunteers == 'yes') {
  $mode = "VOLUNTEERS";
} else {
  $isValid = false;
  $mode = "NONE";
}

//echo "<p>Mode: $mode About to Execute SQL</p>";

// echo $sql; //copy/paste into phpMyAdmin to test
if ($mode == "DREAMERS" OR $mode == "ALL") {
 // echo "<p>mode is DREAMERS</p>";
    $sql = "SELECT email, guardian_email FROM `v_youth` WHERE active = 1;";
    $result = mysqli_query($cnxn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
  //      echo "<p>$row</p>";
        $dreamer = $row['email'];
        $guardian = $row['guardian_email'];
        $dreamer = trim($dreamer);
        $guardian = trim($guardian);

        $to = "$dreamer, $guardian";
 //       echo "<p> $to </p>";

        $headers = "From: Emaret2@mail.greenriver.edu\r\n";
        $headers .= "Reply-To: Emaret2@mail.greenriver.edu \r\n";

        $success = mail($to, $subject, $body, $headers);
        if (!$success) {
            $finalSuccess = false;
            echo "<p> Email failed to send to $to";
        } else {
          echo "<p> Email successfully sent to: $to";
        }
    }
}
if ($mode == "VOLUNTEERS" OR $mode == "ALL"){
//  echo "<p>mode is VOLUNTEERS</p>";
    $sql = "SELECT email FROM `v_volunteers` WHERE active = 1;";
    $result = mysqli_query($cnxn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $volunteer = $row['email'];
        $volunteer = trim($volunteer);

        $to = "$volunteer";

        $headers = "From: Emaret2@mail.greenriver.edu\r\n";
        $headers .= "Reply-To: Emaret2@mail.greenriver.edu \r\n";

        $success = mail($to, $subject, $body, $headers);
        if (!$success) {
          $finalSuccess = false;
          echo "<p> Email failed to send to $to";
        } else {
          echo "<p> Email successfully sent to: $to";
        }
    }
}

if($finalSuccess){
    echo "<p>All emails have been sent</p>";
    echo "<br><br>";
    echo "<p><b><a href='index.html'>Return to Index</a></b></p>";
}
?>


</body>
</html>

