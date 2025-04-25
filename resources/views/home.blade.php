<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>My Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJx3qD/JfJW9v5mu8mrFJ3u3V6d1h6qos1B6ecX5ZhJflZh1F5g5tXKqP5QI" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <style>
        html {
            overscroll-behavior: none; /* Prevents overscroll */
        }

        body {
            margin: 0;
            min-height: 100vh;
            overscroll-behavior: none; /* Prevents overscroll */
        }

        /* Your existing styles */
        .hero {
            background: url('https://via.placeholder.com/1500x500') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
        .hero h1 {
            font-size: 3rem;
        }
        .project-card {
            border-radius: 10px;
            overflow: hidden;
        }
        .social-links a {
            color: #fff;
            margin: 0 10px;
            font-size: 1.5rem;
        }
        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    @include('partials.header')
    
    <!-- Main content wrapper -->
    <main>
        <!-- Hero Section -->
        @include('partials.hero')
        <!-- Projects Section -->
        @include('partials.projects')
        <!-- Skills Section -->
        @include('partials.skills')
        <!-- Experience Section -->
        @include('partials.experience')
        <!-- Education Section -->
        @include('partials.education')
    </main>
    
    <!-- Footer Section -->
    @include('partials.footer')

    <button id="back-to-top" class="back-to-top-btn" aria-label="Back to top">
    <i class="fas fa-arrow-up"></i>
</button>

<style>
/* Back to Top Button Styles */
.back-to-top-btn {
    position: fixed;
    bottom: 30px;
    left: 30px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #FFD700;
    color: #1a1a1a;
    border: none;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    transition: all 0.3s ease;
}

.back-to-top-btn.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.back-to-top-btn:hover {
    background-color: #ffea8a;
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.back-to-top-btn i {
    font-size: 1.2rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .back-to-top-btn {
        bottom: 20px;
        left: 20px;
        width: 45px;
        height: 45px;
    }
}
</style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.nav-links a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            window.scrollTo({
                top: target.offsetTop - 50, // Adjust offset for fixed header
                behavior: 'smooth'
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const backToTopBtn = document.getElementById('back-to-top');
    
    // Show button when user scrolls down 300px from the top
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });
    
    // Scroll to top when button is clicked
    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
    </script>
</body>
</html>