<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Task Manager</title>
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
            max-width: 420px;
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

        .btn-primary-custom {
            background: linear-gradient(135deg, #343a40, #495057);
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            color: white !important;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(52, 58, 64, 0.3);
            background: linear-gradient(135deg, #495057, #6c757d);
            color: white !important;
        }

        .auth-link {
            color: #343a40;
            text-decoration: none;
            font-weight: 500;
        }

        .auth-link:hover {
            color: #495057;
        }

        .form-label {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        .invalid-feedback {
            display: block;
            font-size: 0.875rem;
        }

        .alert {
            border: none;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .text-muted {
            color: #6c757d !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-container">
                    <div class="auth-header">
                        <i class="bi bi-person-plus-fill mb-3" style="font-size: 3rem;"></i>
                        <h3 class="fw-bold mb-0">Create Account</h3>
                        <p class="mb-0 opacity-75">Join Task Manager today</p>
                    </div>

                    <div class="auth-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name') }}" required
                                       placeholder="Enter your full name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}" required
                                       placeholder="Enter your email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" required
                                       placeholder="Enter your password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control"
                                       id="password_confirmation" name="password_confirmation" required
                                       placeholder="Confirm your password">
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="bi bi-rocket-takeoff me-2"></i>Create Account
                                </button>
                            </div>
                        </form>

                        <div class="text-center">
                            <div class="row">
                                <div class="col-6 text-start">
                                    <a href="{{ route('welcome') }}" class="auth-link">
                                        <i class="bi bi-arrow-left me-1"></i>Back to Home
                                    </a>
                                </div>
                                <div class="col-6 text-end">
                                    <span class="text-muted">Already have an account?</span><br>
                                    <a href="{{ route('login') }}" class="auth-link">Sign in here</a>
                                </div>
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
