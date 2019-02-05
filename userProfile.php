<?php
//$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		require_once ("session.php");
		require_once ("header.php");

		if ($_SESSION['sessUserId'] != 1) {
				$stmt = $pdo -> prepare("SELECT * FROM user WHERE id = ?");
				$stmt -> execute([$_SESSION['sessUserId']]);
		} else {
				$stmt = $pdo -> query("SELECT * FROM user");
		}

		foreach ($stmt as $row) {
				echo '<br/>';
				echo '<br/>';

				echo 'logged as: ';
				echo $row['userName'];
				echo '<br/>';

				echo 'user email: ';
				echo $row['userEmail'];
				echo '<br/>';

				if ($row['premium']) {
						echo 'premium user';
				} else {
						echo 'get premium';
				}

				echo '<br/>';
				echo '<br/>';
		}


		$stmt = $pdo -> prepare("SELECT * FROM color WHERE
				user_id = ?
				ORDER BY length(colorName), colorName");
		$stmt -> execute([$_SESSION['sessUserId']]);
				foreach ($stmt as $row) {
						echo "$row[colorName]<br/>";
				}
				echo "<br/>";

		$stmt = $pdo -> prepare("SELECT * FROM viewCombination WHERE
				userId = ?
				ORDER BY length(name), name");
		$stmt -> execute([$_SESSION['sessUserId']]);
				foreach ($stmt as $row) {
						echo "$row[name]<br/>";
				}
				echo "<br/>";

				if ($_SESSION['sessUserId'] != 1) {
						$stmt = $pdo -> prepare("SELECT * FROM comment WHERE user_id = ?");
						$stmt -> execute([$_SESSION['sessUserId']]);
				} else {
						$stmt = $pdo -> query("SELECT * FROM comment");
				}

		foreach ($stmt as $row) {
				echo "$row[comment]<br/>";
		}

		if(isset($_POST['formCerrarSession'])) {
				header("location:session.php");
		} else if (isset($_POST["formDeleteUser"])) {
				try {
						$stmt = $pdo -> prepare("DELETE FROM user WHERE userName = ?");
						$stmt -> execute([$_SESSION['sessUser']]);
						header("location:session.php");
				} catch (Exception $e) {
						die(e);
				}
		}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="submit" name="formCerrarSession" value="Cerrar Sesion" />
	<input type="submit" name="formDeleteUser" value="Borrar Usuario" />
</form>

<?php
	require_once ("footer.php");
?>

