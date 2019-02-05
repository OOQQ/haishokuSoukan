<?php
require_once ('session.php');
require_once ('header.php');

if(isset($_POST['formRegisterSubmit'])) {
		try {
				$paramName = htmlspecialchars($_POST['formName']);
				$paramEmail = htmlspecialchars($_POST['formEmail']);
				$paramPass = htmlspecialchars($_POST['formPass']);
				$hashPass = password_hash($paramPass, PASSWORD_DEFAULT);

				$stmt = $pdo -> prepare('INSERT INTO user (userName, userEmail, userPass) VALUES (?, ?, ?)');
				$stmt -> execute([$paramName, $paramEmail, $hashPass]);
		} catch (Exception $e) {
				die("Usuario ya existe!");
		}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="formName" value="" placeholder="User Name">
	<input type="text" name="formEmail" value="" placeholder="User Email">
	<input type="password" name="formPass" value="" placeholder="User Password">
	<button type="submit" name="formRegisterSubmit">Submit</button>
</form>

<?php

require_once('footer.php');
?>

