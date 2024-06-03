const form = document.querySelector(".form form"),
  submitbtn = form.querySelector(".submit input"),
  errortxt = form.querySelector(".error-text");

let attemptCounter = 0;
const maxAttempts = 3;
const cooldownTime = 20000;

form.onsubmit = (e) => {
  e.preventDefault();
};

submitbtn.onclick = async () => {
  if (attemptCounter >= maxAttempts) {
    return;
  }

  try {
    let formData = new FormData(form); // Creating new object from form data

    let response = await fetch("./php/login.php", {
      method: "POST",
      body: formData,
    });

    if (response.ok) {
      let data = await response.text();
      data = data.trim();

      if (data === "success_user") {
        location.href = "./homepage.php";
      } else if (data === "success_admin") {
        location.href = "./Aindex.php";
      } else if (data === "success_delivery") {
        location.href = "./Dindex.php";
      } else {
        attemptCounter++;
        errortxt.textContent = data;
        errortxt.style.display = "block";

        if (attemptCounter >= maxAttempts) {
          let remainingTime = cooldownTime / 1000;
          errortxt.textContent = `Too many incorrect attempts. Please wait ${remainingTime} seconds before trying again.`;
          errortxt.style.display = "block";
          submitbtn.disabled = true;

          let countdownInterval = setInterval(() => {
            remainingTime--;
            if (remainingTime > 0) {
              errortxt.textContent = `Too many incorrect attempts. Please wait ${remainingTime} seconds before trying again.`;
            } else {
              clearInterval(countdownInterval);
              attemptCounter = 0;
              submitbtn.disabled = false;
              errortxt.style.display = "none";
            }
          }, 1000);
        }
      }
    } else {
      console.error("Network response was not ok.");
    }
  } catch (error) {
    console.error("There was a problem with the fetch operation:", error);
  }
};

// Add event listeners to all input fields to hide the error message on input
const inputs = form.querySelectorAll("input");
inputs.forEach((input) => {
  input.addEventListener("input", () => {
    errortxt.style.display = "none";
  });
});
