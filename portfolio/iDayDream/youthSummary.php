<?php
/*  iDayDream Youth Summary
    Original Author:    Paul Garton
    Last Modified by:   Paul Garton
    Creation Date:      11/10/2019
    Last Modified Date: 11/25/2019
    Filename:           youthSummary.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

// print_r($_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iDayDream Dreamer Summary</title>

  <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">


  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="styles/summary.css">
  <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
<body>

<script>document.body.style.display = "none";</script>
<h3>Dreamer Summary</h3>
<div class="contain">


  <?php
  $user = posix_getpwuid(posix_getuid());
  $userDir = $user['dir'];
  require ("$userDir/connect.php");

  //Define the query
  $sql = 'select dreamer_id, first_name, last_name, home_phone, email, graduating_class, college_of_interest,
            career_aspirations, food_snacks, date_of_birth, gender, ethnicity_all, guardian_full_name,
            guardian_phone, guardian_email
          from v_dreamers
          where active = 1;';
  //Send the query to the database
  $result = mysqli_query($cnxn, $sql);
  //var_dump($result);
  ?>

  <table id="dreamer-table" class="display">
    <thead>
    <tr>
      <th>Dreamer ID</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Home Phone</th>
      <th>Email</th>
      <th>Class</th>
      <th>College</th>
      <th>Aspirations</th>
      <th>Snack</th>
      <th>DOB</th>
      <th>Gender</th>
      <th>Ethnicity</th>
      <th>Guardian</th>
      <th>Guardian Phone</th>
      <th>Guardian Email</th>
    </tr>
    </thead>
    <tbody>

    <?php
    //Print the results
    while ($row = mysqli_fetch_assoc($result)) {
      $dreamerID = $row['dreamer_id'];
      $firstName = $row['first_name'];
      $lastName = $row['last_name'];
      $homePhone = $row['home_phone'];
      $email = $row['email'];
      $graduatingClass = $row['graduating_class'];
      $collegeOfInterest = $row['college_of_interest'];
      $careerAspirations = $row['career_aspirations'];
      $foodSnacks = $row['food_snacks'];
      $dateOfBirth = $row['date_of_birth'];
      $gender = $row['gender'];
      $ethnicityAll = $row['ethnicity_all'];
      $guardianFullName = $row['guardian_full_name'];
      $guardianPhone = $row['guardian_phone'];
      $guardianEmail = $row['guardian_email'];
      echo "<tr>
                <td>$dreamerID</td>
                <td>$lastName</td>
                <td>$firstName</td>
                <td>$homePhone</td>
                <td>$email</td>
                <td>$graduatingClass</td>
                <td>$collegeOfInterest</td>
                <td>$careerAspirations</td>
                <td>$foodSnacks</td>
                <td>$dateOfBirth</td>
                <td>$gender</td>
                <td>$ethnicityAll</td>
                <td>$guardianFullName</td>
                <td>$guardianPhone</td>
                <td>$guardianEmail</td>
              </tr>";
    }
    ?>

    </tbody>
  </table>

  <a id = "add" href="welcome.html">Add a new Dreamer</a>
    <a id = "toMail" href="dreamail.php?source=dreamers">Mass Email to Dreamers</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        document.body.style.display = "block";
        var DTable = $('#dreamer-table');
        DTable.DataTable( {
            "order": [[ 0, 'desc' ]],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return 'Details for Name: '+data[2] + ' ' +data[1];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                }
            }
        } );
    } );
</script>

</body>
</html>
