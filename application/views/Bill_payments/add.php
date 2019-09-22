
<!-- Content -->
<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>
    
		<div class="card mb-4">
            <h6 class="card-header">ADD</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('Bill_payments/add'); ?>
					<div class="row clearfix">
						<div class="col-md-6">
						<label for="prj_id" class="form-label"><span class="text-danger">*</span>Bill Id</label>
						<div class='form-group'>
						<select class="form-control" name="bill_id">
							<option value=''>select name</option>
							<?php foreach($bill_ids as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->id?></option>
							<?php }?>
						</select>
						<span class="text-danger"><?php echo form_error('bill_id');?></span>
						</div>
						</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Coa Id</label>
							<div class="form-group">
							<select class="form-control" name="coa_id">
							<option value=''>select name</option>
							<?php foreach($coa_ids as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->id?></option>
							<?php }?>
						    </select>		
							<span class="text-danger"><?php echo form_error('coa_id');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Paid Date</label>
							<div class="form-group">
								<input type="date" name="paid_dt" value="<?php echo $this->input->post('paid_dt'); ?>" class="form-control" id="paid_dt" />
								<span class="text-danger"><?php echo form_error('paid_dt');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Amount</label>
							<div class="form-group">
								<input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control" id="amount" />
								<span class="text-danger"><?php echo form_error('amount');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Description</label>
							<div class="form-group">
								<input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control" id="description" />
								<span class="text-danger"><?php echo form_error('description');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Pay Method</label>
							<div class="form-group">
							<select class="form-control" name="payment_method">
							<option value=''>select name</option>
							<?php foreach($pay_ids as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->name?></option>
							<?php }?>
							</select>
								<span class="text-danger"><?php echo form_error('payment_method');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo $this->input->post('remarks'); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php echo form_error('remarks');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Transaction Type</label>
							<div class="form-group">
							<select class="form-control" name="tran_type_id">
							<option value=''>select name</option>
							<?php foreach($tran_ids as $row) {?>
  							<option value='<?php echo $row->id?>'><?php echo $row->name?></option>
							<?php }?>
							</select>
								<span class="text-danger"><?php echo form_error('tran_type_id');?></span>
							</div>
                        </div>
					</div>
					
					<div class="box-footer">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i> Save
						</button>
					</div>
            		<?php echo form_close(); ?>
      			</div>
        
     		</div>
		</div>    
	</div>
<!-- / Content -->



							