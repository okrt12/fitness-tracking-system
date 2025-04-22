"use strict";
import { postData, getData } from "./common.js";

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

async function meal() {
  const mealData = await getData("../backend/api/get-meal.php");
  mealData.data.forEach((element) => {
    const html = `<option name="meal_id" value="${element.meal_id}">${element.name}</option>`;
    logMealID.insertAdjacentHTML("beforeend", html);
  });
}
meal();

const updateCalories = (quantity, calorie) => quantity * calorie;

let selectedID;
logMealID.addEventListener("change", () => {
  selectedID = logMealID.value;
});

function getMealCalorie(mealData) {
  let mealCalorie;

  mealData.data.forEach((el) => {
    if (+selectedID && el.meal_id === +selectedID) {
      mealCalorie = el.calories;
    }
  });
  return mealCalorie;
}

let totalCalories;
logMealQuantity.addEventListener("input", async function () {
  const mealData = await getData("../backend/api/get-meal.php");
  let mealCalorie = getMealCalorie(mealData);
  const quantity = Number(logMealQuantity.value) || 0;
  totalCalories = updateCalories(quantity, mealCalorie);
  logMealCalories.value = totalCalories;
});

logMealForm.addEventListener("submit", async function (e) {
  e.preventDefault();
  const date = new Date();
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
