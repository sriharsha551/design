
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb;?>
</h4>
<div class="card mb-4">
            <h6 class="card-header">Edit</h6>
			<div class="card-body"> 
				<div class="box-body"> 
            		<?php echo form_open('bill_payments/edit/'.$bill['id']); ?>
					<div class="row clearfix">
						<div class="col-md-6">
						<label for="prj_id" class="form-label"><span class="text-danger">*</span>Bill Id</label>
						<div class='form-group'>
						<select class="form-control" name="bill_id" >
							        <?php foreach($bill_ids as $row) {?>
  							        <option value='<?php echo $row->id?>' <?php echo ($row->id == $bill['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->id?></option>
							        <?php }?>
								</select>	
						<span class="text-danger"><?php echo form_error('bill_id');?></span>
						</div>
						</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Coa Id</label>
							<div class="form-group">
							<select class="form-control" name="coa_id" >
							        <?php foreach($coa_ids as $row) {?>
  							        <option value='<?php echo $row->id?>' <?php echo ($row->id == $bill['id']) ? 'selected="selected"' : "" ?> ><?php echo $row->id?></option>
							        <?php }?>
								</select>	
								<span class="text-danger"><?php echo form_error('coa_id');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Paid Date</label>
							<div class="form-group">
								<input type="text" name="paid_dt" value="<?php echo ($this->input->post('paid_dt') ? $this->input->post('paid_dt') : $bill['paid_dt']); ?>" class="form-control" id="paid_dt" />
								<span class="text-danger"><?php echo form_error('paid_dt');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Amount</label>
							<div class="form-group">
								<input type="text" name="amount" value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $bill['amount']); ?>" class="form-control" id="amount" />
								<span class="text-danger"><?php echo form_error('amount');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Description</label>
							<div class="form-group">
								<input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $bill['description']); ?>" class="form-control" id="description" />
								<span class="text-danger"><?php echo form_error('description');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Pay Method</label>
							<div class="form-group">
								<input type="text" name="payment_method" value="<?php echo ($this->input->post('payment_method') ? $this->input->post('payment_method') : $bill['payment_method']); ?>" class="form-control" id="payment_method" />
								<span class="text-danger"><?php echo form_error('payment_method');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $bill['remarks']); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php echo form_error('remarks');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Transaction Type</label>
							<div class="form-group">
								<input type="text" name="tran_type_id" value="<?php echo ($this->input->post('tran_type_id') ? $this->input->post('tran_type_id') : $bill['tran_type_id']); ?>"" class="form-control" id="tran_type_id" />
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