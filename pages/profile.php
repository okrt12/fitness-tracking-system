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

    <link rel="stylesheet" href="../assets/css/profile.css" />
    <link rel="stylesheet" href="../assets/css/general.css" />
    <title>FitTrack+ | Profile</title>
  </head>
  <body>
    <div class="backdrop hidden"></div>
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
              class="icon-text sidebar-btn sidebar-btns active-page"
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
      <div class="profile-container">
        <h2 class="heading-tertiary profile-header">Profile & Goal Settings</h2>
        <div class="profile-cards container">
          <!-- Cards -->
          <div class="cards personal-information">
            <h3 class="cards-header">Personal Information</h3>
            <div class="flex-col detail-value">
              <p class="normal-text cards-description info-text">Name</p>
              <span class="normal-text cards-description info-name"
                ></span
              >
            </div>
            <div class="flex-col detail-value">
              <p class="normal-text cards-description info-text">Age:</p>
              <span class="normal-text cards-description info-age"></span>
            </div>
            <div class="flex-col detail-value">
              <p class="normal-text cards-description info-text">Height(cm):</p>
              <span class="normal-text cards-description info-height"></span>
            </div>
            <div class="flex-col detail-value">
              <p class="normal-text cards-description info-text">Weight(kg):</p>
              <span class="normal-text cards-description info-weight"></span>
            </div>

            <button class="btn-primary info-btn edit-info__btn">
              Update Info
            </button>
          </div>

          <form class="cards personal-information__popup popup hidden">
            <h3 class="cards-header">Personal Information</h3>

            <div class="flex-col detail-value">
              <label
                class="normal-text cards-description input-label"
                for="name"
                >Name</label
              >
              <input
                class="input personal-information__input normal-text name cards-description"
                type="text"
                id="name"
                name="name"
                required
              />
            </div>
            <div class="flex-col detail-value">
              <label class="normal-text cards-description input-label" for="age"
                >Age</label
              >
              <input
                class="input personal-information__input normal-text age cards-description"
                type="number"
                id="age"
                name="age"
                min="1"
                max="120"
                required
              />
            </div>

            <div class="flex-col detail-value">
              <label
                class="normal-text cards-description input-label"
                for="height"
                >Height (cm)</label
              >
              <input
                class="input personal-information__input normal-text height cards-description"
                type="number"
                id="height"
                name="height"
                min="100"
                max="250"
                required
              />
            </div>

            <div class="flex-col detail-value">
              <label
                class="normal-text cards-description input-label"
                for="weight"
                >Weight (kg)</label
              >
              <input
                class="input personal-information__input normal-text weight cards-description"
                type="number"
                id="weight"
                name="weight"
                min="20"
                max="500"
                required
              />
            </div>
            <button type="submit" class="btn-primary info-btn save-info__btn">
              Save
            </button>
          </form>

          <!-- BMI and Goals -->
          <div class="flex-col goal-bmi">
            <div class="cards goal">
              <h3 class="cards-header">Fitness Goal</h3>
              <div class="flex-col detail-value">
                <p class="normal-text cards-description info-text">Goal</p>
                <span class="normal-text cards-description goal-text"
                  >Muscle Gain(Bulking)
                </span>
              </div>
              <p class="normal-text cards-description recommendation">
                Recommendation: Based on your BMI (<span class="bmi-value">24.5</span>), we suggest
                <strong class="heading-color">bulking</strong> for muscle gain.
              </p>
              <button class="btn-primary goal-btn edit-goal__btn">
                Set Goals
              </button>
            </div>

            <form class="cards goals-popup popup hidden">
              <h3 class="cards-header">Fitness Goal</h3>

              <label class="normal-text cards-description" for="goal"
                >Select Goal</label
              >
              <select class="input goal-select" id="goal" name="goal">
                <option
                  name="goal"
                  class="input cards-description"
                  value="weight_loss"
                >
                  Weight Loss
                </option>
                <option
                  name="goal"
                  class="input cards-description"
                  value="muscle_gain"
                  selected
                >
                  Muscle Gain(Bulking)
                </option>

                <option class="normal-text cards-description" name="fitness-goal" value="maintain">
                Maintain Fitness
              </option>

                <option
                  name="goal"
                  class="input cards-description"
                  value="improve_endurance" 
                >
                  Improve Endurance
                </option>
                <option class="normal-text cards-description" name="goal" value="other">
                Other
              </option>
              </select>
              <button type="submit" class="btn-primary goal-btn save-goal__btn">
                Save Goal
              </button>
            </form>

            <!-- BMI -->
            <div class="cards bmi">
              <h3 class="cards-header">BMI</h3>
              <p class="normal-text cards-description">BMI: <span class="bmi-value">24.5</span> (<span class="bmi-status">Normal</span>)</p>
              <p class="normal-text cards-description">
                Ideal Weight: <span class="ideal-weight">74</span>kg
              </p>
              <p class="normal-text cards-description">
                Based on your BMI (<span class="bmi-value">24.5</span>), <span class="recommendation">Maintain or gain muscle
                with a balanced diet</span>
              </p>
            </div>
          </div>

          <div class="cards achievements">
            <h3 class="cards-header">Achievements</h3>
            <div class="flex-col achievement-tags__container">
              <span class="cards-description achievement-tags normal-text"
                >🏅 5kg Lost</span
              >
              <span class="cards-description achievement-tags normal-text"
                >💪 10 Days Logged</span
              >
              <span class="cards-description achievement-tags normal-text"
                >🔥 1 Month Streak</span
              >
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Js -->
    <script type="module" src="../assets/js/profile.js"></script>
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
