document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("signupForm");

    form.addEventListener("submit", function(event) {
        clearErrorMessages();

        const nameField = form.querySelector("[name='sname']");
        const emailField = form.querySelector("[name='semail']");
        const passwordField = form.querySelector("[name='pswd']");
        const confirmPasswordField = form.querySelector("[name='cpswd']");

        const errorMessages = [];

        const namePattern = /^[A-Za-z]{3,}$/;
        if (!namePattern.test(nameField.value)) {
            if (nameField.value.length < 3) {
                errorMessages.push({ field: nameField, message: "Name must be at least 3 characters long" });
            }
            if (!/^[A-Za-z]+$/.test(nameField.value)) {
                errorMessages.push({ field: nameField, message: "Name must contain only letters" });
            }
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailField.value)) {
            errorMessages.push({ field: emailField, message: "Enter a valid email address" });
        }

        const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passwordPattern.test(passwordField.value)) {
            if (passwordField.value.length < 8) {
                errorMessages.push({ field: passwordField, message: "Password must be at least 8 characters long" });
            } else {
                errorMessages.push({ field: passwordField, message: "Password must contain a lowercase letter, an uppercase letter, a number, and a special character" });
            }
        }

        if (passwordField.value !== confirmPasswordField.value) {
            errorMessages.push({ field: confirmPasswordField, message: "Passwords do not match" });
        }

        if (errorMessages.length > 0) {
            event.preventDefault();

            errorMessages.forEach(error => {
                const errorDiv = document.createElement("div");
                errorDiv.textContent = error.message;
                errorDiv.className = "error-message";
                errorDiv.style.color = "red"; // Apply red color
                errorDiv.style.fontSize = "12px"; // Apply font size
                errorDiv.style.marginTop = "5px"; // Apply margin
                error.field.parentNode.appendChild(errorDiv);
            });
        }
    });

    function clearErrorMessages() {
        const errorDivs = form.querySelectorAll(".error-message");
        errorDivs.forEach(div => div.remove());
    }
});