<?php require_once("config.inc.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="immeasy ระบบทำเงินอัตโนมัติ 24 ชั่วโมง ระบบทำเงินจากตลาด forex ไม่จำเป็นต้องมีความรู้ก็สามารถมีรายได้เข้ามาตลอด 24 ชั่วโมงได้">
    <meta name="keywords" content="ระบบทำเงิน,รายได้ออนไลน์,รายได้ 24 ชั่วโมง ,ธุรกิจกออนไลน์ ,งาน Part time , งานผ่านอินเตอร์เน็ต ,forex , การเทรด forex ,ระบบฟอเร็กซ์ , expert advisor , EA อีเอ, ระบบทำเงิน , ทำเงินออนไลน์ , ระบบทำเงินอัตโนมัติ , ">
    <meta name="author" content="DreaMTeryST">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=$setting['sitename'];?></title>

    <link rel="shortcut icon" type="image/png" href="<?=baseUrl();?>/assets/img/favicon.png"/>
    <!-- Bootstrap -->
    <link href="<?=baseUrl();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl();?>/assets/bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="<?=baseUrl();?>/assets/bootstrap/css/docs.css" rel="stylesheet">
    <link href="<?=baseUrl();?>/assets/bootflat/css/bootflat.min.css" rel="stylesheet">

    <link href="<?=baseUrl();?>/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/2.0.7/plyr.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.10/uploadfile.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header>
    <div class="ct ct-header hidden-xs">
      <span class="txt-head">
        <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-phone"></span>&nbsp;&nbsp;09-5560-2819</a>&nbsp;&nbsp;
        <a href="https://line.me/R/ti/p/%40zmm4657z" target="_blank" class="btn btn-success">
          <span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;Add friend Line
        </a>&nbsp;&nbsp;
        <a href="https://www.facebook.com/Investor-Management-696912697126605/" target="_blank" class="btn btn-primary">
          <span class="fa fa-facebook"></span>&nbsp;&nbsp;Investor-Management
        </a>&nbsp;&nbsp;
        <?php if(!empty($_SESSION['username'])){?>
        <div class="btn-group">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?=$_SESSION['username'];?> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="setting.php" id="btnSetting">ตั้งค่า</a></li>
            <li><a href="admin-report.php" id="btnSetting">รายงาน</a></li>
            <li role="separator" class="divider"></li>
            <li><a class="btnLogout">ออกจากระบบ</a></li>
          </ul>
        </div>
        <?php }else{ ?>
        <a class="btn btn-danger" data-toggle="modal" data-target="#login">
          <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Sign In
        </a>
        <?php }?>
      </span>
    </div>
    <div id="image-show" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      <?php
          $files = glob('assets/img/slide/*.*');
          $i=0;
          foreach ($files as $value) {
            echo '<li data-target="#image-show" data-slide-to="'.$i.'" '.(($i++ == 0)?' class="active"':'').'></li>';
          }
        ?>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox" style="background-color:#333;">
        <!-- <div class="item active" style="background-image:url(assets/img/1.jpg);">
          <div class="carousel-caption">
            test 1
          </div>
        </div> -->
        <?php
          $files = glob('assets/img/slide/*.*');
          $i=1;
          foreach ($files as $value) {
            echo '<div class="item'.(($i++ == 1)?' active':'').'">';
            echo '<img src="'.$value.'" class="img-responsive">';
            echo '</div>';
          }
        ?>
      </div>
    </div>
    <div class="menu-bar hidden-xs">
      <div class="btn-group">
        <a href="<?=baseUrl();?>" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-home"></span>&nbsp; หน้าแรก</a>
        <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#register">สมัครเพื่อรับข้อมูล</a>
        <a href="<?=baseUrl();?>/ea.php" class="btn btn-info btn-lg">EA IMM</a>
		<a href="<?=baseUrl();?>/eafund.php" class="btn btn-info btn-lg">FUND IMM</a>
        
        <a href="<?=baseUrl();?>/payment.php" class="btn btn-info btn-lg">วิธีชำระเงิน</a>
        <a href="<?=baseUrl();?>/howtosetup.php" class="btn btn-info btn-lg">ขั้นตอนการติดตั้ง</a>
      </div>
    </div>
    <?php include('navbar.php');?>
  </header>