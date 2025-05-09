import { getData, getBMIStatus, goals } from "./common.js";
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

// Variables
const dashboardHeader = document.querySelector(".header");

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
const dashboardDate = new Date();
const strDate = dashboardDate.toDateString().split(" ").splice(1).join(" ");

const dashboardDateHtml = `<p class="header-date normal-text">Today is ${strDate}</p>`;
dashboardHeader.insertAdjacentHTML("beforeend", dashboardDateHtml);

/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// Graphs    ////////////////////////////////////////////
// Progress Chart
const progressPercent = 75;
const circle = document.querySelector("svg circle:nth-of-type(2)");
const pieText = document.querySelector(".pie-text");
const progressText = document.querySelector(".progress-text");
pieText.textContent = progressText.textContent = progressPercent + "%";

circle.setAttribute("stroke-dashoffset", 314 - (314 * progressPercent) / 100);
// Weight Progress

const weightProgressText = document.querySelector(".weight-progress__percent");
const weightProgressChart = document.querySelector(".weight-progress__chart");

const weightProgressPercent = 60;
weightProgressText.textContent = weightProgressPercent + "% ";
weightProgressChart.style.width = `${weightProgressPercent}%`;

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

async function updateStatsCalorie() {
  const workout = await getData("../backend/api/get-workout-log.php");
  const meal = await getData("../backend/api/get-meal-log.php");
  const workoutSchedules = await getData(
    "../backend/api/get-workouts-schedule.php"
  );
  console.log(!workout.data.length || !meal.data.length);
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
  console.log(userData);
  document.querySelector(".username").textContent = userData.name;
  bmiStatus.textContent = userProgress.data.length
    ? "(" + getBMIStatus(userProgress.data[0].bmi) + ")"
    : "(" + getBMIStatus(userData.bmi) + ")";

  bmiValue.textContent = userProgress.data.length
    ? userProgress.data[0].bmi
    : userData.bmi;
  fitnessGoal.textContent = goals[userData.goal];
}

updateUI();
updateQuoteFacts();
updateStatsCalorie();
