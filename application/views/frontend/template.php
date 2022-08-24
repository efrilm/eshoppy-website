<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo/logo.png">

    <!-- Vendor CSS (Icon Font) -->

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor/pe-icon-7-stroke.min.css">


    <!-- Plugins CSS (All Plugins Files) -->

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/plugins/aos.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/plugins/nice-select.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/plugins/lightgallery.min.css" />
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-rTv3wbzt9EDhBXJV"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Main Style CSS -->


    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" />



    <!-- Use the minified version files listed below for better performance and remove the files listed above -->


    <!-- 
    <link rel="stylesheet" href="assets/css/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> 
    -->
</head>

<body>
    <div class="header section">

        <!-- top-bar -->
        <?php $this->load->view('frontend/top_bar'); ?>
        <!-- end top-bar -->

        <!-- Header Bottom Start -->
        <?php $this->load->view('frontend/navbar'); ?>
        <!-- Header Bottom End -->

        <!-- Mobile Menu Start -->
        <?php $this->load->view('frontend/mobile_navbar'); ?>
        <!-- Mobile Menu End -->

        <!-- Offcanvas Search Start -->
        <?php $this->load->view('frontend/search_canvas'); ?>
        <!-- Offcanvas Search End -->

        <!-- Cart Offcanvas Start -->
        <?php $this->load->view('frontend/cart_canvas'); ?>
        <!-- Cart Offcanvas End -->

    </div>

    <?= $contents ?>

    <!-- Footer Section Start -->
    <?php $this->load->view('frontend/footer'); ?>
    <!-- Footer Section End -->

    <!-- Scroll Top Start -->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top fa fa-long-arrow-up"></i>
        <i class="arrow-bottom fa fa-long-arrow-up"></i>
    </a>
    <!-- Scroll Top End -->


    <?php
    if (!empty($this->session->userdata('email'))) {
        $cart = $this->cart_model->getCartByUser($this->session->userdata('id_user'))->result();
        $weight = 0;
        $subweight = 0;
        $total = 0;
        $subtotal = 0;
        foreach ($cart as $c) {
            $total = $c->qty * $c->price;
            $subtotal += $total;
            $weight = $c->qty * $c->product_weight;
            $subweight += $weight;
        }
    } ?>

    <!-- Scripts -->
    <!-- Scripts -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendors JS -->


    <script src="<?= base_url() ?>/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/vendor/modernizr-3.11.2.min.js"></script>


    <!-- Plugins JS -->


    <script src="<?= base_url() ?>/assets/js/plugins/countdown.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/aos.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/nice-select.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/lightgallery-all.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/thia-sticky-sidebar.min.js"></script>


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->


    <!-- 
   <script src="assets/js/vendor.min.js"></script>
   <script src="assets/js/plugins.min.js"></script> 
   -->
    <!--Main JS-->
    <script src="<?= base_url() ?>/assets/js/main.js"></script>
   

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/province') ?>",
                success: function(result_province) {
                    // console.log(result_province);
                    $("select[name=province]").html(result_province);
                }
            });
            $("select[name=province]").on("change", function() {
                var id_province_selected = $("option:selected", this).attr("id_province");

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('rajaongkir/city') ?>",
                    data: "id_province=" + id_province_selected,
                    success: function(result_city) {
                        // console.log(result_city);
                        $("select[name=city]").html(result_city);
                    }
                });
            });
            $("select[name=city]").on("change", function() {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('rajaongkir/shipping') ?>",
                    success: function(result_shipping) {
                        // console.log(result_city);
                        $("select[name=shipping]").html(result_shipping);
                    }
                });
            });
            $("select[name=shipping]").on("change", function() {
                // get shipping
                var shipping_selected = $("select[name=shipping]").val();
                // get destination
                var destination_city = $("option:selected", "select[name=city]").attr('id_city');
                // alert(destination_city);
                // get weigth data
                var weight = <?= $subweight ?>;
                // alert(weight);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('rajaongkir/package') ?>",
                    data: 'shipping=' + shipping_selected + '&id_city=' + destination_city + '&weight=' + weight,
                    success: function(result_package) {
                        // console.log(result_package);
                        $("select[name=package]").html(result_package);
                    }
                });

            });

            $("select[name=package]").on("change", function() {
                // Showing Shipping Cost
                var shippingCost = $("option:selected", this).attr('shipping_cost');
                var reserve = shippingCost.toString().split('').reverse().join(''),
                    format_shipping = reserve.match(/\d{1,3}/g);
                format_shipping = format_shipping.join(',').split('').reverse().join('');
                $("#shippingCost").html("IDR " + format_shipping);

                // Count Order Total
                var shippingCost2 = $("option:selected", this).attr('shipping_cost');
                var order_total = parseInt(shippingCost2) + parseInt(<?= $subtotal ?>);
                var reserve2 = order_total.toString().split('').reverse().join(''),
                    format_order = reserve2.match(/\d{1,3}/g);
                format_order = format_order.join(',').split('').reverse().join('');
                $("#orderTotal").html("IDR " + format_order);

                // estimation and shipping cost
                var estimation = $("option:selected", this).attr('estimation');
                $("input[name=estimation]").val(estimation);
                $("input[name=shipping_cost]").val(shippingCost);
                $("input[name=total_payment]").val(order_total);
            });
        });
    </script>

</body>

</html>