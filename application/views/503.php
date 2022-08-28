<!DOCTYPE html>
<html>
<head>
	<title><?php echo (@$maintenance_title) ? $maintenance_title : 'Simply Denver Homes | Maintenance Mode' ; ?> </title>
	<style type="text/css">
	body {
		background: url('<?php echo base_url('assets/images-main-theme/home-banner.jpg'); ?>') no-repeat;
		background-size: cover;
		font-family: 'Open Sans', sans-serif;
		text-align: center;
	}
	h2, h4 { font-weight: normal; }
	.mask {
		background: rgba(255, 255, 255, 0.53);
		position: fixed;
		height: 100%;
		left: 0;
		right: 0;
		bottom: 0;
	}
	.brown { color: #ab4e1d; }
	.content {
		position: fixed;
		z-index: 20;
		left: 0;
		padding: 15px 0;
		right: 0;
		width: 450px;
		top: 20%;
		background: #FFF;
		margin-left: auto;
		margin-right: auto;
		border-radius: 5px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-o-border-radius: 5px;
	}
	</style>
</head>
<body>
<!-- <div class="mask"></div> -->

<div class="content">
	<img src="<?php echo base_url('assets/images-main-theme/logo.png'); ?>">
	<h2>
		We are currently upgrading our site. <br> Please visit us again later 
	</h2>
	<h4>For Inquiries: <br><br>
		<div><span class="brown">Call Us:</span> +1 720-260-0180</div>
		<div><span class="brown">Email Us:</span> info@simplydenverhomes.com</div><br>
		<div>Simply Denver</div>
		<div>44 Cook St #100 </div>
		<div>Denver, CO 80206</div>
	</h4>
</div>


<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Open+Sans::latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); 
</script>
</body>
</html>