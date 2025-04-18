const backdrop = document.querySelector(".backdrop");
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
const saveInfoBtn = document.querySelector(".save-info__btn");

// Goal
const goalPopup = document.querySelector(".goals-popup");
const goalText = document.querySelector(".goal-text");
const editGoalBtn = document.querySelector(".edit-goal__btn");
const saveGoalBtn = document.querySelector(".save-goal__btn");
const goalSelect = document.querySelector(".goal-select");

function toggleHidden(popup) {
  backdrop.classList.toggle("hidden");
  popup.classList.toggle("hidden");
}

editInfoBtn.addEventListener("click", function () {
  toggleHidden(infoPopup);
});
editGoalBtn.addEventListener("click", function () {
  toggleHidden(goalPopup);
});

saveInfoBtn.addEventListener("click", function (e) {
  e.preventDefault();
  infoName.textContent = inputName.value;
  infoAge.textContent = inputAge.value;
  infoHeight.textContent = inputHeight.value;
  infoWeight.textContent = inputWeight.value;
  toggleHidden(infoPopup);
});

saveGoalBtn.addEventListener("click", function (e) {
  e.preventDefault();
  goalText.textContent = goalSelect.options[goalSelect.selectedIndex].text;
  toggleHidden(goalPopup);
});
