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

        <div class="workout-cards container">
          <div class="schedule-workout cards">
            <h3 class="cards-header">Schedule Workouts</h3>
            <div class="schedule-workout__container">
              <form class="schedule-workout__form">
                <!-- <div class="detail-value flex-col">
                  <label
                    class="normal-text cards-description"
                    for="schedule-date"
                    >Date</label
                  >
                  <input
                    class="input normal-text cards-description"
                    type="date"
                    id="schedule-date"
                    name="schedule-date"
                    required
                  />
                </div> -->
                <div class="detail-value flex-col">
                  <label
                    class="normal-text cards-description"
                    for="schedule-type"
                    >Workout Day</label
                  >
                  <select
                    class="input cards-description normal-text"
                    id="schedule-day"
                    name="schedule-day"
                    required
                  >
                    <option value="">Select Day</option>
                    <option value="Mon">Monday</option>
                    <option value="Tue">Tuesday</option>
                    <option value="Wed">Wednesday</option>
                    <option value="Thu">Thursday</option>
                    <option value="Fri">Friday</option>
                    <option value="Sat">Saturday</option>
                    <option value="Sun">Sunday</option>
                  </select>
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

              <div class="calendar">
                <h3 class="cards-header">This Week</h3>
                <div class="calendar-grid">
                  <div class="day day-1 mon">
                    <p class="day-label normal-text cards-description">Mon</p>
                    <div class="workout normal-text cards-description">
                      <span>Running</span> <br />
                      <span>7:00 AM</span><br />
                      <span>30 min</span>
                    </div>
                    <div class="flex-container detail-value day-icons">
                      <ion-icon
                        class="icons day-icon add-icon"
                        name="add-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon edit-icon"
                        name="pencil-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon del-icon"
                        name="trash-outline"
                      ></ion-icon>
                    </div>
                  </div>
                  <div class="day day-2 tue">
                    <p class="day-label normal-text cards-description">Tue</p>
                    <div class="workout normal-text cards-description empty">
                      <span>No Workout</span>
                    </div>
                    <div class="flex-container detail-value day-icons">
                      <ion-icon
                        class="icons day-icon add-icon"
                        name="add-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon edit-icon"
                        name="pencil-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon del-icon"
                        name="trash-outline"
                      ></ion-icon>
                    </div>
                  </div>
                  <div class="day day-3 wed">
                    <p class="day-label normal-text cards-description">Wed</p>
                    <div class="workout normal-text cards-description">
                      <span>Lifting</span> <br />
                      <span> 6:00 PM</span><br />
                      <span>45 min</span>
                    </div>
                    <div class="flex-container detail-value day-icons">
                      <ion-icon
                        class="icons day-icon add-icon"
                        name="add-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon edit-icon"
                        name="pencil-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon del-icon"
                        name="trash-outline"
                      ></ion-icon>
                    </div>
                  </div>
                  <div class="day day-4 thu">
                    <p class="day-label normal-text cards-description">Thu</p>
                    <div class="workout normal-text cards-description empty">
                      <span>No Workout</span>
                    </div>
                    <div class="flex-container detail-value day-icons">
                      <ion-icon
                        class="icons day-icon add-icon"
                        name="add-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon edit-icon"
                        name="pencil-outline"
                      ></ion-icon>
                      <ion-icon
                        class="icons day-icon del-icon"
                        name="trash-outline"
                      ></ion-icon>
                    </div>
                  </div>

                  <div class="spacer">
                    <div class="day day-5 today fri">
                      <p class="day-label normal-text cards-description">Fri</p>
                      <div class="workout normal-text cards-description">
                        <span>Yoga</span> <br />
                        <span>8:00 AM</span><br />
                        <span>60 min</span>
                      </div>
                      <div class="flex-container detail-value day-icons">
                        <ion-icon
                          class="icons day-icon add-icon"
                          name="add-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon edit-icon"
                          name="pencil-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon del-icon"
                          name="trash-outline"
                        ></ion-icon>
                      </div>
                    </div>
                    <div class="day day-6 sat">
                      <p class="day-label normal-text cards-description">Sat</p>
                      <div class="workout normal-text cards-description empty">
                        <span> No Workout</span>
                      </div>
                      <div class="flex-container detail-value day-icons">
                        <ion-icon
                          class="icons day-icon add-icon"
                          name="add-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon edit-icon"
                          name="pencil-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon del-icon"
                          name="trash-outline"
                        ></ion-icon>
                      </div>
                    </div>
                    <div class="day day-7 sun">
                      <p class="day-label normal-text cards-description">Sun</p>
                      <div class="workout normal-text cards-description">
                        <span>Cycling</span><br />
                        <span>9:00 AM</span><br />
                        <span>40 min</span>
                      </div>
                      <div class="flex-container detail-value day-icons">
                        <ion-icon
                          class="icons day-icon add-icon"
                          name="add-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon edit-icon"
                          name="pencil-outline"
                        ></ion-icon>
                        <ion-icon
                          class="icons day-icon del-icon"
                          name="trash-outline"
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
