<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Website Configuration') ?></h1>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message');  ?>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('admin/web_config/index') ?>
                    <input type="hidden" name="id" value="<?= $setting->id ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label"><?= elang('Province') ?></label>
                            <select class="form-control m-b-md" name="province">
                                <option value="<?= $setting->location ?>"><?= $setting->location ?></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><?= elang('City') ?></label>
                            <select class="form-control m-b-md" name="city">
                                <option value="<?= $setting->location ?>"><?= $setting->location ?></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label"><?= elang('Shop Name') ?></label>
                            <input type="text" class="form-control m-b-md" name="shop_name" value="<?= $setting->shop_name ?>" placeholder="<?= elang('Shop Name') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label"><?= elang('No. Phone') ?></label>
                            <input type="text" class="form-control m-b-md" name="no_phone" value="<?= $setting->no_phone ?>" placeholder="<?= elang('No. Phone') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label"><?= elang('No. Whatsapp') ?></label>
                            <input type="text" class="form-control m-b-md" name="no_whatsapp" value="<?= $setting->no_whatsapp ?>" placeholder="<?= elang('No. Whatsapp') ?>">
                        </div>
                        <div class="col-md-12">
      
                        <label for="" class="form-label"><?= elang('Shop Address') ?></label>
                            <textArea class="form-control m-b-md" name="shop_address"><?= $setting->address ?></textArea>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary mt-3 float-end"><?= elang('Save') ?></button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>