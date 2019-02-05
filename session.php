<?php
		session_start();
//	ini_set('session.cookie_lifetime', 60);
//	ini_set('session.gc_maxlifetime', 60);

		if(!isset($_SESSION['sessRole'])) {
				$_SESSION['sessUserId'] = 3;
				$_SESSION['sessUser'] = 'Guest';
				$_SESSION['sessRole'] = 'Guest';
		}

		//echo 'u: ' . $_SESSION['sessUser'];
		//echo ' // ';
		//echo 'r: ' . $_SESSION['sessRole'];

		if (stripos($_SERVER['REQUEST_URI'], 'session.php')) {
				session_destroy();
//	setCookie("short", time() - 1, '/');
//	setCookie("long", time() - 1, '/');

				header("location:index.php");
		}

?>

