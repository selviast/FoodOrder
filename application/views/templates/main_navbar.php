<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Arjes Kitchen - Eat With Style</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/animate.css">
    
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/style.css">

    <!-- import FONT AWESOME -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />


  </head>
  <body class="goto-here">
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?= base_url('welcome');?>">Arjes Kitchen</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?= base_url('welcome');?>" class="nav-link">Home</a></li>
			  <li class="nav-item active"><a href="<?= base_url('order');?>" class="nav-link">Pilih Menu</a></li>
            <li class="nav-item cta cta-colored"><a href="<?= base_url('order/cart');?>" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $pesanan = (int)implode($pesanan);
            
            ?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    