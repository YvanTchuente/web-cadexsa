import validation from "./library/functions/validation";

if (document.querySelectorAll("input.name")) {
    const names = document.querySelectorAll("input.name");
    for (const name of names) {
        name.addEventListener("keyup", (event) => {
            const name = event.currentTarget;
            if (name.value) {
                validation.validationEngine(
                    name,
                    validation.validateName,
                    "Invalid name"
                );
            } else {
                cleanup(name);
            }
        });
    }
}

if (document.getElementsByName("password")) {
    const passwords = document.getElementsByName("password");
    for (const password of passwords) {
        password.addEventListener("keyup", (event) => {
            const password = event.currentTarget;
            if (password.value) {
                validation.validationEngine(
                    password,
                    validation.validatePassword,
                    "Invalid password"
                );
            } else {
                cleanup(password);
            }
        });
    }
}

if (document.getElementsByName("email")) {
    const emails = document.getElementsByName("email");
    for (const email of emails) {
        email.addEventListener("keyup", (event) => {
            const email = event.currentTarget;
            if (email.value) {
                validation.validationEngine(
                    email,
                    validation.validateEmail,
                    "Invalid email address"
                );
            } else {
                cleanup(email);
            }
        });
    }
}

if (document.getElementsByName("phone")) {
    const phone_numbers = document.getElementsByName("phone");
    for (const phone_number of phone_numbers) {
        phone_number.addEventListener("keyup", (event) => {
            const phone_number = event.currentTarget;
            if (phone_number.value) {
                validation.validationEngine(
                    phone_number,
                    validation.validatePhone,
                    "Invalid phone number"
                );
            } else {
                cleanup(phone_number);
            }
        });
    }
}

if (document.getElementsByClassName("password-read-toggle")) {
    const password_read_toggles = document.getElementsByClassName(
        "password-read-toggle"
    );
    for (const password_read_toggle of password_read_toggles) {
        password_read_toggle.addEventListener("click", (event) => {
            const password_read_toggle = event.currentTarget;
            const input = password_read_toggle.previousElementSibling;

            if (input.getAttribute("type") === "text") {
                input.setAttribute("type", "password");
                password_read_toggle.classList.remove("fa-eye-slash");
                password_read_toggle.classList.add("fa-eye");
            } else {
                input.setAttribute("type", "text");
                password_read_toggle.classList.remove("fa-eye");
                password_read_toggle.classList.add("fa-eye-slash");
            }
        });
    }
}

function cleanup(input) {
    input.classList.remove("border-red-500", "border-green-500");
    input.parentElement.querySelector(".validation-error").innerHTML = "";
    input.parentElement
        .querySelector(".success-icon")
        .classList.add("opacity-0");
    input.parentElement
        .querySelector(".failure-icon")
        .classList.add("opacity-0");
}
