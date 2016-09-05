<?php 
	include("include/function.php");
	session_start();
	session_destroy();
	session_regenerate_id(TRUE); 
	header("location:home.php");
?>
