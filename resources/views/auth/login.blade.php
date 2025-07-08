<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: "Noto Sans", sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }

        .auth-container {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(52, 58, 64, 0.15);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
            margin: 2rem 0;
        }

        .auth-header {
            background: linear-gradient(135deg, #343a40, #495057);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .auth-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #dee2e6;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #343a40;
            box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #343a40, #495057);
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white !important;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(52, 58, 64, 0.3);
            background: linear-gradient(135deg, #495057, #6c757d);
        }

        .form-label {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        .auth-footer {
            background: #f8f9fa;
            padding: 1rem 2rem;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }

        .auth-footer a {
            color: #343a40;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-footer a:hover {
            color: #495057;
        }

        .text-danger {
            font-size: 0.875rem;
        }

        .form-check-input:checked {
            background-color: #343a40;
            border-color: #343a40;
        }

        .form-check-label {
            font-weight: 500;
            color: #495057;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="auth-container">
                <div class="auth-header">
                    <i class="bi bi-shield-check fs-1 mb-3"></i>
                    <h3 class="fw-bold mb-0">Welcome Back!</h3>
                    <p class="mb-0 opacity-75">Sign in to your account</p>
                </div>
                <div class="auth-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Enter your password" required>
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember me</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>
                        </div>
                    </form>
                </div>
                <div class="auth-footer">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('welcome') }}" class="text-decoration-none">
                                <i class="bi bi-arrow-left me-1"></i>Back to Home
                            </a>
                        </div>
                        <div class="col-6 text-end">
                            <span class="text-muted">Don't have an account?</span><br>
                            <a href="{{ route('register') }}">Create one here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
