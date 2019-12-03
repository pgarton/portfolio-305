<?php
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

$user = posix_getpwuid(posix_getuid());
$userDir = $user['dir'];
require ("$userDir/connect.php");

// connect 2 was used to create changes locally
//require('connect2.php');

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <link rel="stylesheet" href="styles/form.css">
  <link rel="stylesheet" href="styles/validate.css">
  <title>Volunteer — iD.A.Y. Dream</title>
</head>
<body>

<!-- simple header taken from IDayDream.org -->  <!-- Elijah Edit -->
<header id="header">
    <div class="jumbotron text-center">
        <h1 class="display-4"> Register To Volunteer</h1>
    </div>
</header>
<!--Jumbotron Header-->


<!--Removing Placeholders DS-->


<div class="container align-items-center">

  <!-- New Background check on top of form -->

  <div class="text-center" id="background-check">
    <p id = "background-default">As an organization working with youth, a background check is necessary for volunteering</p>

    <p id = "background-denial">
      Because of our values as on organization and out of the safety of the youth"
      we serve it is a requirement that a background check must be submitted.You have chosen to decline.
      Thank you for your consideration in volunteering with iD.A.Y.dream, at this time we are unable to move forward with your
      submission.Please do visit us again!</p>

    <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bgCheck" id="bg-check-yes" value="1">
        <label class="form-check-label" for="bg-check-yes">YES</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="bgCheck" id="bg-check-no" value="0">
        <label class="form-check-label" for="bg-check-no">NO</label>
      </div>
      <p class="form-check-inline">I submit to a possible background check </p>
      <!--        not sure if you want the yes/no before or after text??-->
    </div>
  </div>

  <form action="confirmation.php" method="post" id="volunteerForm">  <!--Elijah Edit: Added id to form -->
    <fieldset class="form-group">
      <!--General Information Section-->
      <legend>General Information</legend>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="firstName">First Name *</label>
          <input type="text" class="form-control" id="firstName" placeholder="" name="firstName">
        </div>

        <!--Last Name of volunteer-->
        <div class="form-group col-md-6">
          <label for="lastName">Last Name *</label>
          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="">
        </div>
      </div>

      <!--Phone number of volunteer-->
      <div class="form-row">
        <div class="form-group col-md-6">
        <label for="homePhone">Home Phone *</label>

        <input type="tel" class="form-control" id="homePhone" name="homePhone" placeholder="(xxx)xxx-xxxx">

      </div>

        <!--Email of volunteer-->
        <div class="form-group col-md-6">
          <label for="email">Email *</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="">
        </div>
      </div>

      <!--Address of volunteer-->
      <div class="form-row">
      <div class="form-group col-md-9">
        <label for="streetAddress">Street Address *</label>
        <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="">
      </div>


      <div class="form-group col-md-3">
        <label for="apt">Apt/Other</label>
        <input type="text" class="form-control" id="apt" name="apt" placeholder="">
      </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="city">City </label>
          <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="form-group col-md-4">
          <label for="state">State</label>
          <select id="state" name="state" class="form-control">  <!-- Elijah Edit: Fixed the state dropdown to have a value for Washington-->
              <?php

              $sql = "SELECT * FROM states";
              $result = mysqli_query($cnxn, $sql);

              //processing resuslt
              while ($row = mysqli_fetch_assoc($result)){
                  $id = $row["code"];
                  $name = $row["name"];
                  if ($id =='WA'){
                      echo "<option value = '$id' selected>$name</option>";
                      }
                  else {
                      echo "<option value = '$id'>$name</option>";
                  }
              }
              ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="zipcode">Zip</label>
          <input type="text" class="form-control" id="zipcode" name="zipCode">
        </div>
      </div>

      <!--T-shirt size-->
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="t-shirt-size">T-Shirt Size (Adult Unisex) *</label>
          <select class="form-control" id="t-shirt-size" name="tShirtSize">
            <option value="none">Select a Size</option>
              <?php
              $sql = "SELECT * FROM shirt_sizes";
              $result = mysqli_query($cnxn, $sql);

              //processing resuslt
              while ($row = mysqli_fetch_assoc($result)){
                  $id = $row["id"];
                  $size = $row["size"];
                  echo "<option value = '$id'>$size</option>";
              }
              ?>

              //commenting out below to use database values instead
<!--            <option value="1">Extra Small</option>
            <option value="2">Small</option>
            <option value="3">Medium</option>
            <option value="4">Large</option>
            <option value="5">Extra Large</option>
            <option value="6">XXL</option>
-->          </select>
        </div>
      </div>
    </fieldset>

    <!--Availability Information-->
    <fieldset class="form-group">
      <legend>Availability</legend>
      <p class="form-group">Please select the following that best describes your available volunteer time(s)</p>

      <!--Only two availability options Weekends or Summer Camp One week per User Story-->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="availability[]" id="weekend-4" value="weekend">
        <label class="form-check-label" for="weekend-4">
          Weekends
        </label>
      </div>
      <!--Adding text box for user to enter specific times they are available-->
      <div id ="weekend-text-div" class="form-check-inline">
        <div class="form-group col-md-6">
          <label for="weekend-text">Weekends Selected. Please enter specific times, if available</label>
          <textarea class="form-control" id="weekend-text" name="weekendHours"
                    placeholder="" rows="3" cols="20">Friday:
Saturday:
Sunday:</textarea> <!--the weird spacing is needed to show these accurately within the textbox.-->
        </div>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="availability[]" id="one-week" value="weekend-8">
        <label class="form-check-label" for="one-week">
          Summer Camp (One Week)
        </label>
      </div>


      <!--Commenting just in case we want to bring this back. Changing to two options only, weekend and summer per user story see user stories
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="availability" id="weekend-4" value="weekend-4">
              <label class="form-check-label" for="weekend-4">
                Weekend Workshop (4-Hour)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="availability" id="weekend-8" value="weekend-8">
              <label class="form-check-label" for="weekend-8">
                Weekend Workshop (8-Hour)
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="availability" id="weekday" value="weekday">
              <label class="form-check-label" for="weekday">
                Weekday Workshop
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="availability" id="one-week" value="one-week">
              <label class="form-check-label" for="one-week">
                One-Week Summer Camp
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="availability" id="ongoing" value="ongoing">
              <label class="form-check-label" for="ongoing">
                Ongoing, Weekday Commitment
              </label>
            </div>
      -->
    </fieldset>

    <fieldset class="form-group">
      <legend>Roles/Interest</legend>
      <p class="form-group">Are there any specific roles you wish to fill?</p>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="roles[]" id="events" value="1">
        <label class="form-check-label" for="events">
          Events (College Tours, Community Service)
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="roles[]" id="fundraising" value="2">
        <label class="form-check-label" for="fundraising">
          Fundraising
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="roles[]" id="newsletter" value="3">
        <label class="form-check-label" for="newsletter">
          Newsletter Production (Monthly)
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="roles[]" id="coordination" value="4">
        <label class="form-check-label" for="coordination">
          Volunteer Coordination
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="roles[]" id="mentoring" value="5">
        <label class="form-check-label" for="mentoring">
          Mentoring
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input form-check-inline" type="checkbox" name="roles[]" id="other-interest" value="6">
        <label class="form-check-label form-check-inline" for="other-interest">
          Other
        </label>
      </div>
      <div id =other-text-roles class="form-check-inline">
        <div class="form-group col-md-6">
          <label for="other-text"></label>
          <input type="text" class="form-control" id="other-text" name="otherText" placeholder="Other selected. Please explain">
        </div>
      </div>
      <div id = "motivation" class="form-group text-left"> <!-- comment div -->
        <p></p>
        <label for="motivation-text">Why are you motivated to volunteer with us?*</label>
        <div class="form-row">
          <div class="form-group col-6">
            <textarea class="form-control" id="motivation-text" placeholder="" name ="motivation" rows="3" cols="20"></textarea>
          </div> <!-- col -->
        </div> <!-- row-->
      </div> <!-- comment div -->

    </fieldset>

    <fieldset class="form-group">
      <!--    Experience Set of Form         -->
      <legend>Experience</legend>
      <!--        Skills Interest-->
      <div class="form-group form-check form-check-inline">
        <label for="skills-interest">Special Skills or Interests?</label>
      </div>

      <div class="form-group form-check form-check-inline">
        <label class="form-check-label" for="skills-interest-cb">
          <input class="form-check-input" type="checkbox" name="experience[]" id="skills-interest-cb"
                 value="special-skills-interests"></label>
      </div>
      <div id = "skills-interest-comment" class="form-row">
        <div class="form-group col-6">
          <textarea class="form-control" id="skills-interest" name="skillsInterest" placeholder="Please Explain" rows="3" cols="20"></textarea>
        </div>
      </div>

      <!--                Youth Experience-->
      <div class="clearfix">
        <div class="form-group form-check form-check-inline">
          <label for="youth-exp">Youth Volunteer Experience?</label>
        </div>

        <div class="form-group form-check form-check-inline">
          <label class="form-check-label" for="youth-exp-cb">
            <input class="form-check-input" type="checkbox" name="experience[]" id="youth-exp-cb" value="youth-volunteer-exp"></label>
        </div>
      </div>
      <div id="youth-exp-comment" class="form-row">
        <div class="form-group col-6">
          <textarea class="form-control" id="youth-exp" name="youthExp" placeholder="Please Explain" rows="3" cols="20"></textarea>
        </div>
      </div>
      <!--                Non-Youth Experience-->
      <div class="clearfix">
        <div class="form-group form-check form-check-inline">
          <label for="youth-exp">Non-Youth Volunteer Experience?</label>
        </div>

        <div class="form-group form-check form-check-inline">
          <label class="form-check-label" for="non-youth-exp-cb">
            <input class="form-check-input" type="checkbox" name="experience[]" id="non-youth-exp-cb"
                   value="non-youth-volunteer"></label>
        </div>
      </div>
      <div id = "non-youth-exp-comment" class="row">
        <div class="form-group col-6">
          <textarea class="form-control" id="non-youth-exp" name="nonYouthExp" placeholder="Please Explain" rows="3" cols="20"></textarea>
        </div>
      </div>
    </fieldset>

    <!--Reference 1-->
    <fieldset class = "form-group">
      <legend>References</legend>
        <h5>1 of 3</h5>
        <!--        name-->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="ref1-name">Full Name *</label>
            <input type="text" class="form-control" id="ref1-name" name="ref1Name" placeholder="">
          </div>
          <!--            phone number-->
          <div class="form-group col-md-6">
            <label for="ref1-phone">Phone Number *</label>
            <input type="tel" class="form-control" id="ref1-phone" name="ref1Phone" placeholder="">
          </div>
        </div>
        <!--email-->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="ref1-email">Email *</label>
            <input type="email" class="form-control" id="ref1-email" name="ref1Email" placeholder="">
          </div>
          <!--            relationship-->
          <div class="form-group col-md-6">
            <label for="ref1-relationship">Relationship *</label>
            <input type="tel" class="form-control" id="ref1-relationship" name="ref1Relationship" placeholder="">
          </div>
        </div>
        <div class ="form-group">
        </div>

      <h5>2 of 3</h5>
        <!--        name-->
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="ref2-name">Full Name *</label>
          <input type="text" class="form-control" id="ref2-name" name="ref2Name" placeholder="">
        </div>
        <!--            phone number-->
        <div class="form-group col-md-6">
          <label for="ref2-phone">Phone Number *</label>
          <input type="tel" class="form-control" id="ref2-phone" name="ref2Phone" placeholder="">
        </div>
      </div>
      <!--email-->
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="ref2-email">Email *</label>
          <input type="email" class="form-control" id="ref2-email" name="ref2Email" placeholder="">
        </div>
        <!--            relationship-->
        <div class="form-group col-md-6">
          <label for="ref2-relationship">Relationship *</label>
          <input type="tel" class="form-control" id="ref2-relationship" name="ref2Relationship" placeholder="">
        </div>
      </div>
      <div class ="form-group">
      </div>

        <h5>3 of 3</h5>
        <!--        name-->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="ref3-name">Full Name *</label>
            <input type="text" class="form-control" id="ref3-name" name="ref3Name" placeholder="">
          </div>
          <!--            phone number-->
          <div class="form-group col-md-6">
            <label for="ref3-phone">Phone Number *</label>
            <input type="tel" class="form-control" id="ref3-phone" name="ref3Phone" placeholder="">
          </div>
        </div>
        <!--email-->
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="ref3-email">Email *</label>
            <input type="email" class="form-control" id="ref3-email" name="ref3Email" placeholder="">
          </div>
          <!--            relationship-->
          <div class="form-group col-md-6">
            <label for="ref3-relationship">Relationship *</label>
            <input type="tel" class="form-control" id="ref3-relationship" name="ref3Relationship" placeholder="">
          </div>
        </div>
        <div class ="form-group">
        </div>

      </fieldset>



    <fieldset class="form-group">
      <legend>Finishing Up</legend>
      <div class="form-row">
        <div class="form-group col-md-5">
          <label for="hear-about-us">How Did You Hear About Us?</label>
          <select class="form-control" id="hear-about-us" name="hearAboutUs">
            <option value="none">Please Select</option>
              <?php
              $sql = "SELECT * FROM lead_sources";
              $result = mysqli_query($cnxn, $sql);

              //processing resuslt
              while ($row = mysqli_fetch_assoc($result)){
                  $id = $row["id"];
                  $lead = $row["lead"];
                  echo "<option value = '$id'>$lead</option>";
              }
              ?>

              <!--commenting out to use database -->
<!--            <option value="word">Word of Mouth/Friend/Colleague</option>
            <option value="wed">Web/Social Media</option>
            <option value="print">Print (Flyer/Poster/Brochure</option>
            <option value="corporate">Corporate Sponsor</option>
            <option value="other">Other</option>
-->          </select>
          <div id ="other-hear-about-us" class="form-check-inline">
            <div class="form-group">
              <label for="other-hear-about-us-text"></label>
              <textarea class="form-control" id="other-hear-about-us-text" name="otherHearAboutUs" placeholder="Other selected. Please explain" rows="3" cols="20"></textarea>
            </div>
          </div>

        </div>
      </div>
      <label>Add to mailing list?</label>
      <div class = "form-row" id="mail">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="mailingList" id="mailing-list-yes" value="1" checked>
          <label class="form-check-label" for="mailing-list-yes">YES</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="mailingList" id="mailing-list-no" value="0">
          <label class="form-check-label" for="mailing-list-no">NO</label>
        </div>
      </div>
    </fieldset>

    <fieldset class ="form-group">
        <legend>Our Policy</legend>
        <p>It is the policy of this organization to provide equal opportunities without regard to race, color, religion, national origin, gender, sexual preference, age, or disability.</p>
    </fieldset>

    <fieldset class ="form-group">
      <legend>Agreement</legend>
      <p>By submitting this application, I certify that my statements in this application are true, complete and correct to the best of my knowledge. I further understand that as a part of the volunteer verification and matching process, additional personal information will be required of me. I hereby authorize iD.A.Y.dream to contact the references listed and to conduct a background check to determine if I will be a good fit as a volunteer for the organization. I understand that submitting this application does not guarantee my participation. I also hereby authorize iD.A.Y.dream without limitation, to copy, publish, exhibit or distribute photographs or video tapes of my volunteer activities for the purpose of promoting volunteerism and support. I release and hold harmless from liability any person or organization that provides information. I also agree to hold harmless iD.A.Y.dream and the officers and volunteers thereof.</p>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="policy" name="policy" value="1">
          <label class="form-check-label" for="policy">I agree to the Policy and Agreement above</label>
        </div>
      </div>
    </fieldset>

      <div class = "col text-center">
        <button id="submit" type="submit" class="btn btn-primary">
          Submit
        </button>
      </div>



  </form>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src ="js/form.js"></script>
<script src ="js/format.js"></script>
<script src ="js/validate.js"></script>



</body>
</html>
