let btn = document.querySelector(".add-tasks");
let form = document.querySelector(".form-class");
let close = document.querySelector(".del");
btn.onclick = () => {
  form.classList.add("active");
};
close.onclick = () => {
  form.classList.remove("active");
};
