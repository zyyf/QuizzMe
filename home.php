<!DOCTYPE html>
<html lang="en">  <!-- "zh-cn" for Chinese, "en" for English -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home - QuizzMe!</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">
</head>
<body>

	<header>
		<img id="head__logo--img" src="img/logo.png" alt="logo" height="50px">
		<span class="head__login" id="head__login--signin"><img src="img/user-sign.png"><span>Sign in</span></span>
		<span class="head__login" id="head__login--signup"><img src="img/user-sign.png"><span>Sign up</span></span>
	</header>

	<div class="main-container" id="welcome__intro">
		 	<h1 id="welcome__intro--title">Welcome to <span class="web-name">QuizzMe!</span></h1>
		 	<p><span class="web-name">QuizzMe!</span>is an application to do Single and Multiple Choice Question quizzes online in various topics. You can test your knowledge by making quizzes but it can also supply new questions and store them in the database.</p>
		 	<p>Now, you can sign up and complete a quiz, and the result will save in the server, that you will be able to check your score with your account later.</p>
	</div>

	<div class="main-container" id="user-action">
		<p id="user-action__msg">You can also start a quick quiz without login:<a href="quizzGuest.php"  class="welcome__link">Quick quiz</a></p>
	</div>

	<div class="form-hidden">
		<form action="signup_form.php" id="signup__form" method="POST">
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
		<form action="signin_form.php" id="signin__form" method="POST">
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

	<footer>
		<p>It's a project of IWP. &copy; ZhouyangYifan TangPeixian QiXuebin</p>
	</footer>

	<script type="text/javascript" src="js/home.js"></script>
</body>
</html>