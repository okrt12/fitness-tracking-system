<?php include "../backend/auth/session.php"; ?>
<?php include "../backend/auth/auth_check.php"; ?>

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

    <link rel="stylesheet" href="../assets/css/activitylog.css" />
    <link rel="stylesheet" href="../assets/css/general.css" />

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
          <form
            id="add-meal-form"
            name="add-meal"
            class="add-meal-form meal-form cards"
          >
            <h3 class="cards-header">
              Add a New Meal to <span class="heading-color">FitTrack+</span>
            </h3>
            <div class="detail-value flex-col">
              <label for="meal-name" class="normal-text cards-description"
                >Meal Name</label
              >
              <input
                type="text"
                id="meal-name"
                name="name"
                class="input normal-text cards-description"
                placeholder="e.g., My Smoothie"
                required
              />
            </div>
            <div class="detail-value flex-col">
              <label for="meal-calories" class="normal-text cards-description"
                >Calories per Serving</label
              >
              <input
                type="number"
                id="meal-calories"
                name="calories"
                class="input normal-text cards-description"
                placeholder="e.g., 200"
              />
            </div>
            <div class="detail-value flex-col">
              <label for="meal-carbs" class="normal-text cards-description"
                >Carbs (g)</label
              >
              <input
                type="number"
                id="meal-carbs"
                name="carbs"
                class="input normal-text cards-description"
                placeholder="e.g., 30.5"
                step="0.1"
              />
            </div>
            <div class="detail-value flex-col">
              <label for="meal-fats" class="normal-text cards-description"
                >Fats (g)</label
              >
              <input
                type="number"
                id="meal-fats"
                name="fats"
                class="input normal-text cards-description"
                placeholder="e.g., 10.2"
                step="0.1"
              />
            </div>
            <div class="detail-value flex-col">
              <label for="meal-protein" class="normal-text cards-description"
                >Protein (g)</label
              >
              <input
                type="number"
                id="meal-protein"
                name="protein"
                class="input normal-text cards-description"
                placeholder="e.g., 25.0"
                step="0.1"
              />
            </div>
            <div class="detail-value flex-col">
              <label for="meal-category" class="normal-text cards-description"
                >Category</label
              >
              <select
                id="meal-category"
                name="category"
                class="input normal-text cards-description"
              >
                <option value="">Select Category (Optional)</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
                <option value="Snack">Snack</option>
              </select>
            </div>
            <button type="submit" class="btn-primary meal__btn" name="add-meal">
              Add Meal
            </button>
          </form>

          <form id="log-meal-form" class="log-meal cards" name="log-meal">
            <h3 class="cards-header">Log Meal</h3>
            <div class="detail-value flex-col">
              <label for="meal-id" class="normal-text cards-description"
                >Meal</label
              >
              <select
                id="meal-id"
                name="meal_id"
                class="input normal-text cards-description"
                required
              >
                <option value="">Select a Meal</option>
              </select>
            </div>
            <div class="detail-value flex-col">
              <label for="quantity" class="normal-text cards-description"
                >Quantity (Servings)</label
              >
              <input
                type="number"
                id="quantity"
                name="quantity"
                class="input normal-text cards-description"
                placeholder="e.g., 2"
                step="0.1"
                min="0"
                required
              />
            </div>

            <div class="detail-value flex-col">
              <label for="calories" class="normal-text cards-description"
                >Calories (Calculated)</label
              >
              <input
                type="number"
                id="calories"
                name="calories"
                class="input normal-text cards-description"
                placeholder="e.g., 400"
                readonly
              />
            </div>
            <button
              type="submit"
              class="btn-primary log-meal__btn log_meal-btn"
              name="log-meal"
            >
              Log Meal
            </button>
          </form>

          <!-- Workout -->
          <div class="flex-col detail-value">
            <form
              id="add-workout-form"
              class="add-workout-form workout-form cards"
              name="add-workout"
            >
              <h3 class="cards-header">Add Workout</h3>
              <div class="detail-value flex-col">
                <label for="workout-name" class="normal-text cards-description"
                  >Workout Name</label
                >
                <input
                  type="text"
                  id="workout-name"
                  name="name"
                  class="input normal-text cards-description"
                  placeholder="e.g., Treadmill Run"
                  required
                />
              </div>
              <div class="detail-value flex-col">
                <label
                  for="workout-category"
                  class="normal-text cards-description"
                  >Category</label
                >
                <select
                  id="workout-category"
                  name="category"
                  class="input normal-text cards-description"
                >
                  <option value="">Select Category (Optional)</option>
                  <option value="Cardio">Cardio</option>
                  <option value="Strength">Strength</option>
                  <option value="Yoga">Yoga</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="detail-value flex-col">
                <label
                  for="calories-per-hour"
                  class="normal-text cards-description"
                  >Calories Burned per Hour</label
                >
                <input
                  type="number"
                  id="calories-per-hour"
                  name="calories_per_hour"
                  class="input normal-text cards-description"
                  placeholder="e.g., 600"
                />
              </div>
              <button
                type="submit"
                class="btn-primary workout-btn add-workout_btn"
                name="add-workout"
              >
                Add Workout
              </button>
            </form>

            <form
              id="log-workout-form"
              class="log-workout workout-form cards"
              name="log-workout"
            >
              <h3 class="cards-header">Log Workout</h3>
              <div class="detail-value flex-col">
                <label for="workout-id" class="normal-text cards-description"
                  >Workout</label
                >
                <select
                  id="workout-id"
                  name="workout_id"
                  class="input normal-text cards-description"
                  required
                >
                  <option value="">Select a Workout</option>
                </select>
              </div>
              <div class="detail-value flex-col">
                <label for="duration" class="normal-text cards-description"
                  >Duration (Minutes)</label
                >
                <input
                  type="number"
                  id="duration"
                  name="duration"
                  class="input normal-text cards-description"
                  placeholder="e.g., 30"
                  min="0"
                />
              </div>

              <div class="detail-value flex-col">
                <label
                  for="calories-burned"
                  class="normal-text cards-description"
                  >Calories Burned (Calculated)</label
                >
                <input
                  type="number"
                  id="calories-burned"
                  name="calories_burned"
                  class="input normal-text cards-description"
                  placeholder="e.g., 300"
                  readonly
                />
              </div>
              <button
                type="submit"
                class="btn-primary log-workout_btn workout-btn"
                name="log-workout"
              >
                Log Workout
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>

    <!-- JS -->
    <script type="module" src="/assets/js/activitylog.js"></script>

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
