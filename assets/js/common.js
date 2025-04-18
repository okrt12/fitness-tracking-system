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
