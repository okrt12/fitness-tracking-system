import { toggleShowHidePass } from "./common.js";

const createShowIcon = document.querySelector(".create_show");
const createhideIcon = document.querySelector(".create_hide");

const confirmShowIcon = document.querySelector(".confirm_show-password");
const confirmHideIcon = document.querySelector(".confirm_hide-password");

const fullName = document.getElementById("fullname");
const email = document.getElementById("email");
const newPassword = document.getElementById("create-password");
const confirmPassword = document.getElementById("confirm-password");
const age = document.getElementById("age");
const weight = document.getElementById("weight");
const height = document.getElementById("height");
const gender = document.getElementById("gender");
const fitnessGoal = document.getElementById("fitness-goal");
const disease = document.getElementById("diseases");
const form = document.querySelector(".form");

// UI
toggleShowHidePass(newPassword, createhideIcon, createShowIcon);
toggleShowHidePass(confirmPassword, confirmHideIcon, confirmShowIcon);
// Backend
const date = new Date().toDateString();

form.addEventListener("submit", async function (e) {
  e.preventDefault();

  if (newPassword.value === confirmPassword.value) {
    const userData = {
      name: fullName.value,
      email: email.value,
      password: confirmPassword.value,
      age: age.value,
      weight: weight.value,
      height: height.value,
      gender: gender.value,
      goal: fitnessGoal.value,
      disease: disease.value || "none",
    };
    try {
      const response = await fetch("../backend/auth/register.php", {
        method: "POST",
        body: JSON.stringify(userData),
        headers: {
          "Content-Type": "application/json",
        },
      });
      if (response.ok) {
        const data = response.json();
        alert("Registered succesfully");
      }
    } catch (error) {
      console.log("Error: ", error);
      alert("An unexpected error occurred. Please try again later.");
    }
  }
});
