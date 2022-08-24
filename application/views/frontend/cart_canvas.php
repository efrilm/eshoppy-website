<div class="cart-offcanvas-wrapper">
    <div class="offcanvas-overlay"></div>

    <!-- Cart Offcanvas Inner Start -->
    <div class="cart-offcanvas-inner">

        <!-- Button Close Start -->
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
        <!-- Button Close End -->

        <!-- Offcanvas Cart Content Start -->
        <div class="offcanvas-cart-content">

            <?php if ($this->session->userdata('email') != null) { ?>


                <!-- Offcanvas Cart Title Start -->
                <h2 class="offcanvas-cart-title mb-10"><?= elang('Shopping Cart') ?></h2>
                <!-- Offcanvas Cart Title End -->


                <?php
                $price = 0;
                $cart = $this->cart_model->getCartByUser($this->session->userdata('id_user'));
                $total = 0;
                $grand_total = 0;
                if ($cart->num_rows() != 0) {
                    foreach ($cart->result() as $c) {
                        $price += $c->product_price;
                        // var_dump($qty);
                        $total = $c->qty * $c->product_price;
                        $grand_total += $total;
                ?>

                        <!-- Cart Product/Price Start -->
                        <div class="cart-product-wrapper mb-6">
                            <!-- Single Cart Product Start -->
                            <div class="single-cart-product">
                                <div class="cart-product-thumb">
                                    <a href="<?= base_url('detail-product/' . $c->product_seo) ?>"><img src="<?= base_url() ?>/assets/images/product/<?= $c->product_photo ?>" width="100" height="100" alt="<?= $c->product_photo ?>"></a>
                                </div>
                                <div class="cart-product-content">
                                    <h3 class="title"><a href="<?= base_url('detail-product/' . $c->product_seo) ?>"><?= $c->product_name ?></a></h3>
                                    <span class="price">
                                        <span class="new"> <?= $c->qty ?> x IDR <?= number_format($c->product_price);  ?></span>
                                        <!-- <span class="old">$40.00</span> -->
                                    </span>
                                </div>
                            </div>
                            <!-- Single Cart Product End -->
                            <!-- Product Remove Start -->
                            <div class="cart-product-remove">
                                <a href="<?= base_url('cart/delete/' . $c->id_cart) ?>"><i class="fa fa-trash"></i></a>
                            </div>
                            <!-- Product Remove End -->
                        </div>
                        <!-- Cart Product/Price End -->

                    <?php }  ?>

                    <!-- Cart Product Total Start -->
                    <div class="cart-product-total">
                        <span class="value">Subtotal</span>
                        <span class="price">IDR <?= number_format($grand_total) ?></span>
                    </div>
                    <!-- Cart Product Total End -->

                    <!-- Cart Product Button Start -->
                    <div class="cart-product-btn mt-4">
                        <a href="<?= base_url('cart') ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100"><?= elang('View Cart') ?></a>
                        <a href="<?= base_url('checkout') ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100 mt-4"><?= elang('Checkout') ?></a>
                    </div>
                    <!-- Cart Product Button End -->
                <?php } else { ?>
                    <h4 class="mb-5"><?= elang('You haven\'t shopped yet, please shop first') ?>!.</h4>
                    <a href="<?= base_url() ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100"><?= elang('Shop Now') ?></a>
                <?php } ?>

            <?php } else { ?>
                <h4 class="mt-5"><?= elang('You are not logged in yet, Please Login First.') ?></h4 class="mt-5">
                <div class="cart-product-btn mt-4">
                    <a href="<?= base_url('sign-in') ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100"><?= elang('Sign In') ?></a>
                    <a href="checkout.html" class="btn btn-dark btn-hover-primary rounded-0 w-100 mt-4"><?= elang('Register') ?></a>
                </div>
            <?php } ?>
        </div>
        <!-- Offcanvas Cart Content End -->

    </div>
    <!-- Cart Offcanvas Inner End -->
</div>