import {
  backdrop,
  postData,
  addOptions,
  getData,
  toggleHidden,
} from "./common.js";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////   Styles       ////////////////////////////////////////////////////
const dayToUpdate = document.querySelectorAll(".spacer .day");
const day1 = document.querySelector(".day-1");
const width = day1.getBoundingClientRect().width;

function updateMinWidths() {
  dayToUpdate.forEach((el) => {
    el.style.minWidth = `${width}px`;
  });
}
updateMinWidths();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////   Timer       ////////////////////////////////////////////////////
const timerDay = document.getElementById("days");
const timerHour = document.getElementById("hours");
const timerMinutes = document.getElementById("minutes");
const dayLabel = document.querySelector(".day-label");
const hourLabel = document.querySelector(".hour-label");
const minuteLabel = document.querySelector(".minute-label");

const now = new Date();
const currentDayIndex = now.getDay() === 0 ? 6 : now.getDay() - 1; // Adjust Sunday (0) to 6
const currentTime = now.getHours() * 60 + now.getMinutes();

function timer(day, hour, minutes) {
  setInterval(() => {
    timerDay.textContent = day > 9 ? day : "0" + day;
    timerHour.textContent = hour > 9 ? hour : "0" + hour;
    timerMinutes.textContent = minutes > 9 ? minutes : "0" + minutes;

    dayLabel.textContent = day > 1 ? "Days" : "Day";
    hourLabel.textContent = hour > 1 ? "Hours" : "Hour";
    minuteLabel.textContent = minutes > 1 ? "Minutes" : "Minute";

    if (hour && minutes === 0) {
      hour--;
      minutes = 60;
    }
    if (day && hour === 0) {
      day--;
      hour = 23;
      minutes = 60;
    }
    if (minutes <= 0) return;
    minutes--;
  }, 200);
}

// let temp = "0";
// timerMinutes.textContent = timerHour.textContent = timerDay.textContent = temp;

timer(0, 1, 50);
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const scheduleForm = document.querySelector(".schedule-workout__form");
const scheduleTypeInput = document.getElementById("schedule-type");
const scheduleDayInput = document.getElementById("schedule-day");
const scheduleTimeInput = document.getElementById("schedule-time");
const scheduleDurationInput = document.getElementById("schedule-duration");
const scheduleDayNameInput = document.getElementById("workout_day_name");
const scheduleRepeatInput = document.getElementById("weekly-repeat");

let selectedID;
(async () => {
  await addOptions(
    scheduleTypeInput,
    "../backend/api/get-workout.php",
    "workout_id",
    "name",
    "schedule-type"
  );

  scheduleTypeInput.addEventListener("change", () => {
    selectedID = scheduleTypeInput.value;
  });
})();

scheduleForm.addEventListener("submit", async function (e) {
  e.preventDefault();

  const scheduleData = {
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
      scheduleForm.reset();
    }
  } catch (error) {
    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
  toggleHidden(scheduleForm);
});

backdrop.addEventListener("click", function () {
  toggleHidden(scheduleForm);
});

async function temp1() {
  const data = await getData("../backend/api/get-workouts-schedule.php");
  console.log(data);
}

// temp();

// Popup
