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
                <ion-icon
                  class="icons sidebar-icons"
                  name="barbell-outline"
                ></ion-icon>

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
            <div class="did-you-know_box cards">
              <h2 class="cards-header">Did You Know?</h2>
              <p
                class="normal-text cards-description fact motivational-content"
              >
                Drinking water boosts your metabolism by up to 30%!
              </p>
            </div>

            <div class="bmi cards">
              <h2 class="cards-header">BMI and Goals</h2>
              <p class="normal-text cards-description">
                BMI: <span class="bmi-value">22.5</span>
                <span class="bmi-status">(Normal)</span>
              </p>
              <p class="normal-text cards-description">
                Goal: <span class="goal">Muscle Gain (Bulking)</span>
              </p>
              <a href="/pages/profile.php" class="cards-btn btn bmi-btn">
                Update Goal
              </a>
            </div>

            <div class="quote-box cards">
              <h2 class="cards-header">Motivational Quote</h2>
              <p
                class="normal-text cards-description quote motivational-content"
              >
                The only bad workout is the one you didn’t do.
              </p>
            </div>

            <div class="quick-stats cards">
              <h2 class="cards-header">Quick Stats</h2>
              <div class="icon-text stat-icon">
                <ion-icon name="restaurant-outline" class="icons"></ion-icon>
                <p class="normal-text cards-description">
                  Calories Consumed:
                  <span class="calorie-consumed">0 kcal</span>
                </p>
              </div>

              <div class="icon-text stat-icon">
                <ion-icon class="icons" name="flame-outline"></ion-icon>
                <p class="normal-text cards-description">
                  Calories Burned: <span class="calorie-burned">0 kcal</span>
                </p>
              </div>
              <div class="icon-text stat-icon">
                <ion-icon name="barbell-outline" class="icons"></ion-icon>
                <p class="normal-text cards-description">
                  Workouts This Week: <span class="week-workouts">0/7</span>
                </p>
              </div>
            </div>

            <div class="cards workout_schedule">
              <h2 class="cards-header">Today Schedule</h2>
            </div>

            <div class="calorie cards">
              <h2 class="cards-header">Calories</h2>
              <div class="bar-chart">
                <svg
                  class="bar-chart workout-chart workout_bar--chart"
                  viewBox="25 -10 350 180"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <!-- Axes -->
                  <line x1="30" y1="10" x2="30" y2="140" stroke="#ccc" />
                  <line x1="30" y1="140" x2="220" y2="140" stroke="#ccc" />

                  <rect
                    class="day1-workout_bar calorie-bar calorie-consumed__bar"
                    x="50"
                    y="70"
                    width="20"
                    height="70"
                  />
                  <text
                    class="day1-calorie_text calorie-consumed__text calorie__text"
                    x="50"
                    y="65"
                  ></text>

                  <rect
                    class="calorie-bar calorie-burned__bar"
                    x="120"
                    y="50"
                    width="20"
                    height="90"
                  />
                  <text
                    class="day2-calorie_text calorie-burned__text calorie__text"
                    x="120"
                    y="45"
                  ></text>
                </svg>
                <div class="legend-container flex-container">
                  <span class="legend-text normal-text flex-col">
                    Consumed<span class="in-legend legend"></span
                  ></span>

                  <span class="legend-text normal-text flex-col">
                    Burned<span class="out-legend legend"></span
                  ></span>
                </div>
              </div>
              <p class="normal-text cards-description no_data hidden">
                No Data
              </p>
            </div>

            <div class="goal-progress cards">
              <h2 class="cards-header">Weight Goal Progress</h2>
              <p class="progress_no_data hidden">No Data</p>
              <div class="chart-text flex-container">
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
                    0
                  </text>
                </svg>
                <div class="flex-col detail-value">
                  <p class="normal-text cards-description">
                    Goal: <span class="weight_goal">0</span>
                  </p>
                  <p class="normal-text cards-description">
                    Weight: <span class="current_weight">0</span>
                  </p>

                  <p class="normal-text cards-description">
                    <span class="progress-text">0</span>
                    Completed
                  </p>
                </div>
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
              <a class="dashboard-btn" href="/pages/workout.php">
                ➕ Log Workout
              </a>
              <a class="dashboard-btn" href="/pages/activitylog.php">
                🍽️ Log Meal
              </a>
              <a class="dashboard-btn" href="/pages/workoutschedule.php">
                📆 Schedule Workout
              </a>
              <a class="dashboard-btn" href="/pages/profile.php">
                👤 Update Profile
              </a>
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
