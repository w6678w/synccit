<?php

include("config.php");
include("functions.php");
include("session.php");

if($session->isLoggedIn()) {
    header("Location: index.php");
    exit;
}

//TODO add hash to login form to prevent csrf


if(isset($_POST['login'])) {	

	$error = "";
	
	$username = htmlspecialchars($_POST['username']);
	
	// check username validity
	$password = $_POST['password'];

	$userinfo = $mysql->query("SELECT * FROM `user` WHERE `username` = '".mysql_real_escape_string($username)."' LIMIT 1");

    if($userinfo->num_rows > 0) {

        $error = $hashset;



        $row = $userinfo->fetch_assoc();

        $hash = $row["passhash"];
        $salt = $row["salt"];

        $hashset = "sha512:10000:".$salt.":".$hash;

        $result = validate_password($password, $hashset);

        if($result) {
            //username and password good
            //$ses = new Session();

            $userid = $row["id"];

            $session->generateHash();

            $sql = "INSERT INTO `logincodes` (
                `id`,
                `userid`,
                `authhash`,
                `lastlogin`,
                `created`
            ) VALUES (
                NULL,
                '".mysql_real_escape_string($userid)."',
                '".mysql_real_escape_string($session->hash)."',
                '".time()."',
                '".time()."'
            )";

            if($mysql->query($sql)) {
                $id = $mysql->insert_id;

                //$error = $session->hash;

                $session->setUser($userid);
                $session->setID($id);
                $session->setPHPSession();

                //redirect to homepage
                header("Location: index.php");
            } else {
                $error = "database error. try again";
            }

        } else {
            //password wrong
            $error = "username or password wrong";
        }


    } else {
        $error = "username or password wrong";
    }
	
	
} 


htmlHeader("login - synccit");

?>
<div id="center">

	<span class="error"><?php echo $error; ?></span><br /><br />
	<form action="login.php" method="post">
	
	<input type="hidden" name="hash" value="<?php echo $hash; ?>" />
	<label for="username">username</label><br />
	<input type="text" id="username" name="username" value="<?php echo $username; ?>" class="text" />
	<br /><br />
	<label for="password">password</label><br />
	<input type="password" id="password" name="password" value="" class="text" />
	<br /><br />
	
	<input type="submit" value="login" name="login" class="submit" />
	
	</form>
</div>
<?php

htmlFooter();