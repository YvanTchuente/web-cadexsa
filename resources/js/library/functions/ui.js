import Carousel from "../classes/carousel.js";
import Countdown from "../classes/countdown.js";

/**
 * Fades out an element in a given amount of time
 *
 * @param {HTMLElement} element The element to fade out
 * @param {number} time Time in milliseconds
 */
export function fadeOut(element, time) {
    if (!element) {
        return null;
    }
    if (time) {
        let opacity = 1;
        let intervalId = setInterval(() => {
            opacity -= 50 / time;

            if (opacity <= 0) {
                clearInterval(intervalId);
                opacity = 0;
                element.remove();
            }

            element.style.opacity = opacity;
            element.style.filter = `alpha(opacity=${opacity * 100})`;
        }, 50);
    } else {
        element.style.opacity = 0;
        element.style.filter = "alpha(opacity=0)";
        element.style.display = "none";
        // element.style.visibility = "hidden";
    }
}

/**
 * Increments the current count of a counter
 *
 * @param {HTMLElement} counter The counter to increments
 * @param {number} speed
 */
export function updateCount(counter, speed) {
    const target = parseInt(counter.getAttribute("data-target"));
    const count = parseInt(counter.innerText);
    const increment = target / speed;
    if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(updateCount(counter, speed), 100);
    } else {
        counter.innerText = target;
    }
}

/**
 * Starts all counters
 *
 * @param {number} speed
 */
export function start_counters(speed) {
    for (const counter of document.getElementsByClassName("counter")) {
        if (
            window.scrollY >=
            window.scrollY + counter.getBoundingClientRect()["top"] - 500
        ) {
            updateCount(counter, speed);
        }
    }
}

/**
 * Activates all carousels
 *
 * @param {HTMLCollection} carousel_elements
 */
export function start_carousels(carousel_elements) {
    if (carousel_elements.length > 0) {
        for (const carousel_element of carousel_elements) {
            const carousel = new Carousel(carousel_element);
            const carousel_previous_item_button =
                carousel_element.parentElement.querySelector(
                    "[data-ride='previous']"
                );
            const carousel_next_item_button =
                carousel_element.parentElement.querySelector(
                    "[data-ride='next']"
                );

            if (carousel_previous_item_button && carousel_next_item_button) {
                carousel_previous_item_button.addEventListener("click", () =>
                    carousel.previous()
                );
                carousel_next_item_button.addEventListener("click", () =>
                    carousel.next()
                );
            }

            carousel.start();
        }
    }
}

/**
 * Starts the given countdowns
 *
 * @param {HTMLCollection} countdowns
 */
export function start_countdowns(countdown_elements) {
    for (const countdown_element of countdown_elements) {
        const targetDate = countdown_element.dataset.targetDate;
        const countdown = new Countdown(countdown_element, targetDate);

        countdown.start();
    }
}
