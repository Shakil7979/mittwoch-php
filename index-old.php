<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo json_decode(file_get_contents('content.json'))->page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="assets/css/responsive.css"> 
</head>
<body> 
    
    <?php 
    $content = json_decode(file_get_contents('content.json'));
    $header = $content->header;
    $menu_sections = $content->menu_sections;
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
                            <li><a href="#"><img src="assets/images/date.png" alt="date"></a></li>
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
                            <h4><?php echo $header->title; ?></h4>
                            <h2><?php echo $header->subtitle; ?></h2>
                            <p><?php echo $header->date; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end first section --> 

        <!-- start second section  -->
        <section class="second-section-content mt-5">
            <div class="container">
                <div class="second-section-carousel owl-carousel owl-theme position-relative">
                    <?php foreach($menu_sections as $index => $section): ?>
                    <div class="carousel-single text-center">
                        <img src="assets/images/item-<?php echo ($index % 2) + 1; ?>.png" alt="item-<?php echo ($index % 2) + 1; ?>">
                        <h4><?php echo $section->section_title; ?> MENÜ</h4>
                        <?php foreach($section->items as $item_index => $item): ?>
                            <?php if($item_index == 0): ?>
                                <p>
                                    <?php echo $item->name; ?> 
                                    <?php if(!empty($item->allergens)): ?>
                                        <sup><?php echo implode(', ', $item->allergens); ?></sup>
                                    <?php endif; ?>
                                </p>
                            <?php elseif($item_index == 1): ?>
                                <h2>
                                    <?php echo $item->name; ?> 
                                    <?php if(!empty($item->allergens)): ?>
                                        <sup><?php echo implode(', ', $item->allergens); ?></sup>
                                    <?php endif; ?>
                                </h2>
                            <?php else: ?>
                                <p>
                                    <?php echo $item->name; ?>
                                    <?php if(!empty($item->allergens)): ?>
                                        <sup><?php echo implode(', ', $item->allergens); ?></sup>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="item-btn mt-5"> 
                            <a href="best.php" class="btn-custom position-relative text-center">
                                <img src="assets/images/btn.png" alt="btn"> 
                                <span><?php echo $section->order_button; ?></span>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center mx-auto mt-5"> 
                    <button class="btn-custom position-relative button-show-popup bg-transparent text-center border-0" data-bs-toggle="modal" data-bs-target="#allergenModal">
                        <img src="assets/images/btn.png" alt="btn"> 
                        <span class="w-100">Show allergens</span>  
                    </button>
                </div>
                <div class="carousel-bottom-text text-center">
                    <p>Änderungen bleiben vorbehalten. Referenzbild: Produkt der Abbildung ähnlich</p>
                </div>
            </div>
        </section>
        <!-- end second section  -->

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

    <!-- Allergen Modal -->
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