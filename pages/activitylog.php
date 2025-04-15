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
          <li class="sidebar-btns home">
            <div class="icon-text">
              <ion-icon
                class="icons sidebar-icons"
                name="home-outline"
              ></ion-icon>
              <a href="/pages/dashboard.php" class="sidebar-btn">Dashboard</a>
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
          <li class="sidebar-btns active">
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
          <li class="sidebar-btns profile-btn">
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

      <div class="main-logs">
        <h3 class="heading-tertiary logs-header">
          <span class="heading-color">FitTrack+</span> Workout & Diet
        </h3>

        <div class="logs-cards">
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

          <div class="schedule-workout cards">
            <h3 class="cards-header">Schedule Workouts</h3>
            <form class="schedule-workout__form">
              <div class="detail-value flex-col">
                <label class="normal-text cards-description" for="schedule-date"
                  >Date</label
                >
                <input
                  class="input normal-text cards-description"
                  type="date"
                  id="schedule-date"
                  name="schedule-date"
                  required
                />
              </div>
              <div class="detail-value flex-col">
                <label class="normal-text cards-description" for="schedule-type"
                  >Workout Type</label
                >
                <select
                  class="input cards-description normal-text"
                  id="schedule-type"
                  name="schedule-type"
                  required
                >
                  <option value="running">Running</option>
                  <option value="lifting">Weight Lifting</option>
                  <option value="cycling">Cycling</option>
                  <option value="yoga">Yoga</option>
                </select>
              </div>

              <div class="detail-value flex-col">
                <label class="normal-text cards-description" for="schedule-time"
                  >Time</label
                >
                <input
                  class="input normal-text cards-description"
                  type="time"
                  id="schedule-time"
                  name="schedule-time"
                  required
                />
              </div>

              <div class="detail-value flex-col">
                <label
                  class="normal-text cards-description"
                  for="schedule-duration"
                  >Duration (minutes)</label
                >
                <input
                  class="input normal-text cards-description"
                  type="number"
                  id="schedule-duration"
                  name="schedule-duration"
                  min="1"
                  max="240"
                  value="30"
                />
              </div>
              <div class="flex-container">
                <input
                  class="normal-text cards-description"
                  type="checkbox"
                  id="weekly-repeat"
                  name="weekly-repeat"
                />
                <label
                  class="normal-text cards-description"
                  for="weekly-repeat"
                >
                  Repeat Weekly
                </label>
              </div>
              <button type="submit" class="btn-primary schedule-btn">
                Schedule Workout
              </button>
            </form>
          </div>
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
