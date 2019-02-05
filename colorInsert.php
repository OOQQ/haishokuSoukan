<?php
		require_once("session.php");
		require_once("header.php");

if(isset($_POST['submit'])) {
		$paramIdUser = $_SESSION['sessUserId'];
		$paramNameColor = htmlspecialchars($_POST['formNameColor']);
		$paramHexaColor = htmlspecialchars($_POST['formHexaColor']);

		try {
				$stmt = $pdo -> prepare("INSERT INTO color (user_idUser, colorName, hexa) VALUES (?, ?, ?)");
				$stmt -> execute([$paramIdUser, $paramNameColor, $paramHexaColor]);
		} catch (PDOException $e) {
				echo "Color repetido!";
				throw new Exception($e->getMessage());
		}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="formNameColor" value="" placeholder="Name for color to Insert UNIQUE">
	<input type="color" name="formHexaColor" value="">UNIQUE
	<button type="submit" name="submit">Submit</button>
</form>

<?php
		require_once("footer.php");
?>

