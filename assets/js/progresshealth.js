import { postData, getData } from "./common.js";

// Health Form
const diastolicInput = document.getElementById("bp-diastolic");
const systolicInput = document.getElementById("bp-systolic");
const bloodSugarInput = document.getElementById("blood-sugar");
const healthBtn = document.querySelector(".health-btn");
const healthForm = document.querySelector(".form");
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

healthForm.addEventListener("submit", async function (e) {
  e.preventDefault();

  const userData = await getData("../backend/api/get-user-info.php");
  const weight = userData.weight;
  const bmi = calcBMI(userData.height, userData.weight).toFixed(2);
  const progressData = {
    diastolic: diastolicInput.value,
    systolic: systolicInput.value,
    sugar_level: bloodSugarInput.value,
    weight: weight,
    bmi: bmi,
  };
  console.log("Inputs:", {
    systolic: systolicInput?.value,
    diastolic: diastolicInput?.value,
    sugar: bloodSugarInput?.value,
  });

  await postProgress(progressData);
  healthForm.reset();
});

const calcBMI = (height, weight) => weight / (height / 100) ** 2;

async function userProgress() {
  const userData = await getData("../backend/api/get-progress.php");
  console.log(userData);
}

// Var
const maxY = 140;
const maxHeight = 130;
const maxBP = 200;
const maxBSL = 500;
const dataBP = [190, 180, 175, 165, 150, 125, 115];
const dataBS = [400, 350, 250, 200, 150, 125, 100];

let systolic;
let diastolic;
let bloodSugar;

function calcAveBP(systolic, diastolic) {
  return (systolic + diastolic) / 2;
}

// Event Listener
healthBtn.addEventListener("click", function (e) {
  e.preventDefault();
  systolic = +systolicInput.value;
  diastolic = +diastolicInput.value;
  bloodSugar = +bloodSugarInput.value;

  // POST to DB
});

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

// Functions
const valueToHeight = (value, maxValue) => (value / maxValue) * maxHeight;
const calcBarY = (height) => 140 - height;
const calcTextY = (height) => calcBarY(height) - 5;

dataBP.forEach((el, i) => {
  updateBarGraph("bp", el, valueToHeight(el, maxBP), i + 1);
});

// dataBS.forEach((el, i) => {
//   updateBarGraph("sugar", el, valueToHeight(el, maxBSL), i + 1);
// });

const maxWorkout = 7;

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
