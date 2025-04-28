export function toggleShowHidePass(input, hideIcon, showIcon) {
  showIcon.addEventListener("click", (e) => {
    input.type = "text";
    hideIcon.classList.toggle("hide-icon");
    showIcon.classList.toggle("hide-icon");
  });

  hideIcon.addEventListener("click", (e) => {
    input.type = "password";
    hideIcon.classList.toggle("hide-icon");
    showIcon.classList.toggle("hide-icon");
  });
}

export async function getData(path) {
  try {
    const response = await fetch(path);
    if (!response.ok) {
      throw new Error("Failed to fetch user info");
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error:", error);
    alert("Could not load user info.");
    return "error";
  }
}

export async function postData(userData, path) {
  const response = await fetch(path, {
    method: "POST",
    body: JSON.stringify(userData),
    headers: {
      "Content-Type": "application/json",
    },
  });
  return response;
}
export async function updateData(userData, path) {
  const response = await fetch(path, {
    method: "PATCH",
    body: JSON.stringify(userData),
    headers: {
      "Content-Type": "application/json",
    },
  });
  return response;
}

export const goals = {
  gain_muscle: "Muscle Gain(Bulking)",
  lose_weight: "Weight Lose",
  improve_endurance: "Endurance",
  maintain: "Maintain Fitness",
  other: "Other",
};

export const workoutTypes = {
  running: 1,
  lifting: 2,
  cycling: 3,
  yoga: 4,
};

export async function addOptions(select, path, id, objName, selectName) {
  const userData = await getData(path);
  userData.data.forEach((element) => {
    const html = `<option name="${selectName}" value="${element[id]}">${element[objName]}</option>`;
    select.insertAdjacentHTML("beforeend", html);
  });
}

export function getCalorie(userData, selectedID, id, elCalorie) {
  let calories;
  userData.data.forEach((el) => {
    if (+selectedID && el[id] === +selectedID) {
      calories = el[elCalorie];
    }
  });
  return calories;
}
export const backdrop = document.querySelector(".backdrop");
export function toggleHidden(popup) {
  backdrop.classList.toggle("hidden");
  popup.classList.toggle("hidden");
}

export function addHidden(popup) {
  backdrop.classList.add("hidden");
  popup.classList.add("hidden");
}
