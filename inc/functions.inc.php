<?php

/**
 * --------------------------------------------------------------------------------------
 *
 * is user logged in. 
 * 
 * @return Returns the row of the logged in user
 *  
 **/

	function check_user() {
	global $pdo;
	
	if(!isset($_SESSION['userID']) && isset($_COOKIE['identifier']) && isset($_COOKIE['token'])) {
		$identifier = $_COOKIE['identifier'];
		$securitytoken = $_COOKIE['token'];
		
		$stmt = $pdo->prepare("SELECT * FROM security WHERE identifier = ?");
		$result = $statement->execute(array($identifier));
		$securitytoken_row = $stmt->fetch();
	
		if(sha1($securitytoken) !== $securitytoken_row['token']) {
		// error_msg = 'error'; 
			
		} else { // token was correct
			// set new token
			$neuer_securitytoken = random_string();
			$insert = $pdo->prepare("UPDATE security SET token = :token WHERE identifier = :identifier");
			$insert->execute(array('token' => sha1($new_securitytoken), 'identifier' => $identifier));
			setcookie("identifier",$identifier,time()+(3600*24*365)); //1 Jahr Gültigkeit
			setcookie("securitytoken",$new_securitytoken,time()+(3600*24*365)); //1 Jahr Gültigkeit
	
			// login user
			$_SESSION['userID'] = $securitytoken_row['userID'];
		}
	}
	
	if(!isset($_SESSION['userID'])) {
		//if not logged in redirect to login page
		header("Location: login.php");
		exit;
	}

	$statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
	$result = $statement->execute(array('id' => $_SESSION['userid']));
	$user = $statement->fetch();
	return $user;
}


/**
 * --------------------------------------------------------------------------------------
 *
 * Create a random string for security tokens
 * 
 * @return Returns random string
 * 
 **/

function random_string() {
	if(function_exists('openssl_random_pseudo_bytes')) {
		$bytes = openssl_random_pseudo_bytes(16);
		$str = bin2hex($bytes); 
	} else if(function_exists('mcrypt_create_iv')) {
		$bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
		$str = bin2hex($bytes); 
	} else {
		//Replace your_secret_string with a string of your choice (>12 characters)
		$str = md5(uniqid('your_secret_string', true));
	}	
	return $str;
}

?>