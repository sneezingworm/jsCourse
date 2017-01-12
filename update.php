<?php 
	require('connectDB.php');
	$id = $_GET['id'];
	$sql = 'select * from course where id ='.$id;
	$res = $conn->query($sql);
	$row = $res->fetch_assoc();
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
 	<title>update</title>
 

 </head>
 <body>
 		<input id="id" type="hidden" name="" value=" <?php echo $id; ?> ">
 		<label for="">章节</label>
 		<input type="text" name="course" id="course" required="required" value="<?php echo $row['course']; ?>"><br>
 		<label for="">标题</label>
 		<input type="text" name="title" id="title" required="required" value="<?php echo $row['title']; ?>"><br>
 		<label for="">链接</label>
 		<input type="text" name='link' id="link" required="required" value="<?php echo $row['link']; ?>"><br>
 		<button  name="" value="" style="margin: 0 auto;text-align: center;width: 50px;margin: 0 auto;display: block;" onclick="commit()">修改</button>
 		<span id="span"></span>
 	
 	<script >
	
 	function commit(){
		var course = $('#course').val();
 		var title = document.getElementById('title').value;
 		var link = document.getElementById('link').value;
 		var id = $('#id').val();
 		var aa = $.ajax({
 			url: 'action.php',
 			type: 'POST',
 			data: {"course": course,"title":title,"link":link,"act":'update',"id":id},
 			success:function(data){
 				if(data.success){
 					 $('#span').text(data.msg);
 					 location.href = 'courseList.php';
 				}else{
 					$('#span').text(data.msg);	
 				}
 				


 			},
 			error:function(error){
 				$('#span').html(error);
 				//console.log(error);
 			}
 			
 		});
 		
  		

 	}
 		
 		
 	</script>
 </body>
 </html>