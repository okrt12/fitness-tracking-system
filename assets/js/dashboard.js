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
// % completed
const percent = 75;
const circle = document.querySelector("svg circle:nth-of-type(2)");
const pieText = document.querySelector(".pie-text");
pieText.textContent = percent + "%";

circle.setAttribute("stroke-dashoffset", 314 - (314 * percent) / 100);
