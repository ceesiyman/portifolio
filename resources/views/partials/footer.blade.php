<footer class="footer">
    <div class="container">
        <!-- Top Section with columns -->
        <div class="footer-content">
            <!-- About column -->
            
            
            <!-- Quick Links column -->
            <div class="footer-column quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#experience">Experience</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#education">Education</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            
            <!-- Contact Info column -->
            <div class="footer-column contact-info">
    <h3>Contact Info</h3>
    <ul>
        <li>
            <i class="fas fa-envelope"></i> 
            <a href="mailto:ashrafbakariissa@gmail.com" class="contact-link">ashrafbakariissa@gmail.com</a>
        </li>
        <li>
            <i class="fas fa-phone"></i> 
            <a href="tel:+11234567890" class="contact-link">+255612415154</a>
        </li>
        <li>
            <i class="fas fa-phone"></i> 
            <a href="tel:+11234567890" class="contact-link">+255744330332</a>
        </li>
        <li>
            <i class="fas fa-map-marker-alt"></i> 
            <span>Dar Es Salaam, Tanzania</span>
        </li>
    </ul>
</div>
        </div>
        
        <!-- Social Media Section -->
        <div class="social-links">
            @foreach($socialLinks as $socialLink)
            <a href="{{ $socialLink->link }}" target="_blank" class="social-link">
                <i class="fab fa-{{ strtolower($socialLink->platform) }}"></i>
                <span>{{ $socialLink->platform }}</span>
            </a>
            @endforeach
        </div>
        
        <!-- Bottom copyright section -->
        <div class="copyright">
            <p>&copy; 2025 Your Name. All rights reserved.</p>
            <p class="made-with">Made with <i class="fas fa-heart"></i> and <i class="fas fa-coffee"></i></p>
        </div>
    </div>
</footer>

<style>
.footer {
    background: #1a1a1a;
    color: #E0E0E0;
    padding: 60px 0 30px;
    position: relative;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #FFD700, #FFA500);
}

.footer .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 40px;
}

.footer-column {
    flex: 1;
    min-width: 250px;
    margin-bottom: 30px;
    padding-right: 30px;
}

.footer-column.contact-info .contact-link {
    color: #E0E0E0;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-column.contact-info .contact-link:hover {
    color: #FFD700;
}

.footer-column h3 {
    color: #FFD700;
    font-size: 1.3rem;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.footer-column h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(90deg, #FFD700, #FFA500);
}

.footer-column.about p {
    line-height: 1.6;
}

.footer-column.quick-links ul,
.footer-column.contact-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-column.quick-links li {
    margin-bottom: 10px;
}

.footer-column.quick-links a {
    color: #E0E0E0;
    text-decoration: none;
    transition: color 0.3s;
    display: inline-block;
    padding-left: 20px;
    position: relative;
}

.footer-column.quick-links a::before {
    content: '→';
    position: absolute;
    left: 0;
    color: #FFD700;
}

.footer-column.quick-links a:hover {
    color: #FFD700;
}

.footer-column.contact-info li {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.footer-column.contact-info i {
    color: #FFD700;
    margin-right: 10px;
    font-size: 1.1rem;
}

.social-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 30px;
}

.social-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 15px 15px;
    color: #E0E0E0;
    text-decoration: none;
    transition: transform 0.3s, color 0.3s;
}

.social-link i {
    font-size: 1.5rem;
    margin-bottom: 5px;
}

.social-link span {
    font-size: 0.8rem;
}

.social-link:hover {
    color: #FFD700;
    transform: translateY(-5px);
}

.copyright {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid #333;
}

.copyright p {
    margin: 5px 0;
    font-size: 0.9rem;
}

.made-with {
    color: #B0B0B0;
}

.made-with i {
    color: #FFD700;
    margin: 0 3px;
}

.fa-heart {
    color: #ff6b6b;
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
    }
    
    .footer-column {
        width: 100%;
        padding-right: 0;
    }
    
    .social-links {
        justify-content: flex-start;
    }
    
    .social-link {
        margin: 0 20px 15px 0;
    }
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
  // Get the hire button
  const hireButton = document.querySelector('.hire-button');
  
  // Add click event listener
  if (hireButton) {
    hireButton.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Find the contact section - you can target it by id (#contact) 
      // or by the contact-info class in the footer
      const contactSection = document.querySelector('#contact') || 
                             document.querySelector('.footer-column.contact-info');
      
      if (contactSection) {
        // Get the position of the contact section
        const contactPosition = contactSection.getBoundingClientRect().top + window.pageYOffset;
        
        // Scroll to the contact section with smooth animation
        window.scrollTo({
          top: contactPosition,
          behavior: 'smooth'
        });
      }
    });
  }
});
</script>
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">