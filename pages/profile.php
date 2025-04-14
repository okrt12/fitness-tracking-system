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

    <link rel="stylesheet" href="/assets/css/profile.css" />
    <link rel="stylesheet" href="/assets/css/general.css" />
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
      <div class="profile-container">
        <h2 class="heading-tertiary profile-header">Profile & Goal Settings</h2>
        <div class="profile-cards container">
          <!-- Cards -->
          <div class="cards personal-information">
            <h3 class="cards-header">Personal Information</h3>
            <div class="flex-col detail-value">
              <p class="normal-text cards-description info-text">Name</p>
              <span class="normal-text cards-description info-name"
                >Abel Alebachewu</span
              >
            </div>
            <div class="flex-col detail-value">
              <p class="normal-text cards-description info-text">Age:</p>
              <span class="normal-text cards-description info-age">22</span>
            </div>
            <div class="flex-col detail-value">
              <p class="normal-text cards-description info-text">Height(cm):</p>
              <span class="normal-text cards-description info-height">180</span>
            </div>
            <div class="flex-col detail-value">
              <p class="normal-text cards-description info-text">Weight(kg):</p>
              <span class="normal-text cards-description info-weight">75</span>
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
                value="Alex Smith"
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
                value="30"
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
                value="175"
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
                value="75"
                min="20"
                max="500"
                required
              />
            </div>
            <!-- <div class="flex-col detail-value">
              <label
                class="normal-text cards-description input-label"
                for="diseases"
                >Diseases (Optional)</label
              >
               <select id="diseases" name="diseases" class="input">
                <option class="input normal-text" value="">None</option>
                <option class="input normal-text" value="diabetes">
                  Diabetes
                </option>
                <option class="input normal-text" value="hypertension">
                  Hypertension
                </option>
              </select> 
            </div>
            -->
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
                Recommendation: Based on your BMI (24.5), we suggest
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
                <option
                  name="goal"
                  class="input cards-description"
                  value="endurance"
                >
                  Endurance
                </option>
              </select>
              <button type="submit" class="btn-primary goal-btn save-goal__btn">
                Save Goal
              </button>
            </form>

            <!-- BMI -->
            <div class="cards bmi">
              <h3 class="cards-header">BMI</h3>
              <p class="normal-text cards-description">BMI: 24.5 (Normal)</p>
              <p class="normal-text cards-description">
                Ideal Weight Range: 66kg - 74kg
              </p>
              <p class="normal-text cards-description">
                Based on your BMI <span> (24.5)</span>, Maintain or gain muscle
                with a balanced diet
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
    <script src="/assets/js/profile.js"></script>
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
