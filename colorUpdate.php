<?php
		require_once("session.php");
		require_once("header.php");

if(isset($_POST['submit'])) {
		$paramIdUser = $_SESSION['sessUserId'];
		$paramOldNameColor = htmlspecialchars($_POST['formOldNameColor']);
		$paramNewNameColor = htmlspecialchars($_POST['formNewNameColor']);
		$paramHexaColor = htmlspecialchars($_POST['formHexaColor']);

		try {
				$stmt = $pdo -> prepare("UPDATE color SET hexa = ?, colorName = ? WHERE colorName = ?");
				$stmt -> execute([$paramHexaColor, $paramNewNameColor, $paramOldNameColor]);
				header("location:index.php");
		} catch (PDOException $e) {
				throw new Exception($e->getMessage());
		}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="formOldNameColor" value="" placeholder="Antiguo nombre del Color a Actualizar">
	<input type="text" name="formNewNameColor" value="" placeholder="Nuevo nombre del Color a Actualizar">
	<input type="color" name="formHexaColor" value="">UNIQUE
	<button type="submit" name="submit">Submit</button>
</form>

<?php
		require_once("footer.php");
?>

