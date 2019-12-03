<?php
/*  Guestbook Summary
    Original Author:    Paul Garton
    Last Modified by:   Paul Garton
    Creation Date:      11/27/2019
    Last Modified Date: 11/27/2019
    Filename:           admin.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['login_user'])){
  header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Guestbook Admin Summary</title>
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!--
  <link rel="stylesheet" href="styles/summary.css">
-->
</head>
<body>
  <?php

  // connection setup
  $user = posix_getpwuid(posix_getuid());
  $userDir = $user['dir'];
  require ("$userDir/connect_grc.php");  // 20191201

  //Define the query
  $sql = 'select  created, date(created) as date_added, first_name, last_name, title, linked_in, email, comment,
                case when add_to_mailing_list > 0 then "Yes" else "No" end as mailing_list, format, how_we_met, meetup_other
            from entries;';

 // echo "<p>SQL for Query: $sql</p>";

  //Send the query to the database
  $result = mysqli_query($cnxn, $sql);
  // var_dump($result);
  ?>
  <h3>Admin Summary : Entries</h3>
  <div class="contain">
  <table id="entries-table" class="display">
    <thead>
    <tr>
      <th>Date Added</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Title</th>
      <th>LinkedIn</th>
      <th>Email</th>
      <th>Comment</th>
      <th>add_to_mailing_list</th>
      <th>Format</th>
      <th>how_we_met</th>
      <th>meetup_other</th>
    </tr>
    </thead>
    <tbody>

    <?php
    //Print the results
    while ($row = mysqli_fetch_assoc($result)) {
      $dateAdded = $row['date_added'];
      $firstName = $row['first_name'];
      $lastName = $row['last_name'];
      $title = $row['title'];
      $linkedIn = $row['linked_in'];
      $email = $row['email'];
      $comment = $row['comment'];
      $format = $row['format'];
      $howMet = $row['how_we_met'];
      $meetupOther = $row['meetup_other'];
      $format = $row['format'];
      $mailingList = $row['mailing_list'];

      echo "<tr>
                <td>$dateAdded</td>
                <td>$firstName</td>
                <td>$lastName</td>
                <td>$title</td>
                <td>$linkedIn</td>
                <td>$email</td>
                <td>$comment</td>
                <td>$mailingList</td>
                <td>$format</td>
                <td>$howMet</td>
                <td>$meetupOther</td>
              </tr>";
    }
    ?>


    </tbody>
  </table>
  <br>
  <a id = "add" href="guestbook.html">Add a new guestbook entry</a>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $('#entries-table').DataTable({
        "order": [[ 0, "desc" ]]
    }) ;
</script>

</body>
</html>

