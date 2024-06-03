const otp = document.querySelectorAll('.otp-field');

// Focus on the first input
otp[0].focus();

otp.forEach((field, index) => {
    field.addEventListener('keydown', (e) => {
        if (e.key >= 0 && e.key <= 9) {
            otp[index].value = "";
            setTimeout(() => {
                otp[index + 1].focus();
            }, 4);
        } else if (e.key === 'Backspace') {
            setTimeout(() => {
                otp[index - 1].focus();
            }, 4);
        }
    });
});

const form = document.querySelector('.form form');
const submitbtn = form.querySelector('.submit .button');
const errortxt = form.querySelector('.error-text');

form.onsubmit = (e) => {
    e.preventDefault();
};

submitbtn.onclick = async () => {
    try {
        const formData = new FormData(form); // Creating new object from form data

        const response = await fetch('./php/otp.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            const data = await response.text();
            if (data === "success") {
                location.href = "./homepage.php";
            } else {
                errortxt.textContent = data;
                errortxt.style.display = "block";
            }
        } else {
            console.error('Network response was not ok.');
        }
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
};
