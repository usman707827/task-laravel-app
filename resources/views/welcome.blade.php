<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager - Organize Your Life</title>
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
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #343a40 0%, #495057 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff" fill-opacity="0.05" points="0,0 1000,300 1000,1000 0,700"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .feature-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 4rem;
            height: 4rem;
            background: linear-gradient(135deg, #343a40, #495057);
            color: white;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #343a40, #495057);
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            color: white !important;
            text-decoration: none;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(52, 58, 64, 0.3);
            background: linear-gradient(135deg, #495057, #6c757d);
            color: white !important;
        }

        .btn-outline-custom {
            border: 2px solid white;
            color: white;
            border-radius: 0.75rem;
            padding: 0.75rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            background: transparent;
        }

        .btn-outline-custom:hover {
            background: white;
            color: #343a40;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(255, 255, 255, 0.3);
        }

        .stats-section {
            background: white;
            padding: 4rem 0;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #343a40;
            display: block;
        }

        .stat-label {
            color: #6c757d;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .navbar-brand-custom {
            font-weight: 700;
            color: #343a40 !important;
            font-size: 1.5rem;
        }

        .features-section {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        @media (max-width: 768px) {
            .hero-section {
                text-align: center;
            }

            .stat-number {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom" href="{{ route('welcome') }}">
                <i class="bi bi-check2-square me-2"></i>Task Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-dark fw-medium me-3" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-primary-custom" href="{{ route('register') }}">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="display-4 fw-bold mb-4">
                        Organize Your Life with <span class="text-warning">Task Manager</span>
                    </h1>
                    <p class="lead mb-5">
                        Take control of your productivity with our intuitive task management system.
                        Create, organize, and track your tasks efficiently.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary-custom btn-lg">
                            <i class="bi bi-rocket-takeoff me-2"></i>Start Free Today
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-custom btn-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="text-center">
                        <div class="bg-white rounded-3 p-4 shadow-lg" style="max-width: 400px; margin: 0 auto;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success rounded-circle p-2 me-3">
                                    <i class="bi bi-check-lg text-white"></i>
                                </div>
                                <div class="text-start">
                                    <h6 class="mb-0 text-dark">Complete Project Proposal</h6>
                                    <small class="text-muted">Due: Today</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning rounded-circle p-2 me-3">
                                    <i class="bi bi-clock text-white"></i>
                                </div>
                                <div class="text-start">
                                    <h6 class="mb-0 text-dark">Review Design Files</h6>
                                    <small class="text-muted">Due: Tomorrow</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="bg-info rounded-circle p-2 me-3">
                                    <i class="bi bi-play text-white"></i>
                                </div>
                                <div class="text-start">
                                    <h6 class="mb-0 text-dark">Team Meeting</h6>
                                    <small class="text-muted">Due: Friday</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-5 fw-bold text-dark mb-3">Why Choose Task Manager?</h2>
                    <p class="lead text-muted">Powerful features to boost your productivity</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-3">Easy Task Management</h5>
                        <p class="text-muted">Create, edit, and organize your tasks with our intuitive interface. Set due dates, priorities, and track progress effortlessly.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-3">Progress Tracking</h5>
                        <p class="text-muted">Monitor your productivity with detailed analytics and progress reports. See how much you've accomplished over time.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-3">Secure & Private</h5>
                        <p class="text-muted">Your data is safe with us. Enjoy private workspaces and secure authentication to keep your tasks confidential.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-card">
                        <span class="stat-number">10K+</span>
                        <span class="stat-label">Active Users</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <span class="stat-number">50K+</span>
                        <span class="stat-label">Tasks Completed</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <span class="stat-number">99.9%</span>
                        <span class="stat-label">Uptime</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="hero-section" style="min-height: 50vh;">
        <div class="container text-center">
            <div class="hero-content">
                <h2 class="display-5 fw-bold mb-4">Ready to Get Organized?</h2>
                <p class="lead mb-5">Join thousands of users who are already boosting their productivity</p>
                <a href="{{ route('register') }}" class="btn btn-primary-custom btn-lg">
                    <i class="bi bi-person-plus me-2"></i>Create Free Account
                </a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
