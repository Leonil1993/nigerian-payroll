// main script
(function () {
  'use strict'

  const date = new Date();
  const monthClass = document.querySelector(".month");
  const monthId = document.querySelector("#c-month");
  const year = document.querySelector("#c-year");
  const yearClass = document.querySelectorAll(".year");
  
  let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  monthClass.innerHTML = months[date.getMonth()];
  monthId.value = months[date.getMonth()];
  year.value = date.getFullYear();
  yearClass.innerText = date.getFullYear();
})()
