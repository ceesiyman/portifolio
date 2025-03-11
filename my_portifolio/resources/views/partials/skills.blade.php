<section id="skills" class="skills py-5">
    <div class="container">
        <h2 class="text-center mb-8 text-white">Skills</h2>
        <div class="skills-container">
            @foreach($skills as $skill)
            <div class="skill-item">
                <div class="skill-name">{{ $skill->name }}</div>
                <div class="skill-bar-container">
                    @php
                        $proficiency = 0;
                        if(strtolower($skill->proficiency) == 'expert') {
                            $proficiency = 100;
                        } elseif(strtolower($skill->proficiency) == 'advanced') {
                            $proficiency = 80;
                        } elseif(strtolower($skill->proficiency) == 'intermediate') {
                            $proficiency = 60;
                        } else {
                            $proficiency = 40; // Default for basic/beginner
                        }
                    @endphp
                    <div class="skill-bar" data-proficiency="{{ $proficiency }}">
                        <span class="proficiency-text">{{ $skill->proficiency }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.skills {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    padding: 4rem 0;
}

.skills h2.text-center {
    margin-bottom: 3rem !important;
    color: #FFD700;
    font-weight: bold;
}

.skills-container {
    background: #292929;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.skills-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(255, 215, 0, 0.3);
}

.skill-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #3d3d3d;
}

.skill-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.skill-name {
    font-size: 1.1rem;
    font-weight: bold;
    color: #FFD700;
    width: 30%;
    padding-right: 15px;
}

.skill-bar-container {
    height: 25px;
    background-color: #3d3d3d;
    border-radius: 12px;
    overflow: hidden;
    flex-grow: 1;
    width: 70%;
}

.skill-bar {
    height: 100%;
    width: 0%; /* Start at 0 for animation */
    background: linear-gradient(90deg, #FFD700, #FFA500);
    border-radius: 12px;
    display: flex;
    align-items: center;
    padding-left: 10px;
    transition: width 1.5s ease-out;
}

.proficiency-text {
    color: #000;
    font-weight: bold;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .skills-container {
        padding: 20px;
    }
    
    .skill-item {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .skill-name {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .skill-bar-container {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all skill bars
    const skillBars = document.querySelectorAll('.skill-bar');
    
    // Function to animate skill bars
    function animateSkillBars() {
        skillBars.forEach(bar => {
            const proficiency = bar.getAttribute('data-proficiency');
            // Set initial width to 0
            bar.style.width = '0%';
            
            // Use setTimeout to ensure the initial state is rendered before animation
            setTimeout(() => {
                bar.style.width = proficiency + '%';
            }, 300);
        });
    }
    
    // Create an observer for the skills container
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Start animation when skills container is visible
                animateSkillBars();
                // Disconnect observer after animation starts
                observer.disconnect();
            }
        });
    }, { threshold: 0.1 });
    
    // Observe the skills container
    const skillsContainer = document.querySelector('.skills-container');
    if (skillsContainer) {
        observer.observe(skillsContainer);
    }
});
</script>