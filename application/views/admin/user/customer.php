<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Customer') ?></h1>
                <span><?= elang('This is the registered customer data') ?>.</span>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message');  ?>
    <div class="row">
        <div class="col-md-8">
            <?php if ($action == 'add') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <h5 class="card-title"><?= elang('Add New Customer') ?></h5>
                    </div>
                    <?= form_open('admin/user/customer/add') ?>
                    <div class="card-body">
                        <span class="text-muted m-b-xs d-block"><?= elang('The fields below cannot be empty') ?>.</span>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('First Name') ?></label>
                                <input type="text" name="first_name" class="form-control m-b-md" value="<?= set_value('first_name') ?>" placeholder="<?= elang('First Name') ?>">
                                <small class="text-danger"><?= form_error('first_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Last Name') ?></label>
                                <input type="text" name="last_name" class="form-control m-b-md" value="<?= set_value('last_name') ?>" placeholder="<?= elang("Last Name") ?>">
                                <small class="text-danger"><?= form_error('last_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Email') ?></label>
                                <input type="email" name="email" class="form-control m-b-md" value="<?= set_value('email') ?>" placeholder="<?= elang('Email') ?>">
                                <small class="text-danger"><?= form_error('email') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Password') ?></label>
                                <input type="password" name="password" class="form-control m-b-md" value="<?= set_value('Password') ?>" placeholder="<?= elang("Password") ?>">
                                <small class="text-danger"><?= form_error('password') ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><?= elang('Save') ?></button>
                    </div>
                    <?= form_close() ?>
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
                    <a href="<?= base_url('add-customer') ?>" class="btn btn-primary w-100"><?= elang('Add New Customer') ?></a>
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
                                <th><?= elang('Created') ?></th>
                                <th><?= elang('Full Name') ?></th>
                                <th><?= elang('Email') ?></th>
                                <th><?= elang('Active') ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($customer as $u) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u->date_created ?></td>
                                    <td><?= $u->first_name ?> <?= $u->last_name ?></td>
                                    <td><?= $u->email ?></td>
                                    <td><?= $u->is_active ?></td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                        <a href="<?= site_url('admin/user/deleteCustomer/') . $u->id_user  ?>" onclick="return confirm('.<?= elang('Are you sure') ?>.?') " class="btn btn-danger btn-sm"><span class="material-icons-outlined">delete</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th><?= elang('Created') ?></th>
                                <th><?= elang('Full Name') ?></th>
                                <th><?= elang('Email') ?></th>
                                <th><?= elang('Active') ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>