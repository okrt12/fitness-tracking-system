import {
  postData,
  getData,
  addHidden,
  toggleHidden,
  backdrop,
} from "./common.js";

// Health Form
const diastolicInput = document.getElementById("bp-diastolic");
const systolicInput = document.getElementById("bp-systolic");
const bloodSugarInput = document.getElementById("blood-sugar");
const weightInput = document.getElementById("weight");
const form = document.getElementById("add-progress__form");
const addProgressBtn = document.querySelector(".progress-add__btn");

const weightGoalForm = document.querySelector(".update-weight_goal");
const weightGoalInput = document.getElementById("weight-goal");
const currentWeightInput = document.getElementById("current-weight");

const bpBars = document.querySelectorAll(".bp-bar");
const bpText = document.querySelectorAll(".bp_text");
const bsBars = document.querySelectorAll(".sugar-bar");
const bsText = document.querySelectorAll(".sugar_text");
const healthDateLabels = document.querySelectorAll(".health_bar-text");

//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////// Constant Variables   ////////////////////////////////

const maxHeight = 130;
const maxBP = 200;
const maxBSL = 500;
let progressData;

//////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////   Helper Functions       ////////////////////////

function dateToMonth(dateStr) {
  const date = new Date(dateStr);
  const formatted = date.toLocaleDateString("en-US", {
    month: "short",
    day: "numeric",
  });
  return formatted;
}

const calcBMI = (height, weight) => weight / (height / 100) ** 2;
const valueToHeight = (value, maxValue) => (value / maxValue) * maxHeight;
const calcBarY = (height) => 140 - height;
const calcTextY = (height) => calcBarY(height) - 5;
const calcAveBP = (systolic, diastolic) => (systolic + diastolic) / 2;

//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
// Post Progress
async function postProgress(progressData) {
  try {
    const response = await postData(
      progressData,
      "../backend/controllers/progressLog.php"
    );
    if (response.ok) {
      const data = await response.json();
      alert(data.message);
    }
  } catch (error) {
    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
}

//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

backdrop.addEventListener("click", function () {
  addHidden(form);
});

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    addHidden(form);
  }
});

addProgressBtn.addEventListener("click", function (e) {
  toggleHidden(form);
});

form.addEventListener("submit", async function (e) {
  e.preventDefault();
  const userData = await getData("../backend/api/get-user-info.php");
  const bmi = calcBMI(userData.height, userData.weight).toFixed(1);
  const progressData = {
    diastolic: diastolicInput.value,
    systolic: systolicInput.value,
    sugar_level: bloodSugarInput.value,
    weight: weightInput.value,
    bmi: bmi,
  };
  await postProgress(progressData);
  form.reset();
  toggleHidden(form);
});

weightGoalForm.addEventListener("submit", async function (e) {
  e.preventDefault();

  const goalData = {
    goal_weight: weightGoalInput.value,
  };
  try {
    const response = await postData(
      goalData,
      "../backend/controllers/updateWeightGoal.php"
    );
    if (response.ok) {
      const data = await response.json();
      alert(data.message);
      weightGoalForm.reset();
    }
  } catch (error) {
    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
});

const weightChange = document.querySelector(".weight-change");
const calcWeightChange = (w1, w2) => (w1 > w2 ? w1 - w2 : w2 - w1);
async function updateUI() {
  const userData = await getData("../backend/api/get-progress.php");
  if (userData.data.length !== 0) {
    progressData = userData.data.filter((el) => el);
    currentWeightInput.textContent = (await progressData[0].weight) + " kg";

    const weightChangeResult = calcWeightChange(
      progressData[0].weight,
      progressData[1].weight
    );

    weightChange.textContent =
      progressData[0].weight > progressData[1].weight
        ? "↑ " + weightChangeResult + " kg"
        : "↓ " + weightChangeResult + " kg";
  }
}

//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
const healthBar = document.querySelector(".health-bar");
const noDataHealth = document.querySelector(".no-data_health");

function updateBarGraph(chartType, value, height, i) {
  document
    .querySelector(`.day${i}-${chartType}_bar`)
    .setAttribute("height", `${height}`);

  document
    .querySelector(`.day${i}-${chartType}_bar`)
    .setAttribute("y", `${calcBarY(height)}`);

  document.querySelector(`.day${i}-${chartType}_text`).textContent = value;
  document
    .querySelector(`.day${i}-${chartType}_text`)
    .setAttribute("y", `${calcTextY(height)}`);
}

async function updateBPGraph() {
  bpBars.forEach((el) => {
    el.setAttribute("height", "0");
  });
  bpText.forEach((el) => {
    el.textContent = "";
  });

  if (!progressData) return;
  const dataBP = progressData
    .filter((el) => el)
    .map((el) => {
      return calcAveBP(el.systolic, el.diastolic).toFixed(0);
    });

  const reversedDataDate = dataBP.reverse();

  reversedDataDate.forEach((el, i) => {
    updateBarGraph("bp", el, valueToHeight(el, maxBP), i + 1);
  });
}

async function updateSLGraph() {
  bsBars.forEach((el) => {
    el.setAttribute("height", "0");
  });
  bsText.forEach((el) => {
    el.textContent = "";
  });

  if (!progressData) return;
  const dataBS = progressData.filter((el) => el).map((el) => el.sugar_level);
  const reversedDataDate = dataBS.reverse();

  reversedDataDate.forEach((el, i) => {
    updateBarGraph("sugar", el, valueToHeight(el, maxBSL), i + 1);
  });
}

async function updateDateLabel() {
  healthDateLabels.forEach((el) => {
    el.textContent = "";
  });
  if (!progressData) return;
  const dataDate = progressData
    .filter((el) => el)
    .map((el) => dateToMonth(el.date));

  const reversedDataDate = dataDate.reverse();

  healthDateLabels.forEach((el, i) => {
    el.textContent = reversedDataDate[i];
  });
}

function updateHealthChart() {
  if (!progressData) {
    healthBar.classList.add("hidden");
    noDataHealth.classList.remove("hidden");
    return;
  }
  if (healthBar.classList.contains("hidden"))
    healthBar.classList.remove("hidden");
  updateBPGraph();
  updateSLGraph();
  updateDateLabel();
}
////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Line Chart ////////////////////////////////////////
// Dom
const lineChart = document.querySelector(".line-chart");
const goalWeightTexts = document.querySelectorAll(".day-kg__text");
const goalLineText = document.querySelector(".goal-line__text");
const goalLine = document.querySelector(".goal-line");
const weightChartDesc = document.querySelector(".weight-chart__desc");
const noDataWeight = document.querySelector(".no-data_weight");
function plotWeightChart(dataWeight, goalWeight, currWeight) {
  if (!Array.isArray(dataWeight) || dataWeight.length === 0) return;

  const chartLeft = 50;
  const chartRight = 580;
  const chartTop = 20;
  const chartBottom = 260;
  const chartHeight = chartBottom - chartTop;
  const chartWidth = chartRight - chartLeft;

  const allWeights = [...dataWeight, goalWeight, currWeight].filter(
    (w) => w != null
  );
  const maxWeight = Math.max(...allWeights);
  const minWeight = Math.min(...allWeights);
  const hasRange = maxWeight !== minWeight;

  const rangePadding = 2;
  const paddedMax = hasRange
    ? Math.ceil(maxWeight + rangePadding)
    : maxWeight + 1;
  const paddedMin = hasRange
    ? Math.floor(minWeight - rangePadding)
    : minWeight - 1;

  const steps = 5;
  const stepValue = (paddedMax - paddedMin) / (steps - 1);
  for (let i = 0; i < steps; i++) {
    const label = (paddedMax - i * stepValue).toFixed(1);
    const el = document.querySelector(`.day${i + 1}-kg`);
    if (el) el.textContent = label;
  }

  const goalY = hasRange
    ? chartTop +
      ((paddedMax - goalWeight) / (paddedMax - paddedMin)) * chartHeight
    : chartTop + chartHeight / 2;

  goalLine.setAttribute("y1", goalY);
  goalLine.setAttribute("y2", goalY);
  goalLineText.setAttribute("y", goalY - 5);
  goalLineText.textContent = goalWeight ? `Goal: ${goalWeight} kg` : "No Goal";

  const weights = progressData.map((el) => el.weight).filter((w) => w != null);
  const yPositions = weights.map((w) =>
    hasRange
      ? chartTop + ((paddedMax - w) / (paddedMax - paddedMin)) * chartHeight
      : chartTop + chartHeight / 2
  );

  const count = weights.length;
  if (count === 0) return;

  const stepX = count === 1 ? 0 : chartWidth / (count - 1);
  const xPositions = Array.from(
    { length: count },
    (_, i) => chartLeft + i * stepX
  );

  lineChart.querySelectorAll(".dot").forEach((dot) => dot.remove());
  lineChart.querySelectorAll(".day-weight_text").forEach((txt) => txt.remove());

  const points = xPositions.map((x, i) => `${x},${yPositions[i]}`).join(" ");
  document.querySelector(".line").setAttribute("points", points);

  const dates = progressData.map((p) => dateToMonth(p.date));

  xPositions.forEach((x, i) => {
    if (isNaN(x) || isNaN(yPositions[i])) return;
    const circle = `<circle class="dot" cx="${x}" cy="${yPositions[i]}" r="4" />`;
    const label = `<text class="day-weight_text" x="${x - 20}" y="280">${
      dates[i]
    }</text>`;
    lineChart.insertAdjacentHTML("beforeend", circle);
    lineChart.insertAdjacentHTML("beforeend", label);
  });
}

async function updateWeightChart() {
  const userData = await getData("../backend/api/get-user-info.php");
  if (!progressData || !userData.goal_weight) {
    lineChart.classList.add("hidden");
    weightChartDesc.classList.add("hidden");
    noDataWeight.classList.remove("hidden");
    return;
  }
  if (
    lineChart.classList.contains("hidden") &&
    weightChartDesc.classList.contains("hidden")
  ) {
    lineChart.classList.remove("hidden");
    weightChartDesc.classList.remove("hidden");
    noDataWeight.classList.add("hidden");
  }
  let dataWeight = progressData.filter((el) => el).map((el) => el.weight);
  const descHTML = userData.goal_weight
    ? `<p class="cards-description normal-text">
                    Current: <span class="current-weight__chart">${userData.weight}</span>kg
                    (Goal: <span class="goal-weight__chart">${userData.goal_weight}</span> kg)
                  </p>`
    : `<p class="cards-description normal-text">
                  Current: <span class="current-weight__chart">${userData.weight}</span>kg
                  (Goal: <span class="goal-weight__chart">No weight goal</span>)
                </p>`;

  weightChartDesc.insertAdjacentHTML("beforeend", descHTML);

  plotWeightChart(dataWeight, userData.goal_weight, userData.weight);
}

async function updateCalorie() {
  const calorieC = await getData("../backend/api/get-meal-log.php");
  const calorieB = await getData("../backend/api/get-workout-log.php");
  const calorieConsumed = calorieC.data.map((el) => el.calories);
  const calorieBurned = calorieB.data.map((el) => el.calories_burned);
  // console.log(calorieC);
  // console.log(calorieB);
}

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

(async () => {
  await updateUI();
  updateHealthChart();
  updateWeightChart();
  updateCalorie();
})();
