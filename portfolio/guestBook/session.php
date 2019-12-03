<?php
/*  Guestbook Session
    Original Author:    Paul Garton
    Last Modified by:   Paul Garton
    Creation Date:      12/01/2019
    Last Modified Date: 12/01/2019
    Filename:           session.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

// connection setup
$user = posix_getpwuid(posix_getuid());
$userDir = $user['dir'];
require ("$userDir/connect_grc.php");

session_start();  // Start Session
// Storing Session
// Store Session Data
$username = "admin";
$_SESSION['login_user']= $username;
$login_user=$_SESSION['login_user'];
$login_pw="@dm1n";

$login_user = mysqli_real_escape_string($cnxn,"$login_user");
$login_pw = mysqli_real_escape_string($cnxn,"$login_pw");

echo "<p>Login User: $login_user</p>";
$sql = "select username from login where username='$login_user' and password = '$login_pw'";
echo "<p>SQL for Query: $sql</p>";
//Send the query to the database
$result = mysqli_query($cnxn, $sql);
// var_dump($result);

//Process query results
while ($row = mysqli_fetch_assoc($result)) {
  $login_session = $row['username'];
}

if(!isset($login_session)){
  echo "<p>User $login_user does not exist</p>";
} else {
  // Store login_user to session
  echo "<p>login_session : $login_session</p>";
  $_SESSION['login_user']= $login_user;
}
