// Fetch data from DB
async function getData() {
  try {
    const response = await fetch("../backend/api/get-user-info.php");
    if (!response.ok) {
      throw new Error("Failed to fetch user info");
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error:", error);
    alert("Could not load user info.");
    return "error";
  }
}

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
const goals = {
  gain_muscle: "Muscle Gain (Bulking)",
};

async function updateUI() {
  const userData = await getData();
  console.log(userData);
  document.querySelector(".username").textContent = userData.name;
}

updateUI();
