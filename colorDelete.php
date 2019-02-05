<?php
		require_once("session.php");
		require_once("header.php");

if(isset($_POST['submit'])) {
		$paramIdUser = $_SESSION['sessUserId'];
		$paramNameColor = htmlspecialchars($_POST['formNameColor']);

		try {
				$stmt = $pdo -> prepare("DELETE FROM color WHERE colorName = ?");
				$stmt -> execute([$paramNameColor]);
				header("location:index.php");
		} catch (PDOException $e) {
				throw new Exception($e->getMessage());
		}
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="formNameColor" value="" placeholder="Nombre del Color a Borrar">
	<button type="submit" name="submit">Submit</button>
</form>

<?php
		require_once("footer.php");
?>

