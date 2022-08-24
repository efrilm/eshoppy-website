<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Add New Product') ?></h1>
            </div>
        </div>
    </div>
    <?php
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger" role="alert">' . $error_upload . '</div>';
    }
    ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= form_open_multipart('admin/product/add') ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label class=" form-label"><?= elang('Product Name') ?></label>
                            <input type="text" name="product_name" class="form-control m-b-md" value="<?= set_value('product_name') ?>" placeholder="<?= elang('Product Name') ?>">
                            <small class="text-danger"><?= form_error('product_name') ?></small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><?= elang('Product Price') ?></label>
                            <input type="number" name="product_price" class="form-control m-b-md" value="<?= set_value('product_price') ?>" placeholder="<?= elang('Product Price') ?>">
                            <small class="text-danger"><?= form_error('product_price') ?></small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><?= elang('Product Weight') ?> (Gram)</label>
                            <input type="number" min="0" name="product_weight" class="form-control m-b-md" value="<?= set_value('product_weight') ?>" placeholder="<?= elang('Product Weight') ?>">
                            <small class="text-danger"><?= form_error('product_weight') ?></small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><?= elang('Product Category') ?></label>
                            <select class="form-control m-b-md" name="product_category" aria-label="Default select example">
                                <option selected><?= elang('Choose') ?></option>
                                <?php foreach ($category  as $c) { ?>
                                    <option value="<?= $c->id ?>"><?= $c->category_name ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger"><?= form_error('product_category') ?></small>
                        </div>
                        <div class="col-md-6 m-b-md">
                            <label class="form-label"><?= elang('Brand') ?></label>
                            <select class="form-select m-b-md" name="brand_id">
                                <option selected><?= elang('Choose') ?></option>
                                <?php foreach ($brand  as $b) { ?>
                                    <option value="<?= $b->id_brand ?>"><?= $b->brand_name ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger "><?= form_error('brand') ?></small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><?= elang('Stok') ?> </label>
                            <input type="number" min="0" name="stok" class="form-control m-b-md" value="<?= set_value('stok') ?>" placeholder="<?= elang('Stok') ?>">
                            <small class="text-danger"><?= form_error('stok') ?></small>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><?= elang('Product Photo') ?></label>
                            <input id="preview_image" type="file" name="product_photo" class="form-control m-b-md" value="<?= set_value('product_photo') ?>" placeholder="<?= elang('Product Photo') ?>" required>
                            <small class="text-danger"><?= form_error('product_photo') ?></small>
                        </div>
                        <div class="col-md-12">
                            <img src="<?= base_url('assets/images/other/no_image.png') ?>" id="image_load" width="100" alt="">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label mt-3"><?= elang('Product Description') ?></label>
                            <textarea name="product_description" class="form-control m-b-md"></textarea>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary mt-3 float-end"><?= elang('Save') ?></button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>