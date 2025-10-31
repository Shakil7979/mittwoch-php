<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo json_decode(file_get_contents('content.json'))->bestellung_page->page_title; ?></title>
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
    $bestellung_page = $content->bestellung_page;
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
                            <li><a href="index.php"><img src="assets/images/date.png" alt="date"></a></li>
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
                            <h2>Bestellung</h2>
                            <p>für <?php echo $bestellung_page->customer_name; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end first section --> 

        <!-- start bestell section -->
        <section class="bestell-section">
            <div class="container">
                <div class="menu-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="menu-date">08.06.2022 · <br><span>MONTAG</span></div>
                            <div class="menu-title"><?php echo $bestellung_page->order_items[0]->name; ?></div>
                            <div class="d-md-none d-block">
                                <button class="info-btn">Nährwertinfo <i style="font-size: 12px;" class="fa-solid fa-chevron-right"></i></button>
                                <p class="info-p">durchschnittliche Nährwerte pro 100g:</p>
                            </div>
                        </div> 
                    </div>

                    <div class="row mt-4 position-relative info-pad-bottom">
                        <div class="col-md-6 position-relative">
                            <div class="food-img d-flex align-items-center justify-content-center"> 
                                <img src="assets/images/page-333.png" alt="Food Image" class="max-w-auto img-fluid rounded">
                            </div> 
                        </div>

                        <div class="col-md-6">
                            <div class="right-table info-modal-open"> 
                                <button class="close-info-modal d-md-none d-block"><i class="fas fa-times"></i></button>
                                <div class="modal-of-info mb-3">
                                    <div class="nutrition-info"> 
                                        <h5>Nährwertinfo <img src="assets/images/bird-3.png" alt="Bird 3"></h5>
                                        <p class="text-muted small border-bottom-custom">durchschnittliche Nährwerte pro 100g:</p>
                                    </div> 
                                    <table class="table nutrition-table">
                                        <tbody>
                                            <?php foreach($bestellung_page->order_items as $index => $item): ?>
                                            <tr>
                                                <td colspan="4" class="border-0 table-title-text"><?php echo $item->name; ?></td>
                                            </tr>
                                            <tr> 
                                                <td>
                                                    <span><?php echo $bestellung_page->nutrition_labels->calories; ?></span> 
                                                    <span class="table-title-text">
                                                        <?php echo explode(' ', $item->nutrition_info->calories)[0]; ?> 
                                                        <span class="table-title-small">kcal</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span><?php echo $bestellung_page->nutrition_labels->fat; ?></span>
                                                    <?php echo str_replace('g', '', $item->nutrition_info->fat); ?>
                                                    <span class="table-title-small">g</span> 
                                                </td>
                                                <td>
                                                    <span><?php echo $bestellung_page->nutrition_labels->carbs; ?></span>
                                                    <?php echo str_replace('g', '', $item->nutrition_info->carbs); ?>
                                                    <span class="table-title-small">g</span> 
                                                </td>
                                                <td>
                                                    <span><?php echo $bestellung_page->nutrition_labels->protein; ?></span> 
                                                    <?php echo str_replace('g', '', $item->nutrition_info->protein); ?>
                                                    <span class="table-title-small">g</span> 
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
 
                                <a href="#" class="btn-custom-2 btn-custom position-relative d-block w-100">
                                    <img src="assets/images/btn-2.png" alt="Btn 2">
                                    <span>JETZT KOSTENLOS BESTELLEN</span>
                                </a>
                                <p class="small text-center mt-2 text-muted">*Kostenübernahme durch Koch-Card-Bildungskarte</p>
                            </div>

                        </div>
                    </div>

                    <div class="bottom-section"> 
                        <h2 class="bottom-text-1">Entdecke jetzt</h2>
                        <h2 class="bottom-text-2">deine Foodhelden</h2>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- end bestell section -->
 

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