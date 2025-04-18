import { toggleShowHidePass } from "./common.js";

const createPasswordInput = document.getElementById("create-password");
const confirmPasswordInput = document.getElementById("confirm-password");

const createShowIcon = document.querySelector(".create_show");
const createhideIcon = document.querySelector(".create_hide");

const confirmShowIcon = document.querySelector(".confirm_show-password");
const confirmHideIcon = document.querySelector(".confirm_hide-password");

toggleShowHidePass(createPasswordInput, createhideIcon, createShowIcon);
toggleShowHidePass(confirmPasswordInput, confirmHideIcon, confirmShowIcon);
