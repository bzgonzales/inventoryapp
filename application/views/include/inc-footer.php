			<div class="clearfix"></div> <br><br>
			<footer class="col-md-12">

				<section>
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-8 text-center">
							</div>
						</div>					
					</div>			
				</section>	

			</footer>
		</div> <!-- END DIV.ROW-->
	</div> <!-- END DIV.CONTAINER-->

	<!-- END OF BODY CONTENT-->




    <?php if(@$javascript){?>
		<?php foreach ($javascript as $js): ?>
			<script src="<?php echo $js ?>"></script>
		<?php endforeach; ?>
	<?php }?>

	<script
  	src="https://code.jquery.com/jquery-2.2.4.js"
  	integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>	                   
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url; ?>dist/js/scripts.min.js"></script> 
	<script src="<?php echo base_url; ?>dist/js/theme-script-orig.js"></script>


	</body>
</html>

