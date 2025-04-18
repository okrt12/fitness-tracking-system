<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FitTrack+ | Signup</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="../assets/css/general.css" />
    <link rel="stylesheet" href="../assets/css/signup.css" />
  </head>
  <body>
    <main class="signup-section">
      <div class="signup-container container">
        <div class="header-container flex-col detail-value">
          <h2 class="heading-secondary">
            Create Your <span class="heading-color">FitTrack+</span> Account
          </h2>
        </div>
        <form class="signup-form grid--2-cols container form">
          <div class="detail-value label-input flex-col">
            <label for="fullname" class="normal-text cards-description"
              >Full Name</label
            >
            <input
              type="text"
              id="fullname"
              class="input normal-text cards-description fullname"
              placeholder="Enter your full name"
              required
            />
          </div>

          <div class="detail-value label-input flex-col">
            <label for="email" class="normal-text cards-description"
              >Email Address</label
            >
            <input
              type="email"
              id="email"
              autocomplete="username"
              class="input normal-text cards-description email"
              placeholder="Enter your email"
              required
            />
          </div>

          <div class="detail-value label-input flex-col password-container">
            <label for="password" class="normal-text cards-description"
              >Password</label
            >
            <input
              type="password"
              id="create-password"
              autocomplete="new-password"
              class="input normal-text cards-description create-password password"
              placeholder="Create a password"
              required
            />

            <ion-icon
              class="password-icon create_show"
              name="eye-outline"
            ></ion-icon>
            <ion-icon
              class="password-icon hide-icon create_hide"
              name="eye-off-outline"
            ></ion-icon>
          </div>

          <div class="detail-value label-input flex-col password-container">
            <label for="password" class="normal-text cards-description"
              >Confirm Password</label
            >
            <input
              type="password"
              id="confirm-password"
              autocomplete="new-password"
              class="input normal-text cards-description confirm-password password"
              placeholder="Confirm a password"
              required
            />
            <ion-icon
              class="password-icon confirm_show-password"
              name="eye-outline"
            ></ion-icon>
            <ion-icon
              class="password-icon hide-icon confirm_hide-password"
              name="eye-off-outline"
            ></ion-icon>
          </div>

          <div class="flex-col detail-value">
            <label for="age" class="normal-text cards-description">Age</label>
            <input
              type="number"
              id="age"
              class="input normal-text cards-description"
              placeholder="Enter your age"
              min="12"
              max="120"
              required
            />
          </div>

          <div class="detail-value label-input flex-col">
            <label for="height" class="normal-text cards-description"
              >Height (cm)</label
            >
            <input
              type="number"
              id="height"
              class="input normal-text cards-description"
              placeholder="Enter your height"
              min="100"
              max="250"
              required
            />
          </div>

          <div class="detail-value label-input flex-col">
            <label for="weight" class="normal-text cards-description"
              >Weight (kg)</label
            >
            <input
              type="number"
              id="weight"
              class="input normal-text cards-description"
              placeholder="Enter your weight"
              min="30"
              max="300"
              step="0.1"
              required
            />
          </div>
          <div class="detail-value label-input flex-col">
            <label class="normal-text cards-description">Gender</label>
            <select
              id="gender"
              name="gender"
              class="input normal-text cards-description"
            >
              <option class="input normal-text cards-description" value="">
                Choose Your Gender
              </option>
              <option
                name="gender"
                class="input normal-text cards-description"
                value="male"
              >
                Male
              </option>
              <option
                name="gender"
                class="input normal-text cards-description"
                value="female"
              >
                Female
              </option>
            </select>
          </div>

          <div class="detail-value label-input flex-col">
            <label for="fitness-goal" class="normal-text cards-description"
              >Fitness Goal</label
            >
            <select
              id="fitness-goal"
              class="input normal-text cards-description"
              name="fitness-goal"
              required
            >
              <option class="normal-text" value="" disabled selected>
                Select your goal
              </option>
              <option
                class="normal-text"
                name="fitness-goal"
                value="lose-weight"
              >
                Lose Weight
              </option>
              <option
                class="normal-text"
                name="fitness-goal"
                value="gain-muscle"
              >
                Gain Muscle
              </option>
              <option class="normal-text" name="fitness-goal" value="maintain">
                Maintain Fitness
              </option>
              <option
                class="normal-text"
                name="fitness-goal"
                value="improve-endurance"
              >
                Improve Endurance
              </option>
              <option class="normal-text" name="fitness-goal" value="other">
                Other
              </option>
            </select>
          </div>
          <div class="flex-col detail-value">
            <label
              class="normal-text cards-description input-label"
              for="diseases"
              >Diseases (Optional)</label
            >
            <select
              id="diseases"
              name="diseases"
              class="input normal-text cards-description"
            >
              <option class="input normal-text cards-description" value="none">
                None
              </option>
              <option
                class="input normal-text cards-description"
                name="diseases"
                value="diabetes"
              >
                Diabetes
              </option>
              <option
                class="input normal-text cards-description"
                name="diseases"
                value="hypertension"
              >
                Hypertension
              </option>
            </select>
          </div>

          <button type="submit" class="btn-primary signup-btn">
            Create Account
          </button>

          <div class="login-link">
            <p class="normal-text cards-description login-link">
              Already have an account?
              <a href="/pages/login.php" class="text-link">Log in</a>
            </p>
          </div>
        </form>
      </div>
    </main>

    <!-- JS -->
    <script type="module" src="/assets/js/signup.js"></script>
    <!-- <script src="/assets/js/common.js"></script> -->

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
