<?php
	include("include/function.php");
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- "zh-cn" for Chinese, "en" for English -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>History - QuizzMe!</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/history.css" rel="stylesheet">
</head>

<body>
	<header>
		<img id="head__logo--img" src="img/logo.png" alt="logo" height="50px">
		<div id="head__user-info">
			<img id="head__user-info--img" src="img/user-icon.png" alt="avatar">
			<span id="head__user-info--name">
			<?= get_name($_SESSION["account"]) ?></span>
		</div>
		<ul id="head__menu">
			<a href="user-menu.php">
				<li class="head__menu--choice">overview</li>
			</a>
			<a href="logout.php">
				<li class="head__menu--choice">login out</li>
			</a>
		</ul>
	</header>

	<div class="main-container">
		<table>
			<thead>
				<tr>
					<td>Date</td>
					<td>Score</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$account = $_SESSION["account"];
					$history = get_history($account);
					$try = get_try($history);
					$times =  get_time($history);
					$grades =  get_grades($history);
					for($i= 0; $i<$try; $i++){
				?>
				<tr>
					<td class="table-date"><?= $times[$i]?></td>
					<td class="table-score"><?= $grades[$i]?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td>
						<a href="user-menu.php" id="backbutton"><input type="button" value="Back"></a>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>



	<!-- a lot of elements -->
	<script src="js/menu.js" type="text/javascript"></script>
</body>

</html>