<?php
	include("include/function.php");
	session_start();
	$account = $_SESSION["account"];
?>

<!DOCTYPE html>
<html lang="en">  <!-- "zh-cn" for Chinese, "en" for English -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User menu - QuizzMe!</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/user-menu.css" rel="stylesheet">
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
			<a href="logout.php"><li class="head__menu--choice">login out</li></a>
		</ul>
	</header>

	<div class="main-container" id="user-status">
		<p>Hello <?= get_name($_SESSION["account"])?>!</p>
		<p>Welcome back to <span class="web-name">QuizzMe!</span></p>
			<?php
				$history = get_history($account);
				$try = get_try($history);
				$ave = get_ave($history);
				if($try!= 0){
		?>
		<p id="user-status__intro">You have completed quizzes
		<span id="user-status__intro--times">
			<?= $try ?>
		</span> times, and got an average of
		<span id="user-status__intro--average">
			<?= $ave ?>
		</span> points.
		</p>
		<?php
			}
			else{
		?>
			<p id="user-status__intro">You haven't take a quizz!</p>
		<?php
			}
		?>
	</div>

	<div class="main-container" id="user-action">
		<table id="user-action__table">
			<tbody>
				<tr>
					<td>
						Now, you can start a random quizz
					</td>
					<td>
						<a href="quizz.php"><input type="button" value="Start a quiz"></a>
					</td>
				</tr>
				<tr>
					<td>
						You can also add question to the Q&amp;A pool
					</td>
					<td><a href="add-question.php"><input type="button" value="Add question"></a></td>
				</tr>
				<tr>
					<td>
						To view your history information
					</td>
					<td><a href="history.php"><input type="button" value="View history"></a></td>
				</tr>
			</tbody>
		</table>

	</div>

	<footer>
		<p>It's a project of IWP. &copy; ZhouyangYifan TangPeixian QiXuebin</p>
	</footer>

	<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>