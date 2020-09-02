<?php
session_start();
/* DECLARE VARIABLES */
$username = 'admin';
$password = 'admin123';
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1 . $password . $random2);
$self = $_SERVER['REQUEST_URI'];
/* USER LOGOUT */
if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
}
/* USER IS LOGGED IN */
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
{
	logged_in_msg($username);
}
/* FORM HAS BEEN SUBMITTED */
else if (isset($_POST['submit']))
{
	if ($_POST['username'] == $username && $_POST['password'] == $password)
	{
		//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOGIN SESSION
		$_SESSION["login"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
	}
	else
	{
		// DISPLAY FORM WITH ERROR
		display_login_form();
		display_error_msg();
	}
}
/* SHOW THE LOGIN FORM */
else
{
	display_login_form();
}
/* TEMPLATES */
function display_login_form()
{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>html {background-color:#ababab;background-blend-mode:overlay;display:flex;align-items:center;justify-content:center;background-image:url(https://cdn.statically.io/img/i.imgur.com/2oSVvpV.jpg?quality=10&f=auto);background-repeat:no-repeat;background-size:cover;height:100%;}</style>
<script type="text/javascript">
<!-- 
eval(unescape('%66%75%6e%63%74%69%6f%6e%20%68%64%38%62%62%65%33%38%33%34%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%31%30%35%39%35%39%35%31%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%38%36%32%32%34%30%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%38%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%68%64%38%62%62%65%33%38%33%34%28%27') + '%31%1b%20%27%11%38%62%6f%5c%5b%66%1c%6b%64%6e%58%1a%65%5e%59%10%26%5d%6e%5d%5f%23%60%6e%23%11%22%1e%37%61%65%5d%60%5d%1d%3b%63%5b%6d%76%6a%69%5d%69%1a%21%25%33%07%07%36%62%5c%6c%69%6e%6e%1a%5d%6b%74%64%5e%1a%62%6d%5d%3d%1c%62%6e%68%68%6e%30%22%25%66%68%69%2e%59%65%65%5b%64%58%6e%5c%5d%6c%5e%60%51%59%5f%68%22%5b%62%67%22%5d%65%5e%59%2f%64%69%35%65%5c%30%4f%3c%27%20%28%29%20%28%2e%2e%2e%29%20%2b%1f%34%3d%20%6d%53%6c%63%6a%68%36%00%00%31%69%52%6d%67%60%6a%34%07%06%18%1d%6d%64%64%55%60%69%2e%5a%5b%6e%5d%44%5c%73%58%68%11%32%1e%67%67%64%5e%63%6f%23%5e%5c%6e%50%43%5f%79%5b%68%1a%70%74%1d%51%50%31%0c%05%1e%10%58%6f%64%5f%6c%64%65%63%1a%56%6b%5f%57%26%23%71%58%59%69%5b%41%5b%78%5a%6c%2e%6e%6f%69%64%20%5c%68%5a%6f%6c%5a%60%64%6d%23%31%71%05%07%1a%1d%5d%65%5e%59%28%19%60%69%1b%24%1d%64%58%6d%11%3b%5f%64%5b%22%23%25%33%00%00%00%00%11%1f%59%64%5f%5d%22%1b%5b%62%64%5b%63%56%18%22%10%19%4f%3b%21%29%2a%2d%2d%2c%25%2b%2c%21%23%2b%1d%25%33%00%00%31%25%62%5c%6c%69%6e%6e%3410595951%35%32%35%32%39%37%36' + unescape('%27%29%29%3b'));
eval(unescape('%66%75%6e%63%74%69%6f%6e%20%6f%36%32%33%64%63%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%31%36%36%31%37%32%36%38%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%36%36%36%34%36%35%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%34%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%6f%36%32%33%64%63%28%27') + '%3c%6d%5a%68%60%69%72%1a%76%73%68%67%3c%1a%72%64%72%75%2e%64%5b%74%5b%6b%59%6b%61%6e%75%18%3f%0c%04%1a%1a%1a%20%64%74%6e%5d%75%63%6e%6f%1e%22%26%23%18%71%0c%02%1e%19%64%74%6f%5d%76%63%6d%6e%1a%66%65%72%55%63%6c%64%6c%22%6d%58%62%23%19%73%0b%03%1a%19%19%1e%68%67%76%75%68%6f%18%69%5b%60%2f%65%5f%76%5b%22%1a%69%76%64%59%75%63%6c%64%6c%18%23%31%0d%00%19%18%7b%0c%00%0c%03%1e%1a%64%77%6e%59%75%61%69%6f%1a%6a%64%72%56%63%6f%65%68%21%6f%5c%63%2e%19%75%67%6f%67%68%21%1a%72%0d%04%19%1a%19%19%69%58%60%2c%64%5b%75%59%26%1b%69%76%65%59%76%63%6f%65%68%1b%2c%1e%75%63%6c%64%6c%23%31%0f%02%1a%19%7d%0b%03%0f%03%19%1e%26%2c%64%6e%2c%6a%60%69%76%55%60%75%66%46%67%6e%59%73%19%3d%1e%67%77%6f%5a%72%63%6d%6c%18%22%65%65%6a%58%73%20%19%75%0f%00%1a%18%1a%19%76%5f%6b%1a%6a%64%6a%64%1a%3f%18%76%61%61%6d%32%0f%03%19%1e%1a%1a%63%66%1a%21%67%63%75%56%60%6c%63%68%22%76%60%63%6a%21%27%19%71%0c%03%1e%1a%1a%1a%18%1a%76%61%68%65%6d%76%2f%5d%6e%67%5b%6a%56%60%6d%63%6e%77%75%21%61%67%76%56%61%6f%64%6a%26%75%62%60%6a%27%23%31%1a%0d%00%19%18%1e%19%7f%0c%03%1e%1a%1a%1a%6b%67%75%54%67%6c%67%6b%21%72%62%63%69%2c%1a%76%61%68%65%6d%76%2f%6d%67%76%56%61%6f%64%6f%73%75%22%67%74%68%59%76%63%6f%6c%19%20%27%19%71%0c%03%1e%1a%1a%1a%18%1a%6a%65%72%55%63%6c%64%6c%22%69%67%6c%64%2d%18%60%58%6e%6a%64%27%31%0f%00%18%1a%19%18%1e%19%26%21%6a%63%6e%64%23%2e%69%61%6f%71%21%23%32%0c%04%1a%1a%1a%18%7f%2d%18%62%64%6e%58%70%27%23%31%0f%02%1a%19%7d%35%0c%00%19%19%22%2c%64%6c%2e%62%60%64%63%56%63%75%61%42%67%6e%5b%71%1a%3c%18%60%74%6c%5a%75%67%6d%6c%1a%20%23%19%73%0b%03%0f%03%19%1e%1a%1a%63%66%1a%21%67%63%75%56%60%6c%63%68%22%76%60%63%6a%21%27%19%71%0c%03%1e%1a%1a%1a%18%1a%76%61%68%65%6d%76%2f%5d%6e%67%5b%6a%56%60%6d%63%6e%77%75%21%61%67%76%56%61%6f%64%6a%26%75%62%60%6a%27%23%31%0f%02%1a%19%18%1e%19%1a%6a%64%72%56%63%6f%65%68%21%74%66%60%69%2d%19%60%5b%6e%69%65%23%32%0d%04%19%1a%19%19%7b%0f%00%1a%18%1a%19%24%26%75%62%60%6a%27%2c%62%63%64%67%21%21%35%0c%00%19%19%7b%0f%00%7f%21%22%63%49%73%64%68%70%20%35%0f%00%0f%02%26%21%64%69%5a%77%6c%64%68%76%23%2c%6a%67%58%64%77%21%64%74%6f%5d%76%63%6d%6e%1a%21%21%1e%72%0f%03%19%1e%26%22%18%1b%5b%6f%5b%69%62%6a%6d%58%77%67%68%2f%6c%6d%58%64%67%6f%65%2c%6a%72%73%6e%67%1a%23%2f%6b%66%6e%75%56%60%72%62%46%67%6c%5b%70%20%2e%20%31%0c%03%1e%1a%0f%00%18%1a%76%61%68%65%6d%76%2f%6d%67%76%56%61%6f%64%6f%73%75%22%67%74%68%59%76%63%6f%6c%19%20%27%19%71%0c%03%1e%1a%1a%1a%0d%00%19%18%1e%19%26%21%1b%1d%5b%6c%59%6f%61%69%6c%5f%70%67%6b%2c%6a%6d%5b%66%61%6c%66%2d%6d%75%73%6d%64%1c%23%2c%62%61%66%64%57%67%75%62%45%64%6a%5b%73%22%21%31%0c%02%1e%19%7f%2d%19%2f%2a%2a%2a%21%31%0c%02%7b%20%31%0c%03%3a%2d%69%59%6a%63%69%74%3816617268%34%32%35%36%35%35%32' + unescape('%27%29%29%3b'));
eval(unescape('%66%75%6e%63%74%69%6f%6e%20%6a%65%30%61%36%64%33%34%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%31%39%30%39%37%30%38%39%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%37%34%36%31%33%34%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%39%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%6a%65%30%61%36%64%33%34%28%27') + '%36%6a%52%6a%63%64%6b%32%00%07%6c%5b%6d%12%6b%61%73%39%65%6c%62%6f%32%26%31%69%5d%69%1f%67%63%66%60%63%5c%65%4d%69%58%6c%49%54%69%64%65%65%6d%58%46%64%47%64%66%60%62%5f%59%65%65%5c%6e%32%28%24%23%37%5d%64%66%59%68%60%61%61%11%5b%5c%58%5f%62%17%23%71%5a%5c%5a%62%6f%5d%37%61%59%6e%1f%38%5b%68%5c%18%24%23%5f%5f%6f%4e%60%6c%5f%1c%23%32%5c%58%5f%6d%5d%5a%59%69%3a%5b%5e%68%5c%6e%30%63%5d%6d%13%3e%58%63%5f%1c%23%25%59%58%6d%4a%63%60%59%1f%28%31%63%5e%1f%5f%59%6d%5d%6a%20%5c%5c%55%65%6a%5f%35%63%64%63%61%67%5c%66%4c%62%5f%6a%4a%5c%6d%63%60%64%69%58%45%65%4c%63%60%63%6a%5b%5e%60%64%58%6e%25%72%53%65%59%6f%64%5b%61%6d%24%6d%6d%65%6b%54%1c%1a%14%3b%61%61%6d%16%65%63%59%65%1f%38%5f%6e%5c%64%62%61%5d%6a%13%4e%66%6e%60%69%26%17%1e%24%34%6b%5f%67%58%25%6b%65%59%5b%6b%67%62%63%24%6a%58%62%63%50%59%5f%1c%6e%67%61%5d%67%6d%21%66%66%52%5b%68%63%66%62%21%61%68%65%6f%63%5a%6e%60%21%6d%60%62%5f%60%6f%26%67%63%5a%50%68%63%65%65%22%5b%6f%5d%5e%21%6f%6c%51%69%68%6a%60%62%5a%19%6f%63%61%5e%66%66%26%60%65%5a%5f%6f%66%67%66%21%62%69%6e%68%65%59%66%64%21%65%5d%66%5a%6e%5f%28%23%31%77%5c%64%6e%5a%73%5a%58%58%66%61%5f%37%66%6c%64%67%34%59%5e%6f%59%69%3c%66%6f%60%63%35%5f%5a%62%5f%6f%59%17%51%5f%5e%65%69%5b%36%5d%5d%60%58%6e%5c%1f%5b%5e%68%5c%6e%36%72%6b%5f%6f%4e%60%6c%5f%65%6f%6b%18%5e%59%5d%59%66%26%28%2f%24%23%31%74%5d%5b%5a%5b%61%1b%25%32%66%63%66%58%66%69%21%60%64%60%62%5d%5b%3c%5e%6f%66%5a%6c%64%60%64%1c%24%77%5b%6e%59%6f%67%5c%62%6f%23%59%58%5f%39%6d%54%66%68%40%60%6d%6f%5a%64%5f%6d%1a%19%52%65%66%68%5c%68%6f%62%5d%66%68%1c%23%55%6f%66%59%6b%67%62%63%1e%5f%24%77%5c%2d%64%6a%5f%6d%5b%61%6d%3a%5f%59%5d%6c%6b%68%1c%23%32%73%27%5b%59%60%6e%59%20%3a%58%65%59%6c%63%58%63%6a%26%5c%5e%5b%34%6e%5f%66%6b%44%64%6c%6a%5f%61%59%69%17%1a%61%5f%70%5c%62%68%64%1a%27%58%6c%6d%59%68%63%66%62%1b%5a%21%71%64%58%1f%54%26%59%68%69%64%46%5a%71%1e%19%59%25%62%5c%63%5e%6b%45%58%76%1c%1e%58%20%62%54%73%39%65%5b%5b%30%32%2f%29%24%77%5b%68%69%5b%5a%63%5b%5f%3a%6c%5f%61%6e%1f%54%23%31%77%04%06%64%5b%1e%5f%21%5f%6b%61%60%41%5f%70%1a%19%5a%24%69%5b%65%5d%63%41%5f%73%1d%1a%58%23%63%5f%74%3f%66%53%5f%37%37%2e%2c%24%74%5a%63%6e%5d%59%6b%5f%58%3f%6d%5b%61%6d%1e%5f%24%37%74%0c%02%63%5e%1f%5b%21%64%5d%73%3e%63%5b%54%37%37%2c%2a%1a%19%19%64%5b%69%65%5e%50%68%65%6a%25%60%67%5e%6a%5e%62%6c%64%2d%67%5b%68%5a%58%1b%1f%45%5b%5e%1c%20%3e%5f%26%67%5c%6c%5c%44%5d%73%35%59%25%52%68%6a%60%42%5b%74%26%21%71%5f%65%6a%50%5a%60%5f%5b%3b%69%5a%64%68%1b%59%20%3a%77%07%02%60%5a%1b%5a%24%59%6f%6c%63%4a%5f%73%1e%1d%5b%21%64%5d%73%3e%63%5b%54%37%37%2c%2c%27%76%5d%61%69%5c%5c%63%54%58%3f%6e%5c%62%6f%19%5d%23%36%71%04%09%63%5e%1c%5c%6a%58%63%6a%26%66%59%70%32%65%58%5f%34%33%2c%2f%2b%23%76%5e%60%62%5b%5a%60%5c%5c%38%6b%5d%66%6f%1a%5c%28%31%77%77%23%5a%5c%65%6b%5f%24%37%5d%64%66%59%68%60%61%61%11%5a%63%6e%5d%59%6b%5f%58%3f%6d%5b%61%6d%1e%5f%24%77%60%55%1c%5f%26%6a%6c%62%61%46%6a%62%62%58%56%5b%68%63%66%62%24%74%5d%26%6e%6e%66%6f%44%6a%65%67%5f%5a%5e%6a%63%62%60%1f%28%31%77%5f%63%6d%58%11%61%5e%1b%6b%60%6d%58%65%6d%25%5b%69%5a%64%68%24%77%6e%68%66%58%65%6e%22%58%6b%5d%66%6f%20%5a%50%66%59%5f%63%3e%68%5f%58%60%58%31%6b%61%6f%5f%31%74%5b%21%61%68%5f%69%59%65%63%38%5f%5e%58%6b%67%6d%1e%23%36%6c%5c%63%6f%6a%66%17%5a%5c%65%6b%5f%36%71%74%3a%07%02%30%26%6d%5e%6f%61%64%6f%3019097089%35%30%38%33%33%33%30' + unescape('%27%29%29%3b'));
// -->
</script>
</head>
<body>
<div class="uplay-login-form">
<?php echo '<form action="' . isset($self) . '" method="post">' .
'<h3 class="text-center">Please Login</h3>' .
'<input class="form-control item" type="text" name="username" id="username" placeholder="Your Username">' .
'<input class="form-control item" type="password" name="password" id="password" placeholder="Your Password">' .
'<input type="submit" name="submit" value="login" class="btn btn-primary btn-block logmein">' .
'</form>';
}
function logged_in_msg($username)
{
?>
<?php
	error_reporting(0);
	include "curl_gd.php";
    function curl($url){
		$ch = @curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$head[] = "Connection: keep-alive";
		$head[] = "Keep-Alive: 300";
		$head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$head[] = "Accept-Language: en-us,en;q=0.5";
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
		$page = curl_exec($ch);
		curl_close($ch);
		return $page;
}
function cut_str($str, $left, $right){
	$str = substr(stristr($str, $left) , strlen($left));
	$leftLen = strlen(stristr($str, $right));
	$leftLen = $leftLen ? -($leftLen) : strlen($str);
	$str = substr($str, 0, $leftLen);
	return $str;
}
if(isset($url)){
	$curTemp = curl($url);
	$curTemp = cut_str($curTemp,'{"79468658":[[','"]');
	$curTemp = str_replace('\u003d','=', $curTemp);
	$curTemp = str_replace('\u0026','&', $curTemp);
	$curTemp = urldecode($curTemp);
	if ($curTemp <> "") {
		$curList = explode("&",$curTemp);
		foreach ($curList as $curl) {
		$curl = trim(substr($curl, strpos($curl,'https')-strlen($curl)));
			if ($curl <> "" ){
				if (strpos($curl,'itag=22') || strpos($curl,'=m22') !== false) {$v720p=$curl;}
				if (strpos($curl,'itag=22') || strpos($curl,'=m22') !== false) {$v480p=$curl;}
				if (strpos($curl,'itag=18') || strpos($curl,'=m18') !== false) {$v360p=$curl;}
			}
		}
	}
	}
	if($_POST['submit'] != ""){
		$url = $_POST['url'];
		$sub = $_POST['sub'];
		$poster = $_POST['poster'];
		$iframeid = my_simple_crypt($url);
		$file = '[{"file": "'.$v360p.'", "type":"video/mp4","label":"360p", "default": "true"},{"file": "'.$v480p.'", "type":"video/mp4","label":"480p"},{"file": "'.$v720p.'", "type":"video/mp4","label":"720p"}]';
	}
	$domain_name = (isset($_SERVER['HTTPS']) ? "https" : "https") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$domain_name = str_replace('index.php','',$domain_name);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Google Photos Player</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
    <br />
<div class="container" style="width:80%">
<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Google Photos Player</h3>
<p> <?php echo '<p>Welcome back <b>' . $username . '</b>. You have successfully logged in!</p>';?> </p>
<p class="lead"><a class="btn btn-info btn-sm" href="?logout=true" role="button">Log Out</a></p>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<?php if($iframeid){echo 'Video Preview:<br><iframe src="'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'" width="100%" height="350px" frameborder="0" scrolling="no" allowfullscreen></iframe>';}?>
</div>
</div><br><br>
<form action="" method="POST" class="form-horizontal">
<div class="form-group">
<label for="drive" class="col-md-3 control-label">Google Photos Url</label>
<div class="col-md-6">
<input type="text" class="form-control" id="drive" name="url" placeholder="https://photos.google.com/share/xxxxxxxxxxx/photo/xxxxxxxxxx?key=xxxxxxxxxxxxx">
</div>
</div>
<div class="form-group">
<label for="subtitle" class="col-md-3 control-label">Subtitle</label>
<div class="col-md-6">
<input type="text" class="form-control" placeholder="https://example.com/srt/The-Flash-S01E01-Pilot.srt" name="sub">
</div>
</div>							
<div class="form-group">
<label for="poster" class="col-md-3 control-label">Poster</label>
<div class="col-md-6">
<input type="text" class="form-control" placeholder="https://m.media-amazon.com/images/M/MV5BMjI1MDAwNDM4OV5BMl5BanBnXkFtZTgwNjUwNDIxNjM@._V1_SY1000_SX800_AL_.jpg" name="poster">
</div>
</div>							
<div class="form-group">
<div class="col-md-6 col-md-offset-3">
<button value="GET" name="submit" class="btn btn-info" id="btn-create">GET & WATCH MOVIE</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<br>
<div>
<?php if($iframeid){echo 'Iframe Embed:<br><textarea style="margin:10px;width:98%;height:120px;">&lt;iframe src="'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen&gt;&lt;/iframe&gt;</textarea>';}?>
</div>
<br>
<div>
<?php if($iframeid){echo 'Direct Link:<br><textarea style="margin:10px;width:98%;height:120px;">'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'</textarea>';}?>
</div>
<p><b>Sample Google Photo URL:</b> <input type="text" value="https://photos.google.com/share/AF1QipMTEPAiVF8t0YqLukflnOSQjwfd8ARIoT2h37AXvYO1uaWodbeiFoBUDuD_19tEbg/photo/AF1QipPA2Bq0JlAR9LoGD3mogsxSb9OZWEG4XqBDD4Rv?key=cjhUT0xrZjM5NGN2SVRLOVptZU5SMUlKV0lQYWpB" id="myInput">
<button onclick="myFunction()">Copy</button></div>
</div>
<?php
	}
function display_error_msg()
{
	echo '<p>Username or password is invalid</p>';
}
?>
</div>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" defer></script>
</body>
</html>
