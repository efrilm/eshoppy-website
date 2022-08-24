    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo mt-5">
                <a href="index.html">eShoppy</a>
            </div>
            <p class="auth-description"><?= elang('Please enter your credentials to create an account') ?>.<br><?= elang('Already have an account') ?>? <a href="<?= base_url('sign-in') ?>"><?= elang('Sign In') ?></a></p>

            <?= form_open('auth/registration') ?>
            <div class="auth-credentials m-b-xxl">
                <div class="row">
                    <div class="col-md-6">
                        <label for="signUpFirstName" class="form-label"><?= elang('Firts Name') ?></label>
                        <input type="text" class="form-control m-b-md" name="first_name" id="signUpFirstName" aria-describedby="signUpFirstName" value="<?= set_value('first_name') ?>" placeholder="Enter First Name">
                        <small class="text-danger"><?= form_error('first_name') ?></small>
                    </div>
                    <div class="col-md-6">
                        <label for="signUpLastName" class="form-label"><?= elang("Last Name") ?></label>
                        <input type="text" class="form-control m-b-md" name="last_name" id="signUpLastName" aria-describedby="signUpLastName" value="<?= set_value('last_name') ?>" placeholder="Enter Last Name">
                        <small class="text-danger"><?= form_error('last_name') ?></small>
                    </div>
                </div>

                <label for="signUpEmail" class="form-label"><?= elang('Email') ?></label>
                <input type="text" class="form-control m-b-md" name="email" id="signUpEmail" aria-describedby="signUpEmail" value="<?= set_value('email') ?>" placeholder="example@neptune.com">
                <small class="text-danger"><?= form_error('email') ?></small>

                <label for="signUpPassword" class="form-label"><?= elang('Password') ?></label>
                <input type="password" class="form-control" name="password" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                <div id="emailHelp" class="form-text">Password must be minimum 8 characters length*</div>
                <small class="text-danger"><?= form_error('password') ?></small>

                <label for="signUpConfirmPassword" class="form-label mt-4"><?= elang('Confirm Password') ?></label>
                <input type="password" class="form-control" name="confirm_password" id="signUpConfirmPassword" aria-describedby="signUpConfirmPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                <small class="text-danger"><?= form_error('confirm_password') ?></small>

            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary"><?= elang('Sign Up') ?></button>
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