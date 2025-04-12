// Variables
const dashboardHeader = document.querySelector(".header");

///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
const dashboardDate = new Date();
const strDate = dashboardDate.toDateString().split(" ").splice(1).join(" ");

const dashboardDateHtml = `<p class="header-date normal-text">Today is ${strDate}</p>`;
dashboardHeader.insertAdjacentHTML("beforeend", dashboardDateHtml);
