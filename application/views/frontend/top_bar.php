 <!-- Header Top Start -->
 <div class="header-top bg-light">
     <div class="container">
         <div class="row row-cols-xl-2 align-items-center">

             <!-- Header Top Language, Currency & Link Start -->
             <div class="col d-none d-lg-block">
                 <div class="header-top-lan-curr-link">
                     <div class="header-top-lan dropdown">
                         <button class="dropdown-toggle" data-bs-toggle="dropdown">English <i class="fa fa-angle-down"></i></button>
                         <ul class="dropdown-menu dropdown-menu-right animate slideIndropdown">
                             <li><a class="dropdown-item" href="#">English</a></li>
                             <li><a class="dropdown-item" href="#">Japanese</a></li>
                             <li><a class="dropdown-item" href="#">Arabic</a></li>
                             <li><a class="dropdown-item" href="#">Romanian</a></li>
                         </ul>
                     </div>
                     <div class="header-top-curr dropdown">
                         <button class="dropdown-toggle" data-bs-toggle="dropdown">USD <i class="fa fa-angle-down"></i></button>
                         <ul class="dropdown-menu dropdown-menu-right animate slideIndropdown">
                             <li><a class="dropdown-item" href="#">USD</a></li>
                             <li><a class="dropdown-item" href="#">Pound</a></li>
                         </ul>
                     </div>
                     <div class="header-top-links">
                         <span>Call Us</span><a href="#"> 01234567</a>
                     </div>
                 </div>
             </div>
             <!-- Header Top Language, Currency & Link End -->

             <!-- Header Top Message Start -->
             <div class="col">
                 <p class="header-top-message">Ends Monday: $100 off any dining table + 2 sets of chairs. <?php if (empty($this->session->userdata('email'))) {
                                                                                                            ?>
                         <a href="<?= base_url('sign-in') ?>"><?= ('Sign In') ?></a>
                     <?php } else { ?><a href="<?= base_url('auth/logout') ?>"><?= ('Sign Out') ?></a> <?php } ?>
                 </p>
             </div>
             <!-- Header Top Message End -->

         </div>
     </div>
 </div>
 <!-- Header Top End -->