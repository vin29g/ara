<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ARA , NIT Warangal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/lumen/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" media="screen" title="no title" charset="utf-8">
  <?php if(!empty($cssStyle)):?>
    <?php foreach ($cssStyle as $row) :?>
      <link rel="stylesheet" href="<?=base_url('assets/css').'/'.$row?>" media="screen" title="no title" charset="utf-8">
    <?php endforeach; ?>
  <?php endif;?>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url('/')?>">ARA &nbsp;&nbsp;(Alumni Request Automation)</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav navbar-right">
          <li ><a href="<?=base_url()?>">Home</a></li>
          <li ><a href="<?=base_url()?>">About</a></li>
          <li ><a href="<?=base_url('index/faq')?>">FAQ</a></li>
          <?php if($this->ion_auth->logged_in()):?>
          <li class="active"><a href="<?=base_url('auth/logout')?>">Logout</a></li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <?php if($title=="Home"):?>
      <div id="main_name" class="text-center">
        <a href="http://www.nitw.ac.in/wsdc">
          <img src="<?php echo base_url('assets/'); ?>/images/wsdc_logo.png" alt="WSDC logo" width="100px">
        </a>
      </div>
      <a href="<?php echo base_url(); ?>" style="text-decoration:none"><h1 class="text-info text-center">ARA Portal</h1></a>
      <br>
    <?php endif;?>
