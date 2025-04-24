"use strict";
import { postData, getData, addOptions, getCalorie } from "./common.js";
// Global Calories
const date = new Date();

//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
// Workout
document.addEventListener("DOMContentLoaded", () => {
  const addWorkoutForm = document.querySelector(".add-workout-form");
  const addWorkoutName = document.getElementById("workout-name");
  const addWorkoutCategory = document.getElementById("workout-category");
  const addWorkoutCalories = document.getElementById("calories-per-hour");
  const addWorkoutDayName = document.getElementById("workout_day_name");

  addWorkoutForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const addWorkoutData = {
      name: addWorkoutName.value,
      category: addWorkoutCategory.value,
      calories_per_hour: addWorkoutCalories.value,
      workout_day_name: addWorkoutDayName.value,
    };

    try {
      const response = await postData(
        addWorkoutData,
        "../backend/controllers/addWorkout.php"
      );
      if (response.ok) {
        const data = await response.json();
        alert(data.message);
        addWorkoutForm.reset();
      }
    } catch (error) {
      console.log("Error: ", error);
      alert("An unexpected error occurred. Please try again later.");
    }
  });

  // Log Workout
  const logWorkoutForm = document.querySelector(".log-workout");
  const logWorkoutID = document.getElementById("workout-id");
  const logWorkoutDuration = document.getElementById("duration");
  const logWorkoutCalories = document.getElementById("calories-burned");
  const logWorkoutDayName = document.getElementById("workout_day_name_log");

  addOptions(
    logWorkoutID,
    "../backend/api/get-workout.php",
    "workout_id",
    "name",
    "workout_id"
  );

  const updateCaloriesBurned = (duration, calorie) => (duration / 60) * calorie;
  let selectedWorkoutID;
  logWorkoutID.addEventListener("change", () => {
    selectedWorkoutID = logWorkoutID.value;
  });

  let totalCaloriesBurned;
  logWorkoutDuration.addEventListener("input", async function () {
    const workoutData = await getData("../backend/api/get-workout.php");
    let workoutCalories = getCalorie(
      workoutData,
      selectedWorkoutID,
      "workout_id",
      "calories_per_hour"
    );
    const duration = Number(logWorkoutDuration.value) || 0;
    totalCaloriesBurned = updateCaloriesBurned(duration, workoutCalories);
    logWorkoutCalories.value = totalCaloriesBurned;
  });

  logWorkoutForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const workoutLogData = {
      workout_id: logWorkoutID.value,
      duration: logWorkoutDuration.value,
      calories_burned: totalCaloriesBurned,
      date: date.toISOString().split("T")[0],
      workout_day_name: logWorkoutDayName.value,
    };

    try {
      const response = await postData(
        workoutLogData,
        "../backend/controllers/logWorkout.php"
      );
      if (response.ok) {
        const data = await response.json();
        alert(data.message);
        logWorkoutForm.reset();
      }
    } catch (error) {
      console.log("Error: ", error);
      alert("An unexpected error occurred. Please try again later.");
    }
  });
});
