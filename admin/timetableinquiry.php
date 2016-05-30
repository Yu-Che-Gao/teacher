<!DOCTYPE html>
<?php session_start();
require_once("../globefunction.php");
require_once("../mysql_connect.inc.php");
require_once("./judge_login.php");
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>課表查詢</title>
	<link rel="stylesheet" type="text/css" href="../popup_window/styles_popup_window.css">
	<link rel="stylesheet" type="text/css" href="../css/styles_main.css"/>
	<link rel="stylesheet" type="text/css" href="../css/styles_login.css"/>
</head>
	
<body>
	<div id="menu">
		<?php menu();  /* globefunction.php */ ?>
	</div>
	
	<div style="text-align:center;">
		<font style="font-size:52px;">
			<b>課表查詢</b>
		</font>
	</div>
	
	<div style="width:90%; border:2px #ccc solid;padding:20px; background-color:#ECECFF; margin: 0px auto; text-align:center;" >
		<form>
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
		</form>
	</div>
</body>
</html>