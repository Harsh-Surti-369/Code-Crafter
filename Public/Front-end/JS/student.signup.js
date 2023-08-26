document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("signupForm");

    form.addEventListener("submit", function (event) {
      clearErrorMessages();

      const nameField = form.querySelector("[name='sname']");
      const emailField = form.querySelector("[name='semail']");
      const passwordField = form.querySelector("[name='pswd']");
      const confirmPasswordField = form.querySelector("[name='cpswd']");

      const errorMessages = [];

      const namePattern = /^[A-Za-z]{3,}$/;
      if (!namePattern.test(nameField.value)) {
        errorMessages.push({ field: nameField, message: "Name must be at least 3 characters long and contain only letters" });
      }

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(emailField.value)) {
        errorMessages.push({ field: emailField, message: "Invalid email format" });
      }

      const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      if (!passwordPattern.test(passwordField.value)) {
        errorMessages.push({ field: passwordField, message: "Password must be at least 8 characters long and contain a lowercase letter, an uppercase letter, a number, and a special character" });
      }

      if (passwordField.value !== confirmPasswordField.value) {
        errorMessages.push({ field: confirmPasswordField, message: "Passwords do not match" });
      }

      if (errorMessages.length > 0) {
        event.preventDefault();

        errorMessages.forEach(error => {
          const errorSpan = document.createElement("span");
          errorSpan.textContent = error.message;
          errorSpan.className = "error-message";
          errorSpan.style.color = "red"; // Apply red color
          errorSpan.style.fontSize = "12px"; // Apply font size
          errorSpan.style.marginTop = "5px"; // Apply margin
          error.field.parentNode.appendChild(errorSpan);
        });
      }
    });

    function clearErrorMessages() {
      const errorSpans = form.querySelectorAll(".error-message");
      errorSpans.forEach(span => span.remove());
    }
  });