<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once("./mysql_connect.inc.php");
?>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>彌陀國小線上排課系統─課表查詢</title>
	<link rel="stylesheet" type="text/css" href="css/style_teacher.css"/>
</head>

<body>
	<div class="main">
		<?php include("teacherbutton.php"); ?>
		
		<div class="content" style="text-align:center;">
			教師：
			<select name="teacher">
				<option value="all">----尚未選擇----</option>
				<?php
				$sqlTeacher = "SELECT * FROM teacher_info";
				$resultTeacher = mysql_query($sqlTeacher);
				
				while($listTeacher = mysql_fetch_array($resultTeacher))
				{
					echo '<option value="'.$listTeacher['tid'].'">'.$listTeacher['name'].'</option>';
				}
				?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			班級：
			<select name="class">
				<option value="none">----尚未選擇----</option>
				<?php
				$sqlClass = "SELECT * FROM class_info";
				$resultClass = mysql_query($sqlClass);
				
				while($listClass = mysql_fetch_array($resultClass))
				{
					echo '<option value="'.$listClass['cid'].'">'.$listClass['className'].'</option>';
				}
				?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			教室：
			<select name="room">
				<option value="none">----尚未選擇----</option>
				<?php
				$sqlRoom = "SELECT * FROM room_info";
				$resultRoom = mysql_query($sqlRoom);
				
				while($listRoom = mysql_fetch_array($resultRoom))
				{
					echo '<option value="'.$listRoom['rid'].'">'.$listRoom['roomName'].'</option>';
				}
				?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="送出" style="font-size:18px;"/>
			<br/><br/>
		</div>
	</div>
</body>
</html>