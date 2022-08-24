<div class="header-bottom">
    <div class="header-sticky">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col-xl-2 col-6">
                    <div class="header-logo">
                        <a href="index.html"><img src="<?= base_url() ?>assets/images/logo/logo.png" width="50" alt="Site Logo" /></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Menu Start -->
                <div class="col-xl-8 d-none d-xl-block">
                    <div class="main-menu position-relative">
                        <ul>
                            <li><a href="<?= base_url() ?>"> <span><?= elang('Home') ?></span></a></li>
                            <li class="has-children">
                                <a href="#"><span><?= elang('Category') ?></span> <i class="fa fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <?php $category = $this->category_model->getCategoryAll()->result(); ?>
                                    <?php foreach ($category as $ct => $value) { ?>
                                        <li><a href="<?= base_url('category/' . $value->id) ?>"><?= $value->category_name ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#"><span><?= elang('Brand') ?></span> <i class="fa fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <?php
                                    $brand = $this->brand->getBrandAll()->result();
                                    foreach ($brand as $key => $value) {
                                    ?>
                                        <li><a href="<?= base_url('category/' . $value->id_brand) ?>"><?= $value->brand_name ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="contact.html"> <span><?= elang('About') ?></span></a></li>
                            <li><a href="contact.html"> <span><?= elang('Contact') ?></span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Menu End -->

                <!-- Header Action Start -->
                <div class="col-xl-2 col-6">
                    <div class="header-actions">

                        <!-- Search Header Action Button Start -->
                        <a href="javascript:void(0)" class="header-action-btn header-action-btn-search"><i class="pe-7s-search"></i></a>
                        <!-- Search Header Action Button End -->
                        <?php if (empty($this->session->userdata('email'))) { ?>
                            <a href="" type="button" class="header-action-btn d-none d-md-block" data-bs-toggle="modal" data-bs-target="#notLogin">
                                <i class="pe-7s-gift"></i>
                            </a>
                        <?php } else { ?>
                            <a href="<?= base_url('my-order') ?>" class="header-action-btn d-none d-md-block"><i class="pe-7s-gift"></i></a>
                        <?php } ?>

                        <!-- User Account Header Action Button Start -->
                        <?php if (empty($this->session->userdata('email'))) { ?>
                            <a href="" type="button" class="header-action-btn d-none d-md-block" data-bs-toggle="modal" data-bs-target="#notLogin">
                                <i class="pe-7s-user"></i>
                            </a>
                        <?php } else { ?>
                            <a href="<?= base_url('account') ?>" class="header-action-btn d-none d-md-block"><i class="pe-7s-user"></i></a>
                        <?php } ?>
                        <!-- User Account Header Action Button End -->

                        <!-- Wishlist Header Action Button Start -->
                        <a href="wishlist.html" class="header-action-btn header-action-btn-wishlist d-none d-md-block">
                            <i class="pe-7s-like"></i>
                        </a>
                        <!-- Wishlist Header Action Button End -->

                        <!-- Shopping Cart Header Action Button Start -->
                        <a href="javascript:void(0)" class="header-action-btn header-action-btn-cart">
                            <i class="pe-7s-shopbag"></i>
                            <?php
                            $jmlCart = $this->cart_model->getCartAll()->num_rows();

                            if ($this->session->userdata('email') != null) {
                            ?>
                                <span class="header-action-num"><?= $jmlCart ?></span>
                            <?php } else { ?>
                                <span class="header-action-num">0</span>
                            <?php } ?>
                        </a>
                        <!-- Shopping Cart Header Action Button End -->

                        <!-- Mobile Menu Hambarger Action Button Start -->
                        <a href="javascript:void(0)" class="header-action-btn header-action-btn-menu d-xl-none d-lg-block">
                            <i class="fa fa-bars"></i>
                        </a>
                        <!-- Mobile Menu Hambarger Action Button End -->

                    </div>
                </div>
                <!-- Header Action End -->

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="notLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= elang('Information') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= elang('You have to login first'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                <a href="<?= base_url('sign-in') ?>" class="btn btn-primary"><?= elang('Sign In') ?></a href="<?= base_url('sign-in') ?>">
            </div>
        </div>
    </div>
</div>