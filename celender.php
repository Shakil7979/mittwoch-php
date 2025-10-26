<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo json_decode(file_get_contents('content.json'))->speisekalender_page->page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="assets/css/responsive.css"> 
</head>
<body> 
    
    <?php
    // JSON ফাইল লোড করা
    $content = json_decode(file_get_contents('content.json'));
    $speisekalender_page = $content->speisekalender_page;
    $modal_content = $content->modal_content;
    $footer = $content->footer;
    ?>

    <!-- start header area  -->
     <header class="header-area py-5">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-3">
                    <a href="index.php"><img src="assets/images/logo.png" alt="logo"></a>
                </div>
                <div class="col-9">
                    <div class="header-user-menu">
                        <ul class="d-flex justify-content-end align-items-center mb-0 gap-5">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#allergenModal"><img src="assets/images/date.png" alt="date"></a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/user.png" alt="User">
                                </a>
                                <ul class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">KUNDENKONTO</a></li>
                                    <li><a class="dropdown-item" href="#">MEINE BESTELLUNG</a></li>
                                    <li><a class="dropdown-item" href="#">ABONNEMENT</a></li>
                                    <li><a class="dropdown-item" href="#">FAQ</a></li>
                                    <li><a class="dropdown-item d-flex align-items-center gap-2 justify-content-between" href="#">ABMELDEN <i class="fas fa-sign-out-alt"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
     </header>
    <!-- end header area  --> 

    <!-- start main area  -->
    <main>
        <!-- start first section  -->
        <section class="first-section-content"> 
            <div class="container">
                <div class="row">
                    <div class="col-12"> 
                        <div class="content-title text-center"> 
                            <h2>Speisekalender</h2>
                            <p><?php echo $speisekalender_page->date_range; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end first section -->  
           
        <!-- Start calender area  -->
        <section class="calender-area mt-5 mb-5">
            <div class="container">
                <div class="celender-download text-center mb-4 text-md-end">
                    <a href="#">Download Wochenansicht</a>
                </div>
                
                <?php foreach($speisekalender_page->week_days as $day_index => $day): ?>
                <div class="Montag-celender-content">
                    <div class="montag-title-date mb-3 text-center text-md-start">
                        <p><?php echo $day->date; ?></p>
                        <h3><?php echo $day->day; ?></h3>
                    </div>
                    <div class="row">
                        <?php for($i = 0; $i < 3; $i++): ?>
                        <div class="col-md-4">
                            <div class="single-bio text-center position-relative p-4 mb-4">
                                <p><?php echo ($i == 0) ? 'ALL-IN MENÜ' : (($i == 1) ? 'VEGGIE MENÜ' : 'PREMIUM MENÜ'); ?></p>
                                <?php foreach($day->menu_items as $item_index => $menu_item): ?>
                                    <?php if($item_index == 0): ?>
                                        <h4><?php echo $menu_item; ?> <sub>10</sub></h4>
                                    <?php elseif($item_index == 1): ?>
                                        <h2>
                                            <?php 
                                            $menu_text = $menu_item;
                                            // Replace allergens with sup tags
                                            $menu_text = str_replace('+', '<sup>A</sup>', $menu_text);
                                            $menu_text = str_replace('™L', '<sup>R, F, L</sup>', $menu_text);
                                            echo $menu_text;
                                            ?>
                                        </h2>
                                    <?php else: ?>
                                        <h4><?php echo $menu_item; ?></h4>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <button class="btn-celender-eye"><i class="fa-solid fa-eye"></i></button>
                                <div class="single-bio-after">
                                    <img class="celender-eye-img" src="assets/images/celender-eye.png" alt="celender-eye">
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="celendar-down-button text-center mt-4">
                    <button><img src="assets/images/arrow-down.png" alt="arrow down"></button>
                </div>
            </div>
        </section>
        <!-- End calender area  -->
 

    </main>
    <!-- end main area  --> 

    <!-- start footer area  -->
    <footer class="footer-area">
        <div class="container">
            <div class="footer-content text-center mb-4">
                <a href="index.php"><img src="assets/images/bird.png" alt="Bird"></a>
                <ul class="d-flex justify-content-center align-items-center mb-0 gap-3 mt-3 mb-3"> 
                    <?php foreach($footer->links as $link): ?>
                        <li><a href="#"><?php echo $link; ?></a></li>
                    <?php endforeach; ?>
                </ul> 
                <p>© 2014 – 2025 GmbH</p>
            </div>
        </div>
    </footer>
    <!-- end footer area  -->

    <!-- Modal -->
    <div class="modal fade" id="allergenModal" tabindex="-1" aria-labelledby="allergenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content bg-white position-relative">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-lg-4 col-6 border-right-custom">
                            <h5>ALLERGENE</h5>
                            <ul class="list-unstyled">
                                <?php foreach($modal_content->allergens as $allergen): ?>
                                    <li><?php echo $allergen->code; ?>: <?php echo $allergen->description; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-6 border-right-custom border-right-md-none">
                            <h5>ZUSATZSTOFFE</h5>
                            <ul class="list-unstyled">
                                <?php foreach($modal_content->additives as $additive): ?>
                                    <li><?php echo $additive->code; ?>: <?php echo $additive->description; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-12">
                            <h5>WEITERE</h5>
                            <ul class="list-unstyled">
                                <?php foreach($modal_content->other_info as $info): ?>
                                    <li><?php echo $info->code; ?>: <?php echo $info->description; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>