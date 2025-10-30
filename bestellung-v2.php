<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo json_decode(file_get_contents('content.json'))->bestellung_page->page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>
    <link rel="stylesheet" href="assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style> 
        
        .bl-date-badge {
            background: rgba(255, 255, 255, 0.2);
            color: #000;
            padding: 10px 20px;
            border-radius: 25px;
            display: inline-block;
            margin: 20px 0;
            font-weight: 500;
            font-size: 14px;
        }
        
        .bl-menu-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        
        .bl-menu-title {
            color: #333;
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .bl-menu-subtitle {
            color: #666;
            font-size: 1rem;
            margin-bottom: 20px;
        }
        
        .bl-food-image {
            width: 100%; 
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        
        .bl-nutrition-section {
            background: transparent;
            border-radius: 15px;
            padding: 0px;
            margin: 20px 0;
        }
        
        .bl-nutrition-title {
            color: #333;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .bl-nutrition-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .bl-nutrition-table th {
            background: #667eea;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 500;
        }
        
        .bl-nutrition-table th,
        .bl-nutrition-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 12px;
        }
         
        
        .bl-nutrition-table tr:nth-child(even) {
            background: #f8f9fa;
        }
        
        .bl-order-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: bold;
            width: 100%;
            margin: 20px 0;
            transition: transform 0.3s ease;
        }
        
        .bl-order-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .bl-footer-note {
            color: #666;
            font-size: 0.9rem;
            text-align: center;
            margin-top: 10px;
        }
        
        .bl-discover-section {
            text-align: center;
            margin: 40px 0;
            color: #000;
        }
        
        .bl-discover-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .bl-discover-subtitle {
            font-size: 1.5rem;
            opacity: 0.9;
        }
        
        .bl-footer {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding: 30px 0;
            margin-top: 50px;
        }
        
        .bl-footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }
        
        .bl-footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .bl-footer-links a:hover {
            color: white;
        }
        
        .bl-footer-copyright {
            color: rgba(255, 255, 255, 0.6);
            text-align: center;
        }
    </style>
</head>
<body class="bl-body"> 
    
    <?php 
    $content = json_decode(file_get_contents('content.json'));
    $bestellung_page = $content->bestellung_page;
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

    <!-- Main Content -->
    <main class="container"> 
        <section class="first-section-content"> 
            <div class="container">
                <div class="row">
                    <div class="col-12"> 
                        <div class="content-title text-center"> 
                            <h2>Bestellung</h2>
                            <p class="bl-hero-subtitle">für <?php echo $bestellung_page->customer_name; ?></p>
                        </div>
                        <div class="bl-date-badge text-center mx-auto">
                            <i class="fas fa-calendar me-2"></i>
                            08.04.2022 - MONTAG
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Menu Card -->
        <div class="bl-menu-card">
            <div class="row">
                <!-- Food Image -->
                <div class="col-md-6">
                    <img src="assets/images/item-1.png" alt="Food Image" class="bl-food-image">
                    <h3 class="bl-menu-title">BIO Linseneintopf mit Rindfleisch</h3>
                    <p class="bl-menu-subtitle">Vergüt</p>
                    <div class="bl-menu-subtitle">
                        <strong>VEGGIE HERU</strong>
                    </div>
                </div>
                
                <!-- Nutrition Info -->
                <div class="col-md-6">
                    <div class="bl-nutrition-section">
                        <h4 class="bl-nutrition-title">
                            <i class="fas fa-chart-bar me-2"></i>
                            Nährwertinfo
                        </h4>
                        <p class="text-muted mb-4">durchschnittliche Nährwerte pro 100g:</p>
                        <div class="best-table"> 
                            <table class="bl-nutrition-table">
                                <thead>
                                    <tr>
                                        <th>Gericht</th>
                                        <th>Kalorien</th>
                                        <th>Fett</th>
                                        <th>Kohlenhydrate</th>
                                        <th>Protein</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($bestellung_page->order_items as $item): ?>
                                    <tr>
                                        <td><strong><?php echo $item->name; ?></strong></td>
                                        <td><?php echo $item->nutrition_info->calories; ?></td>
                                        <td><?php echo $item->nutrition_info->fat; ?></td>
                                        <td><?php echo $item->nutrition_info->carbs; ?></td>
                                        <td><?php echo $item->nutrition_info->protein; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <button class="bl-order-btn">
                        <i class="fas fa-shopping-cart me-2"></i>
                        JETZT KOSTENLOS BESTELLEN
                    </button>
                    
                    <p class="bl-footer-note">
                        *Kostenübernahme durch Koch-Card-Bildungskarte
                    </p>
                </div>
            </div>
        </div>

        <!-- Discover Section -->
        <section class="bl-discover-section">
            <h2 class="bl-discover-title">Entdecke jetzt</h2>
            <h3 class="bl-discover-subtitle">deine Foodhelden</h3>
        </section>
    </main>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>