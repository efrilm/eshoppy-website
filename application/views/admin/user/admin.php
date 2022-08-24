                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1><?= elang('Data Administration') ?></h1>
                                    <span><?= elang('This is the registered administration data') ?>.</span>
                                </div>
                            </div>
                        </div>
                        <?= $this->session->flashdata('message');  ?>
                        <div class="row">
                            <div class="col-md-8">
                                <?php if ($action == 'add') { ?>
                                    <div class="card widget widget-list">
                                        <div class="card-header">
                                            <?= elang('Add New Administration') ?>
                                        </div>
                                        <div class="card-body">
                                            <?= form_open('admin/user/getAdmin/add') ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label"><?= elang('First Name') ?></label>
                                                    <input type="text" name="first_name" placeholder="<?= elang('First Name') ?>" class="form-control m-b-md" value="<?= set_value('first_name') ?>">
                                                    <small class="text-danger"><?= form_error('first_name') ?></small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label"><?= elang('Last Name') ?></label>
                                                    <input type="text" name="last_name" placeholder="<?= elang('Last Name') ?>" class="form-control m-b-md" value="<?= set_value('last_name') ?>">
                                                    <small class="text-danger"><?= form_error('last_name') ?></small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label"><?= elang('Email') ?></label>
                                                    <input type="text" name="email" placeholder="<?= elang('Email') ?>" class="form-control m-b-md" value="<?= set_value('email') ?>">
                                                    <small class="text-danger"><?= form_error('email') ?></small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label"><?= elang('Password') ?></label>
                                                    <input type="password" name="password" placeholder="<?= elang('Password') ?>" class="form-control m-b-md" value="<?= set_value('password') ?>">
                                                    <small class="text-danger"><?= form_error('password') ?></small>
                                                </div>
                                            </div>
                                            <div class="float-end">
                                                <button type="submit" class="btn btn-primary mt-5"><?= elang('Save') ?></button>
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
                                        <a href="<?= base_url('add-administration') ?>" class="btn btn-primary w-100"><?= elang('Add New Administration') ?></a>
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
                                                    <th><?= elang('Full Name') ?></th>
                                                    <th><?= elang('Email') ?></th>
                                                    <th><?= elang('Active') ?></th>
                                                    <th><?= elang('Created') ?></th>
                                                    <th><?= elang('Action') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($admin as $a) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $a->first_name ?> <?= $a->last_name ?></td>
                                                        <td><?= $a->email ?></td>
                                                        <td><?= $a->is_active ?></td>
                                                        <td><?= $a->date_created ?></td>
                                                        <td>
                                                            <a href="" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                                            <a href="" class="btn btn-danger btn-sm"><span class="material-icons-outlined">delete</span></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th><?= elang('Full Name') ?></th>
                                                    <th><?= elang('Email') ?></th>
                                                    <th><?= elang('Active') ?></th>
                                                    <th><?= elang('Created') ?></th>
                                                    <th><?= elang('Action') ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>