import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },

            colors: {
                surface: "#F8F9FF",
                "surface-dim": "#D0DAEE",
                "surface-bright": "#F8F9FF",
                "surface-container-lowest": "#FFFFFF",
                "surface-container-low": "#EFF3FF",
                "surface-container": "#E6EEFF",
                "surface-container-high": "#DFE9FC",
                "surface-container-highest": "#D9E3F7",

                primary: "#653E00",
                "primary-container": "#855300",

                secondary: "#835500",
                "secondary-container": "#FEAE2C",

                "on-surface": "#121C2A",
                "on-surface-variant": "#514538",

                outline: "#837566",
                "outline-variant": "#D5C4B2",

                background: "#F8F9FF",
            },

            maxWidth: {
                "max-width": "1200px",
            },

            spacing: {
                xs: "4px",
                base: "8px",
                sm: "12px",
                md: "24px",
                lg: "40px",
                xl: "64px",

                "margin-mobile": "16px",
            },

            borderRadius: {
                sm: "0.5rem",
                DEFAULT: "1rem",
                md: "1.5rem",
                lg: "2rem",
                xl: "3rem",
            },
        },
    },

    plugins: [forms],
};
