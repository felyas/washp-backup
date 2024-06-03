const form = document.querySelector(".form form"),
  submitbtn = form.querySelector(".submit input"),
  errortxt = form.querySelector(".error-text");

form.onsubmit = (e) => {
  e.preventDefault();
};

submitbtn.onclick = async () => {
  try {
    let formData = new FormData(form); // Creating new object from form data

    let response = await fetch("./php/signup_admin.php", {
      method: "POST",
      body: formData,
    });

    if (response.ok) {
      let data = await response.text();
      if (data === "success") {
        location.href = "./verify_admin.php";
      } else {
        errortxt.textContent = data;
        errortxt.style.display = "block";
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
