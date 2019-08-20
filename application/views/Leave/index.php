<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Layout content -->
<div class="layout-content">

	<!-- Content -->
	<div class="container-fluid flex-grow-1 container-p-y">

		<h4 class="font-weight-bold py-2 mb-4">
			<span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
			<?php echo $breadcrumb; ?>
		</h4>

		<div class="box card">
			<div class="card-body">
				<div class="box-body">
				    

                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Employee Name</th>
                            <th>Leave Type</th>
                            <th>Posting Date</th>
                            <th>Status</th>
                            <?php if ($this->ion_auth->is_admin()) {?>
                            <th>Actions</th>
                            <?php }?>
                        </tr>
                        <?php foreach($leaves as $l){ ?>
                        <tr>
                            <td><?php echo $l['id']; ?></td>
                            <td><?php echo $l['empid']; ?></td>
                            <td><?php echo $l['leaveType']; ?></td>
                            <td><?php echo date("d-m-Y", strtotime($l['PostingDate'])); ?></td>
                            <td><?php if($l['Status']==0) echo "Pending"; else if($l["Status"]==1) echo "Approved"; else echo "Not Approved"; ?></td>
                            <?php if ($this->ion_auth->is_admin()) {?>
                            <td>
                                <a href="<?php echo site_url('leave/details/'.$l['id']); ?>" class="btn btn-info btn-xs">View</a> 
                                
                            </td>
                            <?php }?>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
			</div>
		</div>
	</div>


</div>
<!-- / Content -->
