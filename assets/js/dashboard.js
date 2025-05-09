import { getData } from "./common.js";
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

// Calorie Chart
const calorieIn = document.querySelector(".calorie-intake");
const calorieInText = document.querySelector(".in-text");

const calorieOut = document.querySelector(".calorie-outtake");
const calorieOutText = document.querySelector(".out-text");

const calorieInPercent = 65;
const calorieOutPercent = 85;

const calorieInKcal = 2000;
const calorieOutKcal = 1800;

calorieIn.style.height = `${calorieInPercent}%`;
calorieOut.style.height = `${calorieOutPercent}%`;
calorieInText.textContent = calorieInKcal;
calorieOutText.textContent = calorieOutKcal;

// Weight Progress

const weightProgressText = document.querySelector(".weight-progress__percent");
const weightProgressChart = document.querySelector(".weight-progress__chart");

const weightProgressPercent = 60;
weightProgressText.textContent = weightProgressPercent + "% ";
weightProgressChart.style.width = `${weightProgressPercent}%`;

////////////////////////////////////////////////////////////////////////////////////////////
const qouteDom = document.querySelector(".quote");
const factDom = document.querySelector(".fact");
async function updateQuoteFacts() {
  const factQuoteData = await getData(
    "../backend/api/get-motivational-content.php"
  );
  const qoute = factQuoteData.data.filter((el) => el.type === "quote");
  const fact = factQuoteData.data.filter((el) => el.type === "fact");
  qouteDom.textContent = qoute[0].content;
  factDom.textContent = fact[0].content;
}

async function updateUI() {
  const userData = await getData("../backend/api/get-user-info.php");
  document.querySelector(".username").textContent = userData.name;
}

updateUI();
updateQuoteFacts();
