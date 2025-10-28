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
    <style>
        .menu-carousel-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }
        .menu-carousel {
            display: flex;
            overflow-x: hidden;
            scroll-behavior: smooth;
            gap: 20px;
            padding: 10px 0;
        }
        .carousel-single {
            flex: 0 0 calc(33.333% - 20px);
            min-width: calc(33.333% - 20px);
        }
        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.8);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .carousel-nav.prev {
            left: -20px;
        }
        .carousel-nav.next {
            right: -20px;
        }
        .carousel-nav.hidden {
            display: none;
        }
        @media (max-width: 768px) {
            .carousel-single {
                flex: 0 0 calc(50% - 15px);
                min-width: calc(50% - 15px);
            }
        }
        @media (max-width: 576px) {
            .carousel-single {
                flex: 0 0 100%;
                min-width: 100%;
            }
        }
    </style>
</head>
<body> 
    
    <?php 
    $content = json_decode(file_get_contents('content.json'));
    $header = $content->header;
    $menu_sections = $content->menu_sections;
    $modal_content = $content->modal_content;
    $footer = $content->footer;
    $app_settings = $content->app_settings;
    
    // Calculate visible menus
    $max_visible = $app_settings->max_visible_menus;
    $total_menus = count($menu_sections);
    $show_navigation = $total_menus > $max_visible;
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
                            <li> 
                                <a href="<?php echo $content->navigation->available_views[1]->url; ?>" id="viewToggle">
                                        <img src="assets/images/<?php echo $content->navigation->available_views[0]->icon; ?>" alt="date" id="viewIcon">
                                    </a> 
                            </li>
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
                <div class="menu-carousel-container">
                    <?php if($show_navigation): ?>
                    <button class="carousel-nav prev hidden" onclick="scrollCarousel(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <?php endif; ?>
                    
                    <div class="menu-carousel" id="menuCarousel">
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

                    <?php if($show_navigation): ?>
                    <button class="carousel-nav next" onclick="scrollCarousel(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <?php endif; ?>
                </div>

                <?php if($app_settings->show_allergen_button): ?>
                <div class="text-center mx-auto mt-5"> 
                    <button class="btn-custom position-relative button-show-popup bg-transparent text-center border-0" data-bs-toggle="modal" data-bs-target="#allergenModal">
                        <img src="assets/images/btn.png" alt="btn"> 
                        <span class="w-100"><?php echo $app_settings->allergen_button_text; ?></span>  
                    </button>
                </div>
                <?php endif; ?>

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
    <script>
        // Horizontal scroll functionality
        function scrollCarousel(direction) {
            const carousel = document.getElementById('menuCarousel');
            const carouselItems = document.querySelectorAll('.carousel-single');
            const itemWidth = carouselItems[0].offsetWidth + 20; // width + gap
            
            const scrollAmount = itemWidth * direction;
            carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            
            // Update navigation buttons after scroll
            setTimeout(updateNavigationButtons, 300);
        }

        function updateNavigationButtons() {
            const carousel = document.getElementById('menuCarousel');
            const prevBtn = document.querySelector('.carousel-nav.prev');
            const nextBtn = document.querySelector('.carousel-nav.next');
            
            if (prevBtn && nextBtn) {
                // Show/hide prev button
                if (carousel.scrollLeft <= 10) {
                    prevBtn.classList.add('hidden');
                } else {
                    prevBtn.classList.remove('hidden');
                }
                
                // Show/hide next button
                if (carousel.scrollLeft >= carousel.scrollWidth - carousel.clientWidth - 10) {
                    nextBtn.classList.add('hidden');
                } else {
                    nextBtn.classList.remove('hidden');
                }
            }
        }

        // View toggle functionality
        document.getElementById('viewToggle').addEventListener('click', function(e) {
            e.preventDefault();
            // Toggle between Mittwoch and Speisekalender views
            const currentView = '<?php echo $content->navigation->current_view; ?>';
            if (currentView === 'mittwoch') {
                window.location.href = 'speisekalender.php';
            } else {
                window.location.href = 'index.php';
            }
        });

    // Dynamic icon change based on current page
    document.addEventListener('DOMContentLoaded', function() {
        const currentPage = window.location.pathname;
        const viewToggle = document.getElementById('viewToggle');
        const viewIcon = document.getElementById('viewIcon');
        
        // JSON data থেকে views information নেওয়া
        const views = <?php echo json_encode($content->navigation->available_views); ?>;
        
        let currentView, targetView;
        
        if (currentPage.includes('speisekalender.php')) {
            currentView = views[1]; // speisekalender
            targetView = views[0]; // mittwoch
        } else {
            currentView = views[0]; // mittwoch  
            targetView = views[1]; // speisekalender
        }
        
        // Icon এবং link update করা
        viewIcon.src = 'assets/images/' + currentView.icon;
        viewIcon.alt = currentView.name;
        viewToggle.href = targetView.url;
    });
    </script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>