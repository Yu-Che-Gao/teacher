<?php
	require_once('../mysql_connect.inc.php');
	
	$result = mysql_query("SELECT * FROM teacher_info WHERE tid='".$_POST['name']."'");
	$list = mysql_fetch_array($result);
	
	$totalClass = $list['realClass'] + $_POST['exceedClass'];
	
	if($totalClass>0)
	{
		$sql = "INSERT INTO survey(`tid`,`exceedClass`,`totalClass`,`hope1`,`hope2`,`hope3`,`hope4`,`hope5`) 
				VALUES (".$list['tid'].",
						".$_POST['exceedClass'].",
						".$totalClass.",
						'".$_POST['hope1']."',
						'".$_POST['hope2']."',
						'".$_POST['hope3']."',
						'".$_POST['hope4']."',
						'".$_POST['hope5']."')";
		if(mysql_query($sql))
		{
			echo '輸入成功';
		}
		else
		{
			echo '輸入失敗';
		}
	}
	header('Location: surveymanage.php');
?>