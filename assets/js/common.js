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

export const goals = {
  gain_muscle: "Muscle Gain(Bulking)",
  lose_weight: "Weight Lose",
  improve_endurance: "Endurance",
  maintain: "Maintain Fitness",
  other: "Other",
};
