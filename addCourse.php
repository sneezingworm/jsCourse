<?php 
	header('Content-type:text/html;charset=utf8');


 ?>
 <!DOCTYPE html>
 <html lang="en">

 <style>
 	input{margin: 10px;}
 	form{width: 500px;margin: 10px auto;text-align: center;}
 </style>
 <head>
 	<meta charset="UTF-8">
 		<script src='js/jquery-3.1.1.min.js'></script>
 	<title>addCourse</title>
 

 </head>
 <body>
 	
 		<label for="">章节</label>
 		<input type="text" name="course" id="course" required="required"><br>
 		<label for="">标题</label>
 		<input type="text" name="title" id="title" required="required"><br>
 		<label for="">链接</label>
 		<input type="text" name='link' id="link" required="required"><br>
 		<button  name="" value="" style="margin: 0 auto;text-align: center;width: 50px;margin: 0 auto;display: block;" onclick="commit()">提交</button>
 		<span id="span"></span>
 	
 	<script >
	
 	function commit(){
		var course = $('#course').val();
 		var title = document.getElementById('title').value;
 		var link = document.getElementById('link').value;

 		var aa = $.ajax({
 			url: 'action.php',
 			type: 'POST',
 			data: {"course": course,"title":title,"link":link,"act":'addCourse'},
 			success:function(data){
 				$('#span').text(data.msg);
 			},
 			error:function(error){
 				console.log(error);
 			}
 			
 		});
 		
  		

 	}
 		
 		
 	</script>
 </body>
 </html>