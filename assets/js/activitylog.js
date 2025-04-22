"use strict";
import { postData, getData, addOptions, getCalorie } from "./common.js";
// Global Calories
const date = new Date();

// Add Meal
const addMealForm = document.querySelector(".add-meal-form");
const addMealName = document.getElementById("meal-name");
const addMealCalories = document.getElementById("meal-calories");
const addMealCarbs = document.getElementById("meal-carbs");
const addMealFats = document.getElementById("meal-fats");
const addMealProtein = document.getElementById("meal-protein");
const addMealCategory = document.getElementById("meal-category");

addMealForm.addEventListener("submit", async function (e) {
  e.preventDefault();
  const addMealData = {
    name: addMealName.value,
    calories: addMealCalories.value,
    carbs: addMealCarbs.value,
    fats: addMealFats.value,
    protein: addMealProtein.value,
    category: addMealCategory.value || "",
  };

  try {
    const response = await postData(
      addMealData,
      "../backend/controllers/postMeal.php"
    );
    if (response.ok) {
      const data = await response.json();
      alert(data.message);
      addMealForm.reset();
    }
  } catch (error) {
    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
});

// Log Meal
const logMealForm = document.querySelector(".log-meal");
const logMealID = document.getElementById("meal-id");
const logMealQuantity = document.getElementById("quantity");
const logMealCalories = document.getElementById("calories");

addOptions(
  logMealID,
  "../backend/api/get-meal.php",
  "meal_id",
  "name",
  "meal_id"
);

const updateCalories = (quantity, calorie) => quantity * calorie;

let selectedID;
logMealID.addEventListener("change", () => {
  selectedID = logMealID.value;
});

let totalCalories;
logMealQuantity.addEventListener("input", async function () {
  const mealData = await getData("../backend/api/get-meal.php");
  let mealCalorie = getCalorie(mealData, selectedID, "meal_id", "calories");
  const quantity = Number(logMealQuantity.value) || 0;
  totalCalories = updateCalories(quantity, mealCalorie);
  logMealCalories.value = totalCalories;
});

logMealForm.addEventListener("submit", async function (e) {
  e.preventDefault();
  const logMealData = {
    meal_id: logMealID.value,
    quantity: logMealQuantity.value,
    calories: totalCalories,
    date: date.toISOString().split("T")[0],
  };

  try {
    const response = await postData(
      logMealData,
      "../backend/controllers/logMeal.php"
    );
    if (response.ok) {
      const data = await response.json();
      alert(data.message);
      logMealForm.reset();
    }
  } catch (error) {
    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
});

// Workout
const addWorkoutForm = document.querySelector(".add-workout-form");
const addWorkoutName = document.getElementById("workout-name");
const addWorkoutCategory = document.getElementById("workout-category");
const addWorkoutCalories = document.getElementById("calories-per-hour");

addWorkoutForm.addEventListener("submit", async function (e) {
  e.preventDefault();

  const addWorkoutData = {
    name: addWorkoutName.value,
    category: addWorkoutCategory.value,
    calories_per_hour: addWorkoutCalories.value,
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
