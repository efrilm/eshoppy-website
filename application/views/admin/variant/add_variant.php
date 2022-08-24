<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <div class="float-start">
                    <h1><?= elang('Add Variant') ?></h1>
                </div>
                <div class="float-end">
                    <a href="<?= base_url('generate-variant/' . $id) ?>" class="btn btn-success"><?= elang('Add Variant') ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= form_open('admin/variant/process') ?>
                    <?php for ($i = 1; $i <= $count; $i++) { ?>
                        <input type="hidden" name="count" value="<?= $count ?>">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Variant Name') ?></label>
                                <input type="text" class="form-control m-b-md" name="variant_name_<?= $i ?>" placeholder="<?= elang('Variant Name') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= elang('Sub Variant') ?></label>
                                <select name="sub_variant_<?= $i ?>" class="form-control">
                                    <option value=""><?= elang('Choose') ?></option>
                                    <?php foreach ($subVariant as $sv) { ?>
                                        <option value="<?= $sv->id ?>"><?= $sv->sub_variant_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php }  ?>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><?= elang('Save') ?></button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>