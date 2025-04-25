<section id="hero" class="hero">
  <div class="container">
    <div class="hero-content">
      <div class="hero-text">
        <h1 class="hero-title">Ashraf Issa</h1>
        <p class="hero-subtitle">Software Developer | Web Enthusiast | Open Source Contributor</p>
        <div class="hero-message">
          Transforming ideas into elegant digital solutions. With expertise in full-stack development
          and a passion for clean code, I create web experiences that make a difference.
          Let's build something amazing together.
        </div>
        <button class="hire-button">
          Hire Me
          <span class="button-arrow">→</span>
        </button>
      </div>
      <div class="hero-image">
        <img src="{{ asset('http://127.0.0.1:8000/' . $admin->image) }}" alt="{{ $admin->name }}">
        <div class="image-glow"></div>
      </div>
    </div>
  </div>
</section>

<style>
.hero {
  min-height: 90vh;
  display: flex;
  align-items: center;
  background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
  padding: 80px 0;
  position: relative;
  z-index: 1;
}

.hero-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
}

.hero-text {
  flex: 1;
  max-width: 600px;
}

.hero-title {
  font-size: 3.5rem;
  font-weight: bold;
  background: linear-gradient(45deg, #FFD700, #FFA500);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  margin-bottom: 1rem;
  letter-spacing: 1px;
}

.hero-subtitle {
  font-size: 1.25rem;
  color: #00FFFF;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
  font-weight: 500;
  letter-spacing: 0.5px;
  margin-bottom: 1.5rem;
}

.hero-message {
  font-size: 1.1rem;
  color: #E0E0E0;
  line-height: 1.6;
  margin-bottom: 2rem;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
}

.hire-button {
  padding: 1rem 2rem;
  font-size: 1.1rem;
  font-weight: 600;
  color: #000;
  background: linear-gradient(45deg, #FFD700, #FFA500);
  border: none;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}

.button-arrow {
  transition: transform 0.3s ease;
}

.hire-button:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

.hire-button:hover .button-arrow {
  transform: translateX(5px);
}

.hero-image {
  flex: 1;
  max-width: 400px;
  position: relative;
}

.hero-image img {
  width: 100%;
  height: auto;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s ease;
  position: relative;
  z-index: 2;
}

.hero-image:hover img {
  transform: translateY(-5px);
}

.image-glow {
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 20px;
  background: rgba(13, 110, 253, 0.2);
  filter: blur(20px);
  transform: scale(0.95);
  top: 10px;
  left: 0;
  z-index: 1;
  opacity: 0.6;
  transition: all 0.3s ease;
}

.hero-image:hover .image-glow {
  opacity: 0.8;
  transform: scale(1);
}

@media (max-width: 991px) {
  .hero-content {
    flex-direction: column;
    text-align: center;
  }
  
  .hero-text {
    order: 2;
  }
  
  .hero-image {
    order: 1;
    margin-bottom: 2rem;
  }
  
  .hero-title {
    font-size: 2.5rem;
  }
  
  .hero-message {
    font-size: 1rem;
  }
  
  /* Add extra padding for mobile dropdown */
  .hero {
    padding-top: 100px;
  }
}

@media (max-width: 768px) {
  .hero {
    padding: 60px 0 40px 0;
    min-height: auto;
  }
  
  .hero-image {
    max-width: 280px;
  }
  
  .hero-title {
    font-size: 2.2rem;
  }
  
  .hero-subtitle {
    font-size: 1.1rem;
  }
  
  .hire-button {
    padding: 0.8rem 1.6rem;
    font-size: 1rem;
  }
}
</style>