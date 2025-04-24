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

async function temp() {
  const data = await getData("../backend/api/get-workouts-schedule.php");
  console.log(data);
}

// temp();

// Popup
