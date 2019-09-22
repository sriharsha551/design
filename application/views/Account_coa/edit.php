 
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
        <h6 class="card-header">Edit</h6>
        <div class="card-body"> 
            <div class="box-body">
                <?php echo form_open('Account_coa/edit/'.$coa_detail['id']); ?>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="name" class="form-label"><span class="text-danger">*</span>Method Name</label>
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $coa_detail['name']); ?>" class="form-control" id="name" />
                            <span class="text-danger"><?php echo form_error('name');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
							<label  class="form-label"><span class="text-danger">*</span>Category</label>
							<div class="form-group">
                            <select name="coa_cat_id" class="form-control">
								<option value="">Select Category</option>
								<?php foreach ($cat_list as $cat) { ;?>
									<option value="<?php echo $cat['id'];?>" <?php echo ($this->input->post('coa_cat_id') == $cat['id'] || $coa_detail['coa_cat_id'] == $cat['id']  ) ? 'selected="selected"' : ""; ?>>
										<?php echo $cat['name'];?>
									</option>
								<?php } ?>
                            </select>
								<span class="text-danger"><?php echo form_error('enabled');?></span>
							</div>
						</div>
                    <div class="col-md-6">
						<label for="enabled" class="form-label"><span class="text-danger">*</span>Enabled</label>
						<div class="form-group">
                            <select name="enabled" class="form-control">
                                <option value="1" <?php echo ($this->input->post('enabled') == "1" || $coa_detail['enabled'] == "1") ? 'selected="selected"' : ""; ?>>Yes</option>
                                <option value="0" <?php echo ($this->input->post('enabled') == "0" || $coa_detail['enabled'] == "0") ? 'selected="selected"' : ""; ?>>No</option>
                            </select>
								<span class="text-danger"><?php echo form_error('enabled');?></span>
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
