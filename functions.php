<?php


include("pbkdf2.php");


// TODO: checklogged
// check if user is logged in.
function checkLoggedIn($authid, $userid, $authhash) {
	
	return false;	
}

// fetch user info
function getUserInfo($userid) {
	
	
}



// saved links
function getLinks($userid, $count, $start, $order ) {
	
}


function genrand() {
    $rand = "";
    for($i=0; $i<6; $i++) {
        // this was posted on stack overflow
        $rand .= rand(0,1) ? rand(0,9) : chr(rand(ord('a'), ord('z')));
    }
    return $rand;
}


// themeing
function htmlHeader($title, $loggedin=false) {
	global $baseurl;
    if($loggedin) {
        global $session;
        $key = $session->hash;
    }
	?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<!-- remember to remove the ones I'm not going to use -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<!-- who am I kidding. I'm not going to remember -->
</head>
<body>
<div id="header">
	<div id="title">
		<a href="index.php">synccit</a>
	</div>
	<div id="navbar">
		<ul id="nav">
		<?php
		if($loggedin) {
			?>
			<!--<li><a class="navlink" href="profile.php">profile</a></li>-->
            <li><a class="navlink" href="plugin.php">browser plugin</a></li>
            <li><a class="navlink" href="addkey.php">devices</a></li>
            <li><a class="navlink" href="http://blog.synccit.com/" target="_blank">blog</a></li>
            <li><a class="navlink" href="logout.php?l=<?php echo $key; ?>">logout</a></li>
			
			<?php
		} else {
			?>
			<li><a class="navlink" href="login.php">login</a></li>
			<li><a class="navlink" href="create.php">create account</a></li>
            <li><a class="navlink" href="http://blog.synccit.com/" target="_blank">blog</a></li>
			<?php
		}?>
		</ul>
	
	</div>
</div>
<div id="content">
	<?php
}

function htmlFooter() {
	?>
</div>
<div id="footer">
<span class="contact">contact: <a href="mailto:james&#064;&#100;&#114;&#097;&#107;&#101;apps.com">james&#064;&#100;&#114;&#097;&#107;&#101;apps.com</span>

    <div class="attr"><a href="http://drakeapps.com/">Drake Apps</a> | <a target="_blank" href="https://github.com/drakeapps/synccit">Open Source</a></div>
<div class="smallprint">synccit is not associated with reddit.com</div>
</div>
</body>
</html><?php
}