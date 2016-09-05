<?php 
	include("include/function.php");
	session_start();
?>


<!DOCTYPE html>
<html lang="en">  <!-- "zh-cn" for Chinese, "en" for English -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quiz - QuizzMe!</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/quiz.css" rel="stylesheet">
</head>
<body>
    <header>
		<img id="head__logo--img" src="img/logo.png" alt="logo" height="50px">
		<div id="head__user-info">
			<img id="head__user-info--img" src="img/user-icon.png" alt="avatar">
			<span id="head__user-info--name">
			<?php 
				if (isset($_SESSION["account"] )) {
					$account = $_SESSION["account"];
			?>
			<?= get_name($account) ?>
			<?php } ?>					
			</span>
		</div>
		<?php 
			if (isset($_SESSION["account"])) {
		?>
		<ul id="head__menu">
			<a href="#"><li class="head__menu--choice">overview</li></a>
			<a href="logout.php"><li class="head__menu--choice">login out</li></a>
		</ul>
		<?php  } ?>
	</header>

	<form action="point.php" method="POST">
		<div class="main-container" id="single-choice">
			<div id="single-choice__title">Ⅰ Single choice</div>
			<?php
				$quizzType = "single"; 
				$typePath = typePath($quizzType);
				$randomQuizz = get_quizz($typePath);
				// $recordPath = "userDB/$account/$quizzType/*";
				// $recordNum = count(glob($recordPath));
				for($num=0; $num<count($randomQuizz); $num++) {
					$classify = get_classify($randomQuizz[$num]);
					$title = get_title($randomQuizz[$num]);
					$option = get_option($randomQuizz[$num]);
					$answer = get_answer($randomQuizz[$num]);
					$quizzNUM = $num+1;
			?>
			<input type="hidden" name="singleInfo<?= $num ?>" value="<?=$randomQuizz[$num]?>">
			<input type="hidden" name="singleAns<?= $num ?>" value="<?= $answer?>">
			<div class="single-choice__question-title">
			<p class="single-choice__question-title--content">
			<span class="single-choice__question-title--question-order">
				<?= "$quizzNUM" ?>
			</span>
			<?= $title ?>
			<span class="single-choice__question-title--classify">
				<?= $classify ?>
			</span>
			</p>
			</div>
				<div class="single-choice__>option-list">
				<?php	
					for($i=0 ; $i <count($option); $i++){
				?>
					<label class="single-choice__option-list--label">
					<input type="radio" class="single-choice__option-list--radio" name="single-choice<?= $num?>" value="<?= $i+ 1?>">
					<span class="single-choice__option-list--content">
					<p><?= $option[$i] ?></p>
					</span>
					</label>
			<?php
					}
			?>
				</div>
			<?php
					}
			?>	
		</div>

		<div class="main-container" id="multiple-choice">
			<div id="multiple-choice__title">Ⅱ Multiple choice</div>
			<?php
				$quizzType = "multiple"; 
				$typePath = typePath($quizzType);
				$randomQuizz = get_quizz($typePath);
				for($num=0; $num<count($randomQuizz); $num++) {
					$classify = get_classify($randomQuizz[$num]);
					$title = get_title($randomQuizz[$num]);
					$option = get_option($randomQuizz[$num]);
					$answer = get_answer($randomQuizz[$num]);
					$quizzNUM = $num+1;
			?>
			<input type="hidden" name="multiInfo<?= $num ?>" value="<?=$randomQuizz[$num]?>">
			<input type="hidden" name="multiAns<?= $num ?>" value="<?= $answer?>">
			<div class="multiple-choice__question-title">
			<p class="multiple-choice__question-title--content">
			<span class="multiple-choice__question-title--question-order">
				<?= "$quizzNUM" ?>
			</span>
			<?= $title ?>
			<span class="single-choice__question-title--classify">
				<?= $classify ?>
			</span>
			</p>
			</div>
			<div class="multiple-choice__>option-list">
				<?php	
					for($i=0 ; $i <count($option); $i++){
				?>
					<label class="multiple-choice__option-list--label">
					<input type="checkbox" class="multiple-choice__option-list--checkbox" name="multiple-choice<?= $num?>" value="<?= $i+ 1?>">
					<span class="multiple-choice__option-list--content">
					<p><?= $option[$i] ?></p>
					</span>
					</label>
			<?php
					}
			?>
			</div>
			<?php
					}
			?>	
		</div>

		<div class="main-container" id="check-msg">
			<p id="check-msg__time-left">Time left : <span id="check-msg__time-left--time">20:00</span></p>
			<input type="button" value="">
			<input type="submit" value="Finish quiz" id="check-msg__submit--button">
		</div>
	</form>

	<footer>
		<p>It's a project of IWP. &copy; ZhouyangYifan TangPeixian QiXuebin</p>
	</footer>

	<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>