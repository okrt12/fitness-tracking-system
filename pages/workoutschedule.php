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

    <link rel="stylesheet" href="../assets/css/general.css" />
    <link rel="stylesheet" href="../assets/css/workoutschedule.css" />
    <title>FitTrack+ | Workout Schedule</title>
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
              class="icon-text sidebar-btn sidebar-btns active-page"
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

      <div class="main-workout">
        <h3 class="heading-tertiary workout-header">
          <span class="heading-color">FitTrack+</span> Workout Schedule
        </h3>

        <div class="schedule-status_bar container">
          <div class="cards flex-col status-cards next-workout">
            <h3 class="cards-header">Next Workout</h3>
            <div class="timer_container flex-container">
              <div class="flex-container timer-label_unit">
                <div class="unit-container">
                  <span class="timer-unit" id="days">00</span>
                </div>
                <div class="label-container">
                  <span
                    class="timer-label day-label cards-description normal-text"
                    >Days</span
                  >
                </div>
              </div>
              <div class="flex-container timer-label_unit">
                <div class="unit-container">
                  <span class="timer-unit" id="hours">00</span>
                </div>
                <div class="label-container">
                  <span
                    class="timer-label hour-label cards-description normal-text"
                    >Hours</span
                  >
                </div>
              </div>

              <div class="flex-container timer-label_unit">
                <div class="unit-container">
                  <span class="timer-unit" id="minutes">00</span>
                </div>
                <div class="label-container">
                  <span
                    class="timer-label cards-description normal-text minute-label"
                    >Minutes</span
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="cards flex-col status-cards total-workout_container">
            <h3 class="cards-header">Weekly Workout Time</h3>
            <p class="cards-description normal-text total-workout_time">
              12 hrs
            </p>
          </div>
          <div class="cards flex-col status-cards">
            <h3 class="cards-header">Workout Days</h3>
            <div class="workout-days"></div>
          </div>
        </div>
        <!-- ----------------------------------------------------------------------------------------------------------------------------- -->
        <!-- ----------------------------------------------------------------------------------------------------------------------------- -->
        <div class="workout-cards container">
          <div class="schedule-workout cards">
            <h3 class="cards-header calendar-header">
              This Week Workout Schedule
            </h3>

            <div class="schedule-workout__container">
              <div class="popup yes-no__popup cards hidden">
                <p class="cards-description normal-text yes-no__text">
                  Are you Sure ?
                </p>
                <div class="flex-container">
                  <button type="submit" class="yes-no__btn yes">Yes</button>
                  <button type="submit" class="yes-no__btn no">No</button>
                </div>
              </div>

              <form class="schedule-workout__form popup hidden cards">
                <h3 class="cards-header">Schedule Workout Form</h3>
                <div class="detail-value flex-col">
                  <label
                    class="normal-text cards-description"
                    for="edit_schedule-type"
                    >Workout Day</label
                  >
                  <input
                    class="input normal-text cards-description"
                    type="text"
                    id="schedule-day"
                    name="schedule-day"
                    placeholder="Day"
                    readonly
                  />

                  <div class="detail-value flex-col">
                    <label
                      for="workout_day_name"
                      class="normal-text cards-description"
                      >Workout Day Name</label
                    >
                    <select
                      class="input cards-description normal-text"
                      id="workout_day_name"
                      name="workout_day_name"
                      required
                    >
                      <option value="">Select Workout Day</option>
                      <option value="Chest Day">Chest Day</option>
                      <option value="Back Day">Back Day</option>
                      <option value="Leg Day">Leg Day</option>
                      <option value="Arm Day">Arm Day</option>
                      <option value="Push Day">Push Day</option>
                      <option value="Pull Day">Pull Day</option>
                      <option value="Core Day">Core Day</option>
                      <option value="Full Body">Full Body</option>
                      <option value="Rest Day">Rest Day</option>
                    </select>
                  </div>
                </div>
                <div class="detail-value flex-col">
                  <label
                    class="normal-text cards-description"
                    for="schedule-type"
                    >Workout Type</label
                  >
                  <select
                    class="input cards-description normal-text"
                    id="schedule-type"
                    name="schedule-type"
                    required
                  >
                    <option value="">Select a Workout</option>
                  </select>
                </div>
                <div class="flex-container detail-value">
                  <div class="detail-value flex-col">
                    <label
                      class="normal-text cards-description"
                      for="schedule-time"
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
                      placeholder="Minutes"
                    />
                  </div>
                </div>
                <label class="custom-checkbox normal-text cards-description">
                  <input
                    type="checkbox"
                    id="weekly-repeat"
                    name="weekly-repeat"
                  />
                  <span class="checkmark"></span>
                  Repeat Weekly
                </label>
                <button type="submit" class="btn-primary schedule-btn">
                  Schedule Workout
                </button>
              </form>

              <form class="edit-schedule__form popup hidden cards">
                <h3 class="cards-header">Schedule Workout Form</h3>
                <div class="detail-value flex-col">
                  <label
                    class="normal-text cards-description"
                    for="edit_schedule-type"
                    >Workout Day</label
                  >
                  <input
                    class="input normal-text cards-description"
                    type="text"
                    id="edit_schedule-day"
                    name="schedule-day"
                    placeholder="Day"
                    readonly
                  />

                  <div class="detail-value flex-col">
                    <label
                      for="edit_workout_day_name"
                      class="normal-text cards-description"
                      >Workout Day Name</label
                    >
                    <select
                      class="input cards-description normal-text"
                      id="edit_workout_day_name"
                      name="workout_day_name"
                      required
                    >
                      <option value="">Select Workout Day</option>
                      <option value="Chest Day">Chest Day</option>
                      <option value="Back Day">Back Day</option>
                      <option value="Leg Day">Leg Day</option>
                      <option value="Arm Day">Arm Day</option>
                      <option value="Push Day">Push Day</option>
                      <option value="Pull Day">Pull Day</option>
                      <option value="Core Day">Core Day</option>
                      <option value="Full Body">Full Body</option>
                      <option value="Rest Day">Rest Day</option>
                    </select>
                  </div>
                </div>
                <div class="detail-value flex-col">
                  <label
                    class="normal-text cards-description"
                    for="edit_schedule-type"
                    >Workout Type</label
                  >
                  <select
                    class="input cards-description normal-text"
                    id="edit_schedule-type"
                    name="schedule-type"
                    required
                  >
                    <option value="">Select a Workout</option>
                  </select>
                </div>
                <div class="flex-container detail-value">
                  <div class="detail-value flex-col">
                    <label
                      class="normal-text cards-description"
                      for="edit_schedule-time"
                      >Time</label
                    >
                    <input
                      class="input normal-text cards-description"
                      type="time"
                      id="edit_schedule-time"
                      name="schedule-time"
                      required
                    />
                  </div>

                  <div class="detail-value flex-col">
                    <label
                      class="normal-text cards-description"
                      for="edit_schedule-duration"
                      >Duration (minutes)</label
                    >
                    <input
                      class="input normal-text cards-description"
                      type="number"
                      id="edit_schedule-duration"
                      name="schedule-duration"
                      min="1"
                      max="240"
                      placeholder="Minutes"
                    />
                  </div>
                </div>
                <label class="custom-checkbox normal-text cards-description">
                  <input
                    type="checkbox"
                    id="weekly-repeat"
                    name="weekly-repeat"
                  />
                  <span class="checkmark"></span>
                  Repeat Weekly
                </label>
                <button
                  type="submit"
                  class="btn-primary schedule-btn edit-schedule_btn"
                >
                  Change Schedule
                </button>
              </form>

              <div class="calendar">
                <div class="calendar-grid">
                  <!-- Day 1 -->
                  <div class="day mon">
                    <p class="day-label normal-text cards-description">Mon</p>
                    <div
                      class="workout day-1 normal-text cards-description"
                      data-schedule_id=""
                    ></div>
                    <div
                      class="flex-container detail-value day-icons"
                      data-day="1"
                    >
                      <ion-icon
                        class="icons day-icon add-icon"
                        name="add-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon edit-icon"
                        name="pencil-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons del-icon day-icon"
                        name="close-circle-outline"
                      ></ion-icon>
                    </div>
                  </div>

                  <!-- Day 2 -->
                  <div class="day tue">
                    <p class="day-label normal-text cards-description">Tue</p>
                    <div
                      data-schedule_id=""
                      class="workout day-2 normal-text cards-description"
                    ></div>
                    <div
                      class="flex-container detail-value day-icons"
                      data-day="2"
                    >
                      <ion-icon
                        class="icons day-icon add-icon"
                        name="add-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon edit-icon"
                        name="pencil-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons del-icon day-icon"
                        name="close-circle-outline"
                      ></ion-icon>
                    </div>
                  </div>

                  <!-- Day 3 -->
                  <div class="day wed">
                    <p class="day-label normal-text cards-description">Wed</p>
                    <div
                      class="workout day-3 normal-text cards-description"
                      data-schedule_id=""
                    ></div>
                    <div
                      class="flex-container detail-value day-icons"
                      data-day="3"
                    >
                      <ion-icon
                        class="icons day-icon add-icon"
                        name="add-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon edit-icon"
                        name="pencil-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons del-icon day-icon"
                        name="close-circle-outline"
                      ></ion-icon>
                    </div>
                  </div>

                  <!-- Day 4 -->
                  <div class="day thu">
                    <p class="day-label normal-text cards-description">Thu</p>
                    <div
                      data-schedule_id=""
                      class="workout day-4 normal-text cards-description empty"
                    ></div>
                    <div
                      class="flex-container detail-value day-icons"
                      data-day="4"
                    >
                      <ion-icon
                        class="icons day-icon add-icon"
                        name="add-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon edit-icon"
                        name="pencil-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons del-icon day-icon"
                        name="close-circle-outline"
                      ></ion-icon>
                    </div>
                  </div>

                  <div class="spacer">
                    <div class="day fri">
                      <p class="day-label normal-text cards-description">Fri</p>
                      <div
                        class="workout day-5 normal-text cards-description"
                        data-schedule_id=""
                      ></div>
                      <div
                        class="flex-container detail-value day-icons"
                        data-day="5"
                      >
                        <ion-icon
                          class="icons day-icon add-icon"
                          name="add-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon edit-icon"
                          name="pencil-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons del-icon day-icon"
                          name="close-circle-outline"
                        ></ion-icon>
                      </div>
                    </div>
                    <div class="day sat">
                      <p class="day-label normal-text cards-description">Sat</p>
                      <div
                        class="workout day-6 normal-text cards-description"
                        data-schedule_id=""
                      ></div>
                      <div
                        class="flex-container detail-value day-icons"
                        data-day="6"
                      >
                        <ion-icon
                          class="icons day-icon add-icon"
                          name="add-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon edit-icon"
                          name="pencil-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons del-icon day-icon"
                          name="close-circle-outline"
                        ></ion-icon>
                      </div>
                    </div>
                    <div class="day sun">
                      <p class="day-label normal-text cards-description">Sun</p>
                      <div
                        data-schedule_id=""
                        class="workout day-7 normal-text cards-description"
                      ></div>
                      <div
                        class="flex-container detail-value day-icons"
                        data-day="7"
                      >
                        <ion-icon
                          class="icons day-icon add-icon"
                          name="add-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon edit-icon"
                          name="pencil-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons del-icon day-icon"
                          name="close-circle-outline"
                        ></ion-icon>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- JS -->
    <script type="module" src="/assets/js/workoutschedule.js"></script>
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
