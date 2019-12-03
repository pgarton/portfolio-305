<?php
 $error = "";
 include('authenticate.php'); // Includes Authentication Script
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles/form.css">
  <title>Admin Login Form</title>
</head>
<body>
<div id="challenge">
  <div id="login" class="inner-div">
    <h2>Admin Login Form</h2>
    <form action="" method="post">
      <label>User Name :</label>
      <input id="userName" name="userName" placeholder="username" type="text">
      <label>&nbsp;&nbsp;&nbsp;&nbsp;Password :</label>
      <input id="password" name="password" placeholder="***********" type="password">
      <br><br>
      <input name="submit" type="submit" value="Login">
      <p><?php echo $error; ?></p>
    </form>
  </div>
</div>
</body>
</html>
