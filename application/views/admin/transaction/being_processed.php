<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Orders') ?> <?= elang('Being processed') ?></h1>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="datatable4" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th><?= elang('No. Order') ?></th>
                                <th><?= elang('Date') ?></th>
                                <th><?= elang('Shipping') ?></th>
                                <th><?= elang('Total') ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order as $o) { ?>
                                <tr>
                                    <td><?= $o->no_order ?></td>
                                    <td><?= $o->date_order ?> <?= $o->time_order ?></td>
                                    <td><?= $o->shipping ?> - <?= $o->package ?></td>
                                    <td>IDR <?= number_format($o->total_payment) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('a-detail-order/' . $o->no_order) ?>" class="btn btn-primary btn-sm mb-2"><span class="material-icons-outlined">visibility</span></a>
                                        <button type="button" class="btn btn-success  mb-2" data-bs-toggle="modal" data-bs-target="#send<?= $o->no_order ?>">
                                            <?= elang('Send') ?>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?= elang('No. Order') ?></th>
                                <th><?= elang('Date') ?></th>
                                <th><?= elang('Shipping') ?></th>
                                <th><?= elang('Total') ?></th>
                                <th><?= elang('Action') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?php foreach ($order as $o) { ?>
    <div class="modal fade" id="send<?= $o->no_order ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= elang('Orders Ready to Ship with') ?> #<?= $o->no_order ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('admin/transaction/sendProduct/' . $o->no_order) ?>
                <div class="modal-body">
                    <label class="form-label"><?= elang('No. Resi') ?></label>
                    <input type="text" class="form-control" name="no_resi" placeholder="<?= elang('No. Resi') ?>" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                    <button type="submit" class="btn btn-primary"><?= elang('Yes') ?></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>