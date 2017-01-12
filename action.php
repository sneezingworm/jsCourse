<?php
session_start();
error_reporting(E_ALL^E_NOTICE^E_WARNING);
require('connectDB.php');
header("Content-Type:application/json;charset=utf8"); 
$act = $_REQUEST['act'];
$course = $_POST['course'];
$title = $_POST['title'];
$link = $_POST['link'];
$id = $_REQUEST['id'];

function verify($conn,$course,$title){
	$course = $_POST['course'];
	$title = $_POST['title'];
	$link = $_POST['link'];
	$sql1 = 'select * from course ';
	$res = $conn->query($sql1);
	$rows = $res->fetch_all(MYSQLI_ASSOC);
	$result='{"success":true,"msg": "操作成功"}';	
	foreach ($rows as $row) {
		$titles[] =  $row['title'];
	}
	if(in_array($title,$titles)){
		$result = '{"success":false,"msg":"文章已存在"}';
		
	}else if($course==''||$title ==''){
		$result = '{"success":false,"msg":"章节和标题都不能为空"}';
		
	}
	return $result;
}
//当提交数据时进行的处理
if($act==='addCourse'){
	if(json_decode(verify($conn,$course,$title))->success){
		
		$sql = "insert into course (course,title,time,link) values ('$course','$title',now(),'$link')";
		$res = $conn->query($sql);
		if($res){
			$result = '{"success":true,"msg":"文章插入成功"}';
		}else{
			$result = '{"success":false,"msg":"出现错误".$conn->error}';
		}	
	}else{
		$result = verify($conn,$course,$title);
	}	
	echo $result;
	//当修改数据时进行的处理
}else if($act=='update'){
		if(json_decode(verify($conn,$course,$title))->success){
			$sql = "update course set course = '{$course}',title = '{$title}',link = '{$link}',time = now() where id = '{$id}'";
			if($conn->query($sql)){
				$result='{"success":true,"msg": "更新成功"}';	
			}else{
				$result='{"success":false,"msg": "更新失败"}';	
			}		
		}else{
			$result = verify($conn,$course,$title);
		};	
	echo $result;
}else if($act=='delete'){
	$sql = 'delete from course where id='.$id;
	$res = $conn->query($sql);
	if($res){
		$result = '{"success":true,"msg": "删除成功"}';	
	}else{
		$result = '{"success":true,"msg": "删除失败"}';	
	}
	echo $result;
}else if($act=='exit'){
	if($_SESSION){
		$_SESSION = array();
		session_destroy();
		header("Location:login.php");
     	exit();
	}
}
	



?>