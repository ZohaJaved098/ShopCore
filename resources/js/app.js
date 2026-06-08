import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const toggleThis = document.getElementById("togglePassword");
const toggleBtn = document.getElementById("toggleBtn");
const toggleBtnSlash = document.getElementById("toggleBtnSlash");

let count = 0;
toggleBtn.onclick = () => {
    toggleThis.type = "text";
    toggleBtn.classList.add("hidden");
    toggleBtnSlash.classList.remove("hidden");
};
toggleBtnSlash.onclick = () => {
    toggleThis.type = "password";
    toggleBtn.classList.remove("hidden");
    toggleBtnSlash.classList.add("hidden");
};
