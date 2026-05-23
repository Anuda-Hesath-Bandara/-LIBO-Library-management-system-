<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiBo LiBraRy</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <style>
        :root {
            --primary-color: #debe2b;
            --background-color: #222831;
            --second-background-color: #393E46;
            --text-color: #EEEEEE;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 100px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo h1 {
            font-size: 24px;
        }

        .logo span {
            color: var(--primary-color);
        }

        nav {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        nav a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 16px;
        }

        .btn {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn:hover {
            background-color: var(--primary-color);
            color: var(--background-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 255, 169, 0.4);
        }

        /* Add shine effect */
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: 0.5s;
            z-index: -1;
        }

        .btn:hover::before {
            left: 100%;
        }

        /* Hero Section Styles */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 100px;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            flex: 1;
            z-index: 2;
            max-width: 50%;
            margin-left: auto;
            text-align: right;
            padding-right: 50px;
        }

        .hero-content h2 {
            font-size: 64px;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-content h3 {
            font-size: 48px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 16px;
            margin-bottom: 30px;
            max-width: 500px;
        }

        .background-text {
            position: absolute;
            right: 0;
            font-size: 200px;
            opacity: 0.1;
            z-index: 1;
        }

        .hero-image {
            position: absolute;
            right: 100px;
            bottom: 0;
            height: 90vh;
            z-index: 2;
            width: 40%;
            display: flex;
            justify-content: flex-end;
        }

        .hero-image img {
            right: 25%;
            height: 100%;
            object-fit: contain;
        }

        @media (max-width: 1200px) {
            header {
                padding: 20px 50px;
            }

            .hero {
                padding: 0 50px;
            }

            .hero-content h2 {
                font-size: 48px;
            }

            .hero-content h3 {
                font-size: 36px;
            }

            .hero-image {
                right: 100px;
            }
        }

        @media (max-width: 768px) {
            nav {
                display: none;
            }

            .hero-content {
                max-width: 100%;
                text-align: center;
                padding-right: 0;
                margin-left: 0;
            }

            .hero-image {
                position: relative;
                left: 0;
                width: 100%;
                height: 60vh;
                margin-top: 50px;
                justify-content: center;
            }
        }

        .hero-content h3 .username {
            color: var(--primary-color);
            font-weight: bold;
        }

        .hero-content .join-btn {
            display: inline-block;
            margin-top: 20px;
        }

        /* Add this to your existing CSS */
        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
            box-shadow: 0 0 10px var(--primary-color);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Active state for current page */
        .nav-link.active {
            color: var(--primary-color);
        }

        .nav-link.active::after {
            width: 100%;
        }

        /* Services Section Styles */
        .services-section {
            
            background-color: var(--background-color);
            padding: 80px 0;
            position: relative;
        }

        .services-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .section-header p {
            color: var(--text-color);
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            padding: 20px 0;
        }

        .service-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(0, 255, 169, 0.1);
            transition: all 0.3s ease;
            aspect-ratio: 1;
        }

        .service-image {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.3),
                rgba(0, 0, 0, 0.7)
            );
        }

        .service-card h3 {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: var(--text-color);
            font-size: 1.5rem;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .card-hover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            padding: 20px;
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-hover p {
            color: var(--text-color);
            margin-bottom: 15px;
        }

        .card-hover ul {
            list-style: none;
            margin-bottom: 20px;
        }

        .card-hover ul li {
            color: var(--text-color);
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }

        .card-hover ul li::before {
            content: '→';
            color: var(--primary-color);
            position: absolute;
            left: 0;
        }

        .program-btn {
            display: inline-block;
            padding: 10px 25px;
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(0, 255, 169, 0.2);
        }

        .service-card:hover .service-image img {
            transform: scale(1.1);
        }

        .service-card:hover .card-hover {
            opacity: 1;
        }

        .program-btn:hover {
            background: var(--primary-color);
            color: var(--background-color);
            box-shadow: 0 0 20px rgba(0, 255, 169, 0.4);
        }

        @media (max-width: 1024px) {
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: 1fr;
            }

            .section-header h2 {
                font-size: 2rem;
            }
        }

        /* Add this to your existing CSS */
        .about-section {
            padding: 100px 0;
            background-color: var(--background-color);
            position: relative;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .about-image {
            position: relative;
            width: 50%;
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .experience-badge {
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--primary-color);
            color: var(--background-color);
            padding: 10px 20px;
            border-radius: 15px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .experience-badge .years {
            font-size: 2rem;
            margin-right: 5px;
        }

        .experience-badge .text {
            font-size: 1rem;
        }

        .about-text {
            flex: 1;
        }

        .about-text h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .about-text p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .feature {
            text-align: center;
        }

        .feature .feature-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .feature h4 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .feature p {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Pricing Section Styles */
        .pricing-section {
            padding: 100px 0;
            background-color: var(--background-color);
        }

        .pricing-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .pricing-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #2c2c2c;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: var(--primary-color);
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .discount {
            background-color: var(--primary-color);
            color: var(--background-color);
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            margin-left: 8px;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .pricing-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 40px;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 255, 169, 0.1);
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 255, 169, 0.1);
        }

        .pricing-card.popular {
            border: 2px solid var(--primary-color);
            transform: scale(1.05);
        }

        .popular-badge {
            position: absolute;
            top: -15px;
            right: 20px;
            background-color: var(--primary-color);
            color: var(--background-color);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .plan-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .plan-header h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .price {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .currency {
            font-size: 1.5rem;
            vertical-align: super;
        }

        .period {
            font-size: 1rem;
            opacity: 0.7;
        }

        .amount.yearly {
            display: none;
        }

        .pricing-toggle input:checked ~ .pricing-grid .amount.monthly {
            display: none;
        }

        .pricing-toggle input:checked ~ .pricing-grid .amount.yearly {
            display: inline;
        }

        .plan-features {
            margin-bottom: 30px;
        }

        .plan-features ul {
            list-style: none;
            padding: 0;
        }

        .plan-features li {
            padding: 10px 0;
            position: relative;
            padding-left: 30px;
        }

        .plan-features li:before {
            content: "✓";
            color: var(--primary-color);
            position: absolute;
            left: 0;
        }

        .plan-features li.not-included {
            opacity: 0.5;
        }

        .plan-features li.not-included:before {
            content: "×";
            color: #ff4444;
        }

        .plan-btn {
            display: block;
            text-align: center;
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            padding: 15px;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .plan-btn:hover {
            background: var(--primary-color);
            color: var(--background-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 255, 169, 0.4);
        }

        @media (max-width: 968px) {
            .pricing-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .pricing-card.popular {
                grid-column: span 2;
            }
        }

        @media (max-width: 576px) {
            .pricing-grid {
                grid-template-columns: 1fr;
            }
            
            .pricing-card.popular {
                grid-column: span 1;
            }
            
            .pricing-card {
                padding: 30px;
            }
        }

        /* Enhanced Review Section Styles */
        .review-section {
            padding: 100px 0;
            background-color: var(--background-color);
            position: relative;
            overflow: hidden;
        }

        .review-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .review-slider {
            position: relative;
            display: flex;
            align-items: center;
            margin-top: 50px;
        }

        .reviews-wrapper {
            overflow: hidden;
            width: 100%;
            padding: 20px 0;
        }

        .reviews-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .review-card {
            min-width: calc(33.333% - 40px);
            margin: 0 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(0, 255, 169, 0.1);
            transition: all 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 255, 169, 0.1);
        }

        .review-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .reviewer-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }

        .reviewer-info {
            margin-left: 15px;
        }

        .reviewer-info h4 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .rating {
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .review-text {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            font-style: italic;
        }

        .membership-type {
            display: inline-block;
            padding: 5px 15px;
            background: rgba(0, 255, 169, 0.1);
            border-radius: 15px;
            font-size: 0.9rem;
            color: var(--primary-color);
        }

        .slider-btn {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .slider-btn:hover {
            background: var(--primary-color);
            color: var(--background-color);
        }

        .prev-btn {
            margin-right: 10px;
        }

        .next-btn {
            margin-left: 10px;
        }

        .review-dots {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 10px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(0, 255, 169, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: var(--primary-color);
            transform: scale(1.2);
        }

        @media (max-width: 1024px) {
            .review-card {
                min-width: calc(50% - 40px);
            }
        }

        @media (max-width: 768px) {
            .review-card {
                min-width: calc(100% - 40px);
            }
        }

        /* Animation Classes */
        .review-card-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.5s ease;
        }

        .review-card-animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Footer Styles */
        .footer {
            background-color: #111;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--primary-color));
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>LiBo <span>LiBraRy</span></h1>
        </div>
        <nav class="nav-links">
            <div class="logo" style="display: flex; align-items: center;">
                

                </a>
            </div>
            <a href="#home" class="nav-link" data-section="home">Home</a>
            <a href="reservation.php"  data-section="reservation">Reservation</a>
            <a href="catalog.php"  data-section="category">Catalog</a>
            <a href="book.php" data-section="new book">New Book</a>
            <a href="#about" class="nav-link" data-section="about">About Us</a>
            <a href="#pricing" class="nav-link" data-section="pricing">Pricing</a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
            <a href="#review" class="nav-link" data-section="review">Review</a>
            <a href="login.php" class="btn">Login</a>
            <a href="register/register.php" class="btn">Register</a>
        </nav>
    </header>

    <section id="hero" style="background-image: url('library new.jpg'); background-size: cover; background-position: center; height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center; color: white;">
        <div style="background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <h1 style="font-size: 3rem; margin-bottom: 10px;">Your Gateway to Endless Knowledge and Adventures</h1>
            <p style="font-size: 1.5rem; margin-bottom: 20px;">"This version captures the essence of a library, emphasizing the vast collection of books and the enriching experience of discovering new knowledge and adventures"</p>
            <a href="ebook.php" style="background-color: #debe2b; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 1.2rem;">"Explore Our E-books"</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="services-container">
            <div class="section-header">
                <h2>Our Special Book Collections</h2>
                <p>Discover Your Path to Knowledge and Adventure</p>
            </div>

            <div class="services-grid">
                <!-- Becoming -->
                <div class="service-card" data-category="Becoming">
                    <div class="service-image">
                        <img src="becoming.jpg" alt="Becoming">
                        <div class="overlay"></div>
                    </div>
                    <h3>Becoming</h3>
                    <div class="card-hover">
                       
                        <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                    </div>
                </div>

                <!-- Craw Dads Sing -->
                <div class="service-card" data-category="Craw Dads Sing">
                    <div class="service-image">
                        <img src="2.jpg" alt="Craw Dads Sing">
                        <div class="overlay"></div>
                    </div>
                    <h3>Craw Dads Sing</h3>
                    <div class="card-hover">
                        
                        <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                    </div>
                </div>

                <!-- The Silent Patient -->
                <div class="service-card" data-category="The Silent Patient">
                    <div class="service-image">
                        <img src="silent.jpg" alt="The Silent Patient">
                        <div class="overlay"></div>
                    </div>
                    <h3>The Silent Patient</h3>
                    <div class="card-hover">
                        
                        <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                    </div>
                </div>

                <!-- Circe -->
                <div class="service-card" data-category="Circe">
                    <div class="service-image">
                        <img src="circe.jpg" alt="Fat Loss">
                        <div class="Circe"></div>
                    </div>
                    <h3>Circe</h3>
                    <div class="card-hover">
                        
                        <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                    </div>
                </div>

                <!-- Normal People -->
                <div class="service-card" data-category="Normal People">
                    <div class="service-image">
                        <img src="normal people.jpg" alt="Normal People">
                        <div class="overlay"></div>
                    </div>
                    <h3>Normal People</h3>
                    <div class="card-hover">
                        
                        <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                    </div>
                </div>

                    <!-- To Kill A Mockinbird -->
                    <div class="service-card" data-category="To Kill A Mockinbird">
                        <div class="service-image">
                            <img src="mockinbird.jpg" alt="To Kill A Mockinbird">
                            <div class="overlay"></div>
                        </div>
                        <h3>To Kill A Mockinbird</h3>
                        <div class="card-hover">
                           
                            <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                        </div>
                    </div>

                        <!-- The Prophet -->
                <div class="service-card" data-category="The Prophet">
                    <div class="service-image">
                        <img src="prophet.jpg" alt="The Prophet">
                        <div class="overlay"></div>
                    </div>
                    <h3>The Prophet</h3>
                    <div class="card-hover">
                        
                        <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                    </div>
                </div>

                    <!-- Diary Of Young Girl -->
                    <div class="service-card" data-category="Diary Of Young Girl">
                        <div class="service-image">
                            <img src="diary.jpg" alt="Diary Of Young Girl">
                            <div class="overlay"></div>
                        </div>
                        <h3>Diary Of Young Girl</h3>
                        <div class="card-hover">
                           
                            <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                        </div>
                    </div>

                <!-- Nightingle -->
                <div class="service-card" data-category="Nightingle">
                    <div class="service-image">
                        <img src="nightingle.jpg" alt="Nightingle">
                        <div class="overlay"></div>
                    </div>
                    <h3>Nightingle</h3>
                    <div class="card-hover">
                       
                        <a href="services/booking system.php" class="program-btn">Library Book Purchase Program</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-section" id="about">
        <div class="about-container">
            <div class="section-header">
                <h2>About Us</h2>
                <p>Your Journey to Knowledge Excellence Starts Here</p>
            </div>
            
            <div class="about-content">
                <div class="about-image">
                    <img src="back.jpg" alt="Our Gym">
                    <div class="experience-badge">
                        <span class="years">10+</span>
                        <span class="text">Years of Dedication</span>
                    </div>
                </div>
                
                <div class="about-text">
                    <h3>Why Choose Knowledge Haven Library?</h3>
                    <p>At Knowledge Haven, we believe in empowering minds through access to information and resources. Our modern facility and knowledgeable staff are committed to helping you explore the world of knowledge.</p>
                    
                    <div class="features-grid">
                        <div class="feature">
                            <i class="feature-icon">📚 </i>
                            <h4>Expert Staff</h4>
                            <p>Dedicated professionals ready to assist you in your learning journey.</p>
                        </div>
                        <div class="feature">
                            <i class="feature-icon">💻 </i>
                            <h4>Modern Resources</h4>
                            <p>A diverse collection of books, digital media, and cutting-edge technology.</p>
                        </div>
                        <div class="feature">
                            <i class="feature-icon">🎯</i>
                            <h4>Personalized Support</h4>
                            <p>Tailored programs and resources to meet your individual learning goals.</p>
                        </div>
                        <div class="feature">
                            <i class="feature-icon">🤝</i>
                            <h4>Community Engagement</h4>
                            <p>A welcoming environment that fosters collaboration and lifelong learning.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section" id="pricing">
        <div class="pricing-container">
            <div class="section-header">
                <h2>Membership Plans</h2>
                <p>Choose the Perfect Plan for Your Learning Journey</p>
            </div>

            <div class="pricing-toggle">
                <span>Monthly</span>
                <label class="switch">
                    <input type="checkbox" id="billing-toggle">
                    <span class="slider"></span>
                </label>
                <span>Yearly <span class="discount">Save 40%</span></span>
            </div>

            <div class="pricing-grid">
                <!-- Basic Plan -->
                <div class="pricing-card">
                    <div class="plan-header">
                        <h3>Basic</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount monthly">29</span>
                            <span class="amount yearly">278</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>Access to Library Facilities </li>
                            <li>Basic Resource Usage</li>
                            <li>Computer and Internet Access</li>
                            <li>2 Workshops/Month </li>
                            <li class="not-included">Personalized Reading Recommendations </li>
                            <li class="not-included">Research Assistance</li>
                        </ul>
                    </div>
                    <a href="#" class="plan-btn">Choose Plan</a>
                </div>

                <!-- Pro Plan -->
                <div class="pricing-card popular">
                    <div class="popular-badge">Most Popular</div>
                    <div class="plan-header">
                        <h3>Pro</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount monthly">49</span>
                            <span class="amount yearly">470</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>All Basic Features</li>
                            <li>Unlimited Group Classes</li>
                            <li>Advanced Equipment Access</li>
                            <li>1 PT Session/Month</li>
                            <li>Basic Nutrition Plan</li>
                            <li class="not-included">Premium Amenities</li>
                        </ul>
                    </div>
                    <a href="#" class="plan-btn">Choose Plan</a>
                </div>

                <!-- Elite Plan -->
                <div class="pricing-card">
                    <div class="plan-header">
                        <h3>Elite</h3>
                        <div class="price">
                            <span class="currency">$</span>
                            <span class="amount monthly">89</span>
                            <span class="amount yearly">854</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li>All Pro Features</li>
                            <li>4 PT Sessions/Month</li>
                            <li>Custom Nutrition Plan</li>
                            <li>Premium Amenities</li>
                            <li>Recovery Zone Access</li>
                            <li>Priority Booking</li>
                        </ul>
                    </div>
                    <a href="#" class="plan-btn">Choose Plan</a>
                </div>
            </div>
        </div>
    </section>
    
       
    <!-- Review Section -->
    <section class="review-section" id="review">
        <div class="review-container">
            <div class="section-header">
                <h2>Client Reviews</h2>
                <p>What Our Members Say About Us</p>
            </div>

            <div class="review-slider">
                <button class="slider-btn prev-btn"><</button>
                
                <div class="reviews-wrapper">
                    <div class="reviews-track">
                        <!-- Review Card 1 -->
                        <div class="review-card">
                            <div class="review-header">
                                <img src="assets/home/John Smith.jpg" alt="John Doe" class="reviewer-img">
                                <div class="reviewer-info">
                                    <h4>John Doe</h4>
                                    <div class="rating">★★★★★</div>
                                </div>
                            </div>
                            <p class="review-text">"Incredible transformation journey! The trainers here are exceptional, and the atmosphere is so motivating. I've achieved results I never thought possible."</p>
                            <span class="membership-type">Pro Member</span>
                        </div>

                        <!-- Review Card 2 -->
                        <div class="review-card">
                            <div class="review-header">
                                <img src="assets/home/Emily Davis.jpg" alt="Sarah Smith" class="reviewer-img">
                                <div class="reviewer-info">
                                    <h4>Sarah Smith</h4>
                                    <div class="rating">★★★★★</div>
                                </div>
                            </div>
                            <p class="review-text">"The personalized attention and expert guidance have made my fitness journey enjoyable and effective. Best gym experience ever!"</p>
                            <span class="membership-type">Elite Member</span>
                        </div>

                        <!-- Review Card 3 -->
                        <div class="review-card">
                            <div class="review-header">
                                <img src="assets/home/Mike Wilson.jpg" alt="Mike Johnson" class="reviewer-img">
                                <div class="reviewer-info">
                                    <h4>Mike Johnson</h4>
                                    <div class="rating">★★★★½</div>
                                </div>
                            </div>
                            <p class="review-text">"State-of-the-art equipment and knowledgeable staff. The nutrition guidance has been a game-changer for my fitness goals."</p>
                            <span class="membership-type">Basic Member</span>
                        </div>

                        <!-- Add more review cards as needed -->
                    </div>
                </div>

                <button class="slider-btn next-btn">❯</button>
            </div>

            <div class="review-dots"></div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Logo & About -->
            <div class="footer-column">
                <h3>LiBo <span>LiBraRy</span></h3>
                <p>Your Gateway to Endless Knowledge and Adventures</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#catalog">Catalog</a></li>
                    <li><a href="#about us">About Us</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-column">
                <h4>Contact Us</h4>
                <div class="contact-info">
                    <p><i class="fas fa-map-marker-alt"></i> 456 Library Lane, Colombo 7</p>
                    <p><i class="fas fa-phone"></i> +1 544 472 410</p>
                    <p><i class="fas fa-envelope"></i> info@library.com</p>
                    <p><i class="fas fa-clock"></i> Mon-Sat: 6:00 AM - 10:00 PM</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <span class="current-year">2024</span> LiboLibrary. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
