<!-- Breadcrumb Section Start -->
<div class="section">

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title"><?= elang('Checkout') ?></h1>
                <ul>
                    <li>
                        <a href="<?= base_url() ?>"><?= elang('Home') ?> </a>
                    </li>
                    <li>
                        <a href="<?= base_url('cart') ?>"> <?= elang('Cart') ?> </a>
                    </li>
                    <li class="active"> <?= elang('Checkout') ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    ?>
</div>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Start -->
<form id="payment-form" method="post" action="<?= site_url() ?>snap/finish">
    <?php $noOrder = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n4">
                <div class="col-lg-12 col-12 mb-4">

                    <!-- Your Order Area Start -->
                    <div class="your-order-area border mb-5">
                        <!-- Title Start -->
                        <h3 class="title"><?= elang('Your address') ?></h3>
                        <!-- Title End -->
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Province') ?></label>
                                <select class="form-control mb-3" name="province" id="province">
                                </select>
                                <small class="text-danger"><?= form_error('province') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('City') ?></label>
                                <select class="form-control mb-3" name="city" id="city">
                                </select>
                                <small class="text-danger"><?= form_error('city') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Shipping') ?></label>
                                <select class="form-control mb-3" name="shipping" id="shipping">
                                </select>
                                <small class="text-danger"><?= form_error('shipping') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Package') ?></label>
                                <select class="form-control mb-3" name="package" id="package">
                                </select>
                                <small class="text-danger"><?= form_error('package') ?></small>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label"><?= elang('Recipient Name') ?></label>
                                <input type="text" name="recipient_name" id='recipient_name' class="form-control mb-3">
                                <small class="text-danger"><?= form_error('recipient_name') ?></small>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label"><?= elang('No. Phone') ?></label>
                                <input type="text" name="no_phone" class="form-control mb-3" id="no_phone">
                                <small class="text-danger"><?= form_error('no_phone') ?></small>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><?= elang('Postal Code') ?></label>
                                <input type="number" minlength="6" name="postal_code" id="postal_code" class="form-control mb-3">
                                <small class="text-danger"><?= form_error('postal_code') ?></small>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><?= elang('Address') ?></label>
                                <textarea class="form-control mb-3" name="address" id="address"></textarea>
                                <small class="text-danger"><?= form_error('address') ?></small>
                            </div>
                        </div>
                    </div>
                    <!-- Your Order Area End -->

                    <!-- Your Order Area Start -->
                    <div class="your-order-area border">

                        <!-- Title Start -->
                        <h3 class="title"><?= elang('Your order') ?></h3>
                        <!-- Title End -->

                        <!-- Your Order Table Start -->
                        <div class="your-order-table table-responsive">
                            <table class="table">

                                <!-- Table Head Start -->
                                <thead>
                                    <tr class="cart-product-head">
                                        <th class="cart-product-name text-start"><?= elang('Product') ?></th>
                                        <th class="cart-product-name text-start"><?= elang('Weight') ?></th>
                                        <th class="cart-product-total text-end"><?= elang('Total') ?></th>
                                    </tr>
                                </thead>
                                <!-- Table Head End -->

                                <!-- Table Body Start -->
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php $subtotal = 0;  ?>
                                    <?php $weight = 0; ?>
                                    <?php $subweight = 0; ?>
                                    <?php foreach ($cart as $c) { ?>
                                        <?php
                                        $total = $c->qty * $c->price;
                                        $subtotal += $total;
                                        $weight = $c->qty * $c->product_weight;
                                        $subweight += $weight;
                                        ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-name text-start ps-0"><?= $c->product_name ?><strong class="product-quantity"> × <?= $c->qty ?></strong></td>
                                            <td class="cart-product-name text-start ps-0"><?= $weight ?> Gr</td>
                                            <td class="cart-product-total text-end pe-0"><span class="amount">IDR <?= number_format($total) ?></span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <!-- Table Body End -->

                                <!-- Table Footer Start -->
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0"><?= elang('Cart Subtotal') ?> </th>
                                        <td class="text-end pe-0"><span class="amount">IDR <?= number_format($subtotal) ?></span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0"><?= elang('Weight Total') ?> </th>
                                        <td class="text-end pe-0"><span class="amount"><?= $subweight ?> Gr</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0"><?= elang('Shipping Cost') ?> </th>
                                        <td class="text-end pe-0"><span class="amount" id="shippingCost">IDR 0</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th class="text-start ps-0"><?= elang('Order Total') ?></th>
                                        <td class="text-end pe-0"><strong><span class="amount" id="orderTotal">IDR 0</span></strong></td>
                                    </tr>
                                </tfoot>
                                <!-- Table Footer End -->

                            </table>
                        </div>
                        <!-- Your Order Table End -->

                        <!-- Input Hidden Transaction  -->

                        <input type="hidden" name="no_order" value="<?= $noOrder ?>" id="no_order">
                        <input type="hidden" name="estimation" id="estimation">
                        <input type="hidden" name="shipping_cost" id="shipping_cost">
                        <input type="hidden" name="weight" value="<?= $subweight ?>" id="weight">
                        <input type="hidden" name="grand_total" value="<?= $subtotal ?>" id="grand_total">
                        <input type="hidden" name="total_payment" id="total_payment">
                        <!-- end Input Hidden Transaction -->

                        <!-- Detail Transaction -->
                        <?php
                        $no = 1;
                        foreach ($cart as $c) {
                            echo form_hidden('qty' . $no++, $c->qty);
                        }
                        ?>
                        <!-- end Detail Transaction -->

                        <!-- Payment Accordion Order Button Start -->
                        <div class="payment-accordion-order-button">
                            <div class="order-button-payment">
                                <button id='pay-button' class="btn btn-dark btn-hover-primary rounded-0 w-100">Place Order</button>
                            </div>
                        </div>
                        <!-- Payment Accordion Order Button End -->
                    </div>
                    <!-- Your Order Area End -->
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="result_type" id="result-type" value="">
    </div>
    <input type="hidden" name="result_data" id="result-data" value="">
    </div>
    <?= form_close() ?>
    <!-- Checkout Section End -->

    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            var no_order = $("no_order").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var shipping = $("#shipping").val();
            var package = $("#package").val();
            var recipient_name = $("#recipient_name").val();
            var no_phone = $("#no_phone").val();
            var postal_code = $("#postal_code").val();
            var address = $("#address").val();
            var no_order = $("#no_order").val();
            var estimation = $("#estimation").val();
            var shipping_cost = $("#shipping_cost").val();
            var grand_total = $("#grand_total").val();
            var total_payment = $("#total_payment").val();
            var weight = $("#weight").val();

            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>snap/token',
                data: {
                    no_order: no_order,
                    province: province,
                    city: city,
                    shipping: shipping,
                    package: package,
                    recipient_name: recipient_name,
                    no_phone: no_phone,
                    postal_code: postal_code,
                    address: address,
                    no_order: no_order,
                    estimation: estimation,
                    shipping_cost: shipping_cost,
                    grand_total: grand_total,
                    total_payment: total_payment,
                    weight: weight,
                },
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                }
            });
        });
    </script>