<!DOCTYPE html>
<html>
<head>
<title>Haishoku Shoukan v3.14</title>

<style>@import url("https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css")</style>
<link rel="stylesheet" href="style.css">

<?php
		define("ROOTPATH", __DIR__);
		require_once(ROOTPATH . "/singletonConn.php");
?>

</head>

<wrapper>
	<header>
		<section>
			<article>
				<div><a href="index.php"><h1>Haishoku Soukan</h1></a></div>
			</article>

			<aside class="sidebar">
				<ul>
					<li><a href="colorInsert.php">+Col</a></li>
					<li> | </li>
					<li><a href="colorDelete.php">-Col</a></li>
					<li> | </li>
					<li><a href="colorUpdate.php">=Col</a></li>
					<li> | </li>
					<li><a href="combinationInsert.php">+Com</a></li>
					<li> | </li>
					<li><a href="combinationDelete.php">-Com</a></li>
					<li> | </li>
					<li><a href="register.php">Register</a></li>
					<li> | </li>
					<li><a href="login.php">Login</a></li>
					<li> | </li>
					<li><a href="userProfile.php"><?php echo $_SESSION['sessUser']; ?></a></li>
				</ul>
			</aside>
		</section>
	</header>
