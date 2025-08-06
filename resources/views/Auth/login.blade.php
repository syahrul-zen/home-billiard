<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Billiard Pro</title>
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
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        /* Login Container */
        .login-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        /* Login Card */
        .login-card {
            background-color: var(--card-light);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-light);
        }

        /* Header Section */
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }

        .login-header p {
            font-size: 1rem;
            opacity: 0.8;
            color: var(--text-dark);
            margin: 0;
        }

        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid var(--border-light);
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 0.2rem rgba(10, 36, 99, 0.1);
        }

        /* Remember Me & Forgot Password */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .form-check {
            margin-bottom: 0;
        }

        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            border: 2px solid var(--border-light);
            margin-top: 0.25em;
        }

        .form-check-input:checked {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .form-check-label {
            font-size: 0.9rem;
            color: var(--text-dark);
            cursor: pointer;
        }

        .forgot-password {
            font-size: 0.9rem;
            color: var(--primary-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--accent-red);
            text-decoration: underline;
        }

        /* Login Button */
        .login-btn {
            background-color: var(--accent-red);
            color: var(--primary-white);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 25px;
        }

        .login-btn:hover {
            background-color: #b82a4e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(216, 49, 91, 0.3);
        }

        /* Divider */
        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: var(--border-light);
        }

        .divider span {
            background-color: var(--card-light);
            padding: 0 15px;
            position: relative;
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* Social Login */
        .social-login {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .social-btn {
            flex: 1;
            padding: 10px;
            border: 2px solid var(--border-light);
            border-radius: 10px;
            background-color: transparent;
            color: var(--text-dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .social-btn:hover {
            border-color: var(--primary-dark);
            background-color: rgba(10, 36, 99, 0.05);
            transform: translateY(-2px);
        }

        .social-btn i {
            font-size: 1.2rem;
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

        /* Responsive */
        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px;
            }

            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .social-login {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Login Card -->
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <h1><i class="bi bi-circle-fill me-2" style="color: var(--accent-red);"></i>Billiard Pro</h1>
                <p>Silakan login untuk melanjutkan</p>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger" role="alert">
                    {{ session('loginError') }}
                </div>
            @endif

            <!-- Login Form -->
            <form action="login" method="POST">
                @csrf
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" 
                        placeholder="nama@email.com" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan password" required>
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-btn">Login</button>
            </form>

            <!-- Register Link -->
            <div class="register-section">
                <p class="register-text">
                    Belum punya akun?
                    <a href="{{ url('register') }}" class="register-link">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
