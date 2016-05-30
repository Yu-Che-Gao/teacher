<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once("./globefunction.php");
require_once("./mysql_connect.inc.php");

show_popup_alert();  /* 自訂提醒視窗 globefunction.php */

$teacherName = $_POST['teacherName'];
$overtime    = $_POST['overtime'];
$overtimeNum = $_POST['overtimeNum'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];
$subject5 = $_POST['subject5'];

if($teacherName=="")
{	?>
	<script>
		popup_modal_alert("error","請填寫「教師姓名」!","javascript: history.back()");
	</script>
	<?php
	die();
}
else
{
	if($overtime=="true" && $overtimeNum=="")
	{	?>
		<script>
			popup_modal_alert("error","請填寫「超鐘點節數」!","javascript: history.back()");
		</script>
		<?php
		die();
	}
	else 
	{
		$result = mysql_query("SELECT * FROM teacher_info WHERE name='$teacherName'");
		$list = mysql_fetch_array($result);
		
		if($overtime=="false")
			$overtimeNum = 0;
		$tid = $list['tid'];
		$totalClass = $list['realClass'] + $overtimeNum;
	}
}
?>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>彌陀國小線上排課系統─意願調查確認</title>
	<link rel="stylesheet" type="text/css" href="css/style_teacher.css"/>
	<link rel="stylesheet" type="text/css" href="popup_window/styles_popup_window.css">
</head>

<body>
	<div class="main">
		<?php include("teacherbutton.php"); ?>
		
		<div class="content" style="text-align:center;">
			<h1 style="color:#CC00EE;"><?php echo $teacherName; ?>老師</h1>
			<div class="showClass">
				基本節數：<?php echo $list['jobClass']; ?>		<br/>
				減課節數：<?php echo $list['subClass']; ?>		<br/>
				超鐘結數：<?php echo $overtimeNum; ?>	<br/>
				總節數：<?php echo $totalClass; ?>
			</div>
			
			<table id="resultTable">
				<tr>
					<th colspan="2">意願科目</th>
				</tr>
				<tr>
					<td width="50%">意願一</td>
					<td width="50%"><?php echo $subject1; ?></td>
				</tr>
				<tr>
					<td>意願二</td>
					<td><?php echo $subject2; ?></td>
				</tr>
				<tr>
					<td>意願三</td>
					<td><?php echo $subject3; ?></td>
				</tr>
				<tr>
					<td>意願四</td>
					<td><?php echo $subject4; ?></td>
				</tr>
				<tr>
					<td>意願五</td>
					<td><?php echo $subject5; ?></td>
				</tr>
			</table>
			
			<form id="teachercheck" method="post" action="teachercheck_update.php">
				<input type="hidden" name="tid"			value="<?php echo $tid; ?>" />
				<input type="hidden" name="exceedClass" value="<?php echo $overtimeNum; ?>" />
				<input type="hidden" name="totalClass"  value="<?php echo $totalClass; ?>" />
				<input type="hidden" name="subject1" 	value="<?php echo $subject1; ?>" />
				<input type="hidden" name="subject2" 	value="<?php echo $subject2; ?>" />
				<input type="hidden" name="subject3" 	value="<?php echo $subject3; ?>" />
				<input type="hidden" name="subject4" 	value="<?php echo $subject4; ?>" />
				<input type="hidden" name="subject5" 	value="<?php echo $subject5; ?>" />
				
				<div class="btnBlueDiv">
					<input type="button" value="返回修改" class="btnBlue" onclick="javascript:history.back()"/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="確認送出" class="btnBlue" onclick="popup_modal_submit('您確定要送出嗎？')"/>
				</div>
				
				<!-- 自訂 提醒視窗 -->
				<?php show_popup_model();  /* globefunction.php */ ?>
			</form>
		</div>
	</div>
	
	<!-- jQuery：自訂提醒視窗 -->
	<?php popup_model_submit_javascript("teachercheck");  /* globefunction.php 有form的時候 */ ?>
</body>
</html>