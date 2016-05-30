<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
require_once("../globefunction.php");
require_once("../mysql_connect.inc.php");
require_once("./judge_login.php");
?>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>管理者首頁</title>
	<link rel="stylesheet" type="text/css" href="../css/styles_main.css"/>
	<link rel="stylesheet" type="text/css" href="../css/styles_login.css"/>
	<link rel="stylesheet" type="text/css" href="../css/styles_modal.css"/>
	<link rel="stylesheet" type="text/css" href="../css/styles_survey.css"/>
</head>

<body>
	<div id="menu">
		<?php menu();  /* globefunction.php */ ?>
	</div>
	
	<div style="text-align:center;">
		<font style="font-size:52px;">
			<b>意願調查資料</b>
		</font>
	</div>
	
	<div style="border:2px #ccc solid; padding:20px;">
		<?php
		$teacherName = '<option value="無">---尚未選擇---</option>';
		$result = mysql_query("SELECT * FROM teacher_info");
		while($list = mysql_fetch_array($result))
		{
			$teacherName .= '<option value="'.$list['tid'].'">'.$list['name'].'</option>';
		}
		
		$subject = '
			<option value="無">---尚未選擇---</option>
			<option>國語			</option> <option>閱讀		</option> <option>數學</option>
			<option>彈性時間		</option> <option>綜合活動	</option> <option>社會</option>
			<option>自然與生活科技	</option> <option>生活		</option> <option>音樂</option>
			<option>美勞表演		</option> <option>健康		</option> <option>體育</option>
			<option>閩南語			</option> <option>資訊		</option> <option>英語</option>';
		
		$result_info = mysql_query("SELECT survey.*,teacher_info.* FROM survey,teacher_info WHERE survey.tid=teacher_info.tid ORDER BY survey.tid");
		$num_info = mysql_num_rows($result_info);
		
		$result_none = mysql_query("SELECT teacher_info.* FROM teacher_info LEFT JOIN survey ON teacher_info.tid = survey.tid WHERE survey.tid IS NULL");
		$num_none = mysql_num_rows($result_none);
		?>
		<div style="position:relative;">
			<div class="checkList">
				※已填寫：<span class="yes"><?php echo $num_info; ?></span>
				位，尚未填寫：<span class="no"><?php echo $num_none; ?></span>&nbsp;位&nbsp;&nbsp;
				<span id="unwrite" class="showModal">✎<font style="text-decoration:underline;">查看名單</font>✐</span>
			</div>
			
			<div class="addSurvey">
				<span id="add" style="display:block; cursor:pointer;" 
					onclick="document.getElementById('surveymanage').style.display='block';
							 document.getElementById('hidden').style.display='block';
							 document.getElementById('add').style.display='none';">
					<img src="../image/add.png" title="新增意願調查資料" class="setImg"/>
				</span>
				<span id="hidden" style="display:none; cursor:pointer;" 
					onclick="document.getElementById('surveymanage').style.display='none';
							 document.getElementById('hidden').style.display='none';
							 document.getElementById('add').style.display='block';">
					<img src="../image/hidden.png" title="隱藏新增表格" class="setImg"/>
				</span>
			</div>
			
			<div class="convertPDF">
				<img src="../image/pdf_icon.png" title="轉存PDF檔案" class="setImg" onclick="convertPDF();"/>
			</div>
			<br/><br/><br/><br/>
		</div>
		
		<form id="surveymanage" method="post" action="survey_info_insert.php" style="display:none;">
			<table border="1" id="tableAdd">
				<tr>
					<th width="15%">教師姓名</th>
					<th width="10%">超鐘點節數</th>
					<th width="15%">意願一</th>
					<th width="15%">意願二</th>
					<th width="15%">意願三</th>
					<th width="15%">意願四</th>
					<th width="15%">意願五</th>
				</tr>
				<tr>
					<td><select name="name"  class="add"><?php echo $teacherName; ?></select></td>
					<td><input  type="text"  class="add" name="exceedClass"/></td>
					<td><select name="hope1" class="add"><?php echo $subject; ?></select></td>
					<td><select name="hope2" class="add"><?php echo $subject; ?></select></td>
					<td><select name="hope3" class="add"><?php echo $subject; ?></select></td>
					<td><select name="hope4" class="add"><?php echo $subject; ?></select></td>
					<td><select name="hope5" class="add"><?php echo $subject; ?></select></td>
				</tr>
			</table>
			<input type="submit" value="新增" class="btnPurple_small" style="margin-top:30px;"/>
			<br/><br/><br/><br/><br/>
		</form>
		
		<form id="convert_pdf" method="post" action="survey_convert_pdf.php" target="_blank">
			<table border="1" id="t01">
				<tr>
					<th width="9%" >教師姓名</th>
					<th width="9%" >實際配課節數</th>
					<th width="9%" >超鐘點節數</th>
					<th width="9%" >實際授課節數</th>
					<th width="9%" >意願一</th>
					<th width="9%" >意願二</th>
					<th width="9%" >意願三</th>
					<th width="9%" >意願四</th>
					<th width="9%" >意願五</th>
					<th width="10%">刪除</th>
					<th width="9%" ><input type="checkbox" name="all" onclick="check_all(this,'checksurvey[]')" style="width:15px; height:15px;">全選</th>
				</tr>
					
				<?php
				$i = 0;
				while($row = mysql_fetch_array($result_info))
				{
					echo '<tr>';
					echo '<td				 data-col="name"		data-row="'.$row['tid'].'" data-myrow="'.$i.'">'.$row['name'].'</td>';
					echo '<td class="result" data-col="realClass"	data-row="'.$row['tid'].'" data-myrow="'.$i.'"><span>'.$row['realClass'].'</span></td>';
					echo '<td class="tdText" data-col="exceedClass"	data-row="'.$row['tid'].'" data-myrow="'.$i.'"><span>'.$row['exceedClass'].'</span>	<input class="modify" data-col="exceedClass" data-row="'.$row['tid'].'" value="'.$row['exceedClass'].'"></td>';
					echo '<td class="result" data-col="totalClass"	data-row="'.$row['tid'].'" data-myrow="'.$i.'">'.$row['totalClass'].'</td>';
					echo '<td class="tdText" data-col="hope1"		data-row="'.$row['tid'].'" data-myrow="'.$i.'"><span>'.$row['hope1'].'</span>		<input class="modify" data-col="hope1"		 data-row="'.$row['tid'].'" value="'.$row['hope1'].'"></td>';
					echo '<td class="tdText" data-col="hope2"		data-row="'.$row['tid'].'" data-myrow="'.$i.'"><span>'.$row['hope2'].'</span>		<input class="modify" data-col="hope2"		 data-row="'.$row['tid'].'" value="'.$row['hope2'].'"></td>';
					echo '<td class="tdText" data-col="hope3"		data-row="'.$row['tid'].'" data-myrow="'.$i.'"><span>'.$row['hope3'].'</span>		<input class="modify" data-col="hope3"		 data-row="'.$row['tid'].'" value="'.$row['hope3'].'"></td>';
					echo '<td class="tdText" data-col="hope4"		data-row="'.$row['tid'].'" data-myrow="'.$i.'"><span>'.$row['hope4'].'</span>		<input class="modify" data-col="hope4"		 data-row="'.$row['tid'].'" value="'.$row['hope4'].'"></td>';
					echo '<td class="tdText" data-col="hope5"		data-row="'.$row['tid'].'" data-myrow="'.$i.'"><span>'.$row['hope5'].'</span>		<input class="modify" data-col="hope5"		 data-row="'.$row['tid'].'" value="'.$row['hope5'].'"></td>';
					echo '<td><button class="btnBlue_small" id="'.$row['tid'].'" onclick="deleteSurveyInfo(this.id)">刪除</button></td>';
					echo '<td><input type="checkbox" name="checksurvey[]" value="'.$row['tid'].'" style="width:20px; height:20px;"/></td>';
					echo '</tr>';
					$i = $i + 1;
				}
				?>
			</table>
		</form>
		<br/><br/>
	</div>
	
	<div id="myModal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">close</span>
				<span class="h2">尚未填寫「意願調查表」之老師</span>
			</div>
			<div class="modal-body">
				<table border="1" id="t01" style="margin:30px 0;">
					<tr>
						<th width="40%">教師姓名</th>
						<th width="60%">職稱</th>
					</tr>
					<?php
					while($list_none = mysql_fetch_array($result_none))
					{
						echo '<tr>
								<td>'.$list_none['name'].'</td>
								<td>'.$list_none['jobTitle'].'</td>
							  </tr>';
					}
					?>
				</table>
			</div>
			<div class="modal-footer">
				<span class="h3">共有&nbsp;<?php echo $num_none; ?>&nbsp;位</span>
			</div>
		</div>
	</div>
	
	<?php show_popup_alert_admin(); /* 自訂提醒視窗 */ ?>
	
	<script>
		// 即時修改
		for(let i=0;i<document.getElementsByClassName('tdText').length;i++){
			document.getElementsByClassName('tdText')[i].addEventListener('click',function(){
				let span=document.getElementsByClassName('tdText')[i].getElementsByTagName('span')[0];
				let input=document.getElementsByClassName('tdText')[i].getElementsByTagName('input')[0];
				span.style.display='none';
				input.style.display='block';
				input.addEventListener('blur',function(){
					let newValue=input.value;
					let dataCol=input.getAttribute('data-col');
					let dataRow=input.getAttribute('data-row');
					let myRow=parseInt(document.getElementsByClassName('tdText')[i].getAttribute('data-myrow'));
					span.innerHTML=newValue;
					updateSurveyInfo(dataCol,dataRow,newValue);
					input.style.display='none';
					span.style.display='block';
					if(dataCol=='exceedClass') {
						document.getElementsByClassName('result')[myRow*2+1].innerHTML=parseInt(document.getElementsByClassName('result')[myRow*2].getElementsByTagName('span')[0].innerHTML)+parseInt(document.getElementsByClassName('tdText')[myRow*6].getElementsByTagName('span')[0].innerHTML);
						updateSurveyInfo('totalClass',dataRow,document.getElementsByClassName('result')[myRow*2+1].innerHTML);
					}
				});
				input.focus();
			});
		}
		
		// checkbox：全選
		function check_all(obj,cName) 
		{ 
			var checkboxs = document.getElementsByName(cName); 
			for(var i=0; i<checkboxs.length; i++) {
				checkboxs[i].checked = obj.checked;
			}
		}
		
		// 轉存pdf檔案
		function convertPDF()
		{
			var checkItem = document.getElementsByName("checksurvey[]");
			var num = 0;
			for (var i=0; i<checkItem.length; i++) {
				if(checkItem[i].checked)
				{
					num++;
				}
			}
			if (num == 0) {
				popup_modal_alert("error","請勾選欲轉存成pdf檔的資料!","#");
			}
			else {
				document.getElementById('convert_pdf').submit();
				document.getElementById('convert_pdf').checksurvey.value = "";
			}
		}
		
		// 控制 modal
        var modal = document.getElementById('myModal');
        var btn = document.getElementById("unwrite");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
	</script>
	<script src="../js/surveymanage.js"></script>
</body>
</html>