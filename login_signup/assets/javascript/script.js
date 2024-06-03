let currentStep = 0; // Keep track of the current step
const steps = document.querySelectorAll(".step");

// Move to the next step
function nextStep() {
  if (validateForm()) {
    // Validate the form before proceeding
    steps[currentStep].classList.remove("active");
    currentStep++;
    steps[currentStep].classList.add("active");
    updateNavSteps();
    updateSummary(); // Update the summary if moving to the summary step
  }
}

// Move to the previous step
function prevStep() {
  steps[currentStep].classList.remove("active");
  currentStep--;
  steps[currentStep].classList.add("active");
  updateNavSteps();
}

// Update navigation steps to reflect the current step
function updateNavSteps() {
  const navSteps = document.querySelectorAll(".nav-steps div");
  navSteps.forEach((navStep, index) => {
    if (index === currentStep) {
      navStep.classList.add("active");
    } else {
      navStep.classList.remove("active");
    }
  });
}

// Move to the previous step
function prevStep() {
  steps[currentStep].classList.remove("active");
  currentStep--;
  steps[currentStep].classList.add("active");
  updateNavSteps();
}

// Update navigation steps to reflect the current step
function updateNavSteps() {
  const navSteps = document.querySelectorAll(".nav-steps div");
  navSteps.forEach((navStep, index) => {
    if (index <= currentStep) {
      navStep.classList.add("active");
    } else {
      navStep.classList.remove("active");
    }
  });
}

// Add a new function to move to a specific step
function moveToStep(step) {
  if (step >= 0 && step < steps.length) {
    steps[currentStep].classList.remove("active");
    currentStep = step;
    steps[currentStep].classList.add("active");
    updateNavSteps();
  }
}

// Modify the nextStep function to activate all steps if step 3 is active
function nextStep() {
  if (validateForm()) {
    steps[currentStep].classList.remove("active");
    currentStep++;
    steps[currentStep].classList.add("active");
    updateNavSteps();
    if (currentStep === 3) {
      for (let i = 0; i < steps.length; i++) {
        steps[i].classList.add("active");
      }
    }
    updateSummary(); // Update the summary if moving to the summary step
  }
}

// Validate the current step's form fields
function validateForm() {
  const currentForm = steps[currentStep].querySelectorAll("input[required]");
  let valid = true;
  currentForm.forEach((input) => {
    if (!input.checkValidity()) {
      input.classList.add("is-invalid");
      valid = false;
    } else {
      input.classList.remove("is-invalid");
    }
  });
  return valid;
}

// Update the order summary with the input values
function updateSummary() {
  if (currentStep === 2) {
    document.getElementById("summaryFirstName").innerText =
      document.getElementById("firstName").value;
    document.getElementById("summaryLastName").innerText =
      document.getElementById("lastName").value;
    document.getElementById("summaryPhoneNumber").innerText =
      document.getElementById("phoneNumber").value;
    document.getElementById("summaryEmailAddress").innerText =
      document.getElementById("emailAddress").value;
    document.getElementById("summaryAddress").innerText =
      document.getElementById("address").value;
    document.getElementById("summaryOtherLocation").innerText =
      document.getElementById("otherLocation").value;
    document.getElementById("summaryShippingMethod").innerText =
      document.querySelector(
        'input[name="shippingMethod"]:checked'
      ).nextElementSibling.innerText;
    document.getElementById("summaryPaymentMethod").innerText =
      document.querySelector(
        'input[name="paymentMethod"]:checked'
      ).nextElementSibling.innerText;
  }
}

// Handle form submission
document
  .getElementById("multiStepForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    if (validateForm()) {
      alert("Order Submitted!"); // Submit the form
    }
  });

// Display current date and time
function updateDateTime() {
  const dateTimeElement = document.getElementById("currentDateTime");
  const now = new Date();
  const options = {
    year: "numeric",
    month: "long",
    day: "numeric",
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
  };
  dateTimeElement.innerText = now.toLocaleDateString(undefined, options);
}

updateDateTime(); // Initial call to display the current date and time
setInterval(updateDateTime, 1000); // Update the date and time every second
