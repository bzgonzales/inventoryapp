<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo @$meta_title ?></title>

	<meta name="robots" content="<?php echo @$meta_robots; ?>">
	<meta name="description" content="<?php echo @$meta_description; ?>">

	<?php if(@$css): ?>
		<?php foreach($css as $c): ?>
			<link rel="stylesheet" href="<?php echo $c?>">
		<?php endforeach; ?>
	<?php endif; ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo base_url?>dist/css/styles.min.css?ver=1.0.7"/>


	<?php if(@$Gfonts): ?>
		<?php foreach($Gfonts as $f):?>
			<link  href="http://fonts.googleapis.com/css?family=<?php echo $f ?>" rel="stylesheet" type="text/css" >
		<?php endforeach; ?>
	<?php endif; ?>
	
</head>

<body>

	<!-- HEADER HTML CLASS -->

	<header id="main-header" class="nav-down">

		<div class="container">
			<div class="row">

				<section class="col-xl-12 ">

					<nav class="navbar navbar-expand-lg navbar-light bg-light">
					  <a class="navbar-brand" href="#">Inventory App</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>

					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav mr-auto">
					      <li class="nav-item active">
					        <a class="nav-link" href="<?php echo base_url?>">Home</a>
					      </li>

						    <?php 

						    $loggedin = @Session::get('loggedin');
							if(@$loggedin){?>

						      <li class="nav-item">
						        <a class="nav-link" href="<?php echo base_url?>inventory">Inventory</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="<?php echo base_url?>order">Order</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="<?php echo base_url?>request/logout">Logout</a>
						      </li>

						  	<?php }else{?>

						      <li class="nav-item">
						        <a class="nav-link" href="<?php echo base_url?>login">Login</a>
						      </li>

						  	<?php }?>

					    </ul>
					    
					  </div>
					</nav>
				</section>

				
			</div>
		</div>
		
	</header>

	<!-- END HEADER -->


	<!-- BODY CONTENT -->

	<div class="container">
		<div class="row d-flex align-items-center bd-highlight mb-3 h90 ">
