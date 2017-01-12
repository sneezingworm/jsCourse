<?php 
	session_start();
	header('content-type:application/json;charset=utf8');
	require('connectDB.php');

	if($_POST){
		$account = $_POST['account'];
		$password = $_POST['password'];
		if($account==''){
			$result = '{"success":false,"msg":"账号不能为空"}';
		}else if($password==''){
			$result = '{"success":false,"msg":"密码不能为空"}';
		}else{
			$sql = 'select * from admin where account = '."'{$account}'";
			$res = $conn->query($sql);
			if($res){
				$row = $res->fetch_assoc();
				$psd = $row['password'];
				if($psd==$password){
					$result = '{"success":true,"msg":"登陆成功"}';
					$_SESSION['account'] = $account;
				}else{
					$result = '{"success":false,"msg":"密码错误"}';
				}
			}else{
				$result = '{"success":false,"msg":"帐号不存在"}';
			}
		}

		echo $result;
	}
 ?>