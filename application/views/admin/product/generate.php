<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= elang('Generate Variant') ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= form_open('add-variant/' . $id) ?>
                    <label class="form-label"><?= elang('Many Records Will Be Added') ?></label>
                    <input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" class="form-control m-b-md" required>
                    <div class="float-end">
                        <input type="submit" name="generate" value="<?= elang('Generate Variant') ?>" class="btn btn-primary">
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>