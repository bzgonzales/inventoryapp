	<div class="col-md-12">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h1>Orders</h1>
			</div>
			<div class="col-md-12">

				<?php if(@$this->clients){?>

			      	<form method="get" class="form-inventory">
				        <div class="searchdiv row">
							<div class="col-md-5">
								<div class="control-group">
									<div class="controls">
										<label>Clients:</label>
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

					        <div class="col-md-5">
					            <label>Delivery Date:</label>
					            <div class="input-daterange input-group" id="datepicker">
					                <span class="input-group-addon">From:</span>
					                <input type="text" class="input-sm form-control datepicker" id="start-date" name="start" />
					                <span class="input-group-addon">to:</span>
					                <input type="text" class="input-sm form-control datepicker" id="end-date" name="end" />
					            </div>
					        </div>

							<div class="col-md-1">
								<label></label>
								<div class="form-group">
									<button id="submit-filter-orders" type="button" class="btn login-btn">Filter</button>
								</div>
							</div>
							<div class="col-md-1">
								<label></label>
								<div class="form-group">
									<button id="add-order-btn" data-toggle="modal" data-target="#order-modal" type="button" class="btn btn-primary">Add Order</button>
								</div>
							</div>
						</div>
					</form>

				<?php }?>

				<hr>

			    <table id="order-table" class="display table table-bordered " cellspacing="0" width="100%" >

		          <thead>
		              <tr>
		                <th>Client</th>
		                <th>Delivery Date</th>
		                <th>Customer Name</th>
		                <th>Customer Address</th>
		                <th>Zip Code</th>
		                <th>List of Items</th>
		                <th>Action</th>
		              </tr>
		          </thead>

		          <tbody>
		          </tbody>
			         
			    </table>

			</div>
		</div>
	</div>


<div id="order-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Order Information</h5>
        <button type="button" id="close-button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="order-content"></div>
      </div>
      <div class="modal-footer">
        <div id="order-buttons"></div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->