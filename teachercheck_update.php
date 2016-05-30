<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require_once("./globefunction.php");
require_once("./mysql_connect.inc.php");

show_popup_alert();  /* 自訂提醒視窗 globefunction.php */

$tid = $_POST['tid'];
$exceedClass = $_POST['exceedClass'];
$totalClass  = $_POST['totalClass'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];
$subject4 = $_POST['subject4'];
$subject5 = $_POST['subject5'];

$result = mysql_query("SELECT * FROM survey WHERE tid='$tid'");
$countResult = mysql_num_rows($result);
if($countResult!=0)
{
	/* 老師重複填寫 → 刪除 */
	$sqlDelete = "DELETE FROM survey WHERE tid='$tid'";
	mysql_query($sqlDelete);
}

$sql = "INSERT INTO survey (tid, exceedClass, totalClass, hope1, hope2, hope3, hope4, hope5) 
		VALUES ('".mysql_real_escape_string($tid)."',
				'".mysql_real_escape_string($exceedClass)."',
				'".mysql_real_escape_string($totalClass)."',
				'".mysql_real_escape_string($subject1)."',
				'".mysql_real_escape_string($subject2)."',
				'".mysql_real_escape_string($subject3)."',
				'".mysql_real_escape_string($subject4)."',
				'".mysql_real_escape_string($subject5)."')";

	if(mysql_query($sql))
	{	?>
		<script>
			location.href="teacherfinish.php";
		</script>
		<?php
		die();
	}
	else
	{	?>
		<script>
			popup_modal_alert("error","送出失敗!","javascript: history.back()");
		</script>
		<?php
		die();
	}
?>