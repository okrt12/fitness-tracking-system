<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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

    <link rel="stylesheet" href="../assets/css/progresshealth.css" />
    <link rel="stylesheet" href="../assets/css/general.css" />

    <title>FitTrack+ | Progress and Health</title>
  </head>
  <body>
    <main class="main">
      <nav class="sidebar">
        <ul>
          <li class="logo-list">
            <span class="sub-header heading-color logo">FitTrack+</span>
          </li>
          <li>
            <a
              class="icon-text sidebar-btn sidebar-btns"
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
              class="icon-text sidebar-btn sidebar-btns active-page"
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
              href="/pages/dashboard.php"
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

      <div class="main-progress">
        <h3 class="heading-tertiary progress-header">
          <span class="heading-color">FitTrack+</span> Progress & Health
        </h3>
        <div class="progress-status__container container">
          <div class="cards flex-col status-cards">
            <h3 class="cards-header">Weight Change</h3>
            <p class="cards-description normal-text">↓ 2.5 kg</p>
          </div>
          <div class="cards flex-col status-cards">
            <h3 class="cards-header">Workouts</h3>
            <p class="cards-description normal-text">12 this month</p>
          </div>
          <div class="cards flex-col status-cards">
            <h3 class="cards-header">Avg Calories Burned</h3>
            <p class="cards-description normal-text">450/day</p>
          </div>
          <div class="cards flex-col status-cards">
            <h3 class="cards-header">Health Status</h3>
            <p class="health-status cards-description normal-text">Normal</p>
          </div>
        </div>

        <div class="container progress-charts__container">
          <div class="progress-charts cards">
            <h3 class="cards-header">Your Progress</h3>
            <div class="chart-grid">
              <!-- Weight Chart -->
              <div class="chart-card">
                <h3 class="cards-header">Weight Over Time</h3>
                <div class="weightChart"></div>
                <p class="cards-description normal-text">
                  Current: 73kg (Goal: 70kg)
                </p>
              </div>
              <!-- Workout Chart -->
              <div class="chart-card">
                <h3 class="cards-header">Weekly Workouts</h3>
                <div class="workoutChart"></div>
                <p class="cards-description normal-text">
                  This Week: 3 sessions, 950 kcal
                </p>
              </div>
              <!-- Diet Chart -->
              <div class="chart-card">
                <h3 class="cards-header">Daily Calories</h3>
                <div class="dietChart"></div>
                <p class="cards-description normal-text">
                  Today: 1800 kcal (Goal: 2000 kcal)
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="health-charts__container container">
          <div class="progress-charts health-charts cards">
            <h3 class="cards-header">Health Status</h3>
            <div class="chart detail-value flex-col">
              <svg
                class="bar-chart bp-chart"
                viewBox="25 -10 570 180"
                width="100%"
                xmlns="http://www.w3.org/2000/svg"
              >
                <!-- Axes -->
                <line x1="30" y1="10" x2="30" y2="140" stroke="#ccc" />
                <line x1="30" y1="140" x2="550" y2="140" stroke="#ccc" />

                <!-- Blood Pressure and Sugar Bars -->

                <!-- Mon -->
                <rect
                  class="day1-bp_bar bp-bar bp-mon-bar"
                  x="50"
                  y="70"
                  width="20"
                  height="70"
                />
                <text class="day1-bp_text" x="50" y="65">120</text>

                <rect
                  class="day1-sugar_bar sugar-bar sugar-mon-bar"
                  x="75"
                  y="60"
                  width="20"
                  height="80"
                />
                <text class="day1-sugar_text" x="75" y="55">95</text>

                <!-- Tue -->
                <rect
                  class="day2-bp_bar bp-bar bp-tue-bar"
                  x="125"
                  y="50"
                  width="20"
                  height="90"
                />
                <text class="day2-bp_text" x="125" y="45">130</text>

                <rect
                  class="sugar-bar day2-sugar_bar sugar-tue-bar"
                  x="150"
                  y="30"
                  width="20"
                  height="110"
                />
                <text class="day2-sugar_text" x="150" y="25">100</text>

                <!-- Wed -->
                <rect
                  class="day3-bp_bar bp-bar bp-wed-bar"
                  x="200"
                  y="60"
                  width="20"
                  height="80"
                />
                <text class="day3-bp_text" x="200" y="55">125</text>

                <rect
                  class="sugar-bar day3-bp_bar sugar-wed-bar"
                  x="225"
                  y="40"
                  width="20"
                  height="100"
                />
                <text class="day3-sugar_text" x="225" y="35">95</text>

                <!-- Thu -->
                <rect
                  class="day4-bp_bar bp-bar bp-thu-bar"
                  x="275"
                  y="90"
                  width="20"
                  height="50"
                />
                <text class="day4-bp_text" x="275" y="85">95</text>

                <rect
                  class="sugar-bar day4-sugar_bar sugar-thu-bar"
                  x="300"
                  y="60"
                  width="20"
                  height="80"
                />
                <text class="day4-sugar_text" x="300" y="55">100</text>

                <!-- Fri -->
                <rect
                  class="day5-bp_bar bp-bar bp-fri-bar"
                  x="350"
                  y="50"
                  width="20"
                  height="90"
                />
                <text class="day5-bp_text" x="350" y="45">130</text>

                <rect
                  class="sugar-bar day5-bp_bar sugar-fri-bar"
                  x="375"
                  y="30"
                  width="20"
                  height="110"
                />
                <text class="day5-sugar_text" x="375" y="25">105</text>

                <!-- Sat -->
                <rect
                  class="day6-bp_bar bp-bar bp-sat-bar"
                  x="425"
                  y="60"
                  width="20"
                  height="80"
                />
                <text class="day6-bp_text" x="425" y="55">125</text>

                <rect
                  class="sugar-bar day6-bp_bar sugar-sat-bar"
                  x="450"
                  y="40"
                  width="20"
                  height="100"
                />
                <text class="day6-sugar_text" x="450" y="35">110</text>

                <!-- Sun -->
                <rect
                  class="day7-bp_bar bp-bar bp-sun-bar"
                  x="500"
                  y="50"
                  width="20"
                  height="90"
                />
                <text class="day7-bp_text" x="500" y="45">130</text>

                <rect
                  class="sugar-bar day7-bp_bar sugar-sun-bar"
                  x="525"
                  y="30"
                  width="20"
                  height="110"
                />
                <text class="day7-sugar_text" x="525" y="25">120</text>

                <!-- Labels -->
                <text class="bar-say__texts text-mon" x="40" y="156">Mon</text>
                <text class="bar-say__texts text-tue" x="115" y="156">Tue</text>
                <text class="bar-say__texts text-wed" x="190" y="156">Wed</text>
                <text class="bar-say__texts text-thu" x="265" y="156">Thu</text>
                <text class="bar-say__texts text-fri" x="340" y="156">Fri</text>
                <text class="bar-say__texts text-sat" x="415" y="156">Sat</text>
                <text class="bar-say__texts text-sun" x="490" y="156">Sun</text>
              </svg>

              <div class="legend-container flex-container">
                <span class="legend-text normal-text flex-col">
                  Blood Pressure Level<span class="in-legend legend"></span
                ></span>

                <span class="legend-text normal-text flex-col">
                  Blood Sugar Level<span class="out-legend legend"></span
                ></span>
              </div>
            </div>
          </div>

          <form class="cards health-form flex-col">
            <h3 class="cards-header">Log Health Metrics</h3>
            <div class="detail-value flex-col">
              <label class="cards-description normal-text" for="bp-systolic"
                >Blood Pressure (Systolic)</label
              >
              <input
                class="input normal-text cards-description bp-systolic"
                type="number"
                id="bp-systolic"
                name="bp-systolic"
                min="50"
                max="250"
                placeholder="e.g., 120"
              />
            </div>
            <div class="detail-value flex-col">
              <label class="cards-description normal-text" for="bp-diastolic"
                >Blood Pressure (Diastolic)</label
              >
              <input
                class="input normal-text cards-description bp-diastolic"
                type="number"
                id="bp-diastolic"
                name="bp-diastolic"
                min="30"
                max="150"
                placeholder="e.g., 80"
              />
            </div>
            <div class="detail-value flex-col">
              <label class="cards-description normal-text" for="blood-sugar"
                >Blood Sugar (mg/dL)</label
              >
              <input
                class="input normal-text cards-description blood-sugar"
                type="number"
                id="blood-sugar"
                name="blood-sugar"
                min="20"
                max="500"
                placeholder="e.g., 100"
              />
            </div>
            <button type="submit" class="btn-primary health-btn">
              Log Health
            </button>
          </form>
        </div>
      </div>
    </main>

    <!-- JS -->
    <script defer src="../assets/js/progresshealth.js"></script>

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
