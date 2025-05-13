import {
  backdrop,
  postData,
  addOptions,
  getData,
  toggleHidden,
  addHidden,
  updateData,
} from "./common.js";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////   Variables       ////////////////////////////////////////////////////
const addScheduleForm = document.querySelector(".schedule-workout__form");
const scheduleTypeInput = document.getElementById("schedule-type");
const scheduleDayInput = document.getElementById("schedule-day");
const scheduleTimeInput = document.getElementById("schedule-time");
const scheduleDurationInput = document.getElementById("schedule-duration");
const scheduleDayNameInput = document.getElementById("workout_day_name");

// Edit
const editScheduleForm = document.querySelector(".edit-schedule__form");
const editScheduleTypeInput = document.getElementById("edit_schedule-type");
const editScheduleDayInput = document.getElementById("edit_schedule-day");
const editScheduleTimeInput = document.getElementById("edit_schedule-time");
const editScheduleDurationInput = document.getElementById(
  "edit_schedule-duration"
);
const editScheduleDayNameInput = document.getElementById(
  "edit_workout_day_name"
);

const timerDay = document.getElementById("days");
const timerHour = document.getElementById("hours");
const timerMinutes = document.getElementById("minutes");
const dayLabel = document.querySelector(".day-label");
const hourLabel = document.querySelector(".hour-label");
const minuteLabel = document.querySelector(".minute-label");

const yesNoPopup = document.querySelector(".yes-no__popup");
const yesBtn = document.querySelector(".yes");
const noBtn = document.querySelector(".no");

const totalWeekWorkout = document.querySelector(".total-workout_time");
const weekWorkoutDay = document.querySelector(".workout-days");

//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////   Edit and Update Schedule   //////////////////////////////

const workoutContainer = document.querySelectorAll(".workout");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////   Styles       ////////////////////////////////////////////////////
const dayToUpdate = document.querySelectorAll(".spacer .day");
const day1 = document.querySelector(".mon");
const width = day1.getBoundingClientRect().width;

function updateMinWidths() {
  dayToUpdate.forEach((el) => {
    el.style.minWidth = `${width}px`;
  });
}
updateMinWidths();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////    Const Var       //////////////////////////////////////////////////
const weekData = [];
const days = {
  1: "Monday",
  2: "Tuesday",
  3: "Wednesday",
  4: "Thursday",
  5: "Friday",
  6: "Saturday",
  0: "Sunday",
};

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////    Functions       //////////////////////////////////////////////////

function getRecentData(data, day) {
  const scheduleDay = data.filter((el) => el.day_of_week === day);
  if (scheduleDay.length === 0) return 0;
  scheduleDay.sort(
    (a, b) => new Date(b.schedule_date) - new Date(a.schedule_date)
  );
  return scheduleDay[0];
}

function getWeekData(weekData, data) {
  workoutContainer.forEach((el) => {
    const elementsDay = days[el.nextElementSibling.getAttribute("data-day")];
    weekData.push(getRecentData(data, elementsDay));
  });
}

function deletePost(scheduleID) {
  const scheduleData = {
    schedule_id: scheduleID,
  };

  yesBtn.addEventListener("click", async function (e) {
    try {
      const response = await updateData(
        scheduleData,
        "../backend/controllers/deleteWorkoutSchedule.php"
      );

      if (response.ok) {
        const data = await response.json();
        alert(data.message);
        toggleHidden(yesNoPopup);
      }
    } catch (error) {
      console.log("Error: ", error);
      alert("An unexpected error occurred. Please try again later.");
    }
  });
}

function updateWorkoutSchedule(scheduleID) {
  editScheduleForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const scheduleData = {
      schedule_id: scheduleID,
      day_of_week: editScheduleDayInput.value,
      workout_id: selectedID,
      workout_day_name: editScheduleDayNameInput.value,
      time: editScheduleTimeInput.value,
      duration: editScheduleDurationInput.value,
      workout_id: editSelectedID,
    };

    try {
      const response = await updateData(
        scheduleData,
        "../backend/controllers/editWorkoutSchedule.php"
      );
      if (response.ok) {
        const data = await response.json();
        alert(data.message);
        editScheduleForm.reset();
      }
    } catch (error) {
      console.log("Error: ", error);
      alert("An unexpected error occurred. Please try again later.");
    }

    toggleHidden(editScheduleForm);
  });
}

function postWorkoutSchedule() {
  addScheduleForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const scheduleData = {
      day_of_week: scheduleDayInput.value,
      workout_id: selectedID,
      workout_day_name: scheduleDayNameInput.value,
      time: scheduleTimeInput.value,
      duration: scheduleDurationInput.value,
    };

    try {
      const response = await postData(
        scheduleData,
        "../backend/controllers/postWorkoutSchedule.php"
      );
      if (response.ok) {
        const data = await response.json();
        alert(data.message);
        addScheduleForm.reset();
      }
    } catch (error) {
      console.log("Error: ", error);
      alert("An unexpected error occurred. Please try again later.");
    }

    toggleHidden(addScheduleForm);
  });
}

async function updateDaysData() {
  const data = await getData("../backend/api/get-workouts-schedule.php");

  getWeekData(weekData, data.data);

  workoutContainer.forEach((el, i) => {
    const html =
      weekData[i] && weekData[i].workout_day_name !== "No Workout"
        ? `
    <span class = "normal-text cards-description workout_day_name">${
      weekData[i].workout_day_name
    }</span>
    <span class = "normal-text cards-description schedule_time">${weekData[
      i
    ].time
      .split("")
      .splice(0, 5)
      .join("")}</span>
      <div>
    <span class = "normal-text cards-description schedule_duration" data-min = ${
      weekData[i].duration
    }>${
            weekData[i].duration >= 60
              ? Math.floor(weekData[i].duration / 60) + " hr"
              : weekData[i].duration + " min"
          }</span> 
    <span class = "normal-text cards-description">${
      weekData[i].duration > 60 && weekData[i].duration % 60 !== 0
        ? (weekData[i].duration % 60) + " min"
        : ""
    }</span>
    </div>
    `
        : `<span>No Workout</span>`;
    el.insertAdjacentHTML("beforeend", html);
    const schedule_id = weekData[i].schedule_id || "";
    el.setAttribute("data-schedule_id", schedule_id);
  });
}

async function addSchedule() {
  workoutContainer.forEach((el) => {
    const addIcon = el.nextElementSibling.children[0];
    addIcon.addEventListener("click", function (e) {
      const scheduleID = el.getAttribute("data-schedule_id");
      if (!scheduleID || scheduleID !== scheduleID + " no") {
        const elementsDay = addIcon.parentElement.getAttribute("data-day");
        scheduleDayInput.value = days[elementsDay];
        toggleHidden(addScheduleForm);
        postWorkoutSchedule();
      } else {
        console.log(el.getAttribute("data-schedule_id"));
        alert("There is already schedule please click the edit button");
      }
    });
  });
}

async function editSchedule() {
  workoutContainer.forEach((el) => {
    const workoutDayName = el.querySelector(".workout_day_name");
    const time = el.querySelector(".schedule_time");
    const duration = el.querySelector(".schedule_duration");
    const editIcon = el.nextElementSibling.children[1];

    editIcon.addEventListener("click", function (e) {
      const scheduleID = el.getAttribute("data-schedule_id");
      if (scheduleID) {
        const elementsDay = editIcon.parentElement.getAttribute("data-day");
        editScheduleDayInput.value = days[elementsDay];
        let durationText;
        if (duration) {
          durationText = duration.getAttribute("data-min");
        }

        toggleHidden(editScheduleForm);
        if (workoutDayName)
          editScheduleDayNameInput.value = workoutDayName.textContent;
        if (time) editScheduleTimeInput.value = time.textContent;
        if (duration)
          editScheduleDurationInput.value =
            (durationText < 10 && durationText * 60) || durationText;
        updateWorkoutSchedule(scheduleID);
      } else {
        alert("Please first add schedule to edit");
      }
    });
  });
}

async function deleteSchedule() {
  workoutContainer.forEach((el) => {
    const scheduleID = el.getAttribute("data-schedule_id");
    const delIcon = el.nextElementSibling.children[2];

    delIcon.addEventListener("click", function (e) {
      if (scheduleID) {
        toggleHidden(yesNoPopup);
        deletePost(scheduleID);
        el.setAttribute("data-schedule_id", scheduleID + " no");
        console.log(el.getAttribute("data-schedule_id"));
      } else {
        alert("There is no schedule to delete");
      }
    });
    noBtn.addEventListener("click", function () {
      toggleHidden(yesNoPopup);
    });
  });
}

function updateTotalWeekWorkout() {
  const total = weekData
    .filter((el) => el)
    .map((el) => el.duration)
    .reduce((acc, curr) => {
      acc += curr;
      return acc;
    }, 0);

  totalWeekWorkout.textContent =
    total >= 60
      ? total % 60 === 0
        ? Math.floor(total / 60) + " hrs "
        : Math.floor(total / 60) + " hrs " + (total % 60) + " min"
      : total + " min";
}

function workoutDays() {
  const workoutDay = weekData
    .filter((el) => el)
    .map((el) => el.day_of_week)
    .forEach((el) => {
      const html = `<span>${el}</span>`;
      weekWorkoutDay.insertAdjacentHTML("beforeend", html);
    });
}

function getTodaySchedule() {
  const date = new Date();
  const today = days[date.getDay()]
    .toLowerCase()
    .split("")
    .splice(0, 3)
    .join("");
  workoutContainer.forEach((el) => {
    const todayContainer = el.parentElement;
    if (todayContainer.classList.contains(today)) {
      todayContainer.classList.add("today");
    }
  });
}

const dayIndex = {
  Sunday: 0,
  Monday: 1,
  Tuesday: 2,
  Wednesday: 3,
  Thursday: 4,
  Friday: 5,
  Saturday: 6,
};

async function getNextWorkout() {
  const date = new Date();
  const todayIndex = date.getDay();
  const timeNow = date.toTimeString().split(" ").splice(0, 1).join("");

  const orderDays = [];
  for (let i = 0; i < 7; i++) {
    orderDays.push((todayIndex + i) % 7);
  }

  const sortedWorkouts = weekData
    .filter((el, i) => {
      if (!el) return false;
      const workoutDayIndex = dayIndex[el.day_of_week];
      if (workoutDayIndex === todayIndex) {
        return el.time > timeNow;
      } else if (orderDays.includes(workoutDayIndex)) {
        return true;
      }
      return false;
    })
    .sort((a, b) => {
      const aIndex = orderDays.indexOf(dayIndex[a.day_of_week]);
      const bIndex = orderDays.indexOf(dayIndex[b.day_of_week]);
      return aIndex - bIndex;
    });

  const nextWorkout = sortedWorkouts[0];

  const nextWorkoutDate = new Date();
  nextWorkoutDate.setHours(
    Number(nextWorkout.time.split(":")[0]),
    Number(nextWorkout.time.split(":")[1]),
    Number(nextWorkout.time.split(":")[2] || 0)
  );

  const workoutDayIndex = dayIndex[nextWorkout.day_of_week];

  let dayDiff = (workoutDayIndex - todayIndex + 7) % 7;
  if (dayDiff !== 0) {
    nextWorkoutDate.setDate(date.getDate() + dayDiff);
  }

  const diffMs = nextWorkoutDate - date;
  const diffMinutes = Math.floor(diffMs / 60000);

  const hours = diffMinutes >= 60 ? Math.floor(diffMinutes / 60) : 0;
  const min = diffMinutes >= 60 ? diffMinutes % 60 : diffMinutes;
  timer(0, hours, min);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////   Timer       ////////////////////////////////////////////////////

function timer(day, hour, minutes) {
  while (hour >= 24) {
    if (hour >= 24) {
      day += 1;
      hour -= 24;
    }
    if (minutes === 60) {
      hour += 1;
      minutes = 0;
    }
  }

  function updateDisplay() {
    timerDay.textContent = day > 9 ? day : "0" + day;
    timerHour.textContent = hour > 9 ? hour : "0" + hour;
    timerMinutes.textContent = minutes > 9 ? minutes : "0" + minutes;

    dayLabel.textContent = day > 1 ? "Days" : "Day";
    hourLabel.textContent = hour > 1 ? "Hours" : "Hour";
    minuteLabel.textContent = minutes > 1 ? "Minutes" : "Minute";
  }

  updateDisplay();
  setInterval(() => {
    if (minutes > 0) {
      minutes--;
    } else {
      if (hour > 0) {
        hour--;
        minutes = 59;
      } else if (day > 0) {
        day--;
        hour = 23;
        minutes = 59;
      } else {
        clearInterval(interval);
      }
    }
    updateDisplay();
  }, 60000);
}
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

let selectedID;
(async () => {
  await addOptions(
    scheduleTypeInput,
    "../backend/api/get-workout.php",
    "workout_id",
    "name",
    "schedule-type"
  );
  await addOptions(
    editScheduleTypeInput,
    "../backend/api/get-workout.php",
    "workout_id",
    "name",
    "schedule-type"
  );

  scheduleTypeInput.addEventListener("change", () => {
    selectedID = scheduleTypeInput.value;
  });
})();
let editSelectedID;
editScheduleTypeInput.addEventListener("change", () => {
  editSelectedID = editScheduleTypeInput.value;
});

backdrop.addEventListener("click", function () {
  addHidden(addScheduleForm);
  addHidden(editScheduleForm);
  addHidden(yesNoPopup);
});

(async () => {
  await updateDaysData();
  addSchedule();
  editSchedule();
  deleteSchedule();
  updateTotalWeekWorkout();
  workoutDays();
  getTodaySchedule();
  getNextWorkout();
})();
