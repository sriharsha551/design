
<!-- Content -->
<div class="container-fluid flex-grow-1 container-p-y">

<h4 class="font-weight-bold py-2 mb-4">
	<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
	<?php echo $breadcrumb; ?>
</h4>
      	<div class="card mb-4">
          <h6 class="card-header">Account_cao_category Edit</h6>
            
            <div class="box card">
                                    <div class="card-body"> 
                                    	<div class="box-body"> 
			<?php echo form_open('Account_cao_category/edit/'.$Account_cao_category['id']); ?>
		
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label"><span class="text-danger">*</span>Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $Account_cao_category['name']); ?>" class="form-control" id="name" />
							<span class="text-danger"><?php echo form_error('name');?></span>
						</div>
					</div>
					<?php if($Account_cao_category['enabled']=='0')
                            {
                                $Account_cao_category['enabled']='Yes';
                            }
                            else
                            {
                                $Account_cao_category['enabled']='No';
                            }?>
					<div class="form-group col-md-6">
					<label class="form-label">Enabled</label>
						<select class="custom-select" name="enabled" required>
						<option value="<?= $Account_cao_category['enabled'];?>" ><?= $Account_cao_category['enabled'];?></option>
                			<option value="0">Yes</option>
							<option value="1">No</option>    
						</select>
						</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>  </div></div>
        


</div>
<!-- / Content -->