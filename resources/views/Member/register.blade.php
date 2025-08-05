<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Member - Billiard Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-dark: #0a2463;
            --primary-white: #ffffff;
            --accent-red: #d8315b;
            --light-bg: #f8f9fa;
            --card-light: #ffffff;
            --border-light: #dee2e6;
            --text-dark: #333333;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 40px 0;
        }

        /* Registration Container */
        .registration-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Section */
        .registration-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .registration-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }

        .registration-header p {
            font-size: 1.1rem;
            opacity: 0.8;
            color: var(--text-dark);
        }

        /* Registration Card */
        .registration-card {
            background-color: var(--card-light);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-light);
        }

        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border: 2px solid var(--border-light);
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 0.2rem rgba(10, 36, 99, 0.1);
        }

        /* Photo Upload */
        .photo-upload-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .photo-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid var(--border-light);
            margin: 0 auto 20px;
            overflow: hidden;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .photo-preview:hover {
            border-color: var(--primary-dark);
        }

        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-preview i {
            font-size: 3rem;
            color: var(--border-light);
        }

        .photo-upload-btn {
            background-color: var(--primary-dark);
            color: var(--primary-white);
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .photo-upload-btn:hover {
            background-color: #071a4a;
            transform: translateY(-2px);
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 25px;
        }

        /* Password Strength */
        .password-strength {
            margin-top: 5px;
            height: 5px;
            border-radius: 3px;
            background-color: #e9ecef;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 3px;
        }

        .strength-weak {
            width: 33.33%;
            background-color: var(--accent-red);
        }

        .strength-medium {
            width: 66.66%;
            background-color: #ffc107;
        }

        .strength-strong {
            width: 100%;
            background-color: #28a745;
        }

        /* Submit Button */
        .submit-btn {
            background-color: var(--accent-red);
            color: var(--primary-white);
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #b82a4e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(216, 49, 91, 0.3);
        }

        /* Success Message */
        .success-message {
            background-color: rgba(40, 167, 69, 0.1);
            border: 1px solid #28a745;
            color: #28a745;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .registration-header h1 {
                font-size: 2rem;
            }

            .registration-card {
                padding: 30px 20px;
            }
        }

        /* Loading Spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--primary-white);
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
        }

        /* Register Link */
        .register-section {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid var(--border-light);
        }

        .register-text {
            font-size: 0.9rem;
            color: var(--text-dark);
            margin: 0;
        }

        .register-link {
            color: var(--accent-red);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }


        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .submit-btn.loading .spinner {
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <!-- Header -->
        <div class="registration-header">
            <h1><i class="bi bi-circle-fill me-2" style="color: var(--accent-red);"></i>Registrasi Member</h1>
            <p>Bergabunglah dengan komunitas billiard kami dan nikmati berbagai keuntungan eksklusif</p>
        </div>

        <!-- Registration Card -->
        <div class="registration-card">
            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <i class="bi bi-check-circle-fill me-2"></i>
                <strong>Registrasi Berhasil!</strong> Akun member Anda telah berhasil dibuat. Silakan login untuk mulai
                bermain.
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                @csrf
                <!-- Nama Lengkap -->
                <div class="form-group">
                    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                        placeholder="Masukkan nama lengkap Anda" required>
                    @error('nama_lengkap')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap Anda"
                        required></textarea>
                    @error('alamat')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="form-label">Status Member <span class="text-danger">*</span></label>
                    <select class="form-select" name="status" required>
                        <option value="" selected disabled>Pilih Status Member</option>
                        <option value="pelajar(siswa)">Pelajar (Siswa)</option>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="bekerja">Bekerja</option>
                        <option value="dll">Dll</option>
                    </select>
                    <div class="invalid-feedback">Silakan pilih status member</div>
                </div>


                <!-- No WhatsApp -->
                <div class="form-group">
                    <label for="noWa" class="form-label">No. WhatsApp <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" name="no_wa" id="noWa"
                        placeholder="Contoh: 081234567890" required>
                    @error('no_wa')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="nama@email.com" required>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input class="form-control" type="file" id="image" onchange="previewImage()" id="foto"
                        name="foto" accept="image/*">

                    <img id="img-preview" style="width: 250px;margin-top: 20px">
                    @error('foto')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="password" class="form-control" id="password"
                            placeholder="Masukkan password" required>
                    </div>
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    <span class="btn-text">Daftar Sekarang</span>
                </button>

                <br>

                <!-- Register Link -->
                <div class="register-section">
                    <p class="register-text">
                        Sudah punya akun?
                        <a href="{{ url('login') }}" class="register-link">Login sekarang</a>
                    </p>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');

            const imgPreview = document.querySelector('#img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
</body>

</html>
