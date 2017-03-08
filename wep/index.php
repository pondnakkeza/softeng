<?php
// header site
include_once('inc/header.php');
/*
สำหรับแข่งหน้า
*/
$totalRow = $mysqli->query("SELECT count(`topic`) as amount FROM `article`")->fetch_assoc()["amount"];
$page = isset($_GET['page'])?$_GET['page']:1;
$limit = 10; // จำนวนที่แสดงต่อ 1 หน้า
$start = ($page-1)*$limit;
?>
<div class="container">
	<div class="panel panel-success">
	  <div class="panel-heading">
	  	Video
	  </div>
	  <div class="panel-body">
	    <div data-type="youtube" data-video-id="<?=$setting['video'];?>"></div>
	  </div>
	</div>
<?php if(isset($_SESSION['username'])):?>
	<span id="showAlertArticle"></span>
	<form class="form-bordered">
		<div class="form-group">
			<label for="topic">หัวข้อ</label>
			<input type="text" id="topic" name="topic" class="form-control" placeholder="หัวข้อ">
		</div>
		<div class="form-group">
			<label for="text-box">ข้อความ</label>
			<textarea id="text-box" class="form-control"></textarea>
		</div>
		<div class="form-group" align="right">
			<button type="button" id="submitPost" class="btn btn-primary btn-lg btn-block">บันทึก</button>
		</div>
	</form>
	<?php
	endif;
	$stmt = $mysqli->query("SELECT `id_article`,`topic`,`data` FROM `article` ORDER BY `id_article` DESC LIMIT ".$start.",".$limit);
	foreach($stmt->fetch_all() as $value)
	{
		echo '<div class="article" id="'.$value[0].'">';
		if(isAdmin()){
			echo '	<div align="right">';
			echo '		<span class="glyphicon glyphicon-edit" data-id="'.$value[0].'" style="cursor:pointer;"></span>&nbsp;';
			echo '		<span class="glyphicon glyphicon-remove" data-id="'.$value[0].'" style="cursor:pointer;"></span>';
			echo '	</div>';
		}
		echo "<h1>".$value[1]."</h1>";
		echo str_replace("h1", "h2", "<span class='content'>".$value[2]."</span>");
		echo '</div>';
	}
	if($totalRow!=0){
		echo '<nav aria-label="Page navigation">';
		echo '  <ul class="pagination">';
		echo '    <li'.(($page==1)?" class=\"disabled\"":"").'>';
		echo '      <a href="'.baseUrl().'/?page='.($page-1).'" aria-label="Previous">';
		echo '        <span aria-hidden="true">&laquo;</span>';
		echo '      </a>';
		echo '    </li>';
		for($i=1;$i<=ceil($totalRow/$limit);$i++){
			if($page==$i){
				echo '    <li class="active"><a href="'.baseUrl().'/?page='.$i.'">'.$i.'</a></li>';
			}else{
				echo '    <li><a href="'.baseUrl().'/?page='.$i.'">'.$i.'</a></li>';
			}
		}
		echo '    <li'.(($page==ceil($totalRow/$limit))?" class=\"disabled\"":"").'>';
		echo '      <a href="'.baseUrl().'/?page='.($page+1).'" aria-label="Next">';
		echo '        <span aria-hidden="true">&raquo;</span>';
		echo '      </a>';
		echo '    </li>';
		echo '  </ul>';
		echo '</nav>';
	}
	?>
	<div class="row">
		<div class="col-md-6" style="padding-bottom: 10px;" align="center">
			<div class="fb-page" data-href="https://www.facebook.com/Investor-Management-696912697126605/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Investor-Management-696912697126605/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Investor-Management-696912697126605/">Investor Management</a></blockquote></div>
		</div>
		<div class="col-md-6" align="center">
			<iframe id="isuperframe" src="https://informers.instaforex.com/th/gchart/index/&if=1&insta=1&w=325&h=300&bg=F3F3F3&lc=4381E9&fc=000000&fs=11&dp=d1&cp=51&lt1=InstaForex&lt2=%E0%B8%95%E0%B8%A5%E0%B8%B2%E0%B8%94&lt3=%E0%B8%94%E0%B8%B1%E0%B8%8A%E0%B8%99%E0%B8%B5&pl=ABC" frameborder="0" width="350" height="500" scrolling="no" title="InstaForex.com"></iframe><noframes><a href="https://www.instaforex.com/th/">InstaForex portal</a></noframes>
		</div>
	</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=530764890349636";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://cdn.plyr.io/2.0.7/plyr.js"></script>
<script type="text/javascript">
plyr.setup();
<?php if(isAdmin()):?>
$(function(){
	var mode = "add";
	var idArticle = null;
	var dataSet = null;
	var textbox = $("#text-box");
	textbox.summernote({height: 300});
	$("#submitPost").click(function(){
		if(mode == "add")
		{
			dataSet = {topic:$("#topic").val(),text:textbox.summernote('code')};
			$.post("api/article.php?action=save",dataSet,function(data){
				dataSet = null;
				$("#topic").val("");
				textbox.summernote('code','');
				$("#showAlertArticle").html(data);
			});
		}else if(mode == "edit")
		{
			dataSet = {idArticle:idArticle,topic:$("#topic").val(),text:textbox.summernote('code')};
			$.post("api/article.php?action=edit",dataSet,function(data){
				dataSet = null;
				idArticle = null;
				$("#topic").val("");
				textbox.summernote('code','');
				$("#showAlertArticle").html(data);
			});
		}
		
	});
	$(".glyphicon-edit").click(function(){
		idArticle = $(this).attr("data-id");
		$("#topic").val($("#"+idArticle+" h1").html());
		textbox.summernote('code',$("#"+idArticle+" span.content").html());
		mode = "edit";
		$("#topic").focus();
	});
	$(".glyphicon-remove").click(function(){
		idArticle = $(this).attr("data-id");
		dataSet = {idArticle:idArticle};
		$.post("api/article.php?action=del",dataSet,function(data){
			$("#"+idArticle).remove();
			$dataSet = null;
			idArticle = null
			if(typeof(data) !== undefined)
			{
				$("#showAlertArticle").html(data);
			}
		});
	});
});
<?php endif;?>
</script>
<?php
// footer site
include_once('inc/footer.php');
?>