<?php
	include("include/function.php");
	session_start();
	if (!isset($_SESSION["account"])) {
		header("location:home.php?type=nologin");
	}
?>

<!DOCTYPE html>
<html lang="en">  <!-- "zh-cn" for Chinese, "en" for English -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add question - QuizzMe!</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/add-question.css" rel="stylesheet">
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
			<a href="user-menu.php"><li class="head__menu--choice">overview</li></a>
			<a href="log"><li class="head__menu--choice">login out</li></a>
		</ul>
	</header>

	<form action="add-form.php" method="POST" id="Qinput">
		<div class="main-container" id="Qinput__type">
			<p class="Qinput-title">Ⅰ Question type</p>
			<div id="Qinput__type--option">
				<label id="Qinput__type--labels"><input type="radio" name="Qtype" value="single"><span>Single-choice</span></label>
				<label id="Qinput__type--labelm"><input type="radio" name="Qtype" value="multiple"><span>Multiple-choice</span></label>
			</div>
		</div>

		<div class="main-container" id="Qinput__classify">
			<p class="Qinput-title">Ⅱ Question classification</p>
			<input type="text" name="new-classification" id="Qinput__classify--new" placeholder="What?">
			<select name="Qclassify" id="Qinput__classify--select">
				<option value="" disabled selected>Choose a classification</option>
				<?php
					$quizzType = file("quizzDB/quizzType.txt",FILE_IGNORE_NEW_LINES);
 					for($i=0; $i<count($quizzType); $i++){
 				?>
 				<option value="<?= $quizzType[$i] ?>">
 					<?= $quizzType[$i] ?>
 				</option>
				 <?php
				}
 				?>
				<option value="other">Other</option>
			</select>
		</div>

		<div class="main-container" id="Qinput__title">
			<p class="Qinput-title">Ⅲ Question title</p>
			<input type="text" name="Qtitle" id="Qinput__title--content" placeholder="Input the title of question here">
		</div>

		<div class="main-container" id="Qinput__option">
			<p class="Qinput-title">Ⅳ Option ( number of options: 3~6 )</p>
			<ul id="Qinput__option--list">
				<li class="Qinput__option--list-node">
					<img src="img/cross.png">
					<label>Option 1:<input type="text" name="option1" class="Qinput__option--label" placeholder="Input option here"></label>
				</li>
				<li class="Qinput__option--list-node">
					<img src="img/cross.png">
					<label>Option 2:<input type="text" name="option2" class="Qinput__option--label" placeholder="Input option here"></label>
				</li>
				<li class="Qinput__option--list-node">
					<img src="img/cross.png">
					<label>Option 3:<input type="text" name="option3" class="Qinput__option--label" placeholder="Input option here"></label>
				</li>
				<li class="Qinput__option--list-node">
					<img src="img/cross.png">
					<label>Option 4:<input type="text" name="option4" class="Qinput__option--label" placeholder="Input option here"></label>
				</li>
				<li id="Qinput__option--add">＋ Add more option</li>
			</ul>
			<p id="Qinput__option--ensure">Confirm</p>
			<p id="Qinput__option--edit">Edit</p>
		</div>

		<div class="main-container" id="Qinput__submit">
			<p class="Qinput-title">Ⅵ Check &amp; Submit</p>
			<input type="submit" name="submit" value="Submit" id="Qinput__submit--submit">
		</div>
	</form>

	<footer>
		<p>It's a project of IWP. &copy; ZhouyangYifan TangPeixian QiXuebin</p>
	</footer>

    <script src="js/menu.js" type="text/javascript"></script>
    <script src="js/add-question.js" type="text/javascript"></script>
</body>
</html>