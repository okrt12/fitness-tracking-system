"use strict";
import { postData, getData } from "./common.js";

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

  console.log(addMealData);
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
