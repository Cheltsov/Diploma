<?php

require_once 'config.php';

$data = file_get_contents(LINK);

$courses = json_decode($data, true);

/*echo('<pre>');
print_r($courses);
echo('</pre>');
*/

$EUR = $courses[0];
$RUR = $courses[1];
$USD = $courses[2];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Курс валют ПриватБанка</title>
	<style>
		td{
			width:80px;
			height: 50px;
			text-align: center;
		}
	</style>
</head>
<body>
	<table border="1px" >
		<tr>
			<td><?php echo $RUR['ccy']; ?></td>
			<td><?php echo $RUR['buy']; ?></td>
			<td><?php echo $RUR['sale']; ?></td>
		</tr>
		<tr>
			<td><?php echo $EUR['ccy']; ?></td>
			<td><?php echo $EUR['buy']; ?></td>
			<td><?php echo $EUR['sale']; ?></td>
		</tr>
		<tr>
			<td><?php echo $USD['ccy']; ?></td>
			<td><?php echo $USD['buy']; ?></td>
			<td><?php echo $USD['sale']; ?></td>
		</tr>

	</table>

</body>
</html>