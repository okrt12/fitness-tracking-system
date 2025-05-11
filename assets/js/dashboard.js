import { getData, getBMIStatus, goals } from "./common.js";
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

// Variables
const dashboardHeader = document.querySelector(".header");
const days = {
  1: "Monday",
  2: "Tuesday",
  3: "Wednesday",
  4: "Thursday",
  5: "Friday",
  6: "Saturday",
  0: "Sunday",
};
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
const dashboardDate = new Date();
const strDate = dashboardDate.toDateString().split(" ").splice(1).join(" ");

const dashboardDateHtml = `<p class="header-date normal-text">Today is ${strDate}</p>`;
dashboardHeader.insertAdjacentHTML("beforeend", dashboardDateHtml);

/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// Graphs    ////////////////////////////////////////////
// Progress Chart
const circle = document.querySelector("svg circle:nth-of-type(2)");
const pieText = document.querySelector(".pie-text");
const progressText = document.querySelector(".progress-text");

////////////////////////////////////////////////////////////////////////////////////////////
const qouteDom = document.querySelector(".quote");
const factDom = document.querySelector(".fact");
const bmiStatus = document.querySelector(".bmi-status");
const bmiValue = document.querySelector(".bmi-value");
const fitnessGoal = document.querySelector(".goal");

const waterIntake = document.querySelector(".water-intake");
const weekWorkouts = document.querySelector(".week-workouts");
const calBurned = document.querySelector(".calorie-burned");
const calConsumed = document.querySelector(".calorie-consumed");

async function updateQuoteFacts() {
  const factQuoteData = await getData(
    "../backend/api/get-motivational-content.php"
  );
  const qoute = factQuoteData.data.filter((el) => el.type === "quote");
  const fact = factQuoteData.data.filter((el) => el.type === "fact");
  qouteDom.textContent = qoute[0].content;
  factDom.textContent = fact[0].content;
}

const maxHeight = 130;
const valueToHeight = (value, maxValue) => (value / maxValue) * maxHeight;
const calcBarY = (height) => 140 - height;

const claorieBurnBar = document.querySelector(".calorie-burned__bar");
const claorieConBar = document.querySelector(".calorie-consumed__bar");
const claorieBurnText = document.querySelector(".calorie-burned__text");
const claorieConText = document.querySelector(".calorie-consumed__text");
const barChart = document.querySelector(".bar-chart");
const noData = document.querySelector(".no_data");
const progrssChart = document.querySelector(".chart-text");
const noDataProgress = document.querySelector(".progress_no_data");
const workoutScheduleCard = document.querySelector(".workout_schedule");

async function todaySchedule(workoutSchedule) {
  const date = new Date();
  const today = days[date.getDay()];

  const todaySchedule = workoutSchedule.data.filter(
    (el) => el.day_of_week === today
  );

  console.log(today);
  console.log(todaySchedule);
  const html =
    todaySchedule[0] && todaySchedule[0].workout_day_name !== "No Workout"
      ? `
        <span class = "normal-text cards-description workout_day_name">Wrokout Day: ${
          todaySchedule[0].day_of_week
        }</span>
    <span class = "normal-text cards-description workout_day_name">Wrokout day name: ${
      todaySchedule[0].workout_day_name
    }</span>

    <span class = "normal-text cards-description schedule_time">Time: ${todaySchedule[0].time
      .split("")
      .splice(0, 5)
      .join("")}</span>
      
    <span class = "normal-text cards-description schedule_duration">Duration: ${
      todaySchedule[0].duration >= 60
        ? Math.floor(todaySchedule[0].duration / 60) + " hr"
        : todaySchedule[0].duration + " min"
    }</span> 
    <span class = "normal-text cards-description">${
      todaySchedule[0].duration > 60 && todaySchedule[0].duration % 60 !== 0
        ? (todaySchedule[0].duration % 60) + " min"
        : ""
    }</span>
    </div>
    `
      : `<span>No Workout</span>`;
  workoutScheduleCard.insertAdjacentHTML("beforeend", html);
}

async function updateStatsCalorie() {
  const workout = await getData("../backend/api/get-workout-log.php");
  const meal = await getData("../backend/api/get-meal-log.php");
  const workoutSchedules = await getData(
    "../backend/api/get-workouts-schedule.php"
  );
  todaySchedule(workoutSchedules);

  if (!workout.data.length || !meal.data.length) {
    barChart.classList.add("hidden");
    noData.classList.remove("hidden");
    return;
  }
  barChart.classList.remove("hidden");
  noData.classList.add("hidden");
  const totalBurnedCal = workout.data.reduce(
    (sum, log) => sum + log.calories_burned,
    0
  );

  const totalConsumedCal = meal.data
    .map((el) => {
      return el.calories * el.quantity;
    })
    .reduce((sum, log) => sum + log, 0);

  calBurned.textContent = claorieBurnText.textContent =
    totalBurnedCal + " kcal";
  calConsumed.textContent = claorieConText.textContent =
    totalConsumedCal + " kcal";
  weekWorkouts.textContent = workoutSchedules.data.length + "/7";
  const heightCon = valueToHeight(
    totalConsumedCal,
    totalConsumedCal + totalBurnedCal
  );
  const heightBur = valueToHeight(
    totalBurnedCal,
    totalConsumedCal + totalBurnedCal
  );

  claorieBurnBar.setAttribute("height", heightBur);
  claorieConBar.setAttribute("height", heightCon);

  claorieBurnBar.setAttribute("y", calcBarY(heightBur));
  claorieConBar.setAttribute("y", calcBarY(heightCon));

  claorieBurnText.setAttribute("y", calcBarY(heightBur) - 5);
  claorieConText.setAttribute("y", calcBarY(heightCon) - 5);
}

async function updateUI() {
  const userData = await getData("../backend/api/get-user-info.php");
  const userProgress = await getData("../backend/api/get-progress.php");
  document.querySelector(".username").textContent = userData.name;
  bmiStatus.textContent = userProgress.data.length
    ? "(" + getBMIStatus(userProgress.data[0].bmi) + ")"
    : "(" + getBMIStatus(userData.bmi) + ")";

  bmiValue.textContent = userProgress.data.length
    ? userProgress.data[0].bmi
    : userData.bmi;
  fitnessGoal.textContent = goals[userData.goal];
  if (!userProgress.data.length) {
    noDataProgress.classList.remove("hidden");
    progrssChart.classList.add("hidden");
    return;
  }

  const currWeight = userProgress.data[0]
    ? userProgress.data[0].weight
    : userData.weight;
  const progressPercent = Math.round(
    ((userData.goal_weight - currWeight) / userData.goal_weight) * 100
  );

  pieText.textContent = progressText.textContent = 100 - progressPercent + "%";
  circle.setAttribute(
    "stroke-dashoffset",
    314 - (314 * (100 - progressPercent)) / 100
  );
  document.querySelector(".weight_goal").textContent =
    userData.goal_weight + " kg";
  document.querySelector(".current_weight").textContent = currWeight + " kg";
}

updateUI();
updateQuoteFacts();
updateStatsCalorie();
