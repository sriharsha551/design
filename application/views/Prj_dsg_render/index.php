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
                <div class="box-body card-datatable">
                    <div class="box-tools">
                        <a href="<?php echo site_url('Prj_dsg_render/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Design Stage</th>
                            <th>Name</th>
                            <th>Attached Image</th>
                            <th>Percentage</th>
                            <th>Review Status</th>
                            <th>Remarks</th>
                            <th>Revisions</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($renders as $s) {?>
                        <tr>
                            <td><?php echo $s['id']; ?></td>
                            <td><?php echo $s['prj_name']; ?></td>
                            <td><?php echo $s['design_stage']; ?></td>
                            <td><?php echo $s['name']; ?></td>
                            <td><a target="_blank" href=<?php echo site_url('Prj_dsg_render/image_display/'.$s['attach_name'].'/'.$s['id'])?>><?php echo $s['attach_name']?></a></td>
                            <td><?php echo $s['percentage']; ?></td>
                            <td><?php echo $s['review_status']; ?></td>
                            <td><?php echo $s['remarks']; ?></td>
                            <td><?php echo $s['revisions']; ?></td>
                            <td>
                                <a href="<?php echo site_url('Prj_dsg_render/edit/' . $s['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('Prj_dsg_render/remove/' . $s['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
</div>