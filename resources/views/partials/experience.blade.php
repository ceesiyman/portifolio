<section id="experience" class="experiences py-5">
    <div class="container">
        <h2 class="text-center mb-8 text-white">Experience</h2>
        <div class="row">
            @foreach($experiences as $experience)
            <div class="col-md-6 mb-4">
                <div class="experience-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $experience->company }}</h5>
                        <h6 class="card-subtitle">{{ $experience->role }}</h6>
                        <p class="card-period">{{ date('M Y', strtotime($experience->start_date)) }} - {{ $experience->end_date ? date('M Y', strtotime($experience->end_date)) : 'Present' }}</p>
                        <p class="card-text">{{ $experience->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.experiences {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    padding: 4rem 0;
}

.experiences h2.text-center {
    margin-bottom: 3rem !important;
    color: #FFD700;
    font-weight: bold;
}

.experience-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #292929;
    color: #fff;
    height: 100%;
    padding: 25px;
    margin-bottom: 1.5rem;
}

.experiences .row {
    row-gap: 2.5rem; /* Increased spacing between rows */
}

.experience-card .card-body {
    padding: 0;
    display: flex;
    flex-direction: column;
}

.experience-card .card-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #FFD700;
    margin-bottom: 5px;
}

.experience-card .card-subtitle {
    font-size: 1.1rem;
    color: #E0E0E0;
    margin-bottom: 10px;
    font-weight: 600;
}

.experience-card .card-period {
    font-size: 0.9rem;
    color: #B0B0B0;
    margin-bottom: 15px;
    font-style: italic;
}

.experience-card .card-text {
    font-size: 1rem;
    color: #E0E0E0;
}

.experience-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

@media (max-width: 768px) {
    .experiences .row {
        row-gap: 2rem; /* Still increased but slightly less on mobile */
    }
    
    .experience-card {
        padding: 20px;
        margin-bottom: 1rem;
    }
    
    .experience-card .card-title {
        font-size: 1.2rem;
    }
    
    .experience-card .card-subtitle {
        font-size: 1rem;
    }
}
</style>