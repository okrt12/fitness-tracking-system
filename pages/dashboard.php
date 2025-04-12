<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/general.css" />
    <link rel="stylesheet" href="/assets/css/userdasboard.css" />

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

    <title>FitTrack+ User Dashboard</title>
  </head>
  <body>
    <div class="dashboard-container">
      <main class="main">
        <nav class="sidebar">
          <ul>
            <li class="logo-list">
              <span class="sub-header heading-color logo">FitTrack+</span>
            </li>
            <li class="sidebar-btns home">
              <div class="icon-text">
                <ion-icon
                  class="icons sidebar-icons"
                  name="home-outline"
                ></ion-icon>
                <a href="#" class="sidebar-btn">Dashboard</a>
              </div>
            </li>
            <li class="sidebar-btns">
              <div class="icon-text">
                <ion-icon
                  class="icons sidebar-icons"
                  name="calendar-outline"
                ></ion-icon>
                <a href="#" class="sidebar-btn">Workout Schedule</a>
              </div>
            </li>
            <li class="sidebar-btns">
              <div class="icon-text">
                <ion-icon
                  class="icons sidebar-icons"
                  name="pizza-outline"
                ></ion-icon>
                <a href="#" class="sidebar-btn">Diet Logs</a>
              </div>
            </li>
            <li class="sidebar-btns">
              <div class="icon-text">
                <ion-icon
                  class="icons sidebar-icons"
                  name="medkit-outline"
                ></ion-icon>
                <a href="#" class="sidebar-btn">Progress & Health</a>
              </div>
            </li>
            <li class="sidebar-btns">
              <div class="icon-text">
                <ion-icon
                  class="icons sidebar-icons"
                  name="nutrition-outline"
                ></ion-icon>
                <a href="#" class="sidebar-btn">Nutrition Guide</a>
              </div>
            </li>
            <li class="sidebar-btns">
              <div class="icon-text">
                <ion-icon
                  class="icons sidebar-btn"
                  name="person-outline"
                ></ion-icon>
                <a href="#" class="sidebar-btn">Profile</a>
              </div>
            </li>
            <li class="sidebar-btns">
              <div class="icon-text">
                <ion-icon
                  class="icons sidebar-icons"
                  name="log-in-outline"
                ></ion-icon>
                <a href="#" class="sidebar-btn">Logout</a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="dashboard-main">
          <div class="header container">
            <h2 class="welcome-text heading-tertiary heading-color">
              Welcome back, Abel
            </h2>
          </div>
          <div class="dashboard-cards container">
            <div class="did-you-know cards">
              <h2 class="cards-header">Did You Know?</h2>
              <p class="normal-text cards-description">
                Drinking water boosts your metabolism by up to 30%!
              </p>
            </div>

            <div class="bmi cards">
              <h2 class="cards-header">BMI and Goals</h2>
              <p class="normal-text cards-description">BMI: 22.5</p>
              <p class="normal-text cards-description">
                Goal: Muscle Gain (Bulking)
              </p>
              <a href="#" class="cards-btn btn bmi-btn"> Update Goal </a>
            </div>

            <div class="quote cards">
              <h2 class="cards-header">Motivational Quote</h2>
              <p class="normal-text cards-description">
                “The only bad workout is the one you didn’t do.”
              </p>
            </div>
          </div>
        </div>
      </main>
    </div>

    <!-- JS -->
    <script defer src="../assets/js/dashboard.js"></script>
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
