<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/general.css" />
    <link rel="stylesheet" href="./assets/css/indexstyles.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />

    <title>FitTrack+</title>
  </head>
  <body>
    <header class="header">
      <div class="desktop-nav">
        <span class="logo btn heading-color">FitTrack+</span>
        <nav class="nav container">
          <ul class="nav-btns__container">
            <li>
              <a href="#" class="btn nav-btn"> Home </a>
            </li>
            <li>
              <a href="#" class="btn nav-btn"> About Us </a>
            </li>
            <li>
              <a href="#" class="btn nav-btn"> Services </a>
            </li>
            <li>
              <a href="#" class="btn nav-btn"> Testimonials </a>
            </li>
            <li>
              <a href="#" class="btn nav-btn"> Contact Us </a>
            </li>
          </ul>
        </nav>
        <a href="./pages/signup.php" class="nav-cta btn">Get Started</a>
      </div>
    </header>
    <main>
      <section class="section hero-section" id="hero">
        <div class="hero container">
          <div class="container sub-hero__container">
            <div class="heading-container">
              <h1 class="heading-primary hero-header">
                BUILD YOUR BODY INTO A
                <span class="heading-color">HEALTHY</span> AND
                <span class="heading-color">STRONG BODY.</span>
              </h1>
              <p class="normal-text hero-description">
                Sport is part of health, so be diligent in exercinsing so that
                the body becomes stronger and healthier to improve health and
                keep away from injury.
              </p>
              <div class="flex-container hero-btn__container">
                <a href="./pages/signup.php" class="btn hero-btn">Join Us</a>
                <a href="#" class="btn hero-btn hero-btn1">Learn More ↓</a>
              </div>
            </div>

            <div class="hero-img__container">
              <img
                src="./assets/imgs/hero.png"
                class="hero-img"
                alt="man holding dumbells"
              />
            </div>
          </div>
        </div>
      </section>
      <section class="section features-section" id="features">
        <div class="features container">
          <h2 class="heading-secondary">
            Why Choose <span class="heading-color">FitTrack+?</span>
          </h2>
          <div class="features-cards__container">
            <div class="features-card">
              <ion-icon
                class="icon features-icons"
                name="flag-outline"
              ></ion-icon>
              <div class="feat-cards__detail">
                <span class="sub-header">Goal-Based Planning</span>
                <p class="feat-card__description">
                  Set goals like weight loss, muscle gain, or health management.
                  FitTrack+ personalizes your plan to match your fitness vision
                  and lifestyle.
                </p>
                <a class="feat-cards__btn">Learn more</a>
              </div>
            </div>
            <div class="features-card">
              <ion-icon
                class="icon features-icons"
                name="nutrition-outline"
              ></ion-icon>
              <div class="feat-cards__detail">
                <span class="sub-header">Smart Diet Planning</span>

                <p class="feat-card__description">
                  Plan your meals without the stress. FitTrack+ suggests what to
                  eat based on your body needs and fitness goals.
                </p>
                <a class="feat-cards__btn">Learn more</a>
              </div>
            </div>
            <div class="features-card">
              <ion-icon
                class="icon features-icons"
                name="barbell-outline"
              ></ion-icon>
              <div class="feat-cards__detail">
                <span class="sub-header">Workout Scheduler</span>
                <p class="feat-card__description">
                  Create workout plans that fit your schedule. From home
                  routines to gym splits, we’ve got you covered.
                </p>
                <a class="feat-cards__btn">Learn more</a>
              </div>
            </div>
            <div class="feat-cards__bottom">
              <div class="features-card card4">
                <ion-icon
                  class="icon features-icons"
                  name="heart-outline"
                ></ion-icon>
                <div class="feat-cards__detail">
                  <span class="sub-header">Health Tracking</span>
                  <p class="feat-card__description">
                    Track key health metrics like blood pressure, sugar levels,
                    and more—all in one easy dashboard.
                  </p>
                  <a class="feat-cards__btn">Learn more</a>
                </div>
              </div>
              <div class="features-card card5">
                <ion-icon
                  class="icon features-icons"
                  name="sparkles-outline"
                ></ion-icon>
                <div class="feat-cards__detail">
                  <span class="sub-header">Daily Motivations</span>
                  <p class="feat-card__description">
                    Stay on track with motivational quotes and alerts that
                    notify you about unusual progress or potential health risks.
                  </p>
                  <a class="feat-cards__btn">Learn more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section how-section" id="how">
        <div class="how container">
          <div class="flex-col">
            <span class="subheading">HOW IT WORKS</span>
            <h2 class="heading-secondary">
              Getting Started is Easy in 3 simple steps
            </h2>
          </div>
          <div class="steps-container container grid grid--2-cols">
            <div class="step-text__box">
              <h3 class="heading-tertiary">Set Your Goals</h3>
              <p class="step-description normal-text">
                Tell us about your fitness goals, body type, and health
                concerns: Whether you want to lose weight, build muscle, or stay
                healthy, FitTrack+ will personalize your fitness journey. No
                more guesswork—just a clear path to your ideal body and
                lifestyle.
              </p>
            </div>
            <p class="step-number normal-text">01</p>
            <p class="step-number normal-text">02</p>
            <div class="step-text__box">
              <h3 class="heading-tertiary">Follow Your Plan</h3>
              <p class="step-description normal-text">
                Based on your profile, FitTrack+ creates a customized workout
                and diet plan tailored to your goals and preferences. From gym
                routines to home workouts, and balanced meals to healthy
                snacks—we’ve got you covered.
              </p>
            </div>
            <div class="step-text__box">
              <h3 class="heading-tertiary">Track & Improve</h3>
              <p class="step-description normal-text">
                Easily log your progress and health data in one place. FitTrack+
                automatically analyzes your performance, adjusts your plan, and
                helps you stay on track with motivational insights, smart
                alerts, and health tips that evolve with you.
              </p>
            </div>
            <p class="step-number normal-text">03</p>
          </div>
        </div>
      </section>
      <section class="section testimonials-section" id="testimonials">
        <div class="testimonials flex-col container">
          <div class="flex-col testimonial-header__container">
            <span class="subheading">Real People. Real Results</span>
            <h2 class="heading-secondary">
              What Our Users Say About
              <span class="heading-color">FitTrack+?</span>
              <div class="test-cards container">
                <div class="test-card__details">
                  <span class="sub-header test-card__header"
                    >What do they say?</span
                  >

                  <p class="step-description test-description normal-text">
                    "I lost 10kg in just 3 months! The personalized meal plans
                    and workout tracking helped me stay consistent every single
                    day Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Hic velit pariatur, optio at, excepturi blanditiis
                    ullam consequuntur molestia"
                  </p>

                  <p class="test-name test-name__name">
                    Selam, 28 — Addis Ababa
                  </p>
                </div>

                <img
                  class="test-img"
                  src="./assets/imgs/hero.png"
                  alt="women holding dumbell"
                />
              </div>
            </h2>
          </div>
        </div>
      </section>
      <section class="section cta-section" id="cta">
        <div class="cta flex-container">
          <img
            class="cta-img"
            src="./assets/imgs/cta.jpg"
            alt="man holding dumbell"
          />
          <div class="flex-col cta-sub__container container">
            <h2 class="heading-secondary">
              Start Your Fitness Journey With
              <span class="heading-color">FitTrack+</span> Today
            </h2>
            <div class="cta-detail">
              <p class="cta-description normal-text">
                Join thousands of users who are transforming their health and
                lifestyle with smarter fitness tracking, personalized meal and
                workout plans, daily motivation, and powerful progress
                monitoring — all in one app. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Doloribus itaque, blanditiis harum
                suscipit dolorum officiis, mollitia veniam sequi numquam
                corrupti odit cumque nisi
              </p>
              <div class="flex-container hero-btn__container">
                <a href="/pages/signup.php" class="btn cta-btns">Join Now</a>
                <a href="#" class="btn cta-btns1">Learn More &UpArrow;</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">
      <!-- <form class="footer-form container">
        <span class="subheading form-header">Contact Us</span>
        <div class="label-input">
          <label class="input__label" for="name">Name</label>
          <input
            class="name input"
            type="text"
            id="name"
            placeholder="Your Name"
          />
        </div>
        <div class="label-input">
          <label class="input__label" for="name">Email</label>
          <input
            class="email input"
            type="text"
            id="email"
            placeholder="Your email"
          />
        </div>
        <div class="label-input">
          <label class="input__label" htmlFor="message"> Message </label>
          <span class="msg-box border">
            <input
              class="input message"
              type="textarea"
              id="message"
              placeholder="Your message"
            />
          </span>
        </div>
        <a href="#" class="btn cta-btns footer-btn">Submit</a>
      </form> -->
      <div class="footer-right container">
        <span class="footer-header sub-header heading-color">FitTrack+</span>
        <ul class="footer-btns__container">
          <li class="footer-li">
            <a class="footer__btn" href="#"> Home </a>
          </li>
          <li class="footer-li">
            <a class="footer__btn" href="#"> About Us </a>
          </li>
          <li class="footer-li">
            <a class="footer__btn" href="#"> Services </a>
          </li>
          <li class="footer-li">
            <a class="footer__btn" href="#"> Privacy Policy </a>
          </li>
          <li class="footer-li">
            <a class="footer__btn" href="#"> Contact</a>
          </li>
        </ul>
        <div class="footer-cpy__date">
          <p class="date-copy">2025 &copy; Copyright reserved</p>
        </div>
      </div>
    </footer>

    <!-- JS -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
