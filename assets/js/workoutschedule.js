import { postData, workoutTypes, addOptions } from "./common.js";

/*
scheduleForm.addEventListener("submit", async function (e) {
  e.preventDefault();

  const scheduleData = {
    workout_id: selectedID,
    schedule_date: scheduleDateInput.value,
    schedule_time: scheduleTimeInput.value,
    schedule_duration: scheduleDurationInput.value,
    weekly_repeat: isChecked,
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
    }
  } catch (error) {
    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
});
*/

const scheduleForm = document.querySelector(".schedule-workout__form");
const scheduleDateInput = document.getElementById("schedule-date");
const scheduleTypeInput = document.getElementById("schedule-type");
const scheduleDayInput = document.getElementById("schedule-day");
const scheduleTimeInput = document.getElementById("schedule-time");
const scheduleDurationInput = document.getElementById("schedule-duration");
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

let isChecked;
let selectedName;
scheduleRepeatInput.addEventListener("change", () => {
  isChecked = scheduleRepeatInput.checked;
  selectedName =
    scheduleRepeatInput.options[scheduleRepeatInput.selectedIndex].text;
  console.log(selectedName);
});

scheduleForm.addEventListener("submit", async function (e) {
  e.preventDefault();

  const scheduleData = {
    day_of_week: scheduleDayInput.value,
    workout_id: selectedID,
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
});
