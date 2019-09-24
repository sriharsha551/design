<!-- Layout content -->
<div class="layout-content">

    <!-- Content -->
    <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-2 mb-4">
            <span class="text-muted font-weight-light"><?php echo $pagetitle; ?></span>
            <?php echo $breadcrumb; ?> 
    </h4>
        <div class="box card" style="overflow-X:auto">
            <div class="card-body">
                <div class="box-body card-datatable" >
                    <div class="box-tools">
                        <a href="<?php echo site_url('Invoice/add'); ?>" class="btn btn-success btn-sm float-right mb-2 ">Add</a>
                    </div>

                    <table class="datatables-demo table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Id</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Customer Address</th>
                            <th>Invoice Number</th>
                            <th>Order Number</th>
                            <th>Invoice Status</th>
                            <th>Invoice Date</th>
                            <th>Credit days</th>
                            <th>Invoice Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Tax</th>
                            <th>Tax Amount</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ($invoice as $invoice) { ?>
                        <tr>
                            <td><?php echo $invoice['id']; ?></td>
                            <td><?php echo $invoice['customer_id']; ?></td>
                            <td><?php echo $invoice['customer_name']; ?></td>
                            <td><?php echo $invoice['customer_email']; ?></td>
                            <td><?php echo $invoice['customer_phone']; ?></td>
                            <td><?php echo $invoice['customer_address']; ?></td>
                            <td><?php echo $invoice['invoice_num']; ?></td>
                            <td><?php echo $invoice['order_name']; ?></td>
                            <td><?php echo $invoice['invoice_status']; ?></td>
                            <td><?php echo $invoice['invoice_date']; ?></td>      
                            <td><?php echo $invoice['cr_days_id']; ?></td>
                            <td><?php echo $invoice['invoice_item']; ?></td>
                            <td><?php echo $invoice['quantity']; ?></td>
                            <td><?php echo $invoice['price']; ?></td>
                            <td><?php echo $invoice['tax_id']; ?></td>
                            <td><?php echo $invoice['tax_amount']; ?></td>
                            <td><?php echo $invoice['remarks']; ?></td>
                            <td>
                                <a href="<?php echo site_url('invoice/edit/' . $invoice['id']); ?>" class="btn btn-info btn-xs mr-1"><span class="fa fa-edit"></span></a>
                                <a href="<?php echo site_url('invoice/delete/' . $invoice['id']); ?>" class="btn btn-danger btn-xs mr-1"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>   
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
</div>