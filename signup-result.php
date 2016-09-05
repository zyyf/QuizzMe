<?php
	include("include/function.php");
	session_start();
	$userdb = userdb();
	//获得注册数据
	$fullname = $_POST["full-name"];
	$account = $_POST["account"];
	$psw = $_POST["password"];

	//检测账号是否已经存在
	$accounts = scandir("$userdb");
	foreach ($accounts as $check) {
		if($check == $account){
		//账号重复,error
		header("location:result.php?error=1");
		die();
		}
	}
		mkdir($userdb."/".$_POST["account"]);
		file_put_contents($userdb."/".$_POST["account"]."/info.txt", $_POST["full-name"]."\n");
		file_put_contents($userdb."/".$_POST["account"]."/info.txt", $_POST["account"]."\n", FILE_APPEND);
		file_put_contents($userdb."/".$_POST["account"]."/info.txt", $_POST["password"]."\n", FILE_APPEND);
		file_put_contents($userdb."/".$_POST["account"]."/history.txt","");
		$_SESSION["account"] = $_POST["account"];
		header("location:user-menu.php");
?>