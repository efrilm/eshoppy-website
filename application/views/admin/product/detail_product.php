<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <div class="float-start">
                    <h1><?= elang("Product Detail") ?></h1>
                </div>
                <div class="float-end">
                    <a href="<?= base_url('generate-variant/' . $product->id_product) ?>" class="btn btn-success btn-sm"><?= elang('Add Variant') ?></a>
                    <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#addImages">
                        <?= elang('Add Images') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message');  ?>
    <?php if ($product->stok == 0) { ?>
        <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
            <div class="alert-content">
                <span class="alert-title"><?= elang('Information') ?>!</span>
                <span class="alert-text"><?= elang('The product is out of stock. Please add stock') ?>!</span>
            </div>
        </div>
    <?php } else if ($product->stok <= 10) { ?>
        <div class="alert alert-custom alert-indicator-top indicator-warning" role="alert">
            <div class="alert-content">
                <span class="alert-title"><?= elang('Information') ?>! <?= $product->stok ?> <?= elang('Stok Left') ?></span>
                <span class="alert-text"><?= elang('Your product will run out soon. Please add more stock') ?>!</span>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>" class="card-img-top" alt="<?= $product->product_seo ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $product->category_name ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <?= elang('Price') ?> : <b> IDR <?= number_format($product->product_price) ?> </b>
                    </li>
                    <li class="list-group-item"><?= elang('Weight') ?> : <b><?= $product->product_weight ?></b> Gr </li>
                    <li class="list-group-item"><?= elang('Stok') ?> : <b><?= $product->stok ?></b> </li>
                    <li class="list-group-item"><?= elang('Brand') ?> : <b><?= $product->brand_name ?></b> </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <!-- card title -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <h3><?= $product->product_name ?></h3>
                        </div>
                        <div class="col-md-5 ">
                            <div class="float-end">
                                <?php if ($product->is_active == 1) { ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deactive<?= $product->id_product ?>">
                                        <?= elang('Active') ?>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#active<?= $product->id_product ?>">
                                        <?= elang('Deactive') ?>
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card title -->
            <!-- Statistic -->
            <div class="row">
                <!-- views -->
                <div class="col-md-6">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-primary">
                                    <i class="material-icons-outlined">visibility</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title"><?= elang('Views') ?></span>
                                    <span class="widget-stats-amount"><?= $product->views    ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end views -->

                <!-- views -->
                <div class="col-md-6">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-primary">
                                    <i class="material-icons-outlined">loyalty</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title"><?= elang('Sold') ?></span>
                                    <span class="widget-stats-amount"><?= $product->sold    ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end views -->
            </div>
            <!-- end Statistic -->

            <!-- card photo -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><?= elang('Photos') ?></h5>
                </div>
                <div class="card-body">
                    <div class="lightbox-example">
                        <a data-fslightbox="gallery" href="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>">
                            <img src="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>">
                        </a>
                        <a data-fslightbox="gallery" href="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>">
                            <img src="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>">
                        </a>
                        <a data-fslightbox="gallery" href="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>">
                            <img src="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>">
                        </a>
                        <a data-fslightbox="gallery" href="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>">
                            <img src="<?= base_url() ?>/assets/images/product/<?= $product->product_photo ?>">
                        </a>
                    </div>
                </div>
            </div>
            <!-- end card photo -->

            <!-- Variant -->
            <div class="row">
                <div class="col-md-6">
                    <!-- Colour -->
                    <div class="card">
                        <div class="card-header">
                            <?= elang('Colour') ?>
                        </div>
                        <?php if (!empty($color)) { ?>
                            <ul class="list-group list-group-flush">
                                <?php foreach ($color as $c) { ?>
                                    <li class="list-group-item"><?= $c->variant_name ?></li>
                                <?php } ?>
                            </ul>
                        <?php } else { ?>
                            <div class="card-body">
                                <center>
                                    <h6 class="text-center"><?= elang('You Haven\'t Added Colour In Variant') ?></h6>
                                    <a href="<?= base_url('generate-variant/' . $product->id_product) ?>" class="btn btn-success"><?= elang('Add Variant') ?></a>
                                </center>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- end Colour -->
                </div>
                <div class="col-md-6">
                    <!-- Size -->
                    <div class="card">
                        <div class="card-header">
                            <?= elang('Size') ?>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($size)) { ?>
                                <div class="row">
                                    <?php foreach ($size as $s) { ?>
                                        <div class="col-md-2">
                                            <div class="avatar avatar-sm">
                                                <div class=" avatar-title"><?= $s->variant_name ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <center>
                                    <h6 class="text-center"><?= elang('You Haven\'t Added Size In Variant') ?></h6>
                                    <a href="<?= base_url('generate-variant/' . $product->id_product) ?>" class="btn btn-success"><?= elang('Add Variant') ?></a>
                                </center>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- End Size -->
                </div>
            </div>
            <!-- end Variant -->

            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= elang('Product Description') ?></div>
                </div>
                <div class="card-body">
                    <?= $product->product_description ?>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- modal delete -->
<div class="modal fade" id="delete<?= $product->id_product ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= elang('Delete Product') ?> <?= $product->product_name ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= elang('Are you sure') ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                <a href="<?= base_url('admin/product/delete/' . $product->id_product) ?>" class="btn btn-primary"><?= elang('Yes') ?></a>
            </div>
        </div>
    </div>
</div>
<!-- end modal delete -->

<!-- modal active -->
<div class="modal fade" id="active<?= $product->id_product ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?= elang('Are you sure to activate the product') ?> <?= $product->product_name ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                <a href="<?= base_url('admin/product/active/' . $product->product_seo) ?>" class="btn btn-primary"><?= elang('Yes') ?></a>
            </div>
        </div>
    </div>
</div>
<!-- end model active -->

<!-- modal active -->
<div class="modal fade" id="deactive<?= $product->id_product ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?= elang('Are you sure to deactive the product') ?> <?= $product->product_name ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                <a href="<?= base_url('admin/product/deactive/' . $product->product_seo) ?>" class="btn btn-primary"><?= elang('Yes') ?></a>
            </div>
        </div>
    </div>
</div>
<!-- end model active -->

<!-- Modal Add Images -->
<div class="modal fade" id="addImages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= elang('Add Images') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('admin/product/numberOfImages/' . $product->id_product) ?>
            <div class="modal-body">
                <label class="form-label"><?= elang('Number of Images to be Added') ?></label>
                <input type="text" class="form-control" name="count" pattern="[0-9]+">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                <button type="submit" class="btn btn-primary"><?= elang('Yes') ?></button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>