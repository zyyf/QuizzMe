<?php
	include("include/function.php");
	session_start();
	$userdb = userdb();
	

	if(isset($_POST["account"])) {
		if (file_exists($userdb."/".$_POST["account"])) {    //account is exist
			if ($_POST["password"] === get_psw($_POST["account"])) {   //  password is correct
				$_SESSION["account"] = $_POST["account"];
				$account = $_SESSION["account"];
				$grade = $_SESSION["grade"];
				$time = $_SESSION["time"];
				file_put_contents("userDB/$account/history.txt", 
				$time." ".$grade."\n",FILE_APPEND);

				header("location:user-menu.php");
			}
			else {
				//password is wrong
				header("location:result.php?error=2");
				die();
			}
		}
		else {
			//account is not exist
			header("location:result.php?error=3");
			die();
		}
	}
?>
