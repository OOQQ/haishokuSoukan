<?php
		//https://stackoverflow.com/questions/3270297/whats-your-remember-me-cookies-lifetime
		//short-term cookie, 1 minute
setCookie("logged", "true", time() + 60, "www.voodoo.co.com", "true", "httponly");

		//long-term cookie, six months
setCookie("registered", "true", time() + 15780000, "www.voodoo.co.com", "true", "httponly");
?>

