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

addProgressBtn.addEventListener("click", function (e) {
  toggleHidden(form);
});

form.addEventListener("submit", async function (e) {
  e.preventDefault();
  const userData = await getData("../backend/api/get-user-info.php");
  const bmi = calcBMI(userData.height, userData.weight).toFixed(2);
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
    goal: weightGoalInput.value,
  };
  try {
    const response = await postData(
      goalData,
      "../backend/controllers/updateGoal.php"
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

async function updateUI() {
  const userData = await getData("../backend/api/get-progress.php");
  progressData = userData.data.filter((el) => el);
  currentWeightInput.textContent = (await progressData[0].weight) + " kg";
}

//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

const calcAveBP = (systolic, diastolic) => (systolic + diastolic) / 2;

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
    .slice(0, 7)
    .map((el) => {
      return calcAveBP(el.systolic, el.diastolic).toFixed(0);
    });

  dataBP.forEach((el, i) => {
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
  const dataBS = progressData
    .filter((el) => el)
    .slice(0, 7)
    .map((el) => el.sugar_level);

  dataBS.forEach((el, i) => {
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
    .slice(0, 7)
    .map((el) => dateToMonth(el.date));

  healthDateLabels.forEach((el, i) => {
    el.textContent = dataDate[i];
  });
}

////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Line Chart ////////////////////////////////////////
// Dom
const lineChart = document.querySelector(".line-chart");
const weightPolyline = document.querySelector(".weight-polyline");

// Var
const circleX = 70;
const circleY = 230;

const dataWeight = [60, 65, 70, 60, 65, 75, 80];

const circleHTML = `<circle class="dot" cx="${circleX}" cy="${circleY}" r="4" />`;
const polylineHTML = `  <polyline class="polyline weight-polyline" points = 
  "70,70 130,90 190,110 250,120 310,130 370,140 ${circleX + "," + circleY}"  
   />`;

// lineChart.insertAdjacentHTML("beforeend", circleHTML);
lineChart.insertAdjacentHTML("afterbegin", polylineHTML);

/////////////////////////////////////////////////////////////////////////////////////////////

(async () => {
  await updateUI();
  updateBPGraph();
  updateSLGraph();
  updateDateLabel();
})();
