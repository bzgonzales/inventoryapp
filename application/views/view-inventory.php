	<div class="col-md-12">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h1>Inventory</h1>
			</div>
			<div class="col-md-12">

				<?php if(@$this->clients){?>

			      	<form method="get" class="form-inventory">
				        <div class="searchdiv row">
							<div class="col-md-6">
								<div class="control-group">
									<div class="controls">
										<select id="select-clients" class="selectpicker" data-live-search="true" multiple="">
											<option value="0" selected disabled>Select Clients</option>
											<?php foreach ($this->clients as $value) { ?>
												<?php $val = (object)$value;?>
							                    <option value="<?php echo $val->client_id; ?>"><?php echo $val->client_name; ?></option>
							                <?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<button id="submit-filter" type="button" class="btn login-btn">Filter</button>
								</div>
							</div>
						</div>
					</form>

				<?php }?>

				<hr>

			    <table id="items-table" class="display table table-bordered " cellspacing="0" width="100%" >

		          <thead>
		              <tr>
		                <th>Item Code</th>
		                <th>Item Description</th>
		                <th>Quantity in Stock</th>
		                <th>Reserved Quantity</th>
		                <th>Available Quantity</th>
		              </tr>
		          </thead>

		          <tbody>
		          </tbody>
			         
			    </table>

			</div>
		</div>
	</div>
