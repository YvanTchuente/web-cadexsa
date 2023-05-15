if (document.getElementsByClassName("filter")) {
    for (const filter of document.getElementsByClassName("filter")) {
        filter.addEventListener("submit", (e) => {
            e.preventDefault();

            const selects = Array.from(filter.elements).filter((element) =>
                /^select/.test(element.type)
            );

            const unchanged_selects = selects.filter(
                (select) => select.value === select.options[0].value
            );

            if (unchanged_selects.length === selects.length) {
                return;
            }

            let url = filter.action + "?";

            const changed_selects = selects.filter(
                (select) => select.value !== select.options[0].value
            );
            changed_selects.forEach((select) => {
                url += select.name + "=" + select.value + "&";
            });

            location.href = url.slice(0, -1);
        });

        for (const filtration_criterion of filter.getElementsByClassName(
            "filtration_criterion"
        )) {
            filtration_criterion.firstElementChild.addEventListener(
                "click",
                (e) => {
                    const select = e.currentTarget;
                    let filter;

                    if (
                        select.parentElement.parentElement.classList.contains(
                            ".filter"
                        )
                    ) {
                        filter = select.parentElement.parentElement;
                    } else {
                        filter =
                            select.parentElement.parentElement.parentElement
                                .parentElement;
                    }

                    // Hide all non-hidden dropdowns
                    for (const dropdown of filter.querySelectorAll(
                        ".dropdown"
                    )) {
                        hideDropdown(dropdown);
                    }

                    // Reset all select arrow
                    for (const select of filter.querySelectorAll(".select")) {
                        resetSelectArrow(select);
                    }

                    window.addEventListener("click", (e) => {
                        if (!e.target.matches(".select")) {
                            for (const select of filter.querySelectorAll(
                                ".select"
                            )) {
                                resetSelectArrow(select);
                            }
                            for (const dropdown of filter.querySelectorAll(
                                ".dropdown"
                            )) {
                                hideDropdown(dropdown);
                            }
                        }
                    });

                    // Show the specific dropdown
                    showDropdown(select.nextElementSibling);

                    // Rotates the select arrow
                    rotateSelectArrow(select);
                }
            );

            for (const criterion_option of filtration_criterion.querySelectorAll(
                "li"
            )) {
                criterion_option.addEventListener("click", (e) => {
                    const criterion_option = e.currentTarget;
                    const criterion_option_value =
                        criterion_option.innerText.trim();
                    const option_list = criterion_option.parentElement;

                    for (const item of option_list.children) {
                        item.classList.remove("text-white", "bg-blue-500");
                    }

                    criterion_option.classList.add("text-white", "bg-blue-500");

                    const select = option_list.previousElementSibling;
                    select.innerText = criterion_option_value;

                    for (const option of option_list.nextElementSibling
                        .children) {
                        option.removeAttribute("selected");
                        if (option.value === criterion_option_value) {
                            option.setAttribute("selected", "");
                        }
                    }

                    hideDropdown(option_list);
                    rotateSelectArrow(option_list.previousElementSibling);
                });
            }
        }
    }

    function showDropdown(dropdown) {
        dropdown.classList.add("block");
        dropdown.classList.add("top-[105%]");
        dropdown.classList.add("opacity-100");
        dropdown.classList.remove("top-[150%]");
    }

    function hideDropdown(dropdown) {
        dropdown.classList.remove("block");
        dropdown.classList.remove("opacity-100");
        dropdown.classList.remove("top-[105%]");
        dropdown.classList.toggle("top-[150%]");
    }

    function rotateSelectArrow(select) {
        select.classList.toggle("after:rotate-[225deg]");
        select.classList.toggle("after:top-[45%]");
    }

    function resetSelectArrow(select) {
        select.classList.remove("after:rotate-[225deg]", "after:top-[45%]");
    }
}
