<?php
/*  iDayDream Mass Email
    Original Author:    Elijah Maret
    Last Modified by:   Elijah Maret
    Creation Date:      11/18/2019
    Last Modified Date: 11/22/2019
    Filename:           dreamail.php
*/
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dreamail</title>

    <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">


    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/validate.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/dreamail.css">

</head>
<body>
<?php
$mode = $_GET['source'];
echo "<h1 id ='header'>Email to $mode </h1>";

echo "";

?>
<form id="massEmail" action ='confirmDreamail.php' method='post'>
<fieldset class="form-group">
    <p>Mass Email To:</p>

    <div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="dreamerMode" id="dreamerMode" value="yes" <?php if ($mode == 'dreamers') { echo 'checked';} ?> >
            <label class="form-check-label" for="dreamerMode">
                Dreamers
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="volunteerMode" id="volunteerMode" value="yes"<?php if ($mode == 'volunteers') { echo 'checked';} ?> >
            <label class="form-check-label" for="volunteerMode">
                Volunteers
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Subject</label>
        <input type="text" class="form-control" id="emailSubject" name="emailSubject" placeholder="">
    </div>

    <div class="form-group">
        <label for="email">Message</label>
        <textarea class="form-control" id="emailBody" name="emailBody" placeholder="Hello, <?php echo $mode?>." rows="3" cols="20"></textarea>
    </div>
</fieldset>

<div class = "col text-center">
    <button id="submit" type="submit" class="btn btn-primary">
        Send Email
    </button>
</div>
</form>








<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src ="js/form.js"></script>
<script src = "js/dreamail.js"></script>


</body>
</html>