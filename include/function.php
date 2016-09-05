<?php
function userdb() {
	return "userDB";
}

function get_account($login) {
	$info = file(userdb() . "/$login/info.txt",FILE_IGNORE_NEW_LINES);
	return $info[1];
}

function get_psw($login) {
	$info = file(userdb() . "/$login/info.txt",FILE_IGNORE_NEW_LINES);
	return $info[2];
}

function get_name($login) {
	$info = file(userdb() . "/$login/info.txt",FILE_IGNORE_NEW_LINES);
	return $info[0];
}

function quizzdb(){
	return "quizzDB";
}

function typePath($type){
	$quizzdb = quizzdb();
	return "$quizzdb/$type/*";
}

function get_quizz($typePath){
	$quizzSum = glob($typePath);
	shuffle($quizzSum);
	$quizzShow = array_slice($quizzSum,0,10);
	return $quizzShow;
}

function get_classify($quizz){
	$quizzData = file($quizz, FILE_IGNORE_NEW_LINES);
	return $quizzData[0];
}

function get_title($quizz){
	$quizzData = file($quizz, FILE_IGNORE_NEW_LINES);
	return $quizzData[1];
}

function get_answer($quizz){
	$quizzData = file($quizz, FILE_IGNORE_NEW_LINES);
	return $quizzData[2];
}

function get_option($quizz){
	$quizzData = file($quizz, FILE_IGNORE_NEW_LINES);
	$option = array_slice($quizzData,3);
	return $option;
}
function get_history($account){
	$history = file("userDB/".$account."/history.txt",FILE_IGNORE_NEW_LINES);
	return $history;
}

function get_try($history){
	$try = count($history);
	return $try;
}

function get_time($history){
	$times = array();
	for ($i=0; $i <count($history) ; $i++) { 
		$time = explode(" ",$history[$i]);
		array_push($times, $time[0]);
	}
	return $times;
}


function get_grades($history){
	$grades = array();
	for ($i=0; $i <count($history) ; $i++) { 
		$grade = explode(" ",$history[$i]);
		array_push($grades, $grade[1]);
	}
	return $grades;
}

function get_ave($history){
	$grades = get_grades($history);
	$try = get_try($history);
	if($try!=0){
		$sum = array_sum($grades);
		$ave = $sum/$try;
		return $ave;
	}
}

?>
