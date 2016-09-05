<?php 
	include("include/function.php");
	session_start();
	$quizzdb = quizzdb();

	$type = $_POST["Qtype"];
	$classify = $_POST["Qclassify"];
	
	if($classify == "other"){
	//make a new dirction
		$classify = $_POST["new-classification"];
		file_put_contents("quizzDB/quizzType.txt", $classify."\n",FILE_APPEND);
	}
 	
 	$sum_quizz = glob("$quizzdb/$type/*");
 	$quizzNum = count($sum_quizz)+1;
	$title = $_POST["Qtitle"];
 	//write type and title
 	file_put_contents("$quizzdb/$type/$quizzNum.txt", $classify."\n");

 	file_put_contents("$quizzdb/$type/$quizzNum.txt", $title."\n",FILE_APPEND);
	
	//get answer
	$answer = implode(" ",$_POST["option"]);
	file_put_contents("$quizzdb/$type/$quizzNum.txt", $answer."\n",FILE_APPEND);

	//get the option and write 
	$option  = array();
	for($i=1; $i<=6; $i++){
		if(isset($_POST["optioncontent".$i])){
			array_push($option, $_POST["optioncontent".$i]);
		}
		else{
			break;
		}
	}
	for ($i=0; $i<count($option) ; $i++ ){ 
		file_put_contents("$quizzdb/$type/$quizzNum.txt", $option[$i]."\n",FILE_APPEND);
	}
	

	header("location:user-menu.php");
 ?>