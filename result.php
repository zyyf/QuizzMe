<?php
	include("include/function.php");
	session_start();
	if(isset($_SESSION["account"])){
		$account = $_SESSION["account"];
	}
	$grade = $_SESSION["grade"];
?>

<!DOCTYPE html>
<html lang="en">
<!-- "zh-cn" for Chinese, "en" for English -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Result - QuizzMe!</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/result.css" rel="stylesheet">
</head>

<body>
	<header>
		<img id="head__logo--img" src="img/logo.png" alt="logo" height="50px">
		<div id="head__user-info">
			<img id="head__user-info--img" src="img/user-icon.png" alt="avatar">
			<span id="head__user-info--name">
			<?php
			if(isset($_SESSION["account"])){
				echo get_name($_SESSION["account"]);
			}
			else{
				echo "Guest";
			}
			?>
			</span>
		</div>
		<?php
			if (isset($_SESSION["account"])) {
		?>
		<ul id="head__menu">
			<a href="user-menu.php">
				<li class="head__menu--choice">overview</li>
			</a>
			<a href="logout.php">
				<li class="head__menu--choice">login out</li>
			</a>
		</ul>
		<?php  
			}
		?>
	</header>

	<div class="main-container" id="notice">
		<h1>Congratulations!</h1>
		<p>You got <span class="score"><?= $grade ?></span> in this quiz !</p>
	</div>
	<?php
	if(isset($_SESSION["account"])){
	?>
	<div class="main-container" id="tips1">
		<p>
			Your score have been automatically saved, you can check them at any time in
			<a href="history.php">view history</a>.
		</p>
	</div>
	<?php
		}else{
	?>
	<div class="main-container" id="tips2">
		<p>
			You have not login, your score will not be saved. If you want to save your score to check them later, just
			<span class="sign-link" id="signin-link">sign in</span>. If you don't have a <span class="web-name">QuizzMe!</span>account,
			 you can <span class="sign-link" id="signup-link">sign up</span> and get an account.
		</p>
	</div>
	<?php } ?>

	<div class="form-hidden">
		<form action="signup-result.php" id="signup__form" method="POST">
			<p class="close-icon close">×</p>
			<p id="signup__form--title">Join <img src="img/logo-blue.png"> today.</p>
			<input type="text" name="full-name" placeholder="Full name" required>
			<input type="text" name="account" placeholder="Account name" id="signup__form--account" required>
			<p id="signup__form--error"><span class="cross">X</span> This account is already registered. Please try a new one.</p>
			<input type="password" name="password" placeholder="Password" id="singnup__form--password">
			<p id="signup__form--warning">Your password must be at least 6 characters without any blank.</p>
			<input type="submit" name="submit" id="signup__form--button" value="Sign up">
			<p class="signup__form--notice">Having a QuizzMe! account? <span id="signup__form--signin">sign in >></span>.</p>
		</form>
		<div class="float-background close"></div>
	</div>

	<div class="form-hidden">
		<form action="signin-result.php" id="signin__form" method="POST">
			<p class="close-icon close">×</p>
			<div id="signin__form--logo"><img src="img/logo-blue.png" alt="QuizzMe!"></div>
			<input type="text" name="account" placeholder="Account name" id="signinaccount" required>
			<p id="signin__form--accounterror"><span class="cross">X</span> This account is not exist.</p>
			<input type="password" name="password" placeholder="Password" id="signinpassword" required>
			<p id="signin__form--passworderror"><span class="cross">X</span> Password is wrong!</p>
			<input type="submit" name="submit" id="signin__form--button" value="Sign in">
			<p class="signin__form--notice">Don't have an account?<span id="signin__form--signup">Sign up >></span>.</p>
		</form>
		<div class="float-background close"></div>
	</div>

	<div id="errornum" hidden><?= $_GET["error"] ?></div>


	<script src="js/menu.js" type="text/javascript"></script>
	<script src="js/result.js" type="text/javascript"></script>
</body>

</html>