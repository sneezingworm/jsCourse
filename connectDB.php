<?php 
	$conn = new mysqli('localhost','root','root','mydemo');
	if($conn->connect_errno){
		echo $conn->connect_error;
	}

 ?>