<?php
		require_once("session.php");
		require_once("header.php");

		if(isset($_POST['formSubmit'])) {
				$paramNameColorCombination = htmlspecialchars($_POST['formNameColorCombination']);
				$paramIdUser = $_SESSION['sessUserId'];

				try {
						$stmt = $pdo -> prepare("DELETE FROM colorCombination WHERE combinationName = ?");
						$stmt -> execute([$paramNameColorCombination]);
						header("location:index.php");
				} catch (PDOException $e) {
						throw new Exception($e->getMessage());
				}
		}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="formNameColorCombination" value="" placeholder="combination name UNIQUE">
	<button type="submit" name="formSubmit">Submit</button>
</form>

<?php
		require_once("footer.php");
?>

