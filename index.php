<?php 
	header('content-type:text/html;charset=utf8');
	require('connectDB.php');
	$sql = 'select * from course order by id';
	$res = $conn->query($sql);
	$rows = $res->fetch_all(MYSQLI_ASSOC);
	foreach ($rows as $row) {
		$courses[] = $row['course'];
		$titles[] = $row;
	};
	$courses = array_unique($courses);


// print_r($titles);

 ?>


 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src='js/jquery-3.1.1.min.js'></script>
	<script src='demo/pucker/js/pucker.js'></script>
	<link rel="stylesheet" type="text/css" href="demo/pucker/css/pucker.css">
	<title>Document</title>
</head>
<body>
	<div id="list">
		<?php foreach ($courses as $course) : ?>
				 <ul class='parent'>
					<div class='title'>
						<?php echo $course; ?>
					</div>
					<div class='item-content'>
						<?php  $i=0; foreach ($titles as $title) {
								
							if($title['course']===$course){
								$i+=1;
								echo "<li class='item'><a href='{$title['link']}'' title=''>{$i}.{$title['title']}</a></li>";
							}
							
						} ?>
					</div>
				</ul> 
		<?php endforeach; ?>
		
		
		
	</div>
	

	
</body>
<script >
window.onload = function(){
	pucker();
}


</script>
</html>