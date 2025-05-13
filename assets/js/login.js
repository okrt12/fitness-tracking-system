import { toggleShowHidePass } from "./common.js";
const loginPasswordInput = document.getElementById("password");
const loginEmailInput = document.getElementById("email");
const loginForm = document.querySelector(".login-form");

const loginShowIcon = document.querySelector(".login_show");
const loginHideIcon = document.querySelector(".login_hide");
const errorSuccess = document.querySelector(".error_success");

toggleShowHidePass(loginPasswordInput, loginHideIcon, loginShowIcon);

loginForm.addEventListener("submit", async function (e) {
  e.preventDefault();

  const userData = {
    email: loginEmailInput.value.trim(),
    password: loginPasswordInput.value,
  };

  try {
    const response = await fetch("../backend/auth/login_auth.php", {
      method: "POST",
      body: JSON.stringify(userData),
      headers: {
        "Content-Type": "application/json",
      },
    });

    loginEmailInput.classList.remove("error-input");
    loginPasswordInput.classList.remove("error-input");

    const data = await response.json();

    if (response.ok) {
      if (data.success) {
        // alert("Successfull");
        errorSuccess.textContent = data.message;
        errorSuccess.style.color = "#00c853";
        setTimeout(() => {
          window.location.href = "../../pages/dashboard.php";
        }, 1000);
      }
    }

    if (!data.success) {
      loginEmailInput.classList.add("error-input");
      loginPasswordInput.classList.add("error-input");
      errorSuccess.textContent = data.message;
      errorSuccess.style.color = "#ef5350";
      return;
    }
  } catch (error) {
    console.error("Error: ", error);
    alert("An unexpected error occurred. Please try again later.");
  }
});
