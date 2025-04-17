// element.setAttribute("attributeName", "newValue");
// Health Form
const diastolicInput = document.querySelector(".bp-diastolic");
const systolicInput = document.querySelector(".bp-systolic");
const bloodSugarInput = document.querySelector(".blood-sugar");
const healthBtn = document.querySelector(".health-btn");
// BP Bar
const monBpBar = document.querySelector(".bp-mon-bar");
const tueBpBar = document.querySelector(".bp-tue-bar");
const wedBpBar = document.querySelector(".bp-wed-bar");
const thuBpBar = document.querySelector(".bp-thu-bar");
const friBpBar = document.querySelector(".bp-fri-bar");
const satBpBar = document.querySelector(".bp-sat-bar");
const sunBpBar = document.querySelector(".bp-sun-bar");

const monBPText = document.querySelector(".mon-bp_text");

// Sugar Bar
const monSugarBar = document.querySelector(".sugar-mon-bar");
const tueSugarBar = document.querySelector(".sugar-tue-bar");
const wedSugarBar = document.querySelector(".sugar-wed-bar");
const thuSugarBar = document.querySelector(".sugar-thu-bar");
const friSugarBar = document.querySelector(".sugar-fri-bar");
const satSugarBar = document.querySelector(".sugar-sat-bar");
const sunSugarBar = document.querySelector(".sugar-sun-bar");

// Day label
const monText = document.querySelector(".text-mon");
const tueText = document.querySelector(".text-tue");
const wedText = document.querySelector(".text-wed");
const thuText = document.querySelector(".text-thu");
const friText = document.querySelector(".text-fri");
const satText = document.querySelector(".text-sat");
const sunText = document.querySelector(".text-sun");

// Var
const maxY = 140;
const maxHeight = 130;

let systolic;
let diastolic;
let bloodSugar;
// const dataBP = [];
const dataSL = [];

function calcAveBP(systolic, diastolic) {
  return (systolic + diastolic) / 2;
}

// Event Listener
healthBtn.addEventListener("click", function (e) {
  e.preventDefault();
  systolic = +systolicInput.value;
  diastolic = +diastolicInput.value;
  bloodSugar = +bloodSugarInput.value;

  dataBP.push(calcAveBP(systolic, diastolic));
  dataSL.push(bloodSugar);
});

const maxBP = 200;
const maxBS = 500;
const dataBP = [190, 180, 175, 165, 150, 125, 115];
const dataBS = [400, 350, 250, 200, 150, 125, 100];

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

dataBS.forEach((el, i) => {
  updateBarGraph("sugar", el, valueToHeight(el, maxBS), i + 1);
});
// console.log(height);
