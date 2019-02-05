<?php
		require_once("session.php");
		require_once("header.php");

		if(isset($_POST['formVerifySubmit'])) {
				try {
						$paramUserName = htmlspecialchars($_POST['formName']);
						$paramUserPass = htmlspecialchars($_POST['formPass']);

						$stmt = $pdo -> prepare('SELECT * FROM user WHERE userName = ?');
						$stmt -> execute([$paramUserName]);

						while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
								if (password_verify($paramUserPass, $row['userPass'])) {
										$_SESSION['sessUserId'] = $row['idUser'];
										$_SESSION['sessUser'] = $row['userName'];
										$_SESSION['sessRole'] = $row['userGroup'];
										header("location:userProfile.php");
								} else {
										echo "Password no coincide!";
								}
						}
				} catch (Exception $e) {
						die(e);
				}
		}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="formName" value="" placeholder="User Name">
	<input type="password" name="formPass" value="" placeholder="User Password">
	<button type="submit" name="formVerifySubmit">Submit</button>
</form>

<?php
				require_once("footer.php");
?>

