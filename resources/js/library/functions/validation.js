import { Country } from "country-state-city";

export function validateName(name) {
    const regex = /^[a-zA-Z]{3,}$/;

    if (regex.test(name)) {
        return true;
    } else {
        return false;
    }
}

export function validateEmail(email) {
    const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (regex.test(email)) {
        return true;
    } else {
        return false;
    }
}

export function validatePassword(password) {
    const regex = /^[\x20-\x7E].{8,32}$/;

    if (regex.test(password)) {
        return true;
    } else {
        return false;
    }
}

export function validatePhone(phone) {
    const regex =
        /((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))/g;

    if (regex.test(phone)) {
        return true;
    } else {
        return false;
    }
}

/**
 * @param {string} country
 */
export function validateCountry(country) {
    for (const valid_country of Country.getAllCountries()) {
        if (country.toLowerCase() === valid_country.name.toLowerCase()) {
            return true;
        }
    }

    return false;
}

/**
 * @param {HTMLInputElement} input The form input
 * @param {string} message
 */
export function validationEngine(input, validator, message) {
    const errorMsg = input.parentElement.querySelector(".validation-error");
    const successIcon = input.parentElement.querySelector(".success-icon");
    const failureIcon = input.parentElement.querySelector(".failure-icon");

    if (validator(input.value.trim())) {
        errorMsg.innerHTML = "";
        input.classList.add("border-green-500");
        input.classList.remove("border-red-500");

        // icons
        failureIcon.classList.add("opacity-0");
        successIcon.classList.remove("opacity-0");
    } else {
        errorMsg.innerHTML = message;
        input.classList.add("border-red-500");
        input.classList.remove("border-green-500");

        // icons
        failureIcon.classList.remove("opacity-0");
        successIcon.classList.add("opacity-0");
    }
}

export default {
    validateName,
    validateEmail,
    validatePhone,
    validateCountry,
    validatePassword,
    validationEngine,
};
