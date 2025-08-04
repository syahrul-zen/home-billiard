@extends('Member.Layouts.main')

@section('container')
        <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-logo">
                <img src="{{ asset('FE/img/logo.png') }}" alt="Billiard Pro Logo" class="logo-hero">
            </div>
            <h1>Arena Billiard Premium</h1>
            <p>Nikmati pengalaman bermain billiard terbaik dengan fasilitas modern dan lingkungan yang nyaman</p>
            <a href="#booking" class="btn btn-primary-custom btn-lg">Pesan Meja Sekarang</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Fasilitas Unggulan</h2>
                <p class="lead">Kami menyediakan fasilitas terbaik untuk pengalaman bermain billiard yang tak terlupakan</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-table"></i>
                        </div>
                        <h4>Meja Billiard Profesional</h4>
                        <p>Meja billiard standar internasional dengan permukaan terbaik untuk pengalaman bermain yang sempurna</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-cup-straw"></i>
                        </div>
                        <h4>Bar & Resto</h4>
                        <p>Nikmati berbagai pilihan makanan dan minuman lezat sambil menunggu giliran bermain</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <h4>Turnamen Reguler</h4>
                        <p>Ikuti turnamen billiard reguler dengan hadiah menarik dan kesempatan menjadi juara</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tables Section -->
    <section class="tables" id="tables">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Pilihan Meja Billiard</h2>
                <p class="lead">Pilih meja sesuai kebutuhan dan budget Anda</p>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="table-card">
                        <img src="https://images.unsplash.com/photo-1686523090965-8d570b6cf68e?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Meja Standar">
                        <div class="p-4">
                            <h4>Meja Standar</h4>
                            <p>Meja billiard ukuran 7 feet dengan kualitas baik untuk pemula dan pemain kasual</p>
                            <a href="{{ url('booking-table1') }}"><span class="price-tag">Rp 50.000/jam</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-card">
                        <img src="https://images.unsplash.com/photo-1714564787997-112565b05c2c?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Meja Premium">
                        <div class="p-4">
                            <h4>Meja Premium</h4>
                            <p>Meja billiard ukuran 8 feet dengan permukaan mahoni untuk pemain intermediate</p>
                            <span class="price-tag">Rp 75.000/jam</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-card">
                        <img src="https://media.istockphoto.com/id/1297619671/id/foto/tabel-snooker.jpg?s=2048x2048&w=is&k=20&c=vpIt1laGQ98dxXC6v9Gc3mrwrl70AzbcCm4wNLZRIqY=" alt="Meja VIP">
                        <div class="p-4">
                            <h4>Meja VIP</h4>
                            <p>Meja billiard ukuran 9 feet standar turnamen dengan fasilitas lengkap</p>
                            <span class="price-tag">Rp 100.000/jam</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-card">
                        <img src="https://images.unsplash.com/photo-1686523090965-8d570b6cf68e?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Meja Standar">
                        <div class="p-4">
                            <h4>Meja Standar</h4>
                            <p>Meja billiard ukuran 7 feet dengan kualitas baik untuk pemula dan pemain kasual</p>
                            <span class="price-tag">Rp 50.000/jam</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-card">
                        <img src="https://images.unsplash.com/photo-1714564787997-112565b05c2c?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Meja Premium">
                        <div class="p-4">
                            <h4>Meja Premium</h4>
                            <p>Meja billiard ukuran 8 feet dengan permukaan mahoni untuk pemain intermediate</p>
                            <span class="price-tag">Rp 75.000/jam</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-card">
                        <img src="https://media.istockphoto.com/id/1297619671/id/foto/tabel-snooker.jpg?s=2048x2048&w=is&k=20&c=vpIt1laGQ98dxXC6v9Gc3mrwrl70AzbcCm4wNLZRIqY=" alt="Meja VIP">
                        <div class="p-4">
                            <h4>Meja VIP</h4>
                            <p>Meja billiard ukuran 9 feet standar turnamen dengan fasilitas lengkap</p>
                            <span class="price-tag">Rp 100.000/jam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Galeri Kami</h2>
                <p class="lead">Lihat suasana dan fasilitas di arena billiard kami</p>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1596209935536-1a8119c4a5b8?ixlib=rb-4.0.3" alt="Gallery 1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1544383885-9e1f1a9b3c5b?ixlib=rb-4.0.3" alt="Gallery 2">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1596209935536-1a8119c4a5b8?ixlib=rb-4.0.3" alt="Gallery 3">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1544383885-9e1f1a9b3c5b?ixlib=rb-4.0.3" alt="Gallery 4">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1596209935536-1a8119c4a5b8?ixlib=rb-4.0.3" alt="Gallery 5">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1544383885-9e1f1a9b3c5b?ixlib=rb-4.0.3" alt="Gallery 6">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Apa Kata Mereka</h2>
                <p class="lead">Testimoni dari pelanggan setia kami</p>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="quote">"Tempat billiard terbaik di kota! Meja-mejanya berkualitas dan pelayanannya ramah."</div>
                        <div class="author">- Budi Santoso</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="quote">"Sering main di sini karena suasananya nyaman dan ada banyak pilihan meja."</div>
                        <div class="author">- Siti Rahayu</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="quote">"Turnamennya seru! Sudah beberapa kali ikutan dan selalu dapat pengalaman baru."</div>
                        <div class="author">- Ahmad Fauzi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection