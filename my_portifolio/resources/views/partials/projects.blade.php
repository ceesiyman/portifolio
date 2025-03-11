
<!-- Projects section with modal functionality and load more button -->
<section id="projects" class="projects py-5">
    <div class="container">
        <h2 class="text-center mb-8 text-white">Projects</h2>
        <div class="row" id="projects-container">
            @foreach($projects as $index => $project)
            <div class="col-md-6 mb-4 project-item-container" style="{{ $index >= 4 ? 'display: none;' : '' }}">
                <div class="project-card h-100 project-item" 
                     data-id="{{ $project->id }}"
                     data-title="{{ $project->title }}"
                     data-description="{{ $project->description }}"
                     data-image="{{ asset($project->image) }}"
                     data-github="{{ $project->github_link }}"
                     data-live="{{ $project->live_link }}"
                     data-tech="{{ json_encode($project->tech_stack) }}">
                    <div class="row g-0 h-100">
                        <div class="col-md-4">
                            <img src="{{ asset($project->image) }}" class="img-fluid h-100" alt="{{ $project->title }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Load More Button - Only show if there are more than 4 projects -->
        @if(count($projects) > 4)
        <div class="text-center mt-5" id="load-more-container">
            <button id="load-more-btn" class="load-more-btn">
                <span>Load More Projects</span>
                <i class="fas fa-chevron-down ms-2"></i>
            </button>
        </div>
        @endif
    </div>
</section>

<!-- Modal structure (place this outside the section, ideally before the closing body tag) -->
<div id="projectModal" class="project-modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <img id="modalImage" src="" class="img-fluid modal-image" alt="Project Image">
                </div>
                <div class="col-md-6">
                    <h2 id="modalTitle" class="modal-project-title"></h2>
                    <p id="modalDescription" class="modal-project-description"></p>
                    
                    <div class="tech-stack-container">
                        <h4>Technologies Used:</h4>
                        <div id="modalTechStack" class="tech-badges"></div>
                    </div>
                    
                    <div class="project-links">
                        <a id="modalGithubLink" href="#" target="_blank" class="btn project-btn github-btn">
                            <i class="fab fa-github"></i> View Code
                        </a>
                        <a id="modalLiveLink" href="#" target="_blank" class="btn project-btn demo-btn">
                            <i class="fas fa-external-link-alt"></i> Live Demo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
/* Projects Section Styles */
.projects {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    padding: 4rem 0;
}

.projects h2.text-center {
    margin-bottom: 3rem !important;
    color: #FFD700;
    font-weight: bold;
}

.project-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #292929;
    color: #fff;
    height: 100%;
    margin-bottom: 1.5rem;
    cursor: pointer; /* Indicates it's clickable */
}

.projects .row {
    row-gap: 2rem;
}

.project-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
}

.project-card .card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
}

.project-card .card-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #FFD700;
    margin-bottom: 10px;
}

.project-card .card-text {
    font-size: 1rem;
    color: #E0E0E0;
}

.project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

/* Load More Button Styles */
.load-more-btn {
    background: transparent;
    color: #FFD700;
    border: 2px solid #FFD700;
    border-radius: 30px;
    padding: 12px 30px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.load-more-btn:hover {
    background: rgba(255, 215, 0, 0.1);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 215, 0, 0.2);
}

.load-more-btn i {
    transition: transform 0.3s ease;
}

.load-more-btn:hover i {
    transform: translateY(3px);
}

.load-more-btn.loading {
    opacity: 0.7;
    cursor: wait;
}

.load-more-btn.loading span {
    display: none;
}

.load-more-btn.loading::after {
    content: 'Loading...';
}

.load-more-btn.hidden {
    display: none;
}

/* Fade-in animation for new projects */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.new-project {
    animation: fadeIn 0.5s ease forwards;
}

/* Modal Styles */
.project-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    z-index: 1000;
    overflow: auto;
    animation: fadeIn 0.3s;
}

.modal-content {
    position: relative;
    background: linear-gradient(135deg, #292929 0%, #1e1e1e 100%);
    margin: 5% auto;
    padding: 30px;
    width: 80%;
    max-width: 900px;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
    color: #E0E0E0;
    animation: slideIn 0.4s;
}

.close-modal {
    position: absolute;
    top: 20px;
    right: 25px;
    font-size: 28px;
    font-weight: bold;
    color: #E0E0E0;
    cursor: pointer;
    z-index: 10;
    transition: color 0.3s;
}

.close-modal:hover {
    color: #FFD700;
}

.modal-image {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.modal-project-title {
    color: #FFD700;
    margin-bottom: 20px;
    font-weight: bold;
}

.modal-project-description {
    line-height: 1.6;
    margin-bottom: 25px;
}

.tech-stack-container {
    margin-bottom: 25px;
}

.tech-stack-container h4 {
    color: #FFD700;
    margin-bottom: 15px;
    font-size: 1.2rem;
}

.tech-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 25px;
}

.tech-badge {
    background: rgba(255, 215, 0, 0.2);
    color: #FFD700;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    display: inline-block;
}

.project-links {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.project-btn {
    padding: 10px 20px;
    border-radius: 30px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.github-btn {
    background-color: #24292e;
    color: white;
}

.demo-btn {
    background-color: #FFD700;
    color: #1a1a1a;
}

.github-btn:hover {
    background-color: #3a3f46;
}

.demo-btn:hover {
    background-color: #ffea8a;
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes slideIn {
    from {transform: translateY(-50px); opacity: 0;}
    to {transform: translateY(0); opacity: 1;}
}

/* Responsive styles */
@media (max-width: 768px) {
    .project-card img {
        height: 180px;
    }
    
    .project-card .row {
        flex-direction: column;
    }
    
    .project-card .col-md-4,
    .project-card .col-md-8 {
        width: 100%;
    }
    
    .project-card img {
        border-radius: 15px 15px 0 0;
    }
    
    .projects .row {
        row-gap: 1.5rem;
    }
    
    .modal-content {
        width: 95%;
        padding: 20px;
        margin: 10% auto;
    }
    
    .modal-body .row {
        flex-direction: column;
    }
    
    .modal-body .col-md-6 {
        width: 100%;
    }
    
    .modal-image {
        margin-bottom: 20px;
    }
    
    .project-links {
        flex-direction: column;
        gap: 10px;
    }
    
    .load-more-btn {
        width: 100%;
        padding: 10px 24px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Modal elements
    const modal = document.getElementById('projectModal');
    const closeBtn = document.querySelector('.close-modal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const modalTechStack = document.getElementById('modalTechStack');
    const modalGithubLink = document.getElementById('modalGithubLink');
    const modalLiveLink = document.getElementById('modalLiveLink');
    
    // Load more elements
    const loadMoreBtn = document.getElementById('load-more-btn');
    const projectContainers = document.querySelectorAll('.project-item-container');
    
    let currentlyShowing = 4;  // Initial number of visible projects
    const projectsPerBatch = 4; // Number of projects to show per batch
    
    // Initialize modal event handlers
    function initModalHandlers() {
        const projectItems = document.querySelectorAll('.project-item');
        
        projectItems.forEach(item => {
            item.addEventListener('click', function() {
                // Get data from attributes
                const title = this.getAttribute('data-title');
                const description = this.getAttribute('data-description');
                const image = this.getAttribute('data-image');
                const github = this.getAttribute('data-github');
                const live = this.getAttribute('data-live');
                const techData = JSON.parse(this.getAttribute('data-tech'));
                
                // Populate modal
                modalImage.src = image;
                modalImage.alt = title;
                modalTitle.textContent = title;
                modalDescription.textContent = description;
                
                // Set links
                modalGithubLink.href = github;
                modalLiveLink.href = live;
                
                // Create tech stack badges
                modalTechStack.innerHTML = '';
                techData.forEach(tech => {
                    const badge = document.createElement('span');
                    badge.className = 'tech-badge';
                    badge.textContent = tech;
                    modalTechStack.appendChild(badge);
                });
                
                // Show modal
                modal.style.display = 'block';
                // Prevent body scrolling
                document.body.style.overflow = 'hidden';
            });
        });
    }
    
    // Initialize modal close handlers
    closeBtn.addEventListener('click', function() {
        closeModal();
    });
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
    
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });
    
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    // Load more projects handler
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            loadMoreBtn.classList.add('loading');
            
            // Simulate loading delay for better UX
            setTimeout(function() {
                loadMoreProjects();
                loadMoreBtn.classList.remove('loading');
                
                // After showing more projects, reinitialize modal handlers for new items
                initModalHandlers();
            }, 400);
        });
    }
    
    // Function to load more projects
    function loadMoreProjects() {
        let count = 0;
        let totalDisplayed = 0;
        
        // Loop through all project containers
        projectContainers.forEach((container, index) => {
            // Count already displayed projects
            if (container.style.display !== 'none') {
                totalDisplayed++;
            }
            
            // Show the next batch of hidden projects
            if (index >= currentlyShowing && count < projectsPerBatch && container.style.display === 'none') {
                container.style.display = 'block';
                container.classList.add('new-project');
                count++;
                totalDisplayed++;
            }
        });
        
        // Update the counter for next batch
        currentlyShowing += count;
        
        // Hide load more button if all projects are shown
        if (totalDisplayed >= projectContainers.length) {
            loadMoreBtn.classList.add('hidden');
        }
    }
    
    // Initialize modal handlers
    initModalHandlers();
});
</script>
