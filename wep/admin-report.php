<?php
// header site
include_once('inc/header.php');
if(!isAdmin())
{
	echo '<META HTTP-EQUIV="refresh" CONTENT="0;'.baseUrl().'">';
	exit(0);
}
?>
<div class="container">
	<h1>แจ้งชำระเงิน</h1>
	<span id="showAlert"></span>
	<?php
		$stmt = $mysqli->query("SELECT `id_payment`,`accid`,`bankid`,`balance`,`trtime`,`accbank` FROM `payment_info` ORDER BY `id_payment` DESC");
		foreach($stmt->fetch_all() as $value)
		{
			echo '<div class="article" id="'.$value[0].'">';
			echo '	<div align="right">';
			echo '		<span class="glyphicon glyphicon-remove del-payment" data-id="'.$value[0].'" style="cursor:pointer;"></span>';
			echo '	</div>';
			echo '<p><strong>Account ID :</strong> '.$value[1].'</p>';
			echo '<p><strong>เลขบัญชีธนาคาร :</strong> '.$value[2].'</p>';
			echo '<p><strong>จำนวนเงินที่โอน :</strong> '.$value[3].'</p>';
			echo '<p><strong>เวลาที่โอน :</strong> '.$value[4].'</p>';
			echo '<p><strong>ชำระเข้าบัญชี :</strong> '.(($value[5]==1)?"984-0-92556-3 (ไทยพาณิชย์)":"984-0-92556-3 (กรุงไทย)").'</p>';
			echo '</div>';
		}
	?>
	<h1>สมัครรับข้อมูลข่าวสาร</h1>
	<?php
		$stmt = $mysqli->query("SELECT `id_info`,`fullname`,`email` FROM `get_info_account` ORDER BY `id_info` DESC");
		foreach($stmt->fetch_all() as $value)
		{
			echo '<div class="article" id="'.$value[0].'">';
			echo '	<div align="right">';
			echo '		<span class="glyphicon glyphicon-remove del-getInfo" data-id="'.$value[0].'" style="cursor:pointer;"></span>';
			echo '	</div>';
			echo '<p><strong>Name :</strong> '.$value[1].'</p>';
			echo '<p><strong>Email :</strong> '.$value[2].'</p>';
			echo '</div>';
		}
	?>
</div>
<script type="text/javascript">
$(function(){
	$(".del-payment").click(function(){
		var id = $(this).attr("data-id");
		$.post("api/admin-report.php",{op:"delpayment",id_payment:id},function(data){
			$("#showAlert").html(data);
			$(".del-payment[data-id='"+id+"']").parents(".article").remove();
		});
	});
	$(".del-getInfo").click(function(){
		var id = $(this).attr("data-id");
		$.post("api/admin-report.php",{op:"delgetInfo",id_info:id},function(data){
			$("#showAlert").html(data);
			$(".del-getInfo[data-id='"+id+"']").parents(".article").remove();
		});
	});
});
</script>
<?php
// footer site
include_once('inc/footer.php');
?>