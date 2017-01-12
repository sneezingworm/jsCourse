<?php 
	function isLogin(){
		session_start();
		if(!$_SESSION['account']){
			header("Location: login.php");
		    exit();
		}
	}
	

 ?>