<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Billiard Pro - Arena Billiard Premium</title>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

        <link rel="stylesheet" href="{{ asset("FE/css/bootstrap.min.css") }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <style>
            :root {
                --primary-dark: #0a2463;
                --primary-green: #3e92cc;
                --accent-red: #d8315b;
                --light-bg: #f8f9fa;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            /* Navbar Styles */
            .navbar {
                background-color: rgba(10, 36, 99, 0.85) !important;
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            .navbar.navbar-scrolled {
                background-color: rgba(10, 36, 99, 0.95) !important;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.15);
            }

            .navbar-brand {
                font-weight: 700;
                font-size: 1.8rem;
                color: white !important;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            }

            .navbar-nav .nav-link {
                color: rgba(255, 255, 255, 0.95) !important;
                font-weight: 500;
                margin: 0 10px;
                transition: all 0.3s;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            }

            .navbar-nav .nav-link:hover {
                color: var(--primary-green) !important;
                transform: translateY(-2px);
            }

            /* Tambahkan efek glow untuk tombol booking */
            .navbar-nav .btn-primary-custom {
                background-color: var(--accent-red);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 4px 15px rgba(216, 49, 91, 0.3);
            }

            .navbar-nav .btn-primary-custom:hover {
                background-color: #b82a4e;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(216, 49, 91, 0.4);
            }

            /* Hero Section */
            .hero {
                background: linear-gradient(rgba(10, 36, 99, 0.7), rgba(10, 36, 99, 0.8)),
                    url({{ asset("FE/img/banner1.jpg") }}) center/cover;
                color: white;
                padding: 120px 0;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            /* Tambahkan efek partikel billiard */
            .hero::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image:
                    radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.1) 2px, transparent 2px),
                    radial-gradient(circle at 60% 70%, rgba(255, 255, 255, 0.08) 3px, transparent 3px),
                    radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.06) 2px, transparent 2px);
                background-size: 200px 200px, 300px 300px, 250px 250px;
                animation: float 20s infinite linear;
                pointer-events: none;
            }

            @keyframes float {
                0% {
                    transform: translateY(0) translateX(0);
                }

                100% {
                    transform: translateY(-100px) translateX(-50px);
                }
            }

            .hero h1 {
                font-size: 3.5rem;
                font-weight: 700;
                margin-bottom: 20px;
                text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
                position: relative;
                z-index: 1;
            }

            .hero p {
                font-size: 1.3rem;
                max-width: 700px;
                margin: 0 auto 30px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                position: relative;
                z-index: 1;
            }

            .hero .btn-primary-custom {
                position: relative;
                z-index: 1;
                background: linear-gradient(135deg, var(--accent-red), #e74c60);
                border: 2px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 25px rgba(216, 49, 91, 0.4);
            }

            .hero .btn-primary-custom:hover {
                background: linear-gradient(135deg, #b82a4e, var(--accent-red));
                transform: translateY(-3px) scale(1.05);
                box-shadow: 0 12px 35px rgba(216, 49, 91, 0.5);
            }

            /* Tambahkan efek cue stick animation */
            .hero::after {
                content: '';
                position: absolute;
                bottom: -100px;
                right: -100px;
                width: 300px;
                height: 300px;
                background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
                border-radius: 50%;
                animation: pulse 4s ease-in-out infinite;
                pointer-events: none;
            }

            @keyframes pulse {

                0%,
                100% {
                    transform: scale(1);
                    opacity: 0.5;
                }

                50% {
                    transform: scale(1.2);
                    opacity: 0.8;
                }
            }

            .btn-primary-custom {
                background-color: var(--accent-red);
                border: none;
                padding: 12px 30px;
                font-weight: 600;
                border-radius: 50px;
                transition: all 0.3s;
            }

            .btn-primary-custom:hover {
                background-color: #b82a4e;
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(216, 49, 91, 0.3);
            }

            /* Features Section */
            .features {
                padding: 80px 0;
                background-color: var(--light-bg);
            }

            .feature-card {
                border: none;
                border-radius: 15px;
                overflow: hidden;
                transition: all 0.3s;
                height: 100%;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            }

            .feature-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            }

            .feature-icon {
                font-size: 3rem;
                color: var(--primary-green);
                margin-bottom: 20px;
            }

            /* Tables Section */
            .tables {
                padding: 80px 0;
            }

            .table-card {
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
                transition: all 0.3s;
                margin-bottom: 30px;
            }

            .table-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            }

            .table-card img {
                height: 200px;
                object-fit: cover;
                width: 100%;
            }

            .price-tag {
                background-color: var(--accent-red);
                color: white;
                padding: 8px 15px;
                border-radius: 20px;
                font-weight: 600;
                display: inline-block;
                margin-top: 10px;
            }

            /* Gallery Section */
            .gallery {
                padding: 80px 0;
                background-color: var(--light-bg);
            }

            .gallery-item {
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                transition: all 0.3s;
            }

            .gallery-item:hover {
                transform: scale(1.03);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            }

            .gallery-item img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                transition: all 0.5s;
            }

            .gallery-item:hover img {
                transform: scale(1.1);
            }

            /* Testimonials */
            .testimonials {
                padding: 80px 0;
                background-color: var(--primary-dark);
                color: white;
            }

            .testimonial-card {
                background-color: rgba(255, 255, 255, 0.1);
                border-radius: 15px;
                padding: 30px;
                margin-bottom: 20px;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .testimonial-card .quote {
                font-size: 1.2rem;
                font-style: italic;
                margin-bottom: 20px;
            }

            .testimonial-card .author {
                font-weight: 600;
                color: var(--primary-green);
            }

            /* Footer */
            footer {
                background-color: #081833;
                color: white;
                padding: 60px 0 30px;
            }

            .footer-brand {
                font-size: 1.8rem;
                font-weight: 700;
                margin-bottom: 20px;
            }

            .social-icons a {
                color: white;
                font-size: 1.5rem;
                margin-right: 15px;
                transition: all 0.3s;
            }

            .social-icons a:hover {
                color: var(--primary-green);
                transform: translateY(-3px);
            }

            /* Logo Styles */
            .logo-nav {
                height: 40px;
                width: auto;
                /* filter: brightness(0) invert(1); Untuk membuat logo putih di navbar gelap */
                transition: all 0.3s ease;
            }

            .logo-hero {
                height: 200px;
                width: auto;
                /* filter: brightness(0) invert(1); Untuk membuat logo putih di hero */
                opacity: 0.9;
                animation: logoFloat 3s ease-in-out infinite;
            }

            /* Efek hover untuk logo di navbar */
            .navbar-brand:hover .logo-nav {
                transform: scale(1.1);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2.5rem;
                }

                .hero p {
                    font-size: 1.1rem;
                }
            }

            /* Responsive logo sizes */
            @media (max-width: 768px) {
                .logo-nav {
                    height: 30px;
                }

                .logo-hero {
                    height: 140px;
                }
            }
        </style>
    </head>

    <body>

        @include("Member.Partials.navbar")

        @yield("container")

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-brand">
                            <i class="bi bi-circle-fill me-2" style="color: var(--accent-red);"></i>Home Billiard
                        </div>
                        <p>Arena billiard premium dengan fasilitas terbaik untuk pengalaman bermain yang tak terlupakan.
                        </p>
                        <div class="social-icons mt-3">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5 class="mb-4">Jam Operasional</h5>
                        <p><strong>Senin - Jumat:</strong> 10:00 - 24:00</p>
                        <p><strong>Sabtu - Minggu:</strong> 10:00 - 02:00</p>
                        <p><strong>Hari Libur:</strong> 10:00 - 24:00</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="mb-4">Kontak Kami</h5>
                        <p><i class="bi bi-geo-alt me-2"></i>Jl. Billiard No. 123, Jakarta</p>
                        <p><i class="bi bi-telephone me-2"></i>(021) 1234-5678</p>
                        <p><i class="bi bi-envelope me-2"></i>info@billiardpro.com</p>
                    </div>
                </div>
                <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
                <div class="text-center">
                    <p>&copy; 2025 Home Billiard. All rights reserved.</p>
                </div>
            </div>
        </footer>

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

        <script src="{{ asset("FE/js/bootstrap.bundle.min.js") }}"></script>

        <script>
            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all sections
            document.querySelectorAll('section').forEach(section => {
                section.style.opacity = 0;
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(section);
            });
            // Tambahkan script ini di bagian bawah sebelum penutup body

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all sections
            document.querySelectorAll('section').forEach(section => {
                section.style.opacity = 0;
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(section);
            });
        </script>
    </body>

</html>
