<?php 
	require('connectDB.php');


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 		<script src='js/jquery-3.1.1.min.js'></script>
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 	<title>管理员登录</title>
	 	<style> 
		body{background-image: url('body_bg.jpg');}
		.content{color: white;background-color: rgba(0,0,0,0.5);padding: 80px 0;width: 95%;border-radius: 20px;margin: 0 auto;margin-top: 100px;}
	 	</style>
 </head>
 <body>
 	<div class="content">
 		<form class="form-horizontal">
 			<div class="form-group">
 				<label for="" class="control-label col-sm-2">帐号</label>
 				<div class="col-sm-9">
 					<input type="text" name="account" id="account" class="form-control">
 				</div>
 			</div>
 			<div class="form-group">
 				<label for="" class="control-label col-sm-2">密码</label>
				<div class="col-sm-9">
					<input type="password" name='password' id="password" class="form-control">		
				</div>	
 				
 			</div>
			<div class="form-group text-center" >
				<button type="button" id="btn" class="btn btn-default">登录</button>
			</div>
			<div class="form-group text-center">
				<span class="help-block " id="tip"></span>
			</div>
		 	
 		</form>
	 	
 	</div>
 		


 	<script >
 		$('#btn').click(function(){
 			var account = $('#account').val();
 			var password = $('#password').val();
 			$.ajax({
 				url: 'adminAct.php',
 				type: 'POST',
 				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
 				data: {"account": account,"password":password},
 			})
 			.done(function(data) {
 				$('#tip').text(data.msg);
 				if(data.success){
 					location.href = 'admin.php';
 				}
 			})
 			.fail(function() {
 				console.log("error");
 			})
 			.always(function() {
 				console.log("complete");
 			});
 			
 		});
 	</script>
 </body>
 </html>