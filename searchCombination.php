<?php
		require_once("session.php");
		require_once("header.php");
		$hexaQuery = $_POST["hexaQuery"]; //aqui viene

		$stmt = $pdo -> prepare("SELECT * FROM viewCombination WHERE
				hexA = ? OR
				hexB = ? OR
				hexC = ? OR
				hexD = ?
				ORDER BY length(name), name");
		$stmt -> execute([$hexaQuery, $hexaQuery, $hexaQuery, $hexaQuery]);

		echo "<main>";
		echo "<section>";
		echo "<article>";

		foreach ($stmt as $row) {
				if ($row['nomC'] == NULL && $row['nomD'] == NULL) {

								echo'
<div class="colors2">
<div>' . $row['name'] . '</div>
	<div style="background-color:' . $row['hexA'] . '"></div>
	<div style="border-top:50px solid ' . $row['hexA'] . ';border-right:100px solid transparent;"></div>
	<div style="border-bottom:50px solid ' . $row['hexB'] . ';border-left:100px solid transparent;"></div>
	<div style="background-color:' . $row['hexB'] . '"></div>
  <div>' . $row['nomA'] . '</div>
	<div></div>
  <div>' . $row['nomB'] . '</div>
</div>
';
						} else if ($row['nomC'] == !NULL && $row['nomD'] == NULL) {
								echo'
<div class="colors3">
<div>' . $row['name'] . '</div>
<div style="background-color:' . $row['hexA'] . '"></div>
<div style="background-color:' . $row['hexB'] . '"></div>
<div style="background-color:' . $row['hexC'] . '"></div>
<div>' . $row['nomA'] . '</div>
<div>' . $row['nomB'] . '</div>
<div>' . $row['nomC'] . '</div>
</div>
';
						} else {
								echo'
<div class="colors4">
<div>' . $row['name'] . '</div>
<div style="background-color:' . $row['hexA'] . '"></div>
<div style="background-color:' . $row['hexB'] . '"></div>
<div style="background-color:' . $row['hexC'] . '"></div>
<div style="background-color:' . $row['hexD'] . '"></div>
<div>' . $row['nomA'] . '</div>
<div>' . $row['nomB'] . '</div>
<div>' . $row['nomC'] . '</div>
<div>' . $row['nomD'] . '</div>
</div>
';
					}
				}
		echo "</div>";

		require_once ("footer.php");
?>
