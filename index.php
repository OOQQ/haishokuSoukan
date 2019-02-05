<?php
		require_once("session.php");
		require_once("header.php");

		$stmt = $pdo -> query("SELECT id, colorName, hexa FROM color");

		echo "<main>";
		echo "<section>";
		echo "<article>";
		echo "\t<form method=\"POST\" action=\"searchCombination.php\">\n";
		foreach ($stmt as $row) {
				if ($row["colorName"] == "white") {
						echo '<button title="' . ucWords($row['colorName']) . '" style="border:1px solid black; background-color:' . $row['hexa'] . '" name="hexaQuery' . '" ' . 'value="' . $row["hexa"] . '"></button>';
				} else {
						echo '<button title="' . ucWords($row['colorName']) . '" style="background-color:' . $row['hexa'] . '" name="hexaQuery' . '" ' . 'value="' . $row['hexa'] . '"></button>';
				}
		}

				echo "<div class=\"color add\" title=\"Click To Add A New Color\"></div>\n";
				echo "\t</form>\n";
				echo "</div>";

				echo "<aside class=\"bottom\">";
				echo "<div class=\"add\" title=\"Click To Add A New Color\"><a href=\"colorInsert.php\">+</a></div>";
				echo "</aside>";

				require_once("footer.php");
?>

