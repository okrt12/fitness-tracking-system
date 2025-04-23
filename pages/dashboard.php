<?php include "../backend/auth/session.php"; ?>
<?php include "../backend/auth/auth_check.php"; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/general.css" />
    <link rel="stylesheet" href="../assets/css/userdasboard.css" />

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

    <title>FitTrack+ | User Dashboard</title>
  </head>
  <body>
    <div class="dashboard-container">
      <main class="main">
        <nav class="sidebar">
          <ul>
            <li class="logo-list">
              <span class="sub-header heading-color logo">FitTrack+</span>
            </li>
            <li>
              <a
                class="icon-text sidebar-btn sidebar-btns active-page"
                href="/pages/dashboard.php"
              >
                <ion-icon
                  class="icons sidebar-icons"
                  name="home-outline"
                ></ion-icon>
                <p class="sidebar-btn">Dashboard</p>
              </a>
            </li>
            <li>
              <a
                class="icon-text sidebar-btn sidebar-btns"
                href="/pages/workoutschedule.php"
              >
                <ion-icon
                  class="icons sidebar-icons"
                  name="calendar-outline"
                ></ion-icon>
                <p class="sidebar-btn">Workout Schedule</p>
              </a>
            </li>
            <li>
              <a
                class="icon-text sidebar-btn sidebar-btns"
                href="/pages/activitylog.php"
              >
                <ion-icon
                  class="icons sidebar-icons"
                  name="pizza-outline"
                ></ion-icon>
                <p class="sidebar-btn">Diet Logs</p>
              </a>
            </li>
            <li>
            <a
              class="icon-text sidebar-btn sidebar-btns"
              href="/pages/workout.php"
            >
            <ion-icon class="icons sidebar-icons" name="barbell-outline"></ion-icon>
          
              <p class="sidebar-btn">Workout Logs</p>
            </a>
          </li>
            <li>
              <a
                class="icon-text sidebar-btn sidebar-btns"
                href="/pages/progresshealth.php"
              >
                <ion-icon
                  class="icons sidebar-icons"
                  name="medkit-outline"
                ></ion-icon>
                <p class="sidebar-btn">Progress & Health</p>
              </a>
            </li>
            <li>
              <a
                class="icon-text sidebar-btn sidebar-btns"
                href="/pages/profile.php "
              >
                <ion-icon
                  class="icons sidebar-btn"
                  name="person-outline"
                ></ion-icon>
                <p class="sidebar-btn">Profile</p>
              </a>
            </li>
            <li>
              <a
                class="icon-text sidebar-btn sidebar-btns"
                href="../backend/auth/logout.php"
              >
                <ion-icon
                  class="icons sidebar-icons"
                  name="log-in-outline"
                ></ion-icon>
                <p class="sidebar-btn">Logout</p>
              </a>
            </li>
          </ul>
        </nav>
        <div class="dashboard-main">
          <div class="header container">
            <h2 class="welcome-text heading-tertiary heading-color">
              Welcome back, <span class="username">Abel</span>
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
              <p class="normal-text cards-description">BMI: <span class ="bmi-value">22.5</span> <span class="bmi-status">(Normal)</span></p>
              <p class="normal-text cards-description">
                Goal: <span class="goal">Muscle Gain (Bulking)</span>
              </p>
              <a href="#" class="cards-btn btn bmi-btn"> Update Goal </a>
            </div>

            <div class="quote cards">
              <h2 class="cards-header">Motivational Quote</h2>
              <p class="normal-text cards-description">
                “The only bad workout is the one you didn’t do.”
              </p>
            </div>

            <div class="quick-stats cards">
              <h2 class="cards-header">Quick Stats</h2>
              <p class="normal-text cards-description">
                <span>🍽️ Calories Consumed:</span> 1800 kcal
              </p>
              <p class="normal-text cards-description">
                <span>🔥 Calories Burned:</span> 450 kcal
              </p>
              <p class="normal-text cards-description">
                <span>🏃 Workouts This Week:</span> 3/7
              </p>
              <p class="normal-text cards-description">
                <span>💧 Water Intake:</span> 2.5L
              </p>
            </div>

            <div class="goal-progress cards">
              <h2 class="cards-header">Goal Progress</h2>
              <p class="normal-text cards-description">
                Goal: Muscle Gain (Bulking)
              </p>

              <div class="flex-container chart-text">
                <svg class="pie-chart" width="120" height="120">
                  <circle
                    cx="60"
                    cy="60"
                    r="50"
                    stroke="#1A2636"
                    stroke-width="15"
                    fill="none"
                  />
                  <circle
                    cx="60"
                    cy="60"
                    r="50"
                    stroke="#00C853"
                    stroke-width="15"
                    fill="none"
                    stroke-dasharray="314"
                    stroke-dashoffset="62"
                    transform="rotate(-90 60 60)"
                  />
                  <text
                    x="50%"
                    y="50%"
                    text-anchor="middle"
                    fill="white"
                    dy=".3em"
                    font-size="20px"
                    class="normal-text pie-text"
                  >
                    80%
                  </text>
                </svg>
                <p class="normal-text cards-description">
                  <span class="progress-text">75</span>
                  Completed
                </p>
              </div>
            </div>

            <div class="calorie cards">
              <h2 class="cards-header">Calories</h2>
              <div class="bar-chart">
                <div class="calorie-intake bar">
                  <span class="normal-text bar-text in-text">2200kcal</span>
                </div>
                <div class="calorie-outtake bar">
                  <span class="normal-text bar-text out-text">2200kcal</span>
                </div>

                <div class="legend-container flex-container">
                  <span class="legend-text normal-text flex-col">
                    Calorie In<span class="in-legend legend"></span
                  ></span>

                  <span class="legend-text normal-text flex-col">
                    Calorie Out<span class="out-legend legend"></span
                  ></span>
                </div>
              </div>
            </div>

            <div class="cards weight-progress">
              <h2 class="cards-header">Weight Progress</h2>
              <p class="cards-description normal-text">
                📉 Weight: <span class="start-weight">70kg</span> →
                <span class="current-weight">68.5kg</span>
              </p>
              <span class="weight-progress__percent normal-text">50%</span>
              <div class="weight-chart__container">
                <div class="weight-progress__chart"></div>
              </div>
            </div>
            <div class="cards achivements">
              <h2 class="cards-header">Achievements</h2>
              <p class="normal-text cards-description">🏆 5 Day Streak</p>
              <p class="normal-text cards-description">
                🏅 BMI Improvement Badge
              </p>
              <a class="normal-text achievement-btn cards-description" href="#"
                >View All</a
              >
            </div>
          </div>
          <div class="flex-col">
            <h3 class="cards-header">Quick Actions</h3>
            <div class="dashboard-btns__container">
              <a class="dashboard-btn" href="#"> ➕ Log Workout </a>
              <a class="dashboard-btn" href="#"> 🍽️ Log Meal </a>
              <a class="dashboard-btn" href="#"> 📆 Schedule Workout </a>
              <a class="dashboard-btn" href="#"> 👤 Update Profile </a>
            </div>
          </div>
        </div>
      </main>
    </div>

    <!-- JS -->
    <script type="module" src="../assets/js/dashboard.js"></script>
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
