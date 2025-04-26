import {
  backdrop,
  postData,
  addOptions,
  getData,
  toggleHidden,
  addHidden,
  updateData,
} from "./common.js";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////   Variables       ////////////////////////////////////////////////////
const addScheduleForm = document.querySelector(".schedule-workout__form");
const scheduleRepeatInput = document.getElementById("weekly-repeat");
const scheduleTypeInput = document.getElementById("schedule-type");
const scheduleDayInput = document.getElementById("schedule-day");
const scheduleTimeInput = document.getElementById("schedule-time");
const scheduleDurationInput = document.getElementById("schedule-duration");
const scheduleDayNameInput = document.getElementById("workout_day_name");

// Edit
const editScheduleForm = document.querySelector(".edit-schedule__form");
const editScheduleTypeInput = document.getElementById("edit_schedule-type");
const editScheduleDayInput = document.getElementById("edit_schedule-day");
const editScheduleTimeInput = document.getElementById("edit_schedule-time");
const editScheduleDurationInput = document.getElementById(
  "edit_schedule-duration"
);
const editScheduleDayNameInput = document.getElementById(
  "edit_workout_day_name"
);

const timerDay = document.getElementById("days");
const timerHour = document.getElementById("hours");
const timerMinutes = document.getElementById("minutes");
const dayLabel = document.querySelector(".day-label");
const hourLabel = document.querySelector(".hour-label");
const minuteLabel = document.querySelector(".minute-label");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////   Styles       ////////////////////////////////////////////////////
const dayToUpdate = document.querySelectorAll(".spacer .day");
const day1 = document.querySelector(".mon");
const width = day1.getBoundingClientRect().width;

function updateMinWidths() {
  dayToUpdate.forEach((el) => {
    el.style.minWidth = `${width}px`;
  });
}
updateMinWidths();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////    Functions       //////////////////////////////////////////////////
function getDayForm(icons) {
  icons.forEach((el) => {
    const elementsDay = el.parentElement.getAttribute("data-day");
    el.addEventListener("click", function (e) {
      scheduleDayInput.value = days[elementsDay];
      toggleHidden(addScheduleForm);
    });
  });
}

function getRecentData(data, day) {
  const scheduleDay = data.filter((el) => el.day_of_week === day);
  if (scheduleDay.length === 0) return 0;
  scheduleDay.sort(
    (a, b) => new Date(b.schedule_date) - new Date(a.schedule_date)
  );
  return scheduleDay[0];
}

function getWeekData(weekData, data) {
  workoutContainer.forEach((el) => {
    const elementsDay = days[el.nextElementSibling.getAttribute("data-day")];
    weekData.push(getRecentData(data, elementsDay));
  });
}

function updateWorkoutSchedule(scheduleID) {
  editScheduleForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const scheduleData = {
      schedule_id: scheduleID,
      day_of_week: editScheduleDayInput.value,
      workout_id: selectedID,
      workout_day_name: editScheduleDayNameInput.value,
      time: editScheduleTimeInput.value,
      duration: editScheduleDurationInput.value,
      workout_id: editSelectedID,
    };

    try {
      const response = await updateData(
        scheduleData,
        "../backend/controllers/editWorkoutSchedule.php"
      );
      console.log(response);
      if (response.ok) {
        const data = await response.json();
        alert(data.message);
        editScheduleForm.reset();
      }
    } catch (error) {
      console.log("Error: ", error);
      alert("An unexpected error occurred. Please try again later.");
    }

    toggleHidden(editScheduleForm);
  });
}

function postWorkoutSchedule(scheduleID, url) {
  addScheduleForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const scheduleData = {
      schedule_id: scheduleID ? scheduleID : undefined,
      day_of_week: scheduleDayInput.value,
      workout_id: selectedID,
      workout_day_name: scheduleDayNameInput.value,
      time: scheduleTimeInput.value,
      duration: scheduleDurationInput.value,
    };

    try {
      const response = await postData(
        scheduleData,
        "../backend/controllers/postWorkoutSchedule.php"
      );
      console.log(response);
      if (response.ok) {
        const data = await response.json();
        alert(data.message);
        addScheduleForm.reset();
      }
    } catch (error) {
      console.log("Error: ", error);
      alert("An unexpected error occurred. Please try again later.");
    }

    toggleHidden(addScheduleForm);
  });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////   Timer       ////////////////////////////////////////////////////

const now = new Date();
const currentDayIndex = now.getDay() === 0 ? 6 : now.getDay() - 1; // Adjust Sunday (0) to 6
const currentTime = now.getHours() * 60 + now.getMinutes();

function timer(day, hour, minutes) {
  if (hour >= 24) {
    day += 1;
    hour -= 24;
  }
  if (minutes === 60) {
    hour += 1;
    minutes = 0;
  }
  timerDay.textContent = day > 9 ? day : "0" + day;
  timerHour.textContent = hour > 9 ? hour : "0" + hour;
  timerMinutes.textContent = minutes > 9 ? minutes : "0" + minutes;

  setInterval(() => {
    timerDay.textContent = day > 9 ? day : "0" + day;
    timerHour.textContent = hour > 9 ? hour : "0" + hour;
    timerMinutes.textContent = minutes > 9 ? minutes : "0" + minutes;

    dayLabel.textContent = day > 1 ? "Days" : "Day";
    hourLabel.textContent = hour > 1 ? "Hours" : "Hour";
    minuteLabel.textContent = minutes > 1 ? "Minutes" : "Minute";

    if (hour && minutes === 0) {
      hour--;
      minutes = 59;
    }
    if (day && hour === 0) {
      day--;
      hour = 23;
      minutes = 59;
    }
    if (minutes <= 0) return;
    minutes--;
  }, 1000);
}
// timer(1, 25, 60);
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

let selectedID;
(async () => {
  await addOptions(
    scheduleTypeInput,
    "../backend/api/get-workout.php",
    "workout_id",
    "name",
    "schedule-type"
  );
  await addOptions(
    editScheduleTypeInput,
    "../backend/api/get-workout.php",
    "workout_id",
    "name",
    "schedule-type"
  );

  scheduleTypeInput.addEventListener("change", () => {
    selectedID = scheduleTypeInput.value;
  });
})();
let editSelectedID;
editScheduleTypeInput.addEventListener("change", () => {
  editSelectedID = editScheduleTypeInput.value;
});

backdrop.addEventListener("click", function () {
  addHidden(addScheduleForm);
  addHidden(editScheduleForm);
});

//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////   Edit and Update Schedule   //////////////////////////////
const weekDays = document.querySelectorAll(".day");
const addIcons = document.querySelectorAll(".add-icon");
const editIcons = document.querySelectorAll(".edit-icon");
const delIcons = document.querySelectorAll(".del-icon");
const workoutContainer = document.querySelectorAll(".workout");

const days = {
  1: "Monday",
  2: "Tuesday",
  3: "Wednesday",
  4: "Thursday",
  5: "Friday",
  6: "Saturday",
  7: "Sunday",
};

const weekData = [];

async function updateDaysData() {
  const data = await getData("../backend/api/get-workouts-schedule.php");
  getWeekData(weekData, data.data);
  workoutContainer.forEach((el, i) => {
    const html = weekData[i]
      ? `
    <span class = "normal-text cards-description workout_day_name">${
      weekData[i].workout_day_name
    }</span>
    <span class = "normal-text cards-description schedule_time">${weekData[
      i
    ].time
      .split("")
      .splice(0, 5)
      .join("")}</span>
    <span class = "normal-text cards-description schedule_duration">${
      weekData[i].duration > 60
        ? weekData[i].duration / 60 + " hrs"
        : weekData[i].duration + " min"
    } </span>
    `
      : `<span>No Workout</span>`;
    el.insertAdjacentHTML("beforeend", html);
    const schedule_id = weekData[i].schedule_id || "";
    el.setAttribute("data-schedule_id", schedule_id);
  });
}

async function addSchedule() {
  getDayForm(addIcons);
  postWorkoutSchedule();
}

async function editSchedule() {
  workoutContainer.forEach((el) => {
    const workoutDayName = el.querySelector(".workout_day_name");
    const time = el.querySelector(".schedule_time");
    const duration = el.querySelector(".schedule_duration");
    const editIcon = el.nextElementSibling.children[1];

    editIcon.addEventListener("click", function (e) {
      const scheduleID = el.getAttribute("data-schedule_id");
      const elementsDay = editIcon.parentElement.getAttribute("data-day");
      editScheduleDayInput.value = days[elementsDay];
      toggleHidden(editScheduleForm);
      if (workoutDayName)
        editScheduleDayNameInput.value = workoutDayName.textContent;
      if (time) editScheduleTimeInput.value = time.textContent;
      if (duration) editScheduleDurationInput.value = duration.textContent;
      updateWorkoutSchedule(scheduleID);
    });
  });
}
async function deleteSchedule() {
  getDayForm(delIcons);
}

(async () => {
  await updateDaysData();
  addSchedule();
  editSchedule();
  deleteSchedule();
})();
