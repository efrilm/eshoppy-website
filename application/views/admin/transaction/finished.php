<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Order Finished') ?> </h1>
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
                                    <td><?= $o->update_date ?> <?= $o->update_time ?></td>
                                    <td><?= $o->shipping ?> - <?= $o->package ?></td>
                                    <td>IDR <?= number_format($o->total_payment) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('a-detail-order/' . $o->no_order) ?>" class="btn btn-primary btn-sm mb-2"><span class="material-icons-outlined">visibility</span></a>
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