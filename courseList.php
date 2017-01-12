<?php 
require('func.php');
isLogin();
header('content-type:text/html;charset=utf8');
require('connectDB.php');
$sql = 'select * from course order by course';
$res = $conn->query($sql);
$rows = $res->fetch_all(MYSQLI_ASSOC);

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
<!--  	<style>
 		tr{height: 40px;border-bottom: 1px solid #111;}
 		td{margin: 10px;padding: 10px;background: #eee}
 	</style> -->
 	<title>courseList</title>
 </head>
 <body>
 <div id='state'>
 	
 </div>
 <table  class="table table-hover text-center table-striped table-bordered"> 
 	<tr style="background: #aaa" >
 		<td>章节</td>
 		<td>标题</td>
 		<td>链接</td>
 		<td>时间</td>
 		<td>操作</td>
 	</tr
 	<?php  foreach ($rows as $row): ?>
		<tr>
			<td><?php echo $row['course']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo "<a href='{$row['link']}' >{$row['link']}</a>"; ?></td>
			<td><?php echo $row['time']; ?></td>
			<td><?php echo  "<button class='button'  num={$row['id']}>删除</button>|<a href='update.php?id={$row['id']}' title=''>修改</a>" ; ?> </td>
		</tr>
 	<?php endforeach; ?>	
 </table>	
	<script >
		window.onload = function(){
			$('.button').click(function(){
				if(confirm('删除后将不能恢复，确定删除？')){
					$that = $(this);
					var id = $(this).attr('num');
					$.ajax({
						url: 'action.php',
						type: 'POST',
						data: {"id": id,"act":"delete"},
					})
					.done(function(data) {
						if(data.success){
							$('#state').text(data.msg);
							$that.closest('tr').css('display','none');
						}else{
							$('#state').text(data.msg);
						}
					})
					.fail(function(error) {
						$('#state').text(error.status);
					})
					.always(function() {
						console.log("complete");
					});
				}		
			});
		}
	</script>
 
 </body>
 </html>