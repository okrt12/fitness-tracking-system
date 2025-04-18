import { toggleShowHidePass } from "./common.js";
const loginPasswordInput = document.getElementById("password");

const loginShowIcon = document.querySelector(".login_show");
const loginHideIcon = document.querySelector(".login_hide");

toggleShowHidePass(loginPasswordInput, loginHideIcon, loginShowIcon);
