const plugin = require("tailwindcss/plugin");
const defaultTheme = require("tailwindcss/defaultTheme");

// Rotate X utilities
const rotateX = plugin(function ({ addUtilities }) {
    addUtilities({
        ".rotate-x-90": {
            transform: "rotateX(90deg)",
        },
    });
});

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "3rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
        fontFamily: {
            sans: ["Inter", ...defaultTheme.fontFamily.sans],
        },
        screens: {
            xs: "360px",
            "2xs": "475px",
            ...defaultTheme.screens,
        },
        extend: {
            keyframes: {
                fadeInDown: {
                    from: {
                        opacity: "0",
                        transform: "translate3d(0,-100%,0)",
                    },
                    to: {
                        opacity: "1",
                        transform: "none",
                    },
                },
                fadeInUp: {
                    from: {
                        opacity: "0",
                        transform: "translate3d(0,10%,0)",
                    },
                    to: {
                        opacity: "1",
                        transform: "none",
                    },
                },

                // Carousel keyframes
                "carousel-go-next-next-item-slide-in": {
                    from: {
                        transform: "translateX(100%)",
                    },
                    to: {
                        transform: "translateX(0%)",
                    },
                },
                "carousel-go-next-previous-item-slide-out": {
                    to: {
                        transform: "translateX(-100%)",
                    },
                },
                "carousel-rewind-next-item-slide-in": {
                    from: {
                        transform: "translateX(-100%)",
                    },
                    to: {
                        transform: "translateX(0%)",
                    },
                },
                "carousel-rewind-previous-item-slide-out": {
                    from: {
                        transform: "translateX(0%)",
                    },
                    to: {
                        transform: "translateX(100%)",
                    },
                },

                // Flip card keyframes
                "flipcard-tophalf-flip": {
                    to: {
                        transform: "rotateX(90deg)",
                    },
                },
                "flipcard-bottomhalf-flip": {
                    to: {
                        transform: "rotateX(0deg)",
                    },
                },
            },
        },
    },
    plugins: [rotateX],
};
