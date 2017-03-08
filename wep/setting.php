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
	<h1>ตั้งค่าเว็บไซต์</h1>
	<?php
	if($_POST)
	{
		$sitename 	= htmlspecialchars(trim($_POST['sitename']));
		$video 		= str_replace("https://www.youtube.com/watch?v=","",strip_tags(trim($_POST['video'])));
		$pass 		= false;
		$msg 		= "กรุณาระบุ";

		if(empty($sitename))
			$msg .= "ชื่อเว็บ";
		else if(empty($video))
			$msg .= "วิดีโอ";
		else
			$pass = true;

		if($pass)
		{
			$stmt = $mysqli->prepare("UPDATE `setting` SET `sitename`=?,`video`=?,`timestamp`=NOW() WHERE `id_setting`='1'");
			if($stmt)
			{
				$stmt->bind_param("ss",$sitename,$video);
				if($stmt->execute())
				{
					echo '<div class="alert alert-success" role="alert">';
					echo "ตั้งค่า สำเร็จ";
					echo '</div>';
				}
				else
				{
					echo '<div class="alert alert-danger" role="alert">Error : ';
					echo $mysqli->error;
					echo '</div>';
				}
			}else{
				echo '<div class="alert alert-danger" role="alert">Error : ';
				echo $mysqli->error;
				echo '</div>';
			}
		}
		else
		{
			echo '<div class="alert alert-danger" role="alert">Error : ';
			echo $msg;
			echo '</div>';
		}
	}
	?>
	<form method="post" class="form-bordered">
		<div class="form-group">
			<label for="sitename">ชื่อเว็บ</label>
			<input type="text" name="sitename" id="sitename" class="form-control" value="<?=$setting['sitename'];?>">
		</div>
		<div class="form-group">
			<label for="video">วิดีโอ หน้าแรก</label>
			<div class="input-group">
				<span class="input-group-addon">https://www.youtube.com/watch?v=</span>
				<input type="text" name="video" id="video" class="form-control" onclick="this.select();" value="<?=$setting['video'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="cover">ภาพปก</label>
			<div id="fileuploader">Upload</div>
		</div>
		<div class="row">
		<?php
		$files = glob('assets/img/slide/*.*');
		foreach($files as $name)
		{
			$filename = explode("/", $name);
			echo'<div class="col-sm-6 col-md-4">';
			echo'    <div class="thumbnail">';
			echo'      <img src="'.baseUrl()."/".$name.'">';
			echo'      <div class="caption">';
			echo'        <p><a class="btn btn-danger delCover" data-name="'.end($filename).'">Delete</a></p>';
			echo'      </div>';
			echo'    </div>';
			echo'</div>';
		}
		?>
		</div>
		<button type="submit" class="btn btn-primary btn-lg btn-block">บันทึกข้อมูล</button>
	</form>
</div>
<script type="text/javascript">
$(function(){
	$("#fileuploader").uploadFile({
		url:"api/upload.php",
		fileName:"myfile",
		sequential:true,
		sequentialCount:1,
		onSuccess:function(files,data,xhr,pd){
		}
	});
	$(".delCover").click(function(){
		var nameFile = $(this).attr("data-name");
		$.post('api/delete.php',{op:"delete",name:nameFile},function(data){
			$(".delCover[data-name='"+nameFile+"']").parents("div.col-sm-6").remove();
		});
	});
});
</script>
<?php
// footer site
include_once('inc/footer.php');
?>