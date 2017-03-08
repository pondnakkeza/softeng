<?php
// header site
include_once('inc/header.php');
// content
?>
<div class="container">
	<div align="center">
		<img class="img-responsive" src="<?=baseUrl();?>/assets/img/pay2.png">
	</div>
	<h2>วิธีชำระเงิน</h2><br/>
	<h3>ชื่อบัญชี นายวีรยุทธ ค้อโนนแดง</h3>
	<br/>
	<div align="center" style="width:auto;height:auto">
		<img class="img-responsive" src="<?=baseUrl();?>/assets/img/pay.png">
	</div>
	<br/>
	<h2>แจ้งชำระเงิน</h2>
<?php
if($_POST)
{
	$accid 		= htmlspecialchars(trim($_POST['accid']));
	$bankid 	= htmlspecialchars(trim($_POST['bankid']));
	$balance 	= htmlspecialchars(trim($_POST['balance']));
	$trtime 	= htmlspecialchars(trim($_POST['trtime']));
	$accbank	= htmlspecialchars(trim($_POST['accbank']));
	$pass 		= false;
	$msg 		= "กรุณาระบุ";

	if(empty($accid))
		$msg .= "Account ID";
	else if(empty($bankid))
		$msg .= "เลขบัญชีธนาคาร";
	else if(empty($balance))
		$msg .= "จำนวนเงินที่โอน";
	else if(empty($trtime))
		$msg .= "เวลาที่โอน";
	else if(empty($accbank))
		$msg .= "บัญชีที่ชำระ";
	else
		$pass = true;

	if($pass)
	{
		$stmt = $mysqli->prepare("INSERT INTO payment_info (`accid`,`bankid`,`balance`,`trtime`,`accbank`) VALUES (?,?,?,?,?)");
		if($stmt)
		{
			$stmt->bind_param('ssdsd',$accid,$bankid,$balance,$trtime,$accbank);
			if($stmt->execute())
			{
				echo '<div class="alert alert-success" role="alert">';
				echo "บันทึกข้อมูลสำเร็จ";
				echo '</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">';
				echo $mysqli->error;
				echo '</div>';
			}
		}
		else
		{
			echo '<div class="alert alert-danger" role="alert">';
			echo $mysqli->error;
			echo '</div>';
		}
	}else{
		echo '<div class="alert alert-danger" role="alert">Error : ';
		echo $msg;
		echo '</div>';
	}
}
?>
	<form method="post" action="">
		<div class="form-group">
			<label for="accid">Account ID ที่ต้องการใช้รัน EA IMM</label>
		    <input type="text" name="accid" id="accid" class="form-control"  placeholder="Account ID ที่ต้องการใช้รัน EA IMM" required>
		</div>
		<div class="form-group">
		  	<label for="bankid">เลขบัญชีธนาคาร</label>
		    <input type="text" name="bankid" id="bankid" class="form-control"  placeholder="เลขบัญชีธนาคาร" required>
		</div>
		<div class="form-group">
		  	<label for="balance">จำนวนเงินที่โอน</label>
		    <select name="balance" id="balance" class="form-control" required>
		    	<option value="5000">5,000 บาท</option>
				<option value="2000">2,500 บาท</option>
		    </select>
		</div>
		<div class="form-group">
		  	<label for="trtime">เวลาที่โอน</label>
		    <input type="text" name="trtime" id="trtime" class="form-control"  placeholder="เวลาที่โอน" required>
		</div>
		<div class="form-group">
		  	<label for="accbank">ชำระเข้าบัญชี</label>
		    <select name="accbank" id="accbank" class="form-control" required>
		    	<option value="1">793-271230-1 (ไทยพาณิชย์)</option>
				<option value="2">985-1-19020-9 (กรุงไทย)</option>
		    </select>
		</div>
		<button type="submit" class="btn btn-primary btn-lg">ยืนยัน</button>
		***หมายเหตุ หากชำระเงินเรียบร้อยแล้วให้ติดต่อมาทาง Facebook Fanpage
	</form>
</div>
<script type="text/javascript">
$(function(){
	$("#trtime").mask("99:99",{placeholder:"HH:MM"});
});
</script>
<?php
// footer site
include_once('inc/footer.php');
?>
