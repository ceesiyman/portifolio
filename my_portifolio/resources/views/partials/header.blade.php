<div class="page-wrapper">
  <header class="header">
    <div class="container">
      <nav class="navbar">
        <div class="name-brand">
          <h2>
            <span class="text-primary">ASH</span>
            <span class="text-light">Tech</span>
          </h2>
        </div>
        <button class="navbar-toggle" id="navToggle" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div class="nav-menu" id="navMenu">
          <div class="nav-links">
            <a href="#hero">Home</a>
            <a href="#projects">Projects</a>
            <a href="#skills">Skills</a>
            <a href="#experience">Experience</a>
            <a href="#education">Education</a>
          </div>
        </div>
      </nav>
    </div>
  </header>
</div>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  margin: 0;
}

.header {
  background-color: #212529;
  color: white;
  width: 100%;
  z-index: 1000;
  position: sticky;
  top: 0;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.container {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 1rem 2rem;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  position: relative;
}

.name-brand {
  margin-right: auto;
}

.name-brand h2 {
  margin: 0;
  font-family: 'Montserrat', sans-serif;
  letter-spacing: 2px;
  font-size: 1.8rem;
  text-transform: uppercase;
  font-weight: bold;
}

.text-primary {
  color: #0d6efd;
}

.text-light {
  color: white;
}

.nav-links {
  display: flex;
  gap: 0.5rem;
  margin-left: auto;
}

.nav-links a {
  color: white;
  text-decoration: none;
  padding: 0.5rem 1rem;
  border: none; /* Remove all borders */
  border-bottom: 2px solid transparent; /* Transparent bottom border with same height as hover line */
  border-radius: 0; /* Remove border radius */
  transition: all 0.3s ease;
  position: relative; /* Required for the positioning of the pseudo-element */
}

.nav-links a::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px; /* Same height as the border */
  bottom: 0;
  left: 50%;
  background: linear-gradient(45deg, #FFD700, #FFA500); /* Gold gradient from hero */
  transition: all 0.3s ease;
  transform: translateX(-50%);
}

.nav-links a:hover {
  transform: translateY(-2px);
  background-color: transparent; /* Remove hover background */
  box-shadow: none; /* Remove hover shadow */
}

.nav-links a:hover::after {
  width: 100%; /* Full width underline on hover */
}

.navbar-toggle {
  display: none;
  flex-direction: column;
  gap: 6px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 0.5rem;
  margin-left: 1rem;
}

.navbar-toggle span {
  display: block;
  width: 25px;
  height: 2px;
  background-color: white;
  transition: all 0.3s ease;
}

/* Hamburger menu animation */
.navbar-toggle.active span:nth-child(1) {
  transform: translateY(8px) rotate(45deg);
}

.navbar-toggle.active span:nth-child(2) {
  opacity: 0;
}

.navbar-toggle.active span:nth-child(3) {
  transform: translateY(-8px) rotate(-45deg);
}

@media (max-width: 991px) {
  .navbar-toggle {
    display: flex;
  }
  
  .nav-menu {
    display: none;
    width: 100%;
    position: absolute;
    top: 100%; /* Position right below the header */
    left: 0;
    background-color: #212529;
    padding: 1rem;
    z-index: 1001; /* Higher than hero section */
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  }
  
  .nav-menu.active {
    display: block;
  }
  
  .nav-links {
    flex-direction: column;
    align-items: center;
  }
  
  .nav-links a {
    width: 100%;
    text-align: center;
    margin: 5px 0;
    padding: 0.75rem 1rem;
  }
  
  .nav-links a::after {
    bottom: -2px; /* Slightly closer on mobile */
  }
  
  .nav-links a:hover::after {
    width: 100%; /* Full width on mobile too */
  }

.nav-links a:hover {
  transform: translateY(-2px);
  color: #FFD700; /* Slight color change on hover to match gradient */
  background-color: transparent; /* Remove previous hover background */
  box-shadow: none; /* Remove previous shadow */
}

}

@media (max-width: 768px) {
  .name-brand h2 {
    font-size: 1.4rem;
  }
  
  .container {
    padding: 1rem;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const navToggle = document.getElementById('navToggle');
  const navMenu = document.getElementById('navMenu');
  
  navToggle.addEventListener('click', function() {
    navMenu.classList.toggle('active');
    navToggle.classList.toggle('active');
    
    // Close the menu when clicking a nav link (for mobile users)
    document.querySelectorAll('.nav-links a').forEach(link => {
      link.addEventListener('click', function() {
        navMenu.classList.remove('active');
        navToggle.classList.remove('active');
      });
    });
  });
  
  // Close menu when clicking outside
  document.addEventListener('click', function(event) {
    if (!event.target.closest('.navbar') && navMenu.classList.contains('active')) {
      navMenu.classList.remove('active');
      navToggle.classList.remove('active');
    }
  });
});
</script>