<!-- Breadcrumb Section Start -->
<div class="section">
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title"><?= elang('My Account') ?></h1>
                <ul>
                    <li>
                        <a href="<?= base_url() ?>"><?= elang('Home') ?> </a>
                    </li>
                    <li class="active"><?= elang("My Account") ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- My Account Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                    <?= elang('Dashboard') ?></a>
                                <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i><?= elang('Address') ?></a>
                                <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i><?= elang('Account Details') ?></a>
                                <a href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i><?= elang('Sign Out') ?></a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Dashboard</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong><?= $account->first_name ?> <?= $account->last_name ?></strong> (If Not <strong><?= $account->first_name ?> !</strong><a href="<?= base_url('auth/logout') ?>" class="logout"> Logout</a>)</p>
                                        </div>
                                        <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title">Billing Address</h3>
                                        <address>
                                            <p><strong>Alex Aya</strong></p>
                                            <p>1234 Market ##, Suite 900 <br>
                                                Lorem Ipsum, ## 12345</p>
                                            <p>Mobile: (123) 123-456789</p>
                                        </address>
                                        <a href="#" class="btn btn btn-dark btn-hover-primary rounded-0"><i class="fa fa-edit me-2"></i>Edit Address</a>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3 class="title"><?= elang('Account Details') ?></h3>
                                        <div class="account-details-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item mb-3">
                                                            <label for="first-name" class="required mb-1"><?= elang('First Name') ?></label>
                                                            <input type="text" id="first-name" value="<?= $account->first_name ?>" placeholder="<?= elang('First Name') ?>" name="first_name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item mb-3">
                                                            <label for="last-name" class="required mb-1"><?= elang('Last Name') ?></label>
                                                            <input type="text" id="last-name" value="<?= $account->last_name ?>" name="last_name" placeholder="<?= elang('Last Name') ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <label for="email" class="required mb-1"><?= elang('Email') ?></label>
                                                    <input type="email" id="email" value="<?= $account->email ?>" name="email" placeholder="<?= elang('Email') ?>" />
                                                </div>
                                                <div class="single-input-item single-item-button">
                                                    <button class="btn btn btn-dark btn-hover-primary rounded-0"><?= elang('Save Changes') ?></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div>
                <!-- My Account Page End -->

            </div>
        </div>

    </div>
</div>
<!-- My Account Section End -->