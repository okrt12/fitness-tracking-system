import { getData, goals, toggleHidden, postData } from "./common.js";

// Info
const infoPopup = document.querySelector(".personal-information__popup");

const inputName = document.querySelector(".name");
const inputAge = document.querySelector(".age");
const inputHeight = document.querySelector(".height");
const inputWeight = document.querySelector(".weight");

const infoName = document.querySelector(".info-name");
const infoAge = document.querySelector(".info-age");
const infoHeight = document.querySelector(".info-height");
const infoWeight = document.querySelector(".info-weight");

const editInfoBtn = document.querySelector(".edit-info__btn");

// Goal
const goalPopup = document.querySelector(".goals-popup");
const goalText = document.querySelector(".goal-text");
const editGoalBtn = document.querySelector(".edit-goal__btn");
const goalSelect = document.querySelector(".goal-select");

// BMI

const bmiValue = document.querySelectorAll(".bmi-value");
const bmiStatus = document.querySelector(".bmi-status");
const idealWeight = document.querySelector(".ideal-weight");

editInfoBtn.addEventListener("click", function () {
  toggleHidden(infoPopup);
});
editGoalBtn.addEventListener("click", function () {
  toggleHidden(goalPopup);
});

infoPopup.addEventListener("submit", async function (e) {
  e.preventDefault();
  infoName.textContent = inputName.value;
  infoAge.textContent = inputAge.value;
  infoHeight.textContent = inputHeight.value;
  infoWeight.textContent = inputWeight.value;
  const infoData = {
    name: inputName.value,
    age: inputAge.value,
    height: inputHeight.value,
    weight: inputWeight.value,
  };

  try {
    const response = await postData(
      infoData,
      "../backend/controllers/updateProfile.php"
    );
    if (response.ok) {
      const data = await response.json();
      alert(data.message);
      infoPopup.reset();
    }
  } catch (error) {
    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
  toggleHidden(infoPopup);
});

goalPopup.addEventListener("submit", async function (e) {
  e.preventDefault();
  const goalData = {
    goal: goalSelect.value,
  };
  try {
    const response = await postData(
      goalData,
      "../backend/controllers/updateGoal.php"
    );
    if (response.ok) {
      const data = await response.json();
      alert(data.message);
      infoPopup.reset();
    }
  } catch (error) {
    console.log("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
  toggleHidden(goalPopup);
});

const calcIdealWeight = (height, bmi) => bmi * (height / 100) ** 2;

async function updateUI() {
  const userData = await getData("../backend/api/get-user-info.php");
  const userProgress = await getData("../backend/api/get-progress.php");
  console.log(userProgress);
  console.log(userData);
  infoName.textContent = inputName.value = userData.name;
  infoAge.textContent = inputAge.value = userData.age;
  infoHeight.textContent = inputHeight.value = userData.height;
  infoWeight.textContent = inputWeight.value = userData.weight;
  goalText.textContent = goals[userData.goal];

  bmiValue.forEach((el) => {
    el.textContent = userProgress.data[0].bmi;
  });

  console.log();

  idealWeight.textContent = Math.floor(
    calcIdealWeight(userData.height, userProgress.data[0].bmi)
  );
}

updateUI();
