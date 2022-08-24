<div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
    <div class="app-auth-background">

    </div>
    <div class="app-auth-container">

        <?= $this->session->flashdata('message'); ?>

        <div class="logo">
            <a href="index.html">eShoppy</a>
        </div>
        <p class="auth-description"><?= elang('Please sign-in to your account and continue to the dashboard') ?>.<br><?= elang('Don\'t have an account') ?>? <a href="<?= base_url("sign-up") ?>"><?= elang('Sign Up') ?></a></p>

        <?= form_open('auth/signIn') ?>
        <div class="auth-credentials m-b-xxl">
            <label for="signInEmail" class="form-label"><?= elang('Email') ?></label>
            <input type="email" name="email" class="form-control m-b-md" value="<?= set_value('email') ?>" id="signInEmail" aria-describedby="signInEmail" placeholder="example@neptune.com">
            <small class="text-danger"><?= form_error("email") ?></small>
            <label for="signInPassword" class="form-label"><?= elang('Password') ?></label>
            <input type="password" name="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
            <small class="text-danger"><?= form_error('password') ?></small>
        </div>

        <div class="auth-submit">
            <button type="submit" class="btn btn-primary"><?= elang("Sign In") ?></button>
            <a href="#" class="auth-forgot-password float-end"><?= elang("Forgot password") ?>?</a>
        </div>
        <?= form_close() ?>
        <div class="divider"></div>
        <div class="auth-alts">
            <a href="#" class="auth-alts-google"></a>
            <a href="#" class="auth-alts-facebook"></a>
            <a href="#" class="auth-alts-twitter"></a>
        </div>
    </div>
</div>