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
                        <a href="<?php echo site_url('SiteVisit/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>PROJECT Name</th>
                            <th>SITE VISIT DATE</th>
                            <th>SITE VISIT TIME</th>
                            <th>SITE ENGINEER ID</th>
                            <th>REMARKS</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($sitevisit as $d) {?>
                        <tr>
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['project_name']; ?></td>
                            <td><?php echo $d['site_visit_date']; ?></td>
                            <td><?php echo $d['site_visit_time']; ?></td>
                            <td><?php echo $d['empName']; ?></td>
                            <td><?php echo $d['remarks']; ?></td>
                            <td>
                                <a href="<?php echo site_url('SiteVisit/edit/' . $d['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('SiteVisit/remove/' . $d['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>   
            </div>
        </div>
</div>
<!-- / Content -->