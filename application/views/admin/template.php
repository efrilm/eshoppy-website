<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= $title ?></title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/pace/pace.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/highlight/styles/github-gist.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/datatables/datatables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/summernote/summernote-lite.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="<?= base_url() ?>/assets/admin/css/main.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/images/logo/logo.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/images/logo/logo.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <?php $this->load->view('admin/sidebar'); ?>
        <div class="app-container">
            <?php $this->load->view('admin/top_bar'); ?>
            <div class="app-content">
                <div class="content-wrapper">
                    <?= $contents ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="<?= base_url() ?>/assets/admin/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/pace/pace.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/highlight/highlight.pack.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/summernote/summernote-lite.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/highlight/highlight.pack.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/lightbox/fslightbox.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/main.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/custom.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/pages/dashboard.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/pages/settings.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/pages/datatables.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/pages/text-editor.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/pages/lightbox.js"></script>
    <script>
        function readImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#image_load").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#preview_image").change(function() {
            readImage(this);
        });
    </script>
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
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".en-language").click(function(e) {
                e.preventDefault();
                var id = $(".en-language").data('id');

                $.ajax({
                    url: "<?= base_url(); ?>admin/dashboard/change_language",
                    async: false,
                    type: "post",
                    data: "id=" + id,
                    dataType: "html",
                    success: function() {
                        location.reload();
                    }
                });
            });

            $(".id-language").click(function(e) {
                e.preventDefault();
                var id = $(".id-language").data('id');
                var csrfHash = $("#csrf_data").val();

                $.ajax({
                    url: "<?= base_url(); ?>admin/dashboard/change_language",
                    async: false,
                    type: "post",
                    data: {
                        id: id,
                        csrf_test_name: csrfHash
                    },
                    dataType: "html",
                    success: function() {
                        location.reload();
                    }
                });
            });
        });
    </script>


</body>

</html>