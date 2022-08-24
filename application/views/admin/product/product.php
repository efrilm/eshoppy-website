<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Product') ?></h1>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card widget widget-info">
                <div class="card-body">
                    <div class="widget-info-container">
                        <h5 class="widget-info-title"><?= elang('No Action') ?></h5>
                        <p class="widget-info-text m-t-n-xs"><?= elang('You are not doing any action') ?>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title"><?= elang('Action') ?></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block"><?= elang('showing 3 featured') ?>.</span>
                    <a href="<?= base_url('add-product') ?>" class="btn btn-primary w-100"><?= elang('Add New Product') ?></a href="<?= base_url('admin/user/') ?>">
                    <button class="btn btn-primary w-100 mt-3"><?= elang('Report') ?></button>
                    <button class="btn btn-danger w-100 mt-3"><?= elang('Delete All') ?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Data</h5>
                </div>
                <div class="card-body">
                    <table id="datatable1" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th><?= elang("Category Name") ?></th>
                                <th><?= elang('Product Name') ?></th>
                                <th><?= elang('Price') ?></th>
                                <th><?= elang('Photo') ?></th>
                                <th><?= elang('Stok') ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($product as $p) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p->category_name ?></td>
                                    <td><?= $p->product_name ?></td>
                                    <td>IDR <?= number_format($p->product_price)  ?></td>
                                    <td><img src="<?= base_url('assets/images/product/' . $p->product_photo) ?>" width="100" alt=""></td>
                                    <td><?= $p->stok ?></td>
                                    <td>
                                        <a href="<?= base_url('edit-product/' . $p->id_product) ?>" class="btn btn-success btn-sm mb-2"><span class="material-icons-outlined">edit</span></a>
                                        <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#delete<?= $p->id_product ?>">
                                            <span class="material-icons-outlined">delete</span>
                                        </button>

                                        <a href="<?= base_url('a-detail-product/' . $p->product_seo) ?>" class="btn btn-primary btn-sm mb-2"><span class="material-icons-outlined">visibility</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    <?php foreach ($product as $p) { ?>
        <div class="modal fade" id="delete<?= $p->id_product ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= elang('Delete Product') ?> <?= $p->product_name ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= elang('Are you sure') ?> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                        <a href="<?= base_url('admin/product/delete/' . $p->id_product) ?>" class="btn btn-primary"><?= elang('Yes') ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>