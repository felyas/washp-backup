const form = document.querySelector('.form form'),
      submitbtn = form.querySelector('.submit input'),
      errortxt = form.querySelector('.error-text');

form.onsubmit = async (e) => {
  e.preventDefault();
  
  // Change button text to "Processing..." and disable it
  submitbtn.value = "Processing...";
  submitbtn.disabled = true;

  try {
    let formData = new FormData(form); // Creating new object from form data

    let response = await fetch('./php/signup.php', {
      method: 'POST',
      body: formData
    });

    if (response.ok) {
      let data = await response.text();
      if (data === "success") {
        location.href = "./verify.php";
      } else {
        errortxt.textContent = data;
        errortxt.style.display = "block";
        submitbtn.value = "Signup Now";
        submitbtn.disabled = false;
      }
    } else {
      console.error('Network response was not ok.');
      submitbtn.value = "Signup Now";
      submitbtn.disabled = false;
    }
  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
    submitbtn.value = "Signup Now";
    submitbtn.disabled = false;
  }
}

// Add event listeners to all input fields to hide the error message on input
const inputs = form.querySelectorAll('input');
inputs.forEach(input => {
  input.addEventListener('input', () => {
    errortxt.style.display = 'none';
  });
});
