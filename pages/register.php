<?php

if(isset($_COOKIE['auth_session']))
{
	if($auth->checksession($_COOKIE['auth_session']))
	{
		header("Location: ?page=home");
		exit();
	}
}

if($_POST)
{
	$auth->register($_POST['username'], $_POST['password'], $_POST['verifypassword'], $_POST['email']);
}

?>
<!DOCTYPE html>
<html>
<head>
<title>VirtualTrader</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div class="reminder">Reminder : This layout is not final and is only used to display site functionality</div>
<div class="box">
<div class="logo"></div>
<div class="content">
<h1>Register</h1>
<?php
if(isset($auth->errormsg)) { echo "<span class=\"errormsg\">"; foreach ($auth->errormsg as $emsg) { echo "$emsg<br/>"; } echo "</span><br/>"; }
if(isset($auth->successmsg)) { echo "<span class=\"successmsg\">"; foreach ($auth->successmsg as $smsg) { echo "$smsg<br/>"; } echo "</span><br/>"; }  
if(isset($virtualtrader->errormsg)) { echo "<span class=\"errormsg\">"; foreach ($virtualtrader->errormsg as $vemsg) { echo "$vemsg<br/>"; } echo "</span><br/>"; }
if(isset($virtualtrader->successmsg)) { echo "<span class=\"successmsg\">"; foreach ($virtualtrader->successmsg as $vsmsg) { echo "$vsmsg<br/>"; } echo "</span><br/>"; }  
?>
<form method="post" action="?page=register">
<table class="center" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td>Username :</td>
    <td><label for="username"></label>
    <input name="username" type="text" id="username" maxlength="30" /></td>
  </tr>
  <tr>
    <td>Password :</td>
    <td><label for="password"></label>
    <input name="password" type="password" id="password" maxlength="30" /></td>
  </tr>
  <tr>
    <td>Verify Password :</td>
    <td><label for="verifypassword"></label>
    <input name="verifypassword" type="password" id="verifypassword" maxlength="30" /></td>
  </tr>
  <tr>
    <td>Email :</td>
    <td><label for="email"></label>
    <input name="email" type="text" id="email" maxlength="100" /></td>
  </tr>
  <tr>
    <td colspan="2"><br /><input type="submit" value="Register &gt;" /></td>
  </tr>
</table>
</form><br/><span class="small"><a href="?page=login">I already have an account ></a></span>
</div>
</div>
</body>
</html>