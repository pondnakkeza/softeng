	<!-- Modal Get Infomation -->
	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title market" id="myModalLabel">สมัครเพื่อรับข้อมูล การทำกำไรจากตลาดฟอเรกซ์</h4>
	      </div>
	      <div class="modal-body">
	      	<span id="showAlert"></span>
	        <form>
				<div class="form-group">
				  <div class="input-group">
				  	<span class="input-group-addon" id="basic-addon1">ชื่อ นามสกุล</span>
				    <input type="text" id="dialogFullname" class="form-control"  placeholder="ชื่อ นามสกุล">
				  </div>
				</div>
			  	<div class="form-group">
				  <div class="input-group">
				  	<span class="input-group-addon" id="basic-addon1">Email</span>
				    <input type="text" id="dialogEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control"  placeholder="Email">
				  </div>
				</div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" id="submitReg" class="btn btn-primary">บันทึก</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Modal Login -->
	<?php if(empty($_SESSION['username'])){?>
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title market" id="myModalLabel">เข้าสู่ระบบ</h3>
	      </div>
	      <div class="modal-body">
	      	<span id="showAlertLogin"></span>
	        <form>
				<div class="form-group">
				  <div class="input-group">
				  	<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				    <input type="text" id="dialogUsername" class="form-control input-lg"  placeholder="Username">
				  </div>
				  <div class="input-group">
				  	<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				    <input type="password" id="dialogPassword" class="form-control input-lg"  placeholder="Password">
				  </div>
				</div>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" id="submitLogin" class="btn btn-primary">Sign in</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
	      </div>
	    </div>
	  </div>
	</div>
	<?php } ?>

	<footer>
		<span>"ให้คำปรึกษาด้านการลงทุนฟอเรกซ์โดยทีมผู้เชี่ยวชาญ IMM"</span>
		<p class="txt-head">
	        <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-phone"></span>&nbsp;&nbsp;09-5560-2819</a>&nbsp;&nbsp;
	        <a href="https://line.me/R/ti/p/%40zmm4657z" target="_blank" class="btn btn-success">
	          <span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;Add friend Line
	        </a>&nbsp;&nbsp;
	        <a href="https://www.facebook.com/Investor-Management-696912697126605/" target="_blank" class="btn btn-primary">
	          <span class="fa fa-facebook"></span>&nbsp;&nbsp;Investor-Management
	        </a>&nbsp;&nbsp;
	        <a href="<?=baseUrl();?>/report.php" class="btn btn-danger"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;&nbsp;แจ้งปัญหาการใช้งาน</a>
      	</p>
      	<p align="center" style="color:white;">
      		Copyright © 2016. All rights reserved<br/>
      	</p>
	</footer>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=baseUrl();?>/assets/js/sha256.jquery.js"></script>
    <script src="<?=baseUrl();?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=baseUrl();?>/assets/bootstrap/js/docs.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.10/jquery.uploadfile.min.js"></script>
    <script src="<?=baseUrl();?>/assets/js/jquery.maskedinput.min.js"></script>
<!--     <script src="<?=baseUrl();?>/assets/bootflat/js/icheck.min.js"></script>
    <script src="<?=baseUrl();?>/assets/bootflat/js/jquery.fs.selecter.min.js"></script>
    <script src="<?=baseUrl();?>/assets/bootflat/js/jquery.fs.stepper.min.js"></script> -->
    <script type="text/javascript">
    	$(function(){
    		$("input#dialogPassword").click(function(){
    			$(this).select();
    		});
    		$("#submitReg").click(function(){
    			$("input#dialogFullname").attr("disabled","disabled");
    			$("input#dialogEmail").attr("disabled","disabled");
    			setTimeout(function(){
    				$("input#dialogFullname").removeAttr("disabled");
    				$("input#dialogEmail").removeAttr("disabled");
    			},2000);
    			var url="api/register.php"; // ไฟล์ที่ต้องการรับค้า  
		        var dataSet={ fullname: $("input#dialogFullname").val(), email: $("input#dialogEmail").val() }; // กำหนดชื่อและค่าที่ต้องการส่ง  
		        $.post(url,dataSet,function(data){  
		            $("#showAlert").html(data);
		         }); 
    		});
    		$("#submitLogin").click(function(){
    			$("input#dialogUsername").attr("disabled","disabled");
    			$("input#dialogPassword").attr("disabled","disabled");
    			setTimeout(function(){
    				$("input#dialogUsername").removeAttr("disabled");
    				$("input#dialogPassword").removeAttr("disabled");
    			},2000);
    			$("input#dialogPassword").val($.sha256($("#dialogPassword").val()));
    			var url="api/login.php"; // ไฟล์ที่ต้องการรับค้า  
		        var dataSet={ username: $("input#dialogUsername").val(), password: $("input#dialogPassword").val() }; // กำหนดชื่อและค่าที่ต้องการส่ง  
		        $.post(url,dataSet,function(data){  
		            $("#showAlertLogin").html(data);
		         });
    		});
    		$(".btnLogout").click(function(){
    			$.get("api/logout.php",function(data){
    				$("body").append('<META HTTP-EQUIV="refresh" CONTENT="0">');
    			});
    		});
    	});
    </script>
  </body>
</html>