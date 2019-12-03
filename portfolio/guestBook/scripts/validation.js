
let $validLastName = false;
let $validFirstName = false;
let $validEmail = false;
let $validMailingList = true;
let $validLI = true;
let $validMeet = false;

let $mf = document.getElementById("formatting");
let $otr = document.getElementById("otherInfo");
$mf.style.display = "none";
$otr.style.display = "none";

// create listeners on entry and exit for every input field
let inputField = document.querySelectorAll('input,textarea');
for (let i = 0; i < inputField.length; i++) {
  let $ipField = inputField[i];
  console.log($ipField);
//  if (($ipField.type == "text")  || ($ipField.tagName == 'TEXTAREA')) {
  if (['firstName','lastName'].indexOf($ipField.name) >= 0) {
      inputField[i].addEventListener('blur', exitField, false);
  }
}

document.getElementById("Email Address").addEventListener('blur', exitEmail, false);
document.getElementById("linkedIn").addEventListener('blur', exitLI, false);
document.getElementById("linkedIn").addEventListener('blur', exitLI, false);
document.getElementById("mailingList").addEventListener('click', reqEmail, false);
document.getElementById("howMeet").addEventListener('change', reqMeet, false);
document.getElementById("howMeet").addEventListener('blur', reqMeet, false);



$('#guestbook-form').submit(function() {
  document.getElementById("First Name").focus();
  document.getElementById("Last Name").focus();
  document.getElementById("howMeet").click();
  document.getElementById("Title").focus();
  if (($validLastName && $validFirstName && $validMeet) == false)
    return false;
  else
    return true;
});

function reqMeet() {
  let $hm = document.getElementById("howMeet");
  let $lhm = document.getElementById("lHowMeet");
  $otr = document.getElementById("otherInfo");

  if ($hm.value == "none") {
    $lhm.innerText = "How did we meet? : Required";
    $lhm.style.color = "red";
    $validMeet = false;
  }
  else {
    $lhm.innerText = "How did we meet?";
    $lhm.style.color = "dark-green";
    $validMeet = true;
    console.log("How Meet: " + $hm.value);
  }
  if ($hm.value == "other") {
    $otr.style.display = "block";
    $lhm.innerText = "How did we meet?";
    $lhm.style.color = "dark-green";
  } else {
    $otr.style.display = "none";
  }
}

function reqEmail() {
  let $docID = document.getElementById("mailingList");
  let $lblID = document.getElementById("lbl_mailingList");
  console.log("mailing list clicked");
  console.log($docID.checked);
  $validMailingList = false;

  if ($docID.checked == true) {
    console.log("validMailingList false");
//    exitEmail();
    $mf.style.display = "block";



    if ($validEmail == true) {
      $lblID.innerText = "Mailing List";
      $lblID.style.color = "black";
      $lblID.fontWeight = "normal";
      $validMailingList = true;
    } else {
      $lblID.innerText = "Mailing List : Requires Valid Email";
      $lblID.style.color = "red";
      $lblID.style.fontWeight = "bold";
    }
  } else
    {
      $mf.style.display = "none";
    $lblID.innerText = "Mailing List";
    $lblID.style.color = "black";
    $lblID.style.fontWeight = "normal";
    $validMailingList = true;
  }
}

// source: https://www.tutorialspoint.com/How-to-validate-URL-address-in-JavaScript
function exitLI() {

  let $eValue = document.getElementById("linkedIn").value;
  let $liLabel = document.getElementById("lbl_linkedIn");
  let $pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ //port
    '(\\?[;&amp;a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i');
  if ((!$pattern.test($eValue)) && ($eValue.length > 0)) {
    $validLI = false
    $liLabel.innerText = "linkedIn : Invalid";
    $liLabel.style.color = "red";
    $liLabel.style.fontWeight = "bold";
  } else {
    $validLI = true
    $liLabel.innerText = "linkedIn";
    $liLabel.style.color = "black";
    $liLabel.style.fontWeight = "normal";
  }
}

// source: http://stackoverflow.com/questions/46155/ddg#46181
function exitEmail() {
  let $eValue = this.value;
  let $re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  let $eValid = $re.test(String($eValue).toLowerCase());
  if ((! $eValid) && ($eValid.length > 0))
    invalidEmail(this);
  else
    validEmail(this);
}

function invalidEmail($fld) {
  let $eLabel = document.getElementById("lbl_Email Address");
  $eLabel.innerText = "Email Address : Invalid";
  $eLabel.style.color = "red";
  $eLabel.style.fontWeight = "bold";
}

function validEmail($fld) {
  let $eLabel = document.getElementById("lbl_Email Address");
  $eLabel.innerText = "Email Address";
  $eLabel.style.color = "black";
  $eLabel.style.fontWeight = "normal";
  $validEmail = true;
  reqEmail();
}

function enterField($fld) {
  console.log("lbl_" + $fld.id);
  deActivateLabel("lbl_" + $fld.id);
}

function activateLabel($lbl) {
  let $docID = document.getElementById($lbl);
  let $array = $docID.innerText.split(" :");
  let $tempText = $array[0];
  let $newText = $tempText + " : Required";
  $docID.style.color = "red";
  $docID.style.fontWeight = "bold";
  $docID.innerText = $newText;

}

function exitField() {
  let $fld = this;
  if ($fld.value == "")
    activateLabel(("lbl_" + $fld.id));
  else
    deActivateLabel(("lbl_" + $fld.id));
}

function deActivateLabel($lbl) {
  console.log("Deactivate");
  let $docID = document.getElementById($lbl);
  let $array = $docID.innerText.split(" :");
  let $newText = $array[0];
  $docID.style.color = "black";
  $docID.style.fontWeight = "normal";
  $docID.innerText = $newText;

}
