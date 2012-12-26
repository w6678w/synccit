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



// themeing
function htmlHeader($title, $loggedin=false) {
	global $baseurl;
	?>
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
			<li><a class="navlink" href="profile.php">Profile</a></li>
			
			<?php
		} else {
			?>
			<li><a class="navlink" href="login.php">Login</a></li>
			<li><a class="navlink" href="create.php">Create Account</a></li>
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

<span class="attr"><a href="http://drakeapps.com/">Drake Apps, LLC</a> | <a href="http://github.com/drakeapps">Open Source</a></span>
</div>
</body>
</html><?php
}