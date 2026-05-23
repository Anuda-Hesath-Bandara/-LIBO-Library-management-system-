<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Trainers - FitZone</title>
    <link rel="stylesheet" href="trainers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-content">
            <a href="index.html" class="logo">
                <h1>FitZone <span>Fitness</span></h1>
            </a>
            <div class="nav-links" id="navLinks">
                <a href="index.html#home">Home</a>
                <a href="index.html#about">About</a>
                <a href="index.html#services">Services</a>
                <a href="trainers.html">Trainers</a>
                <a href="index.html#contact">Contact</a>
            </div>
            <div class="nav-buttons">
                <a href="login.html" class="login-btn">Login</a>
                <a href="register.html" class="register-btn">Register</a>
            </div>
        </div>
    </nav>

    <main>
        <!-- Hero Section -->
        <section class="trainers-hero">
            <div class="hero-content">
                <h1>Meet Our Expert Trainers</h1>
                <p>Professional guidance to help you achieve your fitness goals</p>
            </div>
        </section>

        <!-- Trainers Grid Section -->
        <section class="trainers-grid">
            <div class="container">
                <!-- Trainer Card 1 -->
                <div class="trainer-card">
                    <div class="trainer-image">
                        <img src="assets/coch/Gym Fitness Post Template.png" alt="John Smith">
                        <div class="trainer-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="trainer-info">
                        <h3>John Smith</h3>
                        <span class="speciality">Strength & Conditioning</span>
                        <div class="trainer-details">
                            <p><i class="fas fa-medal"></i> 10+ Years Experience</p>
                            <p><i class="fas fa-certificate"></i> NASM Certified</p>
                            <p><i class="fas fa-dumbbell"></i> Powerlifting Expert</p>
                        </div>
                        <a href="booking.html" class="book-btn">Book Session</a>
                        </a>
                    </div>
                </div>

                <!-- Trainer Card 2 -->
                <div class="trainer-card">
                    <div class="trainer-image">
                        <img src="assets/coch/coch 2.png" alt="Sarah Johnson">
                        <div class="trainer-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="trainer-info">
                        <h3>Sarah Johnson</h3>
                        <span class="speciality">Weight Loss Specialist</span>
                        <div class="trainer-details">
                            <p><i class="fas fa-medal"></i> 8 Years Experience</p>
                            <p><i class="fas fa-certificate"></i> ACE Certified</p>
                            <p><i class="fas fa-heartbeat"></i> Nutrition Expert</p>
                        </div>
                        <a href="booking.html" class="book-btn">Book Session</a>
                        </a>
                    </div>
                </div>

                <!-- Trainer Card 3 -->
                <div class="trainer-card">
                    <div class="trainer-image">
                        <img src="assets/coch/coch 3.png" alt="Mike Wilson">
                        <div class="trainer-social">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="trainer-info">
                        <h3>Mike Wilson</h3>
                        <span class="speciality">CrossFit Coach</span>
                        <div class="trainer-details">
                            <p><i class="fas fa-medal"></i> 12 Years Experience</p>
                            <p><i class="fas fa-certificate"></i> CrossFit Level 3</p>
                            <p><i class="fas fa-running"></i> Athletics Coach</p>
                        </div>
                        <a href="booking.html" class="book-btn">Book Session</a>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Filter Section -->
        <section class="trainer-filters">
            <div class="container">
                <h2>Find Your Perfect Trainer</h2>
                <div class="filter-options">
                    <select id="specialityFilter">
                        <option value="">All Specialities</option>
                        <option value="strength">Strength & Conditioning</option>
                        <option value="weightloss">Weight Loss</option>
                        <option value="crossfit">CrossFit</option>
                        <option value="yoga">Yoga</option>
                    </select>
                    <select id="experienceFilter">
                        <option value="">All Experience Levels</option>
                        <option value="5">5+ Years</option>
                        <option value="10">10+ Years</option>
                        <option value="15">15+ Years</option>
                    </select>
                    <button id="filterButton" class="filter-btn">Apply Filters</button>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer"></footer>
        <div class="footer-container">
            <!-- Logo & About -->
            <div class="footer-column">
                <h3>FitZone <span>Fitness</span></h3>
                <p>Your journey to a healthier lifestyle starts here. Join us and transform your life through fitness.</p>
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
                    <li><a href="#about">About</a></li>
                    <li><a href="#classes">Classes</a></li>
                    <li><a href="#trainers">Trainers</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-column">
                <h4>Contact Us</h4>
                <div class="contact-info">
                    <p><i class="fas fa-map-marker-alt"></i> 123 Fitness Street, NY</p>
                    <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                    <p><i class="fas fa-envelope"></i> info@fitzone.com</p>
                    <p><i class="fas fa-clock"></i> Mon-Sat: 6:00 AM - 10:00 PM</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <span class="current-year">2024</span> FitZone. All rights reserved.</p>
            <p class="developer-credit">Made by <span>HD/CSE/69/03/ASHEN SITHIJA</span></p>
        </div>
    </footer>
   
    <!-- Scripts -->
    <script src="navbar.js"></script>
    <script src="trainers.js"></script>
</body>
</html> 