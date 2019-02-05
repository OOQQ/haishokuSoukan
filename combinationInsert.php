<?php
		require_once("session.php");
		require_once("header.php");

		if(isset($_POST['formSubmit'])) {
				$paramNameColorCombination = htmlspecialchars($_POST['formNameColorCombination']);
				$paramIdUser = $_SESSION['sessUserId'];
				$paramHexaColorA = $_POST['formHexaColorA'];
				$paramHexaColorB = $_POST['formHexaColorB'];
				$paramHexaColorC = $_POST['formHexaColorC'];
				$paramHexaColorD = $_POST['formHexaColorD'];

				if(empty($paramHexaColorC)) {
						$paramHexaColorC = NULL;
				}

				if(empty($paramHexaColorD)) {
						$paramHexaColorD = NULL;
				}

				$stmt = $pdo -> prepare("INSERT INTO colorCombination (combinationName, user_idUser, colorA, colorB, colorC, colorD) VALUES (?, ?, ?, ?, ?, ?)");
				$stmt -> execute([$paramNameColorCombination, $paramIdUser, $paramHexaColorA, $paramHexaColorB, $paramHexaColorC, $paramHexaColorD]);
		}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="formNameColorCombination" value="" placeholder="combination name UNIQUE">

<?php
		echo '<select name="formHexaColorA">';
		echo '<option value="">Elige Uno</option>';
		$stmt = $pdo -> query("SELECT idColor, colorName, hexa FROM color");
		foreach ($stmt as $row) {
				echo '<option value="' . $row['idColor'] . '" style="background-color:' . $row['hexa'] . '">' . $row['colorName'] . '</option>';
		}
		echo '</select>';

		echo '<select name="formHexaColorB">';
		echo '<option value="">Elige Uno</option>';
		$stmt = $pdo -> query("SELECT idColor, colorName, hexa FROM color");
		foreach ($stmt as $row) {
				echo '<option value="' . $row['idColor'] . '" style="background-color:' . $row['hexa'] . '">' . $row['colorName'] . '</option>';
		}
		echo '</select>';

		echo '<select name="formHexaColorC">';
		echo '<option value="">Elige Uno</option>';
		$stmt = $pdo -> query("SELECT idColor, colorName, hexa FROM color");
		foreach ($stmt as $row) {
				echo '<option value="' . $row['idColor'] . '" style="background-color:' . $row['hexa'] . '">' . $row['colorName'] . '</option>';
		}
		echo '</select>';

		echo '<select name="formHexaColorD">';
		echo '<option value="">Elige Uno</option>';
		$stmt = $pdo -> query("SELECT idColor, colorName, hexa FROM color");
		foreach ($stmt as $row) {
				echo '<option value="' . $row['idColor'] . '" style="background-color:' . $row['hexa'] . '">' . $row['colorName'] . '</option>';
		}
		echo '</select>';
?>

	<button type="submit" name="formSubmit">Submit</button>
</form>

<?php
		require_once("footer.php");
?>

