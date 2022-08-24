    <!-- Breadcrumb Section Start -->
    <!-- <div class="section"> -->

    <!-- Breadcrumb Area Start -->
    <!-- <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Shopping Cart</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home </a>
                        </li>
                        <li class="active"> Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div> -->
    <!-- Breadcrumb Area End -->

    <!-- </div> -->
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <!-- Cart Table Start -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail"><?= elang('Photo') ?></th>
                                    <th class="pro-title"><?= elang('Product') ?></th>
                                    <th class="pro-price"><?= elang('Price') ?></th>
                                    <th class="pro-quantity"><?= elang('Quantity') ?></th>
                                    <th class="pro-quantity"><?= elang('Weight') ?></th>
                                    <th class="pro-subtotal"><?= elang('Total') ?></th>
                                    <th class="pro-remove"><?= elang('Remove') ?></th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                                <?php $total = 0; ?>
                                <?php $subtotal = 0; ?>
                                <?php $weight = 0; ?>
                                <?php $subWeight = 0; ?>
                                <?php foreach ($cart->result() as $c) { ?>
                                    <?php
                                    $total = $c->qty * $c->price;
                                    $subtotal += $total;
                                    $weight = $c->product_weight * $c->qty;
                                    $subWeight += $weight;
                                    ?>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="<?= base_url('detail-product/' . $c->product_seo) ?>"><img class="img-fluid" width="100" height="100" src="<?= base_url() ?>/assets/images/product/<?= $c->product_photo ?>" alt="Product" /></a></td>
                                        <td class="pro-title"><a href="<?= base_url('detail-product/' . $c->product_seo) ?>"><?= $c->product_name ?></a></td>
                                        <td class="pro-price"><span>IDR <?= number_format($c->product_price) ?></span></td>
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="<?= $c->qty ?>" name="qty" type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                    <button type="submit" class="dec qtybutton btn-light"><i class="fa fa-minus"></i></button>
                                                    <button type="submit" class="inc qtybutton btn-light"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span> <?= $weight ?> Gr</span></td>
                                        <td class="pro-subtotal"><span>IDR <?= number_format($total) ?></span></td>
                                        <td class="pro-remove"><a href="<?= base_url('cart/delete/' . $c->id_product) ?>"><i class="pe-7s-trash"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <!-- Table Body End -->

                        </table>
                    </div>
                    <!-- Cart Table End -->

                    <!-- Cart Update Option Start -->
                    <div class="cart-update-option d-block d-md-flex justify-content-between">

                        <!-- Apply Coupon Wrapper Start -->
                        <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="btn btn-dark btn-hover-primary rounded-0">Apply Coupon</button>
                            </form>
                        </div>
                        <!-- Apply Coupon Wrapper End -->

                        <!-- Cart Update Start -->
                        <div class="cart-update mt-sm-16">
                            <a href="#" class="btn btn-dark btn-hover-primary rounded-0">Update Cart</a>
                        </div>
                        <!-- Cart Update End -->

                    </div>
                    <!-- Cart Update Option End -->

                </div>
            </div>

            <div class="row">
                <div class="col-lg-5 ms-auto col-custom">

                    <!-- Cart Calculation Area Start -->
                    <div class="cart-calculator-wrapper">

                        <!-- Cart Calculate Items Start -->
                        <div class="cart-calculate-items">

                            <!-- Cart Calculate Items Title Start -->
                            <h3 class="title">Cart Totals</h3>
                            <!-- Cart Calculate Items Title End -->

                            <!-- Responsive Table Start -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>IDR <?= number_format($subtotal) ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= elang('Weight') ?></td>
                                        <td><?= $subWeight ?> Gr </td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">IDR <?= number_format($subtotal) ?></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Responsive Table End -->

                        </div>
                        <!-- Cart Calculate Items End -->

                        <!-- Cart Checktout Button Start -->
                        <a href="<?= base_url('checkout') ?>" class="btn btn-dark btn-hover-primary rounded-0 w-100"> <?= elang("Proceed To Checkout") ?> </a>
                        <!-- Cart Checktout Button End -->

                    </div>
                    <!-- Cart Calculation Area End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Shopping Cart Section End -->