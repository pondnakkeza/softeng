<nav class="navbar navbar-inverse navbar-fixed-top visible-xs">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">IMMEnterprise</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=baseUrl();?>"><span class="glyphicon glyphicon-home"></span>&nbsp; หน้าแรก</a></li>
        <li><a data-toggle="modal" data-target="#register">สมัครเพื่อรับข้อมูล</a></li>
        <li><a href="<?=baseUrl();?>/ea.php">EA IMM</a></li>		
		<li><a href="<?=baseUrl();?>/eafund.php">FUND IMM</a></li>
        
        <li><a href="<?=baseUrl();?>/payment.php">วิธีชำระเงิน</a></li>
        <li><a href="<?=baseUrl();?>/howtosetup.php">ขั้นตอนการติดตั้ง</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if(isAdmin()): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['username'];?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="setting.php" id="btnSetting">ตั้งค่า</a></li>
            <li><a href="admin-report.php" id="btnSetting">รายงาน</a></li>
            <li role="separator" class="divider"></li>
            <li><a class="btnLogout">ออกจากระบบ</a></li>
          </ul>
        </li>
      <?php else:?>
        <li><a data-toggle="modal" data-target="#login">Sign in</a></li>
      <?php endif;?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>