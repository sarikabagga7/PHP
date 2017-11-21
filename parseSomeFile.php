<html>
	<head>
		<title>HELLO!!!!</title>
		<style>
			td
			{
				border: 2px solid peru;
			}
			
		</style>
	</head>
	<body>
	
	
<?php

require 'Shipping.php';

$someFile = file('someFile.txt');

echo '<table>';

foreach($someFile as $line)
{
	$shippingLine = Shipping::parseLine($line);
	
	echo "<tr>";
	
	foreach($shippingLine as $cell)
	{
		echo '<td>', $cell, '</td>';
	}
	
}

echo '</table>';

?>

</body>
</html>