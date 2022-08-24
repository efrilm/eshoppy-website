<div class="app-sidebar">
    <div class="logo">
        <a href="<?= base_url('admin') ?>" class="logo-icon"><span class="logo-text">eShoopy</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="">
                <img src="<?= base_url() ?>/assets/images/profile/<?= $user->image ?>">
                <span class="activity-indicator"></span>
                <span class="user-info-text"><?= $user->first_name ?> <?= $user->last_name ?><br><span class="user-state-info"><?= elang('Active') ?></span></span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                <?= elang("Apps") ?>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'admin') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('admin') ?>" class="active"><i class="material-icons-two-tone">dashboard</i><?= elang('Dashboard') ?></a>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'product') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('product') ?>"><i class="material-icons-two-tone">inventory_2</i><?= elang('Product') ?></a>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'category') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('category') ?>"><i class="material-icons-two-tone">category</i><?= elang('Category') ?></a>
            </li>
            <li class="sidebar-title">
                <?= elang("Variant") ?>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'sub-variant') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('sub-variant') ?>"><i class="material-icons-two-tone">space_dashboard</i><?= elang('Sub Variant') ?></a>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'a-brand') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('a-brand') ?>"><i class="material-icons-two-tone">support</i><?= elang('Brand') ?></a>
            </li>
            <li class="sidebar-title">
                <?= elang("Transaction") ?>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">list_alt</i><?= elang('Orders') ?><i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="<?= base_url('not-yet-paid') ?>"><?= elang('Not yet paid') ?></a>
                    </li>
                    <li>
                        <a href="<?= base_url('being-processed') ?>"><?= elang('Being processed') ?></a>
                    </li>
                    <li>
                        <a href="<?= base_url('on-delivery') ?>"><?= elang("On Delivery") ?></a>
                    </li>
                    <li>
                        <a href="<?= base_url('order-finished') ?>"><?= elang("Finished") ?></a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-title">
                <?= elang("Users") ?>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'data-admin') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('data-admin') ?>"><i class="material-icons-two-tone">admin_panel_settings</i><?= elang('Administrations') ?></a>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'customer') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('customer') ?>"><i class="material-icons-two-tone">people</i><?= elang('Customers') ?></a>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'role') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('role') ?>"><i class="material-icons-two-tone">brightness_2</i><?= elang('Roles') ?></a>
            </li>
            <li class="sidebar-title">
                <?= elang("Widgets") ?>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'banner') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('banner') ?>"><i class="material-icons-two-tone">ad_units</i><?= elang('Banners') ?></a>
            </li>
            <li class="sidebar-title">
                <?= elang("Website Configuration") ?>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'web-config') {
                            echo 'active-page';
                        } ?>">
                <a href="<?= base_url('web-config') ?>"><i class="material-icons-two-tone">settings</i><?= elang('Website Configuration') ?></a>
            </li>
        </ul>
    </div>
</div>