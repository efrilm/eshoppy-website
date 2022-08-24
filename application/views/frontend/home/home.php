  <!-- Hero/Intro Slider Start -->
  <?php $this->load->view('frontend/slider'); ?>
  <!-- Hero/Intro Slider End -->

  <!-- Feature Section Start -->
  <div class="section section-margin">
      <div class="container">
          <div class="feature-wrap">
              <div class="row row-cols-lg-4 row-cols-xl-auto row-cols-sm-2 row-cols-1 justify-content-between mb-n5">
                  <!-- Feature Start -->
                  <div class="col mb-5" data-aos="fade-up" data-aos-delay="300">
                      <div class="feature">
                          <div class="icon text-primary align-self-center">
                              <img src="assets/images/icons/feature-icon-2.png" alt="Feature Icon">
                          </div>
                          <div class="content">
                              <h5 class="title">Free Shipping</h5>
                              <p>Free shipping on all order</p>
                          </div>
                      </div>
                  </div>
                  <!-- Feature End -->

                  <!-- Feature Start -->
                  <div class="col mb-5" data-aos="fade-up" data-aos-delay="500">
                      <div class="feature">
                          <div class="icon text-primary align-self-center">
                              <img src="assets/images/icons/feature-icon-3.png" alt="Feature Icon">
                          </div>
                          <div class="content">
                              <h5 class="title">Support 24/7</h5>
                              <p>Support 24 hours a day</p>
                          </div>
                      </div>
                  </div>
                  <!-- Feature End -->
                  <!-- Feature Start -->
                  <div class="col mb-5" data-aos="fade-up" data-aos-delay="700">
                      <div class="feature">
                          <div class="icon text-primary align-self-center">
                              <img src="assets/images/icons/feature-icon-4.png" alt="Feature Icon">
                          </div>
                          <div class="content">
                              <h5 class="title">Money Return</h5>
                              <p>Back guarantee under 5 days</p>
                          </div>
                      </div>
                  </div>
                  <!-- Feature End -->

                  <!-- Feature Start -->
                  <div class="col mb-5" data-aos="fade-up" data-aos-delay="900">
                      <div class="feature">
                          <div class="icon text-primary align-self-center">
                              <img src="assets/images/icons/feature-icon-1.png" alt="Feature Icon">
                          </div>
                          <div class="content">
                              <h5 class="title">Order Discount</h5>
                              <p>Onevery order over $150</p>
                          </div>
                      </div>
                  </div>
                  <!-- Feature End -->
              </div>
          </div>
      </div>
  </div>
  <!-- Feature Section End -->

  <!-- Banner Section Start -->
  <div class="section">
      <div class="container">

          <!-- Banners Start -->
          <div class="row mb-n6 overflow-hidden">
              <!-- Banner Start -->
              <div class="col-md-6 col-12 mb-6">
                  <div class="banner" data-aos="fade-right" data-aos-delay="300">
                      <div class="banner-image">
                          <a href="shop-grid.html"><img src="assets/images/banner/banner1.png" alt="Banner Image"></a>
                      </div>
                      <div class="info">
                          <div class="small-banner-content">
                              <h4 class="sub-title">Up to <span>50%</span> Off</h4>
                              <h3 class="title">Office Shirt</h3>
                              <a href="shop-grid.html" class="btn btn-primary btn-hover-dark btn-sm">Shop Now</a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Banner End -->

              <!-- Banner Start -->
              <div class="col-md-6 col-12 mb-6">
                  <div class="banner" data-aos="fade-left" data-aos-delay="500">
                      <div class="banner-image">
                          <a href="shop-grid.html"><img src="assets/images/banner/banner2.png" alt="Banner Image"></a>
                      </div>
                      <div class="info">
                          <div class="small-banner-content">
                              <h4 class="sub-title">Up to <span>40%</span> Off</h4>
                              <h3 class="title">All Products</h3>
                              <a href="shop-grid.html" class="btn btn-primary btn-hover-dark btn-sm">Shop Now</a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Banner End -->

          </div>
          <!-- Banners End -->
      </div>
  </div>
  <!-- Banner Section End -->

  <!-- Product Section Start -->
  <div class="section section-padding mt-0">
      <div class="container">
          <!-- Section Title & Tab Start -->
          <div class="row">
              <!-- Tab Start -->
              <div class="col-12">
                  <ul class="product-tab-nav nav justify-content-center mb-10 title-border-bottom mt-n3">
                      <li class="nav-item" data-aos="fade-up" data-aos-delay="300"><a class="nav-link active mt-3" data-bs-toggle="tab" href="#tab-product-all"><?= elang("New Arrivals") ?></a></li>
                      <li class="nav-item" data-aos="fade-up" data-aos-delay="400"><a class="nav-link mt-3" data-bs-toggle="tab" href="#tab-product-clothings"><?= elang("Best Sellers") ?></a></li>
                  </ul>
              </div>
              <!-- Tab End -->
          </div>
          <!-- Section Title & Tab End -->
          <!-- Products Tab Start -->
          <div class="row">
              <div class="col">
                  <div class="tab-content position-relative">
                      <div class="tab-pane fade show active" id="tab-product-all">
                          <div class="product-carousel">
                              <div class="swiper-container">
                                  <div class="swiper-wrapper">
                                      <?php foreach ($newArrivals as $na) { ?>
                                          <!-- Product Start -->
                                          <div class="swiper-slide product-wrapper">
                                              <!-- Single Product Start -->
                                              <div class="product product-border-left mb-10" data-aos="fade-up" data-aos-delay="300">
                                                  <div class="thumb">
                                                      <a href="<?= base_url('detail-product/' . $na->product_seo) ?>" class="image">
                                                          <img class="first-image" src="<?= base_url() ?>assets/images/product/<?= $na->product_photo ?>" width="270" height="350" alt="<?= $na->product_photo ?>" />
                                                          <img class="second-image" src="<?= base_url() ?>assets/images/product/<?= $na->product_photo ?>" width="270" height="350" alt="<?= $na->product_photo ?>" />
                                                      </a>
                                                      <div class="actions">
                                                          <a href="#" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                          <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="pe-7s-search"></i></a>
                                                          <a href="#" class="action compare"><i class="pe-7s-shuffle"></i></a>
                                                      </div>
                                                  </div>
                                                  <div class="content">
                                                      <h4 class="sub-title"><a href="<?= base_url('category/' . $na->category_id) ?>"><?= $na->category_name ?></a></h4>
                                                      <h5 class="title"><a href="<?= base_url('detail-product/' . $na->product_seo) ?>"><?= $na->product_name ?></a></h5>
                                                      <span class="ratings">
                                                          <span class="rating-wrap">
                                                              <span class="star" style="width: 100%"></span>
                                                          </span>
                                                          <span class="rating-num">(4)</span>
                                                      </span>
                                                      <span class="price">
                                                          <span class="new">IDR <?= number_format($na->product_price) ?></span>
                                                          <!-- <span class="old">$42.85</span> -->
                                                      </span>
                                                      <?php
                                                        // var_dump($getCart);
                                                        echo form_open('cart/add');
                                                        echo form_hidden('id', $na->id_product);
                                                        echo form_hidden('qty', 1);
                                                        echo form_hidden('price', $na->product_price);
                                                        echo form_hidden('name', $na->product_name);
                                                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                                                        ?>
                                                      <!-- check cart -->
                                                      <?php $checkCart = $this->cart_model->getCartByUserAndId($this->session->userdata('id_user'), $na->id_product)->num_rows(); ?>
                                                      <!-- end check cart -->
                                                      <?php if ($this->session->userdata('email') != null) {  ?>
                                                          <?php if ($checkCart !== 0) { ?>
                                                              <button type="submit" class="btn btn-sm btn-outline-dark btn-hover-primary mb-4" disabled><?= elang("Already in Cart") ?></button>
                                                          <?php } else { ?>
                                                              <button type="submit" class="btn btn-sm btn-outline-dark btn-hover-primary mb-4"><?= elang("Add To Cart") ?></button>
                                                          <?php } ?>
                                                      <?php } else { ?>
                                                          <button type="button" class="btn btn-sm btn-outline-dark btn-hover-primary mb-4" data-bs-toggle="modal" data-bs-target="#notLogin">
                                                              <?= elang('Add To Cart') ?>
                                                          </button>
                                                      <?php } ?>
                                                      <?php echo form_close(); ?>
                                                  </div>
                                              </div>
                                              <!-- Single Product End -->
                                          </div>
                                          <!-- Product End -->
                                      <?php } ?>

                                  </div>

                                  <!-- Swiper Pagination Start -->
                                  <div class="swiper-pagination d-md-none"></div>
                                  <!-- Swiper Pagination End -->

                                  <!-- Next Previous Button Start -->
                                  <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                                  <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                                  <!-- Next Previous Button End -->
                              </div>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="tab-product-clothings">
                          <div class="product-carousel">
                              <div class="swiper-container">
                                  <div class="swiper-wrapper">

                                      <?php foreach ($bestSeller  as $bs) {  ?>
                                          <!-- Product Start -->
                                          <div class="swiper-slide product-wrapper">
                                              <!-- Single Product Start -->
                                              <div class="product product-border-left mb-10">
                                                  <div class="thumb">
                                                      <a href="single-product.html" class="image">
                                                          <img class="first-image" src="<?= base_url() ?>/assets/images/product/<?= $bs->product_photo ?>" width="270" height="350" alt="Product" />
                                                          <img class="second-image" src="<?= base_url() ?>/assets/images/product/<?= $bs->product_photo ?>" width="270" height="350" alt="Product" />
                                                      </a>
                                                      <div class="actions">
                                                          <a href="#" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                          <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="pe-7s-search"></i></a>
                                                          <a href="#" class="action compare"><i class="pe-7s-shuffle"></i></a>
                                                      </div>
                                                  </div>
                                                  <div class="content">
                                                      <h4 class="sub-title"><a href="single-product.html"><?= $bs->category_name ?></a></h4>
                                                      <h5 class="title"><a href="single-product.html"><?= $bs->product_name ?></a></h5>
                                                      <span class="ratings">
                                                          <span class="rating-wrap">
                                                              <span class="star" style="width: 100%"></span>
                                                          </span>
                                                          <span class="rating-num">(4)</span>
                                                      </span>
                                                      <span class="price">
                                                          <span class="new">IDR <?= number_format($bs->product_price) ?></span>
                                                          <!-- <span class="old">$18.00</span> -->
                                                      </span>
                                                      <?php
                                                        echo form_open('cart/add');
                                                        echo form_hidden('id', $bs->id_product);
                                                        echo form_hidden('qty', '1');
                                                        echo form_hidden('price', $bs->product_price);
                                                        echo form_hidden('name', $bs->product_name);
                                                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));

                                                        ?>
                                                      <?php $checkCart = $this->cart_model->getCartByUserAndId($this->session->userdata('id_user'), $bs->id_product)->num_rows(); ?>
                                                      <?php if ($this->session->userdata('email') != null) {  ?>
                                                          <?php if ($checkCart !== 0) { ?>
                                                              <button type="submit" class="btn btn-sm btn-outline-dark btn-hover-primary mb-4" disabled><?= elang("Already in Cart") ?></button>
                                                          <?php } else { ?>
                                                              <button type="submit" class="btn btn-sm btn-outline-dark btn-hover-primary mb-4"><?= elang("Add To Cart") ?></button>
                                                          <?php } ?>
                                                      <?php } else { ?>
                                                          <button type="button" class="btn btn-sm btn-outline-dark btn-hover-primary mb-4" data-bs-toggle="modal" data-bs-target="#notLogin">
                                                              <?= elang('Add To Cart') ?>
                                                          </button>
                                                      <?php } ?>
                                                      <?php echo form_close(); ?>
                                                  </div>
                                              </div>
                                              <!-- Single Product End -->
                                          </div>
                                          <!-- Product End -->
                                      <?php } ?>


                                  </div>

                                  <!-- Swiper Pagination Start -->
                                  <div class="swiper-pagination d-md-none"></div>
                                  <!-- Swiper Pagination End -->

                                  <!-- Next Previous Button Start -->
                                  <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                                  <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                                  <!-- Next Previous Button End -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Products Tab End -->
      </div>
  </div>
  <!-- Product Section End -->

  <!-- Banner Section Start -->
  <div class="section">
      <div class="container">

          <!-- Banners Start -->
          <div class="row mb-n6">
              <!-- Banner Start -->
              <div class="col-lg-4 col-md-6 col-12 mb-6">
                  <div class="banner" data-aos="fade-up" data-aos-delay="300">
                      <div class="banner-image">
                          <a href="shop-grid.html"><img src="assets/images/banner/banner3.png" alt=""></a>
                      </div>
                      <div class="info">
                          <div class="small-banner-content">
                              <h4 class="sub-title">Sun Hat</h4>
                              <h3 class="title">Get Offer <br />For Summer</h3>
                              <a href="shop-grid.html" class="btn btn-dark btn-sm">Shop Now</a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Banner End -->

              <!-- Banner Start -->
              <div class="col-lg-4 col-md-6 col-12 mb-6">
                  <div class="banner" data-aos="fade-up" data-aos-delay="500">
                      <div class="banner-image">
                          <a href="shop-grid.html"><img src="assets/images/banner/banner4.png" alt=""></a>
                      </div>
                      <div class="info">
                          <div class="small-banner-content">
                              <h4 class="sub-title">Ladies Bag</h4>
                              <h3 class="title">Buy One <br />Get One Free</h3>
                              <a href="shop-grid.html" class="btn btn-dark btn-sm">Shop Now</a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Banner End -->

              <!-- Banner Start -->
              <div class="col-lg-4 col-md-6 col-12 mb-6">
                  <div class="banner" data-aos="fade-up" data-aos-delay="700">
                      <div class="banner-image">
                          <a href="shop-grid.html"><img src="assets/images/banner/banner5.png" alt=""></a>
                      </div>
                      <div class="info">
                          <div class="small-banner-content">
                              <h4 class="sub-title">Smart Watch</h4>
                              <h3 class="title">20% Off <br />Smart Watch</h3>
                              <a href="shop-grid.html" class="btn btn-dark btn-sm">Shop Now</a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Banner End -->

          </div>
          <!-- Banners End -->
      </div>
  </div>
  <!-- Banner Section End -->

  <!-- Brand Logo Start -->
  <div class="section " style="margin-top: 80px;">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <!-- Brand Logo Wrapper Start -->
                  <div class="brand-logo-carousel p-0">
                      <div class="swiper-container">
                          <div class="swiper-wrapper">

                              <?php foreach ($brand as $b) { ?>
                                  <!-- Single Brand Logo Start -->
                                  <div class="swiper-slide single-brand-logo" data-aos="fade-up" data-aos-delay="300">
                                      <a href="#"><img src="<?= base_url() ?>/assets/images/brand-logo/<?= $b->brand_logo ?>" alt="Brand Logo"></a>
                                  </div>
                                  <!-- Single Brand Logo End -->
                              <?php } ?>
                          </div>    
                      </div>
                  </div>
                  <!-- Brand Logo Wrapper End -->
              </div>
          </div>
      </div>
  </div>
  <!-- Brand Logo End -->

  <!-- Blog Section Start -->
  <div class="section section-padding">
      <div class="container">
          <div class="row">
              <div class="section-title" data-aos="fade-up" data-aos-delay="300">
                  <h2 class="title pb-3">Latest Blog</h2>
                  <div class="title-border-bottom"></div>
              </div>
          </div>
          <div class="row mb-n6">

              <div class="col-lg-4 col-md-6 col-12 mb-6" data-aos="fade-up" data-aos-delay="300">

                  <!-- Blog Single Post Start -->
                  <div class="blog-single-post-wrapper">
                      <div class="blog-thumb">
                          <a class="blog-overlay" href="blog-details.html">
                              <img class="fit-image" src="assets/images/blog/blog-post/1.jpg" alt="Blog Post">
                          </a>
                      </div>
                      <div class="blog-content">
                          <div class="post-meta">
                              <span>By : <a href="#">Admin</a></span>
                              <span>14 Jul 2021</span>
                          </div>
                          <h3 class="title"><a href="blog-details.html">Some Winter Collections</a></h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempo</p>
                          <a href="blog-details.html" class="btn btn-dark btn-hover-primary text-uppercase">Read More</a>
                      </div>
                  </div>
                  <!-- Blog Single Post End -->

              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-6" data-aos="fade-up" data-aos-delay="500">

                  <!-- Blog Single Post Start -->
                  <div class="blog-single-post-wrapper">
                      <div class="blog-thumb">
                          <a class="blog-overlay" href="blog-details.html">
                              <img class="fit-image" src="assets/images/blog/blog-post/2.jpg" alt="Blog Post">
                          </a>
                      </div>
                      <div class="blog-content">
                          <div class="post-meta">
                              <span>By : <a href="#">Admin</a></span>
                              <span>14 Jul 2021</span>
                          </div>
                          <h3 class="title"><a href="blog-details.html">My Perty Fashion</a></h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempo</p>
                          <a href="blog-details.html" class="btn btn-dark btn-hover-primary text-uppercase">Read More</a>
                      </div>
                  </div>
                  <!-- Blog Single Post End -->

              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-6" data-aos="fade-up" data-aos-delay="700">

                  <!-- Blog Single Post Start -->
                  <div class="blog-single-post-wrapper">
                      <div class="blog-thumb">
                          <a class="blog-overlay" href="blog-details.html">
                              <img class="fit-image" src="assets/images/blog/blog-post/3.jpg" alt="Blog Post">
                          </a>
                      </div>
                      <div class="blog-content">
                          <div class="post-meta">
                              <span>By : <a href="#">Admin</a></span>
                              <span>14 Jul 2021</span>
                          </div>
                          <h3 class="title"><a href="blog-details.html">Perfect Fashion House</a></h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempo</p>
                          <a href="blog-details.html" class="btn btn-dark btn-hover-primary text-uppercase">Read More</a>
                      </div>
                  </div>
                  <!-- Blog Single Post End -->

              </div>

          </div>
      </div>
  </div>
  <!-- Blog Section End -->


  <!-- Modal Start  -->
  <div class="modalquickview modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <button class="btn close" data-bs-dismiss="modal">×</button>
              <div class="row">
                  <div class="col-md-6 col-12">

                      <!-- Product Details Image Start -->
                      <div class="modal-product-carousel">

                          <!-- Single Product Image Start -->
                          <div class="swiper-container">
                              <div class="swiper-wrapper">
                                  <a class="swiper-slide" href="#">
                                      <img class="w-100" src="assets/images/products/large-size/1.jpg" alt="Product">
                                  </a>
                                  <a class="swiper-slide" href="#">
                                      <img class="w-100" src="assets/images/products/large-size/2.jpg" alt="Product">
                                  </a>
                                  <a class="swiper-slide" href="#">
                                      <img class="w-100" src="assets/images/products/large-size/3.jpg" alt="Product">
                                  </a>
                                  <a class="swiper-slide" href="#">
                                      <img class="w-100" src="assets/images/products/large-size/4.jpg" alt="Product">
                                  </a>
                                  <a class="swiper-slide" href="#">
                                      <img class="w-100" src="assets/images/products/large-size/5.jpg" alt="Product">
                                  </a>
                                  <a class="swiper-slide" href="#">
                                      <img class="w-100" src="assets/images/products/large-size/6.jpg" alt="Product">
                                  </a>
                              </div>

                              <!-- Swiper Pagination Start -->
                              <!-- <div class="swiper-pagination d-md-none"></div> -->
                              <!-- Swiper Pagination End -->

                              <!-- Next Previous Button Start -->
                              <div class="swiper-product-button-next swiper-button-next"><i class="pe-7s-angle-right"></i></div>
                              <div class="swiper-product-button-prev swiper-button-prev"><i class="pe-7s-angle-left"></i></div>
                              <!-- Next Previous Button End -->
                          </div>
                          <!-- Single Product Image End -->

                      </div>
                      <!-- Product Details Image End -->

                  </div>
                  <div class="col-md-6 col-12 overflow-hidden position-relative">

                      <!-- Product Summery Start -->
                      <div class="product-summery">

                          <!-- Product Head Start -->
                          <div class="product-head mb-3">
                              <h2 class="product-title">Sample product</h2>
                          </div>
                          <!-- Product Head End -->

                          <!-- Price Box Start -->
                          <div class="price-box mb-2">
                              <span class="regular-price">$80.00</span>
                              <span class="old-price"><del>$90.00</del></span>
                          </div>
                          <!-- Price Box End -->

                          <!-- Rating Start -->
                          <span class="ratings justify-content-start">
                              <span class="rating-wrap">
                                  <span class="star" style="width: 100%"></span>
                              </span>
                              <span class="rating-num">(4)</span>
                          </span>
                          <!-- Rating End -->

                          <!-- SKU Start -->
                          <div class="sku mb-3">
                              <span>SKU: 12345</span>
                          </div>
                          <!-- SKU End -->

                          <!-- Description Start -->
                          <p class="desc-content mb-5">I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                          <!-- Description End -->

                          <!-- Product Meta Start -->
                          <div class="product-meta mb-3">
                              <!-- Product Size Start -->
                              <div class="product-size">
                                  <span>Size :</span>
                                  <a href=""><strong>S</strong></a>
                                  <a href=""><strong>M</strong></a>
                                  <a href=""><strong>L</strong></a>
                                  <a href=""><strong>XL</strong></a>
                              </div>
                              <!-- Product Size End -->
                          </div>
                          <!-- Product Meta End -->

                          <!-- Product Color Variation Start -->
                          <div class="product-color-variation mb-3">
                              <button type="button" class="btn bg-danger"></button>
                              <button type="button" class="btn bg-primary"></button>
                              <button type="button" class="btn bg-dark"></button>
                              <button type="button" class="btn bg-success"></button>
                          </div>
                          <!-- Product Color Variation End -->

                          <!-- Product Meta Start -->
                          <div class="product-meta mb-5">
                              <!-- Product Metarial Start -->
                              <div class="product-metarial">
                                  <span>Metarial :</span>
                                  <a href=""><strong>Metal</strong></a>
                                  <a href=""><strong>Resin</strong></a>
                                  <a href=""><strong>Lather</strong></a>
                                  <a href=""><strong>Polymer</strong></a>
                              </div>
                              <!-- Product Metarial End -->
                          </div>
                          <!-- Product Meta End -->

                          <!-- Quantity Start -->
                          <div class="quantity mb-5">
                              <div class="cart-plus-minus">
                                  <input class="cart-plus-minus-box" value="0" type="text">
                                  <div class="dec qtybutton"></div>
                                  <div class="inc qtybutton"></div>
                              </div>
                          </div>
                          <!-- Quantity End -->

                          <!-- Cart & Wishlist Button Start -->
                          <div class="cart-wishlist-btn pb-4 mb-n3">
                              <div class="add-to_cart mb-3">
                                  <a class="btn btn-outline-dark btn-hover-primary" href="cart.html">Add to cart</a>
                              </div>
                              <div class="add-to-wishlist mb-3">
                                  <a class="btn btn-outline-dark btn-hover-primary" href="wishlist.html">Add to Wishlist</a>
                              </div>
                          </div>
                          <!-- Cart & Wishlist Button End -->

                          <!-- Social Shear Start -->
                          <div class="social-share">
                              <span>Share :</span>
                              <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                              <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                              <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                              <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                          </div>
                          <!-- Social Shear End -->

                          <!-- Product Delivery Policy Start -->
                          <ul class="product-delivery-policy border-top pt-4 mt-4 border-bottom pb-4">
                              <li> <i class="fa fa-check-square"></i> <span>Security Policy (Edit With Customer Reassurance Module)</span></li>
                              <li><i class="fa fa-truck"></i><span>Delivery Policy (Edit With Customer Reassurance Module)</span></li>
                              <li><i class="fa fa-refresh"></i><span>Return Policy (Edit With Customer Reassurance Module)</span></li>
                          </ul>
                          <!-- Product Delivery Policy End -->

                      </div>
                      <!-- Product Summery End -->

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Modal End  -->

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="notLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?= elang('Information') ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <?= elang('You have to login first'); ?>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= elang('Cancel') ?></button>
                  <a href="<?= base_url('sign-in') ?>" class="btn btn-primary"><?= elang('Sign In') ?></a href="<?= base_url('sign-in') ?>">
              </div>
          </div>
      </div>
  </div>