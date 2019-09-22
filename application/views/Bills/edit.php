
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb;?>
	<?php 
		$GLOBALS['supplier_id'] = null;
		$selected = null;
		foreach($suppliers as $supplier)
		{
			if($supplier->id == $bills['sup_id'])
			{
				$selected = $supplier;
			}
		}
		if(isset($_POST['supp_id']))
		{
			$GLOBALS['supplier_id'] = $_POST['supp_id'];
			foreach($suppliers as $supplier){
				if($supplier->id == $GLOBALS['supplier_id']){
					$selected = $supplier;
					$_SESSION['edit_error'] = false;
				}
			}
		}
	?>
</h4>
<div class="card mb-4">
            <h6 class="card-header">Edit</h6>
			<div class="card-body"> 
				<div class="box-body"> 
				<form action="" method="post">
				<div class="row clearfix">
				<div class="col-md-6">
				<label for="sup_id" class="form-label"><span class="text-danger">*</span>Supplier Id</label>
				<div class="form-group">
				<select class="form-control" name="supp_id" onchange = "this.form.submit();" >
						<?php foreach($suppliers as $row) {?>
  							<option value='<?php echo $row->id?>' <?php echo ($row->id == $selected->id) ? 'selected="selected"' : "" ?> ><?php echo $row->id.' - ' .$row->name?></option>
						<?php }?>
				</select>
				<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('sup_id');?></span>
				</div>
				</div>
				</div>
				</form>
            		<?php echo form_open('Bills/edit/'.$bills['id']); ?>
					<div class="row clearfix">
						<div class="col-md-6" style = "display:none">
						<label for="sup_id" class="form-label"><span class="text-danger">*</span>Supplier Id</label>
						<div class='form-group'>
						<input type="hidden" name="sup_id" value="<?php echo $selected->id ? $selected->id : $bills['sup_id']; ?>" class="form-control" id="sup_id" />
						<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('sup_id');?></span>
						</div>
						</div>
                        <div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Supplier Name</label>
							<div class="form-group">
								<input type="text" name="sup_name" value="<?php echo $selected->name ? $selected->name : $bills['sup_name']; ?>" class="form-control" id="sup_name" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('sup_name');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="attach_link" class="form-label"><span class="text-danger">*</span>Supplier Email</label>
							<div class="form-group">
								<input type="text" name="sup_email" value="<?php echo $selected->email_id ? $selected->email_id : $bills['sup_email']; ?>" class="form-control" id="sup_email" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('sup_email');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Supplier Phone</label>
							<div class="form-group">
								<input type="text" name="sup_phone" value="<?php echo $selected->contact_no_1 ? $selected->contact_no_1 : $bills['sup_phone']; ?>" class="form-control" id="sup_phone" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('sup_phone');?></span>
							</div>
						</div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Supplier Address</label>
							<div class="form-group">
								<input type="text" name="sup_address" value="<?php echo $selected->address ? $selected->address : $bills['sup_address']; ?>" class="form-control" id="sup_address" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('sup_address');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Number</label>
							<div class="form-group">
								<input type="text" name="bill_num" value="<?php echo ($this->input->post('bill_num') ? $this->input->post('bill_num') : $bills['bill_num']); ?>" class="form-control" id="bill_num" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('bill_num');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Order Number</label>
							<div class="form-group">
								<input type="text" name="order_num" value="<?php echo ($this->input->post('order_num') ? $this->input->post('order_num') : $bills['order_num']); ?>" class="form-control" id="order_num" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('order_num');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Status</label>
							<div class="form-group">
								<input type="text" name="bill_status" value="<?php echo ($this->input->post('bill_status') ? $this->input->post('bill_status') : $bills['bill_status']); ?>" class="form-control" id="bill_status" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('bill_status');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Date</label>
							<div class="form-group">
								<input type="text" name="bill_date" value="<?php echo ($this->input->post('bill_date') ? $this->input->post('bill_date') : $bills['bill_date']); ?>" class="form-control" id="bill_date" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('bill_date');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Credit Days</label>
							<div class="form-group">
								<input type="text" name="cr_days_id" value="<?php echo ($this->input->post('cr_days_id') ? $this->input->post('cr_days_id') : $bills['cr_days_id']); ?>" class="form-control" id="cr_days_id" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('cr_days_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Bill Item</label>
							<div class="form-group">
								<input type="text" name="bill_item" value="<?php echo ($this->input->post('bill_item') ? $this->input->post('bill_item') : $bills['bill_item']); ?>" class="form-control" id="bill_item" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('bill_item');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Quantity</label>
							<div class="form-group">
								<input type="text" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $bills['qty']); ?>" class="form-control" id="qty" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('qty');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Price</label>
							<div class="form-group">
								<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $bills['price']); ?>" class="form-control" id="price" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('price');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax</label>
							<div class="form-group">
								<input type="text" name="tax_id" value="<?php echo ($this->input->post('tax_id') ? $this->input->post('tax_id') : $bills['tax_id']); ?>" class="form-control" id="tax_id" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('tax_id');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Tax Amount</label>
							<div class="form-group">
								<input type="text" name="tax_amt" value="<?php echo ($this->input->post('tax_amt') ? $this->input->post('tax_amt') : $bills['tax_amt']); ?>" class="form-control" id="tax_amt" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('tax_amt');?></span>
							</div>
                        </div>
                        <div class="col-md-6">
							<label for="percentage" class="form-label"><span class="text-danger">*</span>Remarks</label>
							<div class="form-group">
								<input type="text" name="remarks" value="<?php echo ($this->input->post('remarks') ? $this->input->post('remarks') : $bills['remarks']); ?>" class="form-control" id="remarks" />
								<span class="text-danger"><?php if($_SESSION['edit_error']==true)echo form_error('remarks');?></span>
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
