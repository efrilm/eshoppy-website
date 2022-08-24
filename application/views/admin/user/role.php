<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Role') ?></h1>
                <span><?= elang('Role here to determine the access rights of a person in accessing a system') ?>.</span>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-8">
            <?php if ($action == "add") { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= elang('Add New Role') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open('admin/user/role/add') ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Role Name') ?></label>
                                <input type="text" name="role_name" class="form-control m-b-md" value="<?= set_value('role_name') ?>" placeholder="<?= elang('Role Name') ?>">
                                <small class="text-danger"><?= form_error('role_name') ?></small>
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
                        <div class="card-title"><?= elang('Edit Role') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open('admin/user/role/edit/' . $eRole->id) ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Role Name') ?></label>
                                <input type="text" name="role_name" class="form-control m-b-md" value="<?= $eRole->role ?>" placeholder="<?= elang('Role Name') ?>">
                                <small class="text-danger"><?= form_error('role_name') ?></small>
                            </div>
                            <div class="col-md-6">
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
                    <a href="<?= base_url('add-role') ?>" class="btn btn-primary w-100"><?= elang('Add New Role') ?></a href="<?= base_url('admin/user/') ?>">
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
                                <th><?= elang("Role") ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($role as $r) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $r->role ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/user/role/edit/' . $r->id) ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                        <a href="<?= base_url('admin/user/deleteRole/' . $r->id) ?>" class="btn btn-danger btn-sm"><span class="material-icons-outlined">delete</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th><?= elang("Role") ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>