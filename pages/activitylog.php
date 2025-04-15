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

    <link rel="stylesheet" href="/assets/css/activitylog.css" />
    <link rel="stylesheet" href="/assets/css/general.css" />

    <title>FitTrack+ | Log Workout</title>
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
              class="icon-text sidebar-btn sidebar-btns active-page"
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

      <div class="main-logs">
        <h3 class="heading-tertiary logs-header">
          <span class="heading-color">FitTrack+</span> Workout & Diet
        </h3>

        <div class="logs-cards container">
          <form class="workout-log cards">
            <h3 class="cards-header">Log Workout</h3>
            <div class="flex-col detail-value">
              <label for="workout-type " class="normal-text cards-description"
                >Workout Type</label
              >
              <select
                id="workout-type"
                name="workout-type"
                class="input"
                required
              >
                <option class="input normal-text" value="running">
                  Running
                </option>
                <option class="input normal-text" value="lifting">
                  Weight Lifting
                </option>
                <option class="input normal-text" value="cycling">
                  Cycling
                </option>
                <option class="input normal-text" value="yoga">Yoga</option>
              </select>
            </div>
            <div class="flex-col detail-value">
              <label
                for="workout-duration"
                class="normal-text cards-description"
                >Duration (minutes)</label
              >
              <input
                type="number"
                id="workout-duration"
                name="workout-duration"
                min="1"
                max="240"
                value="30"
                class="input normal-text cards-description"
              />
            </div>
            <div class="flex-col detail-value">
              <label
                for="workout-calories"
                class="normal-text cards-description"
                >Calories Burned</label
              >
              <input
                type="number"
                id="workout-calories"
                name="workout-calories"
                min="0"
                value="200"
                class="input normal-text cards-description"
              />
            </div>
            <button type="submit" class="btn-primary log-btn">
              Log Workout
            </button>
          </form>

          <form class="log-meal cards">
            <h3 class="cards-header">Log Meal</h3>
            <div class="flex-col detail-value">
              <label class="normal-text cards-description" for="meal-items"
                >Meal Items</label
              >
              <input
                type="text"
                id="meal-items"
                name="meal-items"
                placeholder="e.g., Chicken, Rice"
                class="input normal-text"
                required
              />
            </div>

            <div class="flex-col detail-value">
              <label class="normal-text cards-description" for="meal-calories"
                >Calories Consumed</label
              >
              <input
                type="number"
                id="meal-calories"
                name="meal-calories"
                min="0"
                value="500"
                class="input normal-text"
              />
            </div>
            <button type="submit" class="btn-primary log-meal__btn">
              Log Meal
            </button>
          </form>
        </div>
      </div>
    </main>

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
