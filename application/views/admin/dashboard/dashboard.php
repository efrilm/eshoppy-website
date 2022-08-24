<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Dashboard') ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-primary">
                            <i class="material-icons-outlined">paid</i>
                        </div>
                        <?php
                        $transaction = $this->transaction->getTransactionToday()->result();
                        $total = 0;
                        $allShowing = $this->transaction->getTransactionAll()->num_rows();
                        foreach ($transaction as $t) {
                            $total += $t->total_payment;
                        }
                        ?>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title"><?= elang('Today\'s Sales') ?></span>
                            <span class="widget-stats-amount">IDR <?= number_format($total) ?></span>
                            <span class="widget-stats-info"><?= $allShowing ?> <?= elang('Orders Total') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-warning">
                            <i class="material-icons-outlined">person</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title"><?= elang('Active Users') ?></span>
                            <span class="widget-stats-amount"><?= $usersActive ?></span>
                            <span class="widget-stats-info"><?= $countUserThisMonth ?> <?= elang('new users this month') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-stats">
                <div class="card-body">
                    <div class="widget-stats-container d-flex">
                        <div class="widget-stats-icon widget-stats-icon-danger">
                            <i class="material-icons-outlined">inventory_2</i>
                        </div>
                        <div class="widget-stats-content flex-fill">
                            <span class="widget-stats-title"><?= elang('Products') ?></span>
                            <span class="widget-stats-amount"><?= $countProduct; ?></span>
                            <span class="widget-stats-info"><?= $countProductThisMonth ?> <?= elang('new products this month') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title"><?= elang('Transactions') ?><span class="badge badge-info badge-style-light">72 Last Week</span></h5>
                </div>
                <div class="card-body">
                    <?php $showing = $trans->num_rows() ?>
                    <span class="text-muted m-b-xs d-block"><?= elang('showing') ?> <?= $showing ?> <?= elang('out of') ?> <?= $allShowing ?> <?= elang('transactions') ?>.</span>
                    <ul class="widget-list-content list-unstyled">

                        <?php foreach ($trans->result() as $t) { ?>
                            <li class="widget-list-item widget-list-item-blue">
                                <span class="widget-list-item-icon">
                                    <i class="material-icons-outlined">paid</i>
                                </span>
                                <span class="widget-list-item-description">
                                    <a href="#" class="widget-list-item-description-title">
                                        <?= $t->recipient_name ?>
                                    </a>
                                    <?php if ($t->status_order == 0) { ?>
                                        <span class="badge badge-danger badge-style-light my-2"><?= elang('Not yet paid') ?></span>
                                    <?php } else { ?>
                                        <?php if ($t->status_order == 1) { ?>
                                            <span class="badge badge-info badge-style-light my-2"><?= elang('Being processed') ?></span>
                                        <?php } else if ($t->status_order == 2) { ?>
                                            <span class="badge badge-info badge-style-light my-2"><?= elang('On Delivery') ?></span>
                                        <?php } else if ($t->status_order == 3) { ?>
                                            <span class="badge badge-info badge-style-light my-2"><?= elang('Success') ?></span>
                                        <?php } ?>
                                    <?php } ?>
                                    <br>
                                    <span class="widget-list-item-description-date">
                                        <?= $t->date_order ?> <?= $t->time_order ?>
                                    </span>
                                </span>
                                <span class="widget-list-item-transaction-amount-negative">IDR <?= number_format($t->total_payment) ?></span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title"><?= elang('New Users') ?><span class="badge badge-success badge-style-light">57 total</span></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block"><?= elang('New Users This Month') ?></span>
                    <ul class="widget-list-content list-unstyled">
                        <?php foreach ($newUsers as $u) { ?>
                            <li class="widget-list-item widget-list-item-green">
                                <span class="widget-list-item-avatar">
                                    <div class="avatar avatar-rounded">
                                        <img src="<?= base_url('assets/images/profile/' . $u->image) ?>" alt="">
                                    </div>
                                </span>
                                <span class="widget-list-item-description">
                                    <a href="#" class="widget-list-item-description-title">
                                        <?= $u->first_name ?> <?= $u->last_name ?>
                                    </a>
                                    <span class="widget-list-item-description-subtitle">
                                        <?= $u->role ?>
                                    </span>
                                </span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title"><?= elang('Products') ?><span class="badge badge-danger badge-style-light"><?= elang('NEW') ?></span></h5>
                </div>
                <div class="card-body">
                    <ul class="widget-list-content list-unstyled">
                        <?php foreach ($newProducts as $p) { ?>
                            <li class="widget-list-item">
                                <span class="widget-list-item-icon widget-list-item-icon-large">
                                    <div class="widget-list-item-icon-image" style="background: url(<?= base_url() ?>assets/images/product/<?= $p->product_photo ?>)"></div>
                                </span>
                                <span class="widget-list-item-description">
                                    <a href="#" class="widget-list-item-description-title">
                                        <?= $p->product_name ?>
                                    </a>
                                    <span class="widget-list-item-description-date">
                                        5 Jun, author: Nanna Theano Saunders
                                    </span>
                                </span>
                                <span class="widget-list-item-product-amount">
                                    $79.99
                                </span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>