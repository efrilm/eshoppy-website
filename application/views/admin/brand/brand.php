<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Brand') ?></h1>
            </div>
        </div>
    </div>
    <?php
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger" role="alert">' . $error_upload . '</div>';
    }
    ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-8">
            <?php if ($action == "add") { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= elang('Add New Brand') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('add-brand') ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Brand Name') ?></label>
                                <input type="text" name="brand_name" class="form-control m-b-md" value="<?= set_value('brand_name') ?>" placeholder="<?= elang('Brand Name') ?>">
                                <small class="text-danger"><?= form_error('brand_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Brand Logo') ?></label>
                                <input type="file" id="preview_image" name="brand_logo" class="form-control m-b-md" placeholder="<?= elang('Brand Logo') ?>">
                                <img id="image_load" src="<?= base_url('assets/images/other/no_image.png') ?>" width="100" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary mt-4 float-end"><?= elang('Save') ?></button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            <?php } else if ($action == 'edit') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= elang('Edit Brand') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('edit-brand/' . $b->id) ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Brand Name') ?></label>
                                <input type="text" name="brand_name" class="form-control m-b-md" value="<?= $b->brand_name ?>" placeholder="<?= elang('Brand Name') ?>">
                                <small class="text-danger"><?= form_error('brand_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Brand Logo') ?></label>
                                <input type="file" id="preview_image" name="brand_logo" class="form-control m-b-md" placeholder="<?= elang('Brand Logo') ?>">
                                <img id="image_load" src="<?= base_url('assets/images/brand-logo/' . $b->brand_logo) ?>" width="100" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary mt-4 float-end"><?= elang('Edit') ?></button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card widget widget-info">
                    <div class="card-body">
                        <div class="widget-info-container">
                            <h5 class="widget-info-title"><?= elang('No Action') ?></h5>
                            <p class="widget-info-text m-t-n-xs"><?= elang('You are not doing any action') ?>.</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title"><?= elang('Action') ?></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block"><?= elang('showing 3 featured') ?>.</span>
                    <a href="<?= base_url('add-brand') ?>" class="btn btn-primary w-100"><?= elang('Add New Brand') ?></a>
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
                                <th><?= elang("Brand Name") ?></th>
                                <th><?= elang("Brand Logo") ?></th>
                                <th><?= elang('Created') ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($brand as $b) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $b->brand_name ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/images/brand-logo/' . $b->brand_logo) ?>" width="100" alt="">
                                    </td>
                                    <td><?= $b->created ?></td>
                                    <td>
                                        <a href="<?= base_url('edit-brand/' . $b->id_brand) ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                        <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#delete<?= $b->id_brand ?>">
                                            <span class="material-icons-outlined">delete</span>
                                        </button>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th><?= elang("Category Name") ?></th>
                                <th><?= elang('Created') ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <?php foreach ($brand as $b) { ?>
        <div class="modal fade" id="delete<?= $b->id_brand ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= elang('Delete Brand') ?> <?= $b->brand_name ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= elang('Are you sure') ?> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                        <a href="<?= base_url('admin/brand/delete/' . $b->id_brand) ?>" class="btn btn-primary"><?= elang('Yes') ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>