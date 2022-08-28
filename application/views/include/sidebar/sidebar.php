<?php if(@$sidebars){ ?>
	<?php foreach ($sidebars as $key => $sidebar) { ?>
		<?php $this->load->view('include/sidebar/'.$sidebar); ?>
	<?php } ?>
<?php } ?>