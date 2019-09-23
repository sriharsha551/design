
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
            		<?php echo form_open('Act_tax/add'); ?>
 
					<div class="row clearfix">
						<div class="col-md-6">
							<label for="name" class="form-label"><span class="text-danger">*</span>Name</label>
							<div class="form-group">
								<input type="text" name="name" value="<?php echo $this->input->post('bill_status'); ?>" class="form-control" id="bill_status" />
								<span class="text-danger">
                                    <?php
                                        if(isset($err)){
                                            echo $err;
                                        }else{
                                            echo form_error('name');
                                        } 
                                    ?>
                                </span>
							</div>
						</div>

                        <div class="col-md-6">
							<label for="value" class="form-label"><span class="text-danger">*</span>Value</label>
							<div class="form-group">
								<input type="number" name="value" value="<?php echo $this->input->post('value'); ?>" class="form-control" id="value" />
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
