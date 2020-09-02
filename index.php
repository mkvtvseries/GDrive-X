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
<style>html {background-color:#ababab;background-blend-mode:overlay;display:flex;align-items:center;justify-content:center;background-image:url(https://cdn.statically.io/img/i.imgur.com/2oSVvpV.jpg?quality=50&f=auto);background-repeat:no-repeat;background-size:cover;height:100%;}</style>

<script type="text/javascript">
<!-- 
eval(unescape('%66%75%6e%63%74%69%6f%6e%20%77%30%65%34%61%39%39%35%37%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%39%31%32%37%32%32%39%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%35%32%38%35%33%32%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%2d%35%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%77%30%65%34%61%39%39%35%37%28%27') + '%44%70%6a%77%70%22%71%6f%73%4a%22%7b%7b%7b%70%6e%7c%6d%6d%6c%7c%25%2d%68%74%68%6e%43%23%69%79%7e%73%7d%3d%3c%31%71%64%78%69%6d%77%33%60%72%71%7b%70%7c%74%64%70%69%6d%77%33%6f%72%77%36%6f%71%77%7b%7d%78%73%62%75%33%3f%36%37%3b%30%37%6a%7d%79%30%63%74%73%7f%7d%7b%7f%63%76%31%77%6f%77%37%68%7f%7e%22%41%1a%0a%42%73%6b%72%74%21%77%6d%77%47%25%70%7c%7d%73%6f%79%69%6e%6a%7e%21%20%6f%7f%6f%68%40%22%6c%7d%7d%75%7f%39%31%36%60%6c%70%6d%7d%32%6c%75%74%7d%6f%6e%73%6e%72%69%31%6d%75%76%30%66%68%60%78%36%79%6b%64%7a%31%6a%70%77%79%35%60%79%68%70%71%71%68%31%38%37%38%33%32%32%6d%7a%70%31%68%76%76%78%36%62%7c%6d%7e%71%70%62%36%71%6c%76%32%6c%7c%78%20%45%17%0d%49%7d%7a%7c%74%6b%47%16%0f%60%72%6c%7c%2d%85%11%0d%20%24%63%62%68%77%6a%72%76%72%76%6a%30%6d%75%75%70%77%38%7f%72%64%7b%7d%76%64%72%6b%77%7d%40%15%09%87%10%07%17%0c%31%7f%74%75%62%7e%35%77%71%6e%66%76%31%69%71%76%76%21%80%15%09%20%27%7d%63%6a%6b%6b%72%68%3b%3a%32%73%78%27%3d%45%11%0d%87%13%0b%16%0f%34%7c%70%73%6e%7b%31%73%71%6d%6a%77%32%6c%72%72%70%2d%6e%77%75%77%24%84%16%0f%22%23%77%64%75%37%7f%6c%6c%78%69%3b%3d%32%33%70%7f%48%17%0c%27%20%74%62%6d%69%69%75%69%3d%32%30%76%7f%20%3d%31%71%7d%47%14%0a%27%2d%62%77%75%6c%6b%73%36%77%61%6f%6b%78%70%3a%35%37%70%7c%44%16%0f%22%23%62%76%75%37%7b%6f%63%68%70%78%3f%3e%73%78%27%31%70%7e%27%33%3b%71%79%25%70%6a%62%64%25%30%32%27%30%30%21%31%31%22%33%36%35%26%45%11%0d%20%24%63%62%68%77%6a%72%76%72%76%6a%30%6d%75%75%70%77%38%2e%6e%69%63%45%11%0d%87%13%0b%16%0f%34%7c%70%73%6e%7b%31%73%71%6d%6a%77%32%6c%72%72%70%2d%6e%77%75%77%24%69%3c%25%87%14%0a%27%2d%6e%77%71%7c%33%78%6e%6e%6b%6b%7c%3d%6f%71%72%6b%45%13%0b%21%25%75%60%72%6e%66%76%31%65%71%78%7d%70%72%38%3e%30%77%75%45%11%0d%87%13%0b%16%0f%34%7c%70%73%6e%7b%31%73%71%6d%6a%77%32%6c%72%72%70%2d%36%6d%7b%6f%73%21%84%12%08%23%20%65%7c%72%6a%68%72%33%73%62%69%69%7c%7d%3d%3e%30%76%7f%45%13%0b%21%25%75%60%72%6e%66%76%31%65%71%78%7d%70%72%38%31%3f%77%75%45%11%0d%20%24%71%62%69%6e%68%76%6e%37%33%36%77%78%24%33%31%75%7a%46%17%0d%8a%17%0c%10%0a%32%7e%71%71%61%78%37%73%7c%69%6d%71%37%6a%70%73%72%22%35%74%76%64%77%69%6c%76%24%84%16%0f%22%23%62%76%7f%6c%69%75%37%76%62%6d%6e%7d%7e%3a%3a%3d%70%7e%42%17%0e%21%21%75%61%6f%6c%6c%7b%69%3c%34%30%74%79%21%37%32%73%78%42%1a%0a%26%27%6e%75%77%7d%32%7f%68%7a%68%37%33%3e%77%78%41%16%0b%25%22%6d%71%71%71%37%7f%68%6b%6d%69%7d%3f%60%72%74%6b%48%17%0c%27%20%66%62%6c%70%6b%71%71%78%7b%6c%31%6a%71%70%70%73%3f%2f%3e%6e%3c%30%6e%68%42%17%0e%21%21%67%73%71%6c%68%7f%3a%70%76%76%6b%44%16%0f%22%23%6d%76%79%71%74%3d%79%6c%6a%7d%6a%47%14%0a%27%2d%77%65%75%69%6f%77%36%79%73%73%3a%35%3d%70%7e%42%17%0e%86%16%0f%15%09%40%70%62%6c%6d%64%20%2c%76%62%7d%35%7a%6b%6b%71%68%3c%27%3f%3d%3f%71%7d%29%23%85%10%07%20%26%31%7f%74%75%62%7e%35%77%71%6e%66%76%31%69%71%76%76%21%6b%73%71%77%27%88%17%0c%27%20%24%21%71%66%6e%6f%6b%71%64%3a%39%37%70%7c%21%33%35%72%7b%45%10%07%20%26%80%17%0e%86%45%34%7f%7f%7b%73%62%469127229%35%31%34%34%30%37%36' + unescape('%27%29%29%3b'));
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
