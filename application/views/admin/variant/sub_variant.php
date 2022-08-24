<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Sub Variant') ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?php if ($action == 'add') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= elang('Add Sub Variant') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open('add-sub-variant') ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Sub Variant') ?></label>
                                <input type="text" name="sub_variant_name" class="form-control m-b-md" value="<?= set_value('sub_variant_name') ?>" placeholder="<?= elang('Sub Variant') ?>">
                                <small class="text-danger"><?= form_error('sub_variant_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary mt-4 float-end"><?= elang('Save') ?></button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            <?php } else if ($action == 'edit') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= elang('Edit Sub Variant') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open('edit-sub-variant/' . $sv->id) ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Sub Variant') ?></label>
                                <input type="text" name="sub_variant_name" class="form-control m-b-md" value="<?= $sv->sub_variant_name ?>" placeholder="<?= elang('Sub Variant') ?>">
                                <small class="text-danger"><?= form_error('sub_variant_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary mt-4 float-end"><?= elang('Save') ?></button>
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
                    <a href="<?= base_url('add-sub-variant') ?>" class="btn btn-primary w-100"><?= elang('Add Sub Variant') ?></a>
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
                                <th><?= elang("Sub Variant") ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($subVariant as $sv) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $sv->sub_variant_name ?></td>
                                    <td>
                                        <a href="<?= base_url('edit-sub-variant/' . $sv->id) ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $sv->id ?>">
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
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($subVariant as $sv) { ?>
    <div class="modal fade" id="delete<?= $sv->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= elang('Delete') ?> <?= $sv->sub_variant_name ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= elang('Are you sure') ?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                    <a href="<?= base_url('admin/variant/deleteSubVariant/' . $sv->id) ?>" class="btn btn-primary"><?= elang('Yes') ?></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>