class GymWebsiteController {
    constructor() {
        this.init();
    }

    init() {
        this.initializeVariables();
        this.setupEventListeners();
        this.setupScrollSpy();
        this.setupMobileMenu();
        this.setupAnimations();
        this.setActiveNavLink();
    }

    initializeVariables() {
        this.header = document.querySelector('header');
        this.navLinks = document.querySelectorAll('.nav-link');
        this.sections = document.querySelectorAll('section');
        this.mobileMenuBtn = document.querySelector('.menu-btn');
        this.nav = document.querySelector('nav');
        this.lastScroll = 0;
        this.isScrolling = false;
    }

    setupEventListeners() {
        // Smooth scroll for navigation links
        this.navLinks.forEach(link => {
            link.addEventListener('click', (e) => this.handleNavClick(e));
        });

        // Scroll events
        window.addEventListener('scroll', () => this.handleScroll());

        // Resize event
        window.addEventListener('resize', () => this.handleResize());

        // Handle initial hash in URL
        if (window.location.hash) {
            this.scrollToSection(window.location.hash);
        }

        // Add navigation button click handlers
        const navButtons = document.querySelectorAll('.nav-buttons a, .mobile-nav-buttons a');
        navButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                // Only handle external page links (not anchor links)
                if (!e.target.getAttribute('href').startsWith('#')) {
                    e.preventDefault();
                    this.handleNavigation(e.target.href);
                }
            });
        });
    }

    handleNavClick(e) {
        e.preventDefault();
        const targetId = e.currentTarget.getAttribute('href');
        this.scrollToSection(targetId);

        // Add click animation to nav link
        e.currentTarget.classList.add('clicked');
        setTimeout(() => {
            e.currentTarget.classList.remove('clicked');
        }, 300);

        // Close mobile menu if open
        if (window.innerWidth <= 768) {
            this.nav.classList.remove('active');
        }
    }

    scrollToSection(targetId) {
        const targetSection = document.querySelector(targetId);
        if (targetSection) {
            const headerOffset = this.header.offsetHeight;
            const targetPosition = targetSection.offsetTop - headerOffset;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });

            // Update URL without jump
            history.pushState(null, null, targetId);

            // Add entrance animation to section
            this.animateSection(targetSection);
        }
    }

    setupScrollSpy() {
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const currentId = entry.target.getAttribute('id');
                    this.updateActiveLink(currentId);
                }
            });
        }, {
            threshold: 0.5,
            rootMargin: `-${this.header.offsetHeight}px 0px 0px 0px`
        });

        this.sections.forEach(section => {
            this.observer.observe(section);
        });
    }

    updateActiveLink(currentId) {
        this.navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${currentId}`) {
                link.classList.add('active');
                this.addNeonEffect(link);
            }
        });
    }

    handleScroll() {
        if (!this.isScrolling) {
            window.requestAnimationFrame(() => {
                this.toggleHeaderVisibility();
                this.animateOnScroll();
                this.isScrolling = false;
            });
            this.isScrolling = true;
        }
    }

    toggleHeaderVisibility() {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > this.lastScroll && currentScroll > this.header.offsetHeight) {
            // Scrolling down
            this.header.classList.add('header-hidden');
        } else {
            // Scrolling up
            this.header.classList.remove('header-hidden');
        }

        this.lastScroll = currentScroll;
    }

    setupMobileMenu() {
        if (this.mobileMenuBtn) {
            this.mobileMenuBtn.addEventListener('click', () => {
                this.nav.classList.toggle('active');
                this.mobileMenuBtn.classList.toggle('active');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('nav') && !e.target.closest('.menu-btn')) {
                    this.nav.classList.remove('active');
                    this.mobileMenuBtn.classList.remove('active');
                }
            });
        }
    }

    setupAnimations() {
        // Animate sections on scroll
        const animateElements = document.querySelectorAll('.animate-on-scroll');
        
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const appearOnScroll = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    appearOnScroll.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animateElements.forEach(element => {
            appearOnScroll.observe(element);
        });
    }

    animateSection(section) {
        section.classList.add('section-animate');
        setTimeout(() => {
            section.classList.remove('section-animate');
        }, 1000);
    }

    addNeonEffect(element) {
        element.classList.add('neon-pulse');
        setTimeout(() => {
            element.classList.remove('neon-pulse');
        }, 1000);
    }

    handleResize() {
        if (window.innerWidth > 768) {
            this.nav.classList.remove('active');
            if (this.mobileMenuBtn) {
                this.mobileMenuBtn.classList.remove('active');
            }
        }
    }

    animateOnScroll() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementBottom = element.getBoundingClientRect().bottom;
            const isVisible = (elementTop < window.innerHeight) && (elementBottom >= 0);
            
            if (isVisible) {
                element.classList.add('animated');
            }
        });
    }

    setActiveNavLink() {
        const currentPage = window.location.pathname.split('/').pop();
        const navButtons = document.querySelectorAll('.nav-buttons a, .mobile-nav-buttons a');
        
        navButtons.forEach(button => {
            const linkPage = button.getAttribute('href');
            // Remove any existing active classes
            button.classList.remove('active');
            
            // Check if this is the current page
            if (linkPage === currentPage) {
                button.classList.add('active');
                
                // Add animation effect
                this.addNeonEffect(button);
            }
        });

        // Handle special case for home page
        if (currentPage === '' || currentPage === 'index.html') {
            const homeButton = document.querySelector('.nav-buttons a[href="index.html"]');
            if (homeButton) {
                homeButton.classList.add('active');
                this.addNeonEffect(homeButton);
            }
        }
    }

    handleNavigation(href) {
        // Add transition effect
        const transition = document.createElement('div');
        transition.className = 'page-transition';
        document.body.appendChild(transition);

        // Trigger transition
        setTimeout(() => {
            transition.classList.add('active');
        }, 10);

        // Navigate to new page
        setTimeout(() => {
            window.location.href = href;
        }, 500);
    }
}

class AboutSection {
    constructor() {
        this.initializeVariables();
        this.setupAnimations();
        this.setupCounters();
    }

    initializeVariables() {
        this.aboutSection = document.querySelector('.about-section');
        this.features = document.querySelectorAll('.feature');
        this.experienceBadge = document.querySelector('.experience-badge .years');
        this.aboutImage = document.querySelector('.about-image img');
    }

    setupAnimations() {
        // Animate features on scroll
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        };

        const featureObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Add staggered animation delay
                    setTimeout(() => {
                        entry.target.classList.add('feature-animated');
                    }, index * 200);
                    featureObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        this.features.forEach(feature => {
            feature.classList.add('feature-animate');
            featureObserver.observe(feature);
        });

        // Animate about image
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('image-animated');
                    imageObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        if (this.aboutImage) {
            this.aboutImage.classList.add('image-animate');
            imageObserver.observe(this.aboutImage);
        }
    }

    setupCounters() {
        if (this.experienceBadge) {
            const targetNumber = parseInt(this.experienceBadge.textContent);
            let currentNumber = 0;

            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.animateCounter(currentNumber, targetNumber);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            counterObserver.observe(this.experienceBadge);
        }
    }

    animateCounter(current, target) {
        const increment = Math.ceil(target / 30); // Adjust speed of counting
        const interval = setInterval(() => {
            current += increment;
            if (current >= target) {
                this.experienceBadge.textContent = target + '+';
                clearInterval(interval);
            } else {
                this.experienceBadge.textContent = current;
            }
        }, 50);
    }
}

class PricingSection {
    constructor() {
        this.initializeVariables();
        this.setupEventListeners();
        this.setupAnimations();
    }

    initializeVariables() {
        this.billingToggle = document.getElementById('billing-toggle');
        this.pricingCards = document.querySelectorAll('.pricing-card');
    }

    setupEventListeners() {
        if (this.billingToggle) {
            this.billingToggle.addEventListener('change', () => {
                document.body.classList.toggle('yearly-billing');
            });
        }
    }

    setupAnimations() {
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        };

        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('card-animated');
                    }, index * 200);
                    cardObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        this.pricingCards.forEach(card => {
            card.classList.add('card-animate');
            cardObserver.observe(card);
        });
    }
}

class ReviewSlider {
    constructor() {
        this.initializeVariables();
        this.setupSlider();
        this.setupEventListeners();
        this.setupAnimations();
        this.updateDots();
        this.startAutoPlay();
    }

    initializeVariables() {
        this.slider = document.querySelector('.reviews-track');
        this.slides = document.querySelectorAll('.review-card');
        this.prevBtn = document.querySelector('.prev-btn');
        this.nextBtn = document.querySelector('.next-btn');
        this.dotsContainer = document.querySelector('.review-dots');
        
        this.currentSlide = 0;
        this.slideWidth = 0;
        this.slidesPerView = 3;
        this.autoPlayInterval = null;
        this.autoPlayDelay = 5000; // 5 seconds

        this.updateSlidesPerView();
    }

    setupSlider() {
        // Create dots
        this.slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            dot.addEventListener('click', () => this.goToSlide(index));
            this.dotsContainer.appendChild(dot);
        });

        // Set initial position
        this.updateSlideWidth();
        this.updateSliderPosition();
    }

    setupEventListeners() {
        // Button clicks
        this.prevBtn.addEventListener('click', () => this.prevSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());

        // Touch events
        let touchStartX = 0;
        let touchEndX = 0;

        this.slider.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].clientX;
        });

        this.slider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].clientX;
            if (touchStartX - touchEndX > 50) {
                this.nextSlide();
            } else if (touchEndX - touchStartX > 50) {
                this.prevSlide();
            }
        });

        // Window resize
        window.addEventListener('resize', () => {
            this.updateSlidesPerView();
            this.updateSlideWidth();
            this.updateSliderPosition();
        });

        // Mouse enter/leave for autoplay
        const sliderContainer = document.querySelector('.review-slider');
        sliderContainer.addEventListener('mouseenter', () => this.pauseAutoPlay());
        sliderContainer.addEventListener('mouseleave', () => this.startAutoPlay());
    }

    updateSlidesPerView() {
        if (window.innerWidth <= 768) {
            this.slidesPerView = 1;
        } else if (window.innerWidth <= 1024) {
            this.slidesPerView = 2;
        } else {
            this.slidesPerView = 3;
        }
    }

    updateSlideWidth() {
        const containerWidth = this.slider.parentElement.offsetWidth;
        this.slideWidth = containerWidth / this.slidesPerView;
        this.slides.forEach(slide => {
            slide.style.minWidth = `${this.slideWidth}px`;
        });
    }

    updateSliderPosition() {
        const position = -this.currentSlide * this.slideWidth;
        this.slider.style.transform = `translateX(${position}px)`;
    }

    prevSlide() {
        this.currentSlide = Math.max(this.currentSlide - 1, 0);
        this.updateSliderPosition();
        this.updateDots();
    }

    nextSlide() {
        const maxSlide = this.slides.length - this.slidesPerView;
        this.currentSlide = Math.min(this.currentSlide + 1, maxSlide);
        this.updateSliderPosition();
        this.updateDots();
    }

    goToSlide(index) {
        this.currentSlide = Math.min(index, this.slides.length - this.slidesPerView);
        this.updateSliderPosition();
        this.updateDots();
    }

    updateDots() {
        const dots = this.dotsContainer.querySelectorAll('.dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentSlide);
        });
    }

    startAutoPlay() {
        if (this.autoPlayInterval) return;
        this.autoPlayInterval = setInterval(() => {
            if (this.currentSlide >= this.slides.length - this.slidesPerView) {
                this.currentSlide = 0;
            } else {
                this.currentSlide++;
            }
            this.updateSliderPosition();
            this.updateDots();
        }, this.autoPlayDelay);
    }

    pauseAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }

    setupAnimations() {
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        };

        const reviewObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('review-card-animated');
                    }, index * 200);
                    reviewObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        this.slides.forEach(slide => {
            slide.classList.add('review-card-animate');
            reviewObserver.observe(slide);
        });
    }
}

class Footer {
    constructor() {
        this.updateCurrentYear();
        this.setupAnimations();
    }

    updateCurrentYear() {
        const yearElement = document.querySelector('.current-year');
        if (yearElement) {
            yearElement.textContent = new Date().getFullYear();
        }
    }

    setupAnimations() {
        const footerColumns = document.querySelectorAll('.footer-column');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 200);
                }
            });
        }, {
            threshold: 0.1
        });

        footerColumns.forEach(column => {
            column.style.opacity = '0';
            column.style.transform = 'translateY(20px)';
            column.style.transition = 'all 0.5s ease';
            observer.observe(column);
        });
    }
}

class NavBar {
    constructor() {
        this.init();
    }

    init() {
        this.setupNavigation();
        this.setupMobileMenu();
    }

    setupNavigation() {
        // Handle navigation link clicks
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const section = link.getAttribute('data-section');
                document.getElementById(section).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Handle login button click
        const loginBtn = document.querySelector('.join-btn');
        if (loginBtn) {
            loginBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleNavigation('login.html');
            });
        }
    }

    handleNavigation(href) {
        // Add transition effect
        const transition = document.createElement('div');
        transition.className = 'page-transition';
        document.body.appendChild(transition);

        // Trigger transition
        setTimeout(() => {
            transition.classList.add('active');
        }, 10);

        // Navigate to new page
        setTimeout(() => {
            window.location.href = href;
        }, 500);
    }

    setupMobileMenu() {
        const hamburger = document.querySelector('.hamburger');
        const mobileMenu = document.querySelector('.mobile-menu');

        if (hamburger && mobileMenu) {
            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('active');
                mobileMenu.classList.toggle('active');
            });

            // Close mobile menu when clicking a link
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    hamburger.classList.remove('active');
                    mobileMenu.classList.remove('active');
                });
            });
        }
    }
}

class LoginModal {
    constructor() {
        this.modal = document.getElementById('loginModal');
        this.loginBtn = document.querySelector('.join-btn'); // Update this selector based on your login button class
        this.closeBtn = document.querySelector('.close-btn');
        this.form = document.getElementById('loginForm');
        this.togglePassword = document.querySelector('.toggle-password');
        
        this.initializeEventListeners();
    }

    initializeEventListeners() {
        // Open modal
        this.loginBtn.addEventListener('click', (e) => {
            e.preventDefault();
            this.openModal();
        });

        // Close modal
        this.closeBtn.addEventListener('click', () => this.closeModal());
        window.addEventListener('click', (e) => {
            if (e.target === this.modal) this.closeModal();
        });

        // Handle form submission
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));

        // Toggle password visibility
        this.togglePassword.addEventListener('click', () => this.togglePasswordVisibility());

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.modal.classList.contains('show')) {
                this.closeModal();
            }
        });
    }

    openModal() {
        this.modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    closeModal() {
        this.modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        
        // Toggle eye icon
        this.togglePassword.classList.toggle('fa-eye');
        this.togglePassword.classList.toggle('fa-eye-slash');
    }

    handleSubmit(e) {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const rememberMe = document.getElementById('rememberMe').checked;

        // Here you would typically send this data to your server
        console.log('Login attempt:', { email, password, rememberMe });

        // For demo purposes, show success message
        this.showNotification('Login successful!', 'success');
        
        // Close modal after short delay
        setTimeout(() => this.closeModal(), 1500);
    }

    showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.innerHTML = `
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
            <span>${message}</span>
        `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => notification.classList.add('show'), 10);

        // Remove after delay
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new GymWebsiteController();
    new AboutSection();
    new PricingSection();
    new ReviewSlider();
    new Footer();
    new NavBar();
    new LoginModal();
}); 