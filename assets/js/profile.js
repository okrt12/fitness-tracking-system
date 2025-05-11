import {
  getData,
  goals,
  toggleHidden,
  postData,
  backdrop,
  addHidden,
  getBMIStatus,
} from "./common.js";

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
const achievementContainer = document.querySelector(
  ".achievement-tags__container"
);

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

backdrop.addEventListener("click", function () {
  addHidden(infoPopup);
  addHidden(goalPopup);
});

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    addHidden(infoPopup);
    addHidden(goalPopup);
  }
});

const calcIdealWeight = function (height) {
  return [
    (18.5 * (height / 100) ** 2).toFixed(0),
    (24.9 * (height / 100) ** 2).toFixed(0),
  ];
};

async function updateUI() {
  const userData = await getData("../backend/api/get-user-info.php");
  const userProgress = await getData("../backend/api/get-progress.php");
  infoName.textContent = inputName.value = userData.name;
  infoAge.textContent = inputAge.value = userData.age;
  infoHeight.textContent = inputHeight.value = userData.height;
  infoWeight.textContent = inputWeight.value = userData.weight;
  goalText.textContent = goals[userData.goal];

  bmiValue.forEach((el) => {
    el.textContent = userProgress.data.length
      ? userProgress.data[0].bmi
      : userData.bmi;
  });

  bmiStatus.textContent = userProgress.data.length
    ? getBMIStatus(userProgress.data[0].bmi)
    : getBMIStatus(userData.bmi);
  if (!userProgress.data.lenght) return;
  calcIdealWeight(userData.height).forEach((el, i) => {
    document.querySelector(`.ideal-weight_${i}`).textContent = el;
  });
}

async function achievements() {
  const achievements = await getData("../backend/api/get-user-achievement.php");
  if (!achievements.achievements.length) {
    return;
  }
  document.querySelector(".no_achieve").classList.add("hidden");
  achievements.achievements.forEach((el) => {
    achievementContainer.insertAdjacentHTML(
      "beforeend",
      `<span class="cards-description achievement-tags normal-text">${el.description}</span>`
    );
  });
}

achievements();
updateUI();
