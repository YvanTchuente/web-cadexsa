import "./bootstrap";
import "./enable-filters";
import "./validate-form-inputs";
import {
    fadeOut,
    start_counters,
    start_carousels,
    start_countdowns,
} from "./library/functions/ui";

const sticky_header_exempted_pages = ["/signup"];

window.addEventListener("scroll", () => {
    if (!sticky_header_exempted_pages.includes(location.pathname)) {
        let header = document.querySelector("body > header");
        const scrolling_state_classes = [
            "animate-[fadeInDown_0.5s_ease-in-out]",
            "sticky",
            "top-0",
            "left-0",
        ];
        if (window.scrollY >= header.offsetHeight / 2) {
            header.classList.add(...scrolling_state_classes);
        } else if (window.scrollY == 0) {
            header.classList.remove(...scrolling_state_classes);
        }
    }
    start_counters(100);
});

document.onreadystatechange = () => {
    const loader = document.getElementById("loader");
    if (document.readyState == "complete") {
        fadeOut(loader, 500);

        start_carousels(document.querySelectorAll(".carousel"));

        setTimeout(() => {
            start_countdowns(document.querySelectorAll(".countdown"));
        }, 500);

        if (document.getElementsByClassName("box")) {
            for (const box of document.getElementsByClassName("box")) {
                setTimeout(() => {
                    fadeOut(box, 1000);
                }, 10000);
            }
        }
    }
};

if (document.getElementById("scrollToTopButton")) {
    const scrollToTopButton = document.getElementById("scrollToTopButton");
    if (
        document.body.clientHeight - document.documentElement.clientHeight >
        100
    ) {
        scrollToTopButton.onclick = () =>
            window.scrollTo({
                top: "0px",
                left: "0px",
                behavior: "smooth",
            });
    } else {
        scrollToTopButton.style.display = "none";
    }
}

const mobile_menu_icon = document.querySelector(
    "body > header .hamburger-icon"
);
mobile_menu_icon.addEventListener("click", (e) => {
    const bars = e.currentTarget.firstElementChild;
    const menu = document.getElementById("mobile-navigation");

    if (!menu.classList.contains("h-0")) {
        menu.classList.replace("h-fit", "h-0");
    } else {
        menu.classList.replace("h-0", "h-fit");
    }

    bars.classList.toggle("bg-transparent");
    bars.classList.toggle("before:bottom-0");
    bars.classList.toggle("before:bottom-[10px]");
    bars.classList.toggle("before:-rotate-45");
    bars.classList.toggle(
        "before:transition-[bottom_0.bars.classList.toggle(2s_ease-in-out,transform_0.2s_0.2s_ease-in-out]"
    );
    bars.classList.toggle("after:top-0");
    bars.classList.toggle("after:top-[10px]");
    bars.classList.toggle("after:rotate-45");
    bars.classList.toggle(
        "after:transition-[top_0.2s_ease-in-out,transform_0.2s_0.2s_ease-in-out]"
    );
});
