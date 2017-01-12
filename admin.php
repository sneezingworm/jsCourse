<?php 
	// session_start();
	require('func.php');
	isLogin();
	header('content-type:text/html;charset=utf8');

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>admin</title>
 	<script src='js/jquery-3.1.1.min.js'></script>
 	<style type="text/css">
 	a{color: black;text-decoration: none}
 		.ctList{ #777;width: 10%;color: black;list-style: none;border-right: 2px solid #222}
 		.ctList li a{display: block;height: 30px;background: #ddd;text-align: center;margin-bottom: 1px ;line-height: 30px}
 		.main{width: 85%; }
 		.content div{float: left}
 		.top{height: 40px;line-height: 40px;text-align: center;font-size: 30px}
 	</style>
 </head>


<!--  <frameset cols="10%,90%">

  <frame src="actionList.html">
  <frame src="main.php" name='mainframe'>
  

</frameset> -->
	<div class="top">
			<?php echo $_SESSION['account']; ?>欢迎登录课程管理系统
		</div>
	<div style="width: 100%;float: left; yellow" class="content">
		
		<div class="ctList">
			<li><a href="addCourse.php" target="main">添加课程</a></li>
			<li><a href="index.php" target="main">课程列表</a></li>
			<li><a href="courseList.php" target="main">查看课程</a></li>
			<li><a href="action.php?act=exit" title="">退出系统</a></li>
		</div>
		<div class="main">
			<iframe src="main.php" frameborder="0" name="main" width="100%;" height="900px;"></iframe>
		</div>
	</div>

	
	
 </html>