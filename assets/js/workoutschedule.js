import { postData, workoutTypes } from "./common.js";

const scheduleForm = document.querySelector(".schedule-workout__form");
const scheduleDateInput = document.getElementById("schedule-date");
const scheduleTypeInput = document.getElementById("schedule-type");
const scheduleTimeInput = document.getElementById("schedule-time");
const scheduleDurationInput = document.getElementById("schedule-duration");
const scheduleRepeatInput = document.getElementById("weekly-repeat");

scheduleForm.addEventListener("submit", async function (e) {
  e.preventDefault();

  const scheduleData = {
    workout_id: workoutTypes[scheduleTypeInput.value],
    date: scheduleDateInput.value,
    time: scheduleTimeInput.value,
    duration: scheduleDurationInput.value,
  };

  console.log(scheduleData);

  try {
    const response = await postData(
      scheduleData,
      "../backend/controllers/workoutSchedule.php"
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

async function temp() {
  const scheduleData = {
    workout_id: 1,
    date: "2025-10-10",
    duration: "30",
    time: "02:00",
  };
  // try {
  //   const response = await postData(
  //     scheduleData,
  //     "../backend/controllers/workoutSchedule.php"
  //   );
  //   console.log(response);

  //   if (response.ok) {
  //     const data = await response.json();
  //     alert(data);
  //   }
  // } catch (error) {
  //   console.log("Error: ", error);
  //   alert("An unexpected error occurred. Please try again later.");
  // }

  try {
    const response = await fetch("../backend/controllers/workoutSchedule.php", {
      method: "POST",
      body: JSON.stringify(scheduleData),
      headers: {
        "Content-Type": "application/json",
      },
    });
    let data;
    console.log(response);
    if (response.ok) {
      alert("we are okay bitch");
    }
  } catch (error) {
    console.log(data.message);

    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
}

temp();
