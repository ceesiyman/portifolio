<section id="education" class="education py-5">
    <div class="container">
        <h2 class="text-center mb-8 text-white">Education</h2>
        <div class="education-container">
            @foreach($educations as $education)
            <div class="education-item">
                <div class="education-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="education-content">
                    <h4 class="institution">{{ $education->institution }}</h4>
                    <h5 class="degree">{{ $education->degree }}</h5>
                    <p class="year">{{ $education->start_year }} - {{ $education->end_year ?? 'Present' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.education {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    padding: 4rem 0;
}

.education h2.text-center {
    margin-bottom: 3rem !important;
    color: #FFD700;
    font-weight: bold;
}

.education-container {
    background: #292929;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.education-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(255, 215, 0, 0.3);
}

.education-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 25px;
    padding-bottom: 25px;
    border-bottom: 1px solid #3d3d3d;
}

.education-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.education-icon {
    min-width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #FFD700, #FFA500);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 20px;
    color: #000;
    font-size: 20px;
}

.education-content {
    flex-grow: 1;
}

.institution {
    font-size: 1.3rem;
    font-weight: bold;
    color: #FFD700;
    margin-bottom: 5px;
}

.degree {
    font-size: 1.1rem;
    color: #E0E0E0;
    margin-bottom: 10px;
    font-weight: normal;
}

.year {
    font-size: 0.9rem;
    color: #B0B0B0;
    font-style: italic;
}

@media (max-width: 768px) {
    .education-container {
        padding: 20px;
    }
    
    .education-icon {
        min-width: 40px;
        height: 40px;
        font-size: 16px;
        margin-right: 15px;
    }
    
    .institution {
        font-size: 1.2rem;
    }
    
    .degree {
        font-size: 1rem;
    }
}
</style>

<!-- Font Awesome for the graduation cap icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">